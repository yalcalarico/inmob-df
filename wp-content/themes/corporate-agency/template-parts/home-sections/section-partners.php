<?php
$enable_section = corporate_agency_get_option( 'corporate_agency_enable_partners' );
$partner_pages = corporate_agency_get_option( 'corporate_agency_partners_pages' );

if( $enable_section == true && !empty( $partner_pages ) ) {
	?>
	<section id="section9" class="section-margine section-9-background">
  		<div class="container">
    		<div class="row">
    			<?php
    			$break = 0;
    			foreach( $partner_pages as $index => $partner_page ) {

    				if( $break%6 == 0 && $break > 0 ) {
    					?>
    					<div class="row clearfix visible-md visible-lg"></div>
    					<?php
    				}

    				$partner_arg = array(
    					'post_type'	=> 'page',
    					'posts_per_page' => 1,
    					'page_id' => absint( $partner_page ),
    				);

    				$page_query = new WP_Query( $partner_arg );

    				if( $page_query->have_posts() ) {

    					while( $page_query->have_posts() ) {

    						$page_query->the_post();

    						if( has_post_thumbnail() ) {
    							?>
    							<div class="col-md-2 col-lg-2">
    								<?php the_post_thumbnail( 'corporate-agency-thubmnail-4', array( 'class' => 'img-responsive wow tada', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
    							</div>
    							<?php
    							$break++;
    						} 
    					}
    					wp_reset_postdata();
    				}
    			}
    			?>
    		</div>
  		</div>
	</section>
	<?php
}
