<?php get_header(); ?>

<main>

  <?php
  $image = get_field('hero_image');
  $hero_style = $image ? 'style="background-image: url(' . esc_url($image['url']) . ');"' : '';
  ?>
  <section class="hero-group <?php echo esc_attr(your_theme_get_hero_class()); ?>" <?php echo $hero_style; ?>>
    <div class="hero-text">
      <h1><?php the_field('hero_heading'); ?></h1>
      <p><?php the_field('hero_subtext'); ?></p>
    </div>
  </section>

  <?php get_template_part('template-parts/service-dropdown'); ?>

  <div class="pick-service-page">
    <?php
    $services = new WP_Query(array(
      'post_type'      => 'service',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
    ));

    if ($services->have_posts()) :
      while ($services->have_posts()) : $services->the_post();
        $short_desc = get_field('short_description');
        $service_image = get_field('service_image'); // adjust field name to match what you actually named it
    ?>
        <a href="<?php the_permalink(); ?>" class="pick-service-div" data-value="<?php echo esc_attr(get_post_field('post_name')); ?>">
          <div class="text">
            <h3><?php the_title(); ?></h3>
            <?php if ($short_desc) : ?>
              <p><?php echo esc_html($short_desc); ?></p>
            <?php endif; ?>
            <?php if ($service_image) : ?>
              <div class="bg-img">
                <img src="<?php echo esc_url($service_image['url']); ?>" alt="<?php echo esc_attr($service_image['alt'] ?: get_the_title()); ?>">
              </div>
            <?php endif; ?>
          </div>
        </a>
    <?php
      endwhile;
      wp_reset_postdata();
    endif;
    ?>

  </div>

</main>

<?php get_footer(); ?>
