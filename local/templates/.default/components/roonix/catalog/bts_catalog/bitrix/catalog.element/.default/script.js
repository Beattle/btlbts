$(document).ready(function(){


	$('.tabs_menu a').click(function(e) {
		e.preventDefault();
		$('.tabs_menu .active').removeClass('active');
		$(this).addClass('active');
		var tab = $(this).attr('href');
		$('.tab').not(tab).css({'display':'none'});
		$(tab).fadeIn(0);
	});

	$('.tabs_menu2 a').click(function(e) {
		e.preventDefault();
		$('.tabs_menu2 .active').removeClass('active').parent().removeClass('act');;
		$(this).addClass('active').parent().addClass('act');

		var tab = $(this).attr('href');
		$('.tab2').not(tab).css({'display':'none'});
		$(tab).fadeIn(0);
	});


	$('.tabs_menu3 a').click(function(e) {
		e.preventDefault();
		$('.tabs_menu3 .active').removeClass('active');
		$(this).addClass('active');
		var tab = $(this).attr('href');
		$('.tab3').not(tab).css({'display':'none'});
		$(tab).fadeIn(0);
	});

	$('.bxslider7').bxSlider({
		adaptiveHeight: true,
		speed: 900,
		maxSlides: 4,
		slideWidth: 160,
		slideMargin: 5,
		pager: false
	});

	$('.video .bxslider7video').bxSlider({
		adaptiveHeight: true,
		speed: 900,
		maxSlides: 4,
		slideWidth: 120,
		slideMargin: 25,
		//auto: true,
		pager: false
	});

	$('.bxslider5').bxSlider({
		adaptiveHeight: true,
		speed: 900,
		maxSlides: 4,
		slideWidth: 120,
		slideMargin: 30,
		autoControls: true,
		pager: false
	});

	$('.add_a_review').click(function() {
		$('#fadescreen').fadeIn();
		$('.popupotziv.review_add').fadeIn();

	});

	$('.popupotziv .close_popup').click(function() {
		$('#fadescreen').fadeOut();
		$('.popupotziv.review_add').fadeOut();
		return false;
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


});
