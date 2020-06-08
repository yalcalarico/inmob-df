<?php
$enable_banner = corporate_agency_get_option( 'corporate_agency_enable_banner' );
$banner_pages = corporate_agency_get_option( 'corporate_agency_banner_pages' );

if( $enable_banner == true ) :
?>
<section id="slider" class="">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
      <?php
      foreach( $banner_pages as $index => $banner_item ) {
        if( $index == 0 ) {
          ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo esc_html( $index ); ?>" class="active"></li>
          <?php
        } else {
          ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo esc_html( $index ); ?>"></li>
          <?php
        }
      }
      ?>
    </ol>
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
      <?php
      foreach( $banner_pages as $index => $banner_item ) {
        $active_class = '';
        if( $index == 0 ) {
          $active_class = 'active';
        }

        $banner_query = new WP_Query( 
          array(
            'post_type' => 'page',
            'page_id' => absint( $banner_item ),
          ) 
        );

        if( $banner_query->have_posts() ) {
          while( $banner_query->have_posts() ) {
            $banner_query->the_post();
            ?>
            <div class="item <?php echo esc_attr( $active_class ); ?>"> 
              <?php 
              if( has_post_thumbnail() ) {
                ?>
                <img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'corporate-agency-thubmnail-1' ) ); ?>" class="img-responsive" alt="<?php corporate_agency_thumbnail_alt_text( get_the_ID() ); ?>">
                <?php
              }
              ?>
              <div class="carousel-caption">
                <h1 class="wow slideInLeft color-white"><?php the_title(); ?></h1>
                <h3 class="wow slideInRight color-white"><?php the_excerpt(); ?></h3>
                <a href="<?php the_permalink(); ?>" class="btn btn-seconday wow bounceInUp"><?php esc_html_e( 'Know More', 'corporate-agency' ); ?><i class="fa fa-angle-double-right"></i></a></div>
            </div>
            <?php
          }
          wp_reset_postdata();
        }
      }
      ?>
    </div>
    <!-- Carousel controls -->

    <a class="carousel-control left" href="#myCarousel" data-slide="prev"> <span class="carousel-arrow"> <i class="fa fa-angle-left fa-2x"></i></span> </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next"> <span class="carousel-arrow"><i class="fa fa-angle-right fa-2x"></i></span> </a>
  </div>
</section>
<?php
endif;