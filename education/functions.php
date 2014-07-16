<?php
/** Start the engine */
include_once( get_template_directory() . '/lib/init.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'education', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'education' ) );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Education Theme' );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/education' );

/** Create additional color style options */
add_theme_support( 'genesis-style-selector', array( 
	'education-black'	=> __( 'Black' , 'education' ), 
	'education-green'	=> __( 'Green' , 'education' ), 
	'education-purple'	=> __( 'Purple' , 'education' ), 
	'education-red'		=> __( 'Red' , 'education' ), 
	'education-teal'	=> __( 'Teal' , 'education' ) 
) );

add_action( 'genesis_meta', 'education_add_viewport_meta_tag' );
/** Add Viewport meta tag for mobile browsers */
function education_add_viewport_meta_tag() {

    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
    
}

/** Add new image sizes */
add_image_size( 'featured-image', 150, 100, TRUE );

/** Add structural wraps */
add_theme_support( 'genesis-structural-wraps', array(
	'header', 
	'nav', 
	'subnav', 
	'inner', 
	'footer-widgets', 
	'footer' 
) );

/** Add support for custom background */
add_theme_support( 'custom-background', array(
	'default-image' => get_stylesheet_directory_uri() . '/images/bg.png',
	'default-color' => 'f5f5f5',
) );

/** Add support for custom header */
add_theme_support( 'custom-header', array( 
	'width' => 380, 
	'height' => 100,
	'header-selector'	=> '#title a',
	'header-text'		=> false
) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Reposition Primary Navigation */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_nav' );

/** Reposition Secondary Navigation */
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_subnav' );

/** Reposition Breadcrumbs */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_before_content', 'genesis_do_breadcrumbs' );

add_filter( 'genesis_comment_list_args', 'child_comment_list_args' );
/** Change avatar size */
function child_comment_list_args( $args ) {

    $args = array(
			'type' => 'comment',
			'avatar_size' => 33,
			'callback' => 'genesis_comment_callback'
		);
		
		return $args;
		
}

/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=>	'slider',
	'name'			=>	__( 'Slider', 'education' ),
	'description'	=>	__( 'This is the slider section.', 'education' ),
) );
genesis_register_sidebar( array(
	'id'			=> 	'intro',
	'name'			=>	__( 'Intro', 'education' ),
	'description'	=>	__( 'This is the intro section displayed below the slider.', 'education' ),
) );
genesis_register_sidebar( array(
	'id'			=>	'featured',
	'name'			=>	__( 'Featured', 'education' ),
	'description'	=>	__( 'This is the featured section displayed below the intro.', 'education' ),
) );
genesis_register_sidebar( array(
	'id'			=>	'call-to-action',
	'name'			=>	__( 'Call To Action', 'education' ),
	'description'	=>	__( 'This is the call to action banner.', 'education' ),
) );