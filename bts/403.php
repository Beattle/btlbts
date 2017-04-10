<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("403 ошибка");
$APPLICATION->AddChainItem("403");
@define("ERROR_403","Y");
?>
	<aside class="right_sidebar">
		<div class="block_error">
			<img src="images/403.png" alt="" />
			<h4>К сожалению, доступ к этой странице запрещен.</h4>
			<p>Воспользуйтесь нашим каталогом или формой поиска <br /> для выбора подходящей модели. <br /> Вернуться на <a href="#">главную.</a></p>
		</div>
	</aside>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>