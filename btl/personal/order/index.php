<?
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
    $APPLICATION->SetTitle("Оформление заказа");
?>
<?
if (!$USER->IsAuthorized()) {
    ?>
    <?$APPLICATION->IncludeComponent(
        "vetalkms:sale.order.ajax",
        "order",
        Array(
            "PAY_FROM_ACCOUNT" => "N",
            "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
            "COUNT_DELIVERY_TAX" => "N",
            "ALLOW_AUTO_REGISTER" => "Y",
            "SEND_NEW_USER_NOTIFY" => "Y",
            "DELIVERY_NO_AJAX" => "Y",
            "DELIVERY_NO_SESSION" => "N",
            "TEMPLATE_LOCATION" => "popup",
            "DELIVERY_TO_PAYSYSTEM" => "d2p",
            "USE_PREPAYMENT" => "N",
            "PROP_1" => array(),
            "ALLOW_NEW_PROFILE" => "N",
            "SHOW_PAYMENT_SERVICES_NAMES" => "Y",
            "SHOW_STORES_IMAGES" => "N",
            "PATH_TO_BASKET" => "/personal/cart/",
            "PATH_TO_PERSONAL" => "/personal/",
            "PATH_TO_PAYMENT" => "/personal/order/payment.php",
            "PATH_TO_AUTH" => "/auth/",
            "SET_TITLE" => "Y",
            "DISABLE_BASKET_REDIRECT" => "Y",
            "PRODUCT_COLUMNS" => array("PREVIEW_PICTURE", "DETAIL_PICTURE")
        )
    );
} else {
    $APPLICATION->IncludeComponent(
        "vetalkms:sale.order.full",
        "order",
        array(
            "ALLOW_PAY_FROM_ACCOUNT" => "N",
            "SHOW_MENU" => "Y",
            "CITY_OUT_LOCATION" => "Y",
            "COUNT_DELIVERY_TAX" => "N",
            "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
            "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
            "SEND_NEW_USER_NOTIFY" => "Y",
            "DELIVERY_NO_SESSION" => "N",
            "PROP_1" => array(),
            "PATH_TO_BASKET" => "/personal/cart/",
            "PATH_TO_PERSONAL" => "/personal/",
            "PATH_TO_AUTH" => "/auth/",
            "PATH_TO_PAYMENT" => "/personal/order/payment.php",
            "USE_AJAX_LOCATIONS" => "Y",
            "SHOW_AJAX_DELIVERY_LINK" => "N",
            "SET_TITLE" => "Y",
            "PRICE_VAT_INCLUDE" => "Y",
            "PRICE_VAT_SHOW_VALUE" => "N"
        ),
        false
    );
}
require($_SERVER["DOCUMENT_ROOT"] . "/include/subscribe.php");
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>