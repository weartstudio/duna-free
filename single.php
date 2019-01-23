<?php get_header();
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="section mt-0 w-article-wide">
  <div class="container">

    <div class="row justify-content-center">

      <!-- content -->
        <div class="col-lg-8">

        <header class="w-article-header">
          <?php if(has_post_thumbnail()){ ?>
            <div class="featured-img mb-4"><?php the_post_thumbnail() ?></div>
          <?php } ?>

          <div class="text <?php if(has_post_thumbnail()){ echo esc_html('position-absolute'); }?>">
            <div class="row">
              <div class="col-lg-11">
                <?php w_cat_badge() ?>
                <h1 class="f-title t-lg mt-4"><span class="bg-white">
                  <?php the_title() ?>
                </span></h1>
              </div>
            </div>
          </div>

        </header>

        <?php get_template_part('parts/content') ?>

        </div>
      <!-- content -->

      <!-- sidebar -->
        <div class="col-lg-4 sidebar pt-4">
          <?php get_sidebar('article'); ?>
        </div>
      <!-- end -->

    </div>

  </div>


</div>

<?php endwhile; endif; ?>
<?php get_template_part('parts/related') ?>
<?php get_footer() ?>