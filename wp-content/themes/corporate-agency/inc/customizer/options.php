<?php

$defaults = corporate_agency_get_default_theme_options();

$pages_list  =  get_pages();

$all_pages = array();

foreach( $pages_list as $list ){
	$all_pages[ $list->ID ] = $list->post_title;
}


$category_taxonomy = 'category';

$category_terms = get_terms( $category_taxonomy );

$categories = array();

foreach( $category_terms as $category_term ) {
	$categories[$category_term->slug] = $category_term->name;
}

/**************************************************************************************/
/*---------------------------- Customizer Panels -------------------------------------*/
/**************************************************************************************/

// Home Page Customization Panel
$wp_customize->add_panel(
	'corporate_agency_theme_customizations',
	array(
		'title' => esc_html__( 'Theme Options', 'corporate-agency' ),
		'priority' => 10,
	)
);

/**************************************************************************************/
/*---------------------------------- Theme Header ------------------------------------*/
/**************************************************************************************/

// Section - Header
$wp_customize->add_section( 'corporate_agency_header_options', array(
	'title'			=> esc_html__( 'Theme Header', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Top Header
$wp_customize->add_setting( 'corporate_agency_enable_top_header', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_top_header'],
) );

$wp_customize->add_control( 'corporate_agency_enable_top_header', array(
	'label'				=> esc_html__( 'Enable Top Header', 'corporate-agency' ),
	'section'			=> 'corporate_agency_header_options',
	'type'				=> 'checkbox',
) );

// Option - Telephone Number
$wp_customize->add_setting( 'corporate_agency_telephone_no', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_telephone_no'],
) );

$wp_customize->add_control( 'corporate_agency_telephone_no', array(
	'label'				=> esc_html__( 'Telephone Number', 'corporate-agency' ),
	'section'			=> 'corporate_agency_header_options',
	'type'				=> 'text',
) );

// Option - Email
$wp_customize->add_setting( 'corporate_agency_email', array(
	'sanitize_callback'	=> 'sanitize_email',
	'default'			=> $defaults['corporate_agency_email'],
) );

$wp_customize->add_control( 'corporate_agency_email', array(
	'label'				=> esc_html__( 'Email', 'corporate-agency' ),
	'section'			=> 'corporate_agency_header_options',
	'type'				=> 'email',
) );


/**************************************************************************************/
/*---------------------------- Banner Section ----------------------------------------*/
/**************************************************************************************/

// Section - Banner
$wp_customize->add_section( 'corporate_agency_banner_options', array(
	'title'			=> esc_html__( 'Banner Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Banner Section
$wp_customize->add_setting( 'corporate_agency_enable_banner', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_banner'],
) );

$wp_customize->add_control( 'corporate_agency_enable_banner', array(
	'label'				=> esc_html__( 'Enable Banner Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_banner_options',
	'type'				=> 'checkbox',
) );

// Option - Banner Pages
$wp_customize->add_setting( 'corporate_agency_banner_pages', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_choices',
	'default' => $defaults['corporate_agency_banner_pages'],
) );

$wp_customize->add_control( new Corporate_Agency_Dropdown_Multiple_Select( $wp_customize, 'corporate_agency_banner_pages', array(
	'label'				=> esc_html__( 'Select Pages for Banner', 'corporate-agency' ),
	'description'		=> esc_html__( 'Select one or more than one pages', 'corporate-agency' ),
	'section'			=> 'corporate_agency_banner_options',
	'type'				=> 'select',
	'choices'			=> $all_pages,
) ) );


/**************************************************************************************/
/*---------------------------- Sevices Section ----------------------------------------*/
/**************************************************************************************/

// Section - Services
$wp_customize->add_section( 'corporate_agency_services_options', array(
	'title'			=> esc_html__( 'Services Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Services Section
$wp_customize->add_setting( 'corporate_agency_enable_services', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_services'],
) );

$wp_customize->add_control( 'corporate_agency_enable_services', array(
	'label'				=> esc_html__( 'Enable Services Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_services_options',
	'type'				=> 'checkbox',
) );

// Option - Services Section Pre Title
$wp_customize->add_setting( 'corporate_agency_services_pre_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_services_pre_title'],
) );

$wp_customize->add_control( 'corporate_agency_services_pre_title', array(
	'label'				=> esc_html__( 'Section Pre Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_services_options',
	'type'				=> 'text',
) );

// Option - Services Section Main Title
$wp_customize->add_setting( 'corporate_agency_services_main_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_services_main_title'],
) );

$wp_customize->add_control( 'corporate_agency_services_main_title', array(
	'label'				=> esc_html__( 'Section Main Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_services_options',
	'type'				=> 'text',
) );

// Option - Services Pages
$wp_customize->add_setting( 'corporate_agency_services_pages', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_choices',
	'default' => $defaults['corporate_agency_services_pages'],
) );

$wp_customize->add_control( new Corporate_Agency_Dropdown_Multiple_Select( $wp_customize, 'corporate_agency_services_pages', array(
	'label'				=> esc_html__( 'Select Pages for Services', 'corporate-agency' ),
	'description'		=> esc_html__( 'Select one or more than one pages', 'corporate-agency' ),
	'section'			=> 'corporate_agency_services_options',
	'type'				=> 'select',
	'choices'			=> $all_pages,
) ) );


/**************************************************************************************/
/*---------------------------- Projects Section --------------------------------------*/
/**************************************************************************************/

// Section - Projects
$wp_customize->add_section( 'corporate_agency_projects_options', array(
	'title'			=> esc_html__( 'Projects Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Projects Section
$wp_customize->add_setting( 'corporate_agency_enable_projects', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_projects'],
) );

$wp_customize->add_control( 'corporate_agency_enable_projects', array(
	'label'				=> esc_html__( 'Enable Projects Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_projects_options',
	'type'				=> 'checkbox',
) );

// Option - Projects Section Pre Title
$wp_customize->add_setting( 'corporate_agency_projects_pre_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_projects_pre_title'],
) );

$wp_customize->add_control( 'corporate_agency_projects_pre_title', array(
	'label'				=> esc_html__( 'Section Pre Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_projects_options',
	'type'				=> 'text',
) );

// Option - Projects Section Main Title
$wp_customize->add_setting( 'corporate_agency_projects_main_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_projects_main_title'],
) );

$wp_customize->add_control( 'corporate_agency_projects_main_title', array(
	'label'				=> esc_html__( 'Section Main Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_projects_options',
	'type'				=> 'text',
) );

// Option - Projects Categories
$wp_customize->add_setting( 'corporate_agency_projects_categories', array(
	'sanitize_callback'	=> 'corporate_agency_mutiple_category_select',
	'default' => $defaults['corporate_agency_projects_categories'],
) );

$wp_customize->add_control( new Corporate_Agency_Dropdown_Multiple_Select( $wp_customize, 'corporate_agency_projects_categories', array(
	'label'				=> esc_html__( 'Select Categories for Projects', 'corporate-agency' ),
	'description'		=> esc_html__( 'Select one or more than one categories', 'corporate-agency' ),
	'section'			=> 'corporate_agency_projects_options',
	'type'				=> 'select',
	'choices'			=> $categories,
) ) );

// Option - Projects Posts Number
$wp_customize->add_setting( 'corporate_agency_projects_posts_no', array(
	'sanitize_callback'		=> 'corporate_agency_sanitize_number',
	'default'				=> $defaults['corporate_agency_projects_posts_no'], 
) ); 

$wp_customize->add_control( 'corporate_agency_projects_posts_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'corporate-agency' ),
	'section'				=> 'corporate_agency_projects_options',
	'type'					=> 'number',
) );


/**************************************************************************************/
/*--------------------------------- CTA Section --------------------------------------*/
/**************************************************************************************/

// Section - CTA
$wp_customize->add_section( 'corporate_agency_cta_options', array(
	'title'			=> esc_html__( 'CTA Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable CTA Section
$wp_customize->add_setting( 'corporate_agency_enable_cta', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_cta'],
) );

$wp_customize->add_control( 'corporate_agency_enable_cta', array(
	'label'				=> esc_html__( 'Enable CTA Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_cta_options',
	'type'				=> 'checkbox',
) );

// Option - Page for CTA Section
$wp_customize->add_setting( 'corporate_agency_cta_page', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_dropdown_pages',
	'default'			=> $defaults['corporate_agency_cta_page'],
) );

$wp_customize->add_control( 'corporate_agency_cta_page', array(
	'label'				=> esc_html__( 'Select Page for CTA', 'corporate-agency' ),
	'description'		=> esc_html__( 'Page Contents are used for the image and CTA content', 'corporate-agency' ),
	'section'			=> 'corporate_agency_cta_options',
	'type'				=> 'dropdown-pages',
) );


/**************************************************************************************/
/*---------------------------- Testimonials Section ----------------------------------*/
/**************************************************************************************/

// Section - Testimonials
$wp_customize->add_section( 'corporate_agency_testimonials_options', array(
	'title'			=> esc_html__( 'Testimonials Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Testimonials Section
$wp_customize->add_setting( 'corporate_agency_enable_testimonials', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_testimonials'],
) );

$wp_customize->add_control( 'corporate_agency_enable_testimonials', array(
	'label'				=> esc_html__( 'Enable Testimonials Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_testimonials_options',
	'type'				=> 'checkbox',
) );

// Option - Testimonials Section Pre Title
$wp_customize->add_setting( 'corporate_agency_testimonials_pre_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_testimonials_pre_title'],
) );

$wp_customize->add_control( 'corporate_agency_testimonials_pre_title', array(
	'label'				=> esc_html__( 'Section Pre Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_testimonials_options',
	'type'				=> 'text',
) );

// Option - Testimonials Section Main Title
$wp_customize->add_setting( 'corporate_agency_testimonials_main_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_testimonials_main_title'],
) );

$wp_customize->add_control( 'corporate_agency_testimonials_main_title', array(
	'label'				=> esc_html__( 'Section Main Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_testimonials_options',
	'type'				=> 'text',
) );

// Option - Testimonials Pages
$wp_customize->add_setting( 'corporate_agency_testimonial_pages', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_choices',
	'default' => $defaults['corporate_agency_testimonial_pages'],
) );

$wp_customize->add_control( new Corporate_Agency_Dropdown_Multiple_Select( $wp_customize, 'corporate_agency_testimonial_pages', array(
	'label'				=> esc_html__( 'Select Pages for Testimonials', 'corporate-agency' ),
	'description'		=> esc_html__( 'Select one or more than one pages', 'corporate-agency' ),
	'section'			=> 'corporate_agency_testimonials_options',
	'type'				=> 'select',
	'choices'			=> $all_pages,
) ) );


/**************************************************************************************/
/*-------------------------------- Blog Section --------------------------------------*/
/**************************************************************************************/

// Section - Blog
$wp_customize->add_section( 'corporate_agency_blog_options', array(
	'title'			=> esc_html__( 'Blog Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Blog Section
$wp_customize->add_setting( 'corporate_agency_enable_blog', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_blog'],
) );

$wp_customize->add_control( 'corporate_agency_enable_blog', array(
	'label'				=> esc_html__( 'Enable Blog Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_blog_options',
	'type'				=> 'checkbox',
) );

// Option - Blog Section Pre Title
$wp_customize->add_setting( 'corporate_agency_blog_pre_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_blog_pre_title'],
) );

$wp_customize->add_control( 'corporate_agency_blog_pre_title', array(
	'label'				=> esc_html__( 'Section Pre Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_blog_options',
	'type'				=> 'text',
) );

// Option - Blog Section Main Title
$wp_customize->add_setting( 'corporate_agency_blog_main_title', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'			=> $defaults['corporate_agency_blog_main_title'],
) );

$wp_customize->add_control( 'corporate_agency_blog_main_title', array(
	'label'				=> esc_html__( 'Section Main Title', 'corporate-agency' ),
	'section'			=> 'corporate_agency_blog_options',
	'type'				=> 'text',
) );

// Option - Blog Categories
$wp_customize->add_setting( 'corporate_agency_blog_categories', array(
	'sanitize_callback'	=> 'corporate_agency_mutiple_category_select',
	'default' => $defaults['corporate_agency_blog_categories'],
) );

$wp_customize->add_control( new Corporate_Agency_Dropdown_Multiple_Select( $wp_customize, 'corporate_agency_blog_categories', array(
	'label'				=> esc_html__( 'Select Categories for Blog', 'corporate-agency' ),
	'description'		=> esc_html__( 'Select one or more than one categories', 'corporate-agency' ),
	'section'			=> 'corporate_agency_blog_options',
	'type'				=> 'select',
	'choices'			=> $categories,
) ) );

// Option - Blog Posts Number
$wp_customize->add_setting( 'corporate_agency_blog_posts_no', array(
	'sanitize_callback'		=> 'corporate_agency_sanitize_number',
	'default'				=> $defaults['corporate_agency_blog_posts_no'], 
) ); 

$wp_customize->add_control( 'corporate_agency_blog_posts_no', array(
	'label'					=> esc_html__( 'Number of Posts', 'corporate-agency' ),
	'section'				=> 'corporate_agency_blog_options',
	'type'					=> 'number',
) );


/**************************************************************************************/
/*------------------------------ Partners Section ------------------------------------*/
/**************************************************************************************/

// Section - Partners
$wp_customize->add_section( 'corporate_agency_partners_options', array(
	'title'			=> esc_html__( 'Partner Section', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Partners Section
$wp_customize->add_setting( 'corporate_agency_enable_partners', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_partners'],
) );

$wp_customize->add_control( 'corporate_agency_enable_partners', array(
	'label'				=> esc_html__( 'Enable Partners Section', 'corporate-agency' ),
	'section'			=> 'corporate_agency_partners_options',
	'type'				=> 'checkbox',
) );

// Option - Partners Pages
$wp_customize->add_setting( 'corporate_agency_partners_pages', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_choices',
	'default' => $defaults['corporate_agency_partners_pages'],
) );

$wp_customize->add_control( new Corporate_Agency_Dropdown_Multiple_Select( $wp_customize, 'corporate_agency_partners_pages', array(
	'label'				=> esc_html__( 'Select Pages for Partners', 'corporate-agency' ),
	'description'		=> esc_html__( 'Select one or more than one pages', 'corporate-agency' ),
	'section'			=> 'corporate_agency_partners_options',
	'type'				=> 'select',
	'choices'			=> $all_pages,
) ) );


/**************************************************************************************/
/*--------------------------------- Theme Sidebar ------------------------------------*/
/**************************************************************************************/

// Section - Sidebar
$wp_customize->add_section( 'corporate_agency_sidebar_options', array(
	'title'			=> esc_html__( 'Theme Sidebar', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Sidebar Position
$wp_customize->add_setting( 'corporate_agency_global_sidebar_position', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_select',
	'default' => $defaults['corporate_agency_global_sidebar_position'],
) );

$wp_customize->add_control( 'corporate_agency_global_sidebar_position', array(
	'label'				=> esc_html__( 'Sidebar Position', 'corporate-agency' ),
	'section'			=> 'corporate_agency_sidebar_options',
	'type'				=> 'radio',
	'choices'			=> array(
		'left' 		=> esc_html__( 'Left', 'corporate-agency' ),
		'right' 	=> esc_html__( 'Right', 'corporate-agency' ),
		'none' 		=> esc_html__( 'None', 'corporate-agency' ),
	),
) );


/**************************************************************************************/
/*---------------------------------- Theme Footer ------------------------------------*/
/**************************************************************************************/

// Section - Footer
$wp_customize->add_section( 'corporate_agency_footer_options', array(
	'title'			=> esc_html__( 'Theme Footer', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Footer Social Links
$wp_customize->add_setting( 'corporate_agency_enable_footer_social_links', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_footer_social_links'],
) );

$wp_customize->add_control( 'corporate_agency_enable_footer_social_links', array(
	'label'				=> esc_html__( 'Enable Footer Social Links', 'corporate-agency' ),
	'section'			=> 'corporate_agency_footer_options',
	'type'				=> 'checkbox',
) );


/**************************************************************************************/
/*---------------------------------- Social Links ------------------------------------*/
/**************************************************************************************/

// Section - Social Links
$wp_customize->add_section( 'corporate_agency_social_links_options', array(
	'title'			=> esc_html__( 'Social Links', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Facebook Link
$wp_customize->add_setting( 'corporate_agency_facebook_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['corporate_agency_facebook_link'],
) );

$wp_customize->add_control( 'corporate_agency_facebook_link', array(
	'label'				=> esc_html__( 'Facebook Link', 'corporate-agency' ),
	'section'			=> 'corporate_agency_social_links_options',
	'type'				=> 'url',
) );

// Option - Twitter Link
$wp_customize->add_setting( 'corporate_agency_twitter_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['corporate_agency_twitter_link'],
) );

$wp_customize->add_control( 'corporate_agency_twitter_link', array(
	'label'				=> esc_html__( 'Twitter Link', 'corporate-agency' ),
	'section'			=> 'corporate_agency_social_links_options',
	'type'				=> 'url',
) );

// Option - Google Plus Link
$wp_customize->add_setting( 'corporate_agency_google_plus_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['corporate_agency_google_plus_link'],
) );

$wp_customize->add_control( 'corporate_agency_google_plus_link', array(
	'label'				=> esc_html__( 'Google Plus Link', 'corporate-agency' ),
	'section'			=> 'corporate_agency_social_links_options',
	'type'				=> 'url',
) );

// Option - Pinterest Link
$wp_customize->add_setting( 'corporate_agency_pinterest_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['corporate_agency_pinterest_link'],
) );

$wp_customize->add_control( 'corporate_agency_pinterest_link', array(
	'label'				=> esc_html__( 'Pinterest Link', 'corporate-agency' ),
	'section'			=> 'corporate_agency_social_links_options',
	'type'				=> 'url',
) );

// Option - Dribble Link
$wp_customize->add_setting( 'corporate_agency_dribble_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['corporate_agency_dribble_link'],
) );

$wp_customize->add_control( 'corporate_agency_dribble_link', array(
	'label'				=> esc_html__( 'Dribble Link', 'corporate-agency' ),
	'section'			=> 'corporate_agency_social_links_options',
	'type'				=> 'url',
) );

// Option - Linkedin Link
$wp_customize->add_setting( 'corporate_agency_linkedin_link', array(
	'sanitize_callback'	=> 'esc_url_raw',
	'default'			=> $defaults['corporate_agency_linkedin_link'],
) );

$wp_customize->add_control( 'corporate_agency_linkedin_link', array(
	'label'				=> esc_html__( 'Linkedin Link', 'corporate-agency' ),
	'section'			=> 'corporate_agency_social_links_options',
	'type'				=> 'url',
) );


/**************************************************************************************/
/*---------------------------------- Other Options -----------------------------------*/
/**************************************************************************************/

// Section - Other
$wp_customize->add_section( 'corporate_agency_other_options', array(
	'title'			=> esc_html__( 'Other Options', 'corporate-agency' ),
	'panel'			=> 'corporate_agency_theme_customizations',
) );

// Option - Enable Breadcrumb
$wp_customize->add_setting( 'corporate_agency_enable_breadcrumb', array(
	'sanitize_callback'	=> 'corporate_agency_sanitize_checkbox',
	'default'			=> $defaults['corporate_agency_enable_breadcrumb'],
) );

$wp_customize->add_control( 'corporate_agency_enable_breadcrumb', array(
	'label'				=> esc_html__( 'Enable Breadcrumb', 'corporate-agency' ),
	'section'			=> 'corporate_agency_other_options',
	'type'				=> 'checkbox',
) );

// Option - Excerpt Length
$wp_customize->add_setting( 'corporate_agency_excerpt_length', array(
	'sanitize_callback'		=> 'corporate_agency_sanitize_number',
	'default'				=> $defaults['corporate_agency_excerpt_length'], 
) ); 

$wp_customize->add_control( 'corporate_agency_excerpt_length', array(
	'label'					=> esc_html__( 'Excerpt Length', 'corporate-agency' ),
	'section'				=> 'corporate_agency_other_options',
	'type'					=> 'number',
) );