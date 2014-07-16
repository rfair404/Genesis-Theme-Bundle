<?php
/**
 * This file adds the Home Page to the Agency Pro Theme.
 *
 * @author StudioPress
 * @package Agency Pro
 * @subpackage Customizations
 */
 
add_action( 'wp_enqueue_scripts', 'agency_enqueue_scripts' );
/**
 * Enqueue Scripts
 */
function agency_enqueue_scripts() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-middle' ) || is_active_sidebar( 'home-bottom' ) ) {
	
		wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );
		wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
		wp_enqueue_script( 'home', get_stylesheet_directory_uri() . '/js/home.js', array( 'localScroll' ), '', true );
		
	}
}

add_action( 'genesis_meta', 'agency_home_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function agency_home_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-middle' ) || is_active_sidebar( 'home-bottom' ) ) {

		//* Force content-sidebar layout setting
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		
		//* Add agency-pro-home body class
		add_filter( 'body_class', 'agency_body_class' );
		
		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		
		//* Add homepage home-top
		add_action( 'genesis_after_header', 'agency_homepage_top' );

		//* Add homepage widgets
		add_action( 'genesis_loop', 'agency_homepage_widgets' );
		
		//* Modify length of post excerpts
		add_filter( 'excerpt_length', 'agency_home_excerpt_length' );

	}

}

function agency_body_class( $classes ) {

	$classes[] = 'agency-pro-home';
	return $classes;
	
}

function agency_homepage_top() {

	genesis_widget_area( 'home-top', array(
		'before' => '<div id="home-top" class="home-top widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	
}

function agency_homepage_widgets() {
	
	genesis_widget_area( 'home-middle', array(
		'before' => '<div id="home-middle" class="home-middle widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );
	
	genesis_widget_area( 'home-bottom', array(
		'before' => '<div id="home-bottom" class="home-bottom widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

function agency_home_excerpt_length( $length ) {

	return 35;
    
}

genesis();
