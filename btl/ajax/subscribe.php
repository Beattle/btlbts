<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
	if(!empty($_POST["subscr"]))
{
$subscr_err="";
$success="";
if(!empty($_POST["email"]) && check_email($_POST["email"]))
{

	CModule::IncludeModule("subscribe");
	$arFields = Array(
        "USER_ID" => ($USER->IsAuthorized()? $USER->GetID():false),
        "FORMAT" => "html",
        "EMAIL" => $_POST["email"],
        "ACTIVE" => "Y",
        "RUB_ID" => 1
    );
    $subscr = new CSubscription;

    //can add without authorization
    $ID = $subscr->Add($arFields);
    
    
    
    if($ID>0)
     {
        CSubscription::Authorize($ID);
        $success="Спасибо! Вы успешно подписались на рассылку.";
     }
     else $subscr_err=$subscr->LAST_ERROR;
}
else $subscr_err="Ошибка, неверный Email.";
	}

if(!empty($subscr_err))
{
echo '<div style="color:red;font-size: 12px;">'.$subscr_err.'</div>';
}	
if(!empty($success))
{
echo '<div style="color:green;font-size: 12px;">'.$success.'</div>';
}	
?>

<form action="/" method="POST" id="sbform">
						<input class="subscribe_email" type="text" name="email" value="<?=$_REQUEST["email"]?>">
						<input class="subscribe_submit" name="subscr" id="fsubscr" type="submit" value="Подписаться">
						<input type="hidden" name="subscr" value="Y">

					</form>