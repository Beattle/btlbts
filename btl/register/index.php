<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><div class="registration">
	<div class="left_side">
		 <?$APPLICATION->IncludeComponent(
	"roonix:main.register",
	"register",
	Array(
		"SHOW_FIELDS" => array("NAME","SECOND_NAME","LAST_NAME","PERSONAL_PHONE"),
		"REQUIRED_FIELDS" => array(),
		"AUTH" => "Y",
		"USE_BACKURL" => "Y",
		"SUCCESS_PAGE" => "/register/success.php",
		"SET_TITLE" => "N",
		"USER_PROPERTY" => array("UF_UADDRESS","UF_FADDRESS","UF_INN","UF_OGRN","UF_BIK","UF_BILL","UF_KBILL","UF_KPP","UF_BANK"),
		"USER_PROPERTY_NAME" => ""
	)
);?><br>
	</div>
</div>
<div class="right_side">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"authreg",
	Array(
		"REGISTER_URL" => "/register/",
		"FORGOT_PASSWORD_URL" => "/auth/forgot/",
		"PROFILE_URL" => "/personal/",
		"SHOW_ERRORS" => "Y"
	)
);?>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>