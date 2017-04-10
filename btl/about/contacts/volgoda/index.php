<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Вологда");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 160000, г. Вологда, ул. Карла Маркса,&nbsp; д. 14, офис 207
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (921) 127-53-07
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:59.23374969987822;s:10:\"yandex_lon\";d:39.904196487777305;s:12:\"yandex_scale\";i:14;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.904036328596;s:3:\"LAT\";d:59.231689693222;s:4:\"TEXT\";s:46:\"Точка самовывоза Вологда\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a target="_blank" href="/upload/iblock/d35/d353524a33d16ce314159368f08b1647.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>