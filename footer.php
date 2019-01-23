<?php
  // container
  $fcont = get_theme_mod('want_footer_boxed',0);
  if($fcont){ $fcont = 'container'; }
?>

<footer class="<?php echo esc_attr($fcont) ?>">

  <?php if( get_theme_mod('want_footer_newsletter',1) && function_exists( 'mc4wp_show_form' ) || has_nav_menu('social-menu') && get_theme_mod('want_footer_social',1) ){ ?>
    <div class="top border-top py-4 bg-2">
      <div class="container d-block d-lg-flex justify-content-between align-content-center">

        <?php if(get_theme_mod('want_footer_newsletter',1)){ ?>
          <?php if( function_exists( 'mc4wp_show_form' ) ) {
            mc4wp_show_form();
          } ?>
        <?php } ?>

        <?php if(get_theme_mod('want_footer_social',1) && has_nav_menu('social-menu')){ ?>
          <div class="social l-white lh-1 pt-4 pt-lg-0">
            <div class="text">
              <h4 class="c-white title"><?php esc_html_e('Follow us', 'duna') ?></h4>
              <p class="c-meta"><?php esc_html_e('Social channels', 'duna') ?></p>
            </div>
            <?php if(has_nav_menu('social-menu')){
              wp_nav_menu( array(
                'theme_location'    => 'social-menu',
                'depth'             => 1,
                'container'         => false,
                'menu_class'        => 'nav navbar-nav ml-auto social-channels d-none',
              ) );
            } ?>
          </div>
        <?php } ?>

      </div>
    </div><!-- .top -->
  <?php } ?>

  <?php get_sidebar(); ?>

  <div class="bottom bg-black c-white">
    <div class="container">
      <div class="copyright d-block d-md-flex py-4">

        <div class="d-block c-meta l-white small">
          <?php if(has_nav_menu('footer-menu')){
            wp_nav_menu( array(
              'theme_location'    => 'footer-menu',
              'depth'             => 2,
              'container'         => false,
              'menu_class'        => 'f-meta d-block d-md-flex',
            ) );
          } ?>
          <p><?php echo get_theme_mod('copyright',esc_html__('&copy; 2018 All rights reserved WeartStudio.','duna')) ?></p>
        </div>

        <?php if(get_theme_mod('want_footer_logo',1)){ ?>
          <div class="d-block">
            <div class="logo f-title l-white t-md">
              <a href="#">Duna</a>
            </div>
          </div>
        <?php } ?>

      </div><!-- .copyright -->
    </div><!-- .container -->
  </div><!-- .bottom -->

</footer>

<?php wp_footer() ?>
</body>
</html>