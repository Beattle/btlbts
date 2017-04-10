<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сравнение товаров");
?><?$APPLICATION->IncludeComponent("roonix:catalog.compare.result", "", Array(
	"NAME" => "CATALOG_COMPARE_LIST",	// Уникальное имя для списка сравнения
	"IBLOCK_TYPE" => "1c_catalog",	// Тип инфоблока
	"IBLOCK_ID" => "1",	// Инфоблок
	"FIELD_CODE" => array(	// Поля
		0 => "NAME",
		1 => "PREVIEW_PICTURE",
	),
	"PROPERTY_CODE" => array(	// Свойства
		0 => "MATERIAL_NOZHA",
		1 => "_CHISLO_OBOROTOV_KHOLOST_KHODA_",
		2 => "PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY",
		3 => "NAPRAVLENIE_VRASHCHENIYA",
		4 => "ACTION",
		5 => "CML2_ARTICLE",
		6 => "CML2_BASE_UNIT",
		7 => "vote_count",
		8 => "NEW",
		9 => "CML2_MANUFACTURER",
		10 => "rating",
		11 => "CML2_TRAITS",
		12 => "CML2_TAXES",
		13 => "vote_sum",
		14 => "CML2_ATTRIBUTES",
		15 => "HIT",
		16 => "_KHOD_SHLIFOVANIYA",
		17 => "CML2_BAR_CODE",
		18 => "RLORLDORL",
		19 => "_RAZEMA_PYLEUDALENIYA_",
		20 => "ELEMENT_SVOYSTVA_OBEKTOV",
		21 => "_NAPRYAZHENIE_AKKUMULYATORA_",
		22 => "PODSHIPNIK",
		23 => "_YEMKOST_LITIY_IONNOGO_AKKUMUL",
		24 => "SPOSOB_KREPLENIYA_NOZHA",
		25 => "SHIRINA_NOZHA",
		26 => "TIP_PRIVODA",
		27 => "TOLSHCHINA_NOZHA",
		28 => "D_DIAMETR_KHVOSTOVIKA",
		29 => "REKOMENDOVANO_SERVISOM",
		30 => "_MASSA",
		31 => "H_VYSOTA_RABOCHEY_CHASTI",
		32 => "_MAKS_KRUTYASHCHIY_MOMENT_DR_ST",
		33 => "_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO",
		34 => "_SMENNAYA_SHLIFOVALNAYA_TARELKA_",
		35 => "_SKOROSTI_",
		36 => "_DIAMETR_OTVERSTIYA_DEREVO_STAL",
		37 => "DIAMETR_POSADOCHNYY",
		38 => "TOLSHCHINA_PROPILA",
		39 => "_POTREBLYAEMAYA_MOSHCHNOST",
		40 => "R_RADIUS_REZHUSHCHEY_CHASTI",
		41 => "_SKOROST_PRI_EKSTSENTR_DVIZHENII",
		42 => "SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA",
		43 => "L_DLINA_SVERLA_OBSHCHAYA",
		44 => "DIAMETR_VNESHNIY",
		45 => "KOLICHESTVO_Z",
		46 => "D_DIAMETR_RABOCHEY_CHASTI",
		47 => "_DIAPAZON_ZAZHIMA_PATRONA_",
		48 => "_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_",
		49 => "DLINA_NOZHA",
		50 => "D_DIAMETR_RABOCHEY_CHASTI2",
		51 => "",
	),
	"ELEMENT_SORT_FIELD" => "shows",	// По какому полю сортируем элементы
	"ELEMENT_SORT_ORDER" => "desc",	// Порядок сортировки элементов
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
	"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
	"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	"SECTION_ID_VARIABLE" => "SECTION_ID",	// Название переменной, в которой передается код группы
	"DISPLAY_ELEMENT_SELECT_BOX" => "N",	// Выводить список элементов инфоблока
	"ELEMENT_SORT_FIELD_BOX" => "",	// По какому полю сортируем список элементов
	"ELEMENT_SORT_ORDER_BOX" => "",	// Порядок сортировки списка элементов
	"ELEMENT_SORT_FIELD_BOX2" => "",	// Поле для второй сортировки списка элементов
	"ELEMENT_SORT_ORDER_BOX2" => "",	// Порядок второй сортировки списка элементов
	"HIDE_NOT_AVAILABLE" => "N",	// Не отображать в списке товары, которых нет на складах
	"PRICE_CODE" => array(	// Тип цены
		0 => "Цена продажи",
	),
	"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
	"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
	"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
	"CONVERT_CURRENCY" => "Y",	// Показывать цены в одной валюте
	"OFFERS_FIELD_CODE" => array(	// Поля предложений
		0 => "",
		1 => "",
	),
	"OFFERS_PROPERTY_CODE" => array(	// Свойства предложений
		0 => "",
		1 => "",
	),
	"CURRENCY_ID" => "RUB",	// Валюта, в которую будут сконвертированы цены
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>