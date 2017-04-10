<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
$APPLICATION->IncludeComponent(
    "bitrix:sale.basket.basket",
    "cart",
    array(
        "COLUMNS_LIST" => array(
            0 => "NAME",
            1 => "DISCOUNT",
            2 => "WEIGHT",
            3 => "DELETE",
            4 => "DELAY",
            5 => "TYPE",
            6 => "PRICE",
            7 => "QUANTITY",
            8 => "PROPERTY_CML2_ARTICLE",
        ),
        "PATH_TO_ORDER" => "/personal/order.php",
        "HIDE_COUPON" => "N",
        "PRICE_VAT_SHOW_VALUE" => "N",
        "COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
        "USE_PREPAYMENT" => "N",
        "QUANTITY_FLOAT" => "N",
        "SET_TITLE" => "Y",
        "ACTION_VARIABLE" => "action",
        "OFFERS_PROPS" => array()
    ),
    false
);
?>
    <br>
<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>