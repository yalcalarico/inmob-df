<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Agency
 */

		if( is_active_sidebar( 'footer' ) ) {
			?>
			<section id="footer-top" class="footer-top">
			  	<div class="container">
			    	<div class="row">
			      		<?php dynamic_sidebar( 'footer' ); ?>
			      	</div>
			  	</div>
			</section>
			<?php
		}
		?>
		

		<section id="footer-bottom" class="footer-bottom">
		  	<div class="container">
		    	<div class="row">
		      		<div class="col-md-9 col-lg-9">
		        		<div class="copyright">
		        			<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>">
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( 'Proudly powered by %s', 'corporate-agency' ), 'WordPress' );
								?>
							</a>
							<span class="sep"> | </span>
								<?php
								/* translators: 1: Theme name, 2: Theme author. */
								printf( esc_html__( 'Theme: %1$s by %2$s.', 'corporate-agency' ), 'Corporate Agency', '<a href="'. esc_url( "https://themewidget.com/" ) . '">'. esc_html__( "Theme Widget", "corporate-agency" ) . '</a>' );
								?>
						</div>
		      		</div>
		      		<?php 
		      		$enable_footer_social_links = corporate_agency_get_option( 'corporate_agency_enable_footer_social_links' );
		      		if( $enable_footer_social_links == true ) {
		      			?>
			      		<div class="col-lg-3">
			        		<ul class="list-inline social-buttons">
			          			<?php
		          				$facebook_link = corporate_agency_get_option( 'corporate_agency_facebook_link' );
		          				if( !empty( $facebook_link ) ) {
		          					?>
		          					<li>
			            				<a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"><i class="fa fa-facebook"></i></a> 
			            			</li>
		          					<?php
		          				}

		          				$twitter_link = corporate_agency_get_option( 'corporate_agency_twitter_link' );
		          				if( !empty( $twitter_link ) ) {
		          					?>
		          					<li> 
			            				<a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"><i class="fa fa-twitter"></i></a> 
			            			</li>
		          					<?php
		          				}

		          				$google_plus_link = corporate_agency_get_option( 'corporate_agency_google_plus_link' );
		          				if( !empty( $google_plus_link ) ) {
		          					?>
		          					<li> 
			            				<a href="<?php echo esc_url( $google_plus_link ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a> 
			            			</li>
		          					<?php
		          				}

		          				$pinterest_link = corporate_agency_get_option( 'corporate_agency_pinterest_link' );
		          				if( !empty( $pinterest_link ) ) {
		          					?>
		          					<li> 
			            				<a href="<?php echo esc_url( $pinterest_link ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a> 
			            			</li>
		          					<?php
		          				}

		          				$dribble_link = corporate_agency_get_option( 'corporate_agency_dribble_link' );
		          				if( !empty( $dribble_link ) ) {
		          					?>
		          					<li> 
			            				<a href="<?php echo esc_url( $dribble_link ); ?>" target="_blank"><i class="fa fa-dribbble"></i></a> 
			            			</li>
		          					<?php
		          				}

		          				$linkedin_link = corporate_agency_get_option( 'corporate_agency_linkedin_link' );
		          				if( !empty( $linkedin_link ) ) {
		          					?>
		          					<li> 
			            				<a href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a> 
			            			</li>
		          					<?php
		          				}
		          				?>
			        		</ul>
			      		</div>
			      		<?php
		      		}
		      		?>
		    	</div>
		  	</div>
		</section>

	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
