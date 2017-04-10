<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="events">
	<h1 class="heading"><?php echo $APPLICATION->GetTitle(); ?></h1>
	<?
		$img = CFile::ResizeImageFile($sourceFile = "/upload/medialibrary/3fa/3fa3ee7ec6b60cfc54f9f89d185d93d5.jpg",
			$destinationFile = "/upload/medialibrary/3fa/3fa3ee7ec6b60cfc54f9f89d185d93d5(642).jpg",
			array('width'=>642, 'height'=>311));
		?>
		<a class="fancybox" href="<?=$sourceFile?>"><img src="<?=$destinationFile?>"  alt="Филиалы \"Биржа Технологий\""></a>
		<?
	?>
	<br /><br /><br />
	<div class="events_items">
	<?if($arParams["DISPLAY_TOP_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
	<div class="wr_contacts">
		<ul>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<li>
			<div class="contacts_img">
			<?
				if (intval($arItem["PREVIEW_PICTURE"]["ID"])>0) {
				$img=CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width'=>150, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
					?>
						<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
							<div class="img_contacts">
								<img src="<?=$img["src"]?>" alt="<?echo $arItem["NAME"]?>">
							</div>
								<div><?echo $arItem["NAME"]?></div>

						</a>
					<?
				}
			?>

			</div>
		</li>
	<?endforeach;?>
		</ul>
	</div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
	</div>
</div>
