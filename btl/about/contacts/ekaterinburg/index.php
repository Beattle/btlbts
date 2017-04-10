<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Екатеринбург");
?>
<div class="heading">Контактная информация</div>
					<div class="address">347360, г. Волгодонск,  ул. Пионерская д. 78 А офис № 2 </div>
					<div class="phone"><span class="stronger">Телефон:</span> +7 (928) 110-09-19 </div>   
					<div class="email"><span class="stronger">E-mail:</span> <a href="#">kazakov@btstanki.ru</a></div>
					<div class="map">
						<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
	"INIT_MAP_TYPE" => "MAP",
	"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:47.513050043581536;s:10:\"yandex_lon\";d:42.14508038888467;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:42.145563186508;s:3:\"LAT\";d:47.513046409182;s:4:\"TEXT\";s:85:\"ммм\";}}}",
	"MAP_WIDTH" => "472",
	"MAP_HEIGHT" => "452",
	"CONTROLS" => array(
		0 => "ZOOM",
		1 => "SMALLZOOM",
		2 => "MINIMAP",
		3 => "TYPECONTROL",
		4 => "SCALELINE",
		5 => "SEARCH",
	),
	"OPTIONS" => array(
		0 => "ENABLE_SCROLL_ZOOM",
	),
	"MAP_ID" => ""
	),
	false
);?>
						
					</div>
					<a class="how_to_get_there" href="#">Как добраться</a>
					<a class="print_way">Распечатать схему проезда</a>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>