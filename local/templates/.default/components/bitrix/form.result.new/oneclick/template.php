<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult["FORM_NOTE"])) { ?>
    <div style="padding-left:20px;font-size:12px;color:green;">
        <?
        echo $arResult["FORM_NOTE"];
        ?>
    </div>
<? }
if ($arResult["isFormNote"] != "Y") { ?>
    <?= $arResult["FORM_HEADER"] ?>
    <input type="hidden" name="good" id="fgood" value="<?= $_REQUEST["good"] ?>"/>
    <? if ($arResult["isFormErrors"] == "Y"): ?>
        <div style="padding-left:20px; margin: 0px 0px 10px 0px; font-size:12px;color:red;">Ошибка! Заполните обязательные поля</div><? endif; ?>
    <?
    CModule::IncludeModule("iblock");
    $res = CIBlockElement::GetByID($_GET["PID"]);
    ?>
    <div id="prd_info">
        <?
        CModule::IncludeModule("iblock");
        CModule::IncludeModule("catalog");
        CModule::IncludeModule("sale");
        $res = CIBlockElement::GetByID($_REQUEST["good"]);
        if ($ar_res = $res->GetNext()) {
            if (intval($ar_res["DETAIL_PICTURE"]) > 0) {
                $img = CFile::ResizeImageGet($ar_res["DETAIL_PICTURE"], array('width' => 90, 'height' => 90), BX_RESIZE_IMAGE_EXACT, true);
            } else {
                $img["src"] = "/upload/no-photo_100x100.jpg";
            }
            $arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices(1, array(0 => "Цена продажи"));
            $arOffers = CIBlockPriceTools::GetOffersArray(
                array(
                    'IBLOCK_ID' => 1,
                    'HIDE_NOT_AVAILABLE' => "N",
                )
                , array(0 => $_REQUEST["good"])
                , array(
                    $arParams["OFFERS_SORT_FIELD"] => "SORT",
                    $arParams["OFFERS_SORT_FIELD2"] => "ASC",
                )
                , array()
                , array()
                , 0
                , $arResult["PRICES"]
                , "Y"
                , $arConvertParams
            );

            $minprice = 0;
            $ot = false;
            $n = 0;
            foreach ($arOffers as $arOffer) {
                foreach ($arOffer['PRICES'] as &$arOnePrices) {
                    $n++;
                    if ($arOnePrices["DISCOUNT_VALUE"] > 0 && $arOnePrices["DISCOUNT_VALUE"] < $arOnePrices["VALUE"]) {
                        $pr = $arOnePrices["DISCOUNT_VALUE"];
                    } else $pr = $arOnePrices["VALUE"];
                    if ($pr > $minprice) $minprice = $pr;
                }
            }
            if ($n > 1) $ot = true;
            ?>
            <input type="hidden" name="form_text_9" value="<?= $ar_res["NAME"] ?> [<?= $_REQUEST["good"] ?>]"/>
            <a href="<?= $ar_res["DETAIL_PAGE_URL"] ?>" class="product_image">
                <img width="90" height="90" src="<?= $img["src"] ?>" alt="<?= $ar_res["NAME"] ?>">
            </a>
            <div class="product_info">
                <a class="product_name" href="<?= $ar_res["DETAIL_PAGE_URL"] ?>"><?= $ar_res["NAME"] ?></a>
                <div class="price">цена<?= ($ot ? " от" : "") ?>: <span class="value"><?= CurrencyFormat($minprice, "RUB") ?></span></div>
                <div class="quantity">
                    <div class="quantity_title">количество:</div>
                    <input class="quantity_field" type="text" value="<?= $_REQUEST["form_text_10"] ?>" name="form_text_10">
                </div>
            </div>
            <?
        }
        ?>
    </div>
    <div class="contact_form">
        <div class="description">Заполните форму быстрого заказа,<br />наши менеджеры скоро свяжутся с Вами.</div>
        <table>
            <tr>
                <td><label for="oneclick_call_name">Ваше имя:</label></td>
                <td><input class="input_name" type="text" name="form_text_4" value="<?= $_REQUEST["form_text_4"] ?>" id="oneclick_call_name"></td>
            </tr>
            <tr>
                <td><label for="oneclick_call_city">Город:</label></td>
                <td><input class="input_name" type="text" name="form_text_45" value="<?= $_REQUEST["form_text_45"] ?>" id="oneclick_call_city"></td>
            </tr>
            <tr>
                <td><label for="oneclick_call_phone">Ваш телефон:</label></td>
                <td><input class="input_phone" type="text" name="form_text_5" value="<?= $_REQUEST["form_text_5"] ?>" id="oneclick_call_phone"></td>
            </tr>
            <tr>
                <td><label for="oneclick_call_email">Ваш e-mail:</label></td>
                <td><input class="input_email" type="text" name="form_email_6" value="<?= $_REQUEST["form_email_6"] ?>" id="oneclick_call_email"></td>
            </tr>
            <tr>
                <td><label for="oneclick_call_message">Комментарий:</label></td>
                <td><textarea class="input_textarea" name="form_textarea_7" id="oneclick_call_message"><?= $_REQUEST["form_textarea_7"] ?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="agreement">
                    <input class="agreement_checkbox" type="checkbox" value="8" name="form_checkbox_SIMPLE_QUESTION_865[]" id="agreement1">
                    <label class="compare_label" for="agreement1">Я представитель юридического лица</label>
                </td>
            </tr>
            <? if ($arResult["isUseCaptcha"] == "Y") { ?>
                <tr>
                    <td>
                        <div>
                            <input type="hidden" name="captcha_sid" value="<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>"/>
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= htmlspecialcharsbx($arResult["CAPTCHACode"]); ?>" width="180" height="40"/>
                        </div>
                    </td>
                    <td>
                        <div><?= GetMessage("FORM_CAPTCHA_FIELD_TITLE") ?><?= $arResult["REQUIRED_SIGN"]; ?></div>
                        <div><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext"/></div>
                    </td>
                </tr>
            <? } ?>
            <tr>
                <td colspan="2">
                    <input class="input_submit one_clickbuy" type="submit" value="Отправить" name="web_form_submit">
                    <input type="hidden" name="web_form_submit" value="Y"/>
                </td>
            </tr>
        </table>
    </div>
    <?= $arResult["FORM_FOOTER"] ?>
<? } //endif (isFormNote) ?>