<?php

//* Executive Theme Setting Defaults
add_filter( 'genesis_theme_settings_defaults', 'executive_theme_defaults' );
function executive_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 5;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

//* Executive Theme Setup
add_action( 'after_switch_theme', 'executive_theme_setting_defaults' );
function executive_theme_setting_defaults() {

	_genesis_update_settings( array(
		'blog_cat_num'              => 5,	
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	) );
	
	_genesis_update_settings( array(
		'location_horizontal'             => 'Left',
		'location_vertical'               => 'Top',
		'posts_num'                       => '3',
		'slideshow_excerpt_content_limit' => '100',
		'slideshow_excerpt_content'       => 'full',
		'slideshow_excerpt_width'         => '30',
		'slideshow_height'                => '445',
		'slideshow_more_text'             => __( 'Continue Reading&hellip;', 'executive' ),
		'slideshow_title_show'            => 1,
		'slideshow_width'                 => '1140',
	), GENESIS_RESPONSIVE_SLIDER_SETTINGS_FIELD );

	update_option( 'posts_per_page', 5 );
	
	flush_rewrite_rules( false );

}

//* Set Genesis Responsive Slider defaults
add_filter( 'genesis_responsive_slider_settings_defaults', 'executive_responsive_slider_defaults' );
function executive_responsive_slider_defaults( $defaults ) {

	$args = array(
		'location_horizontal'             => 'Left',
		'location_vertical'               => 'Top',
		'posts_num'                       => '3',
		'slideshow_excerpt_content_limit' => '100',
		'slideshow_excerpt_content'       => 'full',
		'slideshow_excerpt_width'         => '30',
		'slideshow_height'                => '445',
		'slideshow_more_text'             => __( 'Continue Reading&hellip;', 'executive' ),
		'slideshow_title_show'            => 1,
		'slideshow_width'                 => '1140',
	);

	$args = wp_parse_args( $args, $defaults );
	
	return $args;
}