<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<?
use \Bitrix\Main\Localization\Loc as Loc;
Loc::loadMessages(__FILE__);

//var_dump(CJSCore::IsExtRegistered('jsrender'));

\CJSCore::Init(array("jquery", "jsrender"));

$jsTmplName = 'searchResultTemplate';

$jsOpt = array(
	'result' => '#' . $arParams['RESULT_CONTAINER_ID'],
	'dataProvider' => '', //$templateFolder. '/ajax.php',
	'catalogFolder' => $arParams['CATALOG_FOLDER'],
	'jsTemplate' => $jsTmplName,
	'input_id' => $arParams['INPUT_ID']
);
?>
	
<?
$this->setFrameMode(true);

$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "di-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "di-search";

$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

?>

<script>
	var catalog_folder = '<?=$arParams['CATALOG_FOLDER']?>';
	var iblock_search_input_section_id = '<?=$arParams['INPUT_SECTION_ID']?>';
</script>

<div class="iblock-search">
	<form method="get" action="<?=$arParams['CATALOG_FOLDER']?>" autocomplete="off">
		<?if(strlen($arParams["INPUT_SECTION_ID"])>0):?><input type="hidden" name="<?=$arParams["INPUT_SECTION_ID"]?>" id="<?=$arParams["INPUT_SECTION_ID"]?>" value="<?=(int)$arParams['SECTION_ID']?>"><?endif?>
		<input id="<?=$INPUT_ID?>"
			   type="text"
			   name="q"
			   placeholder="<?=GetMessage('CT_BST_SEARCH_BUTTON')?>"
			   autocomplete="off"
			   class="iblock-search-form-control" value="<?=htmlspecialcharsbx($_GET['q'])?>">
		<div class="iblock-search-result" id="<?=$arParams['RESULT_CONTAINER_ID']?>"></div>
		<button type="submit"><?=GetMessage('DI_IBLOCKSEARCH_SEARCH')?></button>
	</form><!-- @end .input-search -->
</div>

<script id="<?=$jsTmplName?>"  type="text/x-jsrender">
	{{if ELEMENTS.length > 0}}
		<div class="iblock-search-result-good">
			<div class="iblock-search-result-good-head"><b><?=GetMessage('DI_IBLOCKSEARCH_ELEMENTS_NAME')?></b></div>
			{{for ELEMENTS}}
			<div class="iblock-search-result-item">
				<a href="{{attr:DETAIL_PAGE_URL}}">
					<img src="{{attr:PICTURE}}" alt="{{attr:NAME}}">
					<div>
						<span class="iblock-search-title">{{>NAME}}</span>
						{{if MIN_PRICE}}
							{{if MIN_PRICE.VALUE > MIN_PRICE.DISCOUNT_VALUE}}
							<span class="iblock-search-old-price">{{>MIN_PRICE.PRINT_VALUE}}</span>
							{{/if}}
							<span class="iblock-search-price">{{>MIN_PRICE.PRINT_DISCOUNT_VALUE}}</span>
						{{/if}}
					</div>
				</a>
			</div>
			{{/for}}
		</div>
	{{/if}}
	{{if SECTIONS.length > 0}}
	<div class="iblock-search-result-category">
		<div class="iblock-search-result-category-head"><b><?=GetMessage('DI_IBLOCKSEARCH_SECTIONS_NAME')?></b></div>
		<ul>
			{{for SECTIONS}}
				<li><a href="{{attr:SECTION_PAGE_URL}}">{{>NAME}}</a> ({{attr:ELEMENTS_CNT}})</li>
			{{/for}}
		</ul>
	</div>
	{{/if}}
	{{if ELEMENTS.length > 0 && SECTIONS.length > 0}}
	<div class="iblock-search-result-all">
		<?echo GetMessage('DI_IBLOCKSEARCH_ALL_RESULTS_STR')?>{{attr:INFO.CNT}} {{attr:INFO.RESULTS_TITLE}} <?echo GetMessage('DI_IBLOCKSEARCH_BY_QUERY_STR')?> "<a href="<?=$arParams['CATALOG_FOLDER']?>?q={{attr:INFO.q}}">{{>INFO.q}}</a>"
	</div>
	{{/if}}
</script>

<script type="text/javascript">
	$('#<?=$arParams["INPUT_ID"]?>').smartSearch(<?=json_encode($jsOpt)?>);
</script>