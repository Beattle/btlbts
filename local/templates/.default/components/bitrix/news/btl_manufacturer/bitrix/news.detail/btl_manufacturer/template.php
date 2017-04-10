<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<div class="date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
<div class="main_news_content">
    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arResult["DETAIL_PICTURE"])) {
        $img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width' => 200, 'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
        ?>
        <div class="news_pic"><a title="<?= $arResult["NAME"] ?>" href="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"
                                 class="fancybox"><img src="<?= $img["src"] ?>" title="<?= $arResult["NAME"] ?>"
                                                       alt="<?= $arResult["NAME"] ?>"></a></div>
    <? } ?>
    <? echo $arResult["DETAIL_TEXT"]; ?>
</div>
<br/>
