<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Interior Design
 */
?>

<div <?php post_class(); ?>>
	<?php
		$post_id = get_the_ID();
		$galery_id = get_post_meta( $post_id, 'project_page_galleryid', true );
		if(!empty($galery_id)){
		 	echo do_shortcode('[URIS id=' . $galery_id . ']'); 
		}
	?>
	<div class="project-details">
		<?php
			$project_title = get_post_meta( $post_id, 'project_page_title', true );
			$project_context = get_post_meta( $post_id, 'project_page_context', true );
			$project_client = get_post_meta( $post_id, 'project_page_client', true );
			$project_location = get_post_meta( $post_id, 'project_page_location', true );
		?>
		<h2><?php echo $project_title ?></h2>
		<h3><?php echo $project_context ?></h3>
		<h3><?php echo $project_client ?> - <?php echo $project_location ?></h3>
	</div>

	<div class="project-description">
	<?php
		the_content();
	?>
	</div>
	<nav class="project-navigation">
		<?php
			$pagelist = get_pages(array(
				'sort_column'=> 'menu_order',
				'sort_order' => 'asc',
				'parent' => wp_get_post_parent_id( get_the_ID() ),
			));
			$pages = array();
			foreach ($pagelist as $page) {
				$pages[] += $page->ID;
			}

			$current = array_search(get_the_ID(), $pages);
			$prevID = $pages[$current-1];
			$nextID = $pages[$current+1];
		?>
			<?php if (!empty($prevID)) { ?>
			<div class="alignleft">
				<a href="<?php echo get_permalink($prevID); ?>"
					title="<?php echo get_the_title($prevID); ?>">&lt; Previous</a>
			</div>
			<?php }
			if (!empty($nextID)) { ?>
			<div class="alignright">
				<a href="<?php echo get_permalink($nextID); ?>" 
					title="<?php echo get_the_title($nextID); ?>">Next &gt;</a>
			</div>
			<?php } ?>
	</nav>
</div>
