<?php
$enable_section = corporate_agency_get_option( 'corporate_agency_enable_blog' );
$section_pre_title = corporate_agency_get_option( 'corporate_agency_blog_pre_title' );
$section_main_title = corporate_agency_get_option( 'corporate_agency_blog_main_title' );
$blog_categories = corporate_agency_get_option( 'corporate_agency_blog_categories' );
$blog_post_no = corporate_agency_get_option( 'corporate_agency_blog_posts_no' );

$blog_args = array(
	'post_type' => 'post',
);

if( !empty( $blog_categories ) ) {
	$blog_args['category_name'] = implode( ',', $blog_categories );
}

if( absint( $blog_post_no ) > 0 ) {
	$blog_args['posts_per_page'] = absint( $blog_post_no );
}

$blog_query = new WP_Query( $blog_args );

if( $blog_query->have_posts() && $enable_section == true ) {
	?>
	<section id="section14" class="section-margine">
  		<div class="container">
    		<div class="row">
      			<div class="col-md-12 col-lg-12">
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
      			</div>
    		</div>

    		<div class="row">
    			<?php
    			$break = 0;
    			while( $blog_query->have_posts() ) {

    				$blog_query->the_post();

    				if( $break%3 == 0 && $break > 0 ) {
    					?>
    					<div class="row clearfix visible-md visible-lg"></div>
    					<?php
    				}
    				?>
    				<div class="col-md-4 col-lg-4">
	        			<div class="section-14-box wow fadeInUp">
	        				<?php
	        				if( has_post_thumbnail() ) {
	        					the_post_thumbnail( 'corporate-agency-thubmnail-4', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
	        				}
	        				?>
	          				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	          				<div class="row">
	            				<div class="col-md-12 col-lg-12">
	              					<div class="text-left comments">
	              						<i class="fa fa-user"></i>
	              						<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
	              							<?php echo esc_html( get_the_author() ); ?>
	              						</a>
	              					</div>
	              					<div class="date">
	              						<span><i class="fa fa-calendar"></i> <?php echo esc_html( get_the_date() ); ?></span>
	              					</div>
	            				</div>
	          				</div>
	          				<?php the_excerpt(); ?>
	          				<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e( 'Read More', 'corporate-agency' ); ?> <i class="fa fa-angle-double-right"></i></a>
	        			</div>
	      			</div>
    				<?php
    				$break++;
    			}
    			wp_reset_postdata();
    			?>
    		</div>
  		</div>
	</section>
	<?php
}
