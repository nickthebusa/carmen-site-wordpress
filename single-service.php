<?php get_header(); ?>

<main>

  <?php
  $image = get_field('hero_image');
  $hero_style = $image ? 'style="background-image: url(' . esc_url($image['url']) . ');"' : '';
  ?>

  <?php get_template_part('template-parts/service-dropdown'); ?>

  <section class="hero-group single-service <?php echo esc_attr(your_theme_get_hero_class()); ?>" <?php echo $hero_style; ?>>
    <div class="hero-text">
      <h3><?php the_title(); ?></h3>
    </div>
  </section>

  <section class="page-content">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </section>

</main>

<?php get_footer(); ?>
