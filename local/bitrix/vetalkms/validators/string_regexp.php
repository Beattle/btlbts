<?
namespace Bitrix\VetalKms\validators;
// Листинг файла /local/php_interface/include/form/validators/string_regexp.php

class CFormCustomValidatorStringRegExp
{
    function GetDescription()
    {
        return array(
            "NAME"            => "custom_string_regexp",                               // идентификатор
            "DESCRIPTION"     => "Регулярное выражение",                               // наименование
            "TYPES"           => array("text", "textarea"),                            // типы полей
            "SETTINGS"        => array("Bitrix\\VetalKms\\validators\\CFormCustomValidatorStringRegExp", "GetSettings"), // метод, возвращающий массив настроек
            "CONVERT_TO_DB"   => array("Bitrix\\VetalKms\\validators\\CFormCustomValidatorStringRegExp", "ToDB"),        // метод, конвертирующий массив настроек в строку
            "CONVERT_FROM_DB" => array("Bitrix\\VetalKms\\validators\\CFormCustomValidatorStringRegExp", "FromDB"),      // метод, конвертирующий строку настроек в массив
            "HANDLER"         => array("Bitrix\\VetalKms\\validators\\CFormCustomValidatorStringRegExp", "DoValidate")   // валидатор
        );
    }

    function GetSettings()
    {
        return array(
            "REGEXP" => array(
                "TITLE"   => "Регулярное выражение",
                "TYPE"    => "TEXT",
                "DEFAULT" => '',
            ),
        );
    }

    function ToDB($arParams)
    {
        // проверка переданных параметров

        // возвращаем сериализованную строку
        return serialize($arParams);
    }

    function FromDB($strParams)
    {
        // никаких преобразований не требуется, просто вернем десериализованный массив
        return unserialize($strParams);
    }

    function DoValidate($arParams, $arQuestion, $arAnswers, $arValues)
    {
        global $APPLICATION;

        if(strlen($arParams['REGEXP']) > 0){
            foreach ($arValues as $value)
            {
                // пустые значения пропускаем
                if (strlen($value) <= 0) continue;

                if(!preg_match($arParams['REGEXP'], $value))
                {
                    // вернем ошибку
                    $APPLICATION->ThrowException("#FIELD_NAME#: неправильный формат значения");
                    return false;
                }

            }
        }

        // все значения прошли валидацию, вернем true
        return true;
    }
}

?>