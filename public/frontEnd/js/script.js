jQuery(document).ready(function () {
	'use strict';
	// counter start
	$('.counter').counterUp({
	delay: 10,
	time: 1000
	});
	//  counter end
    // sticker js end
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 50 ) {
	        $('.scrolltop:hidden').stop(true, true).fadeIn();
	    } else {
	        $('.scrolltop').stop(true, true).fadeOut();
	    }
	});
	$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".gotop").offset().top},"1000");return false})})

    /*======scroll up======*/
     
});
