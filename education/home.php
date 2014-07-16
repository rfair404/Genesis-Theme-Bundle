<?php

add_action( 'genesis_meta', 'education_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function education_home_genesis_meta() {
	
	global $paged;
	
	if( $paged < 1 ) {
		if ( is_active_sidebar( 'slider' ) || is_active_sidebar( 'intro' ) || is_active_sidebar( 'featured' ) || is_active_sidebar( 'call-to-action' ) ) {
		
			add_action( 'genesis_before_content', 'education_home_loop_helper', 1 );
	
		}
	}
	
}

function education_home_loop_helper() {
		
		echo '<div id="home-featured">';
		
		genesis_widget_area( 'slider', array( 
		
			'before'	=>	'<div class="slider widget-area">' 
		
		) );

		genesis_widget_area( 'intro', array( 
		
			'before'	=> 	'<div class="intro widget-area"><div class="inner">', 
			'after'	=>	'<div class="clear"></div></div></div><!-- end .intro -->' 
		
		) );
		
		genesis_widget_area( 'featured', array(
		 
			'before'	=>	'<div class="featured widget-area"><div class="inner">', 
			'after'	=>	'<div class="clear"></div></div></div><!-- end .featured -->' 
			
		) );
		
		genesis_widget_area( 'call-to-action', array(
		
			'before'	=>	'<div class="call-to-action"><div class="banner-left"></div>', 
			'after'	=>	'<div class="banner-right"></div></div><!-- end .call-to-action -->'
		
		) );		

		echo '</div>';
		
}

genesis();