<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?>


<div class="login">
				<div class="left_side">
<?
if(isset($_GET["confirm_user_id"])){
    $APPLICATION->IncludeComponent("bitrix:system.auth.confirmation","",Array(
            "USER_ID" => "confirm_user_id",
            "CONFIRM_CODE" => "confirm_code",
            "LOGIN" => "login"
        )
    );
}else {
    $APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth", Array(
        "REGISTER_URL" => "/register/",    // Страница регистрации
        "FORGOT_PASSWORD_URL" => "/auth/forgot/",    // Страница забытого пароля
        "PROFILE_URL" => "/personal/",    // Страница профиля
        "SHOW_ERRORS" => "Y",    // Показывать ошибки
    ),
        false
    );
}
?>
									</div>
				<div class="right_side">
					<div class="info_text">
						Каждый зарегистрированный пользователь получает преимущества:<br />
						• индивидуальные скидки;<br />
						• доступ к специальным предложениям;<br />
						• отслеживание статуса выполнения заказа;<br />
						• информацию о новинках и акциях.<br />
						После прохождения регистрации достаточно один раз ввести свои данные, и при последующем оформлении заказа они будут появляться автоматически.
					</div>
					<a class="register" href="/register/">Регистрация</a>
					<a class="without_register" href="/">Без регистрации</a>
				</div>
			</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>