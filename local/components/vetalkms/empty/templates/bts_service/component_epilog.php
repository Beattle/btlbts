<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->IncludeComponent("bitrix:form.result.new", $arParams["FORM_NAME"], array(
    "WEB_FORM_ID" => $arParams["WEB_FORM_ID"],
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
    "VARIABLE_ALIASES" => $arParams["VARIABLE_ALIASES"]
), false
);
?>