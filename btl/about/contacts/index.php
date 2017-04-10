<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="heading">
	Контактная информация
</div>
<div class="address">
	 129343 г. Москва, пр. Серебрякова, д. 14 стр. 9, офис 111
</div>
<div class="phone">
	<span class="stronger">Телефон:</span> +7 (495) 642-82-51
</div>
<div class="email">
	<span class="stronger">E-mail:</span> <a href="#">info@btstanki.ru</a>
</div>
<div class="map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.846642847425755;s:10:\"yandex_lon\";d:37.65668770118684;s:12:\"yandex_scale\";i:17;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.657867873153386;s:3:\"LAT\";d:55.84639234974863;s:4:\"TEXT\";s:21:\"Офис Москва\";}}}",
		"MAP_WIDTH" => "472",
		"MAP_HEIGHT" => "452",
		"CONTROLS" => array("ZOOM","SMALLZOOM","MINIMAP","TYPECONTROL","SCALELINE","SEARCH"),
		"OPTIONS" => array("ENABLE_SCROLL_ZOOM"),
		"MAP_ID" => ""
	)
);?>
</div>

<a class="how_to_get_there" href="#">Как добраться</a>
<br />
<a target="_blank" href='/upload/iblock/cf0/cf0cfbdc605cfea3bb709404e2d4919f.pdf'>Распечатать схему проезда</a>
<br />
<a target="_blank" href='/upload/iblock/7cf/7cf4c157eda07b834ca616bc1e37d03e.pdf'>Распечатать схему проезда</a>

<? /*
<a class="how_to_get_there" href="#">Как добраться</a>
<a href='javascript:window.print(); void 0;'>Распечатать схему проезда</a>

<style media='print' type='text/css'>
.aside, .float_block, .top_search, .left_side, .topbar{display: none;}
.map{display: block;}
</style>
*/ ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

