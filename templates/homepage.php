<?php 
/** 
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Interior Design
 */ 
get_header(); ?>
<?php
    while ( have_posts() ) : the_post();
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'large', ['class' => 'img-parallax homepage-image']);  
        }
        // Include the page content template.
        get_template_part( 'template-parts/content', 'page' );

        // End of the loop.
    endwhile;
?>
<?php get_footer(); ?>
