<?php
/**
 * Template part for displaying results in search pages
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
			the_post_thumbnail( 'corporate-agency-thubmnail-5', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
		}
		?>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
		if( get_post_type() === 'post' ) :
			?>
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<?php corporate_agency_post_author_and_date(); ?>
				</div>
			</div><!-- .row -->
			<?php
		endif;
		?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entru-content -->
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="text-left">
					<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e( 'Read More', 'corporate-agency' ); ?></a>
				</div><!-- .text-left -->
			</div>
		</div><!-- .row -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .section-14-box -->
