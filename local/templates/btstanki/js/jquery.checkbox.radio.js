$(document).ready(function() {

	var checkbox_w = 14; // Ширина чекбокса
	var checkbox_h = 14; // Высота чекбокса
	var radio_w = 14; // Ширина радио-кнопки
	var radio_h = 14; // Высота радио-кнопки

	$('input[type=checkbox]').each(function() {
	
		$(this).wrap('<span class="custom_checkbox"></span>');
		var custom_checkbox = $(this).parent('.custom_checkbox');
		
		if($(this).is(':checked') && $(this).is(':disabled')) {
			custom_checkbox.css({'background-position' : '0 -' + checkbox_h * 3 + 'px', 'cursor' : 'default'});
		} else if($(this).is(':checked')) {
			custom_checkbox.css({'background-position' : '0 -' + checkbox_h + 'px'});
		} else if($(this).is(':disabled')) {
			custom_checkbox.css({'background-position' : '0 -' + checkbox_h * 2 + 'px', 'cursor' : 'default'});
		} else {
			custom_checkbox.css({'background-position' : '0 0'});
		}
		
		custom_checkbox.css({'width' : checkbox_w + 'px', 'height' : checkbox_h + 'px'});
		
	});
	
	$('input[type=radio]').each(function() {
	
		$(this).wrap('<span class="custom_radio"></span>');
		var custom_radio = $(this).parent('.custom_radio');
		
		if($(this).is(':checked') && $(this).is(':disabled')) {
			custom_radio.css({'background-position' : '0 -' + radio_h * 3 + 'px', 'cursor' : 'default'});
		} else if($(this).is(':checked')) {
			custom_radio.css({'background-position' : '0 -' + radio_h + 'px'});
		} else if($(this).is(':disabled')) {
			custom_radio.css({'background-position' : '0 -' + radio_h * 2 + 'px', 'cursor' : 'default'});
		} else {
			custom_radio.css({'background-position' : '0 0'});
		}
		
		custom_radio.css({'width' : radio_w + 'px', 'height' : radio_h + 'px'});
		
	});
	
	function changeCheckbox(el) {
	
		var checkbox = el;
		var custom_checkbox = el.parent('.custom_checkbox');
		
		if(checkbox.is(':disabled')) {
			return false;
		}
		
		if(!checkbox.is(':checked')) {
			custom_checkbox.css({'background-position' : '0 -' + checkbox_h + 'px'});	
			checkbox.attr('checked', true);
		} else {
			custom_checkbox.css({'background-position' : '0 0'});
			checkbox.attr('checked', false);
		}	
		
	}
	
	function changeRadio(el) {
	
		var radio = el;
		var custom_radio = el.parent('.custom_radio');
		
		if(radio.is(':disabled')) {
			return false;
		}
		
		$('input[type=radio][name=' + radio.attr('name') + ']').each(function() {
			if(!$(this).is(':disabled')) {
				$(this).parent('.custom_radio').css({'background-position' : '0 0'});	
				$(this).attr('checked', false);	
			} else if($(this).is(':checked')) {
				$(this).parent('.custom_radio').css({'background-position' : '0 -' + radio_h * 2 + 'px'});	
				$(this).attr('checked', false);	
			}			
		});
		
		if(!radio.is(':checked')) {
			custom_radio.css({'background-position' : '0 -' + radio_h + 'px'});	
			radio.attr('checked', true);
		}	
		
	}

	$('.custom_checkbox').not('label .custom_checkbox').mousedown(function() {
		changeCheckbox($(this).find('input[type=checkbox]').eq(0));
		return false;
	});
	
	$('label').click(function() {

		if($(this).attr('for')) {
			var el = $('#' + $(this).attr('for'));
			if(el.is('input[type=checkbox]')){
				changeCheckbox(el);
			} else if(el.is('input[type=radio]')) {
				changeRadio(el);
			}
		} else {
		
			var el = $(this).find('input[type=checkbox]').eq(0);
			if(el.is('input[type=checkbox]')){
				changeCheckbox(el);
			} else {
				changeRadio($(this).find('input[type=radio]').eq(0));
			}
		}
		
		return false;
	});
	
	$('.custom_radio').not('label .custom_radio').mousedown(function() {
		changeRadio($(this).find('input[type=radio]').eq(0));
		return false;
	});
	
});