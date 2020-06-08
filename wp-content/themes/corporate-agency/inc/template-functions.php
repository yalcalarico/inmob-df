<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Corporate_Agency
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function corporate_agency_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'corporate_agency_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function corporate_agency_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'corporate_agency_pingback_header' );

/**
 * 
 */
function corporate_agency_breadcrumb() {
	$enable_breadcrumb = corporate_agency_get_option( 'corporate_agency_enable_breadcrumb' );
	if( $enable_breadcrumb == true ) {
		$breadcrumb_args = array(
			'container' => 'div',
	        'show_browse' => true,
	        'labels' => array(
	        	'browse' => esc_html__( 'Current Page: ', 'corporate-agency' ),
	        )
	    );
	    corporate_agency_breadcrumb_trail( $breadcrumb_args );
	}
}
