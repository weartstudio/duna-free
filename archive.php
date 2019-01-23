<?php get_header(); ?>

<div class="latest">

  <?php if(get_theme_mod('want_featured_category',0)): ?>
    <div class="bg-blackk">
      <div class="containerr">
        <div class="row no-gutters">

          <?php $i=1; if ( have_posts() && !is_paged() ) : while ( have_posts() ) : the_post(); ?>
            <?php if($i===1): ?>
              <div class="col-lg-6">
                <?php w_article_inner() ?>
              </div>
            <?php elseif($i<=3 && $i!==0): ?>
              <div class="col-lg-3">
                <?php w_article_inner( array('fsize'=>'t-md')) ?>
              </div>
            <?php endif; ?>
          <?php $i++; endwhile; endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="section">
    <div class="container">
      <?php w_section_title(array( 'title'=> get_the_archive_title() )); ?>
    </div><!-- .container -->
    <?php get_template_part('parts/latest') ?>
  </div><!-- .section -->

</div>

<?php get_footer(); ?>