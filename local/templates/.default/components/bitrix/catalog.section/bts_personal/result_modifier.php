<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


foreach ($arResult["ITEMS"] as $k => $arElement) {
	if ($arElement["PROPERTIES"]["second_hand"]["VALUE"] == "Y") {
		$arResult["ITEMS"][$k]["DETAIL_PAGE_URL"] = "catalogue_bu/" . $arElement["DETAIL_PAGE_URL"];
	} else {
		$arResult["ITEMS"][$k]["DETAIL_PAGE_URL"] = "catalogue/" . $arElement["DETAIL_PAGE_URL"];
	}
}

?>