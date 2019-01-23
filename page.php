<?php get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="section">
  <div class="container">
    <h1 class="t-lg text-center"><?php the_title() ?></h1>
    <hr class="mb-4">
    <div class="row justify-content-center l-1 lh-2 c-text">
      <div class="col-lg-8 content">

        <div class="clearfix"><?php the_content() ?></div>

        <div class="link-pages c-meta l-black f-meta clearfix small">
          <?php $defaults = array(
            'next_or_number'   => 'number',
            'pagelink'         => '<span class="bg-black">%</span>',
          ); wp_link_pages( $defaults ); ?>
        </div>

        <!-- tags -->
          <div class="w-tags f-meta l-meta mt-5">
            <?php the_tags('','') ?>
          </div>
        <!-- end -->

        <!-- comment -->
          <div id="weart-comments" class="mt-5">
            <?php comments_template( '', true );  ?>
          </div>
        <!-- end -->

      </div>
    </div>
  </div>
</div>

<?php endwhile;
endif;
get_footer();