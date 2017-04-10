<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="events">
	<h1 class="heading"><?php echo $APPLICATION->GetTitle(); ?></h1>
	<div class="events_items">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
	<div class="wr_news">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="block_newss">
			<div class="news_img">
			<?
				if (intval($arItem["PREVIEW_PICTURE"]["ID"])>0) {
				$img=CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>153, 'height'=>92), BX_RESIZE_IMAGE_EXACT, true);
					?>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$img["src"]?>"  alt="<?echo $arItem["NAME"]?>"></a>
					<?
				}
			?>

			</div>
			<div class="news_ttle">
				<a class="news_name" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				<? if ($arItem["DISPLAY_ACTIVE_FROM"]) { ?>
					<span><?= $arItem["DISPLAY_ACTIVE_FROM"]?></span>
				<? } ?>
				<div class="event_description">
					<?= $arItem["PREVIEW_TEXT"];?>
				</div>
			</div>
		</div>

		<?endforeach;?>
	</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
</div>
