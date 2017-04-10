<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="events">
				<h1 class="heading">Новости</h1>
				<div class="events_items">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="item clearfix">
						<div class="left_side">
						<?
							if(intval($arItem["PREVIEW_PICTURE"]["ID"])>0)
							{
							
							$img=CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>150, 'height'=>100), BX_RESIZE_IMAGE_EXACT, true);

								?>
								<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$img["src"]?>"  alt="<?echo $arItem["NAME"]?>"></a>
								<?
								
							}
							
						?>
							
						</div>
						<div class="right_side">
							<a class="event_name" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
							<div class="event_date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
							<div class="event_description">
								<?echo $arItem["PREVIEW_TEXT"];?>
							</div>
						</div>
					</div>
	
	<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
</div>
