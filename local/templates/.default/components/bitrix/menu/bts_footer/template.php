<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)){ ?>
	<?
	$z == false;
	foreach ($arResult as $arItem) {
		if ($arItem["TEXT"] == $arParams["SECT_NAME"] && $arItem["DEPTH_LEVEL"] == 1) $z = true;
		if ($arItem["TEXT"] != $arParams["SECT_NAME"] && $arItem["DEPTH_LEVEL"] == 1) $z = false;
		if ($z && $arItem["DEPTH_LEVEL"] == 2) {
			?>
			<li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
		<?
		}
	} ?>
<? } ?>