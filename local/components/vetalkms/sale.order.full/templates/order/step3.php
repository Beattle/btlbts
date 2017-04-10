<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(intval($_REQUEST["delivery"])>0) $_REQUEST["DELIVERY_ID"]=$_REQUEST["delivery"];
?>
<input type="hidden" name="DELIVERY_ID" value="<?=$_REQUEST["DELIVERY_ID"]?>"/>