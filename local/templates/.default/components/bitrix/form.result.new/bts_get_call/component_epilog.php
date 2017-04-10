<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>


<? if (($_REQUEST["RESULT_ID"] && $_REQUEST["WEB_FORM_ID"] == 4) || $arResult["isFormErrors"] == "Y") { ?>
    <script type="text/javascript">
        $(function(){
            $(".zakzvon").fancybox().trigger('click');
        });
    </script>
<? } ?>