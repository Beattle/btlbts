<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Филиал в г. Казань");
$APPLICATION->SetPageProperty("description", "Филиал в г. Казань");
$APPLICATION->SetTitle("Казань");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 420095, г. Казань, ул. Васильченко,&nbsp; д. 16, офис 12
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (927) 677-55-39
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.83873143682772;s:10:\"yandex_lon\";d:49.03994606705766;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:49.04060537301632;s:3:\"LAT\";d:55.83854681334757;s:4:\"TEXT\";s:44:\"Точка самовывоза Казань\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a target="_blank" href="/upload/iblock/fb2/fb2ecf960ad2c778b7facf0b2edca607.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>