<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);

if ($arResult["ITEMS"]) { ?>
    <div class="personal">
        <div class="wr_h2">
            <h2>Персональные рекомендации</h2>
        </div>
        <div class="wr_per carusell3">
            <ul class="bxslider7">
                <li>
                    <? foreach ($arResult["ITEMS"] as $k => $arElement) {
                        if (!($k % 3) && $k != 0) {
                            echo "</li><li>";
                        }
                        if ($arResult["ITEMS"][$k]["DISPLAY_PROPERTIES"]["PERS_NAME"]["VALUE"]) {

                            if (intval($arResult["ITEMS"][($k)]["DETAIL_PICTURE"]["ID"]) > 0) {
                                $img = CFile::ResizeImageGet($arResult["ITEMS"][($k)]["DETAIL_PICTURE"]["ID"], array("width" => 188, "height" => 160), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
                            } else $img["src"] = "/upload/no-photo_140x100.jpg";
                            //$img["src"] = create_watermark($img["src"], "btools.ru", $_SERVER["DOCUMENT_ROOT"].'/1.ttf', 128, 128, 128, 70);
                            ?>
                            <div class="perstumb">
                                <div class="bl_img"><? echo '<img src="' . $img['src'] . '" width="' . $scale['width'] . '" height="' . $scale['height'] . '" />'; ?></div>
                                <a href="<?= $arResult["ITEMS"][($k)]["DETAIL_PAGE_URL"] ?>" class="name_pr"><?= $arResult["ITEMS"][($k)]["DISPLAY_PROPERTIES"]["PERS_NAME"]["VALUE"] ?></a>
                                <a href="<?= $arResult["ITEMS"][($k)]["DETAIL_PAGE_URL"] ?>" class="silk_bg">Купить</a>
                            </div>
                        <?php } ?>
                    <? } ?>
                </li>
            </ul>
        </div>
    </div>
<? } ?>