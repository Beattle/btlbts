$( document ).ready(function() {
	//Таймер
	$('#hours, #minutes, #seconds').countdown("2015/01/01", function(event) {
	  $('#hours').text(event.strftime('%H'));
	  $('#minutes').text(event.strftime('%M'));
	  $('#seconds').text(event.strftime('%S'));
	});
	//FancyBox старт
	$(document).ready(function() {
		$(".fancybox").fancybox({
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
	//Прогресс-бар для слайдера на главной
	var progress = $('#slider_pagers .progress'),
	slideshow = $( '.promo_slider .cycle-slideshow' );

	slideshow.on( 'cycle-initialized cycle-before', function( e, opts ) {
		progress.stop(true).css( 'width', 0 );
	});

	slideshow.on( 'cycle-initialized cycle-after', function( e, opts ) {
		if ( ! slideshow.is('.cycle-paused') )
			progress.animate({ width: '100%' }, opts.timeout, 'linear' );
	});

	slideshow.on( 'cycle-paused', function( e, opts ) {
	   progress.stop(); 
	});

	slideshow.on( 'cycle-resumed', function( e, opts, timeoutRemaining ) {
		progress.animate({ width: '100%' }, timeoutRemaining, 'linear' );
	});
	//Обработка числа, пробелы каждых 3 цифры
	function digit3(n) {
		n += "";
		n = new Array(4 - n.length % 3).join("U") + n;
		return n.replace(/([0-9U]{3})/g, "$1 ").replace(/U/g, "");
	}
	//Меню, выпадающее из главного
	$('.has_child').click(function() {
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).parent().find('ul').hide();
		}
		else {
			$(this).addClass('active');
			$(this).parent().find('ul').show();
		}
	});
	//Табы на главной странице и других
	$('#tabs_navigation a').click(function() {
		$('#tabs_navigation a').removeClass('active');
		$(this).addClass('active');
		$('.inner_tab').hide();
		$($(this).attr('href')).show();
		return false;
	});
	//Ссылка "Отзывы" (открывает таб)
	$('#show_reviews').click(function() {
		$('#tabs_navigation a').removeClass('active');
		$("#reviews_tablink").addClass('active');
		$('.inner_tab').hide();
		$("#reviews_tab").show();
        $('html, body').animate({scrollTop: $(".product_tabs").offset().top-10}, 500);
		return false;
	});
	//Табы на внутренней странице товара (внутренние)
	$('#tabs_son_navigation a').click(function() {
		$('#tabs_son_navigation a').removeClass('active');
		$(this).addClass('active');
		$('.inner_tab_son').hide();
		$($(this).attr('href')).show();
		return false;
	});
	//Табы расходных материалов
	$('.consumables_cat_links li a').click(function() {
		$(this).parent().parent().find('li a').removeClass('active');
		$(this).addClass('active');
		$(this).parent().parent().parent().parent().find('.consumables_tabs_content .consumables_items').hide();
		$($(this).attr('href')).show();
		return false;
	});
	//Работа с изображением на страничке товара
	$('.other_images .images_slider a').click(function() {
		$('.main_image a').attr('href', $(this).attr('href'));
		$('.main_image img').attr('src', $(this).find('img').attr('src'));
		return false;
	});
	
	//Кнопка заказа звонка
	$('#order_call').click(function() {
		$('#fadescreen').fadeIn();
		$('.popup.ordercall').fadeIn();
		return false;
	});
	//Кнопка "Купить в 1 клик"
	$('.one_click_buy').click(function() {
		$('#fadescreen').fadeIn();
		$('.popup.buyinoneclick').fadeIn();
		
	});
	//Кнопка "Оформить кредит"
	$('#go_credit').click(function() {
		$('#fadescreen').fadeIn();
		$('.popup.credit').fadeIn();
		return false;
	});
	//Задать вопрос в FaQ
	$('.add_a_question').click(function() {
		$('#fadescreen').fadeIn();
		$('.popup.faq').fadeIn();
		return false;
	});
	//Оставить отзыв
	$('.add_a_review').click(function() {
		$('#fadescreen').fadeIn();
		$('.popup.review_add').fadeIn();
		
	});

	//Видео попап
/*
	$('.vlog_items .item a').click(function() {
		$('#fadescreen').fadeIn();
		$('.popup.video').fadeIn();
		return false;
	});
*/
	//Работа с попапами
	$('.popup .close_popup').click(function() {
		$('#fadescreen').fadeOut();
		$('.popup').fadeOut();
		return false;
	});
	$('#fadescreen').click(function() {
		$('#fadescreen').fadeOut();
		$('.popup').fadeOut();
		return false;
	});
	
	
	$('.compare_page .allpar').click(function() {
		$(".compare_table td").show();
		return false;
	});
	$('.compare_page .difpar').click(function() {
		$(".compare_table td").hide();
		$(".compare_table tr.different td").show();
		return false;
	});
	
	//Фильтр производителей в каталоге
	$('.manufacturers_filter .man_name').click(function() {
		$(this).addClass('active');
		$(this).parent().find('.close').show();
		return false;
	});
	$('.manufacturers_filter .close').click(function() {
		$(this).hide();
		$(this).parent().find('.man_name').removeClass('active');
		return false;
	});
	
	$('#clear_filters').click(function() {
		$('.manufacturers_filter .man_name').removeClass('active');
		$('.manufacturers_filter .close').hide();
		$( "#slider-range1" ).slider({
			 values: [30000, 270000],
		});
		$( "#slider-range2" ).slider({
			 values: [30000, 270000],
		});
		$( "#slider-range3" ).slider({
			 values: [30000, 270000],
		});
		$( "#slider-range4" ).slider({
			 values: [30000, 270000],
		});
		return false;
	});
	//Показать больше фильтров
	$('#more_filters').click(function() {
		$('.hidden_filters').addClass('opened');
		$(this).hide();
		return false;
	});
	
	$('.delivery_methods .delivery_label').click(function() {
		$('.delivery_methods .delivery_label').removeClass('active');
		$(this).addClass('active');
		var wdel = 0;
		var wodel = 0;
		wdel = $('#summary_value').val();
		wodel = $(this).parent().find('.delivery_cost').val();
		var endingprice = parseInt(wdel) + parseInt(wodel);
		$('.summary_price .with_delivery .price').html(endingprice+' Р');
	});
	//Выбор места доставки заказа(табы)
	
		$(document).on('click', '.delivery_tabs_nav li a', function () {
		
		$('.delivery_tabs_nav li a').parent().removeClass('active');
		$(this).parent().addClass('active');
		$('.receive_table table').removeClass('active');
		$($(this).attr('href')).addClass('active');
		return false;
	});
	//Вопросы и ответы
	$('.faq_items .question').click(function() {
		if($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).parent().find('.answer').hide();
		} else {
			$('.faq_items .question').removeClass('active');
			$(this).addClass('active');
			$('.faq_items .answer').hide();
			$(this).parent().find('.answer').show();
		}
		return false;
	});
	//Табы в регистрации
	$('.register_tabs_nav a').click(function() {
		$('.register_tabs_nav a').removeClass('active');
		$(this).addClass('active');
		if($(this).hasClass('fis_register')) {
			$('#register_tab_fis').show();
			$('#register_tab_iur').hide();
		} else {
			$('#register_tab_fis').hide();
			$('#register_tab_iur').show();
		}
		return false;
	});
	//Стрелка наверх
	$("#gotop").click(function(e) {
		$('html, body').animate({
			scrollTop: $('body').offset().top
		}, 500);
		e.preventDefault();
	});	
});

$(window).scroll(function(){
	var marginTop = $(window).scrollTop();
	
	if (marginTop > 800) {
		$("#gotop").fadeIn();
	} else {
		$("#gotop").fadeOut();
	}
});