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

global $arrFilter;


    $arrFilter = Array(
        '!=PROPERTY_second_hand_VALUE' => 'Y',
    );


?>


<div class="searchshotinput">
        <?$APPLICATION->IncludeComponent("bitrix:search.title", "visual1", Array(
    "CATEGORY_0" => array(	// Ограничение области поиска
        0 => "iblock_catalogue",
    ),
    "CATEGORY_0_TITLE" => "",	// Название категории
    "CATEGORY_0_iblock_1c_catalog" => array(
        0 => "1",
    ),
    "CHECK_DATES" => "N",	// Искать только в активных по дате документах
    "COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
    "COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
    "CONTAINER_ID" => "title-search",	// ID контейнера, по ширине которого будут выводиться результаты
    "CONVERT_CURRENCY" => "N",	// Показывать цены в одной валюте
    "INPUT_ID" => "title-search-input",	// ID строки ввода поискового запроса
    "NUM_CATEGORIES" => "1",	// Количество категорий поиска
    "ORDER" => "date",	// Сортировка результатов
    "PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода
    "PRICE_CODE" => "",	// Тип цены
    "PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
    "SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
    "SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
    "SHOW_PREVIEW" => "Y",	// Показать картинку
    "TOP_COUNT" => "8",	// Количество результатов в каждой категории
    "USE_LANGUAGE_GUESS" => "N",	// Включить автоопределение раскладки клавиатуры
    "COMPONENT_TEMPLATE" => "visual",
    "PREVIEW_WIDTH" => "75",	// Ширина картинки
    "PREVIEW_HEIGHT" => "75",	// Высота картинки
    "CATEGORY_0_iblock_catalogue" => array(	// Искать в информационных блоках типа "iblock_catalogue"
        0 => "17",
    )
),
    false
);?>
    </div>

<?$APPLICATION->IncludeComponent(
	"roonix:catalog", 
	"bts_catalog", 
	array(
		"IBLOCK_TYPE" => "catalogue",
		"IBLOCK_ID" => "17",
		"HIDE_NOT_AVAILABLE" => "Y",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/catalogue/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Цена продажи",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"FILTER_VIEW_MODE" => "HORIZONTAL",
		"USE_REVIEW" => "Y",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "N",
		"REVIEW_AJAX_POST" => "N",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "N",
		"POST_FIRST_MESSAGE" => "N",
		"USE_COMPARE" => "Y",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"PRICE_CODE" => array(
			0 => "Цена продажи",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "Y",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"PAGE_ELEMENT_COUNT" => "10",
		"LINE_ELEMENT_COUNT" => "1",
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $order,
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => $APPLICATION->IncludeFile("/include/list_property_code.php",Array(),Array("MODE"=>"php")),
			2 => "",
		),
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => $APPLICATION->IncludeFile("/include/detail_property_code.php",Array(),Array("MODE"=>"php")),
			2 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"USE_STORE" => "N",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGER_TEMPLATE" => "round",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "N",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => "",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"DETAIL_SHOW_MAX_QUANTITY" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BRAND_USE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRODUCT_PROPERTIES" => array(
		),
		"OFFERS_CART_PROPERTIES" => array(
			0 => "CML2_ARTICLE",
		),
		"COMPONENT_TEMPLATE" => "bts_catalog",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#.html",
			"compare" => "compare.php?action=#ACTION_CODE#",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
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