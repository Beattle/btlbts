
//$(document).ready(function () {
//
//	var owl = $("#owl-demo");
//
//	owl.owlCarousel();
//
//	// Custom Navigation Events
//	$(".next").click(function () {
//		owl.trigger('owl.next');
//	})
//	$(".prev").click(function () {
//		owl.trigger('owl.prev');
//	})
//
//});

//$(document).ready(function () {
//
//	//Sort random function
//	function random(owlSelector) {
//		owlSelector.children().sort(function () {
//			return Math.round(Math.random()) - 0.5;
//		}).each(function () {
//			$(this).appendTo(owlSelector);
//		});
//	}
//
//	$("#owl-demo, #owl-demo-2").owlCarousel({
//		items: 4,
//		pagination: false,
//		navigation: true,
//		navigationText: [
//      "<i class='icon-chevron-left icon-white'></i>",
//      "<i class='icon-chevron-right icon-white'></i>"
//      ],
//		beforeInit: function (elem) {
//			//Parameter elem pointing to $("#owl-demo")
//			random(elem);
//		}
//
//	});
//
//});

$( document ).ready(function() {

	 $(".fancybox").fancybox({
		 titleShow: true,
		 opacity: true,
		 titlePosition : 'outside'
	 //openEffect	: 'none',
	 //closeEffect	: 'none'
	 });


	$('.bxslider').bxSlider({
		adaptiveHeight: true,
		speed: 900,
		controls: true,
		auto: true
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


/*	$('.j-popup-link').fancybox({
		fitToView : false,
		padding: 0,
		arrows: false,
		closeBtn: false,
		afterLoad: function() {
			$(".j-close").live("click", function() {
				$.fancybox.close(true);
			});
		},
		afterShow: function() {
			var id = '';
			$('.fancybox-wrap .cusel input').each(function(i){
				if (i != 0) id += ',';
				id += '#' + $(this).attr('id');
			});
			var params = {
				refreshEl: id,
				visRows: 6,
				scrollArrows: true
			}
			cuSelRefresh(params);
		}
	});*/



	//$('[name="form_text_12"]').mask("+7(999) 999-99-99");

	$('[name="form_text_20"], [name="form_text_12"], [name="phone"], [name="form_text_31"], [name="form_text_39"]').each(function(){
		new InputPhone($(this));
	});

	$('[name="form_text_13"], [name="email"], [name="form_text_32"], [name="form_text_40"]').each(function(){
		new InputEmail($(this));
	});

	$('.back-top').each(function () {
		new BackTop($(this));
	});
});

function BackTop(container){
	function getPosDisp(obj){
		if (obj.scrollTop() > obj.height()) {
			container.fadeIn();
		} else {
			container.fadeOut();
		}
	}
	getPosDisp($(window));
	$(window).scroll(function () {
		getPosDisp($(this));
	});
	container.click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 600);
		return false;
	});
}

function InputPhone(container) {
	var _this = this;
	_this.container = $(container);
	_this.container .mask("+7(999) 999-99-99");
	/*
	_this.container.inputmask({alias: "phoneru"}, {
		//url: "./extra/phone-codes/phone-ru.js",
		countrycode: "ru",
		onKeyValidation: function () {
			//console.log($(this).inputmask("getmetadata")["cd"]);
		}
	});
	*/
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