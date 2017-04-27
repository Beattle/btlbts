<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);



$orderBy = $arParams['ELEMENT_SORT_ORDER'];

if($orderBy === 'desc'){
    $icon = '<span class="icon"><i class="fa fa-sort-desc" aria-hidden="true"></i></span> ';
}else{
    $icon = '<span class="icon"><i class="fa fa-sort-asc" aria-hidden="true"></i></span>';
}

$sortBy = $_REQUEST['sortBy']?$_REQUEST['sortBy']:'price';
$this->addExternalCss("/bitrix/css/main/font-awesome.css");



 if($arResult['ITEMS']):?>
    <div class="sort-section">
        Сортировать по:
        <a rel="nofollow" <? if ($sortBy == 'date') : ?> class="current-sort" <? endif; ?>
           href="<?= $APPLICATION->GetCurPageParam('sortBy=date&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
        >
            <span class="sort">дате размещения</span>
        </a>
        <? if ($sortBy == 'date') :?><?=$icon?><?endif;?>
        <a rel="nofollow" <? if ($sortBy == 'name') : ?> class="current-sort" <? endif; ?>
           href="<?= $APPLICATION->GetCurPageParam('sortBy=name&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
        >
            <span class="sort">названию</span>
        </a>
        <? if ($sortBy == 'name') :?><?=$icon?><?endif;?>
        <a rel="nofollow" <? if ($sortBy == 'price') : ?> class="current-sort" <? endif; ?>
           href="<?= $APPLICATION->GetCurPageParam('sortBy=price&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
        >
            <span class="sort">цене</span>
        </a>
        <? if ($sortBy == 'price') :?><?=$icon?><?endif;?>
        <a rel="nofollow" <? if ($sortBy == 'PROPERTY_561') : ?> class="current-sort" <? endif; ?>
           href="<?= $APPLICATION->GetCurPageParam('sortBy=PROPERTY_561&orderBy='.$orderBy, array('sortBy', 'orderBy')) ?>"
        >
            <span class="sort">году выпуска</span>
        </a>
        <? if ($sortBy == 'PROPERTY_561') :?><?=$icon?><?endif;?>


    </div>
<? endif;?>
<div class="catalog_items_rows clearfix">

<? foreach ($arResult['ITEMS'] as $key => $arItem) { ?>
	<div class="bl_product3">
					<? if ($arItem["PROPERTIES"]["special_offer"]["VALUE"]) { ?>
						<div class="rasprodazha"></div>
					<? } ?>
					<? if ($arItem["PROPERTIES"]["action"]["VALUE"]) { ?>
						<div class="action"></div>
					<? } ?>
					<a href="<? echo $arItem['DETAIL_PAGE_URL']; ?>"><h2><?=$arItem["NAME"]?></h2></a>

					<?
						if(!empty($arItem['PREVIEW_PICTURE']['ID']))
						{
							$img=CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>250, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
						}
						else $img["src"]="/upload/no-photo_140x100.jpg";
					?>
						<div class="bl_product3_img">
							<a class="item_image" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>">
								<img src="<?=$img["src"]?>" alt="<?=$arItem["NAME"]?>">
							</a>
							<? if ($arItem['MIN_PRICE']["VALUE"]) { ?>
								<div class="frs_price">
									<?=$arItem['MIN_PRICE']["PRINT_VALUE"]?>
								</div>
							<? } ?>
						</div>
						<?
						/*	if(!empty($arItem['PREVIEW_PICTURE']['ID'])) {
						?>
						<a class="make_bigger fancybox" href="<?=$arItem['PREVIEW_PICTURE']['SRC']?>">увеличить фото</a>
						<?} */?>
					<div class="bl_product3_ttle">
						<? if ($arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]) {?>
							<div class="artic"><span class="semibold">Артикул:</span> <?=$arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></div>
						<?}?>
						<div class="add_to_compare">
							<input class="add_to_compare_checkbox" type="checkbox" id="compare_<?=($key+1)?>" rel="<?=$arItem["ID"]?>" <?=(array_key_exists($arItem["ID"], $_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"])?"checked":"")?>>
							<label class="compare_label" for="compare_<?=($key+1)?>">к сравнению</label>
						</div>
						<div class="middle_side">
							<div class="chars">
								<?
								$tab1 = "";
								foreach ($arItem['DISPLAY_PROPERTIES'] as $k => $v) {
									if (mb_substr($k, 0, 8) == 'HAR_FRS_' && $k != "HAR_FRS_PRICE") {
										$tab1 .= '<div class="char_tem"><span class="semibold">'.$v['NAME'].':</span> ';
										if (is_array($k['DISPLAY_VALUE'])) {
											foreach($arOneProp['DISPLAY_VALUE'] as $k2 => $v2) {
												$tab1 .=  $v2 . " " . $arOneProp['DESCRIPTION'][$k2] . "<br />";
											}
										} else {
											$tab1 .= $v['DISPLAY_VALUE'] . " " . $v['DESCRIPTION'] . "<br />";
										}
										$tab1 .= '</div>';
									}

								}
								echo $tab1;
                    			?>
							</div>
							<? if ($arItem["PROPERTIES"]["brief_text"]["VALUE"]) {?>
								<div class="brief_text">
									<br />
									<? if($arItem["PROPERTIES"]["brief_text"]["VALUE"]["TYPE"] == "HTML" || $arItem["PROPERTIES"]["brief_text"]["VALUE"]["TYPE"] == "html") {
										echo htmlspecialcharsBack($arItem["PROPERTIES"]["brief_text"]["VALUE"]["TEXT"]);
									} else {
										$arItem["PROPERTIES"]["brief_text"]["VALUE"]["TEXT"];
									}
									?>
									<br />
								</div>
							<? } ?>
							<?
							//if(count($arItem["SECT"])>0)
							if(count($arItem["SECT"])==-1)
							{

								?>
								<div class="additional">
									<?
									foreach($arItem["SECT"] as $sect)
									{


										?>
										<div class="item">
											<a class="underlined" href="<?=$sect["SECTION_PAGE_URL"]?>"><?=$sect["NAME"]?></a> <a href="<?=$sect["SECTION_PAGE_URL"]?>">(<?=$sect["ELEMENT_CNT"]?>)</a>
										</div>
									<?
									}

									?>


								</div>
							<?}?>
							<div class="rating">
								<?$APPLICATION->IncludeComponent(
									"roonix:iblock.vote",
									"stars",
									array(
										"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
										"IBLOCK_ID" => $arParams['IBLOCK_ID'],
										"ELEMENT_ID" => $arItem['ID'],
										"ELEMENT_CODE" => "",
										"MAX_VOTE" => "5",
										"VOTE_NAMES" => array("1", "2", "3", "4", "5"),
										"SET_STATUS_404" => "N",
										"DISPLAY_AS_RATING" => $arParams['VOTE_DISPLAY_AS_RATING'],
										"CACHE_TYPE" => $arParams['CACHE_TYPE'],
										"CACHE_TIME" => $arParams['CACHE_TIME']
									),
									$component,
									array("HIDE_ICONS" => "Y")
								);?>
							</div>
							<?
							if($arItem["COMMENT_NUM"]>0)
							{
								?>
								<a class="reviews_link" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>?comment=Y">Отзывы (<?=$arItem["COMMENT_NUM"]?>)</a>
							<?}?>
							<a class="silk_bg" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>">Подробнее</a>
						</div>
					</div>

					<div class="right_side">
					<?


						if(count($arItem["OFFERS"])==1)
						{

							?>
							<div class="prices">
							<?
								if(!empty($arItem['MIN_PRICE']['DISCOUNT_VALUE']) && ($arItem['MIN_PRICE']['DISCOUNT_VALUE'])<$arItem['MIN_PRICE']['VALUE'])
								{

							?>
							<div class="old_price">
								<div class="price_title">старая цена:</div>
								<div class="price_value"><?=($arItem['MIN_PRICE']['PRINT_VALUE'])?></div>
							</div>
							<div class="new_price">
								<div class="price_title">цена:</div>
								<div class="price_value"><?=($arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE'])?></div>
							</div>
							<?}

							else
							{
							?>
							<div class="new_price">
								<div class="price_title">цена:</div>
								<div class="price_value"><?=($arItem['MIN_PRICE']['PRINT_VALUE'])?></div>
							</div>
							<?}?>
						</div>
						<a href="<?=$arItem["ID"]?>" class="one_click_buy">Купить в 1 клик</a>
						<a href="<?=$arItem["OFFERS"][0]["ADD_URL"]?>" class="add_to_cart">В корзину</a>
							<?
						}
						elseif(count($arItem["OFFERS"])>1)
						{

					?>
						<div class="prices">
						<?
							if(!empty($arItem['MAX_PRICE']['DISCOUNT_VALUE']) && ($arItem['MAX_PRICE']['DISCOUNT_VALUE'])<$arItem['MAX_PRICE']['VALUE'])
								{

						?>
							<div class="old_price">
								<div class="price_title">старая цена:</div>
								<div class="price_value"><?print_r($arItem['MAX_PRICE']['PRINT_VALUE'])?></div>
							</div>
							<div class="new_price">
								<div class="price_title">цена:</div>
								<div class="price_value"><?print_r($arItem['MAX_PRICE']['PRINT_DISCOUNT_VALUE'])?></div>
							</div>
							<?}
							else
							{
							?>
							<div class="new_price">
								<div class="price_title">цена:</div>
								<div class="price_value"><?print_r($arItem['MAX_PRICE']['PRINT_VALUE'])?></div>
							</div>
							<?}?>
						</div>
						<a href="<?=$arItem['MAX_PRICE']['ID']?>" class="one_click_buy">Купить в 1 клик</a>
						<a href="<?=$arItem['MAX_PRICE']['ADD_URL']?>" class="add_to_cart">В корзину</a>

					<?}?>
					</div>

				</div>

				<?

				}
					if ($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}

				?>
			</div>
			<?
				if(count($arResult["UF_ARTICLE"])>0)
				{

			?>
			<div class="info_articles">
				<div class="heading">Статьи</div>
				<?
				global $Arflt;
					$Arflt=array("ID"=>$arResult["UF_ARTICLE"]);

				?>

				<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"goodarticles",
	Array(
		"IBLOCK_TYPE" => "articles",
		"IBLOCK_ID" => "8",
		"NEWS_COUNT" => "1000",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "",
		"SORT_ORDER2" => "",
		"FILTER_NAME" => "Arflt",
		"FIELD_CODE" => array("",""),
		"PROPERTY_CODE" => array("",""),
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N"
	)
);?>

			</div>
			<?}?>
