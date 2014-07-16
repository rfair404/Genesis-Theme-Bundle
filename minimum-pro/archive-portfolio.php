<?php
/**
 * The custom portfolio post type archive template
 */

//* Force full width content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Add even/odd post class
add_filter( 'post_class', 'minimum_even_odd_portfolio_post_class' );
function minimum_even_odd_portfolio_post_class( $classes ) {

	global $wp_query;
	$classes[] = ($wp_query->current_post % 2 == 0) ? 'portfolio-odd' : 'portfolio-even';
	return $classes;

}

//* Remove the entry meta in the entry header
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );

//* Remove the entry content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

//* Remove the entry image
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

//* Add the featured image after post title
add_action( 'genesis_entry_content', 'minimum_portfolio_grid' );
function minimum_portfolio_grid() {

	if ( $image = genesis_get_image( 'format=url&size=portfolio' ) ) {
		printf( '<div class="portfolio-image"><a href="%s" rel="bookmark"><img src="%s" alt="%s" /></a></div>', get_permalink(), $image, the_title_attribute( 'echo=0' ) );

	}

}

//* Remove the entry meta in the entry footer
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

//* Run the Genesis loop
genesis();
