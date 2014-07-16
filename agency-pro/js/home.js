jQuery(function( $ ){

    $.localScroll({
    	duration: 900
    });
    
	function fade_home_top() {
		if ( $(window).width() > 800 ) {
        window_scroll = $(this).scrollTop();
	   		$(".home-top").css({
				  'opacity' : 1-(window_scroll/300)
	    	});
		}
	}
	$(window).scroll(function() { fade_home_top(); });
	
});

