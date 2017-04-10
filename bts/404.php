<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->AddChainItem("404");
?>
	<div class="block_error">
		<img src="/images/404.png" alt="" />
		<h4>К сожалению, запрашиваемая Вами страница не найдена!</h4>
		<p>Воспользуйтесь нашим каталогом или формой поиска <br /> для выбора подходящей модели. <br /> Вернуться на <a href="#">главную.</a></p>
	</div>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>