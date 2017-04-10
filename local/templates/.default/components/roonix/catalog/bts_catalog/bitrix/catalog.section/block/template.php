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

?>
<div class="catalog_sorting clearfix">
<form method="get" action="" id="srtform">
				<div class="sort_by">
					<div class="sort_title">Сортировать по:</div>
					<select class="sort_select" name="sort" onchange="$('#srtform').submit();">
					<option value="NAME" <?=($_REQUEST["sort"]=="NAME"?"selected":"")?>>Названию</option>
						<option value="shows" <?=($_REQUEST["sort"]=="shows"?"selected":"")?>>Популярности</option>
						
						
						
					</select>
				</div>
				<div class="show_by">
					<div class="show_title">Показывать по:</div>
					<select class="show_select" name="page" onchange="$('#srtform').submit();">
						<option value="9" <?=($_REQUEST["page"]==9?"selected":"")?>>9</option>
						<option value="18" <?=($_REQUEST["page"]==18?"selected":"")?>>18</option>
						<option value="33" <?=($_REQUEST["page"]==33?"selected":"")?>>33</option>
						<option value="45" <?=($_REQUEST["page"]==45?"selected":"")?>>45</option>
					</select>
					товаров
				</div>
</form>
				<div class="change_view">
					<div class="view_title">Вид:</div>
					<a class="display_rows" href="<?=$APPLICATION->GetCurPageParam("", array("view"))?>">&nbsp;</a>
					<a class="display_blocks active" href="<?=$APPLICATION->GetCurPageParam("view=block", array("view"))?>">&nbsp;</a>
				</div>
				<a class="catalog_compare" href="/compare/">сравнить товары (<?=count($_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"])?>)</a>
			</div>
			<div class="catalog_items_blocks clearfix">
			
			<?
			
			$z=0;
				foreach ($arResult['ITEMS'] as $key => $arItem)
{


$z++;
if($z==1)
{
?>
<div class="catalog_threerow clearfix">
<?
}
				
			?>
			
			<div class="catalog_item">
						<div class="top_info clearfix">
							<div class="artic">Артикул: <?=$arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></div>
							<div class="add_to_compare">
							<input class="add_to_compare_checkbox" type="checkbox" id="compare_<?=($key+1)?>" rel="<?=$arItem["ID"]?>" <?=(array_key_exists($arItem["ID"], $_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"])?"checked":"")?>>
							<label class="compare_label" for="compare_<?=($key+1)?>">к сравнению</label>
						</div>
						</div>
						<?
						if(!empty($arItem['PREVIEW_PICTURE']['ID']))
						{
						
									$img=CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], array('width'=>200, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
						}
						else $img["src"]="/upload/no-photo_220x200.jpg";

						?>
						<a class="item_photo" href="<? echo $arItem['DETAIL_PAGE_URL']; ?>">
							<img src="<?=$img["src"]?>" alt="<?=$arItem["NAME"]?>" width="200" height="140">
							<?=$arItem["NAME"]?>
						</a>
						
						<?
							if(count($arItem["OFFERS"])==1)
						{
							
						?>
						<div class="catalog_prices clearfix">
						
							
							<?
								if(!empty($arItem['MIN_PRICE']['DISCOUNT_VALUE'])<$arItem['MIN_PRICE']['VALUE'])
								{
								
							?>
							<div class="new_price"><?=($arItem['MIN_PRICE']['PRINT_DISCOUNT_VALUE'])?></div>
							<div class="old_price">старая цена: <div class="crossed_price"><?=($arItem['MIN_PRICE']['PRINT_VALUE'])?></div></div>
							<?
							
							}
							else {
								?>
								<div class="new_price"><?=($arItem['MIN_PRICE']['PRINT_VALUE'])?></div>
								<?
							}
							?>
						</div>
						<a href="<?=$arItem["ID"]?>" class="one_click_buy">Купить в 1 клик</a>
						<a href="<?=$arItem["OFFERS"][0]["ADD_URL"]?>" class="add_to_cart">В корзину</a>

							<?
							}
							elseif(count($arItem["OFFERS"])>1)
							{
								if(!empty($arItem['MAX_PRICE']['DISCOUNT_VALUE']) && ($arItem['MAX_PRICE']['DISCOUNT_VALUE'])<$arItem['MAX_PRICE']['VALUE'])
								{
							?>
							<div class="catalog_prices clearfix">
							<div class="new_price"><?print_r($arItem['MAX_PRICE']['PRINT_DISCOUNT_VALUE'])?></div>
							
														
							<div class="old_price">старая цена: <div class="crossed_price"><?print_r($arItem['MAX_PRICE']['PRINT_VALUE'])?></div></div>
							<?
							}
							else 
							{
								?>
								<div class="catalog_prices clearfix">
							<div class="new_price"><?print_r($arItem['MAX_PRICE']['PRINT_VALUE'])?></div>
							
														
							
								<?
							}
							
							?>
							</div>
							<a href="<?=$arItem['MAX_PRICE']['ID']?>" class="one_click_buy">Купить в 1 клик</a>
						<a href="<?=$arItem['MAX_PRICE']["ADD_URL"]?>" class="add_to_cart">В корзину</a>
							<?
						
							}
							?>
							
						
						
						<div class="bottom_info">
							<div class="left_part">
								<div class="rating">
									<?$APPLICATION->IncludeComponent(
			"bitrix:iblock.vote",
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
							</div>
							<div class="right_part">
							<?
							if(count($arItem["SECT"])>0)
							{
							
						?>
							<?
							foreach($arItem["SECT"] as $sect)
							{
							
							
								?>
							
								<div class="additional clearfix">
									<a class="add_title" href="<?=$sect["SECTION_PAGE_URL"]?>"><?=$sect["NAME"]?></a>
									<a class="add_value" href="<?=$sect["SECTION_PAGE_URL"]?>">(<?=$sect["ELEMENT_CNT"]?>)</a>
								</div>
								
								
								<?}
									
									}
									
								?>
								
															</div>
						</div>
					</div>
			
								
				<?
				if($z==3)
				{
					$z=0;
					?>
</div>
					<?
					
					
				}
				
				}
					if ($arParams["DISPLAY_BOTTOM_PAGER"])
	{
		?><? echo $arResult["NAV_STRING"]; ?><?
	}
					
				?>
			</div>
			<div class="usefull_info">
			<?
				if(!empty($arResult["DESCRIPTION"]))
				{
				
			?>
				<div class="heading">Полезная информация</div>
				<div class="usefull_info_inner">
					
					<?
					echo $arResult["DESCRIPTION"];
						
					?>
					
									</div>
									<?}?>
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
			<?
	require($_SERVER["DOCUMENT_ROOT"]."/include/subscribe.php");
	
?>