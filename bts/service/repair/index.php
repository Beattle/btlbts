<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "Сервисная заявка, сервисные работы, обслуживание оборудования");
$APPLICATION->SetPageProperty("keywords", "Сервисная заявка");
$APPLICATION->SetTitle("Сервисная заявка");
echo"<h1>";$APPLICATION->ShowTitle();echo"</h1>";
?> 
<br />

<br />
<?$APPLICATION->IncludeComponent("vetalkms:form.remont", "", array(
	"USE_CAPTCHA" => "Y",
	"OK_TEXT" => "Спасибо, ваше сообщение принято.",
	"EVENT_MESSAGE_ID" => array(
		0 => "45",
	)
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
<br />
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>