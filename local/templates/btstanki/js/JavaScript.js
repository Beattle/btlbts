$(document).ready(function(){


	$('.open_faq').click(function(){
		$('.open_faq').not($(this)).removeClass('');
		$('.close_faq').not($(this).next('.close_faq')).slideUp(500);
		$(this).next('.close_faq').slideToggle(500);
		$(this).toggleClass('');
	});

	
});

