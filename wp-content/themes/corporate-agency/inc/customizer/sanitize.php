<?php
/**
 * Sanitization Functions
 *
 * @package Corporate_Agency
 */

/**
 * Sanitization Function - Checkbox
 * 
 * @param $checked
 * @return bool
 */
if( !function_exists( 'corporate_agency_sanitize_checkbox' ) ) :

	function corporate_agency_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

/**
 * Sanitization Function - Choices
 * 
 * @param $input, $setting
 * @return $input
 */
if( !function_exists( 'corporate_agency_sanitize_choices' ) ) :

    function corporate_agency_sanitize_choices( $input, $setting ) {
        
        if(!empty($input)){
            $input = array_map('absint', $input);
        }

        return $input;
    } 

endif;


/**
 * Sanitization Function - Multiple Categories
 * 
 * @param $input, $setting
 * @return $input
 */
if( !function_exists( 'corporate_agency_mutiple_category_select' ) ) :

    function corporate_agency_mutiple_category_select( $input, $setting ) {
        
        if( is_array( $input ) ) {
            
            return $input;
        }
    } 

endif;

/**
 * Sanitization Function - Dropdown-pages
 *
 * @param $page_id
 * @param $setting
 * @return sanitized output
 */
if( !function_exists( 'corporate_agency_sanitize_dropdown_pages' ) ) :

    function corporate_agency_sanitize_dropdown_pages( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;

/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('corporate_agency_sanitize_select') ) :

    function corporate_agency_sanitize_select( $input, $setting ) {

        // Ensure input is a slug.
        $input = sanitize_key( $input );
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control( $setting->id )->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }
    
endif;

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('corporate_agency_sanitize_number') ) :

    function corporate_agency_sanitize_number( $input, $setting ) {

        $number = absint( $input );

        // If the input is a positibe number, return it; otherwise, return the default.
        return ( $number ? $number : $setting->default );
    }
    
endif;