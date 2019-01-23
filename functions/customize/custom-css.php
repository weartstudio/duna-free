<?php
function weart_color_changer() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );

    /*BEGIN THE COLORS */

      // MAIN COLOR
        $main_color = get_theme_mod( 'main_color', '#FF4849' ); //E.g. #acc7dc, eeebdc, e2d4d4
        if( !empty($main_color) ){
          $main = "
          ::selection { background: $main_color  !important }

          .c-1, .l-1 a, .lh-1 a:hover,
          { color: $main_color !important }

          .bg-1, .bgh-1:hover,
          .woocommerce ul.products li.product span.onsale, .woocommerce-page ul.products li.product span.onsale,
          .woocommerce div.product span.onsale, .woocommerce-page div.product span.onsale
          .woocommerce div.product form.cart button.button, .woocommerce-page div.product form.cart button.button
          .woocommerce .sidebar .widget_price_filter .price_slider_wrapper .ui-slider-range, .woocommerce-page .sidebar .widget_price_filter .price_slider_wrapper .ui-slider-range
          .woocommerce .wc-proceed-to-checkout a.checkout-button,
          .woocommerce .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce-page .wc-proceed-to-checkout a.checkout-button,
          .woocommerce .place-order .button.alt,
          .woocommerce .place-order .button.alt:hover, .woocommerce .wc-proceed-to-checkout .button.alt,
          .woocommerce .wc-proceed-to-checkout .button.alt:hover, .woocommerce-page .place-order .button.alt,
          .woocommerce-page .place-order .button.alt:hover, .woocommerce-page .wc-proceed-to-checkout .button.alt,
          .woocommerce-page .wc-proceed-to-checkout .button.alt:hover,
          .woocommerce-page .wc-proceed-to-checkout a.checkout-button:hover{ background-color: $main_color !important }

          nav.w-header-nav .navbar-brand:after,
          .w-logo:after,
          .w-cat-badge .bg-1:after { border-color: $main_color transparent transparent transparent !important; }

          .w_section_title .title:before{
            border-color: transparent transparent transparent $main_color !important;
          }

          .single .content blockquote, .single .comment-content blockquote, .page .content blockquote, .page .comment-content blockquote,
          .woocommerce .woocommerce-info, .woocommerce .woocommerce-notice, .woocommerce-page .woocommerce-info, .woocommerce-page .woocommerce-notice,
          .w-latest .w-latest-title{ border-color: $main_color !important }
                    ";
          wp_add_inline_style( 'main-style', $main );
        };

      // MAIN2 COLOR
        $main2_color = get_theme_mod( 'main2_color', '#3D3F53' ); //E.g. #FF0000
        if( !empty($main2_color) ){
          $main2 = "
          .c-2, .l-2 a, .lh-2 a:hover{ color: $main2_color !important; }

          .bg-2, .single .content blockquote, .single .comment-content blockquote, .page .content blockquote, .page .comment-content blockquote, .bgh-2:hover,
          .w_article_normal.sticky .title span,
          .w_section_title .title:after ,
          .woocommerce .sidebar .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce-page .sidebar .widget_price_filter .price_slider_wrapper .ui-widget-content { background-color: $main2_color !important; }

          .w-latest .w-latest-item .bdg:after{ border-color: $main2_color transparent transparent transparent; }
                    ";
          wp_add_inline_style( 'main-style', $main2 );
        };

    /* END */
} add_action( 'wp_enqueue_scripts', 'weart_color_changer' );