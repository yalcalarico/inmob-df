<?php
$enable_section = corporate_agency_get_option( 'corporate_agency_enable_projects' );
$section_pre_title = corporate_agency_get_option( 'corporate_agency_projects_pre_title' );
$section_main_title = corporate_agency_get_option( 'corporate_agency_projects_main_title' );
$categories = corporate_agency_get_option( 'corporate_agency_projects_categories' );
$item_no = corporate_agency_get_option( 'corporate_agency_projects_posts_no' );

if( $enable_section == true && !empty( $categories ) ) {
	?>
	<section id="section4" class="section-margine">
	  	<div class="container">
	    	<div class="row">
	      		<div class="sec-title text-center">
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
	      		<div class="col-md-12 col-md-12">
	        		<div class="portfolioFilter text-center"> 
	          			<a href="#" data-filter="*" class="current"><?php esc_html_e( 'All', 'corporate-agency' ); ?></a> 
	          			<?php 
	          			foreach( $categories as $category ) {
	          				?>
	          				<a href="#" data-filter=".<?php echo esc_attr( $category ); ?>"><?php echo esc_html( $category ); ?></a>
	          				<?php
	          			} 
	          			?>
	        		</div>

	        		<div class="portfolioContainer">
	        			<?php
	        			$projects_arg = array(
	        				'post_type' => 'post',
	        			);

	        			if( absint( $item_no ) > 0 ) {
	        				$projects_arg['posts_per_page'] = absint( $item_no );
	        			}

	        			if( !empty( $categories ) ) {
	        				$projects_arg['category_name'] = implode( ',', $categories );
	        			}

	        			$projects_query = new WP_Query( $projects_arg );

	        			if( $projects_query->have_posts() ) {

	        				while( $projects_query->have_posts() ) {

	        					$projects_query->the_post();

	        					if( has_post_thumbnail() ) {

	        						$project_id = get_the_ID();

	        						$project_terms = wp_get_post_terms( $project_id, 'category' );

	        						$project_cat = array();

	        						if( !empty( $project_terms ) ) {

	        							foreach( $project_terms as $project_term ) {

	        								$project_cat[] = $project_term->slug;
	        							}
	        						}
	        						?>
	        						<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 text-center <?php echo esc_attr( implode( ' ', $project_cat ) ); ?>">
	        							<a class="magnific-popup" href="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>">
	        								<?php
	        								the_post_thumbnail( 'corporate-agency-thubmnail-4', array( 'class' => 'img-responsive wow zoomIn', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
	        								?>
	        							</a> 
	        						</div>
	        						<?php
	        					}
	        					?>
	        					<?php
	        				}
	        				wp_reset_postdata();
	        			}
	        			?>
	        		</div>
	      		</div>
	    	</div>
	  	</div>
	</section>
	<?php
}
