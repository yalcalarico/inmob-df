<?php
$enable_section = corporate_agency_get_option( 'corporate_agency_enable_cta' );
$cta_page = corporate_agency_get_option( 'corporate_agency_cta_page' );

$cta_args = array(
	'post_type' => 'page',
	'posts_per_page' => 1,
);

if( absint( $cta_page ) > 0 ) {
	$cta_args['page_id'] = absint( $cta_page );
}

$cta_query = new WP_Query( $cta_args );

if( $cta_query->have_posts() && $enable_section == true ) {

	while( $cta_query->have_posts() ) {

		$cta_query->the_post();
		?>
		<section id="section5" class="section-margine section-5-background" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>);">
		  	<div class="container">
		    	<div class="row">
		      		<div class="col-md-12 col-lg-12">
		        		<div class="section-5-box-text-cont wow fadeInUp">
		          			<h2><?php the_title(); ?></h2>
		          			<?php the_content(); ?>
		          		</div>
		      		</div>
		    	</div>
		  	</div>
		</section>
		<?php
	}
	wp_reset_postdata();
}
