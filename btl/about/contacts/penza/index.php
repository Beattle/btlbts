<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Пенза");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 440023, г. Пенза, ул. Измайлова,&nbsp; д. 15 А, офис 205
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (8412) 62-53-31
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.18827599999778;s:10:\"yandex_lon\";d:45.039677999999995;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:45.039828203704836;s:3:\"LAT\";d:53.188306609645494;s:4:\"TEXT\";s:42:\"Точка самовывоза Пенза\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a href="/upload/iblock/ccc/cccce6e11925fbfafb29b0a635cca94b.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

