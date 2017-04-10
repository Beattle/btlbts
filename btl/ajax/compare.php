<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	
$APPLICATION->IncludeComponent(
		"bitrix:catalog.compare.list",
		"compare",
		array(
			"IBLOCK_TYPE" => "1c_catalog",
			"IBLOCK_ID" => "1",
			"NAME" => "CATALOG_COMPARE_LIST",
			"DETAIL_URL" => "/catalog/#SECTION_CODE_PATH#/#ELEMENT_CODE#.html",
			"COMPARE_URL" => "/catalog/compare.php?action=#ACTION_CODE#",
		),
		$component
	);
		echo count($_SESSION["CATALOG_COMPARE_LIST"][1]["ITEMS"]);
		
	?>