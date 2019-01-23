<?php if ( is_active_sidebar( 'sidebar-article') ) {
  $sticky = get_theme_mod('want_sticky_sidebar',0);
  if($sticky){ $sticky="sticky-kit"; }
?>
<div class="w-article-sidebar l-black lh-1 sidebar <?php echo esc_attr($sticky); ?>" id="sidebar-inner">
  <?php dynamic_sidebar( 'sidebar-article' ); ?>
</div>
<?php } ?>