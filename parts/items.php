<?php

function w_noposts(){
  ?>
    <div class="container">
      <div class="alert alert-danger" role="alert">
        <?php esc_html_e('No posts maches the criteria!','duna') ?>
      </div>
    </div>
  <?php
}

function w_meta(){
  ?>
  <div class="w-meta c-meta l-meta">
    <!-- author -->
      <?php if(get_theme_mod('want_author',1)){ ?>
        <span class="writer"><?php esc_html_e('by ','duna'); the_author(); ?></span>
      <?php } ?>
    <!-- end -->

    <!-- date -->
      <span class="date">
        <time itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>
        <meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
      </span>
    <!-- end -->
  </div>
  <?php
}

function w_section_title( $args = array() ){
  $title = !isset($args['title'])? '' : $args['title'];
  $tag = !isset($args['tag'])? '' : $args['tag'];
  $category = !isset($args['category'])? '' : $args['category'];
  if($title!==''){
  ?>
  <div class="w_section_title border-bottom text-uppercase mb-4">
    <h4 class="f-meta t-sm title"><?php echo esc_attr($title); ?></h4>
  </div>
  <?php
  }
}

function w_cat_badge(){
  ?>
  <div class="w-cat-badge f-meta l-white c-white">
    <div class="bg-1">
      <?php the_category(', ') ?>
    </div>
  </div>
  <?php
}

function w_ads(){
  ?>
  <div class="ads my-4">
    <img src="http://via.placeholder.com/1140x90/eee/fff/?text=Advertise">
  </div>
  <?php
}

function w_article_normal($args = array() ){
  $img = !isset($args['img'])? 1 : $args['img'];
  $meta = !isset($args['meta'])? 1 : $args['meta'];
  $exc = !isset($args['exc'])? 0 : $args['exc'];
  $fsize = !isset($args['fsize'])? 't-md' : $args['fsize'];
  $msize = !isset($args['msize'])? 'my-3' : $args['msize'];
  $imgsize = !isset($args['imgsize'])? 'weart-grid' : $args['imgsize'];
  ?>
  <div <?php post_class('w_article_normal') ?>>

    <?php if($img && has_post_thumbnail()){ ?>
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
        <div class="zoom">
          <div class="featured-img lazy img" data-src="<?php the_post_thumbnail_url($imgsize) ?>"></div>
        </div>
      </a>
    <?php } ?>
    <div class="<?php if($img && has_post_thumbnail()){ echo esc_html('margin-top'); } ?>">

      <div class="mb-4"><?php w_cat_badge() ?></div>

      <h2 class="title l-black lh-1 <?php echo esc_attr($fsize) ?>"><a href="#">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
          <span class="bg-white"><?php the_title() ?></span>
        </a>
      </h2>

      <?php if($meta): ?><div class="<?php echo esc_attr($msize); ?>"><?php w_meta() ?></div><?php endif; ?>

      <?php if($exc){ ?>
        <?php the_excerpt(); ?>
      <?php } ?>

    </div>

  </div>
  <?php
}

function w_article_list($args = array() ){
  $meta = !isset($args['meta'])? 1 : $args['meta'];
  $exc = !isset($args['exc'])? 0 : $args['exc'];
  $msize = !isset($args['msize'])? 'my-0' : $args['msize'];
  $fsize = !isset($args['fsize'])? 't-sm' : $args['fsize'];
  ?>
  <div <?php post_class('w_article_list') ?>>

    <?php w_cat_badge() ?>

    <h2 class="mb-0 py-2 l-black lh-1 <?php echo esc_attr( $fsize ); ?>">
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
        <?php the_title() ?>
      </a>
    </h2>

    <?php if($meta): ?><div class="<?php echo esc_attr($msize); ?>"><?php w_meta() ?></div><?php endif; ?>

    <?php if($exc){ ?>
      <?php the_excerpt(); ?>
    <?php } ?>

  </div>
  <?php
}

function w_article_listIMG($args = array() ){
  ?>
    <div class="c-white l-white"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
      <div <?php post_class('row align-items-center w_article_listIMG') ?>>
        <div class="col">
          <h3 class="t-sm"><?php the_title() ?></h3>
        </div>
        <?php if(has_post_thumbnail()): ?>
          <div class="col-4">
            <div class="zoom">
              <div class="img lazy" data-src="<?php the_post_thumbnail_url('weart-list') ?>"></div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </a></div>
  <?php
}

function w_article_inner($args = array() ){
  $fsize = !isset($args['fsize'])? 't-lg' : $args['fsize'];
  ?>
  <div <?php post_class('w_article_inner') ?>>

    <?php if(has_post_thumbnail()){ ?>
      <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
        <div class="zoom">
          <div class="img lazy" data-src="<?php the_post_thumbnail_url('weart-grid') ?>"></div>
        </div>
      </a>
    <?php } ?>
    <div class="innertext c-white l-white">
      <?php w_cat_badge() ?>
      <h2 class="<?php echo esc_attr($fsize) ?> title my-4">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
          <?php the_title() ?>
        </a>
      </h2>
      <?php w_meta() ?>
    </div>

  </div>
  <?php
}

function w_article_meta(){
  ?>
  <div class="w-article-meta mb-4 f-meta border-top border-bottom py-3">

    <div class="d-flex align-items-center text-uppercase">
      <?php if(get_theme_mod('want_author',1)){ ?>
        <img src="<?php echo esc_html(get_avatar_url(get_the_author_meta('user_email'), array('size' => 35))); ?>" class="rounded-circle m-0" alt="<?php the_author() ?>" />
      <?php } ?>
      <div class="l-1 lh-1  f-cat pl-2 c-meta ">

        <?php if(get_theme_mod('want_author',1)){ ?>
          <span class="author" itemprop="author" itemscope itemtype="https://schema.org/Person">
            <span class="text-lowercase"><?php echo esc_html_e('by', 'duna'); ?></span>
            <span itemprop="name"><?php the_author_posts_link(); ?></span>
          </span>
        <?php } ?>

        <span class="commentnum text-lowercase">
        <?php echo esc_html_e('/ ', 'duna'); ?>
          <?php comments_number(); ?>
        </span>
        <br>
        <span class="date text-lowercase">
          <?php echo esc_html_e('at', 'duna'); ?>
          <time class="post-date updated" itemprop="datePublished" datetime="<?php the_time('Y-m-d'); ?>">
            <?php the_date(); ?>
          </time>
          <meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"/>
        </span>

      </div>
    </div>
    <?php if ( shortcode_exists( 'ssba-buttons' ) ) { ?>
      <div class="div">
      <?php echo do_shortcode("[ssba-buttons]"); ?>
    </div>
    <?php } ?>

  </div>
  <?php
}

function w_featured_img($post){?>
  <!-- featured-img -->
      <?php if( get_post_meta($post->ID, "weart_video_audio", true) && get_theme_mod('want_featured_img',1) ) { ?>
        <div class="featured-img embed-responsive embed-responsive-16by9">
          <?php echo get_post_meta($post->ID, "weart_video_audio", true); ?>
        </div>
      <?php }elseif( function_exists('has_post_thumbnail') && has_post_thumbnail() && get_theme_mod('want_featured_img',1) ){?>
        <div class="featured-img position-relative">
          <?php the_post_thumbnail('full'); ?>
          <div class="img-caption f-main c-meta small"><?php echo esc_attr(get_post(get_post_thumbnail_id())->post_excerpt); ?></div>
        </div>
      <?php } ?><!-- featured-img-video -->
  <!-- end -->
<?php }