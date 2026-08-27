<?php

/**
 * Theme setup, asset loading, and custom post type registration
 */

// Prevent direct access to this file
if (! defined('ABSPATH')) {
  exit;
}

/**
 * 1. THEME SUPPORT
 * Tells WordPress which built-in features your theme can handle.
 * Without these, things like the Featured Image box won't even show up in wp-admin.
 */
function your_theme_setup()
{
  add_theme_support('title-tag');        // lets WP manage <title> tag instead of hardcoding it
  add_theme_support('post-thumbnails');   // enables Featured Image UI (you'll use this for service images)
  add_theme_support('menus');             // enables Appearance > Menus for your nav
  add_theme_support('custom-logo', array(
    'height'      => 60,
    'width'       => 60,
    'flex-height' => true,
    'flex-width'  => true,
  ));
  add_theme_support('editor-styles');  // enable editor to laod custom css
  add_editor_style('assets/css/content.css');  // css for changing elements from gutenberg
}
add_action('after_setup_theme', 'your_theme_setup');


/**
 * 2. REGISTER NAV MENU LOCATION
 * This creates a "slot" called 'primary' that shows up in Appearance > Menus,
 * where the admin can drag-and-drop build the nav without touching code.
 */
function your_theme_menus()
{
  register_nav_menus(array(
    'primary' => __('Primary Navigation'),
    'footer'  => __('Footer Navigation'),
  ));
}
add_action('init', 'your_theme_menus');

/**
 * 3. ENQUEUE CSS AND JS
 * "Enqueue" is WP's required way of loading stylesheets/scripts — never hardcode
 * <link> or <script> tags directly in header.php, always do it here.
 * This avoids version conflicts with plugins and lets WP manage load order.
 */
function your_theme_assets()
{
  // general styles
  wp_enqueue_style('general-css', get_template_directory_uri() . '/assets/css/general.css');
  wp_enqueue_style('content-css.', get_template_directory_uri() . '/assets/css/content.css');
  wp_enqueue_style('modifiers-css.', get_template_directory_uri() . '/assets/css/modifiers.css');

  // Base styles — loaded on every page
  wp_enqueue_style('nav-css', get_template_directory_uri() . '/assets/css/nav.css');
  wp_enqueue_style('footer-css', get_template_directory_uri() . '/assets/css/footer.css');

  // Conditional styles — only load on the pages that need them
  if (is_front_page()) {
    //wp_enqueue_style('home-css', get_template_directory_uri() . '/assets/css/home.css');
  }
  if (is_page('services') || is_singular('service')) {
    wp_enqueue_style('services-css', get_template_directory_uri() . '/assets/css/services.css');
  }
  if (is_page('resources')) {
    wp_enqueue_style('resources-css', get_template_directory_uri() . '/assets/css/resources.css');
  }

  // JS — loaded in footer (true = load in footer, not head, so it doesn't block page render)
  //wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'your_theme_assets');

// ENQUEUE FONTS
function your_theme_fonts()
{
  wp_enqueue_style(
    'century-gothic-font',
    'https://fonts.cdnfonts.com/css/century-gothic-paneuropean',
    array(),
    null
  );
  wp_enqueue_style(
    'adobe-garamond-font',
    'https://fonts.cdnfonts.com/css/adobe-garamond-pro-2',
    array(),
    null
  );
  wp_enqueue_style(
    'forum-font',
    'https://fonts.googleapis.com/css2?family=Forum&display=swap',
    array(),
    null
  );
  wp_enqueue_style(
    'tenor-sans-font',
    'https://fonts.googleapis.com/css2?family=Tenor+Sans&display=swap',
    array(),
    null
  );
}
add_action('wp_enqueue_scripts', 'your_theme_fonts');

function your_theme_customize_register($wp_customize)
{
  $wp_customize->add_section('your_theme_typography', array(
    'title' => 'Typography',
    'priority' => 30,
  ));

  $wp_customize->add_setting('body_font_family', array(
    'default' => "'Century Gothic', sans-serif",
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('body_font_family', array(
    'label' => 'Body Font (CSS font-family value)',
    'section' => 'your_theme_typography',
    'type' => 'text',
  ));
}
add_action('customize_register', 'your_theme_customize_register');

function your_theme_customizer_css() {
  $font = get_theme_mod('body_font_family', "'Century Gothic', sans-serif");
  echo '<style>body { font-family: ' . esc_attr($font) . '; }</style>';
}
add_action('wp_head', 'your_theme_customizer_css');

/* helper to apply style to page-content per page */
function get_page_content_class()
{
  if (is_front_page()) {
    return 'content-home';
  } elseif (is_page('contact')) {
    return 'content-contact';
  } elseif (is_page('resources')) {
    return 'content-resources';
  } elseif (is_page('services') || is_singular('service')) {
    return 'content-services';
  }
  return '';
}

