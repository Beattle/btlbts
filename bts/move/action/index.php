<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акции");
?>
	<div class="searchshotinput"><? $APPLICATION->IncludeFile("/include/search.php", Array(), Array("MODE" => "html"));?></div>
<?
$arrFiltr=array("PROPERTY_action_VALUE"=>"Y");
$APPLICATION->IncludeComponent(
			"vetalkms:catalog.section",
			"bts_rasprodazha",
			Array(
				"IBLOCK_TYPE" => "catalogue",
				"IBLOCK_ID" => "17",
				"SECTION_ID" => "",
				"SECTION_CODE" => "",
				"SECTION_USER_FIELDS" => array("", ""),
				"ELEMENT_SORT_FIELD" => "sort",
				"ELEMENT_SORT_ORDER" => "asc",
				"ELEMENT_SORT_FIELD2" => "",
				"ELEMENT_SORT_ORDER2" => "",
				"FILTER_NAME" => "arrFiltr",
				"INCLUDE_SUBSECTIONS" => "Y",
				"SHOW_ALL_WO_SECTION" => "Y",
				"HIDE_NOT_AVAILABLE" => "N",
				"PAGE_ELEMENT_COUNT" => "8",
				"LINE_ELEMENT_COUNT" => "1",
				"PROPERTY_CODE" => $APPLICATION->IncludeFile("/include/list_property_code.php", Array(), Array("MODE" => "php")),
				"OFFERS_LIMIT" => "0",
				"TEMPLATE_THEME" => "",
				"PRODUCT_SUBSCRIPTION" => "N",
				"SHOW_DISCOUNT_PERCENT" => "N",
				"SHOW_OLD_PRICE" => "Y",
				"MESS_BTN_BUY" => "Купить",
				"MESS_BTN_ADD_TO_BASKET" => "В корзину",
				"MESS_BTN_SUBSCRIBE" => "Подписаться",
				"MESS_BTN_DETAIL" => "Подробнее",
				"MESS_NOT_AVAILABLE" => "Нет в наличии",
				"SECTION_URL" => "",
				"DETAIL_URL" => "",
				"SECTION_ID_VARIABLE" => "SECTION_ID",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_GROUPS" => "N",
				"SET_META_KEYWORDS" => "N",
				"META_KEYWORDS" => "",
				"SET_META_DESCRIPTION" => "N",
				"META_DESCRIPTION" => "",
				"BROWSER_TITLE" => "-",
				"ADD_SECTIONS_CHAIN" => "N",
				"DISPLAY_COMPARE" => "N",
				"SET_TITLE" => "N",
				"SET_STATUS_404" => "N",
				"CACHE_FILTER" => "N",
				"PRICE_CODE" => array("Цена продажи"),
				"USE_PRICE_COUNT" => "N",
				"SHOW_PRICE_COUNT" => "1",
				"PRICE_VAT_INCLUDE" => "N",
				"CONVERT_CURRENCY" => "N",
				"BASKET_URL" => "/personal/cart/",
				"ACTION_VARIABLE" => "action",
				"PRODUCT_ID_VARIABLE" => "id",
				"USE_PRODUCT_QUANTITY" => "N",
				"ADD_PROPERTIES_TO_BASKET" => "Y",
				"PRODUCT_PROPS_VARIABLE" => "prop",
				"PARTIAL_PRODUCT_PROPERTIES" => "N",
				"PRODUCT_PROPERTIES" => array(),
				"PAGER_TEMPLATE" => "new",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"OFFERS_FIELD_CODE" => array("", ""),
				"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE", "CML2_BASE_UNIT", "MORE_PHOTO", "CML2_MANUFACTURER", "CML2_TRAITS", "CML2_TAXES", "FILES", "CML2_ATTRIBUTES", "CML2_BAR_CODE", ""),
				"OFFERS_SORT_FIELD" => "sort",
				"OFFERS_SORT_ORDER" => "asc",
				"OFFERS_SORT_FIELD2" => "",
				"OFFERS_SORT_ORDER2" => "",
				"PRODUCT_DISPLAY_MODE" => "N",
				"ADD_PICT_PROP" => "-",
				"LABEL_PROP" => "-",
				"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE", "CML2_BASE_UNIT", "CML2_MANUFACTURER", "CML2_TRAITS", "CML2_TAXES", "CML2_ATTRIBUTES", "CML2_BAR_CODE")
			)
		);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>