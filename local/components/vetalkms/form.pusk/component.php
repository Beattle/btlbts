<?

if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" /*&& !$USER->IsAuthorized()*/) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if(strlen($arParams["EVENT_NAME"]) <= 0)
	$arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if(strlen($arParams["EMAIL_TO"]) <= 0)
	$arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if(strlen($arParams["OK_TEXT"]) <= 0)
	$arParams["OK_TEXT"] = "Спасибо, ваше сообщение принято.";
$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if(strlen($arParams["IBLOCK_TYPE"])<=0)
 	$arParams["IBLOCK_TYPE"] = "catalogue";
 	
 	// /home/bt-f/bt-f.ru/docs/btf/upload/
 	// /var/tmp/
/*
echo "<pre>";
echo print_r($arParams); 
echo "</pre>";
echo "<pre>";
echo print_r($_POST); 
echo "</pre>";
exit();			
*/ 	
if(!CModule::IncludeModule("iblock"))
{
	ShowError("Модуль информационных блоков не подключен!");
	return;
}

if($_SERVER["REQUEST_METHOD"] == "POST" && strlen($_POST["submit"]) > 0 && $_POST["pusk"] == "y")
{
	if(check_bitrix_sessid())
	{	
		// Выбираем группы пользователя
		$arGroups = CUser::GetUserGroup($USER->GetId());
		// 3 - Зарегистрированные пользователи
		// 4 - Пользователь-клиент
		if(!in_array(4,$arGroups))
		{
			//$arResult["ERROR_MESSAGE"][] = "У вас нет прав на оформление заявки!";
		}
		// Проверка обязательных полей
		if(strlen($_POST["org"]) <= 1)
		{
			$arResult["ERROR_MESSAGE"][] = "Вы не ввели Название организации";
		}
		if(strlen($_POST["adres"]) <= 1)
		{
			$arResult["ERROR_MESSAGE"][] = "Вы не ввели Адрес";
		}
		if(strlen($_POST["fio"]) <= 1)
		{
			$arResult["ERROR_MESSAGE"][] = "Вы не ввели ФИО ответственного лица";
		}
		if(strlen($_POST["phone"]) <= 1)
		{
			$arResult["ERROR_MESSAGE"][] = "Вы не ввели Телефон";
		}
		if(strlen($_POST["email"]) <= 1)
		{
			$arResult["ERROR_MESSAGE"][] = "Вы не ввели Email";
		}
		if(strlen($_POST["oborudovanie"]) <= 1)
		{
			$arResult["ERROR_MESSAGE"][] = "Вы не ввели наименование оборудования";
		}
		if($arParams["USE_CAPTCHA"] == "Y")
		{
			include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
			$captcha_code = $_POST["captcha_sid"];
			$captcha_word = $_POST["captcha_word"];
			$cpt = new CCaptcha();
			$captchaPass = COption::GetOptionString("main", "captcha_password", "");
			if (strlen($captcha_word) > 0 && strlen($captcha_code) > 0)
			{
				if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
					$arResult["ERROR_MESSAGE"][] = "Неверно указан код защиты от автоматических сообщений.";
			}
			else
				$arResult["ERROR_MESSAGE"][] = "Не указан код защиты от автоматических сообщений.";

		}

		
		if(!isset($arResult["ERROR_MESSAGE"]))
		{
			
			
		 	include "../../../../lib/PHPMailer/class.phpmailer.php";
		 	$mail = new PHPMailer();
		 	
			$message = "Название организации - ".$_POST["org"]."<br />";
			$message .= "Адрес  - ".$_POST["adres"]."<br />";
			$message .= "ФИО ответственного лица - ".$_POST["fio"]."<br />";
			$message .= "Телефон - ".$_POST["phone"]."<br />";
			$message .= "Почта - ".$_POST["email"]."<br />";
			$message .= "Наименование оборудования - ".$_POST["oborudovanie"]."<br />";
			$message .= "Заводской номер - ".$_POST["nomer"]."<br /><br /><br />";

			$mail->Host       = "mail.btstanki.ru";
			$mail->SMTPAuth   = true;
			$mail->Port       = 25;
			$mail->Username   = 'scm-ru.ru\noreply@btstanki.ru';
			$mail->Password   = "noreplybtstanki";
			
			$mail->From = $arParams["EMAIL_TO"];
			$mail->FromName = "Заявка с сайта";
			$mail->AddAddress("service@btstanki.ru");
			$mail->AddAddress("info@btstanki.ru");
			$mail->AddAddress("td-bt@mail.ru");
			$mail->AddAddress("gromilt@gmail.com");

			$mail->IsHTML(true);
			$mail->Subject = "Заявка на пусконаладочные работы";
			$mail->CharSet = "UTF-8";
/*			
			$uploaddir = '/home/bt-f/bt-f.ru/docs/btf/upload/';
			$i = 0;
			foreach ($_FILES['userfile']['name'] as $names){
				if($names){		
					$uploadfile = $uploaddir . basename(mktime()."-".$_FILES['userfile']['name'][$i]);
					//$filespath[] = $_FILES['userfile']['name'][$i];
					
					
					if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $uploadfile)) {
						$message .= "<br /><br /><a href='http://btstanki.ru/upload/".mktime()."-".$_FILES['userfile']['name'][$i]."'><img src='http://btstanki.ru/upload/".mktime()."-".$_FILES['userfile']['name'][$i]."' /></a>";
					//$mail->AddAttachment($_FILES['userfile']['name'][$i]);
					   //echo "Файл был загружен.\n";
					} else {
					   echo "Не могу загрузить файл!\n";
					}
					/*
					if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
						echo "Файл был загружен";
					}
					*/
/*			
					$i++;
				}
				
			}
*/			
			//$mailer->FromName = iconv('UTF-8', 'koi8-r//IGNORE', $fromname);
			$mail->Body = $message;
			$mail->Send();	
			
/*			
			$arFields = Array(
				"ORG" 			=> $_POST["org"],
				"INN" 			=> $_POST["inn"],
				"ADRES" 		=> $_POST["adres"],
				"DATE" 		=> $_POST["date"],
				"FIO" 			=> $_POST["fio"],
				"PHONE" 		=> $_POST["phone"],	
				"EMAIL" 		=> $_POST["email"],				
				"OBORUDOVANIE" 	=> $_POST["oborudovanie"],
				"NOMER" 		=> $_POST["nomer"],
				
			);
		
			if(!empty($arParams["EVENT_MESSAGE_ID"]))
			{
				foreach($arParams["EVENT_MESSAGE_ID"] as $v)
					if(IntVal($v) > 0)
						CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", IntVal($v));
			}
			else
				CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);
*/				
			LocalRedirect($APPLICATION->GetCurPageParam("success=Y&act=pusk", Array("success","act")));
			
		}
	
		$arResult["message"] = htmlspecialcharsEx($_POST["message"]);
		$arResult["AUTHOR_NAME"] = htmlspecialcharsEx($_POST["user_name"]);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsEx($_POST["user_email"]);
	}
	else
		$arResult["ERROR_MESSAGE"][] = "Ваша сессия истекла. Отправьте сообщение повторно.";
}
elseif($_REQUEST["success"] == "Y" && $_REQUEST["act"] == "pusk")
{
	$arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if($arParams["USE_CAPTCHA"] == "Y")
	$arResult["capCode"] =  htmlspecialchars($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();
?>