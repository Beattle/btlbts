<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
global $APPLICATION;

if (isset($templateData['JS_OBJ'])) {
    ?>
    <script type="text/javascript">
        BX.ready(
            BX.defer(function () {
                if (!!window.<? echo $templateData['JS_OBJ']; ?>) {
                    window
                .<? echo $templateData['JS_OBJ']; ?>.
                    allowViewedCount(true);
                }
            })
        );
    </script>
    <?
}

?>
<div class="popup" id="popup2">
<?
$APPLICATION->IncludeComponent("vetalkms:empty", "bts_man", array(
    "WEB_FORM_ID" => "3",
    "VARIABLE_ALIASES" => array(
        "WEB_FORM_ID" => "WEB_FORM_ID",
        "RESULT_ID" => "RESULT_ID",
    ),
), false);

?>
</div>