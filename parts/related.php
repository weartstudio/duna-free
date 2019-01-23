<?php if(get_theme_mod('want_related',0)){ ?>
  <div class="related section">
    <?php
    $categories = get_the_category();
    $cat = $categories[0]->slug;
    $the_query = new WP_Query( array(
      'category'=>$cat,
    ));
    ?>
    <div class="container">
      <?php w_section_title(array('title'=>esc_html__('Related posts','duna') )); ?>
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
    </div>

  </div>
<?php } ?>