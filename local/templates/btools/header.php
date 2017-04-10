<?php
use \Bitrix\Main\Page\Asset;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="yandex-verification" content="5fd04201db9a02f6" />
    <title><? $APPLICATION->ShowTitle() ?></title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    <?
    $APPLICATION->ShowMeta("robots", false, true);
    $APPLICATION->ShowMeta("keywords", false, true);
    $APPLICATION->ShowMeta("description", false, true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    $APPLICATION->ShowCSS(true, true);

    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/style.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/main.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/slider/jquery.bxslider.css');
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.css");
    $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/jqueryui.css");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-1.11.1.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jqueryui.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.cycle2.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.countdown.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.bxslider.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.pack.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/common.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/inputmask.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/jquery.inputmask.min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/inputmask.extensions.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/url.min.js");
    $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/main.js");
    ?>
    <? if (ISPRODUCTION) { ?>
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <? } ?>
</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<?
$SECTIONCODE = "";
$path = $APPLICATION->GetCurDir();
$pathArray = explode('/', $path);
if ($pathArray[1] == 'catalog') {
    $SECTIONCODE = $pathArray[2];
}

?>
<a id="gotop" href="#"></a>
<section class="topbar">
    <div class="inner">
        <? $APPLICATION->IncludeComponent(
            "bitrix:menu",
            "top",
            Array(
                "ROOT_MENU_TYPE" => "top",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_USE_GROUPS" => "N",
                "MENU_CACHE_GET_VARS" => array(""),
                "MAX_LEVEL" => "1",
                "CHILD_MENU_TYPE" => "",
                "USE_EXT" => "N",
                "DELAY" => "N",
                "ALLOW_MULTI_SELECT" => "N"
            )
        ); ?>
        <div class="cart">
            <span class="cart_heading">Корзина:</span> выбрано
                <span
                    class="basketready"><? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
                        "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",    // Страница корзины
                        "PATH_TO_PERSONAL" => SITE_DIR . "personal/",    // Персональный раздел
                        "SHOW_PERSONAL_LINK" => "N",    // Отображать персональный раздел
                        "SHOW_NUM_PRODUCTS" => "Y",    // Показывать количество товаров
                        "SHOW_TOTAL_PRICE" => "Y",    // Показывать общую сумму по товарам
                        "SHOW_PRODUCTS" => "N",    // Показывать список товаров
                        "POSITION_FIXED" => "N",    // Отображать корзину поверх шаблона
                    ),
                        false
                    ); ?>
            </span>
        </div>
    </div>
</section>
<header class="header clearfix">
    <div class="inner">
        <a class="logo" href="/">Биржа технологий</a>
        <div class="left_contacts">
            <div class="city">Москва</div>
            <? $APPLICATION->IncludeFile("/include/address.php", Array(), Array("MODE" => "html")); ?>
        </div>
        <div class="right_contacts">
            <div class="phone">
                <? $APPLICATION->IncludeFile("/include/phone.php", Array(), Array("MODE" => "html")); ?>
            </div>
            <div class="or">либо</div>
            <a class="order_call" id="order_call" href="#">Заказать звонок</a>
        </div>
        <div class="login_section">
            <div class="socials clearfix">
                <? $APPLICATION->IncludeFile("/include/social.php", Array(), Array("MODE" => "html")); ?>
            </div>
            <div class="login_buttons">
                <?
                if ($USER->IsAuthorized()) {
                    ?>
                    <? $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart_user", Array(
                        "PATH_TO_BASKET" => SITE_DIR . "personal/cart/",    // Страница корзины
                        "PATH_TO_PERSONAL" => SITE_DIR . "personal/",    // Персональный раздел
                        "SHOW_PERSONAL_LINK" => "N",    // Отображать персональный раздел
                        "SHOW_NUM_PRODUCTS" => "Y",    // Показывать количество товаров
                        "SHOW_TOTAL_PRICE" => "Y",    // Показывать общую сумму по товарам
                        "SHOW_PRODUCTS" => "N",    // Показывать список товаров
                        "POSITION_FIXED" => "N",    // Отображать корзину поверх шаблона
                    ),
                        false
                    );
                } else { ?>
                    <a class="login" href="/auth/">Вход</a>
                    <a class="register" href="/register/">Регистрация</a>
                <? } ?>
            </div>
        </div>
    </div>
</header>
<main class="main clearfix">
    <? if ($APPLICATION->GetCurPage() != "/compare/") { ?>
    <aside class="aside">
        <?
        if (!$SECTIONCODE) {
            ?>
            <div class="catalog">
                <div class="heading">Каталог товаров</div>
                <nav class="inner_block">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "menu",
                        Array(
                            "IBLOCK_TYPE" => "1c_catalog",
                            "IBLOCK_ID" => "1",
                            "SECTION_ID" => "",
                            "SECTION_CODE" => "",
                            "COUNT_ELEMENTS" => "Y",
                            "TOP_DEPTH" => "3",
                            "SECTION_FIELDS" => array("", ""),
                            "SECTION_USER_FIELDS" => array("", ""),
                            "VIEW_MODE" => "LIST",
                            "SHOW_PARENT_NAME" => "Y",
                            "SECTION_URL" => "",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "36000000",
                            "CACHE_GROUPS" => "N",
                            "ADD_SECTIONS_CHAIN" => "N"
                        )
                    ); ?>
                    <div class="partner">
                        <? $APPLICATION->IncludeFile("/include/banner.php", Array(), Array("MODE" => "html")); ?>
                    </div>
                </nav>
            </div>
            <?
        } else {
            ?>
            <div class="catalog_inner_pages">
                <div class="heading">
                    Каталог товаров
                    <div class="catalog">
                        <nav class="inner_block">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:catalog.section.list",
                                "menu",
                                Array(
                                    "IBLOCK_TYPE" => "1c_catalog",
                                    "IBLOCK_ID" => "1",
                                    "SECTION_ID" => "",
                                    "SECTION_CODE" => "",
                                    "COUNT_ELEMENTS" => "Y",
                                    "TOP_DEPTH" => "3",
                                    "SECTION_FIELDS" => array("", ""),
                                    "SECTION_USER_FIELDS" => array("", ""),
                                    "VIEW_MODE" => "LIST",
                                    "SHOW_PARENT_NAME" => "Y",
                                    "SECTION_URL" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_GROUPS" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N"
                                )
                            ); ?>
                        </nav>
                    </div>
                </div>
                <nav class="inner_block">
                    <div class="child_block">
                        <div class="menu_column">
                            <? $APPLICATION->IncludeComponent(
                                "bitrix:catalog.section.list",
                                "menu_inner",
                                Array(
                                    "IBLOCK_TYPE" => "1c_catalog",
                                    "IBLOCK_ID" => "1",
                                    "SECTION_ID" => "",
                                    "SECTION_CODE" => $SECTIONCODE,
                                    "COUNT_ELEMENTS" => "Y",
                                    "TOP_DEPTH" => "3",
                                    "SECTION_FIELDS" => array("", ""),
                                    "SECTION_USER_FIELDS" => array("", ""),
                                    "VIEW_MODE" => "LIST",
                                    "SHOW_PARENT_NAME" => "Y",
                                    "SECTION_URL" => "",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "36000000",
                                    "CACHE_GROUPS" => "N",
                                    "ADD_SECTIONS_CHAIN" => "N"
                                )
                            ); ?>
                        </div>
                    </div>
                    <div class="partner">
                        <? $APPLICATION->IncludeFile("/include/banner.php", Array(), Array("MODE" => "html")); ?>
                    </div>
                </nav>
            </div>
            <?
        }
        ?>
        <div class="offices">
            <div class="heading">Пункты выдачи товаров</div>
            <div class="inner_block">
                <div class="your_region clearfix">
                    <div class="head_text">Ваш регион:</div>
                    <a class="choose_region" href="#">
                        <?
                        include($_SERVER["DOCUMENT_ROOT"] . '/bitrix/php_interface/lib/geo.php');
                        $opt = array();
                        $opt["charset"] = "utf-8";
                        $geo = new Geo($opt);
                        $data = $geo->get_value();
                        $reg = $geo->get_value('region');
                        echo $reg;
                        ?>
                    </a>
                </div>
                <div class="all_regions">
                    <div class="second_head_text">Наши представительства <span class="underline">в городах</span></div>
                    <? $APPLICATION->IncludeComponent("bitrix:menu", "contact", array(
                        "ROOT_MENU_TYPE" => "contact",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ), false
                    ); ?>
                </div>
            </div>
        </div>
        <div class="yandex_response">
            <? $APPLICATION->IncludeFile("/include/yandex.php", Array(), Array("MODE" => "html")); ?>

        </div>
        <div class="side_contacts">
            <h3>Наши реквизиты</h3>
            <? $APPLICATION->IncludeFile("/include/uraddress.php", Array(), Array("MODE" => "html")); ?>
        </div>
    </aside>

    <article class="article">
        <style>
/*            body .main .article .main_news_item{
                padding: 0;
                border:0;
                margin: 0;
            }

            body .main .article .main_news_item .main_news_content{
                padding: 0;
            }

            body .main .article .main_news_item .main_news_content a{
                color: #fff;
                text-decoration: none;
            }*/
        </style>
        <?$APPLICATION->IncludeComponent(
	"bitrix:search.title", 
	"visual1", 
	array(
		"CATEGORY_0" => array(
			0 => "iblock_1c_catalog",
		),
		"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS"),
		"CATEGORY_0_iblock_1c_catalog" => array(
			0 => "1",
		),
		"CATEGORY_0_iblock_catalog" => array(
			0 => "all",
		),
		"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
		"CHECK_DATES" => "N",
		"COMPONENT_TEMPLATE" => "visual1",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTAINER_ID" => "search",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"INPUT_ID" => "title-search-input",
		"NUM_CATEGORIES" => "1",
		"ORDER" => "rank",
		"PAGE" => SITE_DIR."search/",
		"PREVIEW_HEIGHT" => "75",
		"PREVIEW_TRUNCATE_LEN" => "10000",
		"PREVIEW_WIDTH" => "75",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"SHOW_INPUT" => "Y",
		"SHOW_OTHERS" => "N",
		"SHOW_PREVIEW" => "Y",
		"TOP_COUNT" => "8",
		"USE_LANGUAGE_GUESS" => "N"
	),
	false
);?>
        <?
        if ($APPLICATION->GetCurPage() != "/" && substr_count($APPLICATION->GetCurPage(), "/personal/order/") == 0) {
            $APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "bread",
                Array()
            );
        }
        if (substr_count($APPLICATION->GetCurPage(), "/contacts/") > 0) {
        ?>
        <div class="contacts">
            <div class="left_side">
                <div class="heading">Пункты выдачи товаров</div>
                <div class="punkts">
                    <div class="arrow"></div>
                    <? $APPLICATION->IncludeComponent("bitrix:menu", "contact", array(
                        "ROOT_MENU_TYPE" => "contact",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "N",
                        "MENU_CACHE_GET_VARS" => array(),
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N"
                    ),
                        false
                    ); ?>
                </div>
            </div>
            <div class="right_side">
                <?
                }
                if ($APPLICATION->GetCurPage() != "/" &&
                substr_count($APPLICATION->GetCurPage(), "/contacts/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/festool/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/catalog/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/about/news/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/about/certificates/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/support/articles/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/support/faq/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/support/video/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/actions/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/personal/cart/") == 0 &&
                !defined("ERROR_404") &&
                !defined("ERROR_403") &&
                substr_count($APPLICATION->GetCurPage(), "/register/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/auth/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/personal/order/") == 0 &&
                substr_count($APPLICATION->GetCurPage(), "/search/") == 0) {
                ?>
                <div class="main_news_item">
                    <h1 class="heading"><? $APPLICATION->ShowTitle(false) ?></h1>
                    <div class="main_news_content">
                        <? }
                        } ?>
