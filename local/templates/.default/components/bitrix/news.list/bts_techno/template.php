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

if ($arResult["ITEMS"]) { ?>

    <ul class="bxslider2">
        <? foreach ($arResult["ITEMS"] as $arItem) {
            $image = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 117, "height" => 102), BX_RESIZE_IMAGE_EXACT, true);
            if ($image) {
                ?>
                <li>
                    <div class="sl_img">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img src="<?= $image['src'] ?>"
                                                                         width="<?= $image['width'] ?>"
                                                                         height="<?= $image['height'] ?>"
                                                                         alt="<?= $arResult["NAME"] ?>"/></a>
                    </div>
                    <div class="sl_ttle">
                        <p><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a></p>
                    </div>
                </li>
            <? } ?>
        <? } ?>
    </ul>
<? } ?>
