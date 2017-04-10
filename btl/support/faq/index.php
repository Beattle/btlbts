<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("FAQ: Вопросы и ответы");
?>
<div class="faq">
<form method="get" action="" id="sortform">
				<div class="sorting clearfix">
					<div class="sort_by">
						<div class="sort_title">Сортировать по:</div>
						<select class="sort_select" name="sort" onchange="$('#sortform').submit();">
							<option value="name" <?=($_REQUEST["sort"]=="name"?"selected":"")?>>Названию</option>
							<option value="date_active_from" <?=($_REQUEST["sort"]=="date_active_from"?"selected":"")?>>Дате добавления</option>
							
						</select>
					</div>
					<div class="show_by">
						<div class="show_title">Показывать по:</div>
						<select class="show_select" name="page" onchange="$('#sortform').submit();">
							<option value="10" <?=($_REQUEST["page"]=="10"?"selected":"")?>>10</option>
							<option value="20" <?=($_REQUEST["page"]=="20"?"selected":"")?>>20</option>
							<option value="30" <?=($_REQUEST["page"]=="30"?"selected":"")?>>30</option>
							<option value="40" <?=($_REQUEST["page"]=="40"?"selected":"")?>>40</option>
						</select>
						ответов
					</div>
					<a class="add_a_question" href="#">задать вопрос</a>
				</div>
</form>
<?
	if(empty($_REQUEST["sort"])) $sort="name";else $sort=$_REQUEST["sort"];
	if($sort=="date_active_from") $order="desc";else $order="asc";
	if(empty($_REQUEST["page"])) $page=10;else $page=$_REQUEST["page"];
	
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"faq",
	Array(
		"IBLOCK_TYPE" => "faq",
		"IBLOCK_ID" => "11",
		"NEWS_COUNT" => $page,
		"SORT_BY1" => $sort,
		"SORT_ORDER1" => $order,
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array("", ""),
		"PROPERTY_CODE" => array("", ""),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N"
	)
);?>

				
			</div>
			<?
	require($_SERVER["DOCUMENT_ROOT"]."/include/subscribe.php");
	
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>