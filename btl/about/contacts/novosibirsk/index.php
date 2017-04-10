<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новосибирск");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 630007, г. Новосибирск, переулок Пристанский,&nbsp; д. 5, офис 216
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (923) 700-46-26
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.0156361690274;s:10:\"yandex_lon\";d:82.9190898148193;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:82.9185426441803;s:3:\"LAT\";d:55.01506898156249;s:4:\"TEXT\";s:54:\"Точка самовывоза Новосибирск\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a target="_blank" href="/upload/iblock/1a8/1a835fa2d3fb944d524c4d84b5205fd0.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>