<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if($arResult["FORM_TYPE"] == "login"):?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?if($arResult["BACKURL"] <> ''):?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?endif?>
<?foreach ($arResult["POST"] as $key => $value):?>
	<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
<?endforeach?>
	<input type="hidden" name="AUTH_FORM" value="Y" />
	<input type="hidden" name="TYPE" value="AUTH" />
	<div class="heading">Войти в личный кабинет</div>
		<div class="info">Если вы уже зарегистрированы на нашем ресурсе, просто введите свой логин и пароль для входа в личный кабинет.</div>
		<div class="login_block">
			<div class="fields_row clearfix">
				<label>Логин:</label>
				<input class="login_text" type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>">
			</div>
			<div class="fields_row clearfix">
				<label>Пароль:</label>
				<input class="login_text" type="password" name="USER_PASSWORD">
			</div>
			<div class="fields_row clearfix">
				<a class="forgot_pass" href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>">Забыли пароль?</a>
				<input class="login_submit" type="submit" name="Login" value="Войти">
			</div>
		</div>
</form>


<?
//if($arResult["FORM_TYPE"] == "login")
else:
LocalRedirect("/");

endif?>
