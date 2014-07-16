<?php
/**
 * This file adds the Landing template to the Minimum Pro Theme.
 *
 * @author StudioPress
 * @package Minimum Pro
 * @subpackage Customizations
 */

/*
Template Name: Landing
*/

//* Add landing body class to the head
add_filter( 'body_class', 'minimum_add_body_class' );
function minimum_add_body_class( $classes ) {

	$classes[] = 'minimum-landing';
	return $classes;

}

//* Enqueue Backstretch scripts
add_action( 'wp_enqueue_scripts', 'minimum_enqueue_backstretch' );
function minimum_enqueue_backstretch() {

	//* Load scripts only if custom background is being used
	if ( ! get_background_image() )
		return;
	
	//* Load Backstretch scripts
	wp_enqueue_script( 'minimum-backstretch', get_bloginfo( 'stylesheet_directory' ) . '/js/backstretch.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'minimum-backstretch-set', get_bloginfo('stylesheet_directory').'/js/backstretch-set.js' , array( 'jquery', 'minimum-backstretch' ), '1.0.0' );
	wp_localize_script( 'minimum-backstretch-set', 'BackStretchImg', array( 'src' => get_background_image() ) );

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Remove site header elements
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

//* Remove navigation
remove_action( 'genesis_after_header', 'genesis_do_nav', 15 );
remove_action( 'genesis_footer', 'genesis_do_subnav', 7 );

//* Remove Minimum after header
remove_action( 'genesis_after_header', 'minimum_site_tagline' );

//* Remove breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

//* Remove site footer widgets
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

//* Remove site footer elements
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

//* Run the Genesis loop
genesis();
