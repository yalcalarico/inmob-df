<?php
$enable_section = corporate_agency_get_option( 'corporate_agency_enable_testimonials' );
$section_pre_title = corporate_agency_get_option( 'corporate_agency_testimonials_pre_title' );
$section_main_title = corporate_agency_get_option( 'corporate_agency_testimonials_main_title' );
$testimonial_pages = corporate_agency_get_option( 'corporate_agency_testimonial_pages' );

if( !empty( $testimonial_pages ) && $enable_section == true ) {
	?>
	<section id="section8" class="section-8 section-margine">
  		<div class="container">
    		<div class="row">
      			<div class="col-md-12 col-lg-12">
        			<div class="sec-title text-center wow fadeInUp">
          				<?php
			          	if( !empty( $section_pre_title ) ) {
			            	?>
			            	<span class="tagline"><?php echo esc_html( $section_pre_title ); ?></span>
			            	<?php
			          	}

			          	if( !empty( $section_main_title ) ) {
			            	?>
			            	<h2><?php echo esc_html( $section_main_title ); ?></h2>
			            	<?php
			          	}
				        ?>
          				<span class="double-border"></span>
        			</div>
      			</div>
    		</div>
    		<div class="row">
      			<div class="col-md-12">
        			<div class="testimonial_wrapper">
          				<div class="testimonial_slider wow fadeInUp">
          					<?php
          					foreach( $testimonial_pages as $testimonial_page ) {
          						$testimonial_args = array(
          							'post_type' => 'page',
          							'posts_per_page' => 1,
          							'page_id' => absint( $testimonial_page ),
          						);

          						$testimonial_query = new WP_Query( $testimonial_args );

          						if( $testimonial_query->have_posts() ) {

          							while( $testimonial_query->have_posts() ) {

          								$testimonial_query->the_post();
          								?>
          								<div class="single_testimonial">
          									<?php
          									if( has_post_thumbnail() ) {
          										?>
          										<div class="testmonial_img">
				                					<?php the_post_thumbnail( 'corporate-agency-thubmnail-2', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
				              					</div>
          										<?php
          									}
          									?>
			              					<div class="testimonial_contents">
			                					<div class="name_desig">
			                  						<p class="name"><?php the_title(); ?></p>
			                					</div>
			                					<div class="testimonial_text">
			                  						<?php the_content(); ?>
			                					</div>
			              					</div>
			            				</div>
          								<?php
          							}
          							wp_reset_postdata();
          						}
          					}
          					?>
          				</div>
        			</div>
      			</div>
    		</div>
  		</div>
	</section>
	<?php
}