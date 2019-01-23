<?php if ( is_active_sidebar( 'sidebar-footer') ) { ?>

<div class="w_footer_sidebar bg-black l-meta lh-1 c-meta">
  <div class="container">
    <div class="row py-5 sidebar">
      <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </div>
    <hr class="m-0">
  </div>
</div>
<?php } ?>