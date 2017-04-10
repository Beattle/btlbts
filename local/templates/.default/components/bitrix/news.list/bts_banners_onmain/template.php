<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true); ?>

<div class="slider">
    <ul class="bxslider">
        <? foreach ($arResult["ITEMS"] as $arItem) { ?>
            <li>
                <div class="text_catalog"><?= $arItem["PREVIEW_TEXT"] ?></div>
                <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"/>
                <a href="<?= $arItem["PROPERTIES"]["LINK"]["VALUE"] ?>" target="_blank" class="view_catalog">Просмотреть каталог</a>
            </li>
        <? } ?>
        </li>
    </ul>
</div>

