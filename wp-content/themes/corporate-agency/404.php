<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Corporate_Agency
 */

get_header();
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="inner-title">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-6">
							<h2><?php esc_html_e( '404', 'corporate-agency' ); ?></h2>
						</div>
						<div class="col-md-6 col-lg-6">
							<?php corporate_agency_breadcrumb(); ?>
						</div>
					</div>
				</div>
			</section> 

			<section id="section19" class="section19">
  				<div class="container">
   					<div class="row">
     					<div class="col-md-6 col-lg-6"><div class="section19-404"><h1><?php esc_html_e( '404', 'corporate-agency' ); ?></h1><h3><?php esc_html_e( 'Sorry, it appears the page your were looking for doesn&rsquo;t exist anymore or might have been moved.', 'corporate-agency' ); ?></h3></div></div>
     					<div class="col-md-6 col-lg-6">
     						<div class="section19-subscribe">
     							<?php get_search_form(); ?>
         						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><i class="fa fa-home fa-2x"></i> <?php esc_html_e( 'Back to Home', 'corporate-agency' ); ?> </a>
      						</div>  
     					</div>
   					</div>  
  				</div>
			</section> 
		</main>
	</div>
	<?php
get_footer();
