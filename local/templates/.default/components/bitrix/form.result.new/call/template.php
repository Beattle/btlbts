<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
    <div class="description">
        <?
        if (empty($arResult["FORM_ERRORS_TEXT"]) && empty($arResult["FORM_NOTE"])) {
            ?>
            Заполните, пожалуйста, следующие поля,<br />чтобы наш оператор смог связаться с Вами
            <?
        }

        ?>

        <? if ($arResult["isFormErrors"] == "Y"): ?>
            <div style="color:red;">Не заполнены обязательные поля</div><? endif; ?>

        <div style="color:green;"><?= $arResult["FORM_NOTE"] ?></div>
    </div>
<? if ($arResult["isFormNote"] != "Y") {
    ?>
    <?= $arResult["FORM_HEADER"] ?>
    <table>
        <tr>
            <td><label for="order_call_name">Ваше имя:</label></td>
            <td><input class="input_name" type="text" name="form_text_1" value="<?= $_REQUEST["form_text_1"] ?>" id="order_call_name"></td>
        </tr>
        <tr>
            <td><label for="order_call_phone">Ваш телефон:</label></td>
            <td><input class="input_phone" type="text" name="form_text_2" value="<?= $_REQUEST["form_text_2"] ?>" id="order_call_phone"></td>
        </tr>
        <tr>
            <td><label for="order_call_city">Город:</label></td>
            <td><input class="input_city" type="text" name="form_text_27" value="<?= $_REQUEST["form_text_27"] ?>" id="order_call_city"></td>
        </tr>
        <tr>
            <td><label for="order_call_message">Комментарий:</label></td>
            <td><textarea class="input_textarea" name="form_textarea_3" id="order_call_message"><?= $_REQUEST["form_textarea_3"] ?></textarea></td>
        </tr>
        <?
        if($arResult["isUseCaptcha"] == "Y") { ?>
            <tr>
                <td>
                    <div>
                        <input type="hidden" name="captcha_sid" value="<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" /><img src="/bitrix/tools/captcha.php?captcha_sid=<?=htmlspecialcharsbx($arResult["CAPTCHACode"]);?>" width="180" height="40" />
                    </div>
                </td>
                <td>
                    <div><?=GetMessage("FORM_CAPTCHA_FIELD_TITLE")?><?=$arResult["REQUIRED_SIGN"];?></div>
                    <div><input type="text" name="captcha_word" size="30" maxlength="50" value="" class="inputtext" /></div>
                </td>
            </tr>
        <? } ?>
        <tr>
            <td colspan="2"><input class="input_submit" type="submit" id="fcallsubm" value="Отправить"></td>
        </tr>
    </table>
    <input type="hidden" name="web_form_apply" value="Y"/>

    <?= $arResult["FORM_FOOTER"] ?>
<? } //endif (isFormNote) ?>
