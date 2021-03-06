<?php 
/** 
 * Template Name: Section
 *
 * @package WordPress
 * @subpackage Interior Design
 */ 
 
get_header(); ?>
<div class="section-content">
<p><?php the_content(); ?></p>
<?php $args = array(
	'sort_order' => 'asc',
	'sort_column' => 'menu_order',
	'hierarchical' => 1,
	'exclude' => '',
	'include' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => $post->ID,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($args); 
foreach($pages as $page){
?>
	<a class="section-link" href="<?php echo get_page_link( $page->ID ); ?>">
	<?php if(has_post_thumbnail( $page->ID )){ ?>
		<img src="<?php echo get_the_post_thumbnail_url( $page->ID, "large"); ?>"/>
	<?php } ?>
	<span><span><?php echo $page->post_title; ?></span></span></a>
<?php
}
?>
</div>
<?php
    while ( have_posts() ) : the_post();   
        // Include the page content template.
        the_content();

        // End of the loop.
    endwhile;
?>
<?php get_footer(); ?>
