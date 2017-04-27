<?php
	use \Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="yandex-verification" content="dea4b089dc4062ef" />
	<title><? $APPLICATION->ShowTitle() ?></title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
    <?
    $APPLICATION->ShowMeta("robots", false, true);
    $APPLICATION->ShowMeta("keywords", false, true);
    $APPLICATION->ShowMeta("description", false, true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    $APPLICATION->ShowCSS(true, true);
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/reset-min.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/style.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/main.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/slider/jquery.bxslider.css');
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/css/jquery.fancybox.css');
	//Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/lightbox.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome.min.css");


	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery/2.1.4/jquery.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jqueryui/1.11.4/jquery-ui.min.js");

	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.bxslider.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.countdown.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.cookie.js");
	//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.maskedinput.js");
	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom.js");

	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/lightbox.min.js");
	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/html5lightbox.js");
	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/owl.carousel.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery.fancybox.pack.js");


	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/inputmask.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/jquery.inputmask.min.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/inputmask.extensions.min.js");
	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/inputmask.phone.extensions.min.js");
	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/inputmask/extra/phone-codes/phone-ru.js");

	//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/plugins.js");
	Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/script.js");
?>
</head>
<body>
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<?
global $pathArray;
$SECTIONCODE = "";
$path = $APPLICATION->GetCurDir();
$pathArray = explode('/', $path);

if ($pathArray[1] == 'catalogue' || $pathArray[1] == 'catalogue_bu' ) {
	$SECTIONCODE = $pathArray[2];
}
$tools = new \ninjacat\Tools();
?>


<header>
	<div class="wr_top">
		<div class="top">

		</div>
	</div>
	<div class="header">
		<div class="hd_cl_l">
			<a href="/">
				<img src="/images/logo.jpg" alt="" />
			</a>
		</div>
		<div class="hd_cl_c">
			<p class="par_1">Ваш район: <a href="#">Москва</a></p>
			<p class="par_2">Пн-Пт  9:00-21:00</p>
			<p class="par_3"><a href="mailto:info@btstanki.ru">info@btstanki.ru</a></p>
		</div>
		<div class="hd_cl_r">
			<a href="tel:8(495) 642-82-51" class="tel">8(495) 642-82-51</a>
			<a href="#popup" class="fancybox zakzvon">Заказать звонок</a>
		</div>
	</div>
</header>
<div class="wr_main_menu">
	<? $APPLICATION->IncludeComponent(
		"bitrix:menu",
		"bts_top_menu",
		Array(
			"ROOT_MENU_TYPE" => "top",
			"MENU_CACHE_TYPE" => "A",
			"MENU_CACHE_TIME" => "3600",
			"MENU_CACHE_USE_GROUPS" => "N",
			"MENU_CACHE_GET_VARS" => array(""),
			"MAX_LEVEL" => "1",
			"CHILD_MENU_TYPE" => "",
			"USE_EXT" => "N",
			"DELAY" => "N",
			"ALLOW_MULTI_SELECT" => "N"
		)
	); ?>
</div>
<div class="content <?=$tools::curDir();?>">

		<?
		if (!ISINDEX) { ?>
			<aside class="left_sidebar">
				<div class="block-catalog">
					<h2>Каталог</h2>
					<?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list",
						"bts_menu",
						Array(
							"IBLOCK_TYPE" => "catalogue",
							"IBLOCK_ID" => "17",
							"SECTION_ID" => "",
							"SECTION_CODE" => "",
							"COUNT_ELEMENTS" => "Y",
							"TOP_DEPTH" => "3",
							"SECTION_FIELDS" => array("", ""),
							"SECTION_USER_FIELDS" => array("", ""),
							"VIEW_MODE" => "LIST",
							"SHOW_PARENT_NAME" => "Y",
							"SECTION_URL" => "",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "36000000",
							"CACHE_GROUPS" => "N",
							"ADD_SECTIONS_CHAIN" => "N",
							"PROPERTY" => $pathArray[1] == "catalogue_bu" ? array("second_hand" => "1875") : array("!second_hand" => "1875"),
							"BASE_SECTION_CODE" => $pathArray[1] == "catalogue_bu" ? $pathArray[1] : "catalogue"
						)
					); ?>
				</div>
			</aside>
			<?
				if ($pathArray[2] === 'articles' ||
					$pathArray[2] === 'exhibitions' ||
					$pathArray[2] === 'requisites' ||
					$pathArray[2] === 'technology' ||
					$pathArray[2] === 'news' ||
					$pathArray[1] === 'service' ||
					$pathArray[1] === 'auth' ||
					$pathArray[1] === 'register' ||
					ERROR_404 == 'Y' || ERROR_403 == 'Y'){
			?>
				<aside class="right_sidebar">
			<?} else {?>
				<div class="cont_center">
			<?}
			//echo $APPLICATION->GetCurPage();
			?>

			<?
			$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"bts_bread",
				Array()
			);
		}
		?>


