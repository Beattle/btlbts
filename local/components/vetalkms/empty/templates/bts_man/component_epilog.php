<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent("bitrix:form.result.new", "bts_manager", array(
    "WEB_FORM_ID" => "3",
    "IGNORE_CUSTOM_TEMPLATE" => "N",
    "USE_EXTENDED_ERRORS" => "N",
    "SEF_MODE" => "N",
    "SEF_FOLDER" => "",
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
    "LIST_URL" => "",
    "EDIT_URL" => "",
    "SUCCESS_URL" => "",
    "CHAIN_ITEM_TEXT" => "",
    "CHAIN_ITEM_LINK" => "",
    "VARIABLE_ALIASES" => array(
        "WEB_FORM_ID" => "WEB_FORM_ID",
        "RESULT_ID" => "RESULT_ID",
    )
),
    false
);
?>