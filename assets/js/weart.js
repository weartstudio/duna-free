(function($) { "use strict";

// document ready
  $(document).ready(function(){

    weart_social();
    weart_twitter_embed_hack();
    weart_comment_button_hack();
    weart_expand_menu();
    weart_expand_menu_sidebar();
    weart_goToTop();


    $("#sidebar-inner.sticky-kit").stick_in_parent({
      offset_top: 70,
    });

    // lazyload
      var myLazyLoad = new LazyLoad({ elements_selector: ".lazy" });
    // end

    // bootstrap carousel active class
      $('.carousel').find('.ind:first').addClass('active');
    // end

    // navmenu
      var menu = $('.w-header-nav.gradient-on');
      $(document).on('scroll',function(){
        // gradient menu
          if( $(this).scrollTop() > 10 ){
            menu.removeClass('gradient navbar-dark').addClass('shadow-sm');
            if( menu.hasClass('bg-2') ){ menu.addClass('navbar-dark'); }
          }else{
            menu.addClass('gradient navbar-dark').removeClass('shadow-sm');
          }
        // end

        // biglogo disappear normal log
          var menulogo = $('.w-header-nav .navbar-brand');
          if( menulogo.hasClass('biglogo') ) {
            if( $(this).scrollTop() > 222 ){
              menulogo.show();
            }else{
              menulogo.hide()
            }
          }
        // end
      });

    // end

    // page home no htmls
      $('.page-template-page-home').find('br').remove();
      $('.page-template-page-home p').each(function() {
        var $this = $(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
          $this.remove();
      });
    // end

  });
// end

// functions

  function weart_social(){
    var vmi = '';
    $(".social-channels li a").on().each(function(){
      vmi = $(this).text();
      if(  vmi === "500px" || vmi === "adn" || vmi === "amazon" || vmi === "android" || vmi === "angellist" || vmi === "apple" || vmi === "bandcamp" || vmi === "behance" || vmi === "bitbucket" || vmi === "btc" || vmi === "black-tie" || vmi === "bluetooth" || vmi === "buysellads" || vmi === "cc-amex" || vmi === "cc-diners-club" || vmi === "cc-discover" || vmi === "cc-jcb" || vmi === "cc-mastercard" || vmi === "cc-paypal" || vmi === "cc-stripe" || vmi === "cc-visa" || vmi === "chrome" || vmi === "codepen" || vmi === "codiepie" || vmi === "connectdevelop" || vmi === "contao" || vmi === "css3" || vmi === "dashcube" || vmi === "delicious" || vmi === "deviantart" || vmi === "digg" || vmi === "dribbble" || vmi === "dropbox" || vmi === "drupal" || vmi === "edge" || vmi === "eercast" || vmi === "empire" || vmi === "envira" || vmi === "etsy" || vmi === "expeditedssl" || vmi === "font-awesome" || vmi === "facebook" || vmi === "firefox" || vmi === "first-order" || vmi === "flickr" || vmi === "font-awesome" || vmi === "fonticons" || vmi === "fort-awesome" || vmi === "forumbee" || vmi === "foursquare" || vmi === "free-code-camp" || vmi === "get-pocket" || vmi === "gg" || vmi === "git" || vmi === "github" || vmi === "gitlab" || vmi === "glide" || vmi === "google" || vmi === "google-plus" || vmi === "google-wallet" || vmi === "gratipay" || vmi === "grav" || vmi === "hacker-news" || vmi === "houzz" || vmi === "html5" || vmi === "imdb" || vmi === "instagram" || vmi === "internet-explorer" || vmi === "ioxhost" || vmi === "joomla" || vmi === "jsfiddle" || vmi === "lastfm" || vmi === "leanpub" || vmi === "linkedin" || vmi === "linode" || vmi === "linux" || vmi === "maxcdn" || vmi === "meanpath" || vmi === "medium" || vmi === "meetup" || vmi === "mixcloud" || vmi === "modx" || vmi === "odnoklassniki" || vmi === "opencart" || vmi === "openid" || vmi === "opera" || vmi === "optin-monster" || vmi === "pagelines" || vmi === "paypal" || vmi === "pied-piper" || vmi === "pinterest" || vmi === "product-hunt" || vmi === "qq" || vmi === "quora" || vmi === "ravelry" || vmi === "rebel" || vmi === "reddit" || vmi === "renren" || vmi === "rebel" || vmi === "safari" || vmi === "scribd" || vmi === "sellsy" || vmi === "shirtsinbulk" || vmi === "simplybuilt" || vmi === "skyatlas" || vmi === "skype" || vmi === "slack" || vmi === "slideshare" || vmi === "snapchat" || vmi === "soundcloud" || vmi === "spotify" || vmi === "stack-exchange" || vmi === "stack-overflow" || vmi === "steam" || vmi === "steam-square" || vmi === "stumbleupon" || vmi === "superpowers" || vmi === "telegram" || vmi === "tencent-weibo" || vmi === "themeisle" || vmi === "trello" || vmi === "tripadvisor " || vmi === "tumblr" || vmi === "twitch" || vmi === "twitter" || vmi === "usb" || vmi === "viacoin" || vmi === "viadeo" || vmi === "vimeo" || vmi === "vine" || vmi === "vk" || vmi === "wechat " || vmi === "weibo" || vmi === "whatsapp" || vmi === "wikipedia-w" || vmi === "windows" || vmi === "wordpress" || vmi === "wpbeginner" || vmi === "wpexplorer" || vmi === "wpforms" || vmi === "xing" || vmi === "yahoo" || vmi === "yelp" || vmi === "yoast" || vmi === "youtube" ){
        $(this).empty();
        $(this).prepend('<i class="fab fa-'+vmi+'"></i>');
      }else{
        $(this).parent().remove();
      }
    });
    $(".social-channels").addClass('d-md-flex');
    return false;
  }// END OF weart_social()

  function weart_twitter_embed_hack(){
    $(".content .twitter-tweet").parent().removeClass("embed-responsive-16by9");
    $(".content #fb-root").parent().removeClass("embed-responsive-16by9 embed-responsive").addClass("mw-100 pb-3");
    $(".content .instagram-media").parent().removeClass("embed-responsive-16by9 embed-responsive");
  }/*end of weart_twitter_embed_hack()*/

  function weart_comment_button_hack(){
    $('button#llc_comments_button').addClass('text-uppercase px-3 py-2 rounded-0 f-meta btn btn-sm btn-outline-dark');
  }/*end of weart_comment_button_hack()*/

  function weart_expand_menu(){
    $('.bars').on('click',function(){
      $('#mobile-menu').toggle('fast');
    });
    $('#mobile-menu').click(function(e){
      if ( $(e.target).closest('#mobile-menu .inner').length === 0 ) {
        // cancel highlighting
        $("#mobile-menu").hide('fast');
      }
    });
    $('#mobile-menu .w-menu ul ul').on().each(function() {
        if($(this).children().length){
            $(this,'li:first').parent().append('<a class="expand right" href="#"><i class="fa fa-plus"></i><i class="fa fa-minus d-none"></i></a>');
        }
    });
    $('#mobile-menu .w-menu ul li a.expand').on("click",function(e){
      e.preventDefault();
      if ($(this).hasClass("clicked")) {
          $(this).find('.fa-minus').toggleClass('d-none');
          $(this).find('.fa-plus').toggleClass('d-none');
          $(this).prev('ul').slideUp(300, function(){});
          $(this).parent('li').removeClass('active');
      } else {
          $(this).find('.fa-minus').toggleClass('d-none');
          $(this).find('.fa-plus').toggleClass('d-none');
          $(this).prev('ul').slideDown(300, function(){});
          $(this).parent('li').addClass('active');
      }
      $(this).toggleClass("clicked");
    });
    return false;
  }/*end of weart_expand_menu()*/

  function weart_menu_indicator(){
    $('#mobile-indicator').on("click",function(){
      $('#weart_mobile_menu').toggle(100);
      $('.main').toggleClass('blur');
      $(this).find('.fa-bars,.fa-times').toggleClass('d-none');
    });
    return false;
  }/*end of weart_menu_indicator()*/

  function weart_goToTop(){
    $('body').append('<div id="toTop" class="btn bg-black bgh-1 c-white"><span class="fas fa-angle-up"></span></div>');
      $(window).scroll(function () {
      if ($(this).scrollTop() >= 200) {
        $('#toTop').fadeIn();
      } else {
        $('#toTop').fadeOut();
      }
    });
    $('#toTop').on("click",function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
  }/*end of weart_goToTop()*/

  function weart_expand_menu_sidebar(){
    $('.sidebar .box ul ul').on().each(function() {
        if($(this).children().length){
            $(this,'li:first').parent().append('<a class="expand" href="#"><i class="fa fa-plus"></i></a>');
        }
    });
    $('.sidebar .box ul li a.expand').on("click",function(e){
      e.preventDefault();
      if ($(this).hasClass("clicked")) {
        $(this).find('i').toggleClass('fa-plus fa-minus');
        $(this).prev('ul').slideUp(300, function(){});
        $(this).parent('li').removeClass('active');
      } else {
        $(this).find('i').toggleClass('fa-plus fa-minus');
        $(this).prev('ul').slideDown(300, function(){});
        $(this).parent('li').addClass('active');
      }
      $(this).toggleClass("clicked");
    });
    return false;
  }/*end of weart_expand_menu()*/

// end

})(jQuery);