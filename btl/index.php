<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Узнать цену на товар вы можете позвонив по телефону +7 (495) 642-82-51");
$APPLICATION->SetPageProperty("keywords", "festool, фестул, фистул, инструмент, электроинструмент купить, электроинструмент, интернет-магазин электроинструмента, электроинструмент оптом, продажа электроинструмента, купить электроинструмент, режущий инструмент, freud, leuco, kanefusa, leitz");
$APPLICATION->SetPageProperty("title", "Биржа технологий. Festool Профессиональный электроинструмент. Режущий инструмент для производства мебели.");
$APPLICATION->SetTitle("Биржа технологий. Профессиональный электроинструмент. Режущий инструмент для производства мебели.");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"baner",
	Array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "banners",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "4",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("LINK",""),
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => ""
	)
);?>
<div class="two_blocks clearfix">
	<div class="daily_product">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"goodday",
	Array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "1",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("DATE",""),
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => ""
	)
);?>
	</div>
</div>
<div class="products_tabs">
	<div class="tabs_navigation clearfix" id="tabs_navigation">
 <a href="#tab1" class="active">Акции</a> <a href="#tab2">Распродажа</a> <a href="#tab3">Хиты продаж</a>
	</div>
	<div class="tabs_content mainpage">
		<div class="inner_tab" id="tab1">
			 <? $arrFilter = array("PROPERTY_AKTSIYA_VALUE" => "Действующие Акции"); ?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"new",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/cart/",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "",
		"FILTER_NAME" => "arrFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "1",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "",
		"META_KEYWORDS" => "",
		"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE"),
		"OFFERS_FIELD_CODE" => array("",""),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","MORE_PHOTO","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","FILES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "new",
		"PAGER_TITLE" => "",
		"PAGE_ELEMENT_COUNT" => "12",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("Цена продажи"),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array("MATERIAL_NOZHA","_CHISLO_OBOROTOV_KHOLOST_KHODA_","PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY","NAPRAVLENIE_VRASHCHENIYA","_KHOD_SHLIFOVANIYA","ACTION","NEW","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","HIT","RLORLDORL","_RAZEMA_PYLEUDALENIYA_","ELEMENT_SVOYSTVA_OBEKTOV","_NAPRYAZHENIE_AKKUMULYATORA_","PODSHIPNIK","_YEMKOST_LITIY_IONNOGO_AKKUMUL","SPOSOB_KREPLENIYA_NOZHA","SHIRINA_NOZHA","TIP_PRIVODA","TOLSHCHINA_NOZHA","D_DIAMETR_KHVOSTOVIKA","REKOMENDOVANO_SERVISOM","_MASSA","_MAKS_KRUTYASHCHIY_MOMENT_DR_ST","H_VYSOTA_RABOCHEY_CHASTI","_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO","_SMENNAYA_SHLIFOVALNAYA_TARELKA_","_SKOROSTI_","_DIAMETR_OTVERSTIYA_DEREVO_STAL","DIAMETR_POSADOCHNYY","TOLSHCHINA_PROPILA","_POTREBLYAEMAYA_MOSHCHNOST","_SKOROST_PRI_EKSTSENTR_DVIZHENII","R_RADIUS_REZHUSHCHEY_CHASTI","SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA","L_DLINA_SVERLA_OBSHCHAYA","DIAMETR_VNESHNIY","KOLICHESTVO_Z","D_DIAMETR_RABOCHEY_CHASTI","_DIAPAZON_ZAZHIMA_PATRONA_","_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_","DLINA_NOZHA","D_DIAMETR_RABOCHEY_CHASTI2"),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array("",""),
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?>
		</div>
		<div class="inner_tab" id="tab2">
			 <? $arrFiltr = array("PROPERTY_RASPRODAZHA_VALUE" => "Распродажа"); ?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"new",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/cart/",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "",
		"FILTER_NAME" => "arrFiltr",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "1",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "",
		"META_KEYWORDS" => "",
		"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE"),
		"OFFERS_FIELD_CODE" => array("",""),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","MORE_PHOTO","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","FILES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "new",
		"PAGER_TITLE" => "",
		"PAGE_ELEMENT_COUNT" => "12",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("Цена продажи"),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array("MATERIAL_NOZHA","_CHISLO_OBOROTOV_KHOLOST_KHODA_","PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY","NAPRAVLENIE_VRASHCHENIYA","_KHOD_SHLIFOVANIYA","ACTION","NEW","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","HIT","RLORLDORL","_RAZEMA_PYLEUDALENIYA_","ELEMENT_SVOYSTVA_OBEKTOV","_NAPRYAZHENIE_AKKUMULYATORA_","PODSHIPNIK","_YEMKOST_LITIY_IONNOGO_AKKUMUL","SPOSOB_KREPLENIYA_NOZHA","SHIRINA_NOZHA","TIP_PRIVODA","TOLSHCHINA_NOZHA","D_DIAMETR_KHVOSTOVIKA","REKOMENDOVANO_SERVISOM","_MASSA","_MAKS_KRUTYASHCHIY_MOMENT_DR_ST","H_VYSOTA_RABOCHEY_CHASTI","_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO","_SMENNAYA_SHLIFOVALNAYA_TARELKA_","_SKOROSTI_","_DIAMETR_OTVERSTIYA_DEREVO_STAL","DIAMETR_POSADOCHNYY","TOLSHCHINA_PROPILA","_POTREBLYAEMAYA_MOSHCHNOST","_SKOROST_PRI_EKSTSENTR_DVIZHENII","R_RADIUS_REZHUSHCHEY_CHASTI","SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA","L_DLINA_SVERLA_OBSHCHAYA","DIAMETR_VNESHNIY","KOLICHESTVO_Z","D_DIAMETR_RABOCHEY_CHASTI","_DIAPAZON_ZAZHIMA_PATRONA_","_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_","DLINA_NOZHA","D_DIAMETR_RABOCHEY_CHASTI2"),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array("",""),
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?>
		</div>
		<div class="inner_tab" id="tab3">
			 <? $arrFiltr = array("PROPERTY_HIT_VALUE" => 1); ?> <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"new",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BASKET_URL" => "/personal/cart/",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "",
		"FILTER_NAME" => "arrFiltr",
		"HIDE_NOT_AVAILABLE" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "1c_catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => "-",
		"LINE_ELEMENT_COUNT" => "1",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "",
		"META_KEYWORDS" => "",
		"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE","CML2_BASE_UNIT","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","CML2_BAR_CODE"),
		"OFFERS_FIELD_CODE" => array("",""),
		"OFFERS_LIMIT" => "0",
		"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE","CML2_BASE_UNIT","MORE_PHOTO","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","FILES","CML2_ATTRIBUTES","CML2_BAR_CODE",""),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "new",
		"PAGER_TITLE" => "",
		"PAGE_ELEMENT_COUNT" => "12",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array("Цена продажи"),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => array("MATERIAL_NOZHA","_CHISLO_OBOROTOV_KHOLOST_KHODA_","PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY","NAPRAVLENIE_VRASHCHENIYA","_KHOD_SHLIFOVANIYA","ACTION","NEW","CML2_MANUFACTURER","CML2_TRAITS","CML2_TAXES","CML2_ATTRIBUTES","HIT","RLORLDORL","_RAZEMA_PYLEUDALENIYA_","ELEMENT_SVOYSTVA_OBEKTOV","_NAPRYAZHENIE_AKKUMULYATORA_","PODSHIPNIK","_YEMKOST_LITIY_IONNOGO_AKKUMUL","SPOSOB_KREPLENIYA_NOZHA","SHIRINA_NOZHA","TIP_PRIVODA","TOLSHCHINA_NOZHA","D_DIAMETR_KHVOSTOVIKA","REKOMENDOVANO_SERVISOM","_MASSA","_MAKS_KRUTYASHCHIY_MOMENT_DR_ST","H_VYSOTA_RABOCHEY_CHASTI","_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO","_SMENNAYA_SHLIFOVALNAYA_TARELKA_","_SKOROSTI_","_DIAMETR_OTVERSTIYA_DEREVO_STAL","DIAMETR_POSADOCHNYY","TOLSHCHINA_PROPILA","_POTREBLYAEMAYA_MOSHCHNOST","_SKOROST_PRI_EKSTSENTR_DVIZHENII","R_RADIUS_REZHUSHCHEY_CHASTI","SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA","L_DLINA_SVERLA_OBSHCHAYA","DIAMETR_VNESHNIY","KOLICHESTVO_Z","D_DIAMETR_RABOCHEY_CHASTI","_DIAPAZON_ZAZHIMA_PATRONA_","_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_","DLINA_NOZHA","D_DIAMETR_RABOCHEY_CHASTI2"),
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_SUBSCRIPTION" => "N",
		"PROPERTY_CODE" => array("",""),
		"SECTION_CODE" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array("",""),
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"TEMPLATE_THEME" => "",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N"
	)
);?>
		</div>
	</div>
</div>
<div class="last_news">
	<div class="heading">
		 Новости
	</div>
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"main_news",
	Array(
		"ACTIVE_DATE_FORMAT" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "2",
		"IBLOCK_TYPE" => "news",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "3",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
</div>
<div class="about">
	<p>
 <br>
	</p>
	<p>
		 На нашем сайте вас ждёт широкий выбор <a href="/catalog/elektroinstrument/" title="электроинструмент">электроинструмента</a>, режущего инструмента, аспирации, компрессоров, машинок для сшивки шпона и запасных частей ко всему этому оборудованию.
	</p>
	<p>
 <br>
	</p>
	<h1><span style="color: #0c004b;">Festool</span></h1>
	<p>
		 Компания «Биржа Технологий» является официальным дилером Festool, ведущего на рынке профессионального деревообрабатывающего оборудования немецких производителей электроинструмента. Электроинструмент Фестул используется в производстве мебели, деревообработке и обработке искусственного камня.
	</p>
	<p>
		 По наличию и под заказ вы можете купить профессиональный инструмент Фестул следующих видов: <a href="/catalog/elektroinstrument/dreli_i_shurupoverty/" title="дрели и шуруповерты">дрели и шуруповерты</a>, перемешиватели строительные, лобзики, ручные кромкооблицовочные машинки, фены, перфораторы, пилы, <a href="/catalog/elektroinstrument/polirovalnye_mashinki/" title="полировальные машинки">полировальные машинки</a>, пылесосы, фрезеры, шлифовальные машинки, штроборезы, электрорубанки, осциллирующий инструмент и оборудование <a href="/catalog/elektroinstrument/organizatsiya_rabochego_mesta/" title="организация рабочего места">для организации рабочего места</a> Festool.
	</p>
	<p>
		 Что касается режущего инструмента, компания «Биржа Технологий» является официальным дилером таких производителей режущего инструмента как итальянского Freud и немецкого Leitz, и японского Kanefusa. Эти производители режущего инструмента хорошо зарекомендовали себя на рынке благодаря качеству и прочности своей продукции.
	</p>
	<p>
		 У нас вы можете купить следующий электроинструмент этих марок:
	</p>
	<ul>
		<li>бланкетные, поворотные и строгальные сменные <a href="/catalog/rezhushchiy_instrument/nozhi_hw_i_hss/">ножи для фрез</a>;</li>
		<li>патроны и цанги для <a href="/catalog/rezhushchiy_instrument/patrony_tsangi/patrony_sverlilnykh_agregatov/">сверлильных</a> и <a href="/catalog/rezhushchiy_instrument/patrony_tsangi/patrony_frezernykh_agregatov/">фрезерных</a> агрегатов;</li>
		<li>свёрла (чашечные, для глухих и сквозных отверстий, по алюминию, <a href="/catalog/rezhushchiy_instrument/sverla/sverla_dlya_agregatov_stankov_s_chpu/">для станков с ЧПУ</a>, под евровинт, чашечные свёрла и <a href="/catalog/rezhushchiy_instrument/sverla/sverla_forstnera/">свёрла Форстнера</a>);</li>
	</ul>
	<p>
	</p>
	<p>
		 фрезы (<a href="/catalog/rezhushchiy_instrument/frezy/almaznyy_kontsevoy_instrument/" title="фрезы алмазные">алмазные</a>, насадные, для пантографов, для станков с ЧПУ и для ручного инструмента, для кромкооблицовочных станков, <a href="/catalog/rezhushchiy_instrument/frezy/frezy_dlya_vyborki_glukhikh_pazov/">для выборки глухих пазов</a>) и разнообразные <a href="/catalog/rezhushchiy_instrument/pilnye_diski/">пильные диски</a> — торцовочные, пазовальные, для электроинструмента и для раскроечных центров или форматно-раскроечных станков, пилы для многопилов, для работы по различному материалу (по искусственному камню, по пластику, <a href="/catalog/rezhushchiy_instrument/pilnye_diski/pily_po_drevesine/">по древесине</a> и по чёрному металлу) и <a href="/catalog/rezhushchiy_instrument/pilnye_diski/pily_universalnye_s_shirokoy_oblastyu_primeneniya/">универсальные пильные диски</a> с широкой областью применения — всё это вы можете купить в «Бирже технологий»!
	</p>
	<p>
		 Также в нашем интернет-магазине вы можете купить <a href="/catalog/aspiratsiya/">аспирацию</a> для эффективного отвода отходов производства. Аспирация представлена у нас российскими производителями <a href="/catalog/aspiratsiya/?arrFilter_429_MIN=0&arrFilter_429_MAX=27400&arrFilter_374_680463857=Y&set_filter=%D0%A4%D0%B8%D0%BB%D1%8C%D1%82%D1%80%D0%BE%D0%B2%D0%B0%D1%82%D1%8C">Эковент</a> и Эвента, и включает в себя пылеулавливающие установки с картриджными и рукавными фильтрами, комплектующие для них, воздуховоды, коллекторы и переходники.
	</p>
	<p>
		 А если Вам нужен <a href="/catalog/kompressory/">компрессор</a>, то и они у нас есть. «Биржа технологий» является официальным дилером итальянской компании Ceccato, специализирующейся на производстве компрессоров. На нашем сайте Вы можете приобрести винтовые компрессорные станции открытого и закрытого типа, поршневые компрессоры на ресивере, осушители холодильные и комплектующие и расходные материалы для них.
	</p>
	<p>
		 Отдельно стоит упомянуть <a href="/catalog/mashinki_dlya_sshivki_shpona/">машинки для сшивки шпона Kuper</a>, которые Вы тоже можете купить в интернет-магазине «Биржа технологий». машинки для сшивки шпона у нас представлены тремя моделями:
	</p>
	<ul>
		<li>Ручная машинка для сшивки шпона <a href="/catalog/mashinki_dlya_sshivki_shpona/mashinki_dlya_sshivki_shpona_1/kuper_ruchnaya_mashinka_dlya_sshivki_shpona_hfz_4.html">Kuper HFZ/4</a>, которая служит для продольного склеивания шпона в клеевой нитью надежным и эффективным методом ЗИГЗАГ;</li>
		<li>Ручная машинка для сшивки шпона <a href="/catalog/mashinki_dlya_sshivki_shpona/mashinki_dlya_sshivki_shpona_1/kuper_ruchnaya_mashinka_dlya_sshivki_shpona_khl_1.html">Kuper KHL/1</a>, которая применяется для восстановления и поперечного склеивания шпона двумя клеевыми нитями сразу;</li>
		<li>Ручная машинка для сшивки шпона <a href="/catalog/mashinki_dlya_sshivki_shpona/mashinki_dlya_sshivki_shpona_1/kuper_ruchnaya_mashinka_dlya_sshivki_shpona_khl_2.html">Kuper KHL/2</a>, которая является усовершенствованной версией предыдущей машинки для восстановления и поперечного склеивания шпона двумя клеевыми нитями сразу.</li>
	</ul>
	<p>
	</p>
	<p>
		 Также у нас можно купить <a href="/catalog/zapasnye_chasti/" title="запасные части">запасные части</a> для оборудования разных производителей.
	</p>
	<p>
		 Всё это доступно как по наличию так и под заказ. Позвоните по телефону <strong style="white-space: nowrap;"><a href="tel:+7 (495) 642-82-51">+7 (495) 642-82-51</a></strong> или отправьте запрос по электронной почте <a href="mailto:info@btstanki.ru">info@btstanki.ru</a>, и наш профессиональный менеджер поможет выбрать и купить, именно то, что Вам нужно!
	</p>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/include/subscribe.php"); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>