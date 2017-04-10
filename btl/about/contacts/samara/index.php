<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Самара");
?><div class="heading">
	 Контактная информация
</div>
<div class="address">
	 443022, г. Самара, проезд Мальцева,&nbsp; д. 7, офис 314
</div>
<div class="phone">
 <span class="stronger">Телефон:</span> +7 (927) 018-17-04
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:53.194272981661534;s:10:\"yandex_lon\";d:50.24587884810744;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:50.246117373016;s:3:\"LAT\";d:53.19431067032;s:4:\"TEXT\";s:44:\"Точка самовывоза Самара\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>
<a class="how_to_get_there" href="#">Как добраться</a>
<a target="_blank" href="/upload/iblock/8ef/8efcdd456dd146faa283d666784b8e47.pdf">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>