<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	CModule::IncludeModule("iblock");
	CModule::IncludeModule("catalog");
	CModule::IncludeModule("sale");
	if(intval($_REQUEST["ID"])>0)
	{
		unset($_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"][$_REQUEST["ID"]]);
	}
	if($_REQUEST["action"]=="ALL")
	{
		unset($_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"]);
	}
?>