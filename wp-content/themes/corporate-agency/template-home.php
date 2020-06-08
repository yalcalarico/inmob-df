<?php
/*
 * Template Name: Home Page Template
 *
 */

	get_header();

	get_template_part( 'template-parts/home-sections/section', 'banner' );

	get_template_part( 'template-parts/home-sections/section', 'services' );

	get_template_part( 'template-parts/home-sections/section', 'projects' );

	get_template_part( 'template-parts/home-sections/section', 'cta' );

	get_template_part( 'template-parts/home-sections/section', 'testimonials' );

	get_template_part( 'template-parts/home-sections/section', 'blog' );

	get_template_part( 'template-parts/home-sections/section', 'partners' );

	get_footer();