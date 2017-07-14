<?php 
/** 
 * Template Name: Contact
 *
 * @package WordPress
 * @subpackage Interior Design
 */ 
 
get_header(); ?>
<?php
    while ( have_posts() ) : the_post();
        
        // Include the page content template.
        get_template_part( 'template-parts/content', 'contact' );

        // End of the loop.
    endwhile;
?>
<?php get_footer(); ?>