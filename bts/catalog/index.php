<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Деревообрабатывающее оборудование  Металлообрабатывающее оборудование  Стеклообрабатывающее оборудование. Огромный выбор. У нас Вы всегда найдете любые станки для деревообработки от ведущих производителей.");
$APPLICATION->SetPageProperty("keywords", "Деревообрабатывающее оборудование  Металлообрабатывающее оборудование  Стеклообрабатывающее оборудование. Огромный выбор. У нас Вы всегда найдете любые станки для деревообработки от ведущих производителей.");
$APPLICATION->SetPageProperty("description", "Деревообрабатывающее оборудование  Металлообрабатывающее оборудование  Стеклообрабатывающее оборудование. Огромный выбор. У нас Вы всегда найдете любые станки для деревообработки от ведущих производителей.");
$APPLICATION->SetTitle("Каталог товаров");

if (!empty($_REQUEST["page"])) {
	$page = $_REQUEST["page"];
} else {
	$page = 9;
}

if (!empty($_REQUEST["sort"])) {
	$sort = $_REQUEST["sort"];
} else {
	$sort = "sort";
}

if ($sort == "shows" || $sort == "sort") {
	$order = "desc";
} else {
	$order = "asc";
}

if (!empty($_REQUEST["proizv"])) {
	$proizv = $_REQUEST["proizv"];
} else {
	$proizv = "";
}

if (!empty($_REQUEST["godvip"])) {
	$godvip = $_REQUEST["godvip"];
} else {
	$godvip = "";
}


$arrFilter = Array(
	'!=PROPERTY_second_hand_VALUE' => 'Y',
	'=PROPERTY_HAR_FRS_PROIZVODITEL.CODE' => $proizv,
	'=PROPERTY_HAR_FRS_GOD_VYPUSKA' => $godvip
);


$APPLICATION->IncludeComponent(
    "bitrix:catalog",
    "",
    Array(
        "TEMPLATE_THEME" => "blue",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "17",
        "HIDE_NOT_AVAILABLE" => "N",
        "BASKET_URL" => "/personal/cart/",
        "ACTION_VARIABLE" => "action",
        "PRODUCT_ID_VARIABLE" => "id",
        "SECTION_ID_VARIABLE" => "SECTION_ID",
        "PRODUCT_QUANTITY_VARIABLE" => "quantity",
        "ADD_PROPERTIES_TO_BASKET" => "Y",
        "PRODUCT_PROPS_VARIABLE" => "prop",
        "PARTIAL_PRODUCT_PROPERTIES" => "Y",
        "COMMON_SHOW_CLOSE_POPUP" => "N",
        "SEF_MODE" => "N",
        "SEF_FOLDER" => "/catalog/",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "USE_MAIN_ELEMENT_SECTION" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_TITLE" => "Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "N",
        "USE_ELEMENT_COUNTER" => "Y",
        "USE_SALE_BESTSELLERS" => "Y",
        "COMPARE_POSITION_FIXED" => "Y",
        "COMPARE_POSITION" => "top left",
        "USE_FILTER" => "Y",
        "FILTER_NAME" => "",
        "FILTER_FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_PRICE_CODE" => array(
            0 => "BASE",
        ),
        "FILTER_OFFERS_FIELD_CODE" => array(
            0 => "PREVIEW_PICTURE",
            1 => "DETAIL_PICTURE",
            2 => "",
        ),
        "FILTER_OFFERS_PROPERTY_CODE" => array(
            0 => "",
            1 => "",
        ),
        "USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
        "TOP_ADD_TO_BASKET_ACTION" => "ADD",
        "SECTION_ADD_TO_BASKET_ACTION" => "ADD",
        "DETAIL_ADD_TO_BASKET_ACTION" => array("BUY"),
        "DETAIL_SHOW_BASIS_PRICE" => "Y",
        "FILTER_VIEW_MODE" => "VERTICAL",
        "USE_REVIEW" => "Y",
        "MESSAGES_PER_PAGE" => "10",
        "USE_CAPTCHA" => "Y",
        "REVIEW_AJAX_POST" => "Y",
        "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
        "FORUM_ID" => "1",
        "URL_TEMPLATES_READ" => "",
        "SHOW_LINK_TO_FORUM" => "Y",
        "POST_FIRST_MESSAGE" => "N",
        "USE_COMPARE" => "N",
        "PRICE_CODE" => array(
            0 => "BASE",
        ),
        "USE_PRICE_COUNT" => "N",
        "SHOW_PRICE_COUNT" => "1",
        "PRICE_VAT_INCLUDE" => "Y",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "PRODUCT_PROPERTIES" => array(
        ),
        "USE_PRODUCT_QUANTITY" => "Y",
        "CONVERT_CURRENCY" => "Y",
        "CURRENCY_ID" => "RUB",
        "OFFERS_CART_PROPERTIES" => array(
            0 => "COLOR_REF",
            1 => "SIZES_SHOES",
            2 => "SIZES_CLOTHES",
        ),
        "SHOW_TOP_ELEMENTS" => "N",
        "SECTION_COUNT_ELEMENTS" => "N",
        "SECTION_TOP_DEPTH" => "1",
        "SECTIONS_VIEW_MODE" => "TEXT",
        "SECTIONS_SHOW_PARENT_NAME" => "Y",
        "PAGE_ELEMENT_COUNT" => "15",
        "LINE_ELEMENT_COUNT" => "3",
        "ELEMENT_SORT_FIELD" => "sort",
        "ELEMENT_SORT_ORDER" => "asc",
        "ELEMENT_SORT_FIELD2" => "id",
        "ELEMENT_SORT_ORDER2" => "desc",
        "LIST_PROPERTY_CODE" => array(
            0 => "NEWPRODUCT",
            1 => "SALELEADER",
            2 => "SPECIALOFFER",
            3 => "",
        ),
        "INCLUDE_SUBSECTIONS" => "Y",
        "LIST_META_KEYWORDS" => "UF_KEYWORDS",
        "LIST_META_DESCRIPTION" => "UF_META_DESCRIPTION",
        "LIST_BROWSER_TITLE" => "UF_BROWSER_TITLE",
        "LIST_OFFERS_FIELD_CODE" => array(
            0 => "NAME",
            1 => "PREVIEW_PICTURE",
            2 => "DETAIL_PICTURE",
            3 => "",
        ),
        "LIST_OFFERS_PROPERTY_CODE" => array(
            0 => "ARTNUMBER",
            1 => "COLOR_REF",
            2 => "SIZES_SHOES",
            3 => "SIZES_CLOTHES",
            4 => "MORE_PHOTO",
            5 => "",
        ),
        "LIST_OFFERS_LIMIT" => "0",
        "SECTION_BACKGROUND_IMAGE" => "-",
        "DETAIL_DETAIL_PICTURE_MODE" => "IMG",
        "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
        "DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
        "DETAIL_PROPERTY_CODE" => array(
            0 => "NEWPRODUCT",
            1 => "MANUFACTURER",
            2 => "MATERIAL",
            3 => "",
        ),
        "DETAIL_META_KEYWORDS" => "KEYWORDS",
        "DETAIL_META_DESCRIPTION" => "META_DESCRIPTION",
        "DETAIL_BROWSER_TITLE" => "TITLE",
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
        "SHOW_DEACTIVATED" => "N",
        "DETAIL_OFFERS_FIELD_CODE" => array(
            0 => "NAME",
            1 => "",
        ),
        "DETAIL_OFFERS_PROPERTY_CODE" => array(
            0 => "ARTNUMBER",
            1 => "COLOR_REF",
            2 => "SIZES_SHOES",
            3 => "SIZES_CLOTHES",
            4 => "MORE_PHOTO",
            5 => "",
        ),
        "DETAIL_BACKGROUND_IMAGE" => "-",
        "DETAIL_STRICT_SECTION_CHECK" => "Y",
        "LINK_IBLOCK_TYPE" => "",
        "LINK_IBLOCK_ID" => "",
        "LINK_PROPERTY_SID" => "",
        "LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
        "USE_ALSO_BUY" => "Y",
        "ALSO_BUY_ELEMENT_COUNT" => "3",
        "ALSO_BUY_MIN_BUYES" => "2",
        "DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
        "DISABLE_INIT_JS_IN_COMPONENT" => "N",
        "USE_GIFTS_DETAIL" => "Y",
        "USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
        "USE_GIFTS_SECTION" => "Y",
        "GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
        "GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
        "GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
        "GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
        "GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
        "GIFTS_MESS_BTN_BUY" => "Выбрать",
        "GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
        "GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
        "GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
        "GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
        "GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
        "GIFTS_SHOW_IMAGE" => "Y",
        "GIFTS_SHOW_NAME" => "Y",
        "GIFTS_SHOW_OLD_PRICE" => "Y",
        "USE_STORE" => "Y",
        "STORES" => array("1"),
        "USE_MIN_AMOUNT" => "N",
        "USER_FIELDS" => array(""),
        "FIELDS" => array("ADDRESS", "PHONE"),
        "SHOW_EMPTY_STORE" => "Y",
        "SHOW_GENERAL_STORE_INFORMATION" => "N",
        "STORE_PATH" => "/store/#store_id#",
        "MAIN_TITLE" => "Наличие на складах",
        "USE_BIG_DATA" => "Y",
        "BIG_DATA_RCM_TYPE" => "bestsell",
        "OFFERS_SORT_FIELD" => "sort",
        "OFFERS_SORT_ORDER" => "asc",
        "OFFERS_SORT_FIELD2" => "id",
        "OFFERS_SORT_ORDER2" => "desc",
        "PAGER_TEMPLATE" => "arrows",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "Товары",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "Y",
        "PAGER_BASE_LINK" => "",
        "PAGER_PARAMS_NAME" => "arrPager",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "MESSAGE_404" => "",
        "ADD_PICT_PROP" => "-",
        "LABEL_PROP" => "NEWPRODUCT",
        "PRODUCT_DISPLAY_MODE" => "Y",
        "OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
        "OFFER_TREE_PROPS" => array(
            0 => "COLOR_REF",
            1 => "SIZES_SHOES",
            2 => "SIZES_CLOTHES",
            3 => "",
        ),
        "DETAIL_DISPLAY_NAME" => "Y",
        "DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
        "SHOW_DISCOUNT_PERCENT" => "Y",
        "SHOW_OLD_PRICE" => "Y",
        "DETAIL_SHOW_MAX_QUANTITY" => "N",
        "MESS_BTN_BUY" => "Купить",
        "MESS_BTN_ADD_TO_BASKET" => "В корзину",
        "MESS_BTN_COMPARE" => "Сравнение",
        "MESS_BTN_DETAIL" => "Подробнее",
        "MESS_NOT_AVAILABLE" => "Нет в наличии",
        "TOP_VIEW_MODE" => "SECTION",
        "DETAIL_USE_VOTE_RATING" => "Y",
        "DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
        "DETAIL_USE_COMMENTS" => "Y",
        "DETAIL_BLOG_USE" => "Y",
        "DETAIL_VK_USE" => "N",
        "DETAIL_FB_USE" => "Y",
        "DETAIL_FB_APP_ID" => "",
        "DETAIL_BRAND_USE" => "N",
        "SIDEBAR_SECTION_SHOW" => "Y",
        "SIDEBAR_DETAIL_SHOW" => "N",
        "SIDEBAR_PATH" => "/examples/index_inc.php",
        "AJAX_OPTION_ADDITIONAL" => "",
        "SEF_URL_TEMPLATES" => array(
            "sections" => "",
            "section" => "#SECTION_CODE#/",
            "element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
            "compare" => "compare/",
        )
    ),
    false
);?><br>
 <br>
    <h1>
        Деревообрабатывающее оборудование в ассортименте<br>
    </h1>
<p>
	 В данном разделе широко представлено самое востребованное оборудование для деревообработки,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/proizvodstvo_stulev/" target="_blank">станки для производства мебели</a>,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/pressovoe_oborudovanie/" target="_blank">прессовое оборудование</a>&nbsp;а так же&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/obrabatyvayushchie_tsentry/" target="_blank">обрабатывающие центры с ЧПУ</a>.
</p>
<p>
 <br>
</p>
<p>
	 У нас Вы всегда найдете станки для деревообработки от ведущих мировых&nbsp;<a href="http://www.btstanki.ru/about/manufactures/" target="_blank">производителей</a>. Мы предлагаем только качественные станки для деревообработки которые будут долго служить Вам и приносить прибыль. Наш сервис готов решить любые задачи по установке и настройке оборудования, приобретенного в нашей организации.
</p>
<p>
 <br>
</p>
<p>
	 Цена деревообрабатывающего оборудования на нашем сайте выгодно отличается благодаря тому что наша компания является официальным партнером таких гигантов деревообрабатывающей индустрии как &nbsp;<a href="http://www.btstanki.ru/about/manufactures/scm_group.html" target="_blank">SCM</a>, &nbsp;<a href="http://www.btstanki.ru/about/manufactures/orma.html" target="_blank">Orma</a>, &nbsp;<a href="http://www.btstanki.ru/about/manufactures/osama.html" target="_blank">Osama</a>. Все представленное у нас оборудование показало себя в эксплуатации как исключительно надежное и удобное в обслуживании. У нас Вы можете купить станки по хорошей цене с гарантией от производителя,&nbsp; доставкой &nbsp;и пуско-наладкой. Подробно ознакомиться с ассортиментом станков для деревообработки &nbsp;можно в этом разделе.
</p>
<p>
</p>
<p>
 <b><br>
 </b>
</p>
<p>
 <b>Деревообрабатывающее оборудование</b>&nbsp;&nbsp;в ассортименте
</p>
<p>
</p>
<p>
 <br>
</p>
<p>
	 В этом разделе Вы сможете найти&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/sverlilno_prisadochnye_stanki/">сверлильно-присадочные станки</a>,&nbsp;<a target="_blank" href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/sverlilnye_stanki_s_chpu/">сверлильные станки с ЧПУ</a>,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/" target="_blank">форматно-раскроечные станки</a>,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/pressovoe_oborudovanie/ploskie_goryachie_pressy/" target="_blank">прессы горячие</a>,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/kromkooblitsovochnye_stanki/kromkooblitsovochnye_stanki_s_ruchnoy_podachey/" target="_blank">кромкооблицовочные станки с ручной</a>&nbsp;и&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/kromkooblitsovochnye_stanki/avtomaticheskie_kromkooblitsovochnye_stanki/" target="_blank">автоматической подачей заготовки</a>,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/frezernye_stanki_s_chpu/" target="_blank">фрезерные центры с ЧПУ</a>,&nbsp;<a href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/linii_srashchivaniya/" target="_blank">линии торцевого сращивания</a>,&nbsp;<a target="_blank" href="http://www.btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/raskroechnyie_tsentry/">раскроечные центры</a>&nbsp;и многое другое.
</p>
<p>
</p>
<p>
 <br>
</p>
<p>
	 Все эти станки для деревообработки Вы можете купить, через нас, связавшись с нами любым доступным Вам способом,&nbsp;<a href="http://www.btstanki.ru/about/contacts/" target="_blank">свяжитесь с нами в Вашем городе</a>, по многоканальному телефону&nbsp;<b>8(495)642-82-51</b>, написать нам письмо на<b>&nbsp;</b>email:&nbsp;<a href="mailto:info@btstanki.ru">info@btstanki.ru</a>&nbsp;или оставив заявку на нашем сайте.&nbsp;
</p>
 <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>