<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Interior Design
 */
?>
</div>
<?php wp_footer(); ?>
<div class="footer-sitemap">
    <ul class="sitemap-home"><?php 
    $args = array(
        'fields' => 'ids',
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_hide_from_sitemap',
                'compare' => '=',
                'value' => 'on',
            )
        )
    );
    $pages_to_exclude = new WP_Query( $args ); 
    wp_list_pages(array(
        'title_li' => '',
        'include' => implode(',', $pages_to_exclude->posts)
    ));
    ?></ul>
    <ul class="sitemap-normal"><?php 
    
    wp_list_pages(array(
        'title_li' => '',
        'exclude' => implode(',', $pages_to_exclude->posts)
    )); ?></ul>
    <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
    <?php
   wp_nav_menu( array(
        'theme_location' => 'social',
        'menu_class'     => 'social-links-menu',
        'depth'          => 1,
        'link_before'    => '<span class="screen-reader-text">',
        'link_after'     => '</span>' . interiordesign_get_svg( array( 'icon' => 'chain' ) ),
    ) );
        ?></nav>
</div>
</html>