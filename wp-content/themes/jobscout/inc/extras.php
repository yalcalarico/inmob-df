<?php
/**
 * JobScout Standalone Functions.
 *
 * @package JobScout
 */

if ( ! function_exists( 'jobscout_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function jobscout_posted_on( $single = false ) {
	$ed_updated_post_date = get_theme_mod( 'ed_post_update_date', true );
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		if( $ed_updated_post_date ){
            $time_string = '<time class="entry-date published updated" datetime="%3$s" itemprop="dateModified">%4$s</time><time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';		  
		}else{
            $time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';  
		}        
	}else{
	   $time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';   
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

    $time_svg = '';
    if( $single ){
        $time_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><defs><style>.ca{opacity:0.6;}</style></defs><path class="ca" d="M14.6,1.5H12.461V.5a.5.5,0,1,0-1,0v1H8.474V.5a.5.5,0,1,0-1,0v1H4.486V.5a.472.472,0,0,0-.5-.5.472.472,0,0,0-.5.5v1H1.346A1.342,1.342,0,0,0,0,2.85V14.7A1.332,1.332,0,0,0,1.346,16H14.654A1.342,1.342,0,0,0,16,14.65V2.85A1.419,1.419,0,0,0,14.6,1.5Zm.349,13.15A.341.341,0,0,1,14.6,15H1.346A.341.341,0,0,1,1,14.65V2.85a.341.341,0,0,1,.349-.35H3.489v1a.472.472,0,0,0,.5.5.472.472,0,0,0,.5-.5v-1H7.477v1a.5.5,0,1,0,1,0v-1h2.991v1a.5.5,0,1,0,1,0v-1H14.6a.341.341,0,0,1,.349.35ZM3.489,6H5.483V7.5H3.489Zm0,2.5H5.483V10H3.489Zm0,2.5H5.483v1.5H3.489Zm3.489,0H8.972v1.5H6.978Zm0-2.5H8.972V10H6.978Zm0-2.5H8.972V7.5H6.978Zm3.489,5h1.994v1.5H10.467Zm0-2.5h1.994V10H10.467Zm0-2.5h1.994V7.5H10.467Z"/></svg>';
    }
    
    $posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'. $time_svg .'<time class="updated published">' . $time_string . '</time></a>';
	
	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'jobscout_posted_by' ) ) :
/**
 * Prints HTML with meta information for the current author.
 */
function jobscout_posted_by() {
	$byline = sprintf( '<span itemprop="name"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" itemprop="url">' . esc_html( get_the_author() ) . '</a></span>' 
    );
	echo '<span class="byline" itemprop="author" itemscope itemtype="https://schema.org/Person">' . $byline . '</span>';
}
endif;

if( ! function_exists( 'jobscout_comment_count' ) ) :
/**
 * Comment Count
*/
function jobscout_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comment-box"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17.943 15.465"><defs><style>.co{fill:none;stroke:#000;stroke-width:1.3px;opacity:0.6;}</style></defs><path class="co" d="M15.425,11.636H12.584v2.03L9.2,11.636H1.218A1.213,1.213,0,0,1,0,10.419v-9.2A1.213,1.213,0,0,1,1.218,0H15.425a1.213,1.213,0,0,1,1.218,1.218v9.2A1.213,1.213,0,0,1,15.425,11.636Z" transform="translate(0.65 0.65)"/></svg>';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'jobscout' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}    
}
endif;

if ( ! function_exists( 'jobscout_category' ) ) :
/**
 * Prints categories
 */
function jobscout_category(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'jobscout' ) );
		if ( $categories_list ) {
            if( is_single() ) echo '<div class="entry-meta">';
            echo '<span class="category" itemprop="about">' . $categories_list . '</span>';
            if( is_single() ) echo '</div>';
		}
	}
}
endif;

if ( ! function_exists( 'jobscout_tag' ) ) :
/**
 * Prints tags
 */
function jobscout_tag(){
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'jobscout' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<div class="tags" itemprop="about">' . esc_html__( '%1$sTags:%2$s %3$s', 'jobscout' ) . '</div>', '<span>', '</span>', $tags_list );
		}
	}
}
endif;

if( ! function_exists( 'jobscout_site_branding' ) ) :
/**
 * Site Branding
*/
function jobscout_site_branding(){ 
    $site_title          = get_bloginfo( 'name', 'display' );
    $description         = get_bloginfo( 'description', 'display' );
    if( ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) && ( ! empty( $site_title ) || ! empty(  $description  ) ) ){
       $branding_class = ' logo-text';                                                                                                                          
    } else {
        $branding_class = '';
    }
    ?>
    <div class="site-branding<?php echo esc_attr( $branding_class ); ?>" itemscope itemtype="http://schema.org/Organization"> <!-- logo-text -->
        <?php 
            if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                echo '<div class="site-logo">';
                the_custom_logo();
                echo '</div>';
            } 

            echo '<div class="site-title-wrap">';
            if( is_front_page() ){ ?>
                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                <?php 
            }else{ ?>
                <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
            <?php
            }

            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ){ ?>
                <p class="site-description" itemprop="description"><?php echo $description; ?></p>
            <?php

            }
            echo '</div><!-- .site-title-wrap -->'
        ?>
    </div>
    <?php
}
endif;

if( ! function_exists( 'jobscout_primary_nagivation' ) ) :
/**
 * Primary Navigation.
*/
function jobscout_primary_nagivation( $responsive_menu = false ){ 

    $post_job_label  = get_theme_mod( 'post_job_label', __( 'Post Jobs', 'jobscout' ) );
    $post_job_url    = get_theme_mod( 'post_job_url', '#' );
    $schema_class = '';
    if( ! $responsive_menu ){
       $schema_class = ' itemscope itemtype="http://schema.org/SiteNavigationElement"';
    }
    ?>
    	<nav id="site-navigation" class="main-navigation" role="navigation"<?php echo $schema_class; ?>>
            <?php if( ! $responsive_menu ) : ?>
                <button class="toggle-btn">
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                    <span class="toggle-bar"></span>
                </button>
    		<?php
                endif;
    			wp_nav_menu( array(
    				'theme_location' => 'primary',
    				'menu_id'        => 'primary-menu',
                    'menu_class'     => 'nav-menu',
                    'container'      => false,
                    'fallback_cb'    => 'jobscout_primary_menu_fallback',
    			) );
    		?>
    	</nav><!-- #site-navigation -->
        <?php if( $post_job_label || $post_job_url ){ ?>
            <div class="btn-wrap">
                <a class="btn" href="<?php echo esc_url( $post_job_url ) ?>"><?php echo esc_html( $post_job_label ) ?></a>
            </div>
        <?php } 
  
    
}
endif;

if( ! function_exists( 'jobscout_primary_menu_fallback' ) ) :
/**
 * Fallback for primary menu
*/
function jobscout_primary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="primary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'jobscout' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'jobscout_secondary_navigation' ) ) :
/**
 * Secondary Navigation
*/
function jobscout_secondary_navigation(){ ?>
	<nav class="secondary-nav">
		<?php
			wp_nav_menu( array(
				'theme_location' => 'secondary',
                'menu_class'     => 'nav-menu',
				'menu_id'        => 'secondary-menu',
                'fallback_cb'    => 'jobscout_secondary_menu_fallback',
			) );
		?>
	</nav>
    <?php
}
endif;

if( ! function_exists( 'jobscout_secondary_menu_fallback' ) ) :
/**
 * Fallback for secondary menu
*/
function jobscout_secondary_menu_fallback(){
    if( current_user_can( 'manage_options' ) ){
        echo '<ul id="secondary-menu" class="menu">';
        echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Click here to add a menu', 'jobscout' ) . '</a></li>';
        echo '</ul>';
    }
}
endif;

if( ! function_exists( 'jobscout_theme_comment' ) ) :
/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function jobscout_theme_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	
    <?php if ( 'div' != $args['style'] ) : ?>
    <article id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
    	
        <footer class="comment-meta">
            <div class="comment-author vcard">
        	   <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
               <?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s<span class="says">says:</span></b>', 'jobscout' ), get_comment_author_link() ); ?>
        	</div><!-- .comment-author vcard -->
            <div class="comment-metadata commentmetadata">
                <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>">
                    <time itemprop="commentTime" datetime="<?php echo esc_attr( get_gmt_from_date( get_comment_date() . get_comment_time(), 'Y-m-d H:i:s' ) ); ?>"><?php printf( esc_html__( '%1$s at %2$s', 'jobscout' ), get_comment_date(),  get_comment_time() ); ?></time>
                </a>
            </div>
            <?php if ( $comment->comment_approved == '0' ) : ?>
        		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'jobscout' ); ?></em>
        		<br />
        	<?php endif; ?>
        </footer>
        <div class="comment-content" itemprop="commentText"><?php comment_text(); ?></div>        
        <div class="reply">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>       
	<?php if ( 'div' != $args['style'] ) : ?>
    </article><!-- .comment-body -->
	<?php endif; ?>
    
<?php
}
endif;

if( ! function_exists( 'jobscout_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages/posts
*/
function jobscout_sidebar_layout( $class = false ){
    global $post;
    $return      = false;

    $page_layout    = get_theme_mod( 'page_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Pages
    $post_layout    = get_theme_mod( 'post_sidebar_layout', 'right-sidebar' ); //Default Layout Style for Posts
    $general_layout = get_theme_mod( 'layout_style', 'right-sidebar' ); //Default Layout

    $show_on_front  = get_option( 'show_on_front' );
    $blogpage_id    = get_option( 'page_for_posts' );
    $frontpage_id   = get_option( 'page_on_front' );
    $home_sections  = jobscout_get_home_sections();
    
    if( is_front_page() && ! is_home() ){
        if( $home_sections ){
            $return = $class ? '' : false;
        }else{
            $frontpage_layout = get_post_meta( $frontpage_id, '_jobscout_sidebar_layout', true );
            $frontpage_layout = ! empty( $frontpage_layout ) ? $frontpage_layout : 'default-sidebar';

            if( $frontpage_layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false;
            }elseif( ( $frontpage_layout == 'default-sidebar' && $general_layout == 'right-sidebar' ) || ( $frontpage_layout == 'right-sidebar' ) ){
                $return = $class ? 'rightsidebar' : 'sidebar';
            }elseif( ( $frontpage_layout == 'default-sidebar' && $general_layout == 'left-sidebar' ) || ( $frontpage_layout == 'left-sidebar' ) ){
                $return = $class ? 'leftsidebar' : 'sidebar';
            }elseif( $frontpage_layout == 'default-sidebar' && $general_layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false;
            }
        }
    }elseif( is_home() ){
        if( 'pag e' == $show_on_front && $blogpage_id > 0 ){
            $blogpage_layout = get_post_meta( $blogpage_id, '_jobscout_sidebar_layout', true );
            $blogpage_layout = ! empty( $blogpage_layout ) ? $blogpage_layout : 'default-sidebar';

            if( $blogpage_layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false;
            }elseif( ( $blogpage_layout == 'default-sidebar' && $general_layout == 'right-sidebar' ) || ( $blogpage_layout == 'right-sidebar' ) ){
                $return = $class ? 'rightsidebar' : 'sidebar';
            }elseif( ( $blogpage_layout == 'default-sidebar' && $general_layout == 'left-sidebar' ) || ( $blogpage_layout == 'left-sidebar' ) ){
                $return = $class ? 'leftsidebar' : 'sidebar';
            }elseif( $blogpage_layout == 'default-sidebar' && $general_layout == 'no-sidebar' ){
                $return = $class ? 'full-width' : false;
            }

        }elseif( is_active_sidebar( 'sidebar' ) ){            
            if( $general_layout == 'right-sidebar' ){
                $return = $class ? 'rightsidebar' : 'sidebar';
            }elseif( $general_layout == 'left-sidebar' ){
                $return = $class ? 'leftsidebar' : 'sidebar';
            }else{
                $return = $class ? 'full-width' : false;
            }
        }else{
            $return = $class ? 'full-width' : false;
        }        
    }elseif( is_singular( array( 'page', 'post','job_listing' ) ) ){   
        $sidebar_layout = get_post_meta( $post->ID, '_jobscout_sidebar_layout', true );
        $sidebar_layout = ! empty( $sidebar_layout ) ? $sidebar_layout : 'default-sidebar';
        
        if( is_page() ){
            if( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $page_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }elseif( $sidebar_layout == 'default-sidebar' && $page_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }elseif( is_single() ){
            if( get_post_type() === 'job_listing' ){
                 $return = $class ? 'full-width' : false;
            }elseif( is_active_sidebar( 'sidebar' ) ){
                if( $sidebar_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                    $return = $class ? 'rightsidebar' : 'sidebar';
                }elseif( ( $sidebar_layout == 'default-sidebar' && $post_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                    $return = $class ? 'leftsidebar' : 'sidebar';
                }elseif( $sidebar_layout == 'default-sidebar' && $post_layout == 'no-sidebar' ){
                    $return = $class ? 'full-width' : false;
                }
            }else{
                $return = $class ? 'full-width' : false;
            }
        }
    }elseif( is_tax( 'rara_portfolio_categories' ) ){
        if( is_active_sidebar( 'sidebar' ) ){
            if( 'right-sidebar' == $general_layout ){
                $return = $class ? 'rightsidebar' : 'sidebar'; 
            }elseif( 'left-sidebar' == $general_layout ){
                $return = $class ? 'leftsidebar' : 'sidebar'; 
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }                                                       
    }elseif( is_singular( 'rara-portfolio' ) ){
        $return = $class ? 'full-width' : false;
    }elseif( is_woocommerce_activated() && is_post_type_archive( 'product' ) ){
        if( is_active_sidebar( 'shop-sidebar' ) ){            
            $return = $class ? 'rightsidebar' : 'sidebar';             
        }else{
            $return = $class ? 'full-width' : false;
        } 
    }elseif( is_404() ){
        $return = $class ? 'full-width' : false;
    }else{
        if( is_active_sidebar( 'sidebar' ) ){
            if( 'right-sidebar' == $general_layout ){
                $return = $class ? 'rightsidebar' : 'sidebar'; 
            }elseif( 'left-sidebar' == $general_layout ){
                $return = $class ? 'leftsidebar' : 'sidebar'; 
            }else{
                $return = $class ? 'full-width' : false; //Fullwidth
            }
        }else{
            $return = $class ? 'full-width' : false; //Fullwidth
        }         
    }

    return $return; 
}
endif;

if( ! function_exists( 'jobscout_fonts_url' ) ) :
    /**
     * Register custom fonts.
     */
    function jobscout_fonts_url() {
        $fonts_url = '';

        /* Translators: If there are characters in your language that are not
        * supported by respective fonts, translate this to 'off'. Do not translate
        * into your own language.
        */

        $nunito_font       = _x( 'on', 'Nunito Sans: on or off', 'jobscout' );

        if ( 'off' !== $nunito_font ) {
            $font_families = array();

            $font_families[] = 'Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';

            $query_args = array(
                'family' => implode( '|', $font_families ),
                'subset' => 'latin,latin-ext',
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return esc_url_raw( $fonts_url );
    }
endif;

if( ! function_exists( 'jobscout_get_home_sections' ) ) :
/**
 * Returns Home Sections 
*/
function jobscout_get_home_sections(){
    
    $ed_banner = get_theme_mod( 'ed_banner_section', true );
    $sections = array( 
        'jobposting'  => array( 'section' => 'jobposting' ),
        'cta'         => array( 'sidebar' => 'cta' ),
        'blog'        => array( 'section' => 'blog' ), 
        'testimonial' => array( 'sidebar' => 'testimonial' ),
        'client'      => array( 'sidebar' => 'client' ),
    );
    
    $enabled_section = array();
    if( $ed_banner ) array_push( $enabled_section, 'banner' );
    
    foreach( $sections as $k => $v ){
        if( array_key_exists( 'sidebar', $v ) ){
            if( is_active_sidebar( $v['sidebar'] ) ) array_push( $enabled_section, $v['sidebar'] );
        }else{
            if( get_theme_mod( 'ed_' . $v['section'] . '_section', true ) ) array_push( $enabled_section, $v['section'] );
        }
    }  
    return apply_filters( 'jobscout_home_sections', $enabled_section );
}
endif;        

if( ! function_exists( 'jobscout_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function jobscout_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'jobscout_fallback_svg_image' ) ) :
/**
 * Prints Fallback Images
*/
function jobscout_fallback_svg_image( $post_thumbnail ){
    if( ! $post_thumbnail ){
       return;
   }
   $image_size = jobscout_get_image_sizes( $post_thumbnail );
   if( $image_size ){ ?>
       <div class="svg-holder">
            <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                   <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#f0f0f0;"></rect>
           </svg>
       </div>
       <?php
   }
}
endif;

/**
 * Is BlossomThemes Email Newsletters active or not
*/
function is_btnw_activated(){
    return class_exists( 'Blossomthemes_Email_Newsletter' ) ? true : false;        
}

/**
 * Query WooCommerce activation
 */
function is_woocommerce_activated() {
	return class_exists( 'woocommerce' ) ? true : false;
}

/**
 * Query Jetpack activation
*/
function is_jetpack_activated( $gallery = false ){
	if( $gallery ){
        return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) ? true : false;
	}else{
        return class_exists( 'jetpack' ) ? true : false;
    }           
}

/**
 * Query WP Job Manager activation
 */
function is_wp_job_manager_activated() {
    return class_exists( 'WP_Job_Manager' ) ? true : false;
}

/**
 * Query WPJM Extra Fields activation
*/
function is_wpjm_extra_field_activated( ){
    return function_exists( 'gma_wpjmef_display_job_salary_data' ) ? true : false;
}

/**
 * Query Rara theme companion activation
 */
function is_rara_theme_companion_activated() {
    return class_exists( 'Raratheme_Companion_Public' ) ? true : false;
}

if( ! function_exists( 'jobscout_posts_per_page_count' ) ):
/**
*   Counts the Number of total posts in Archive, Search and Author
*/
function jobscout_posts_per_page_count(){
    global $wp_query;
    if( is_archive() || is_search() && $wp_query->found_posts > 0 ) {
            $posts_per_page = get_option( 'posts_per_page' );
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
            $start_post_number = 0;
            $end_post_number   = 0;

            if( $wp_query->found_posts > 0 && !( is_woocommerce_activated() && is_shop() ) ):                
                $start_post_number = 1;
                if( $wp_query->found_posts < $posts_per_page  ) {
                    $end_post_number = $wp_query->found_posts;
                }else{
                    $end_post_number = $posts_per_page;
                }

                if( $paged > 1 ){
                    $start_post_number = $posts_per_page * ( $paged - 1 ) + 1;
                    if( $wp_query->found_posts < ( $posts_per_page * $paged )  ) {
                        $end_post_number = $wp_query->found_posts;
                    }else{
                        $end_post_number = $paged * $posts_per_page;
                    }
                }

                printf( esc_html__( '%1$s Showing:  %2$s - %3$s of %4$s Items %5$s', 'jobscout' ), '<span class="showing-result">', absint( $start_post_number ), absint( $end_post_number ), esc_html( number_format_i18n( $wp_query->found_posts ) ), '</span>' );
            endif;
    }
}
endif;

if( ! function_exists( 'jobscout_get_image_sizes' ) ) :
/**
* Get information about available image sizes
*/
function jobscout_get_image_sizes( $size = '' ) {

   global $_wp_additional_image_sizes;

   $sizes = array();
   $get_intermediate_image_sizes = get_intermediate_image_sizes();

   // Create the full array with sizes and crop info
   foreach( $get_intermediate_image_sizes as $_size ) {
       if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
           $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
           $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
           $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
       } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
           $sizes[ $_size ] = array(
               'width' => $_wp_additional_image_sizes[ $_size ]['width'],
               'height' => $_wp_additional_image_sizes[ $_size ]['height'],
               'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
           );
       }
   }
   // Get only 1 size if found
   if ( $size ) {
       if( isset( $sizes[ $size ] ) ) {
           return $sizes[ $size ];
       } else {
           return false;
       }
   }
   return $sizes;
}
endif;

if( ! function_exists( 'wp_body_open' ) ) :
/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
*/
function wp_body_open() {
	/**
	 * Triggered after the opening <body> tag.
    */
	do_action( 'wp_body_open' );
}
endif;