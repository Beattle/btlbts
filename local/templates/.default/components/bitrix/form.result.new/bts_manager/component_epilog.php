<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<script type="text/javascript">
    $(function(){
        $("input[name=form_text_26]").val($(".big_tovar h2:first-child").html().trim());
    });
</script>

<? if (($_REQUEST["RESULT_ID"] && $_REQUEST["WEB_FORM_ID"] == 3) || $arResult["isFormErrors"] == "Y") { ?>
    <script type="text/javascript">
        $(function(){
            $(".managvopr").fancybox().trigger('click');
        });
    </script>
<? } ?>