<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
?>


<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>


<div class="heading">Регистрация</div>
					<div class="info">
					
					Для продолжения оформления заказа войдите в личный кабинет или введите свои данные в форму регистрации, если вы новый покупатель.
					<br/>
					<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
		{
			if($_REQUEST["group"]==6 && $key=="NAME")
			{
				$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;Наименование организации&quot;", $error);
			}
			else $arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);
			}

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

					</div>
					<div class="register_block">
						<div class="register_tabs_nav clearfix">
							<a class="fis_register active" href="#" rel="5">Физическое лицо</a>
							<a class="iur_register" href="#" rel="6">Юридическое лицо</a>
						</div>
						<div class="form_question">
						<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;


?>
<input type="hidden" name="group" value="5" class="rgroup"/>

							<div class="mini_heading">Ваши контактные данные:</div>
							<div class="fields_row clearfix">
								<label>Фамилия:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="REGISTER[LAST_NAME]" value="<?=$arResult["VALUES"]["LAST_NAME"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Имя:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="REGISTER[NAME]" value="<?=$arResult["VALUES"]["NAME"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Отчество:</label>
								<input class="login_text" type="text" name="REGISTER[SECOND_NAME]" value="<?=$arResult["VALUES"]["SECOND_NAME"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>E-mail:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="REGISTER[EMAIL]" value="<?=$arResult["VALUES"]["EMAIL"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Пароль:<span class="blue">*</span></label>
								<input class="login_text" type="password" name="REGISTER[PASSWORD]" value="<?=$arResult["VALUES"]["PASSWORD"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Повторите пароль:<span class="blue">*</span></label>
								<input class="login_text" type="password" name="REGISTER[CONFIRM_PASSWORD]" value="<?=$arResult["VALUES"]["CONFIRM_PASSWORD"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Телефон:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="REGISTER[PERSONAL_PHONE]" value="<?=$arResult["VALUES"]["PERSONAL_PHONE"]?>">
							</div>
							
							<div class="fields_row clearfix">
								<label><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="blue">*</span></label>
								<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				
								
								
							</div>
							<div class="fields_row clearfix">
							<label>&nbsp;</label>
							<input class="login_text" type="text" name="captcha_word" maxlength="50" value="">
							</div>
							<div class="fields_row clearfix">
								<input class="register_checkbox" type="checkbox" name="register_checkbox" id="register_checkbox" value="Y" <?=($_REQUEST["register_checkbox"]=="Y"?"checked":"")?>>
								<label class="register_checkbox_label" for="register_checkbox">Я согласен (-на) на получение уведомлений о состоянии моих заказов и информации от магазина</label>
							</div>
							<input class="register_submit" type="submit" id="reg_butt1" name="register_submit_button" value="Зарегистрироваться" <?=($_REQUEST["register_checkbox"]=="Y"?"":"disabled")?>>
							</form>
						</div>
						<div class="form_question">
						<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>
<input type="hidden" name="group" value="6" class="rgroup"/>

							<div class="mini_heading">Данные организации:</div>
							<div class="fields_row clearfix">
								<label>Наименование организации:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="REGISTER[NAME]" value="<?=$arResult["VALUES"]["NAME"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>E-mail:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="REGISTER[EMAIL]" value="<?=$arResult["VALUES"]["EMAIL"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Юридический адрес:<span class="blue">*</span></label>
								<input class="login_text" type="text" name="UF_UADDRESS" value="<?=$arResult["VALUES"]["UF_UADDRESS"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Фактический адрес:</label>
								<input class="login_text" type="text" name="UF_FADDRESS" value="<?=$arResult["VALUES"]["UF_FADDRESS"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>ИНН:</label>
								<input class="login_text" type="text" name="UF_INN" value="<?=$arResult["VALUES"]["UF_INN"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>ОГРН:</label>
								<input class="login_text" type="text" name="UF_OGRN" value="<?=$arResult["VALUES"]["UF_OGRN"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>БИК банка:</label>
								<input class="login_text" type="text" name="UF_BIK" value="<?=$arResult["VALUES"]["UF_BIK"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Рассчетный счет:</label>
								<input class="login_text" type="text" name="UF_BILL" value="<?=$arResult["VALUES"]["UF_BILL"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Корреспондентский счет:</label>
								<input class="login_text" type="text" name="UF_KBILL" value="<?=$arResult["VALUES"]["UF_KBILL"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>КПП:</label>
								<input class="login_text" type="text" name="UF_KPP" value="<?=$arResult["VALUES"]["UF_KPP"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Наименование банка:<span class="blue">*</span></label>
								<input class="login_text" name="UF_BANK" value="<?=$arResult["VALUES"]["UF_BANK"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Пароль:<span class="blue">*</span></label>
								<input class="login_text" type="password" name="REGISTER[PASSWORD]" value="<?=$arResult["VALUES"]["PASSWORD"]?>">
							</div>
							<div class="fields_row clearfix">
								<label>Повторите пароль:<span class="blue">*</span></label>
								<input class="login_text" type="password" name="REGISTER[CONFIRM_PASSWORD]" value="<?=$arResult["VALUES"]["CONFIRM_PASSWORD"]?>">
							</div>
							<div class="fields_row clearfix">
								<label><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="blue">*</span></label>
								<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
				
								
								
							</div>
							<div class="fields_row clearfix">
							<label>&nbsp;</label>
							<input class="login_text" type="text" name="captcha_word" maxlength="50" value="">
							</div>
							
							<div class="fields_row clearfix">
								<input class="register_checkbox" type="checkbox" name="register_checkbox2" id="register_checkbox2" value="Y" <?=($_REQUEST["register_checkbox2"]=="Y"?"checked":"")?>>
								<label class="register_checkbox_label" for="register_checkbox2">Я согласен (-на) на получение уведомлений о состоянии моих заказов и информации от магазина</label>
							</div>
							<input class="silk_bg button_bg" type="submit" id="reg_butt2" name="register_submit_button" value="Зарегистрироваться" <?=($_REQUEST["register_checkbox2"]=="Y"?"":"disabled")?>>
							</form>
						</div>

<script>
//.register_tabs_nav a
$( document ).ready(function() {
	<?
		if($_REQUEST["group"]==6)
		{
			?>
			$(".register_tabs_nav a.iur_register").trigger("click");
			<?
		}
		
	?>
	
});
</script>

<?endif?>
