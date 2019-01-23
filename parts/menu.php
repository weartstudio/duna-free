<?php

  // gradient &fixed
    $gradient = get_theme_mod('want_menu_gradient',0);
    $fixed = get_theme_mod('want_menu_fixed',1);
    $menu_color = get_theme_mod('w_menu_color','bg-2');
    if( isset($_GET['menu_color']) && !empty($_GET['menu_color'] )) {
      $menu_color =  $_GET['menu_color'];
    }

    if($menu_color==="bg-2"){ $menu_color="bg-2 navbar-dark"; }
    elseif($menu_color==="bg-white"){ $menu_color="bg-white navbar-light"; }

    if($fixed){ $fixed = "fixed-top"; }
    if( $gradient && is_front_page() || is_page_template('single-longform.php') || is_category()){
      $gradient = ' gradient-on gradient navbar-dark '.$menu_color.' '.$fixed;
    } else {
      $gradient = ' shadow-sm '.$menu_color.' '.$fixed;
      if($fixed){ ?><div class="divider"></div><?php }
    }
  // end

  // container
    $container = get_theme_mod('want_menu_boxed',1);
    if( $container ){
      $container = 'container pl-3';
    }else{
      $container = 'container-fluid';
    }
    if( isset($_GET['container']) && !empty($_GET['container'] )) {
      $container =  $_GET['container'];
    }
  // end

  // container
    $biglogo = get_theme_mod('want_menu_biglogo',0);
    if( isset($_GET['biglogo']) && !empty($_GET['biglogo'] )) {
      $biglogo =  (bool)$_GET['biglogo'];
    }
  // end

?>

<nav class="p-0 w-header-nav navbar navbar-expand f-meta <?php echo esc_attr($gradient); ?>">
  <div class="<?php echo esc_attr($container) ?>">

    <!-- logo -->
      <div class="navbar-brand px-3 bg-1 l-white f-title <?php if($biglogo){ echo esc_html('biglogo'); } ?>" itemscope itemtype="https://schema.org/Organization">
          <?php  if ( has_custom_logo() ) { ?>
          <div itemscope itemtype="https://schema.org/ImageObject">
            <?php the_custom_logo(); ?>
          </div>
        <?php } else{ ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        <?php } ?>
        <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
      </div>
    <!-- end -->

    <div class="collapse navbar-collapse mr-auto">
      <div class="navbar-nav d-flex d-lg-none">
        <div class="nav-item bars" id="mobilemenu-indicator">
          <a href="#mobileindicator" class="nav-link"><i class="fas fa-bars"></i></a>
        </div>
      </div>
      <?php if(has_nav_menu('desktop-menu')){
        wp_nav_menu( array(
          'theme_location'    => 'desktop-menu',
          'container'         => false,
          'menu_class'        => 'nav navbar-nav mr-auto d-none d-lg-flex',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker()
        ) );
      } ?>
      <?php if(has_nav_menu('social-menu')){
        wp_nav_menu( array(
          'theme_location'    => 'social-menu',
          'depth'             => 1,
          'container'         => false,
          'menu_class'        => 'nav navbar-nav ml-auto social-channels d-none',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker()
        ) );
      } ?>
      <div class="dropdown nav navbar-nav ml-auto ml-md-0">
        <a class="pr-3 pl-1 dropdown-toggle nav-link" href="#sm" title="Search..." id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="dropdownMenuLink">
          <div class="px-2">
            <?php get_search_form() ?>
          </div>
        </div>
      </div>

    </div>

  </div>
</nav>

<?php if($biglogo){ ?>
  <div class="logoline justify-content-between container py-5">
    <div class="bg-lightt">
      <div class="d-flex align-items-center justify-content-center">
        <!-- logo -->
          <div class="w-logo px-4 bg-1 l-white f-title">
              <?php  if ( has_custom_logo() ) { ?>
              <div itemscope>
                <?php the_custom_logo(); ?>
              </div>
            <?php } else{ ?>
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
              </a>
            <?php } ?>
            <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
          </div>
        <!-- end -->
        <?php if( get_theme_mod('want_menu_biglogo_tagline',1) ): ?>
          <div class="d-flex ads bg-light py-3 px-4">
            <p class="f-meta text-uppercase m-0"><?php echo esc_html( get_bloginfo('description') ) ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php } ?>

<div id="mobile-menu">
  <div class="inner bg-white f-meta  p-4">
    <div class="top d-flex my-4 justify-content-center align-items-center">
      <!-- social -->
        <?php if(has_nav_menu('social-menu')){
          wp_nav_menu( array(
            'theme_location'    => 'social-menu',
            'depth'             => 1,
            'container'         => false,
            'menu_class'        => 'social-channels d-none l-white',
          ) );
        } ?>
      <!-- end -->
      <div class="p-3 d-block d-sm-none ml-sm-none ml-auto bars"><i class="fas fa-times fa-2x"></i></div>
    </div>
    <!-- menu -->
      <?php  if(has_nav_menu('mobile-menu')):
      wp_nav_menu( array(
        'theme_location' => 'mobile-menu',
        'container_class' => 'w-menu l-black lh-1',
        ) );
      endif; ?>
    <!-- end -->

  </div>
</div>