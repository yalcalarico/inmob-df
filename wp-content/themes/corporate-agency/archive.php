<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_Agency
 */

get_header();
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			if( have_posts() ) :
				
				if( has_header_image() ) :
					?>
					<section class="inner-title" style="background-image: url(<?php header_image(); ?>);">
					<?php
				else :
					?>
					<section class="inner-title">
					<?php
				endif;
				?>
					<div class="mask"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<?php the_archive_title( '<h2>', '</h2>' ); ?>
							</div>
							<div class="col-md-6 col-lg-6">
								<?php corporate_agency_breadcrumb(); ?>
							</div>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #inner-title.inner-title -->
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
							<div class="col-md-9 col-lg-9">
								<?php

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

								the_posts_navigation();

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
				<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
get_footer();
