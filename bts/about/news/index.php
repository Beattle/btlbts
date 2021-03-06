<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetPageProperty("description", "Биржа технологий - Новости оборудования");
$APPLICATION->SetPageProperty("keywords", "новости оборудования, новости Биржа технологий ");
/*
$APPLICATION->SetPageProperty("title", "");
$APPLICATION->SetTitle("");
*/
$APPLICATION->SetTitle("Новости");
?>
    <div class="searchshotinput2"><? $APPLICATION->IncludeFile("/include/search.php", Array(), Array("MODE" => "html"));?></div>
<?$APPLICATION->IncludeComponent(
    "bitrix:news", "bts_news",
    Array(
        "IBLOCK_TYPE" => "snews",
        "IBLOCK_ID" => 18,
        "NEWS_COUNT" => "10",
        "USE_SEARCH" => "N",
        "USE_RSS" => "N",
        "USE_RATING" => "N",
        "USE_CATEGORIES" => "Y",
        "USE_REVIEW" => "N",
        "USE_FILTER" => "N",
        "FILTER_NAME" => "arEventsFilter",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "PROPERTY_DATE_BEGIN",
        "SORT_ORDER2" => "ASC",
        "CHECK_DATES" => "N",
        "SEF_MODE" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "Y",
        "CACHE_GROUPS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "USE_PERMISSIONS" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "USE_SHARE" => "N",
        "PREVIEW_TRUNCATE_LEN" => "",
        "LIST_ACTIVE_DATE_FORMAT" => "j F Y",
        "LIST_FIELD_CODE" => array(),
        "LIST_PROPERTY_CODE" => array("EMAIL", "TIME", "PLACE", "TIMING", "PHONE", "TYPE", "PRICE", "DATE_BEGIN", "DATE_END"),
        "HIDE_LINK_WHEN_NO_DETAIL" => "Y",
        "DISPLAY_NAME" => "Y",
        "META_KEYWORDS" => "-",
        "META_DESCRIPTION" => "-",
        "BROWSER_TITLE" => "-",
        "DETAIL_ACTIVE_DATE_FORMAT" => "j F Y",
        "DETAIL_FIELD_CODE" => array("", ""),
        "DETAIL_PROPERTY_CODE" => array("EMAIL", "TIME", "PLACE", "TIMING", "PHONE", "TYPE", "PRICE", "DATE_BEGIN", "DATE_END", "ADRES"),
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PAGER_TEMPLATE" => "bts_news",
        "DETAIL_PAGER_SHOW_ALL" => "N",
        "PAGER_TEMPLATE" => "new",
        "DISPLAY_TOP_PAGER" => "Y",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => '',
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "MESSAGES_PER_PAGE" => "10",
        "USE_CAPTCHA" => "Y",
        "REVIEW_AJAX_POST" => "Y",
        "PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
        "FORUM_ID" => "",
        "URL_TEMPLATES_READ" => "",
        "SHOW_LINK_TO_FORUM" => "Y",
        "POST_FIRST_MESSAGE" => "N",
        "SEF_FOLDER" => "/about/news/",
        "SEF_URL_TEMPLATES" => Array(
            "detail" => "#ELEMENT_CODE#.html"
        ),
        "VARIABLE_ALIASES" => Array(
            "detail" => Array(),
        )
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>