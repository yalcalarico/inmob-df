<?php

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'corporate_agency_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function corporate_agency_fonts_url() {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Open Sans font: on or off', 'corporate-agency')) {
            $fonts[] = 'Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        
        return $fonts_url;
    }
endif;


/**
 * Function to get post thumbnail's Alt text 
 */
if( !function_exists( 'corporate_agency_thumbnail_alt_text' ) ) {

    function corporate_agency_thumbnail_alt_text( $post_id ) {

        $post_thumbnail_id = get_post_thumbnail_id( $post_id );

        $alt_text = '';

        if( !empty( $post_thumbnail_id ) ) {

            $alt_text = get_post_meta( $post_thumbnail_id, '_wp_attachment_image_alt', true );
        }

        if( !empty( $alt_text ) ) {

            echo esc_attr( $alt_text );
        } else {

            the_title_attribute();
        }
    }
}