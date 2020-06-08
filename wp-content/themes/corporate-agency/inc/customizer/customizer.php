<?php
/**
 * Corporate Agency Theme Customizer
 *
 * @package Corporate_Agency
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function corporate_agency_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/**
	 * Custom Customize Control
	 */
	require get_template_directory() . '/inc/customizer/controls.php';

	/**
	 * Sanitization Functions
	 */
	require get_template_directory() . '/inc/customizer/sanitize.php';

	/**
	 * Customizer Options
	 */
	require get_template_directory() . '/inc/customizer/options.php';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'corporate_agency_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'corporate_agency_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'corporate_agency_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function corporate_agency_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function corporate_agency_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_agency_customize_preview_js() {
	wp_enqueue_script( 'corporate-agency-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corporate_agency_customize_preview_js' );

/**
 * Enqeue Styles and Scripts for Customizer.
 */
function corporate_agency_customizer_script() {
	wp_enqueue_style( 'chosen', get_template_directory_uri() .'/assets/css/chosen.css');
	wp_enqueue_style( 'corporate-agency-customizer', get_template_directory_uri() .'/assets/css/customizer.css' );
	wp_enqueue_script( 'chosen', get_template_directory_uri() .'/assets/js/chosen.js', array( 'jquery' ),'1.8.3', true  );
	wp_enqueue_script( 'corporate-agency-customizer-script', get_template_directory_uri() . '/assets/js/customizer-script.js', array( 'jquery' ), '20151215', true );
}
add_action( 'customize_controls_enqueue_scripts', 'corporate_agency_customizer_script' );

