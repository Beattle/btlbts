<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult["ORDER_PROP"]["USER_PROPS_Y"] as $arProperties)
{
	?>
	<input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="<?=$arProperties["VALUE"]?>"/>
	<?
}
foreach($arResult["ORDER_PROP"]["USER_PROPS_N"] as $arProperties)
{
	
	if(!empty($arProperties["VALUE"]))
	{
	?>
	<input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="<?=$arProperties["VALUE"]?>"/>
	<?
	}
}
?>