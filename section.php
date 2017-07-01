<?php 
/** 
 * Template Name: Section
 */ 
get_header(); ?>
Section
<?php
    while ( have_posts() ) : the_post();   
        // Include the page content template.
        the_content();

        // End of the loop.
    endwhile;
?>
<?php get_footer(); ?>
