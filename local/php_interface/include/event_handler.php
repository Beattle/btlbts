<?
AddEventHandler('sale', 'OnOrderNewSendEmail', Array("Bitrix\\VetalKms\\forms\\CFormHelper", "OnSendEmailAddOrder"));
AddEventHandler("form", "onFormValidatorBuildList", array("Bitrix\\VetalKms\\validators\\CFormCustomValidatorStringRegExp", "GetDescription"));

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "elementText1CUpdate");
function elementText1CUpdate(&$arFields)
{
    if (basename($_SERVER["PHP_SELF"]) == "1c_exchange.php") {
        unset($arFields["DETAIL_TEXT"]);
        unset($arFields["PREVIEW_TEXT"]);
    }
}

AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
// создаем обработчик события "BeforeIndex"
function BeforeIndexHandler($arFields)
{
    if(!CModule::IncludeModule("iblock")) // подключаем модуль
        return $arFields;
    if($arFields["MODULE_ID"] == "iblock")
    {
        $db_props = CIBlockElement::GetProperty(                        // Запросим свойства индексируемого элемента
            $arFields["PARAM2"],         // BLOCK_ID индексируемого свойства
            $arFields["ITEM_ID"],          // ID индексируемого свойства
            array("sort" => "asc"),       // Сортировка (можно упустить)
            Array("CODE"=>"CML2_ARTICLE")); // CODE свойства (в данном случае артикул)
        if($ar_props = $db_props->Fetch())
            $arFields["TITLE"] .= " ".$ar_props["VALUE"];   // Добавим свойство в конец заголовка индексируемого элемента
    }
    return $arFields; // вернём изменения
}




?>
