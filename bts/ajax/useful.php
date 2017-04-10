<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
?>
<?

if(intval($_REQUEST["idg"])>0)
{
	$commn=$APPLICATION->get_cookie("COMMENT_".$_REQUEST["idg"]);
	if(intval($commn)==0)
	{

		CModule::IncludeModule("iblock");
		$res = CIBlockElement::GetByID($_REQUEST["idg"]);
		if($obEl = $res->GetNextElement())
		{
			$props = $obEl->GetProperties();
			if(intval($_REQUEST["yes"])==1)
			{
				CIBlockElement::SetPropertyValueCode($_REQUEST["idg"], "YES", $props["YES"]["VALUE"]+1);

			}
			if(intval($_REQUEST["no"])==1)
			{
				CIBlockElement::SetPropertyValueCode($_REQUEST["idg"], "NO", $props["NO"]["VALUE"]+1);

			}
			$APPLICATION->set_cookie("COMMENT_".$_REQUEST["idg"], 1, time()+60*60*24*30*12*2);
		}
	}
}

global $cFilter;
$cFilter=array("PROPERTY_GOOD"=>$_REQUEST["id"]);

$sort="ACTIVE_FROM";
$order="DESC";
$sort2="";
$order2="";
if($_REQUEST["sort"]=="ACTIVE_FROM") {
	$sort="ACTIVE_FROM";
	$order="DESC";
}
if($_REQUEST["sort"]=="NAME") {
	$sort="NAME";
	$order="ASC";
}
if($_REQUEST["sort"]=="PROPERTY_YES") {
	$sort2="PROPERTY_YES";
	$order2="DESC";
	$sort="PROPERTY_NO";
	$order="ASC";
}

if(empty($_REQUEST["page"])) $_REQUEST["page"]=5;

	?>
	<div id="list_comm">
	<?$APPLICATION->IncludeComponent("bitrix:news.list", "comment", array(
		"IBLOCK_TYPE" => "catalogue",
		"IBLOCK_ID" => "23",
		"NEWS_COUNT" => $_REQUEST["page"],
		"SORT_BY1" => $sort,
		"SORT_ORDER1" => $order,
		"SORT_BY2" => $sort2,
		"SORT_ORDER2" => $order2,
		"FILTER_NAME" => "cFilter",
		"FIELD_CODE" => array(
		0 => "",
		1 => "",
		),
		"PROPERTY_CODE" => array(
		0 => "EMAIL",
		1 => "YES",
		2 => "NO",
		3 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d,m,Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_OPTION_ADDITIONAL" => ""
		),
	false
);?>