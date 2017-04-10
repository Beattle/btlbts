<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Воронеж");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 394033, г. Воронеж, ул. Старых Большевиков,&nbsp; д. 53А, офис 520Б
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (920) 433-74-62
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:51.675064000001036;s:10:\"yandex_lon\";d:39.250511999999965;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:39.250833865082;s:3:\"LAT\";d:51.675310804651;s:4:\"TEXT\";s:46:\"Точка самовывоза Воронеж\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a target="_blank" href="/upload/iblock/12f/12fce05a778ca6e49c22cff719ba1853.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>