<?php get_header(); ?>

<main>

  <?php
  $image = get_field('hero_image');
  $hero_style = $image ? 'style="background-image: url(' . esc_url($image['url']) . ');"' : '';
  ?>

  <section class="hero-group <?php echo esc_attr( your_theme_get_hero_class() ); ?>" <?php echo $hero_style; ?>>
    <div class="hero-text">
      <h1><?php the_field('hero_heading'); ?></h1>
      <p><?php the_field('hero_subtext'); ?></p>
    </div>
  </section>

  <div class="page-content">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    endif;
    ?>
  </div>

</main>

<?php get_footer(); ?>
