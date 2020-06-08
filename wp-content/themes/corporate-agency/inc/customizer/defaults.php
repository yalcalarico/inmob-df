<?php

if ( ! function_exists( 'corporate_agency_get_option' ) ) {

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function corporate_agency_get_option( $key ) {

        if ( empty( $key ) ) {
            return;
        }

        $value = '';

        $default = corporate_agency_get_default_theme_options();

        $default_value = null;

        if ( is_array( $default ) && isset( $default[ $key ] ) ) {
            $default_value = $default[ $key ];
        }

        if ( null !== $default_value ) {
            $value = get_theme_mod( $key, $default_value );
        }
        else {
            $value = get_theme_mod( $key );
        }

        return $value;
    }
}


if ( ! function_exists( 'corporate_agency_get_default_theme_options' ) ) {

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function corporate_agency_get_default_theme_options() {

        $defaults = array();

        $defaults['corporate_agency_enable_banner'] = false;
        $defaults['corporate_agency_banner_pages'] = '';

        $defaults['corporate_agency_enable_services'] = false;
        $defaults['corporate_agency_services_pre_title'] = '';
        $defaults['corporate_agency_services_main_title'] = '';
        $defaults['corporate_agency_services_pages'] = '';

        $defaults['corporate_agency_enable_projects'] = false;
        $defaults['corporate_agency_projects_pre_title'] = '';
        $defaults['corporate_agency_projects_main_title'] = '';
        $defaults['corporate_agency_projects_categories'] = '';
        $defaults['corporate_agency_projects_posts_no'] = 9;

        $defaults['corporate_agency_enable_cta'] = false;
        $defaults['corporate_agency_cta_page'] = 0;

        $defaults['corporate_agency_enable_testimonials'] = false;
        $defaults['corporate_agency_testimonials_pre_title'] = '';
        $defaults['corporate_agency_testimonials_main_title'] = '';
        $defaults['corporate_agency_testimonial_pages'] = '';

        $defaults['corporate_agency_enable_blog'] = false;
        $defaults['corporate_agency_blog_pre_title'] = '';
        $defaults['corporate_agency_blog_main_title'] = '';
        $defaults['corporate_agency_blog_categories'] = '';
        $defaults['corporate_agency_blog_posts_no'] = 3;

        $defaults['corporate_agency_enable_partners'] = false;
        $defaults['corporate_agency_partners_pages'] = '';

        $defaults['corporate_agency_enable_top_header'] = false;
        $defaults['corporate_agency_telephone_no'] = esc_html__( 'Call US + 1 (1800) 459 123 7', 'corporate-agency' );
        $defaults['corporate_agency_email'] = esc_html__( 'hello@domain.com', 'corporate-agency' );
        
        $defaults['corporate_agency_facebook_link'] = '';
        $defaults['corporate_agency_twitter_link'] = '';
        $defaults['corporate_agency_google_plus_link'] = '';
        $defaults['corporate_agency_pinterest_link'] = '';
        $defaults['corporate_agency_dribble_link'] = '';
        $defaults['corporate_agency_linkedin_link'] = '';

        $defaults['corporate_agency_enable_footer_social_links'] = false;

        $defaults['corporate_agency_global_sidebar_position'] = 'right';

        $defaults['corporate_agency_enable_breadcrumb'] = true;
        $defaults['corporate_agency_excerpt_length'] = 20;

        return $defaults;
    }
}