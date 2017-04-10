<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
CModule::IncludeModule("sale");

if (intval($_REQUEST["id"]) > 0) {
    if (intval($_REQUEST["quantity"]) > 0) {
        Add2BasketByProductID($_REQUEST["id"], $_REQUEST["quantity"]);
        echo $APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "cart", Array(
            "PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
            "PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Персональный раздел
            "SHOW_PERSONAL_LINK" => "N",	// Отображать персональный раздел
            "SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
            "SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
            "SHOW_PRODUCTS" => "N",	// Показывать список товаров
            "POSITION_FIXED" => "N",	// Отображать корзину поверх шаблона
        ),
            false
        );
    } else {
        CSaleBasket::Delete($_REQUEST["id"]);
    }
}
?>