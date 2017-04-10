<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сервисная заявка");
echo"<h1>";$APPLICATION->ShowTitle();echo"</h1>";

?> 

<br /> 
<br />
 <?$APPLICATION->IncludeComponent("vetalkms:form.pusk", "template1", Array(
	"USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA)
	"OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
	"EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
		0 => "44",
	)
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?> 
<br />
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>