<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Corporate_Agency
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'corporate-agency' ); ?></a>

		<header id="header" class="head">
			<?php
			$show_top_header = corporate_agency_get_option( 'corporate_agency_enable_top_header' );
			if( $show_top_header == true ) {
				?>
				<div class="top-header">
			    	<div class="container">
			      		<div class="row ">
			        		<ul class="contact-detail2 col-sm-6 pull-left">
			        			<?php
			        			$telephone_no = corporate_agency_get_option( 'corporate_agency_telephone_no' );
			        			if( !empty( $telephone_no ) ) {
			        				?>
			        				<li><a href="#" target="_blank"><i class="fa fa-mobile"></i><?php echo esc_html( $telephone_no ); ?></a></li>
			        				<?php
			        			}

			        			$email = corporate_agency_get_option( 'corporate_agency_email' );
			        			if( !empty( $email ) ) {
			        				?>
			        				<li><a href="#" target="_blank"><i class="fa fa-envelope-o"></i><?php echo esc_html( $email ); ?></a></li>
			        				<?php
			        			}
			        			?>
			        		</ul>
			        		<div class="social-links col-sm-6 pull-right">
			          			<ul class="social-icons pull-right">
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
			      		</div>
			    	</div>
			  	</div>
				<?php
			}
			?>

		  	<nav class="navbar navbar-default navbar-1">
		    	<div class="container">
		      		<div class="navbar-header">
		        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			          		<span class="sr-only"><?php esc_html_e( 'Toggle navigation', 'corporate-agency' ); ?></span>
			          		<span class="icon-bar"></span>
			          		<span class="icon-bar"></span>
			          		<span class="icon-bar"></span>
		       			</button>
		       			<?php
		       			if( has_custom_logo() ) {
		       				the_custom_logo();
		       			} else {
		       				?>
		       				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				           		<h1 class="site-title"><em><?php bloginfo( 'name' ); ?></em></h1>
				           		<?php
								$corporate_agency_description = get_bloginfo( 'description', 'display' );
								if ( $corporate_agency_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $corporate_agency_description ); /* WPCS: xss ok. */ ?></p>
								<?php endif; ?>
				        	</a>
		       				<?php
		       			}
		       			?>
		      		</div>
	      			<?php
			        wp_nav_menu( array (
			            'theme_location'    => 'menu-1',
			            'depth'             => 3,
			            'container'         => 'div',
			            'container_class'   => 'collapse navbar-collapse',
			            'container_id'      => 'bs-example-navbar-collapse-1',
			            'menu_class'        => 'nav navbar-nav navbar-right',
			            'fallback_cb'       => 'Corporate_Agency_Bootstrap_Navwalker::fallback',
			            'walker'            => new Corporate_Agency_Bootstrap_Navwalker(),
			        ) );
					?>
		    	</div>
		  	</nav>
		</header>
