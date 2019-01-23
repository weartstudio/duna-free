<?php

// first run setup
  if ( ! function_exists( 'weart_setup' ) ) :

    function weart_setup() {
      load_theme_textdomain( 'duna', get_template_directory() . '/languages' );
      add_theme_support( 'automatic-feed-links' );
      add_theme_support( 'title-tag' );
      add_theme_support('editor_style');

      //register nav menus
      register_nav_menus( array(
        'social-menu' => esc_html__( 'Social Menu', 'duna' ),
        'desktop-menu' => esc_html__( 'Desktop Menu', 'duna' ),
        'mobile-menu' => esc_html__( 'Mobile Menu', 'duna' ),
        'footer-menu' => esc_html__( 'Footer Menu', 'duna' )
        ) );

      //custom featured image size
      add_theme_support( 'post-thumbnails' );
      add_image_size( 'weart-grid', 730, 99999 );
      add_image_size( 'weart-list', 350, 99999 );
      add_image_size( 'weart-wide', 1100, 99999 );

      //html5 support & background & logo
      add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
      add_theme_support( 'custom-background', apply_filters( 'weart_custom_background_args', array(
        'default-color' => '#ffffff',
        'default-image' => '',
      ) ) );

      // custom logo
      add_theme_support( 'custom-logo', array(
        'flex-height'   => true,
        'flex-widht'    => true,
        'header-text'   => array( 'site-title', 'site-description' )
      ) );

      //post formats
      add_theme_support( 'post-formats', array(
        'video',
        'gallery',
        'audio',
      ) );

    }

  endif;
  add_action( 'after_setup_theme', 'weart_setup' );
// end

// Set the content width
  function weart_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'weart_content_width', 820 );
  }
  add_action( 'after_setup_theme', 'weart_content_width', 0 );
// end

//excerpts
  function weart_excerpt_length( $length ) {
    return 20;
  }
  add_filter( 'excerpt_length', 'weart_excerpt_length', 999 );

  function weart_excerpt_more( $more ) {
    return '...';
  }
  add_filter( 'excerpt_more', 'weart_excerpt_more' );
// end

// search exclude pages
  if (!is_admin()) {
    function weart_search_filter($query) {
      if ($query->is_search) {
        $query->set('post_type', 'post');
      }
      return $query;
    }
    add_filter('pre_get_posts','weart_search_filter');
  }
// end

// Video embed responsive
  function weart_oembed_filter($html) {
      $return = '<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>';
      return $return;
  }
  add_filter( 'embed_oembed_html', 'weart_oembed_filter', 10, 4 ) ;
  add_filter( 'video_embed_html', 'weart_oembed_filter' ); // Jetpack
// end

// facebook opengraph and twitter card meta add
  function weart_doctype_opengraph($output) {
      return $output . '
      prefix="og: http://ogp.me/ns#"';
  }
  add_filter('language_attributes', 'weart_doctype_opengraph');

  function weart_social_meta() {
    global $post;
    if(is_single()) {
      if(has_post_thumbnail($post->ID)) {
        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'large');
      }else { $img_src = ''; }

      if($excerpt = $post->post_excerpt) {
        $excerpt = strip_tags($post->post_excerpt);
        $excerpt = str_replace("", "'", $excerpt);
      } else {
        $excerpt = get_bloginfo('description');
      } ?>
      <!-- facebook -->
      <meta property="og:type" content="article"/>
      <meta property="og:title" content="<?php the_title(); ?>"/>
      <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>"/>
      <meta property="og:url" content="<?php the_permalink(); ?>"/>
      <meta property="og:image" content="<?php if( !empty($img_src) ){ echo esc_url($img_src[0]); } ?>"/>
      <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
      <!-- twitter -->
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:title" content="<?php the_title(); ?>" />
      <meta name="twitter:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
      <meta name="twitter:url" content="<?php the_permalink(); ?>" />
      <meta name="twitter:image" content="<?php if( !empty($img_src) ){ echo esc_url($img_src[0]); } ?>" />
    <?php } else { return; }
  }
  add_action('wp_head', 'weart_social_meta', 5);
// end

// Mega menu
  add_filter( 'walker_nav_menu_start_el', 'weart_desktop_menu', 10, 4 );

  function weart_desktop_menu( $item_output, $item, $depth, $args ) {
    global $wp_query;
      // The mega dropdown only applies to the main navigation.
      // Your theme location name may be different, "main" is just something I tend to use.
      if ( 'desktop-menu' !== $args->theme_location )
          return $item_output;

      // The mega dropdown needs to be added to one specific menu item.
      // I like to add a custom CSS class for that menu via the admin area.
      // You could also do an item ID check.
      if ( in_array( 'weart-megamenu', $item->classes ) ) {
        global $wp_query;
        global $post;
        $subposts = get_posts( 'numberposts=4&cat=' . $item->object_id );
        $item_output .= '<div class="weart-megamenu"><div class="w-100 bg-white border border-top"><div class="container"><div class="row">';
          foreach( $subposts as $post ) : setup_postdata( $post );if(has_post_thumbnail()){
          $item_output .= '<div class="col-3 l-black py-4 l-black lh-1"><a href="'. get_permalink( $post->ID ) .'">';
            $item_output .= '<div class="lazy img" data-src="'.get_the_post_thumbnail_url( $post->ID, 'weart-grid-small' ).'"></div>';
            $item_output .= '<span class="d-block mt-2 h6 t-sm text-capitalize">'.get_the_title( $post->ID ).'</span>';
          $item_output .= '</a></div>';
          } endforeach; wp_reset_postdata();
        $item_output .= '</div></div></div></div>';
      }
      return $item_output;
  }
// end

// sidebars
  add_action( 'widgets_init', 'weart_widgets_init' );
  function weart_widgets_init() {
    if ( function_exists('register_sidebar') ) {

      register_sidebar( array(
        'name' => esc_html__( 'Footer Sidebar', 'duna' ),
        'id' => 'sidebar-footer',
        'before_widget' => '<div id="%1$s" class="%2$s box col-md-4 my-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="w_section_title border-bottom text-uppercase mb-4"><h4 class="f-meta t-sm title c-white">',
        'after_title'   => '</h4></div>',
      ) );

      register_sidebar( array(
        'name' => esc_html__( 'WooCommerce Sidebar', 'duna' ),
        'id' => 'sidebar-woocommerce',
        'before_widget' => '<div id="%1$s" class="%2$s box mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="w_section_title border-bottom text-uppercase mb-4"><h4 class="f-meta t-sm title">',
        'after_title'   => '</h4></div>',
      ) );

      register_sidebar( array(
        'name' => esc_html__( 'Article Sidebar', 'duna' ),
        'id' => 'sidebar-article',
        'before_widget' => '<div id="%1$s" class="%2$s box mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="w_section_title border-bottom text-uppercase mb-4"><h4 class="f-meta t-sm title">',
        'after_title'   => '</h4></div>',
      ) );

    }
  }
// end

// Required files
  require get_template_directory().'/functions/others/class-wp-bootstrap-navwalker.php';
  require get_template_directory().'/functions/others/class-tgm-plugin-activation.php';
  require get_template_directory().'/functions/others/metadata.php';
  require get_template_directory().'/parts/items.php';
// end

// google fonts import the right way
  if ( ! function_exists( 'weart_fonts_url' ) ) :
  function weart_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = '';
    if ( 'off' !== esc_html('on')){
        $fonts[] = get_theme_mod('title_font', 'Heebo:900');
    }
    if ( 'off' !== esc_html('on')){
        $fonts[] = get_theme_mod('title_font', 'Oswald');
    }
    if ( 'off' !== esc_html('on')){
        $fonts[] = get_theme_mod('text_font', 'Roboto:400,400i,700,700i');
    }
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }
    return $fonts_url;
  } endif;
// end

// Enqueue scripts and styles.
  if ( ! function_exists( 'weart_scripts' ) ) :
  function weart_scripts() {

    /* STYLES */
      wp_enqueue_style( 'duna-weart-fonts', weart_fonts_url(), array(), null );
      wp_enqueue_style( 'fontawesome-free', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', array(), null  );
      wp_enqueue_style( 'duna-weart', get_template_directory_uri() . '/assets/weart.css', array(), null  );
      wp_enqueue_style( 'duna-style', get_stylesheet_uri() );

    /*SCRIPTS*/

      // lazyload
        wp_register_script( 'lazyload-min', get_template_directory_uri() . '/assets/js/lazyload.min.js', null, null, true );
        wp_enqueue_script( 'lazyload-min' );

      // sticky
        wp_register_script('jquery.sticky-kit.min', get_template_directory_uri() . '/assets/js/jquery.sticky-kit.min.js', array( 'jquery' ), null, true );
        wp_enqueue_script('jquery.sticky-kit.min');

      // bootstrap
        wp_register_script( 'bootstrap-bundle-min', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );
        wp_enqueue_script( 'bootstrap-bundle-min' );

      // weart Main JS
        wp_register_script( 'duna-weart', get_template_directory_uri() . '/assets/js/weart.js', array( 'jquery' ), null, true );
        wp_enqueue_script( 'duna-weart' );

      /* COMMENT REPLY */
      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

  } endif;
  add_action( 'wp_enqueue_scripts', 'weart_scripts' );
// end

// custom class for pagination
  add_filter('next_posts_link_attributes', 'posts_link_attributes');
  add_filter('previous_posts_link_attributes', 'posts_link_attributes');
  function posts_link_attributes() {
      return 'class="btn btn-sm btn-outline-dark rounded-0 f-meta text-uppercase px-3 bgh-black mx-3"';
  }
// end

// gutenberg
  // guten-support
    add_action( 'after_setup_theme', 'weart_setup_theme_supported_features' );
    function weart_setup_theme_supported_features() {
      // Theme supports wide images, galleries and videos.
      add_theme_support( 'align-wide' );
      // Make specific theme colors available in the editor.
      add_theme_support( 'editor-color-palette',
        array( 'name' => 'main red', 'color' => '#FF4849', ),
        array( 'name' => 'secondary blue', 'color' => '#3D3F53', ),
        array( 'name' => 'dark gray', 'color' => '#444', )
    );}
  // end

  // editor styles
    add_action( 'enqueue_block_editor_assets', 'weart_editor_styles' );
    function weart_editor_styles() {
      wp_enqueue_style( 'weart-editor-style', get_template_directory_uri() . '/assets/editor.css' );
      wp_enqueue_style( 'weart_fonts_url', weart_fonts_url(), array(), null );
    }
  // end
// end

// customize
  if ( ! function_exists( 'weart_customizer' ) ) :
  function weart_customizer( $wp_customize ) {

    //Header
    require_once( get_parent_theme_file_path( '/functions/customize/header.php') );

    //Footer
    require_once( get_parent_theme_file_path( '/functions/customize/footer.php') );

    //Article
    require_once( get_parent_theme_file_path( '/functions/customize/article.php') );

    //Colors
    require_once( get_parent_theme_file_path( '/functions/customize/colors.php') );

    //Sanitize, Validation
    require_once( get_parent_theme_file_path( '/functions/customize/sanitize.php') );

  } endif;
  add_action( 'customize_register', 'weart_customizer' );
  //EXECUTE THE CUSTUMIZER COLOR CHANGES
  require get_template_directory().'/functions/customize/custom-css.php';
// end

// tgm
  function weart_require_plugins() {

    $plugins = array(
      array(
        'name'               => 'Lazy Load for Comments',
        'slug'               => 'lazy-load-for-comments',
        'required'           => false, // required for the faster page-load
      ),
      array(
        'name'               => 'Easy Google Fonts',
        'slug'               => 'easy-google-fonts',
        'required'           => false, // not-required
      ),
      array(
        'name'               => 'Simple Share Buttons Adder',
        'slug'               => 'simple-share-buttons-adder',
        'required'           => false, // not-required
      ),
      array(
        'name'               => 'MailChimp for WordPress',
        'slug'               => 'mailchimp-for-wp',
        'required'           => false, // not-required
      ),
      array(
        'name'               => 'WP User Avatars',
        'slug'               => 'wp-user-avatars',
        'required'           => false, // not-required
      ),
    );
    $config = array(
      'id'           => 'weart-tgmpa', // your unique TGMPA ID
      'default_path' => '', // default absolute path
      'menu'         => 'weart-install-required-plugins', // menu slug
      'has_notices'  => true, // Show admin notices
      'dismissable'  => false, // the notices are NOT dismissable
      'is_automatic' => true, // automatically activate plugins after installation
    );

    tgmpa( $plugins, $config );

  }
  add_action( 'tgmpa_register', 'weart_require_plugins' );
// end
