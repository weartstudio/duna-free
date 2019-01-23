<?php get_header(); ?>

<div class="section">
  <div class="container">
    <?php w_section_title( array('title'=>esc_html__( 'Searched: ', 'duna' ) . get_search_query() ) ) ?>
  </div><!-- .container -->
  <?php get_template_part('parts/latest') ?>
</div><!-- .section -->

<?php get_footer(); ?>