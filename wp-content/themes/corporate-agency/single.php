<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Corporate_Agency
 */

get_header();
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
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
							<?php
							if( have_posts() ) :
								while( have_posts() ) :
									the_post();
									?>
									<h2><?php the_title(); ?></h2>
									<?php
								endwhile;
							endif;
							?>
						</div>
						<div class="col-md-6 col-lg-6">
							<?php corporate_agency_breadcrumb(); ?>
						</div>
					</div><!-- .row -->
				</div><!-- .container -->

			</section><!-- .inner-title -->
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
							while ( have_posts() ) :
								the_post();

								get_template_part( 'template-parts/content', 'single' );

								the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
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
