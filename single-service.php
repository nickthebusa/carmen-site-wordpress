<?php get_header(); ?>

<main>
  <?php
  echo render_block(array(
    'blockName' => 'carmen/hero',
    'attrs' => array(
      'heading'      => 'Services',
      'headingLevel' => 'h1',
      'bgImageUrl'   => get_the_post_thumbnail_url(get_the_ID(), 'full'),
      'bgImageId'    => get_post_thumbnail_id(get_the_ID()),
    ),
  ));
  ?>

  <?php echo render_block(array('blockName' => 'carmen/service-dropdown', 'attrs' => array())); ?>

  <div class="page-content <?php echo esc_attr(get_page_content_class()); ?>">
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
