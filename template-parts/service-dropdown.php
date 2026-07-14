<?php

/**
 * Reusable service-selector dropdown.
 * Include on any single-service page with:
 * get_template_part( 'template-parts/service-dropdown' );
 */
$dropdown_services = new WP_Query(array(
  'post_type'      => 'service',
  'posts_per_page' => -1,
  'orderby'        => 'menu_order',
  'order'          => 'ASC',
));
?>
<div class="dropdown-div">
  <input type="checkbox" id="dropdown" class="dropdown" name="dropdown">
  <label for="dropdown" class="dropdown-label">
    SELECT
    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <polyline points="19 12 12 19 5 12"></polyline>
    </svg>
  </label>
  <div class="section-dropdown">
    <?php
    if ($dropdown_services->have_posts()) :
      while ($dropdown_services->have_posts()) : $dropdown_services->the_post();
    ?>
        <a href="<?php the_permalink(); ?>" data-value="<?php echo esc_attr(get_post_field('post_name')); ?>">
          <?php the_title(); ?>
        </a>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</div>
