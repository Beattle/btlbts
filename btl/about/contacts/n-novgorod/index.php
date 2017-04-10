<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Н.Новгород");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 603127, г. Нижний Новгород, ул. Коновалова,&nbsp; д. 6, корп. УУ, офис 23
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (920) 299-00-30
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:56.353055999993046;s:10:\"yandex_lon\";d:43.80569800000001;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:43.80662067990114;s:3:\"LAT\";d:56.35296664689312;s:4:\"TEXT\";s:61:\"Точка самовывоза Нижний Новгород\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a target="_blank" href="/upload/iblock/db1/db12bf7acbb37b259f787d669377c7dc.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>