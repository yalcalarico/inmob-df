<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_Agency
 */

get_header();
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="section-margine">
				<div class="container">
					<div class="row">
						<?php
						$sidebar_position = corporate_agency_get_option( 'corporate_agency_global_sidebar_position' ); 

						$container_class = '';
						if( $sidebar_position == 'none' || !is_active_sidebar( 'sidebar' ) ) {
							$container_class = 'col-md-12 col-lg-12';
						} else {
							$container_class = 'col-md-9 col-lg-9';
						}

						if( $sidebar_position == 'left' && is_active_sidebar( 'sidebar' ) ) {
							get_sidebar();
						}
						?>
						<div class="<?php echo esc_attr( $container_class ); ?>">
							<?php
							if( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_pagination( 
									array(
										'mid_size' 	=> 2,
										'prev_text' => esc_html__( 'Previous', 'corporate-agency' ),
										'next_text' => esc_html__( 'Next', 'corporate-agency' ),
									) 
								);

							else: 

								get_template_part( 'template-parts/content', 'none' );

							endif;
							?>
						</div>
						<?php
						if( $sidebar_position == 'right' && is_active_sidebar( 'sidebar' ) ) {
							get_sidebar();
						}
						?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- .section-margine -->
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
get_footer();
