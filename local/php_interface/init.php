<?
$httphost = str_replace("www.", "", $_SERVER["HTTP_HOST"]);
if($httphost == "btools.ru" || $httphost == "btstanki.ru") {
    define('ISPRODUCTION', true);
} else {
    define('ISPRODUCTION', false);
}

if ($_SERVER["REMOTE_ADDR"] == '194.152.34.147') {
    define('MY', true);
} else {
    define('MY', false);
}

$APPLICATION->GetCurPage() === '/' ? define('ISINDEX', true) : define('ISINDEX', false);

//include($_SERVER['DOCUMENT_ROOT']."/local/bitrix/vetalkms/validators/string_regexp.php");

CModule::AddAutoloadClasses(null,
    array(
        // Агенты
        'Bitrix\\VetalKms\\Agent' => '/local/bitrix/vetalkms/agent.php',
        //Валидация
        'Bitrix\\VetalKms\\validators\\CFormCustomValidatorStringRegExp' => '/local/bitrix/vetalkms/validators/string_regexp.php',
        'Bitrix\\VetalKms\\forms\\CFormHelper' => '/local/bitrix/vetalkms/forms/formhelper.php',
        //Ninjacat
        '\ninjacat\FacetMod' => '/local/php_interface/include/classes/facetmod.php',
        '\ninjacat\Tools' => '/local/php_interface/include/classes/tools.php'
        )
);



require($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/event_handler.php');

function plural_form($n, $forms) {
    return $n%10==1&&$n%100!=11?$forms[0]:($n%10>=2&&$n%10<=4&&($n%100<10||$n%100>=20)?$forms[1]:$forms[2]);
}

global $CML2_CURRENCY;

$CML2_CURRENCY['грн'] = 'UAH';
$CML2_CURRENCY['руб'] = 'RUB';
$CML2_CURRENCY['дол'] = 'USD';
?>
<?
global $USER;
$DISCOUNTS_IBLOCK_ID = 16;

// Определение сайта
if (SITE_ID == "s1") {
    $sSiteDir = "/btl";
} elseif (SITE_ID == "s2") {
    $sSiteDir = "/bts";
}

// Цепочка навигации
if (file_exists($_SERVER["DOCUMENT_ROOT"] . $sSiteDir . $APPLICATION->GetCurDir() . ".section.php")) {
    @require($_SERVER["DOCUMENT_ROOT"] . $sSiteDir . $APPLICATION->GetCurDir() . ".section.php");
    if ($sSectionName != "") {
        $APPLICATION->AddChainItem($sSectionName, $APPLICATION->GetCurDir());
    }
}


$_SERVER["REAL_FILE_PATH"] = $_SERVER["SCRIPT_NAME"];

if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) || isset($_SERVER['HTTP_X_REAL_IP'])) {
    foreach(array('HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP') as $key => $value) {
        if(
            isset($_SERVER[$value])
            &&  strlen($_SERVER[$value]) > 0
            &&  strpos($_SERVER[$value], "127.") !== 0
        ) {
            if($p = strrpos($_SERVER[$value], ","))
            {
                $_SERVER["REMOTE_ADDR"] = $REMOTE_ADDR = trim(substr($_SERVER[$value], $p+1));
                $_SERVER["HTTP_X_FORWARDED_FOR"] = substr($_SERVER[$value], 0, $p);
            }
            else
                $_SERVER["REMOTE_ADDR"]= $REMOTE_ADDR = $_SERVER[$value];

            break;
        }
    }
}


// Отладка
function pr($mixed)
{
	echo "<div  style='border-radius: 10px; z-index: 1000; opacity: 0.7; background-color: red; padding: 30px; color: #ffffff; position: absolute; top: 50px; left: 50px; font-weight: bold';'><pre>".print_r($mixed, 1)."</pre></div>";
}

function Add2BasketByProductIDCustom($PRODUCT_ID, $QUANTITY = 1, $arProductParams = array())
{
    $PRODUCT_ID = IntVal($PRODUCT_ID);
    if ($PRODUCT_ID <= 0) {
        $GLOBALS["APPLICATION"]->ThrowException("Empty product field", "EMPTY_PRODUCT_ID");
        return false;
    }

    $QUANTITY = DoubleVal($QUANTITY);
    if ($QUANTITY <= 0)
        $QUANTITY = 1;

    if (!CModule::IncludeModule("sale")) {
        $GLOBALS["APPLICATION"]->ThrowException("Sale module is not installed", "NO_SALE_MODULE");
        return false;
    }

    if (CModule::IncludeModule("statistic") && IntVal($_SESSION["SESS_SEARCHER_ID"]) > 0) {
        $GLOBALS["APPLICATION"]->ThrowException("Searcher can not buy anything", "SESS_SEARCHER");
        return false;
    }

    $arProduct = CCatalogProduct::GetByID($PRODUCT_ID);
    if ($arProduct === false) {
        $GLOBALS["APPLICATION"]->ThrowException("Product is not found", "NO_PRODUCT");
        return false;
    }

    if ($arProduct["QUANTITY_TRACE"] == "Y" && DoubleVal($arProduct["QUANTITY"]) <= 0) {
        $GLOBALS["APPLICATION"]->ThrowException("Product is run out", "PRODUCT_RUN_OUT");
        return false;
    }


    $CALLBACK_FUNC = "CatalogBasketCallbackCustom";
    $arCallbackPrice = CSaleBasket::ReReadPrice($CALLBACK_FUNC, "catalog", $PRODUCT_ID, $QUANTITY);
    if (!is_array($arCallbackPrice) || count($arCallbackPrice) <= 0) {
        $GLOBALS["APPLICATION"]->ThrowException("Product price is not found", "NO_PRODUCT_PRICE");
        return false;
    }


//	$arIBlockElement = GetIBlockElement($PRODUCT_ID);
    $dbIBlockElement = CIBlockElement::GetList(array(), array(
        "ID" => $PRODUCT_ID,
        "ACTIVE_DATE" => "Y",
        "ACTIVE" => "Y",
        "CHECK_PERMISSIONS" => "Y",
    ), false, false, array(
        "ID",
        "IBLOCK_ID",
        "XML_ID",
        "NAME",
        "DETAIL_PAGE_URL",
    ));
    $arIBlockElement = $dbIBlockElement->GetNext();

    if ($arIBlockElement == false) {
        $GLOBALS["APPLICATION"]->ThrowException("Infoblock element is not found", "NO_IBLOCK_ELEMENT");
        return false;
    }


    $arProps = array();

    $dbIBlock = CIBlock::GetList(
        array(),
        array("ID" => $arIBlockElement["IBLOCK_ID"])
    );
    if ($arIBlock = $dbIBlock->Fetch()) {
        $arProps[] = array(
            "NAME" => "Catalog XML_ID",
            "CODE" => "CATALOG.XML_ID",
            "VALUE" => $arIBlock["XML_ID"]
        );
    }

    $arProps[] = array(
        "NAME" => "Product XML_ID",
        "CODE" => "PRODUCT.XML_ID",
        "VALUE" => $arIBlockElement["XML_ID"]
    );

    $arPrice = CPrice::GetByID($arCallbackPrice["PRODUCT_PRICE_ID"]);
//  debugmessage($CALLBACK_FUNC);exit();
//echo('<pre>PRICE::' . print_r($arCallbackPrice, 1) . '</pre>');
//return false;

    $arFields = array(
        "PRODUCT_ID" => $PRODUCT_ID,
        "PRODUCT_PRICE_ID" => $arCallbackPrice["PRODUCT_PRICE_ID"],
        "PRICE" => $arCallbackPrice["PRICE"],
        "CURRENCY" => $arCallbackPrice["CURRENCY"],
        "WEIGHT" => $arProduct["WEIGHT"],
        "QUANTITY" => $QUANTITY,
        "LID" => SITE_ID,
        "DELAY" => "N",
        "CAN_BUY" => "Y",
        "NAME" => $arIBlockElement["~NAME"],
        "CALLBACK_FUNC" => $CALLBACK_FUNC,
        "MODULE" => "catalog",
        //"NOTES" => $arProduct["CATALOG_GROUP_NAME"],
        "NOTES" => $arPrice["CATALOG_GROUP_NAME"],
        "ORDER_CALLBACK_FUNC" => "CatalogBasketOrderCallbackCustom",
        "CANCEL_CALLBACK_FUNC" => "CatalogBasketCancelCallback",
        "PAY_CALLBACK_FUNC" => "CatalogPayOrderCallback",
        "DETAIL_PAGE_URL" => $arIBlockElement["DETAIL_PAGE_URL"],
        "CATALOG_XML_ID" => $arIBlock["XML_ID"],
        "PRODUCT_XML_ID" => $arIBlockElement["XML_ID"],
        "VAT_RATE" => $arCallbackPrice['VAT_RATE'],
        "DISCOUNT_PRICE" => 10,      //величина скидки
        "DISCOUNT_NAME" => 'discount', //название скидки
        "DISCOUNT_VALUE" => 10,      //размер скидки (в процентах)

    );

    if ($arProduct["QUANTITY_TRACE"] == "Y") {
        if (IntVal($arProduct["QUANTITY"]) - $QUANTITY < 0)
            $arFields["QUANTITY"] = DoubleVal($arProduct["QUANTITY"]);
    }

    if (is_array($arProductParams) && count($arProductParams) > 0) {
        for ($i = 0; $i < count($arProductParams); $i++) {
            $arProps[] = array(
                "NAME" => $arProductParams[$i]["NAME"],
                "CODE" => $arProductParams[$i]["CODE"],
                "VALUE" => $arProductParams[$i]["VALUE"],
                "SORT" => $arProductParams[$i]["SORT"]
            );
        }
    }
    $arFields["PROPS"] = $arProps;

//   debugmessage($arFields);exit();

    $addres = CSaleBasket::Add($arFields);
    if ($addres) {
        if (CModule::IncludeModule("statistic"))
            CStatistic::Set_Event("sale2basket", "catalog", $arFields["DETAIL_PAGE_URL"]);
    }

    return $addres;
}


function CatalogBasketCallbackCustom($productID, $quantity = 0, $renewal = "N")
{
    global $USER, $DISCOUNTS_IBLOCK_ID;

    $productID = IntVal($productID);
    $quantity = DoubleVal($quantity);
    $renewal = (($renewal == "Y") ? "Y" : "N");

    $arResult = array();

    if ($arCatalogProduct = CCatalogProduct::GetByID($productID)) {
        if ($arCatalogProduct["QUANTITY_TRACE"] == "Y" && DoubleVal($arCatalogProduct["QUANTITY"]) <= 0)
            return $arResult;

    }

    $dbIBlockElement = CIBlockElement::GetList(
        array(),
        array(
            "ID" => $productID,
            "ACTIVE_DATE" => "Y",
            "ACTIVE" => "Y",
            "CHECK_PERMISSIONS" => "Y"
        )
    );
    $arProduct = $dbIBlockElement->GetNext();
    $arCatalog = CCatalog::GetByID($arProduct["IBLOCK_ID"]);
    if ($arCatalog["SUBSCRIPTION"] == "Y") {
        $quantity = 1;
    }

    //echo '<pre>Product: '; print_r($arCatalogProduct); echo '</pre>';
    $arPrice = CCatalogProduct::GetOptimalPrice($productID, $quantity, $USER->GetUserGroupArray(), $renewal);
    //echo '<pre>Price: '; print_r($arPrice); echo '</pre>';

    if (!$arPrice || count($arPrice) <= 0) {
        if ($nearestQuantity = CCatalogProduct::GetNearestQuantityPrice($productID, $quantity, $USER->GetUserGroupArray())) {
            $quantity = $nearestQuantity;
            $arPrice = CCatalogProduct::GetOptimalPrice($productID, $quantity, $USER->GetUserGroupArray(), $renewal);
        }
    }

    if (!$arPrice || count($arPrice) <= 0) {
        return $arResult;
    }

    $currentPrice = $arPrice["PRICE"]["PRICE"];
    $currentDiscount = 0.0;

    //SIGURD: logic change. see mantiss 5036.
    // discount applied to a final price with VAT already included.
    if ($arPrice['PRICE']['VAT_INCLUDED'] == 'N') {
        if (DoubleVal($arPrice['PRICE']['VAT_RATE']) > 0) {
            $currentPrice *= (1 + $arPrice['PRICE']['VAT_RATE']);
            $arPrice['PRICE']['VAT_INCLUDED'] = 'y';
        }
    }

    $dbIBlockDiscountElement = CIBlockElement::GetList(
        array(),
        array(
            "IBLOCK_ID" => $DISCOUNTS_IBLOCK_ID,
            "ACTIVE" => "Y",
            "PROPERTY_USERS" => $USER->GetID(),
            array(
                "LOGIC" => "OR",
                "PROPERTY_SECTIONS" => $arProduct["IBLOCK_SECTION_ID"],
                "PROPERTY_ITEMS" => $productID,
            )
        ),
        false,
        false,
        array("PROPERTY_DISCOUNT")
    );

    $dblCurDiscount = 0.0;
    while ($arDiscount = $dbIBlockDiscountElement->GetNext()) {
//echo('<pre>DISC::' . print_r($arDiscount, 1) . '</pre>');
        $dblDiscount = DoubleVal($arDiscount['PROPERTY_DISCOUNT_VALUE']);
        if ($dblCurDiscount < $dblDiscount)
            $dblCurDiscount = $dblDiscount;
    }

    if ($dblCurDiscount) {
        $currentDiscount = $currentPrice * $dblCurDiscount / 100.0;
        $currentDiscount = roundEx($currentDiscount, SALE_VALUE_PRECISION);
        $currentPrice = $currentPrice - $currentDiscount;
    }

    $arResult = array(
        "PRODUCT_PRICE_ID" => $arPrice["PRICE"]["ID"],
        "PRICE" => $currentPrice,
        "VAT_RATE" => $arPrice['PRICE']['VAT_RATE'],
        "CURRENCY" => $arPrice["PRICE"]["CURRENCY"],
        "QUANTITY" => $quantity,
        "DISCOUNT_PRICE" => $currentDiscount,
        "WEIGHT" => 0,
        "NAME" => $arProduct["~NAME"],
        "CAN_BUY" => "Y",
        "NOTES" => $arPrice["PRICE"]["CATALOG_GROUP_NAME"]
    );

    if ($arCatalogProduct) {
        $arResult["WEIGHT"] = IntVal($arCatalogProduct["WEIGHT"]);
        if ($arCatalogProduct["QUANTITY_TRACE"] == "Y") {
            if ((DoubleVal($arCatalogProduct["QUANTITY"]) - $quantity) < 0)
                $arResult["QUANTITY"] = DoubleVal($arCatalogProduct["QUANTITY"]);
        }
    }

    //echo '<pre>arResult: '; print_r($arResult); echo '</pre>';

    return $arResult;
}

function CatalogBasketOrderCallbackCustom($productID, $quantity, $renewal = "N")
{
    global $USER, $DISCOUNTS_IBLOCK_ID;

    $productID = IntVal($productID);
    $quantity = DoubleVal($quantity);
    $renewal = (($renewal == "Y") ? "Y" : "N");
    $arResult = array();

    if ($arCatalogProduct = CCatalogProduct::GetByID($productID)) {
        if ($arCatalogProduct["QUANTITY_TRACE"] == "Y" && DoubleVal($arCatalogProduct["QUANTITY"]) < doubleVal($quantity))
            return $arResult;
    }

    $arPrice = CCatalogProduct::GetOptimalPrice($productID, $quantity, $GLOBALS["USER"]->GetUserGroupArray(), $renewal);
    if (!$arPrice || count($arPrice) <= 0) {
        if ($nearestQuantity = CCatalogProduct::GetNearestQuantityPrice($productID, $quantity, $GLOBALS["USER"]->GetUserGroupArray())) {
            $quantity = $nearestQuantity;
            $arPrice = CCatalogProduct::GetOptimalPrice($productID, $quantity, $GLOBALS["USER"]->GetUserGroupArray(), $renewal);
        }
    }
    if (!$arPrice || count($arPrice) <= 0) {
        return $arResult;
    }

    $dbIBlockElement = CIBlockElement::GetList(
        array(),
        array(
            "ID" => $productID,
            "ACTIVE_DATE" => "Y",
            "ACTIVE" => "Y",
            "CHECK_PERMISSIONS" => "Y"
        )
    );
    $arProduct = $dbIBlockElement->GetNext();

    $currentPrice = $arPrice["PRICE"]["PRICE"];
    $currentDiscount = 0.0;

    //SIGURD: logic change. see mantiss 5036.
    // discount applied to a final price with VAT already included.
    if ($arPrice['PRICE']['VAT_INCLUDED'] == 'N') {
        if (DoubleVal($arPrice['PRICE']['VAT_RATE']) > 0) {
            $currentPrice *= (1 + $arPrice['PRICE']['VAT_RATE']);
            $arPrice['PRICE']['VAT_INCLUDED'] = 'Y';
        }
    }

    $dbIBlockDiscountElement = CIBlockElement::GetList(
        array(),
        array(
            "IBLOCK_ID" => $DISCOUNTS_IBLOCK_ID,
            "ACTIVE" => "Y",
            "PROPERTY_USERS" => $USER->GetID(),
            array(
                "LOGIC" => "OR",
                "PROPERTY_SECTIONS" => $arProduct["IBLOCK_SECTION_ID"],
                "PROPERTY_ITEMS" => $productID,
            )
        ),
        false,
        false,
        array("PROPERTY_DISCOUNT")
    );

    $dblCurDiscount = 0.0;
    while ($arDiscount = $dbIBlockDiscountElement->GetNext()) {
        $dblDiscount = DoubleVal($arDiscount['PROPERTY_DISCOUNT_VALUE']);
        if ($dblCurDiscount < $dblDiscount)
            $dblCurDiscount = $dblDiscount;
    }

    if ($dblCurDiscount) {
        $currentDiscount = $currentPrice * $dblCurDiscount / 100.0;
        $currentDiscount = roundEx($currentDiscount, SALE_VALUE_PRECISION);
        $currentPrice = $currentPrice - $currentDiscount;
    }

    $arResult = array(
        "PRODUCT_PRICE_ID" => $arPrice["PRICE"]["ID"],
        "PRICE" => $currentPrice,
        "VAT_RATE" => $arPrice['PRICE']['VAT_RATE'],
        "CURRENCY" => $arPrice["PRICE"]["CURRENCY"],
        "QUANTITY" => $quantity,
        "WEIGHT" => 0,
        "NAME" => $arProduct["~NAME"],
        "CAN_BUY" => "Y",
        "NOTES" => $arPrice["PRICE"]["CATALOG_GROUP_NAME"],
        "DISCOUNT_PRICE" => $currentDiscount,
    );
    if (!empty($arPrice["DISCOUNT"])) {
        if (strlen($arPrice["DISCOUNT"]["COUPON"]) > 0)
            $arResult["DISCOUNT_COUPON"] = $arPrice["DISCOUNT"]["COUPON"];
        if ($arPrice["DISCOUNT"]["VALUE_TYPE"] == "P")
            $arResult["DISCOUNT_VALUE"] = $arPrice["DISCOUNT"]["VALUE"] . "%";
        else
            $arResult["DISCOUNT_VALUE"] = SaleFormatCurrency($arPrice["DISCOUNT"]["VALUE"], $arPrice["DISCOUNT"]["CURRENCY"]);
        $arResult["DISCOUNT_NAME"] = "[" . $arPrice["DISCOUNT"]["ID"] . "] " . $arPrice["DISCOUNT"]["NAME"];

        $dbCoupon = CCatalogDiscountCoupon::GetList(
            array(),
            array("COUPON" => $arPrice["DISCOUNT"]["COUPON"]),
            false,
            false,
            array("ID", "ONE_TIME")
        );
        if ($arCoupon = $dbCoupon->Fetch()) {
            $arFieldsCoupon = Array("DATE_APPLY" => Date($GLOBALS["DB"]->DateFormatToPHP(CSite::GetDateFormat("FULL", SITE_ID))));

            if ($arCoupon["ONE_TIME"] == "Y") {
                $arFieldsCoupon["ACTIVE"] = "N";

                foreach ($_SESSION["CATALOG_USER_COUPONS"] as $k => $v) {
                    if (trim($v) == trim($arPrice["DISCOUNT"]["COUPON"])) {
                        unset($_SESSION["CATALOG_USER_COUPONS"][$k]);
                        $_SESSION["CATALOG_USER_COUPONS"][$k] == "";
                    }
                }
            }

            CCatalogDiscountCoupon::Update($arCoupon["ID"], $arFieldsCoupon);
        }
    }

    if ($arCatalogProduct) {
        $arResult["WEIGHT"] = IntVal($arCatalogProduct["WEIGHT"]);
    }
    CCatalogProduct::QuantityTracer($productID, $quantity);
    return $arResult;
}

function ImportDiscountInfo($CATALOG_IBLOCK_ID, $DISCOUNTS_IBLOCK_ID)
{
    global $USER;
    if (!$USER)
        $USER = new CUser;

    WriteExLog('ImportDiscountInfo: START');

    if (!CModule::IncludeModule('main'))
        return ('ImportDiscountInfo(' . $CATALOG_IBLOCK_ID . ', ' . $DISCOUNTS_IBLOCK_ID . ');');
    if (!CModule::IncludeModule('iblock'))
        return ('ImportDiscountInfo(' . $CATALOG_IBLOCK_ID . ', ' . $DISCOUNTS_IBLOCK_ID . ');');

    $XML_PATH = $_SERVER['DOCUMENT_ROOT'] . '/upload/xml/';

    $DIR = opendir($XML_PATH);

    $DISCOUNTS = array();
    $arFilter = array('IBLOCK_ID' => $DISCOUNTS_IBLOCK_ID);
    $arSelect = array('ID', 'NAME');
    $Res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($Data = $Res->GetNext())
        $DISCOUNTS[$Data['NAME']] = $Data['ID'];

    $cUser = new CUser;

    while ($file = readdir($DIR)) {
        if (strpos($file, '.xml') > 0) {
            $FILE_PATH = $XML_PATH . $file;
            $XML = simplexml_load_file($FILE_PATH);

            foreach ($XML as $DATA) {
                $PROP = array();
                $PROP['DISCOUNT'] = (string)$DATA->ПроцентСкидкиНаценки;
                $NAME = (string)$DATA->Ид;
                $CODE = $NAME;

                $bDelete = false;
                foreach ($DATA->ЗначенияРеквизитов->ЗначениеРеквизита as $Rekvizit) {
                    if ($Rekvizit->Наименование == 'Удаление' && $Rekvizit->Значение == 'true') {
                        $bDelete = true;
                        break;
                    }
                }
                if ($bDelete && array_key_exists($NAME, $DISCOUNTS)) {
                    $DISCOUNT_ID = $DISCOUNTS[$NAME];
                    CIBlockElement::Delete($DISCOUNT_ID);
                    break;
                }

                $Goods = array();
                foreach ($DATA->Товары->Товар as $GOOD) {
                    $ID = (string)$GOOD->Ид;
                    $arSelect = Array("ID", "NAME");
                    $arFilter = Array("IBLOCK_ID" => $CATALOG_IBLOCK_ID, "XML_ID" => $ID);
                    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
                    while ($ob = $res->GetNext())
                        $Goods[] = $ob['ID'];
                }
                if (count($Goods))
                    $PROP['ITEMS'] = $Goods;

                $Sections = array();
                foreach ($DATA->ЦеновыеГруппы->ЦеноваяГруппа as $SECTION) {
                    $arFilter = Array('IBLOCK_ID' => $CATALOG_IBLOCK_ID, 'XML_ID' => (string)$SECTION->Ид);
                    $db_list = CIBlockSection::GetList(Array('ID' => 'ASC'), $arFilter, true);
                    while ($ar_result = $db_list->GetNext())
                        $Sections[] = $ar_result['ID'];

                }
                if (count($Sections))
                    $PROP['SECTIONS'] = $Sections;

                $Users = array();
                foreach ($DATA->ПолучателиСкидки->Контрагент as $U) {
                    $INN = (string)$U->ИНН;
                    $filter = Array("WORK_ZIP" => $INN);
                    $rsUsers = $cUser->GetList($by = 'ID', $order = 'ASC', $filter);
                    while ($arUser = $rsUsers->Fetch()) {
                        $Users[] = $arUser['ID'];
                    }
                }

                if (count($Users)) {
                    $PROP['USERS'] = $Users;

                    $el = new CIBlockElement;

                    if (array_key_exists($NAME, $DISCOUNTS)) {
                        $arLoadProductArray = Array(
                            "PROPERTY_VALUES" => $PROP,
                        );
                        $DISCOUNT_ID = $DISCOUNTS[$NAME];
                        $res = $el->Update($DISCOUNT_ID, $arLoadProductArray);
                    } else {
                        $arLoadProductArray = Array(
                            "IBLOCK_ID" => $DISCOUNTS_IBLOCK_ID,
                            "PROPERTY_VALUES" => $PROP,
                            "NAME" => $NAME,
                            "CODE" => $CODE,
                            "ACTIVE" => "Y",            // активен
                        );
                        $PRODUCT_ID = $el->Add($arLoadProductArray);
                        $DISCOUNTS[$NAME] = $PRODUCT_ID;
                    }
                }
            }
            unlink($FILE_PATH);
        }
    }
    closedir($DIR);

    echo('<result>Загрузка скидок успешно завершена.</result>');
    WriteExLog('ImportDiscountInfo: END');

    return ('ImportDiscountInfo(' . $CATALOG_IBLOCK_ID . ', ' . $DISCOUNTS_IBLOCK_ID . ');');
}

function AgentGetCurrencyRate()
{
    global $DB;

    // подключаем модуль "валют"
    if (!CModule::IncludeModule('currency'))
        return "AgentGetCurrencyRate();";

    $arCurList = array('USD', 'EUR');
    $bWarning = False;
    $rateDay = GetTime(time(), "SHORT", LANGUAGE_ID);
    $QUERY_STR = "date_req=" . $DB->FormatDate($rateDay, CLang::GetDateFormat("SHORT", SITE_ID), "D.M.Y");
    $strQueryText = QueryGetData("www.cbr.ru", 80, "/scripts/XML_daily.asp", $QUERY_STR, $errno, $errstr);

    // данная строка нужна только если у вас сайт в кодировке utf8
    $strQueryText = iconv('windows-1251', 'utf-8', $strQueryText);

    if (strlen($strQueryText) <= 0)
        $bWarning = True;

    if (!$bWarning) {
        require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/xml.php");
        $strQueryText = eregi_replace("<!DOCTYPE[^>]{1,}>", "", $strQueryText);
        $strQueryText = eregi_replace("<" . "\?XML[^>]{1,}\?" . ">", "", $strQueryText);
        $objXML = new CDataXML();
        $objXML->LoadString($strQueryText);
        $arData = $objXML->GetArray();
        $arFields = array();
        $arCurRate["CURRENCY_CBRF"] = array();

        if (is_array($arData) && count($arData["ValCurs"]["#"]["Valute"]) > 0) {
            for ($j1 = 0; $j1 < count($arData["ValCurs"]["#"]["Valute"]); $j1++) {
                if (in_array($arData["ValCurs"]["#"]["Valute"][$j1]["#"]["CharCode"][0]["#"], $arCurList)) {
                    CCurrencyRates::Add(array(
                        'CURRENCY' => $arData["ValCurs"]["#"]["Valute"][$j1]["#"]["CharCode"][0]["#"],
                        'DATE_RATE' => $rateDay,
                        'RATE' => DoubleVal(str_replace(",", ".", $arData["ValCurs"]["#"]["Valute"][$j1]["#"]["Value"][0]["#"])),
                        'RATE_CNT' => IntVal($arData["ValCurs"]["#"]["Valute"][$j1]["#"]["Nominal"][0]["#"]),
                    ));
                }

            }
        }
    }

    return "AgentGetCurrencyRate();";
}

function WriteExLog($err)
{
    global $USER;
    global $APPLICATION;
    if (!is_object($USER))
        $USER = new CUser;
    $f = fopen($_SERVER["DOCUMENT_ROOT"] . '/upload/err_log.csv', 'a');
    fwrite($f, date('d.m.y H:i:s') . ' (user_id:' . $USER->GetID() . '; URL: ' . $APPLICATION->GetCurUri() . '):\n' . $err . "\n");
    fclose($f);
}

/**
 * Создаем вотермарку
 * @param $main_img_obj
 * @param $text
 * @param $font
 * @param int $r
 * @param int $g
 * @param int $b
 * @param int $alpha_level
 * @return mixed
  */
function create_watermark( $main_img_obj, $text, $font, $r = 128, $g = 128, $b = 128, $alpha_level = 100 )
{
	$width = imagesx($main_img_obj);
	$height = imagesy($main_img_obj);
	$angle =  0;

	$text = " ".$text." ";

	$c = imagecolorallocatealpha($main_img_obj, $r, $g, $b, $alpha_level);
	$size = 15;
	$box  = imagettfbbox ( $size, $angle, $font, $text );
	$y = $height/2- abs($box[5] - $box[1])/2;
	$x = $width/2- abs($box[0] - $box[2])/2;
	imagettftext($main_img_obj,$size ,$angle, $x, $y, $c, $font, $text);
	return $main_img_obj;
}

 require($_SERVER["DOCUMENT_ROOT"] . '/local/php_interface/include/adminProps.php');


?>