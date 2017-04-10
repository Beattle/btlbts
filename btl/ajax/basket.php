<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	CModule::IncludeModule("iblock");
	CModule::IncludeModule("catalog");
	CModule::IncludeModule("sale");
	
	if(intval($_REQUEST["id"])>0)
	{
		if(intval($_REQUEST["quantity"])>0)
		{
			CSaleBasket::Update($_REQUEST["id"], array("QUANTITY"=>$_REQUEST["quantity"]));
		}
		else 
		{
			CSaleBasket::Delete($_REQUEST["id"]);
		}
	}
?>