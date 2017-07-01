<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage THWP
 */

get_header(); ?>
<?php
    while ( have_posts() ) : the_post();
        
        // Include the page content template.
        get_template_part( 'template-parts/content', 'page' );

        // End of the loop.
    endwhile;
?>
<?php get_footer(); ?>
