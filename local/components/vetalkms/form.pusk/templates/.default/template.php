<?if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();?>
<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{
	?><div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div></div><?
	return;
}
?><br>
<h2>Заявка на пусконаладочные работы</h2>
<br>
<form action="" method="POST">
<?=bitrix_sessid_post()?>
	<div class="mf-name">
		<div class="mf-text">
			Название организации<span class="mf-req">*</span>
		</div>
		<input type="text" name="org" value="<?=$_POST["org"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			Адрес<span class="mf-req">*</span>
		</div>
		<input type="text" name="adres" value="<?=$_POST["adres"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			Дата и номер договора<span class="mf-req">*</span>
		</div>
		<input type="text" name="date" value="<?=$_POST["date"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			Телефон<span class="mf-req">*</span>
		</div>
		<input type="text" name="phone" value="<?=$_POST["phone"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			ФИО ответственного лица<span class="mf-req">*</span>
		</div>
		<input type="text" name="fio" value="<?=$_POST["fio"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			Наименование оборудования<span class="mf-req">*</span>
		</div>
		<input type="text" name="oborudovanie" value="<?=$_POST["oborudovanie"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			Год выпуска<span class="mf-req">*</span>
		</div>
		<input type="text" name="year" value="<?=$_POST["year"]?>">
	</div>
	<div class="mf-name">
		<div class="mf-text">
			Заводской номер<span class="mf-req">*</span>
		</div>
		<input type="text" name="nomer" value="<?=$_POST["nomer"]?>">
	</div>
	<?if($arParams["USE_CAPTCHA"] == "Y"):?>
	<div class="mf-captcha">
		<div class="mf-text">Защита от автоматических сообщений</div>
		<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
		<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
		<div class="mf-text">Введите слово на картинке<span class="mf-req">*</span></div>
		<input type="text" name="captcha_word" size="30" maxlength="50" value="">
	</div>
	<?endif;?>
	<input type="hidden" name="pusk" value="y">
	<input type="submit" name="submit" value="Оформить заявку">
</form>
</div>