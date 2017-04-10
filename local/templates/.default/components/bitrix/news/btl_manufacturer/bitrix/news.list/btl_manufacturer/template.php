<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<h1 class="heading"><?php echo $APPLICATION->GetTitle(); ?></h1>

<div class="events_items">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
    <div class="wr_contacts">
        <ul>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <li>
                    <div class="contacts_img">
                        <?
                        $img = '';
                        if (intval($arItem["PREVIEW_PICTURE"]["ID"]) > 0) {
                            $img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], array('width' => 140, 'height' => 95), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
                        } else {
                            $img["src"] = "/upload/no-photo_220x200.jpg";
                            $img["width"] = 140;
                        }
                        ?>
                        <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
                            <div class="pre_img_contacts">
                                <div class="img_contacts">
                                    <img src="<?= $img["src"] ?>" width="<?= $img["width"] ?>"
                                         height="<?= $img["height"] ?>" alt="<? echo $arItem["NAME"] ?>">
                                </div>
                            </div>
                            <div><? echo $arItem["NAME"] ?></div>
                        </a>
                    </div>
                </li>
            <? endforeach; ?>
        </ul>
    </div>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>

