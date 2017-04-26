<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;
use \Bitrix\Main\Localization\Loc as Loc;

class DIIblockSearchComponent extends CBitrixComponent
{
	public $isAjax = false;

	/**
	 */
	public function onIncludeComponentLang()
	{
		$this->includeComponentLang(basename(__FILE__));
		Loc::loadMessages(__FILE__);
	}

	/**
	 * @throws LoaderException
	 */
	protected function checkModules()
	{
		if (!Main\Loader::includeModule('iblock'))
			throw new Main\LoaderException(Loc::getMessage('DI_IBLOCK_MODULE_NOT_INSTALLED'));
		if (!Main\Loader::includeModule('datainlife.iblocksearch'))
			throw new Main\LoaderException(Loc::getMessage('DI_IBLOCKSEARCH_MODULE_NOT_INSTALLED'));
	}

	/**
	 * @throws SystemException
	 */
	protected function checkParams()
	{
		/*		if ($this->arParams['IBLOCK_ID'] <= 0)
					throw new Main\ArgumentNullException('IBLOCK_ID');*/
	}


	/**
	 */
	protected function getResult()
	{
		$this->arResult = array(
			'SECTIONS' => array(),
			'ELEMENTS' => array(),
			'INFO' => array()
		);
		CModule::includeModule('sale');

		if ($_REQUEST['ajax_search'] == 'y' && $_REQUEST['INPUT_ID'] == $this->arParams['INPUT_ID'])
			$this->isAjax = true;

		if (isset($_REQUEST['q'])) {
			$this->arResult['INFO']['q'] = trim($_REQUEST['q']);
			if (strlen($this->arResult['INFO']['q']) < 3) return;

			$searchParams = array(
				'q' => trim($_REQUEST['q']),
				'order_by' => 'cnt',
				'order' => 'desc',
				'section_id' => $_REQUEST['section_id'],
			);

			if($this->arParams['EXT_FILTER'] && isset($GLOBALS[$this->arParams['EXT_FILTER']]))
				$searchParams['ext_filter'] = $GLOBALS[$this->arParams['EXT_FILTER']];

			if ((int)$this->arParams['SECTIONS_COUNT_TOP'] > 0)
				$searchParams['on_page'] = (int)$this->arParams['SECTIONS_COUNT_TOP'];

			if ((int)$this->arParams['RANDOM_ELEMENTS_COUNT'])
				$searchParams['random_elements_count'] = (int)$this->arParams['RANDOM_ELEMENTS_COUNT'];

			$search = new \Datainlife\IBlockSearch\SearchHelper($searchParams);
			$sfound = $search->getSections();
			$this->arResult['INFO']['CNT'] = $search->getElementsCount();
			$last_num = substr($this->arResult['INFO']['CNT'], -1);
			$lastnum2 = substr($this->arResult['INFO']['CNT'], -2);

			if (($lastnum2 >= 10) && ($lastnum2 <= 20))
				$all_title = Loc::GetMessage('DI_IBLOCKSEARCH_RESULTS_5');
			elseif ($last_num == 0 || $last_num > 4)
				$all_title = Loc::GetMessage('DI_IBLOCKSEARCH_RESULTS_5');
			elseif ($last_num == 1 && $this->arResult['INFO']['CNT'] !== 11)
				$all_title = Loc::GetMessage('DI_IBLOCKSEARCH_RESULTS_1');
			else
				$all_title = Loc::GetMessage('DI_IBLOCKSEARCH_RESULTS_2');
			$this->arResult['INFO']['RESULTS_TITLE'] = $all_title;

			$result_str = Loc::GetMessage('DI_IBLOCKSEARCH_RESULTS_STR');
			$result_str = str_replace('#find_cnt#', $this->arResult['INFO']['CNT'], str_replace('#results#', $all_title, str_replace('#request#', $_REQUEST['q'], $result_str)));
			$this->arResult['INFO']['CNT_TITLE'] = $result_str;


			$sections = array();
			$elements = array();

			$skeys = array('ID', 'IBLOCK_ID', 'NAME', 'CODE', 'SECTION_PAGE_URL');
			if (!empty($sfound)) {
				$sres = \CIBlockSection::getList(
					array(),
					array(
						'ID' => array_keys($sfound)
					),
					false,
					$skeys
				);
				while ($sect = $sres->getNext()) {
					$sect['NAME'] = html_entity_decode($sect['NAME']);
					$s = array();
					foreach ($skeys as $skey)
						$s[$skey] = $sect[$skey];
					$s['ELEMENTS_CNT'] = $sfound[$sect['ID']]['CNT'];
					$sections[] = $s;
				}

				usort($sections, function ($a, $b) {
					return ($b['ELEMENTS_CNT'] - $a['ELEMENTS_CNT']);
				});
			}

			$efound = $search->getRandomElements();

			$keys = array('ID', 'IBLOCK_ID', 'NAME', 'DETAIL_PAGE_URL', 'CATALOG_QUANTITY', $this->arParams['RANDOM_ELEMENTS_PICTURE_FIELD']);
			if (!empty($this->arParams['PRICE_CODE'])) {
				//Params for price get
				$iblock_id = COption::GetOptionInt('datainlife.iblocksearch', 'IBLOCK_ID', '', SITE_ID);
				$arPrices = CIBlockPriceTools::GetCatalogPrices($iblock_id, $this->arParams['PRICE_CODE']);
				$arConvertParams = array('CURRENCY_ID' => 'RUB'); //hardcode
				$incl_vat = true; //hardcode
			}

			//get price groups
			$select_groups = array();
			foreach ($arPrices as $code => $params)
				$select_groups[] = $params['SELECT'];

			$eres = \CIBlockElement::getList(
				array(),
				array(
					'ID' => $efound
				),
				false,
				false,
				array_merge($keys, $select_groups)
			);
			if(!empty($efound)){
				while ($e = $eres->getNext()) {
					$e['NAME'] = html_entity_decode($e['NAME']);
					$i = array();

					$pict = $e[$this->arParams['RANDOM_ELEMENTS_PICTURE_FIELD']];
					unset($e[$this->arParams['RANDOM_ELEMENTS_PICTURE_FIELD']]);
					if ((int)$pict > 0) {
						$pict = \CFile::ResizeImageGet(
							$pict,
							array(
								'width' => $this->arParams['RANDOM_ELEMENTS_PICTURE_WIDTH'],
								'height' => $this->arParams['RANDOM_ELEMENTS_PICTURE_HEIGHT']
							)
						);
						if ($pict['src'])
							$i['PICTURE'] = $pict['src'];
					}

					foreach ($keys as $key)
						if (isset($e[$key]))
							$i[$key] = $e[$key];

					if (!empty($arPrices)) {

						$i["PRICES"] = CIBlockPriceTools::GetItemPrices($e['IBLOCK_ID'], $arPrices, $e, $incl_vat, $arConvertParams);

						if ($i["PRICES"]) {
							foreach ($i['PRICES'] as &$arOnePrice) {
								if ('Y' == $arOnePrice['MIN_PRICE']) {
									$i['MIN_PRICE'] = $arOnePrice;
									break;
								}
							}
							unset($arOnePrice);
						}

					}

					$elements[] = $i;
				}
			}
		}

		$this->arResult['SECTIONS'] = $sections;
		$this->arResult['ELEMENTS'] = $elements;
	}


	/**
	 */
	public
	function executeComponent()
	{
		try {
			$this->checkModules();
			$this->checkParams();
			$this->getResult();
			if ($this->isAjax) {
				$GLOBALS['APPLICATION']->restartBuffer();
				$this->includeComponentTemplate('ajax');
				exit;
			}
			$this->includeComponentTemplate();
		} catch (Exception $e) {
			if ($this->isAjax) {
				$GLOBALS['APPLICATION']->restartBuffer();
				echo \Bitrix\Main\Web\Json::encode($e->getMessage(), $options = null);
			}
		}
	}
}