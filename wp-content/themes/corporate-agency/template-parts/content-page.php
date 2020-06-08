<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Corporate_Agency
 */

?>

<div class="section-14-box">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  		<?php 
        if( has_post_thumbnail() ) {
          the_post_thumbnail( 'full', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
        }
        ?>
		<h3><?php the_title(); ?></h3>
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<?php corporate_agency_post_author_and_date(); ?>
			</div>
		</div>
        <div class="entry-content">
          	<?php
            the_content( sprintf(
              	wp_kses(
                	/* translators: %s: Name of current post. Only visible to screen readers */
                	__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'corporate-agency' ),
                	array(
                  		'span' => array(
                    		'class' => array(),
                  		),
                	)
              	),
              	get_the_title()
            ) );

            wp_link_pages( array(
              	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corporate-agency' ),
              	'after'  => '</div>',
            ) );          
          	

      			edit_post_link(
      				sprintf(
      					wp_kses(
      						/* translators: %s: Name of current post. Only visible to screen readers */
      						__( 'Edit <span class="screen-reader-text">%s</span>', 'corporate-agency' ),
      						array(
      							'span' => array(
      								'class' => array(),
      							),
      						)
      					),
      					get_the_title()
      				),
      				'<span class="edit-link">',
      				'</span>'
      			);
			     ?>
        </div><!-- .entry-content -->
    </article>
</div>