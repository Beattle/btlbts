<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<style>
    .menu_column .current_category{color: rgb(104, 175, 33) !important;}
</style>
<script>
    $(document).ready(function () {
        $("#sct<?=$arSection["ID"]?>").trigger("click");
        var u = new Url(window.location.href);
        var paths = u.path.split('/');
        if (paths.length == 6) {
            $('[href="'+u.path+'"]').addClass("current_category");
            paths.splice(-2, 1);
            $('[href="'+paths.join('/')+'"]').addClass("current_category").parent().find(".has_child").trigger("click");
        } else if (paths.length == 5) {
            $('[href="'+u.path+'"]').addClass("current_category");
        }
    });
</script>