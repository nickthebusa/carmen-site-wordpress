<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="page-wrap">

  <nav>
    <div class="logo-and-name">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <div class="img-logo">
          <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
          if ($logo_url) :
          ?>
            <img src="<?php echo esc_url($logo_url); ?>" alt="business-logo">
          <?php endif; ?>
        </div>
        <div class="txt-wrapper">
          <h1><?php bloginfo('name'); ?></h1>
        </div>
      </a>
    </div>

    <div class="links">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container'      => false,
        'items_wrap'     => '%3$s',
        'depth'          => 1,
        'fallback_cb'    => false, // don't fall back to default menu
      ));
      ?>
    </div>

    <hamburger>
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
      <div id="menu">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '%3$s',
          'depth'          => 1,
          'fallback_cb'    => false, // don't fall back to default menu
        ));
        ?>
      </div>
    </hamburger>
  </nav>

