<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();



if ($arResult["PROPERTIES"]["VIDEO_STANKOV"]) {
    $arSource = $arResult["PROPERTIES"]["VIDEO_STANKOV"]["VALUE"];
    $arData = array();
    $arFilter = Array("IBLOCK_ID" => $arResult["PROPERTIES"]["VIDEO_STANKOV"]["LINK_IBLOCK_ID"], "ID" => $arSource, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_VIDEO");
    $resList = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while ($obList = $resList->GetNextElement()) {
        $arListFields = $obList->GetFields();
        $arData[$arListFields["ID"]] = $arListFields;
    }
    $arResult["PROPERTIES"]["VIDEO_STANKOV"]["VALUE"] = $arData;
}

//echo "<pre>".print_r($arSource, 1)."</pre>";
if ($arResult["PROPERTIES"]["INSTRUMENTS"]) {
    $arSource = $arResult["PROPERTIES"]["INSTRUMENTS"]["VALUE"];
    $arData = array();
    $arFilter = Array("IBLOCK_ID" => $arResult["PROPERTIES"]["INSTRUMENTS"]["LINK_IBLOCK_ID"], "ID" => $arSource, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "DATE_ACTIVE_FROM", "DETAIL_PICTURE", "DETAIL_PAGE_URL");
    $resList = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    while ($obList = $resList->GetNextElement()) {
        $arListFields = $obList->GetFields();
        $arData[$arListFields["ID"]] = $arListFields;
    }
    $arResult["PROPERTIES"]["INSTRUMENTS"]["VALUE"] = $arData;
}

if ($arResult["PROPERTIES"]["STANKI"]) {
    $arSource = $arResult["PROPERTIES"]["STANKI"]["VALUE"];
    $arData = array();
    $arFilter = Array("IBLOCK_ID" => $arResult["PROPERTIES"]["STANKI"]["LINK_IBLOCK_ID"], "ID" => $arSource, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "DATE_ACTIVE_FROM", "DETAIL_PICTURE", "DETAIL_PAGE_URL");
    $resList = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    while ($obList = $resList->GetNextElement()) {
        $arListFields = $obList->GetFields();
        $arData[$arListFields["ID"]] = $arListFields;
    }
    $arResult["PROPERTIES"]["STANKI"]["VALUE"] = $arData;
}

//echo "<pre>".print_r($arResult["PROPERTIES"], 1)."</pre>";