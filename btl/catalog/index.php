<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров"); 
?>
<?
	if(!empty($_REQUEST["page"])) $page=$_REQUEST["page"];
	else $page=9;
	if(!empty($_REQUEST["sort"])) $sort=$_REQUEST["sort"]; else $sort="sort";
	if($sort=="shows" || $sort=="sort") $order="desc";else $order="asc";
?>


<?$APPLICATION->IncludeComponent(
	"roonix:catalog", 
	"catalog", 
	array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => "1",
		"HIDE_NOT_AVAILABLE" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/catalog/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "CPRICE",
			2 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Цена продажи",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"FILTER_VIEW_MODE" => "VERTICAL",
		"USE_REVIEW" => "Y",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "N",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "N",
		"POST_FIRST_MESSAGE" => "N",
		"USE_COMPARE" => "Y",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_PROPERTY_CODE" => array(
			0 => "CML2_MANUFACTURER",
			1 => "HIT",
			2 => "CML2_BAR_CODE",
			3 => "NAPRAVLENIE_VRASHCHENIYA",
			4 => "PODSHIPNIK",
			5 => "SPOSOB_KREPLENIYA_NOZHA",
			6 => "D_DIAMETR_KHVOSTOVIKA",
			7 => "TIP_PRIVODA",
			8 => "H_VYSOTA_RABOCHEY_CHASTI",
			9 => "R_RADIUS_REZHUSHCHEY_CHASTI",
			10 => "DIAMETR_POSADOCHNYY",
			11 => "TOLSHCHINA_PROPILA",
			12 => "L_DLINA_SVERLA_OBSHCHAYA",
			13 => "DIAMETR_VNESHNIY",
			14 => "KOLICHESTVO_Z",
			15 => "D_DIAMETR_RABOCHEY_CHASTI",
			16 => "MATERIAL_NOZHA",
			17 => "_CHISLO_OBOROTOV_KHOLOST_KHODA_",
			18 => "PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY",
			19 => "_KHOD_SHLIFOVANIYA",
			20 => "_RAZEMA_PYLEUDALENIYA_",
			21 => "ELEMENT_SVOYSTVA_OBEKTOV",
			22 => "_NAPRYAZHENIE_AKKUMULYATORA_",
			23 => "_YEMKOST_LITIY_IONNOGO_AKKUMUL",
			24 => "SHIRINA_NOZHA",
			25 => "TOLSHCHINA_NOZHA",
			26 => "REKOMENDOVANO_SERVISOM",
			27 => "_MASSA",
			28 => "_MAKS_KRUTYASHCHIY_MOMENT_DR_ST",
			29 => "_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO",
			30 => "_SMENNAYA_SHLIFOVALNAYA_TARELKA_",
			31 => "_SKOROSTI_",
			32 => "_DIAMETR_OTVERSTIYA_DEREVO_STAL",
			33 => "_POTREBLYAEMAYA_MOSHCHNOST",
			34 => "_SKOROST_PRI_EKSTSENTR_DVIZHENII",
			35 => "SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA",
			36 => "_DIAPAZON_ZAZHIMA_PATRONA_",
			37 => "_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_",
			38 => "DLINA_NOZHA",
			39 => "D_DIAMETR_RABOCHEY_CHASTI2",
			40 => "",
		),
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"COMPARE_ELEMENT_SORT_FIELD" => "sort",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"PRICE_CODE" => array(
			0 => "Цена продажи",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_PRODUCT_QUANTITY" => "Y",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"PAGE_ELEMENT_COUNT" => $page,
		"LINE_ELEMENT_COUNT" => "1",
		"ELEMENT_SORT_FIELD" => $sort,
		"ELEMENT_SORT_ORDER" => $order,
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"LIST_PROPERTY_CODE" => array(
			0 => "CML2_MANUFACTURER",
			1 => "NAPRAVLENIE_VRASHCHENIYA",
			2 => "PODSHIPNIK",
			3 => "SPOSOB_KREPLENIYA_NOZHA",
			4 => "D_DIAMETR_KHVOSTOVIKA",
			5 => "TIP_PRIVODA",
			6 => "H_VYSOTA_RABOCHEY_CHASTI",
			7 => "R_RADIUS_REZHUSHCHEY_CHASTI",
			8 => "DIAMETR_POSADOCHNYY",
			9 => "TOLSHCHINA_PROPILA",
			10 => "L_DLINA_SVERLA_OBSHCHAYA",
			11 => "DIAMETR_VNESHNIY",
			12 => "KOLICHESTVO_Z",
			13 => "D_DIAMETR_RABOCHEY_CHASTI",
			14 => "MATERIAL_NOZHA",
			15 => "_CHISLO_OBOROTOV_KHOLOST_KHODA_",
			16 => "PILY_DIAMETR_OSNOVNOGO_OTVERSTIYA_PILY",
			17 => "_KHOD_SHLIFOVANIYA",
			18 => "_RAZEMA_PYLEUDALENIYA_",
			19 => "ELEMENT_SVOYSTVA_OBEKTOV",
			20 => "_NAPRYAZHENIE_AKKUMULYATORA_",
			21 => "_YEMKOST_LITIY_IONNOGO_AKKUMUL",
			22 => "SHIRINA_NOZHA",
			23 => "TOLSHCHINA_NOZHA",
			24 => "REKOMENDOVANO_SERVISOM",
			25 => "_MASSA",
			26 => "_MAKS_KRUTYASHCHIY_MOMENT_DR_ST",
			27 => "_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO",
			28 => "_SMENNAYA_SHLIFOVALNAYA_TARELKA_",
			29 => "_SKOROSTI_",
			30 => "_DIAMETR_OTVERSTIYA_DEREVO_STAL",
			31 => "_POTREBLYAEMAYA_MOSHCHNOST",
			32 => "_SKOROST_PRI_EKSTSENTR_DVIZHENII",
			33 => "SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA",
			34 => "_DIAPAZON_ZAZHIMA_PATRONA_",
			35 => "_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_",
			36 => "DLINA_NOZHA",
			37 => "D_DIAMETR_RABOCHEY_CHASTI2",
			38 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "ZATOCH",
			1 => "UGOL_NAKLONA",
			2 => "OVCHINA",
			3 => "DIAGONALNYY_PROPIL_PRI_90_90",
			4 => "KHOD_FREZY",
			5 => "STUPENI_REGUL_MAYATN_KHODA",
			6 => "OSNASTKA",
			7 => "FREZEROVANIE_DLYA_SOEDINENIYA_V_US",
			8 => "SMESHIVAEMOE_KOLICHESTVO",
			9 => "PROIZVODITELNOST",
			10 => "GLUB_PROPILA_45_45_SPRAVA",
			11 => "GLUBINA_PROPILA_90_90",
			12 => "VNUTRENNIY_RADIUS",
			13 => "SKOROST_LENTY_PRI_NOMINALNOY_NAGRUZKE",
			14 => "NAPRAVLENIE_VRASHCHENIYA",
			15 => "MINIMALNOE_RAZREZHENIE",
			16 => "MAKS_DIAMETR_FREZY",
			17 => "GLUB_REZA_PO_TSVETNOMU_METALLU",
			18 => "REGULIRUEMAYA_VYSOTA",
			19 => "VNESHNIY_UGOL",
			20 => "VYSOTA_STOLA_NA_MFT",
			21 => "SMENNAYA_SHLIFOVALNAYA_PODOSHVA",
			22 => "PROIZVOD_NASOSA_PRI_50_GTS",
			23 => "RASSTOYANIE_SBOKU",
			24 => "SKOROSTI",
			25 => "MAKS_OBEM_REZERVUARA",
			26 => "RASKHODNYY_MATERIAL",
			27 => "MAKS_CHASTOTA_UDAROV",
			28 => "MASSA",
			29 => "GLUBINA_PROPILA_45_90",
			30 => "RABOCHEE_DAVLENIE_DAVLENIE_SZHATOGO_VOZDUKHA",
			31 => "TEMPERATURA_PLAVLENIYA",
			32 => "CHAST_VRASHCH_KHOL_KHODA_3_YA_4_YA_SK",
			33 => "DIAPAZON_UGLA",
			34 => "UROVEN_ZVUKOVOGO_DAVLENIYA",
			35 => "TOLSHCHINA_KROMOCHNOGO_MATERIALA",
			36 => "SKOROST_PRI_DVIZHENII_ROTEX",
			37 => "PODSHIPNIK",
			38 => "TOCHNAYA_REGULIROVKA_GLUBINY_FREZEROVANIYA",
			39 => "SPOSOB_KREPLENIYA_NOZHA",
			40 => "KHOD_SHLIFOVANIYA",
			41 => "SMENNAYA_SHLIFOVALNAYA_TARELKA_",
			42 => "MAKSIMALNYY_KRUTYASHCHIY_MOMENT_PO_METALLU",
			43 => "YEMKOST_AKKUMULYATORA",
			44 => "MASSA_BAZOVOGO_MODULYA",
			45 => "SPETS_GLUB_PROPILA_45_90_SL_",
			46 => "POLIROVALNYY_MATERIAL",
			47 => "GUBKA",
			48 => "MASSA_1X18_V_2X18_V",
			49 => "TIP_DVIGATELYA",
			50 => "OGRANICHITEL_GLUBINY_FREZEROVANIYA",
			51 => "SKOROST_PRI_EKSTSENTR_DVIZHENII",
			52 => "PYATNO_SHLIFOVANIYA",
			53 => "GLUBINA_FREZEROVANIYA",
			54 => "MASSA_S_OGRANICHITELEM_GLUBINY",
			55 => "VYSOTA_STOLA_BEZ_NOZHEK",
			56 => "SPETS_GLUBINA_PROPILA_45_90",
			57 => "DIAGONALNYY_PROPIL_PRI_45_90",
			58 => "D_DIAMETR_KHVOSTOVIKA",
			59 => "GLUBINA_REZA_BEZ_S_SHINOY_NAPRAVLYAYUSHCHEY",
			60 => "TIP_PRIVODA",
			61 => "GLUB_PROPILA_50_90_SLEVA",
			62 => "H_VYSOTA_RABOCHEY_CHASTI",
			63 => "MAKS_SHIRINA_ZAGOTOVKI",
			64 => "NAPRYAZHENIE_AKKUMULYATORA",
			65 => "TIP_KREPLENIYA",
			66 => "MAKS_SKOROST_VRASHCHENIYA_VALA",
			67 => "SHLIFOVALNAYA_PODOSHVA_STICKFIX",
			68 => "DIAMETR_DISKA",
			69 => "DLINA_SETEVOGO_KABELYA_S_REZINOVOY_IZOLYATSIEY",
			70 => "MAKSIMALNAYA_GLUBINA_FREZEROVANIYA_VERTIKALNO",
			71 => "SHIRINA_OBRABOTKI",
			72 => "VYSOTA_STOLA_NA_NOZHKAKH",
			73 => "GLUBINA_REZA_PO_METALLU",
			74 => "RASSTOYANIE_SPEREDI",
			75 => "RAZMERY_DXSHXV",
			76 => "POLITURA",
			77 => "FETR",
			78 => "MAKS_KRUTYASHCHIY_MOMENT_DR_ST",
			79 => "REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKOROS",
			80 => "DLINA",
			81 => "RAB_VYSOTA_S_OTKIDN_NOZHKAMI",
			82 => "SHIRINA",
			83 => "UROVEN_EMISSII_KOLEBANIY_M_S2_PO_ODNOY_OSI",
			84 => "PROIZVOD_NASOSA_PRI_60_GTS",
			85 => "SPETS_GLUBINA_PROPILA_90_90",
			86 => "SHLIFOVALNAYA_TARELKA_FASTFIX_",
			87 => "R_RADIUS_REZHUSHCHEY_CHASTI",
			88 => "GLUBINA_PROPILA_UGOL_90_45",
			89 => "VYSOTA_REZA",
			90 => "MOSHCHNOST_PODKLYUCHAEMOGO_INSTRUMENTA_MAKS",
			91 => "CHISLO_RABOCHIKH_KHODOV",
			92 => "UGOL_SKOSA",
			93 => "GLUB_PROPILA_60_90_SPRAVA",
			94 => "VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION",
			95 => "RASKHOD_VOZDUKHA_PRI_NOMINALNOY_NAGRUZKE",
			96 => "POTREBLYAEM_MOSHCHNOST_PRI_50_GTS",
			97 => "DIAMETR_SVERLENIYA_DEREVO",
			98 => "DIAMETR",
			99 => "MAKS_GLUBINA_FREZEROVANIYA",
			100 => "PLOSHCHAD_FILTROELEMENTA",
			101 => "REGULIROVKA_NAKLONA",
			102 => "DLINA_LENTY_X_SHIRINA_LENTY",
			103 => "SHIRINA_FREZEROVANIYA",
			104 => "VNUTRENNIY_UGOL",
			105 => "MAKS_SKOROST_PYLEUDALENIYA",
			106 => "DIAMETR_POSADOCHNYY",
			107 => "CHISLO_OBOROTOV_KHOLOST_KHODA",
			108 => "TOLSHCHINA_PROPILA",
			109 => "GLUBINA_REZA",
			110 => "DIAMETR_SHLITSEVOY_FREZY_DOMINO",
			111 => "MOSHCHNOST",
			112 => "L_DLINA_SVERLA_OBSHCHAYA",
			113 => "RABOCHAYA_VYSOTA_STOLA",
			114 => "PROIZVODITEL",
			115 => "MAKS_VYSOTA_ZAGOTOVKI",
			116 => "MAKSIMALNAYA_GLUBINA_FREZEROVANIYA_GORIZONTALNO",
			117 => "DIAMETR_VNESHNIY",
			118 => "MAKS_DIAMETR_POLIROVALNOY_TARELKI",
			119 => "DIAMETR_RAZEMA_PYLEUDALENIYA",
			120 => "KOLICHESTVO_Z",
			121 => "MAKS_RAZREZHENIE",
			122 => "GLUBINA_REZA_PRI_45",
			123 => "MAKS_DIAMETR_NASADKI_MESHALKI",
			124 => "GLUBINA_REZA_PO_DEREVU",
			125 => "UROVEN_EMISSII_KOLEBANIY_M_S2_PO_TREM_OSYAM",
			126 => "DIAMETR_ZAZHIMNOY_TSANGI",
			127 => "MAKS_SHIRINA_PROPILA_PRI_PRODOLNOY_RASPILOVKE",
			128 => "REGULIROVKA_VYSOTY_FREZY",
			129 => "DIAPAZON_ZAZHIMA_PATRONA",
			130 => "GLUBINA_OBRABOTKI",
			131 => "D_DIAMETR_RABOCHEY_CHASTI",
			132 => "TARELKA_POLIROVALNAYA",
			133 => "GLUB_PROPILA_45_45_SLEVA",
			134 => "MAKS_GLUBINA_CHETVERTI",
			135 => "SHPINDEL",
			136 => "MAKSIMALNAYA_SHIRINA_PROPILA_PRI_TORTSEVANII",
			137 => "DLINA_PROTYAZHKI",
			138 => "POTREBLYAEM_MOSHCHNOST_PRI_60_GTS",
			139 => "RAZMERY_MODULNOGO_KRONSHTEYNA",
			140 => "_VREMYA_NAGREVA",
			141 => "_GLUB_PROPILA_45_45_SPRAVA",
			142 => "ELEMENT_SVOYSTVA_OBEKTOV",
			143 => "_GLUBINA_PROPILA_90_90",
			144 => "_DIAPAZON_UGLA",
			145 => "_NAPRYAZHENIE_AKKUMULYATORA_",
			146 => "_YEMKOST_LITIY_IONNOGO_AKKUMUL",
			147 => "_YEMKOST_LITIY_IONNOGO_AKKUMUL_1",
			148 => "_TEMPERATURA_PLAVLENIYA",
			149 => "_SMESHIVAEMOE_KOLICHESTVO",
			150 => "SHIRINA_NOZHA",
			151 => "_GLUB_REZA_PO_TSVETNOMU_METALLU",
			152 => "_DIAPAZON_ZAZHIMA_PATRONA",
			153 => "_TOLSHCHINA_KROMOCHNOGO_MATERIALA",
			154 => "_VYSOTA_STOLA_BEZ_NOZHEK_2",
			155 => "_MAKS_DIAMETR_FREZY",
			156 => "_REGULIRUEMAYA_VYSOTA",
			157 => "_SKOROST_LENTY_PRI_NOMINALNOY_NAGRUZKE",
			158 => "TOLSHCHINA_NOZHA",
			159 => "_VNESHNIY_UGOL",
			160 => "REKOMENDOVANO_SERVISOM",
			161 => "_MASSA",
			162 => "_VYSOTA_STOLA_NA_MFT",
			163 => "_MAKS_KRUTYASHCHIY_MOMENT_DR_ST",
			164 => "_RAZMERY_STOLA",
			165 => "_NAPRYAZHENIE_AKKUMULYATORA",
			166 => "_REGULIROVKA_KRUTYASHCHEGO_MOMENTA_1_YA_2_YA_SKORO",
			167 => "_MAKS_CHASTOTA_UDAROV",
			168 => "_SMENNAYA_SHLIFOVALNAYA_TARELKA_",
			169 => "_VYSOTA_KROMOCHNOGO_MATERIALA",
			170 => "_MASSA_S_AKKUMULYATOROM_LI_ION",
			171 => "_MINIMALNOE_RAZREZHENIE",
			172 => "_SKOROSTI_",
			173 => "_SMENNAYA_SHLIFOVALNAYA_PODOSHVA",
			174 => "_VYSOTA_STOLA_BEZ_NOZHEK",
			175 => "_DIAMETR_OTVERSTIYA_DEREVO_STAL",
			176 => "_GLUBINA_PROPILA_45_90",
			177 => "_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION",
			178 => "_DIAMETR_PILNOGO_DISKA",
			179 => "_POTREBLYAEMAYA_MOSHCHNOST",
			180 => "_SKOROST_PRI_EKSTSENTR_DVIZHENII",
			181 => "_DLINA_SETEVOGO_KABELYA_S_REZINOVOY_IZOLYATSIEY",
			182 => "SVOYSTVO_OBEKTOV_2_DLYA_RAZDELA_SVERLA",
			183 => "_PROIZVOD_NASOSA_PRI_50_GTS",
			184 => "_CHISLO_OBOROTOV_KHOLOST_KHODA",
			185 => "_RASSTOYANIE_SBOKU",
			186 => "_VYSOTA_STOLA_NA_NOZHKAKH",
			187 => "_POTREBLYAEMAYA_MOSHCHNOST_1",
			188 => "_RAZMERY_DXSHXV",
			189 => "_RAZMERY_MODULNOGO_KRONSHTEYNA",
			190 => "_DIAPAZON_ZAZHIMA_PATRONA_",
			191 => "_VREMYA_ZARYADKI_AKKUMULYATORA_LI_ION_",
			192 => "_SKOROST_VRASHCHENIYA_VALA",
			193 => "DLINA_NOZHA",
			194 => "_MOSHCHNOST_PODKLYUCHAEMOGO_INSTRUMENTA_MAKS",
			195 => "_MAKSIMALNYY_KRUTYASHCHIY_MOMENT_PO_METALLU",
			196 => "_TOCHNAYA_REGULIROVKA_GLUBINY_FREZEROVANIYA",
			197 => "_GLUBINA_REZA",
			198 => "_KLASS_ZASHCHITY",
			199 => "D_DIAMETR_RABOCHEY_CHASTI2",
			200 => "_PLOSHCHAD_FILTROELEMENTA",
			201 => "_RABOCHEE_DAVLENIE_DAVLENIE_SZHATOGO_VOZDUKHA",
			202 => "_SKOROST_PRI_DVIZHENII_ROTEX",
			203 => "_MAKS_SKOROST_PYLEUDALENIYA",
			204 => "_SPETS_GLUB_PROPILA_45_90_SL_",
			205 => "_MAKS_DIAMETR_POLIROVALNOY_TARELKI",
			206 => "_KHOD_SHLIFOVANIYA_1",
			207 => "_GLUBINA_REZA_PRI_45",
			208 => "_DIAMETR_OTVERSTIYA_V_KIRPICHNOY_KLADKE",
			209 => "_SMENNAYA_SHLIFOVALNAYA_TARELKA__2",
			210 => "_VYSOTA_STOLA_NA_NOZHKAKH_2",
			211 => "_DIAMETR_RAZEMA_PYLEUDALENIYA_1",
			212 => "_OGRANICHITEL_GLUBINY_FREZEROVANIYA",
			213 => "_GLUBINA_FREZEROVANIYA",
			214 => "_SHPINDEL",
			215 => "_SPETS_GLUBINA_PROPILA_45_90",
			216 => "_UROVEN_ZVUKOVOGO_DAVLENIYA",
			217 => "_DIAGONALNYY_PROPIL_PRI_45_90",
			218 => "_MAKS_RAZREZHENIE",
			219 => "_SHLIFOVALNAYA_TARELKA__1",
			220 => "_SKOROST_PRI_EKSTSENTR_DVIZHENII_1",
			221 => "_GLUB_PROPILA_50_90_SLEVA",
			222 => "_PYATNO_SHLIFOVANIYA",
			223 => "_MAKS_SHIRINA_ZAGOTOVKI",
			224 => "_DIAMETR_SHLIFKRUGA",
			225 => "_GLUBINA_REZA_PO_STALI_MYAGK_",
			226 => "SVYAZANNYE_TOVARY",
			227 => "_MASSA_DLINA_1_60_M",
			228 => "_SMENNAYA_SHLIFOVALNAYA_TARELKA__1",
			229 => "_MAKSIMALNAYA_GLUBINA_FREZEROVANIYA_VERTIKALNO",
			230 => "_MASSA_BAZOVOGO_MODULYA",
			231 => "_DIAMETR_RAZEMA_PYLEUDALENIYA_2",
			232 => "_MASSA_1X18_V_2X18_V",
			233 => "_DLINA",
			234 => "_MAKS_SKOROST_VRASHCHENIYA_VALA",
			235 => "_SHIRINA",
			236 => "_SPETS_GLUBINA_PROPILA_90_90",
			237 => "_MASSA_S_OGRANICHITELEM_GLUBINY",
			238 => "_GLUBINA_PROPILA_UGOL_90_45",
			239 => "_VYSOTA_REZA",
			240 => "_UGOL_SKOSA",
			241 => "_DIAMETR_SVERLENIYA_DREVESINA_METALL_KAMEN",
			242 => "_GLUB_PROPILA_60_90_SPRAVA",
			243 => "_SHLIFOVALNAYA_TARELKA_",
			244 => "_GLUBINA_REZA_BEZ_S_SHINOY_NAPRAVLYAYUSHCHEY",
			245 => "_RAZMERY_STOLA_1",
			246 => "_DIAMETR_ZAZHIMNOY_SHEYKI",
			247 => "_REGULIROVKA_NAKLONA",
			248 => "_MASSA_MODULNOGO_KRONSHTEYNA",
			249 => "_REGULIROVKA_NAKLONA_1",
			250 => "_VNUTRENNIY_UGOL",
			251 => "_SKOROST_VRASHCHENIYA",
			252 => "_SHLIFOVALNAYA_TARELKA_FASTFIX_",
			253 => "_MAKS_GLUBINA_FREZEROVANIYA",
			254 => "_MASSA_KOMPLEKT",
			255 => "_CHISLO_RABOCHIKH_KHODOV_1",
			256 => "_REZBA_SHPINDELYA",
			257 => "_SHIRINA_FREZEROVANIYA",
			258 => "_SHLIFOVALNAYA_PODOSHVA_STICKFIX",
			259 => "_VYSOTA_STOLA_BEZ_NOZHEK_1",
			260 => "_DIAMETR_RAZEMA_PYLEUDALENIYA_3",
			261 => "_MAKS_VYSOTA_ZAGOTOVKI",
			262 => "_SHIRINA_STROGANIYA",
			263 => "_DLINA_LENTY_X_SHIRINA_LENTY",
			264 => "_GLUBINA_REZA_PO_DEREVU",
			265 => "_DIAMETR_SHLITSEVOY_FREZY_DOMINO",
			266 => "_RASSTOYANIE_SPEREDI",
			267 => "_SKOROST_VRASHCHENIYA_1",
			268 => "_VYSOTA_STOLA_NA_NOZHKAKH_1",
			269 => "_MAKSIMALNAYA_GLUBINA_FREZEROVANIYA_GORIZONTALNO",
			270 => "_RAZMERY_DXSHXV_1",
			271 => "_CHISLO_RABOCHIKH_KHODOV",
			272 => "_GLUB_PROPILA_45_45_SLEVA",
			273 => "_DLINA_PROTYAZHKI",
			274 => "_POTREBLYAEMAYA_MOSHCHNOST_3",
			275 => "_RAB_VYSOTA_S_OTKIDN_NOZHKAMI",
			276 => "_DIAMETR_ZAZHIMNOY_TSANGI",
			277 => "_REGULIROVKA_VYSOTY_FREZY",
			278 => "_UROVEN_EMISSII_KOLEBANIY_M_S2_PO_ODNOY_OSI",
			279 => "_PROIZVOD_NASOSA_PRI_60_GTS",
			280 => "_MASSA_2",
			281 => "_MASSA_DLINA_1_10_M",
			282 => "_MASSA_KOMPLEKT_1",
			283 => "_POTREBLYAEMAYA_MOSHCHNOST_2",
			284 => "SVYAZANNYY_TOVAR_2",
			285 => "_RASKHOD_VOZDUKHA_PRI_NOMINALNOY_NAGRUZKE",
			286 => "_POTREBLYAEM_MOSHCHNOST_PRI_50_GTS",
			287 => "_DIAMETR_RAZEMA_PYLEUDALENIYA_4",
			288 => "_DIAMETR_RAZEMA_PYLEUDALENIYA_5",
			289 => "_MASSA_S_MAGAZINOM",
			290 => "_MASSA_DLINA_1_10_M_1",
			291 => "_MASSA_3",
			292 => "_RABOCHAYA_VYSOTA_STOLA",
			293 => "_MASSA_MODULNOGO_KRONSHTEYNA_1",
			294 => "_DIAMETR_RAZEMA_PYLEUDALENIYA_6",
			295 => "_MAKS_DIAMETR_NASADKI_MESHALKI",
			296 => "_UROVEN_EMISSII_KOLEBANIY_M_S2_PO_TREM_OSYAM",
			297 => "_MAKS_SHIRINA_PROPILA_PRI_PRODOLNOY_RASPILOVKE",
			298 => "_GLUBINA_STROGANIYA",
			299 => "_MASSA_DLINA_1_60_M_1",
			300 => "_RAZMERY_MODULNOGO_KRONSHTEYNA_1",
			301 => "_MAKS_GLUBINA_CHETVERTI",
			302 => "_MAKSIMALNAYA_SHIRINA_PROPILA_PRI_TORTSEVANII",
			303 => "_POTREBLYAEM_MOSHCHNOST_PRI_60_GTS",
			304 => "_RAZMERY_MODULNOGO_KRONSHTEYNA_2",
			305 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "",
		),
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "N",
		"USE_STORE" => "N",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER2" => "desc",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"TEMPLATE_THEME" => "blue",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "N",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => array(
			0 => "CML2_MANUFACTURER",
		),
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"DETAIL_SHOW_MAX_QUANTITY" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BRAND_USE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "Y",
		"PRODUCT_PROPERTIES" => array(
			0 => "CML2_MANUFACTURER",
			1 => "CML2_TRAITS",
			2 => "NAPRAVLENIE_VRASHCHENIYA",
			3 => "PODSHIPNIK",
			4 => "SPOSOB_KREPLENIYA_NOZHA",
			5 => "D_DIAMETR_KHVOSTOVIKA",
			6 => "TIP_PRIVODA",
			7 => "H_VYSOTA_RABOCHEY_CHASTI",
			8 => "R_RADIUS_REZHUSHCHEY_CHASTI",
			9 => "DIAMETR_POSADOCHNYY",
			10 => "TOLSHCHINA_PROPILA",
			11 => "L_DLINA_SVERLA_OBSHCHAYA",
			12 => "DIAMETR_VNESHNIY",
			13 => "KOLICHESTVO_Z",
			14 => "D_DIAMETR_RABOCHEY_CHASTI",
		),
		"OFFERS_CART_PROPERTIES" => array(
			0 => "CML2_ARTICLE",
		),
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#.html",
			"compare" => "compare.php?action=#ACTION_CODE#",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>