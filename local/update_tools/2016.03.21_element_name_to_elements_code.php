<?php

/*
 * По имени элемента назначает символьный код всем элементам инфоблока
 *
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

$c = 0;


$el = new CIBlockElement;

// Получаем все элементы инфоблока
$arSelect = Array("ID", "NAME");
$arFilter = Array("IBLOCK_ID"=>"17");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);

while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    echo $arFields["ID"]." - ".$arFields["NAME"]."<br>";
    // Транслитирация имени в код
    $code =  Cutil::translit($arFields["NAME"], "ru", array("replace_space"=>"_","replace_other"=>"_"));
    echo $code . "<br />";
    // установка кода каждому элементу
    $el->Update($arFields["ID"], array("CODE" => $code));
    $c ++;
}

echo "<br /><br />Обновлено " . $c . "<br />";

