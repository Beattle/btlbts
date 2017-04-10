<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Севастополь");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 Республика Крым, Севастополь
</div>
<div class="phone">
 <span class="stronger">Телефон:</span>&nbsp;+7 (978) 944-31-86&nbsp;<br>
 <br>
	 Email:&nbsp;<a href="mailto:stavropol@btstanki.ru">stavropol@btstanki.ru</a>
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:45.12311016412415;s:10:\"yandex_lon\";d:39.00285135449197;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.003580915344;s:3:\"LAT\";d:45.12395325989;s:4:\"TEXT\";s:50:\"Точка самовывоза Краснодар\";}}}",
		"MAP_HEIGHT" => "452",
		"MAP_ID" => "",
		"MAP_WIDTH" => "472",
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM")
	)
);?>
</div>
 <a class="how_to_get_there" href="#">Как добраться</a> <a target="_blank" href="/upload/iblock/572/572c0166f12770942665b9bd83aba50b.pdf">Распечатать схему проезда</a><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>