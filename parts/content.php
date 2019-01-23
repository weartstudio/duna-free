<?php w_article_meta() ?>

<!-- content -->
  <div class="content l-1 clearfix c-text">
    <?php the_content() ?>
    <div class="link-pages c-meta l-black f-meta clearfix small">
      <?php $defaults = array(
        'next_or_number'   => 'number',
        'pagelink'         => '<span class="bg-black">%</span>',
      ); wp_link_pages( $defaults ); ?>
    </div>
  </div>
<!-- end -->

<!-- tags -->
  <div class="w-tags f-meta l-meta mt-5">
    <?php the_tags('','') ?>
  </div>
<!-- end -->

<!-- pagination -->
  <?php if(get_theme_mod('want_post_pager',1)){ ?>
    <hr class=" mb-0">
    <div class="pagination row">
        <?php $prev_post = get_previous_post(true); ?>
        <?php if (!empty( $prev_post )): ?>
          <div class="col-md-6 mr-auto lh-1 my-4 first">
            <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" title="<?php the_title_attribute(array('post'=>$prev_post->ID)) ?>" class="d-inline-block c-black d-block">

              <div class="row no-gutters align-items-center">
                <div class="col-5"><div class="img lazy c-white" data-src="<?php echo esc_url(get_the_post_thumbnail_url($prev_post->ID, 'medium')) ?>"></div></div>
                <div class="col-7 pl-3"><h3 class="t-sm m-0"><?php echo esc_html(get_the_title($prev_post->ID)) ?></h3></div>
              </div>

            </a>
          </div>
        <?php endif; ?>

        <?php $next_post = get_next_post(true); ?>
        <?php if (!empty( $next_post )): ?>
          <div class="col-md-6 ml-auto lh-1 my-4 second">
            <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" title="<?php the_title_attribute(array('post'=>$next_post->ID)) ?>" class="d-inline-block c-black d-block">
              <div class="row no-gutters align-items-center">
                <div class="col-7 pr-3">
                  <h3 class="t-sm m-0"><?php echo esc_html(get_the_title($next_post->ID)) ?></h3>
                </div>
                <div class="col-5">
                <div class="img lazy c-white" data-src="<?php echo esc_url(get_the_post_thumbnail_url($next_post->ID, 'medium')) ?>"></div>
                </div>
              </div>
            </a>
          </div>
        <?php endif; ?>

    </div>
  <?php } ?>
<!-- end -->

<!-- comment -->
<div id="weart-comments" class="mt-5">
    <?php comments_template( '', true );  ?>
  </div>
<!-- end -->