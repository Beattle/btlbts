<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="mfeedback">
    <? if (!empty($arResult["ERROR_MESSAGE"])) {
        foreach ($arResult["ERROR_MESSAGE"] as $v)
            ShowError($v);
    }
    if (strlen($arResult["OK_MESSAGE"]) > 0)
    {
    ?>
    <div class="mf-ok-text"><?= $arResult["OK_MESSAGE"] ?></div>
</div><?
return;
}
?><br>
<h2>Заявка на ремонтные работы</h2>
<br>
<form action="" method="POST" enctype="multipart/form-data">
    <?= bitrix_sessid_post() ?>
    <div class="mf-name">
        <div class="mf-text">
            Название организации (без кавычек) <span class="mf-req">*</span>
        </div>
        <input type="text" name="org" value="<?= $_POST["org"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            Адрес фактического местонахождения оборудования <span class="mf-req">*</span>
        </div>
        <input type="text" name="adres" value="<?= $_POST["adres"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            ФИО ответственного лица <span class="mf-req">*</span>
        </div>
        <input type="text" name="fio" value="<?= $_POST["fio"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            Телефон ответственного лица <span class="mf-req">*</span>
        </div>
        <input type="text" name="phone" value="<?= $_POST["phone"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            E-mail ответственного лица <span class="mf-req">*</span>
        </div>
        <input type="text" name="email" value="<?= $_POST["email"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            Наименование оборудования <span class="mf-req">*</span>
        </div>
        <input type="text" name="oborudovanie" value="<?= $_POST["oborudovanie"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            Заводской серийный номер
        </div>
        <input type="text" name="nomer" value="<?= $_POST["nomer"] ?>">
    </div>
    <div class="mf-name">
        <div class="mf-text">
            Описание неисправности и причины ее возникновения <span class="mf-req">*</span>
        </div>
        <input type="text" name="neispravnost" value="<?= $_POST["neispravnost"] ?>">
    </div>
    <br/>
    <div class="mf-name" id="addmail">
        <input type="button" value="Добавить картинку" style="width: 200px;" id="addmailbut"/><br/>
        <br/>
        <input name="userfile[]" type="file"/><br/>
    </div>
    <br/>
    <div style="width: 710px; text-align: justify; color:black;">Оформляя данную заявку, обязуемся обеспечить
        необходимые условия для проведения работ, соблюдения правил профбезопасности и профсанитарии, беспрепятственный
        доступ к оборудованию, а также внос и вынос необходимого инструмента, принадлежностей и технических средств
        наших специалистов. <br><br><strong>Подтверждаем, что фирменный каталог запасных частей находится у
            ответственного лица</strong>, оборудование установлено на рабочем месте, все необходимые коммуникации
        подведены, обязательные подготовительные работы выполнены, с условиями вызова наладчика СОГЛАСНЫ.
    </div>
    <br/>
    <? if ($arParams["USE_CAPTCHA"] == "Y"): ?>
        <div class="mf-captcha">
            <div class="mf-text">Защита от автоматических сообщений</div>
            <input type="hidden" name="captcha_sid" value="<?= $arResult["capCode"] ?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["capCode"] ?>" width="180" height="40"
                 alt="CAPTCHA">
            <div class="mf-text">Защита от автоматических сообщений <span class="mf-req">*</span></div>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
        </div>
    <? endif; ?>
    <input type="hidden" name="remont" value="y">
    <input type="submit" name="submit" value="Оформить заявку">
</form>
</div>