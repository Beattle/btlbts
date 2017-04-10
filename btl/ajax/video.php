<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	
	if(!empty($_POST["id"]))
	{
		CModule::IncludeModule("iblock");
		$res = CIBlockElement::GetByID(intval($_POST["id"]));
		if($obRes = $res->GetNextElement())
		{
		$props = $obRes->GetProperties();
		$ar_res = $obRes->GetFields();
		echo html_entity_decode($props["VIDEO"]["VALUE"]);
		}
	}
	
	
?>
