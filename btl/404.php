<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->AddChainItem("404");

?>
<div class="not_found">
				<img src="<?=SITE_TEMPLATE_PATH?>/images/404.png" width="264" height="177" alt="">
				<div class="heading">К сожалению, запрашиваемая Вами страница не найдена!</div>
				<p>Воспользуйтесь нашим каталогом или формой поиска для выбора подходящей модели. </p>
				<p>Вернуться на <a href="/">главную</a>.</p>
			</div>
<?


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>