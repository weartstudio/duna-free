<?php
get_header();
?>

<!-- main slider -->
  <?php
    // the query
    $the_query = new WP_Query( array(
      'tag'=>'slider',
    )); if ( $the_query->have_posts() ) :
  ?>
    <!-- main_slider -->
      <div class="w-minus"></div>
      <div id="featured1" class="carousel slide featured1 section" data-ride="carousel">

        <!-- indicators -->
          <div class="indicators c-white">
            <div class="container">
              <div class="carousel-indicators d-none d-lg-flex border-top">
                <?php $i=1; while ( $the_query->have_posts() ) : $the_query->the_post(); if($i<=4){ ?>
                  <div data-target="#featured1" data-slide-to="<?php echo esc_attr($i-1); ?>" class="col-3 ind <?php if($i<=3){echo 'border-right';} ?>">
                    <div class="progress">
                      <div class="progress-bar bg-1"></div>
                    </div>
                    <div class="p-4">
                      <h3 class="t-sm"><?php the_title() ?></h3>
                      <?php w_meta() ?>
                    </div>
                  </div>
                <?php } $i++; endwhile; ?>
              </div>
            </div>
          </div>
        <!-- end -->

        <!-- item -->
          <div class="carousel-inner">
            <?php $i=1; while ( $the_query->have_posts() ) : $the_query->the_post(); if($i<=4){ ?>
              <div class="carousel-item <?php if($i===1){echo 'active';} ?>">
                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                  <div class="img lazy" data-src="<?php the_post_thumbnail_url('full') ?>"></div>
                  <div class="innertext c-white">
                    <div class="col-lg-6 px-0">
                      <h2 class="t-lg"><?php the_title() ?></h2>
                      <?php w_meta() ?>
                    </div>
                  </div>
                </a>
              </div>
            <?php } $i++; endwhile; ?>
          </div>
        <!-- end -->

        <a class="carousel-control-prev" href="#featured1" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#featured1" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>

      </div>
    <!-- end -->
  <?php wp_reset_postdata(); endif; ?>
<!-- end -->

<!-- featured -->
  <?php
    // the query
      $the_query = new WP_Query( array(
        'tag'=>'featured',
      )); if ( $the_query->have_posts() ) :
    ?>
    <!-- highlight3 -->
      <div class="highlight3 section" id="w-6">
        <div class="container">
          <div class="row">

            <!-- highlighted-large -->
              <div class="col-lg-6 mb-4 mb-lg-0">
                <?php $i=1; while ( $the_query->have_posts() ) : $the_query->the_post();
                if($i===1){ ?>
                  <?php w_article_inner() ?>
                <?php } $i++; endwhile; ?>
              </div>
            <!-- end -->

            <div class="col-lg-6">

              <!-- first row -->
                <div class="row">
                  <?php $i=1; while ( $the_query->have_posts() ) : $the_query->the_post();
                  if($i>1 && $i<=3){ ?>
                    <div class="col-md-6 mb-4">
                      <?php w_article_normal(array('fsize'=>'t-sm','msize'=>'mt-2')) ?>
                    </div>
                  <?php } $i++; endwhile; ?>
                </div>
              <!-- end -->

              <!-- second row, list -->
                <div class="row">
                  <?php $i=1; while ( $the_query->have_posts() ) : $the_query->the_post();
                  if($i>3 && $i<=7){ ?>
                    <div class="col-md-6 mb-4">
                      <?php w_article_list(array('fsize'=>'t-sm','msize'=>'mt-2', 'img'=>0 )) ?>
                    </div>
                  <?php } $i++; endwhile; ?>
                </div>
              <!-- end -->

            </div>

          </div>
        </div>
      </div>
    <!-- end -->
    <?php wp_reset_postdata(); endif; ?>
<!-- end -->

<!-- latest -->
  <div class="latest section">
    <?php get_template_part('parts/latest') ?>
  </div>
<!-- end -->

<?php get_footer();