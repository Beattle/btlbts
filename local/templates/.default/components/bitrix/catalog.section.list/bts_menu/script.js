$(function () {

    var openParentItem = parseInt($.cookie("openParentItem")),
        openChildItem = parseInt($.cookie("openChildItem"));

    $(".accordion").accordion({
        collapsible: true,
        header: 'h3',
        heightStyle: "content",
        active: false
    });


    if (openParentItem) {
        $(".block-catalog .ul-big").hide();
        $(".block-catalog .accordionbig").eq(openParentItem - 1).find(".namerazdelclild .ul-big").slideDown();
    } else {
        $(".block-catalog .ul-big").hide();
    }

    if (openChildItem) {
        $(".block-catalog .accordionbig .accordion h3").eq((openChildItem - 1)).trigger("click");
    }


    $(".block-catalog .namerazdel").click(function () {
        openParentIndex = $(this).parent().parent().index();
        if (parseInt($.cookie("openParentItem")) == openParentIndex) {
            $(this).parent().parent().find(".ul-big").slideUp();
            $.cookie('openParentItem', null, {path: '/'});
        } else {
            $(".block-catalog .ul-big").slideUp();
            ;
            $(this).parent().parent().find(".ul-big").slideDown();
            $.cookie("openParentItem", openParentIndex, {path: '/'});
        }
    });

    $('.block-catalog .accordionbig .ul-big .accordion > a .h3').on('click', function () {
        $.cookie("openChildItem", null, {path: '/'});
    });

    $('.block-catalog .accordionbig .ul-big .accordion h3').on('click', function () {
        $.cookie("openChildItem", ($(this).index(".ul-big .accordion > h3") + 1), {path: '/'});

        window.location.href = $(this).find("a").attr("href");
    });

});

