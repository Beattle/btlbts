<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');



require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("403 ошибка");
$APPLICATION->AddChainItem("403");
@define("ERROR_403","Y");
?>
<div class="not_found">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/403.png" width="260" height="177" alt="">
				<div class="heading">К сожалению, доступ к этой странице запрещен.</div>
				<p>Воспользуйтесь нашим каталогом или формой поиска для выбора подходящей модели. </p>
				<p>Вернуться на <a href="/">главную</a>.</p>
			</div>
<?


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>