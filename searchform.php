<form role="search" method="get" class="search-form d-block " action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="input-group">
    <input type="search" class="form-control search-field rounded-0" placeholder="<?php esc_html_e('Search for...','duna'); ?>" aria-label="<?php esc_html_e('Search for...','duna'); ?>" name="s">
    <span class="input-group-btn">
      <button class="btn bg-1 c-white search-submit rounded-0" type="submit"><i class="fas fa-search"></i></button>
    </span>
  </div>
</form>