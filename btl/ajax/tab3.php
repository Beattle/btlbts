<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<? $arrFiltr = array("PROPERTY_HIT_VALUE" => 1); ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"new",
	Array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "1",
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
		"PAGE_ELEMENT_COUNT" => "12",
		"LINE_ELEMENT_COUNT" => "1",
		"PROPERTY_CODE" => array("", ""),
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
		"PRODUCT_PROPERTIES" => array("MATERIAL_NOZHA", "_CHISLO_OBOROTOV_KHOLOST_KHODA_", "PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY", "NAPRAVLENIE_VRASHCHENIYA", "_KHOD_SHLIFOVANIYA", "ACTION", "NEW", "CML2_MANUFACTURER", "CML2_TRAITS", "CML2_TAXES", "CML2_ATTRIBUTES", "HIT", "RLORLDORL", "_RAZEMA_PYLEUDALENIYA_", "ELEMENT_SVOYSTVA_OBEKTOV", "_NAPRYAZHENIE_AKKUMULYATORA_", "PODSHIPNIK", "_YEMKOST_LITIY_IONNOGO_AKKUMUL", "SPOSOB_KREPLENIYA_NOZHA", "SHIRINA_NOZHA", "TIP_PRIVODA", "TOLSHCHINA_NOZHA", "D_DIAMETR_KHVOSTOVIKA", "REKOMENDOVANO_SERVISOM", "_MASSA", "_MAKS_KRUTYASHCHIY_MOMENT_DR_ST", "H_VYSOTA_RABOCHEY_CHASTI", "_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO", "_SMENNAYA_SHLIFOVALNAYA_TARELKA_", "_SKOROSTI_", "_DIAMETR_OTVERSTIYA_DEREVO_STAL", "DIAMETR_POSADOCHNYY", "TOLSHCHINA_PROPILA", "_POTREBLYAEMAYA_MOSHCHNOST", "_SKOROST_PRI_EKSTSENTR_DVIZHENII", "R_RADIUS_REZHUSHCHEY_CHASTI", "SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA", "L_DLINA_SVERLA_OBSHCHAYA", "DIAMETR_VNESHNIY", "KOLICHESTVO_Z", "D_DIAMETR_RABOCHEY_CHASTI", "_DIAPAZON_ZAZHIMA_PATRONA_", "_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_", "DLINA_NOZHA", "D_DIAMETR_RABOCHEY_CHASTI2"),
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
); ?>