<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
?>

<div class="news">
    <div class="wr_h2">
        <h2>Новости</h2>
    </div>
    <div class="cont_news">
        <? foreach ($arResult["ITEMS"] as $arItem) {
            $image = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array("width" => 75, "height" => 52), BX_RESIZE_IMAGE_EXACT, true);
            if ($image) {
                ?>
                <div class="bl_news">
                    <div class="img_news">
                        <img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
                    </div>
                    <div class="ttle_news">
                        <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><?= $arItem["NAME"] ?></a>
                        <?= $arItem["PREVIEW_TEXT"]; ?>
                        <? if ($arItem["DISPLAY_ACTIVE_FROM"]) { ?>
                            <span><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
        <? } ?>
    </div>
    <a href="/about/news/" class="all_news">еще новости</a>
</div>
