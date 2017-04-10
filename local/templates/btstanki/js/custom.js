/*----------------------------------------------------------------------------
 
 1.	Loader
 2.	Placeholder plugin
 3.	Clock Setup
 4.	Validate Form
 5.	Modal Window
 
/*----------------------------------------------------------------------------*/
jQuery(document).ready(function($) {
    'use strict';
/*----------------------------------------------------------------------------*/
/*	1.	Loader
/*----------------------------------------------------------------------------*/
$(window).load(function() {
    $("#preload-content").delay(300).fadeOut("400");
    $("#preload").delay(800).fadeOut("400");
});

/*----------------------------------------------------------------------------*/
/*	2.	Placeholder Plugin
/*----------------------------------------------------------------------------*/
    $('input, textarea').placeholder();

/*----------------------------------------------------------------------------*/
/*	3.	Clock Setup
/*----------------------------------------------------------------------------*/
    $('#clock').countdown('2015/09/25', function(event) {
        $(this).html(event.strftime(''
                + '<div class="clock-section"><span>%D</span> <p>дней</p></div> '
                + '<div class="clock-section"><span>%H</span> <p>часов</p></div> '
                + '<div class="clock-section"><span>%M</span> <p>минут</p></div> '
                + '<div class="clock-section"><span>%S</span> <p>секунд</p></div>'));
    });
/*----------------------------------------------------------------------------*/
/*	4.	Validate Fotm
/*----------------------------------------------------------------------------*/
    $('#contactform').submit(function() {
 
        var action = $(this).attr('action');

        $("#message").fadeIn("100", function() {
            $('#message').hide();

            $.post(action, {
                email: $('#email').val()
            },
                    function(data) {
                        document.getElementById('message').innerHTML = data;
                        $('#message').fadeIn("100");
                    }
            );
        });
        return false;
    });

/*----------------------------------------------------------------------------*/
/*	5.	Modal Window
/*----------------------------------------------------------------------------*/
    $('#modal-open').on('click', function(e) {
        var mainInner = $('#modal-window .container'),
                modal = $('#modal');

        mainInner.animate({opacity: 0}, 300, function() {
            $('html,body').scrollTop(0);
            modal.addClass('modal-active').fadeIn(600);
        });
        e.preventDefault();

        $('#modal-close').on('click', function(e) {
            modal.removeClass('modal-active').fadeOut(300, function() {
                mainInner.animate({opacity: 1}, 200);
            });
            e.preventDefault();
        });
    });
   
});