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

//echo "<pre>".print_r($arResult["PROPERTIES"]["dop_image"], 1)."</pre>";
//echo "<pre>".print_r($arResult["PROPERTIES"], 1)."</pre>";
//echo "<pre>".print_r($arItem["PROPERTIES"], 1)."</pre>";
?>
<div class="big_tovar" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
        <? if ($arResult["PROPERTIES"]["special_offer"]["VALUE"]) { ?>
            <div class="rasprodazha"></div>
        <? } ?>
        <? if ($arResult["PROPERTIES"]["action"]["VALUE"]) { ?>
            <div class="action"></div>
        <? } ?>
        <h2><?= $arResult["NAME"] ?></h2>
        <div class="slider-shop">
            <?
            if (intval($arResult["DETAIL_PICTURE"]["ID"]) > 0) {
                $img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"]["ID"], array('width' => 650), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
            } else $img["src"] = "/upload/no-photo_220x200.jpg";

            if (intval($arResult["DETAIL_PICTURE"]["ID"]) > 0) {
                ?>
                <a class="fancybox" data-fancybox-group="products" href="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>"><img src="<?= $img["src"] ?>" width="650" alt="<?= $arResult["NAME"] ?>"></a>
                <?
            } else {
                ?>
                <a><img src="<?= $img["src"] ?>" width="650" alt="<?= $arResult["NAME"] ?>"></a>
                <?
            }
            if($arResult["DISPLAY_PROPERTIES"]["HAR_FRS_PRICE"]["DISPLAY_VALUE"]) {
            ?>
                <div class="priceunderpic"><?=$arResult["DISPLAY_PROPERTIES"]["HAR_FRS_PRICE"]["DISPLAY_VALUE"];?></div>
            <? } ?>
        </div>
        <div class="mn_price">
            <div class="tabs3">
                <?php
                //echo "<pre>".print_r($arResult['DISPLAY_PROPERTIES'], 1)."</pre>";
                foreach ($arResult['DISPLAY_PROPERTIES'] as $k => $v) {
                    if (mb_substr($k, 0, 8) == 'HAR_FRS_') {
                        if($k != 'HAR_FRS_PRICE') {
                            $tab1 .= '<tr><td>' . $v['NAME'] . '</td><td>' . (is_array($v['DISPLAY_VALUE']) ? implode(' / ', $v['DISPLAY_VALUE']) : $v['DISPLAY_VALUE']) . '</td></tr>';
                        }
                    } else if (mb_substr($k, 0, 8) == 'HAR_SEC_') {
                        $tab2 .= '<tr><td>' . $v['NAME'] .'</td><td>'.(is_array($v['DISPLAY_VALUE']) ? implode(' / ', $v['DISPLAY_VALUE']) : $v['DISPLAY_VALUE'] ).'</td></tr>';
                    }

                }
                if($arResult['DISPLAY_PROPERTIES']["OTHER_HAR"]["VALUE"]["TEXT"]) {
                    $tab2 .= htmlspecialcharsBack($arResult['DISPLAY_PROPERTIES']["OTHER_HAR"]["VALUE"]["TEXT"]);
                }

                if(count($arResult['DISPLAY_PROPERTIES']["characteristics"]["VALUE"]) > 0) {
                    foreach($arResult['DISPLAY_PROPERTIES']["characteristics"]["VALUE"] as $key => $val) {
                        $tab1 .= '<tr><td>' . $val . '</td><td>' . $arResult['DISPLAY_PROPERTIES']["characteristics"]["DESCRIPTION"][$key] .'</td></tr>';
                    }
                }
                if($tab1 || $tab2) {
                    $tttab7 = true;
                }
                ?>
            </div>
        </div>
    </div>
    <br />
<?php
    if($arResult['DETAIL_TEXT'] || count($arResult["PROPERTIES"]["dop_image"]["VALUE"])>0) {
        $tttab3 = true;
    }

    if($arResult['DETAIL_TEXT'] || $arResult["PROPERTIES"]["dop_image"]["VALUE"] || $arResult["PROPERTIES"]["VIDEO_STANKOV"]["VALUE"]) {
        $tttab4 = true;
    }

    if($arResult["PROPERTIES"]["ZAPCHASTI"]["VALUE"]) {
        $tttab5 = true;
    }

    if ($arResult["PROPERTIES"]["VIDEO_STANKOV"]["VALUE"]) {
        $tttab8 = true;
    }

//$tttab3 = false;
//$tttab4 = false;
//$tttab5 = false;
$tttab6 = true;
?>


    <div class="tabs_box2">
        <ul class="tabs_menu2">

            <?php if($tttab3) { ?>
            <li class="act"><a href="#tab3" class="active">Комплектация</a></li>
            <?php } ?>
            <?php if ($tttab7) { ?>
                <li <?php echo !$tttab3 && !$tttab4 && !$tttab5 && !$tttab6 ? 'class="act"' : '' ?>>
                    <a href="#tab7" <?php echo !$tttab3 && !$tttab4 && !$tttab5 && !$tttab6 ? 'class="active"' : '' ?> >Технические характеристики</a>
                </li>
            <?php } ?>
            <?php if($tttab4) { ?>
            <li <?php echo !$tttab3 ? 'class="act"' : '' ?> >
                <a href="#tab4" <?php echo !$tttab3 ? 'class="active"' : '' ?> >Отличительные особенности</a>
            </li>
            <?php } ?>
            <?php if ($tttab5) { ?>
            <li <?php echo !$tttab3 && !$tttab4 ? 'class="act"' : '' ?> >
                <a href="#tab5" <?php echo !$tttab3 && !$tttab4 ? 'class="active"' : '' ?> >Запчасти</a>
            </li>
            <?php } ?>
            <?php if ($tttab8) { ?>
                <li <?php echo !$tttab3 && !$tttab4 && !$tttab5 && !$tttab6 && !$tttab7 ? 'class="act"' : '' ?>>
                    <a href="#tab8" <?php echo !$tttab3 && !$tttab4 && !$tttab5 && !$tttab6 && !$tttab7 ? 'class="active"' : '' ?> >Видео</a>
                </li>
            <?php } ?>
            <?php if ($tttab6) { ?>
            <li <?php echo !$tttab3 && !$tttab4 && !$tttab5 ? 'class="act"' : '' ?>>
                <a href="#tab6" <?php echo !$tttab3 && !$tttab4 && !$tttab5 ? 'class="active"' : '' ?> >Отзывы </a>
            </li>
            <?php } ?>

        </ul>
<?php if($tttab3) { ?>
        <div class="tab2" id="tab3">
            <div class="commodities">
                <div class="h4"><?= $arResult['PREVIEW_TEXT'] ?></div>
            </div>

        <? if(count($arResult["PROPERTIES"]["dop_image"]["VALUE"])>0) {?>
            <div class="dopinfo">
                <ul>
                    <? foreach($arResult["PROPERTIES"]["dop_image"]["VALUE"] as $key => $val) {

                        if (intval($val) > 0) {
                            $img = CFile::ResizeImageGet($val, array('width' => 240, "height" => 200), BX_RESIZE_IMAGE_EXACT, true);
                        } else $img["src"] = "/upload/no-photo_220x200.jpg";
                        ?>
                        <li>
                            <div class="iteminfo">
                                <div class="itemimage"><a class="fancybox" data-fancybox-group="products" href="<?= CFile::GetPath($arResult["PROPERTIES"]["dop_image"]["VALUE"][($key)]) ?>"><img src="<?= $img["src"] ?>" alt="<?= $arResult["NAME"] ?>"></a></div>
                                <div class="itemtext"><?=$arResult["PROPERTIES"]["dop_text"]["~VALUE"][$key]["TEXT"]?></div>
                            </div>
                        </li>
                    <? } ?>
                </ul>
            </div>
        <? } ?>
        </div>
<?php } ?>
<?php if($tttab4) { ?>
        <div class="tab2" id="tab4" <?php echo !$tttab3 ? 'style="display: block;"' : '' ?>>
            <div class="features">
                <div class="h4"><?= $arResult['DETAIL_TEXT'] ?></div>
                <? if ($arResult["PROPERTIES"]["dop_image"]["VALUE"]) { ?>
                <div class="carusell carusell2 carusell_ind">
                    <h2>Галерея</h2>
                    <ul class="bxslider7">
                        <?php
                            foreach ($arResult["PROPERTIES"]["dop_image"]["VALUE"] as $k => $v) {
                                if (($k % 2) - 1) {
                                    echo "<li><div>";
                                    $image = CFile::ResizeImageGet($arResult["PROPERTIES"]["dop_image"]["VALUE"][($k)], array("width" => 162, "height" => 108), BX_RESIZE_IMAGE_EXACT, true);
                                    if ($image) {
                                        ?>
                                        <a class="fancybox" href="<?= CFile::GetPath($arResult["PROPERTIES"]["dop_image"]["VALUE"][($k)]) ?>">
                                            <img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
                                        </a>
                                        <?php
                                    }
                                    if ($k + 1) {
                                        $image = CFile::ResizeImageGet($arResult["PROPERTIES"]["dop_image"]["VALUE"][($k + 1)], array("width" => 162, "height" => 108), BX_RESIZE_IMAGE_EXACT, true);
                                        if ($image) {
                                            ?>
                                            <a class="fancybox" href="<?= CFile::GetPath($arResult["PROPERTIES"]["dop_image"]["VALUE"][($k + 1)]) ?>">
                                                <img src="<?= $image['src'] ?>" width="<?= $image['width'] ?>" height="<?= $image['height'] ?>" alt="<?= $arResult["NAME"] ?>"/>
                                            </a>
                                            <?php
                                        }
                                    }
                                    echo "</div></li>";
                                }

                            }

                        ?>
                    </ul>
                </div>
                <?php } ?>
            </div>
        </div>
<?php } ?>
<?php if ($tttab5) { ?>
        <div class="tab2" id="tab5" <?php echo !$tttab3 && !$tttab4 ? 'style="display: block;' : '' ?>>
            <div class="expense">
                <? if ($arResult["PROPERTIES"]["ZAPCHASTI"]["VALUE"]) { ?>
                    <div class="carusell">
                        <ul class="zapchasti">
                            <?php
                            foreach ($arResult["PROPERTIES"]["ZAPCHASTI"]["VALUE"] as $k => $v) {
                                $image = CFile::ResizeImageGet($v["DETAIL_PICTURE"], array("width" => 119, "height" => 103), BX_RESIZE_IMAGE_EXACT, true);
                                $zpach .= "<li style='height: 260px;'><div class='zp_prodduct'>";
                                $zpach .= '<div>';
                                if ($image) {
                                    $zpach .= '<img src="' . $image['src'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '" alt="' . $arResult["NAME"] . '"/>';
                                } else {
                                    $zpach .= '<img src="/upload/no-photo_220x200.jpg" width="119" height="119" alt="' . $arResult["NAME"] . '"/>';
                                }
                                $zpach .= '</div>
                                               <a href="' . ("http://btools.ru" . $v["DETAIL_PAGE_URL"]) . '" class="name_pr" target="_blank">' . TruncateText($v["NAME"], 60) . '</a>';

                                if ($v["PROPS"]["PRICES"]['MAX_PRICE']["DISCOUNT_VALUE"] < $v["PROPS"]["PRICES"]['MAX_PRICE']["VALUE"]) {
                                    $zpach .= '<p>' . $v["PROPS"]["PRICES"]['MAX_PRICE']["PRINT_DISCOUNT_VALUE"] . ' <span>Руб</span></p>';
                                } else {
                                    $zpach .= '<p>' . $v["PROPS"]["PRICES"]['MAX_PRICE']["PRINT_VALUE"] . ' <span>Руб</span></p>';

                                }

                                $zpach .= '<a href="' . ("http://btools.ru" . $v["DETAIL_PAGE_URL"]) . '" class="silk_bg" target="_blank">Купить</a>';
                                $zpach .= "</div></li>";
                            }
                            echo $zpach;
                            //$img["src"] = "/upload/no-photo_220x200.jpg";
                            ?>
                        </ul>
                    </div>
                <? } ?>
            </div>
        </div>
<?php } ?>

<?php
if ($tttab8) { ?>
    <div class="tab2" id="tab8">
        <?php
        foreach ($arResult["PROPERTIES"]["VIDEO_STANKOV"]["VALUE"] as $k => $v) { ?>
            <div class="videoblock">
                <iframe src="//www.youtube.com/embed/<?=$v['PROPERTY_VIDEO_VALUE']?>?rel=0&autoplay=0" style="width: 650px; height: 500px; display: block;" frameborder="0" /></iframe>
            </div>
        <?php } ?>
    </div>
<? } ?>
<?php if ($tttab6) { ?>
        <div class="tab2" id="tab6" <?php echo !$tttab3 && !$tttab4 && !$tttab5 ? 'style="display: block;' : '' ?>>
            <div class="reviews_tab">
                <div class="heading">Отзывы об <?= $arResult["NAME"] ?></div>
                <div class="catalog_sorting clearfix">
                    <div class="sort_by">
                        <div class="sort_title">Сортировать по:</div>
                        <select class="sort_select" name="sort">
                            <option value="ACTIVE_FROM">Дате добавления</option>
                            <option value="PROPERTY_YES">Популярности</option>

                            <option value="NAME">Названию</option>

                        </select>
                    </div>
                    <div class="show_by">
                        <div class="show_title">Показывать по:</div>
                        <select class="show_select" name="page">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        отзывов
                    </div>
                    <a class="add_a_review" href="<?= $arResult["ID"] ?>">написать отзыв</a>
                </div>
                <?
                global $cFilter;
                $cFilter = array("PROPERTY_GOOD" => $arResult["ID"]);

                ?>
                <div id="list_comm">
                    <? $APPLICATION->IncludeComponent("bitrix:news.list", "comment", array(
                        "IBLOCK_TYPE" => "catalogue",
                        "IBLOCK_ID" => "23",
                        "NEWS_COUNT" => "5",
                        "SORT_BY1" => "ACTIVE_FROM",
                        "SORT_ORDER1" => "DESC",
                        "SORT_BY2" => "",
                        "SORT_ORDER2" => "",
                        "FILTER_NAME" => "cFilter",
                        "FIELD_CODE" => array(
                            0 => "",
                            1 => "",
                        ),
                        "PROPERTY_CODE" => array(
                            0 => "EMAIL",
                            1 => "YES",
                            2 => "NO",
                            3 => "",
                        ),
                        "CHECK_DATES" => "Y",
                        "DETAIL_URL" => "",
                        "AJAX_MODE" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "Y",
                        "AJAX_OPTION_HISTORY" => "N",
                        "CACHE_TYPE" => "A",
                        "CACHE_TIME" => "36000000",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "Y",
                        "PREVIEW_TRUNCATE_LEN" => "",
                        "ACTIVE_DATE_FORMAT" => "d,m,Y",
                        "SET_STATUS_404" => "N",
                        "SET_TITLE" => "N",
                        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                        "ADD_SECTIONS_CHAIN" => "N",
                        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                        "PARENT_SECTION" => "",
                        "PARENT_SECTION_CODE" => "",
                        "INCLUDE_SUBSECTIONS" => "Y",
                        "PAGER_TEMPLATE" => "",
                        "DISPLAY_TOP_PAGER" => "N",
                        "DISPLAY_BOTTOM_PAGER" => "Y",
                        "PAGER_TITLE" => "",
                        "PAGER_SHOW_ALWAYS" => "N",
                        "PAGER_DESC_NUMBERING" => "N",
                        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                        "PAGER_SHOW_ALL" => "N",
                        "DISPLAY_DATE" => "Y",
                        "DISPLAY_NAME" => "Y",
                        "DISPLAY_PICTURE" => "N",
                        "DISPLAY_PREVIEW_TEXT" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => ""
                    ),
                        false
                    ); ?>
                </div>

            </div>
        </div>
<?php }
if ($tttab7) { ?>
    <div class="tab2" id="tab7">
        <div class="tabs_box3">
            <ul class="tabs_menu3">
                <li><a href="#tab9" class="active">Основные</a></li>
                <li><a href="#tab10">Подробные</a></li>
            </ul>
            <div class="tab3" id="tab9">
                <table>
                    <?= $tab1 ?>
                </table>
            </div>
            <div class="tab3" id="tab10">
                <table>
                    <?= $tab2 ?>
                </table>
            </div>
        </div>
    </div>
<? } ?>

        <div style="clear: both;"></div>
    </div>

        <? if ($arResult["PROPERTIES"]["INSTRUMENTS"]["VALUE"]) { ?>
            <div class="carusell">
                <h2>С этим оборудованием заказывают</h2>
                <ul class="bxslider5">
                    <?php
                    foreach ($arResult["PROPERTIES"]["INSTRUMENTS"]["VALUE"] as $k => $v) {

                        $instr .= "<li style='height: 260px;'><div class=\"bl_prodduct\">";
                        $image = CFile::ResizeImageGet($v["DETAIL_PICTURE"], array("width" => 119, "height" => 103), BX_RESIZE_IMAGE_EXACT, true);
                        if ($image) {
                            $instr .= '
                                    <div class="bl_img">
                                        <img src="'.$image['src'].'" width="'.$image['width'].'" height="'. $image['height'].'" alt="'.$arResult["NAME"]. '"/>
                                    </div>
                                    <a href="'.("http://btools.ru" . $v["DETAIL_PAGE_URL"]).'" class="name_pr" target="_blank">'.TruncateText($v["NAME"], 70).'</a>';
                            if ($v["PROPS"]["PRICES"]['MAX_PRICE']["DISCOUNT_VALUE"] < $v["PROPS"]["PRICES"]['MAX_PRICE']["VALUE"]) {
                                $instr .= '<p>' . $v["PROPS"]["PRICES"]['MAX_PRICE']["PRINT_DISCOUNT_VALUE"] . ' <span>Руб</span></p>';
                            } else {
                                $instr .= '<p>' . $v["PROPS"]["PRICES"]['MAX_PRICE']["PRINT_VALUE"] . ' <span>Руб</span></p>';

                            }
                            $instr .= '<a href="'.("http://btools.ru" . $v["DETAIL_PAGE_URL"]).'" class="silk_bg" target="_blank">Купить</a>';
                        }
                        $instr .= "</div></li>";
                    }
                    echo $instr;
                    ?>
                </ul>
            </div>
        <? } ?>
        <? //echo "<pre>".print_r($arResult["PROPERTIES"]["STANKI"]["VALUE"], 1)."</pre>"; ?>
        <? if ($arResult["PROPERTIES"]["STANKI"]["VALUE"]) { ?>
            <div class="carusell">
                <h2>Оборудование, которое могло бы  вас заинтересовать</h2>
                <ul class="bxslider5">
                    <?php
                    foreach ($arResult["PROPERTIES"]["STANKI"]["VALUE"] as $k => $v) {
                        //echo "<pre>".print_r($v["PROPS"]["second_hand"]["VALUE"], 1)."</pre>";
                        $stan .= "<li style='height: 260px;'><div class=\"bl_prodduct\">";
                        $image = CFile::ResizeImageGet($v["DETAIL_PICTURE"], array("width" => 119, "height" => 103), BX_RESIZE_IMAGE_EXACT, true);
                        if ($image) {
                            $stan .= '
                                    <div class="bl_img">
                                        <img src="'.$image['src'].'" width="'.$image['width'].'" height="'. $image['height'].'" alt="'.$arResult["NAME"]. '"/>
                                    </div>
                                    <a href="'.("http://www.btstanki.ru" . ($v["PROPS"]["second_hand"]["VALUE"] == "Y" ? "/catalogue_bu" : "/catalogue") . $v["DETAIL_PAGE_URL"]).'" class="name_pr" target="_blank">'.TruncateText($v["NAME"], 70).'</a>
                                    <a href="" class="silk_bg uznat">Узнать</a>
                                    ';
                        }
                        $stan .= "</div></li>";
                    }
                    echo $stan;
                    ?>
                </ul>
            </div>
        <? } ?>

        <a href="#popup2" class="fancybox managvopr">Задать вопрос менеджеру</a>

