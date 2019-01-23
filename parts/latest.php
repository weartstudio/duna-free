<div class="container">
  <div class="row">
    <?php $i=1; if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php if($i<=2 && !is_paged()): ?>
        <div class="col-lg-6 mb-5">
          <?php w_article_normal(array('exc'=>1)) ?>
        </div>
      <?php else: ?>
        <div class="col-lg-3 col-md-4 mb-5">
          <?php w_article_normal(array('fsize'=>'t-sm','msize'=>'mt-2')) ?>
        </div>
      <?php endif; ?>
    <?php $i++; endwhile; endif; ?>
  </div>
  <div class="d-flex justify-content-center">
    <?php previous_posts_link() ?>
    <?php next_posts_link() ?>
  </div>
</div>