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
    <ul><?php 
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
    $postsExcluded = array();
    if ( $pages_to_exclude->have_posts() ) { 
        while( $pages_to_exclude->have_posts() ) : $pages_to_exclude->the_post();
            array_push($postsExcluded, $post);
        endwhile;
    }
    
    wp_list_pages(array(
        'title_li' => '',
        'exclude' => implode(',', $postsExcluded)
    )); ?></ul>
</div>
</html>