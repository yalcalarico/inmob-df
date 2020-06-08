<?php
$enable_services_section = corporate_agency_get_option( 'corporate_agency_enable_services' );
$section_pre_title = corporate_agency_get_option( 'corporate_agency_services_pre_title' );
$section_main_title = corporate_agency_get_option( 'corporate_agency_services_main_title' );
$services_pages = corporate_agency_get_option( 'corporate_agency_services_pages' );

if( $enable_services_section == true ) {
  ?>
  <section id="section1" class="section-margine">
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
      </div>
      <div class="row">
        <?php
        if( !empty( $services_pages ) ) {
          foreach( $services_pages as $service ) {
            $service_page = new WP_Query( array(
              'post_type' => 'page',
              'page_id' => absint( $service )
            ) );
            if( $service_page->have_posts() ) {
              while( $service_page->have_posts() ) {
                $service_page->the_post();
                ?>
                <div class="col-md-4 col-lg-4 ">
                  <div class="section-1-box wow bounceIn">
                    <?php
                    if( has_post_thumbnail() ) {
                      ?>
                      <div class="section-1-box-icon-background">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) ); ?>
                      </div>
                      <?php
                    }
                    ?>
                    <h4 class="text-center"><?php the_title(); ?></h4>
                    <?php the_content(); ?>
                  </div>
                </div>
                <?php
              }
              wp_reset_postdata();
            }
          }
        }
        ?>
      </div>
    </div>
  </section>
  <?php
}