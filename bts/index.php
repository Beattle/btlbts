<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("tags", "scm, scm ru, станки scm, scm group, счм, счм групп, станки счм, станки для деревообработки, Станки для производства мебели, деревообработка куплю, чпу для деревообработки, оборудование для деревообработки, станки с чпу для деревообработки, деревообрабатывающее оборудование, четырехсторонний станок, торцовочный станок, многопильный станок, комбинированный станок, фуговальный станок");
$APPLICATION->SetPageProperty("meta name", "yandex-verification");
$APPLICATION->SetPageProperty("title", "Биржа Технологий - Деревообрабатывающие станки. Станки для производства мебели. Промышленное оборудование, официальный дилер SCM, б/у");
$APPLICATION->SetTitle("Биржа Технологий - Деревообрабатывающие станки. Станки для производства мебели. Промышленное оборудование, официальный дилер SCM, б/у");
$APPLICATION->SetPageProperty("description", "Биржа технологий - оборудование: деревообработки, металлообработка, стеклообработка. Телефон +7 (495) 642-82-51");
$APPLICATION->SetPageProperty("keywords", "Деревообрабатывающее оборудование, Металлообрабатывающее оборудование, Стеклообрабатывающее   оборудование, SCM, СЧМ, Casadei, Busselato, Filato, Beaver, ALtendorf, ORMA, Centauro, Osama,   Biesse, Homag, деревообрабатывающий станок, деревообрабатывающий оборудование, дерево   станок,универсальный деревообрабатывающий станок,комбинированный деревообрабатывающий станок,   купить деревообрабатывающий станок, четырехсторонний станок, торцовочный станок, многопильный   станок,комбинированный станок, фуговальный станок, кромкооблицовочный станок,   форматно-раскроечный станок, форматник, лазерно гравировальный станок, ленточнопильный станок,   оборудование +для шпона, сшивка шпона, Kuper, купер, обрабатывающий центр, горячий пресс, станки   +для производства стульев, раскроечный центр, форматно раскроечный центр, фрезерный станок с чпу   по дереву, четырехсторонний станок, шипорезный станок, griggio");

$APPLICATION->IncludeFile("/include/search.php", Array(), Array("MODE" => "html"));

$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"bts_banners_onmain",
	Array(
		"IBLOCK_TYPE" => "banners",
		"IBLOCK_ID" => 22,
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "PROPERTY_DATE_BEGIN",
		"SORT_ORDER2" => "ASC",
		"PROPERTY_CODE"	=>	array("LINK"),
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"DISPLAY_DATE"	=>	"Y",
		"DISPLAY_NAME"	=>	"N",
		"DISPLAY_PICTURE"	=>	"Y",
		"DISPLAY_PREVIEW_TEXT"	=>	"Y",
		"ACTIVE_DATE_FORMAT" => "d F",
		"SET_TITLE" => "N"
	),
	$component
);?><div class="wr_bl">
	<div class="left_cloum">
		 <?
				$arrFiltr = array("=PROPERTY_PERSONAL_RECOMM_VALUE" => "Y");
				$APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"bts_personal",
					Array(
						"IBLOCK_TYPE" => "catalogue",
						"IBLOCK_ID" => "17",
						"SECTION_ID" => "",
						"SECTION_CODE" => "",
						"SECTION_USER_FIELDS" => array("", ""),
						"ELEMENT_SORT_FIELD" => "sort",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_FIELD2" => "",
						"ELEMENT_SORT_ORDER2" => "",
						"FILTER_NAME" => "arrFiltr",
						"INCLUDE_SUBSECTIONS" => "Y",
						"SHOW_ALL_WO_SECTION" => "Y",
						"HIDE_NOT_AVAILABLE" => "N",
						//"PAGE_ELEMENT_COUNT" => "8",
						"LINE_ELEMENT_COUNT" => "1",
						"PROPERTY_CODE" => array("PERS_NAME"),
						"OFFERS_LIMIT" => "0",
						"TEMPLATE_THEME" => "",
						"PRODUCT_SUBSCRIPTION" => "N",
						"SHOW_DISCOUNT_PERCENT" => "N",
						"SHOW_OLD_PRICE" => "Y",
						"MESS_BTN_BUY" => "Купить",
						"MESS_BTN_ADD_TO_BASKET" => "В корзину",
						"MESS_BTN_SUBSCRIBE" => "Подписаться",
						"MESS_BTN_DETAIL" => "Подробнее",
						"MESS_NOT_AVAILABLE" => "Нет в наличии",
						"SECTION_URL" => "",
						"DETAIL_URL" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#.html",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "N",
						"SET_META_KEYWORDS" => "N",
						"META_KEYWORDS" => "",
						"SET_META_DESCRIPTION" => "N",
						"META_DESCRIPTION" => "",
						"BROWSER_TITLE" => "-",
						"ADD_SECTIONS_CHAIN" => "N",
						"DISPLAY_COMPARE" => "N",
						"SET_TITLE" => "N",
						"SET_STATUS_404" => "N",
						"CACHE_FILTER" => "Y",
						"PRICE_CODE" => array("Цена продажи"),
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"PRICE_VAT_INCLUDE" => "N",
						"CONVERT_CURRENCY" => "N",
						"BASKET_URL" => "/personal/cart/",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"USE_PRODUCT_QUANTITY" => "N",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => array(),
						"PAGER_TEMPLATE" => "new",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"OFFERS_FIELD_CODE" => array("", ""),
						"OFFERS_PROPERTY_CODE" => array("CML2_ARTICLE", "CML2_BASE_UNIT", "MORE_PHOTO", "CML2_MANUFACTURER", "CML2_TRAITS", "CML2_TAXES", "FILES", "CML2_ATTRIBUTES", "CML2_BAR_CODE", ""),
						"OFFERS_SORT_FIELD" => "sort",
						"OFFERS_SORT_ORDER" => "asc",
						"OFFERS_SORT_FIELD2" => "",
						"OFFERS_SORT_ORDER2" => "",
						"PRODUCT_DISPLAY_MODE" => "N",
						"ADD_PICT_PROP" => "-",
						"LABEL_PROP" => "-",
						"OFFERS_CART_PROPERTIES" => array("CML2_ARTICLE", "CML2_BASE_UNIT", "CML2_MANUFACTURER", "CML2_TRAITS", "CML2_TAXES", "CML2_ATTRIBUTES", "CML2_BAR_CODE"),

					)
				); ?>
		<div class="company">
			<div class="wr_h2">
				<h2>О компании</h2>
			</div>
			<div class="cont_company">
 <img src="images/logo_company.jpg" alt="">
				<h1>Деревообрабатывающее оборудование и станки</h1>
				<p>
					 Компания «Биржа технологий» является <a href="/about/manufactures/" target="_blank">официальным дилером</a> ведущих мировых производителей оборудования для деревообработки. Благодаря такому сотрудничеству мы поставляем на отечественный рынок широкий ассортимент продукции. Кроме того, наша компания выступает партнером известных мировых брендов, один из них - концерн SCM.
				</p>
				<p>
					 Мы не только продаем деревообрабатывающие станки, но и осуществляем полную предпродажную подготовку и наладку оборудования, а также выполняем послепродажное сопровождение. Специалисты компании всегда готовы предоставить исчерпывающую консультацию по любому интересующему Вас вопросу.
				</p>
				<p>
					 На сайте вы можете выбрать необходимое Вам деревообрабатывающее оборудование из широкого ассортимента. У нас представлены: <a href="/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/formatno_raskroechnyie_stanki/" target="_blank">форматно-раскроечные станки</a>, <a href="/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/raskroechnyie_tsentry/" target="_blank">раскроечные центры</a>, <a href="/catalogue/derevoobrabatyvayushchee_oborudovanie/sverlilno_prisadochnye_stanki/" target="_blank">сверлильно-присадочные станки</a>, <a href="/catalogue/derevoobrabatyvayushchee_oborudovanie/obrabatyvayushchie_tsentry/" target="_blank">обрабатывающие центры</a>, <a href="/catalogue/derevoobrabatyvayushchee_oborudovanie/kromkooblitsovochnye_stanki/" target="_blank">кромкооблицовочные станки</a> и многое другое. Наши клиенты могут быть уверены, что станут владельцами только высококачественного оборудования, при производстве которого применяются исключительно передовые технологии.
				</p>
				<h3>Широкий ассортимент станков от ведущих производителей</h3>
				<p>
					 Благодаря сотрудничеству с известными мировыми производителями деревообрабатывающих станков, мы готовы предложить нашим клиентам комплексные решения на основе широкого ассортимента оборудования. У нас вы найдете станки известного итальянского концерна SCM и принадлежащих ему торговых брендов Minimax, Morbidelli, Gabbiani, Routech, Celaschi, DMC, Superfici, Sergiani, Mahros, Stefani, CPC, CMS а также деревообрабатывающие станки других известных итальянских компаний: ORMA, VITAP, ANDREONI, BREVETTI, OMGA, CASATI, CORAL CENTAURO, OSAMA, STROMAB.
				</p>
				<p>
					 Помимо итальянских брендов, мы сотрудничаем с китайским производителем VANGUARD, выпускающим качественное оборудование, на уровне европейских поставщиков. Так, клеенаносящие, комбинированные, кромкооблицовочные, ленточнопильные и другие станки по дереву представлены у нас практически только этой маркой. Высокое качество и большой выбор оборудования VANGUARD дает нам возможность легко подобрать подходящий вариант под любые нужды.
				</p>
				<p>
					 Мы также предлагаем лучшее оборудование для обработки шпона от известного немецкого производителя KUPER – продукция этой компании не нуждается в рекламе и всегда находится на острие прогресса.
				</p>
				<h3>Оборудование всех типов и видов</h3>
				<p>
					 Полный цикл производства мебели и получения заготовок полуфабрикатов из древесины состоит из нескольких этапов. Для распиловки заготовок мы предлагаем большой выбор пил и форматно-раскроечных станков. Для подготовки поверхности к обработке и собственно самой обработки мы можем предложить широкий ассортимент фрезерного оборудования, с помощью которого можно выбрать гнезда, пазы, шипы, выполнить торцовку и зенкерование. Наши рейсмусовые деревообрабатывающие станки позволят вам добиться необходимой толщины детали и сделать ее поверхность гладкой.
				</p>
				<p>
					 Также вы можете найти у нас фуговальные станки, основная функция которых – строгание прямолинейных изделий из дерева и снятие фасок под углом. Помимо этого мы предлагаем универсальные модели: фуговально-рейсмусовое оборудование, сочетающее в себе функции калибровки и выравнивания.
				</p>
				<p>
					 Есть в нашем ассортименте также четырехсторонние, копировально-фрезерные, шипорезные, шлифовальные и сверлильно-присадочные станки, пантографы, покрасочные камеры и другое профессиональное деревообрабатывающее оборудование, способное сделать ваше производство более эффективным.
				</p>
				<h3>От домашнего использования до серийного производства</h3>
				<p>
					 Кроме моделей, выполняющих строго определенные функции, мы реализуем универсальные деревообрабатывающие центры, которые, благодаря широкому спектру доступных операций, идеально подходят для небольших производств. Теперь у вас есть возможность купить деревообрабатывающие станки такого класса на выгодных условиях!
				</p>
				<p>
					 В то же время, наряду с вариантами для небольших частных столярных мастерских и домашнего производства, мы предлагаем мощные станки для деревообработки, способные работать как самостоятельно, так и в составе крупных производственных линий.
				</p>
				<h3> <b>Компания «Биржа технологий» является официальным дилером SCM, итальянской компании по производству станков самого разного назначения.</b> </h3>
				<p>
					 Купить станок у официального дилера SCM можно на этом сайте. У нас представлен широкий ассортимент станков СЧМ, которые можно купить как по наличию, так и под заказ. Например, обрабатывающие центры SCM, которые представлены двумя типами — обрабатывающие центры СЧМ <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/obrabatyvayushchie_tsentry/obrabatyvayushchie_tsentry_s_ploskim_stolom/">с плоским столом</a> и <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/obrabatyvayushchie_tsentry/obrabatyvayushchie_tsentry_traversnye/">с траверсным столом</a>, благодаря которому возможна операция сверления торцов заготовок.
				</p>
				<p>
					 Также у нас вы найдёте <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/raskroechnyie_tsentry/">раскроечные центры </a><a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/raskroechnyie_tsentry/">SCM</a> и <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/formatno_raskroechnyie_stanki/?sort=sort&page=9&proizv=scm_group">форматно-раскроечные станки </a><a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/formatno_raskroechnye_stanki_i_tsentry/formatno_raskroechnyie_stanki/?sort=sort&page=9&proizv=scm_group">SCM</a>.
				</p>
				<p>
					 Для обработки кромок заготовок у нас Вы можете купить кромкооблицовочные станки SCM, как <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/kromkooblitsovochnye_stanki/avtomaticheskie_kromkooblitsovochnye_stanki/?sort=sort&page=9&proizv=scm_group">автоматические</a>, так и с<a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/kromkooblitsovochnye_stanki/kromkooblitsovochnye_stanki_s_ruchnoy_podachey/kromkooblitsovochnyie_stanki_s_ruchnoy_podachey/?sort=sort&page=9&proizv=scm_group"> ручной подачей</a>. Для выполнения финишной отделки заготовок, у нас вы найдёте широкий выбор <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/shlifovalnye_stanki/kalibrovalno_shlifovalnye_stanki/?sort=sort&page=9&proizv=scm_group">шлифовальных станков СЧМ</a>. А реализовать гибкий подход к сверлению возможно с помощью <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/sverlilnye_stanki_s_chpu/?sort=sort&page=9&proizv=scm_group">cверлильного станка SCM с ЧПУ</a>.
				</p>
				<p>
					 Для столярных работ рекомендуем использовать <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/chetyrekhstoronnie_stanki/?sort=sort&page=9&proizv=scm_group">четырёхсторонние станки </a><a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/chetyrekhstoronnie_stanki/?sort=sort&page=9&proizv=scm_group">SCM</a> и <a href="http://btstanki.ru/catalogue/derevoobrabatyvayushchee_oborudovanie/stolyarnoe_oborudovanie/kombinirovannye_stanki/?sort=sort&page=9&proizv=scm_group">комбинированные станки</a> СЧМ, которые Вы тоже можете приобрести в нашем кампании
				</p>
				<p>
				</p>
				<p>
					 Узнать цену официального дилера СЧМ можно позвонив по телефону&nbsp;+7 (495) 642-82-51&nbsp;или отправив запрос по электронной почте&nbsp;<a href="mailto:info@btstanki.ru">info@btstanki.ru</a>. У нас есть филиалы в разных городах России, поэтому всегда у нас вы можете &nbsp;купить станок SCM и получить квалифицированную техническую консультацию.
				</p>
			</div>
		</div>
	</div>
	<div class="right_cloum">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"bts_news_onmain",
	Array(
		"ACTIVE_DATE_FORMAT" => "d F",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"IBLOCK_ID" => 18,
		"IBLOCK_TYPE" => "snews",
		"NEWS_COUNT" => "6",
		"PREVIEW_TRUNCATE_LEN" => 100,
		"PROPERTY_CODE" => array("EMAIL","TIME","PLACE","TIMING","PHONE","TYPE","PRICE","DATE_BEGIN","DATE_END"),
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "PROPERTY_DATE_BEGIN",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "ASC"
	),
$component
);?>
	</div>
</div>
<div class="carusel">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"bts_techno",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PANEL" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "technology",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "20",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALWAYS" => "Y",
		"PAGER_TEMPLATE" => "",
		"PAGER_TITLE" => "Технологии",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(),
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
</div>
 <br><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>