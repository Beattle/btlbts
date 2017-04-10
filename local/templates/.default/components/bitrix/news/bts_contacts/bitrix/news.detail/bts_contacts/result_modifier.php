<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

if ($arResult["DISPLAY_PROPERTIES"]["OURBRANCH"]["LINK_ELEMENT_VALUE"]) {

    foreach ($arResult["DISPLAY_PROPERTIES"]["OURBRANCH"]["LINK_ELEMENT_VALUE"] as $k) {
        $id[] = $k["ID"];
    }

    $arData = array();
    $arFilter = Array("IBLOCK_ID" => $arResult["DISPLAY_PROPERTIES"]["OURBRANCH"]["LINK_ELEMENT_VALUE"]["IBLOCK_ID"], "ID" => $id, "ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_DOLG", "PROPERTY_TEL", "PROPERTY_EMAIL", "PROPERTY_ZONA" );
    $resList = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    while ($obList = $resList->GetNextElement()) {
        $arListFields = $obList->GetFields();
        $arResult["DISPLAY_PROPERTIES"]["OURBRANCH"]["LINK_ELEMENT_VALUE"][$arListFields["ID"]]["PROP"] = $arListFields;
    }
}
