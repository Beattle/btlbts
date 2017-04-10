<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Волгоград");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 400075, г. Волгоград, ул. Нефтяников,&nbsp; д. 10
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (927) 695-13-52 &nbsp;+7 (937) 741-65-35
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:48.76319790506807;s:10:\"yandex_lon\";d:44.463154281511315;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:44.46536442173959;s:3:\"LAT\";d:48.7628787251326;s:4:\"TEXT\";s:50:\"Точка самовывоза Волгоград\";}}}",
		"MAP_HEIGHT" => "452",
		"MAP_ID" => "",
		"MAP_WIDTH" => "472",
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM")
	)
);?>
</div>
 <a class="how_to_get_there" href="#">Как добраться</a> <a href="/upload/iblock/bc6/bc6c1f8cd26d76ea775e8451e70659f1.pdf" target="_blank">Распечатать схему проезда</a><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>