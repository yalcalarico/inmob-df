<?php

/**
 * Custom Search Form
 *
 * @return void
 */
if( !function_exists( 'corporate_agency_custom_search_form' ) ) {

	function corporate_agency_custom_search_form() {

		$form = '<form role="search" method="get" id="search-form" class="clearfix" action="' . esc_url( home_url( '/' ) ) . '"><div class="control-group form-group"><div class="controls"><input type="search" class="form-control" name="s" placeholder="' . esc_attr__( 'Search', 'corporate-agency' ) . '" value"' . esc_attr( get_search_query() ) . '" ><button type="submit" id="submit" class="btn btn-primary">' . esc_html__( 'Search', 'corporate-agency' ) . '</button></div></div></form>';

    	return $form;
	}
}
add_filter( 'get_search_form', 'corporate_agency_custom_search_form' );

/**
 * Filters For Excerpt Length
 */
if( !function_exists( 'corporate_agency_excerpt_length' ) ) :
    /*
     * Excerpt More
     */
    function corporate_agency_excerpt_length( $length ) {

        if( is_admin() ) {
            return $length;
        }

        $excerpt_length = corporate_agency_get_option( 'corporate_agency_excerpt_length' );

        if ( absint( $excerpt_length ) > 0 ) {
            $excerpt_length = absint( $excerpt_length );
        }

        return $excerpt_length;
    }
endif;
add_filter( 'excerpt_length', 'corporate_agency_excerpt_length' );