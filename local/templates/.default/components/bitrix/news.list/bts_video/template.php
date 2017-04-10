<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="vlog">
    <div class="top_info clearfix">
        <div class="heading">Всего <?= $arResult["NAV_RESULT"]->nSelectedCount ?> <?= plural_form($arResult["NAV_RESULT"]->nSelectedCount, array("видеоролик", "видеоролика", "видеороликов")) ?></div>
        <a class="our_channel" href="https://www.youtube.com/channel/UC_C6UfipgWm5W1lmRv8IwlQ/featured">Перейти на наш канал</a>
        <br/><br/>
        <ul class="video1">
            <?
            foreach ($arResult["ITEMS"] as $arItem) {
                ?>
                <li>
                    <div class="datev"><?echo $arItem["DISPLAY_ACTIVE_FROM"] ?></div>
                    <div class="youtubev" data-text="<?= $arItem["NAME"] ?>" data-code="<?= $arItem['PROPERTIES']['VIDEO']['VALUE'] ?>" data-widthTumb="180"></div>
                </li>
            <?
            }
            ?>
        </ul>
    </div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <?=$arResult["NAV_STRING"]?>
<?endif;?>



