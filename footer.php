<footer>
    <div class="footer-content">
        <h3><?php bloginfo( 'name' ); ?></h3>
        <span class="services">
            <?php
            $footer_tags = new WP_Query( array(
                'post_type'      => 'footer_tag',
                'posts_per_page' => -1,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ) );

            if ( $footer_tags->have_posts() ) :
                $count = 0;
                $total = $footer_tags->post_count;
                while ( $footer_tags->have_posts() ) : $footer_tags->the_post();
                    $count++;
                    ?>
                    <span><?php the_title(); ?></span>
                    <?php if ( $count < $total ) : ?>
                        <span class="separator">•</span>
                    <?php endif; ?>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </span>
        <span>carmen.naturalhealth@gmail.com</span>
        <div class="img-wrapper">
            <?php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo_url = wp_get_attachment_image_url( $custom_logo_id, 'full' );
            if ( $logo_url ) :
            ?>
                <img src="<?php echo esc_url( $logo_url ); ?>" alt="logo">
            <?php endif; ?>
        </div>
    </div>
</footer>

</div><!-- wrapper  -->

<?php wp_footer(); ?>
</body>
</html>
