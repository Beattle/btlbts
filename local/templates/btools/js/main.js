$(document).ready(function() {

    $(document).on('click', '.checkout .block_pagination ul li a', function () {
        $.get("/ajax/gift.php" + $(this).attr('href'))
            .done(function (data) {
                $("#gift").html(data);
            });
        return false;
    });
/*
    $('[name="form_text_5"]').each(function(){
        new InputPhone($(this));
    });
*/
    $('[name="email"]').each(function(){
        new InputEmail($(this));
    });


    //$("#ORDER_PROP_3").mask("+7(999) 9999999");
    $("#order_call_phone").mask("(999) 999-99-99");
    $("#ORDER_PROP_6").mask("99_99_9999");
    $("#ORDER_PROP_6").mask("99_99");
    /*
    $('#ORDER_PROP_4').blur(function () {
        if ($(this).val() != '') {
            var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if (pattern.test($(this).val())) {

            } else {
                alert("Неверный формат email");
            }
        } else {
            alert("Поле email не должно быть пустым");
        }
    });
    */

    //one_click_buy
    $(document).on('click', '.one_click_buy', function () {
        $("#fgood").val($(this).attr("href"));
        $.post("/ajax/good.php", {id: $(this).attr("href")}, function (data) {
            $("#prd_info").html(data);
        });

        return false;
    });
    /*$(document).on('click', '.one_click_buy_second', function () {
     $("#fgood").val($(this).attr("href"));

     $.post( "/ajax/good.php", {id:$(this).attr("href")} , function( data )
     {


     $("#prd_info").html(data);
     });

     return false;
     });*/

    //one_clickbuy
    $(document).on('click', '.one_clickbuy', function () {
        $.post("/ajax/oneclick.php", $("#oneclk form").serialize(), function (data) {
            $("#oneclk").html(data);
        });
        return false;
    });

    //addgoodcompare
    $(document).on('click', '.addgoodcompare', function () {
        //action=ADD_TO_COMPARE_LIST&id
        $.get("/ajax/compare.php?action=ADD_TO_COMPARE_LIST&id=" + $(this).attr('href'))
            .done(function (data) {
                $(".catalog_compare").html('сравнить товары (' + data + ')');
                $(".compare_link").html('Сравнить товары (' + data + ')');
            });
        return false;
    });

    //add_to_compare_checkbox
    $(document).on('change', '.add_to_compare_checkbox', function () {
        if ($(this).is(':checked')) {
            //action=ADD_TO_COMPARE_LIST&id
            $.get("/ajax/compare.php?action=ADD_TO_COMPARE_LIST&id=" + $(this).attr('rel'))
                .done(function (data) {
                    $(".catalog_compare").html('сравнить товары (' + data + ')');
                    $(".compare_link").html('Сравнить товары (' + data + ')');
                });
        }
    });

    //sort_select
    $(document).on('change', '.sort_select', function () {
        $.get("/ajax/commentlist.php?id=" + $(".add_a_review").attr('href') + "&page=" + $(".show_select").val() + "&sort=" + $(".sort_select").val())
            .done(function (data) {
                $("#list_comm").html(data);
            });
        return false;
    });

    //show_select
    $(document).on('change', '.show_select', function () {
        $.get("/ajax/commentlist.php?id=" + $(".add_a_review").attr('href') + "&page=" + $(".show_select").val() + "&sort=" + $(".sort_select").val())
            .done(function (data) {
                $("#list_comm").html(data);
            });
        return false;
    });

    $(document).on('click', '#list_comm li a', function () {
        $.get("/ajax/commentlist.php" + $(this).attr('href'))
            .done(function (data) {
                $("#list_comm").html(data);
            });
        return false;
    });

    //usefull_yes
    $(document).on('click', '#list_comm .usefull_yes', function () {
        $.get("/ajax/useful.php", {
            id: $(".add_a_review").attr('href'),
            idg: $(this).attr('href'),
            yes: 1,
            page: $(".show_select").val(),
            sort: $(".sort_select").val(),
            PAGEN_1: $("#list_comm li.active a").attr("rel")
        }, function (data) {
            $("#list_comm").html(data);
        });
        return false;
    });

    //usefull_no
    $(document).on('click', '#list_comm .usefull_no', function () {
        $.get("/ajax/useful.php", {
            id: $(".add_a_review").attr('href'),
            idg: $(this).attr('href'),
            no: 1,
            page: $(".show_select").val(),
            sort: $(".sort_select").val(),
            PAGEN_1: $("#list_comm li.active a").attr("rel")
        }, function (data) {
            $("#list_comm").html(data);
        });
        return false;
    });

    $(document).on('click', '#fsubscr', function () {
        $.post("/ajax/subscribe.php", $("#sbform").serialize(), function (data) {
            $(".subscribe_form").html(data);
        });
        return false;
    });

    //add_a_review
    $(document).on('click', '.add_a_review', function () {
        $("#cgood").val($(this).attr("href"));
        return false;
    });

    $(document).on('click', '.com_subm', function () {
        $.post("/ajax/comment.php", $("#fcomment").serialize(), function (data) {
            $("#comment_data").html(data);
        });
        return false;
    });

    $(document).on('click', '#ask_subm', function () {
        $.post("/ajax/faq.php", $("#faskform").serialize(), function (data) {
            $("#ask_div").html(data);
        });
        return false;
    });

    $(document).on('click', '#fcallsubm', function () {
        $.post("/ajax/call.php", $("#fcall form").serialize(), function (data) {
            $("#fcall").html(data);
        });
        return false;
    });


    // Табы на главной инструментов
    $(document).on('click', '.mainpage .inner_tab li a', function () {
        var tab = $(this).closest(".inner_tab").attr("id");
        $.get("/ajax/" + tab + ".php" + $(this).attr('href'))
            .done(function (data) {
                $("#" + tab).html(data);
            });
        return false;
    });


    $(document).on('click', '#register_checkbox', function () {
        if ($(this).is(':checked')) {
            $("#reg_butt1").removeAttr("disabled");
        }
        else $("#reg_butt1").addAttr("disabled");
    });

    $(document).on('click', '#register_checkbox2', function () {
        if ($(this).is(':checked')) {
            $("#reg_butt2").removeAttr("disabled");
        }
        else $("#reg_butt2").addAttr("disabled");
    });

    /*
     $(document).on('click', '.videog', function () {
     $.post( "/ajax/video.php", {id:$(this).attr("href")} , function( data )
     {
     $("#vcont").html(data);
     $('#fadescreen').fadeIn();
     $('.popup.videot').fadeIn();
     });
     return false;
     });
     */

    $('.manufacturers_filter .man_name').click(function () {
        $("#" + $(this).attr("href")).remove();
        $("#valdf").append("<input type=\"hidden\" name=\"" + $(this).attr("href") + "\" value=\"" + $(this).attr("rel") + "\" id=\"" + $(this).attr("href") + "\"/>");
        return false;
    });
    $('.manufacturers_filter .close').click(function () {
        $("#" + $(this).attr("href")).remove();
        return false;
    });

    $('#clear_filters').click(function () {
        $("#valdf").append("<input type=\"hidden\" name=\"del_filter\" value=\"Y\"/>");
        $(".smartfilter").submit();
        return false;
    });


    //Страница сравнения
    $('.compare_page .compare_delete').click(function () {
        var ths = $(this);
        $.post("/ajax/compdel.php", {ID: $(this).attr("rel")}, function (data) {
            ths.parent().remove();
            $('.' + ths.attr('target')).remove();
        });
        return false;
    });

    $('.compare_page .clearlist').click(function () {
        $(".compare_table td").each(function () {
            var ths = $(this);
            if (ths.hasClass('td_title')) {
            }
            else {
                ths.remove();
            }
        });
        $('.prod_items .item').remove();
        $.post("/ajax/compdel.php", {action: "ALL"}, function (data) {
        });
        return false;
    });

    //Рассчет цены при изменении количества
    $('#main_product_quantity_field').keyup(function () {
        if (isNaN($(this).val()) || $(this).val() == '0' || $(this).val() == '') {
            $('.price_area .price .price_value').html(digit3($('#hidden_price').val()) + ' Р');
        } else {
            $('.price_area .price .price_value').html(digit3($(this).val() * $('#hidden_price').val()) + ' Р');
        }
    });

    //Работа корзины
    $('.product_row .quantity_calc a').click(function () {
        var thisquantity = $(this).parent().find('.quantity_value').html();

        var thisprice = $(this).parent().find('.item_one_price').val();
        if ($(this).hasClass('quantity_minus')) {
            if (thisquantity > 1) {
                thisquantity--;
                var ths = $(this);
                ths.parent().find('.quantity_value').html(thisquantity);
                $.post("/ajax/basket.php", {id: $(this).attr("href"), quantity: thisquantity}, function (data) {
                });
            }
            else $(this).parent().find('.quantity_value').html('1');
        }
        else {
            thisquantity++;
            var ths = $(this);
            ths.parent().find('.quantity_value').html(thisquantity);
            $.post("/ajax/basket.php", {id: $(this).attr("href"), quantity: thisquantity}, function (data) {
            });
        }
        var totalprice = thisprice * thisquantity;
        $(this).parent().parent().parent().find('.price').html(totalprice + ' Руб.');
        var summaryprice = 0;
        $('.product_row').each(function () {
            thisquantity = $(this).find('.quantity_value').html();
            thisprice = $(this).find('.item_one_price').val();
            if (thisquantity !== undefined) {
                summaryprice = summaryprice + (thisquantity * thisprice);
                $('.summary_price .without_delivery .price').html(summaryprice + ' Руб.');
                $('#summary_value').val(summaryprice);
            }
        });
        var wdel = 0;
        var wodel = 0;
        wdel = $('#summary_value').val();
        if ($('.delivery_methods .delivery_label').hasClass('active')) {
            wodel = $('.delivery_methods .delivery_label.active').parent().find('.delivery_cost').val();
        } else {
            wodel = 0;
        }
        var endingprice = parseInt(wdel) + parseInt(wodel);
        $('.summary_price .with_delivery .price').html(endingprice + ' Р');
        return false;
    });

    $('.product_row .delete a').click(function () {
        $(this).parent().parent().remove();
        $.post("/ajax/basket.php", {id: $(this).attr("href"), quantity: 0}, function (data) {
        });
        var summaryprice = 0;
        $('.product_row').each(function () {
            thisquantity = $(this).find('.quantity_value').html();
            thisprice = $(this).find('.item_one_price').val();
            summaryprice = summaryprice + (thisquantity * thisprice);
            $('.summary_price .without_delivery .price').html(summaryprice + ' Р');
            $('#summary_value').val(summaryprice);
        });
        var wdel = 0;
        var wodel = 0;
        wdel = $('#summary_value').val();
        if ($('.delivery_methods .delivery_label').hasClass('active')) {
            wodel = $('.delivery_methods .delivery_label.active').parent().find('.delivery_cost').val();
        } else {
            wodel = 0;
        }
        var endingprice = parseInt(wdel) + parseInt(wodel);
        $('.summary_price .with_delivery .price').html(endingprice + ' Р');
        return false;
    });

    $(document).on('click', '.credit_submit', function () {
        $.post("/ajax/credit.php", $("#fcredit form").serialize(), function (data) {
            $("#fcredit").html(data);
        });
        return false;
    });

    $(document).on('click', '.gift', function () {
        $.post("/ajax/cart.php", {id: $(this).data("id-product"), quantity: 1}, function (data) {
            $(".basketready").html(data);
        });
        return false;
    });

    $(document).on('click', '.manufacturers_filter .heading', function () {
        var ulBlock = $(this).parent().find('ul'),
            ulBrands = $(this).parents('.right_side__brands');
        if (!ulBrands.length > 0) {
            if (ulBlock.is(':hidden')) {
                $(this).parent('.manufacturers_filter').addClass('showed-params')
                ulBlock.slideDown(400);
            } else {
                $(this).parent('.manufacturers_filter').removeClass('showed-params')
                ulBlock.slideUp(400);
            }
        }
        return false;
    });

    $('.manufacturers_filter .select_all').click(function () {
        var parentBlock = $(this).closest("ul");
        parentBlock.find('.man_name').addClass('active');
        parentBlock.find('.close').show();
        $("#valdf").html("");
        $(".man_name.active").each(function () {
            $("#valdf").append("<input type=\"hidden\" name=\"" + $(this).attr("href") + "\" value=\"" + $(this).attr("rel") + "\" id=\"" + $(this).attr("href") + "\"/>");
        });
        return false;
    });

	$('input:radio#pay_method3').each(function() {
		new yandexpay($(this));
	});
});

$(window).load(function(){
    $(".main .article .tabs_content #tab3").css("display", "none");
    $(".main .article .tabs_content #tab3").css("height", "auto");
});



function InputPhone(container) {
    var _this = this;
    _this.container = $(container);
    _this.container .mask("+7(999) 999-99-99");
}

function InputEmail(container) {
    var _this = this;
    _this.container = $(container);
    _this.container.inputmask({alias: "email"});
}



function youtubev(container) {
    var _this = this;
    _this.container = $(container);
    var width = _this.container.data("widthtumb");
    //var height = _this.container.data("heighttumb");
    var code = _this.container.data("code");
    _this.container.width(width);
    //_this.container.height(height + 40);
    $('<a>', {
        href: '#',
        target: "_blank",
        css: {
            display: 'block',
            position: 'relative',
            marginBottom: '20px'
        },
        width: width,
        on: {
            click: function () {
                var data = $('<iframe>', {
                        src: '//www.youtube.com/embed/' + code + "?rel=0&autoplay=1",
                        frameborder: "0",
                        width: 900,
                        height: 700
                    }
                );
                $.fancybox(data);
                return false;
            }
        },
        append: $('<img>', {
            src: '//img.youtube.com/vi/' + code + '/0.jpg',
            width: width
        }).add($('<div>', {
            text: _this.container.data("text"),
            css: {
                fontSize: '12px'
            }
        })).add($('<div>', {
            class: 'play_icon_n'
        }))
    }).appendTo(_this.container);
}


function yandexpay(container) {
	var _this = this;
	_this.container = $(container);
	console.log(_this.container);
	container.change(function() {
		var data = $('<iframe>', {
				src: '//money.yandex.ru/embed/shop.xml?account=410012317390955&quickpay=shop&payment-type-choice=on&writer=seller&targets=%D0%9E%D0%BF%D0%BB%D0%B0%D1%82%D0%B0+Btools&targets-hint=&default-sum=100&button-text=01&comment=on&hint=&fio=on&mail=on&phone=on&address=on&successURL=www.btools.ru',
				frameborder: "0",
				width: 450,
				height: 254,
				allowtransparency: "true",
				scrolling: "no"
			}
		);
		$.fancybox(data);
	});
}