<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>


<? if (($_REQUEST["RESULT_ID"] && $_REQUEST["WEB_FORM_ID"] == 5) || $arResult["isFormErrors"] == "Y") { ?>
    <script type="text/javascript">
        $(function(){
            $(".servicepusk").fancybox().trigger('click');
        });
    </script>
<? } ?>