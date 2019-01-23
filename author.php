<?php get_header(); ?>

<div class="author-profile bg-light py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="d-block px-3 author-img">
        <img src="<?php echo esc_html(get_avatar_url(get_the_author_meta('user_email'), array('size' => 140))); ?>" class="rounded-circle m-0 border" alt="<?php the_author() ?>" />
      </div>
      <div class="col">
        <div class="d-flex align-items-baseline">
          <h1 class="t-md text-capitalize"><?php the_author(); ?></h1>
          <div class="l-meta lh-black text-center ml-2">
            <?php if(get_the_author_meta('email')){  ?>
              <a href="mailto:<?php esc_html( the_author_meta('email') ); ?>" class="meta"><i class="fas fa-envelope-square" aria-hidden="true"></i></a>
            <?php } if(get_the_author_meta('user_url')){  ?>
              <a href="<?php esc_html( the_author_meta('user_url') ); ?>" class="meta"><i class="fas fa-external-link-square-alt" aria-hidden="true"></i></a>
            <?php }  ?>
          </div>
        </div>
        <?php if(get_the_author_meta('description')){  ?><div class="f-text p-m-0"><?php the_author_meta('description'); ?></div><?php }  ?>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <?php w_section_title( array('title'=>get_the_archive_title() ) ) ?>
  </div><!-- .container -->
  <?php get_template_part('parts/latest') ?>
</div><!-- .section -->

<?php get_footer(); ?>

