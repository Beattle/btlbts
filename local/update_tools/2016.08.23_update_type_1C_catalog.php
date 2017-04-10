<?php

/*
 * Обходит элементы инфоблока, смотрит имеется ли html в описании и анонсе,
 * устанавливает нужный тип
 */

@set_time_limit(0);
@ignore_user_abort(true);

$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__)."/../..");

$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];


define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true);
define('CHK_EVENT', true);


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $DB;

if (!Bitrix\Main\Loader::includeModule('iblock')) {
    ShowError('Module iblock not installed. ');
    return;
}


$el = new CIBlockElement;

// Получаем все элементы инфоблока
$arSelect = Array("ID", "DETAIL_TEXT", "PREVIEW_TEXT");
$arFilter = Array("IBLOCK_ID"=>"1");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();

    $temp["DETAIL_TEXT_TYPE"] = $arFields["DETAIL_TEXT_TYPE"];
    $temp["PREVIEW_TEXT_TYPE"] = $arFields["PREVIEW_TEXT_TYPE"];

    if(preg_match('/<[a-zA-Z0-9]+.*?>/', $arFields["DETAIL_TEXT"]))
        $arFields["DETAIL_TEXT_TYPE"] = "html";
    else
        $arFields["DETAIL_TEXT_TYPE"] = "text";

    if(preg_match('/<[a-zA-Z0-9]+.*?>/', $arFields["PREVIEW_TEXT"]))
        $arFields["PREVIEW_TEXT_TYPE"] = "html";
    else
        $arFields["PREVIEW_TEXT_TYPE"] = "text";

    if($temp["DETAIL_TEXT_TYPE"] != $arFields["DETAIL_TEXT_TYPE"] || $temp["PREVIEW_TEXT_TYPE"] != $arFields["PREVIEW_TEXT_TYPE"]) {
        $el->Update($arFields["ID"], array("PREVIEW_TEXT_TYPE" => $arFields["PREVIEW_TEXT_TYPE"],
            "DETAIL_TEXT_TYPE" => $arFields["DETAIL_TEXT_TYPE"]));
    }

}

//BXClearCache(true, '/s1/bitrix/');



