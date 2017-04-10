<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Филиал в г. Ижевск");
$APPLICATION->SetPageProperty("description", "Филиал в г. Ижевск");
$APPLICATION->SetTitle("Ижевск");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 426028, г. Ижевск, ул. Пойма,&nbsp; д. 7, офис 417
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (922) 523-37-65
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:56.812473114693134;s:10:\"yandex_lon\";d:53.19645912038615;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:53.19624454366494;s:3:\"LAT\";d:56.81158452640898;s:4:\"TEXT\";s:44:\"Точка самовывоза Ижевск\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
 <a class="how_to_get_there" href="#">Как добраться</a>
					<a name="">Распечатать схему проезда</a><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>