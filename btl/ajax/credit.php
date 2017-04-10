<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");
if(!empty($_POST["SEND"]))
{
	if(!empty($_POST["NAME"]) && !empty($_POST["EMAIL"]) && check_email($_POST["EMAIL"]) && !empty($_POST["PHONE"]) && !empty($_POST["COMMENT"]))
	{
		if(!$USER->IsAuthorized()) $USER->Authorize(1);
		$summ=0;
		$dbBasketItems = CSaleBasket::GetList(
		array("ID" => "ASC"),
		array(
		"FUSER_ID" => CSaleBasket::GetBasketUserID(),
		"LID" => SITE_ID,
		"ORDER_ID" => "NULL"
		),
		false,
		false

		);
		while ($arItem = $dbBasketItems->GetNext())
		{
			$summ+=$arItem["PRICE"];
		}


		$arFields = array(
		"LID" => "s1",
		"PERSON_TYPE_ID" => 1,
		"PAYED" => "N",
		"CANCELED" => "N",
		"STATUS_ID" => "N",
		"PRICE" => $summ,
		"CURRENCY" => "RUB",
		"USER_ID" => IntVal($USER->GetID()),
		"PAY_SYSTEM_ID" => 1,
		"PRICE_DELIVERY" => 0,
		"DELIVERY_ID" => 1,
		"DISCOUNT_VALUE" => 0,
		"TAX_VALUE" => 0.0,
		"USER_DESCRIPTION" => $_POST["COMMENT"]
		);

		$ORDER_ID = CSaleOrder::Add($arFields);
		if(intval($ORDER_ID)>0)
		{
			CSaleBasket::OrderBasket($ORDER_ID, CSaleBasket::GetBasketUserID(), "s1", false);
			$arFieldsp = array(
			"ORDER_ID" => $ORDER_ID,
			"ORDER_PROPS_ID" => 2,
			"NAME" => "Имя оформителя",
			"CODE" => "NAME",
			"VALUE" => $_POST["NAME"]
			);

			CSaleOrderPropsValue::Add($arFieldsp);
			
			
			$arFieldsp = array(
			"ORDER_ID" => $ORDER_ID,
			"ORDER_PROPS_ID" => 3,
			"NAME" => "Мобильный телефон",
			"CODE" => "PHONE",
			"VALUE" => $_POST["PHONE"]
			);

			CSaleOrderPropsValue::Add($arFieldsp);
			
			
			
			$arFieldsp = array(
			"ORDER_ID" => $ORDER_ID,
			"ORDER_PROPS_ID" => 4,
			"NAME" => "E-mail",
			"CODE" => "EMAIL",
			"VALUE" => $_POST["EMAIL"]
			);

			CSaleOrderPropsValue::Add($arFieldsp);
			$success="Спасибо, Ваш заказ в кредит офомрлен. В ближайшее время наш менеджер свяжется с Вами.";

		}

	}
	else $err="Ошибка! Неверно заполнены поля.";
}
?>
<form action="" method="POST">
<?
if(!empty($err))
{
	?>
	<div style="color:red;font-size:12px;padding-left:15px;"><?=$err?></div>
	<?
}
if(!empty($success))
{
	?>
	<div style="color:green;font-size:12px;padding-left:15px;"><?=$success?></div>
	<?
}
else 
{

?>
			<label class="credit_label" for="credit_fio">Ваше ФИО<span class="red">*</span>:</label>
			<input class="credit_text" type="text" id="credit_fio" name="NAME" value="<?=$_POST["NAME"]?>">
			<label class="credit_label" for="credit_email">Ваш e-mail:</label>
			<input class="credit_text" type="text" id="credit_email" name="EMAIL" value="<?=$_POST["EMAIL"]?>">
			<label class="credit_label" for="credit_phone">Ваш номер телефона<span class="red">*</span>:</label>
			<input class="credit_text" type="text" id="credit_phone" name="PHONE" value="<?=$_POST["PHONE"]?>">
			<label class="credit_label" for="credit_comment">Ваш комментарий<span class="red">*</span>:</label>
			<textarea class="credit_textarea" id="credit_comment" name="COMMENT"><?=$_POST["COMMENT"]?></textarea>
			<input class="credit_submit" type="submit" value="Отправить" name="SEND">
			<input type="hidden" name="SEND" value="Y"/>
			<?}?>
		</form>