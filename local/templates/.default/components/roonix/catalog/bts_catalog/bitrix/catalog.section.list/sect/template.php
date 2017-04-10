<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);


$CURRENT_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"] + 1;
$strTitle = "";

if (count($arResult["SECTIONS"]) > 0) {
?>
<br />
<div class="manufacturer_page">
	<? /*
	<div class="heading"><?= $arResult["SECTION"]["NAME"] ?></div>
 	*/ ?>
	<div class="cat clearfix">
		<ul>

			<?php
		foreach ($arResult["SECTIONS"] as $arSection) { ?>
			<li>
				<div class="tumb-section">
				<a class="catname" href="<?= $arSection["SECTION_PAGE_URL"] ?>"><?= $arSection["NAME"] ?></a><br /><br />

					<?
					if (intval($arSection["PICTURE"]["ID"]) > 0) {
						$img = CFile::ResizeImageGet($arSection["PICTURE"]["ID"], array('width' => 190, "height" => 140), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					} else $img["src"] = "/upload/no-photo_220x200.jpg";
					if (intval($arSection["PICTURE"]["ID"]) > 0) {
						?>
						<a class="catimage" href="<?= $arSection["SECTION_PAGE_URL"] ?>"><img src="<?= $img["src"] ?>" alt="<?= $arSection["NAME"] ?>"></a>
						<?
					} else {
						?>
						<a class="catimage"><img width="190" height="140" src="<?= $img["src"] ?>" alt="<?= $arSection["PICTURE"] ?>"></a>
						<?
					}
					?>
					<br />
				</div>
			</li>
		<? }  ?>
		</ul>
	</div>
</div>
<? } ?>