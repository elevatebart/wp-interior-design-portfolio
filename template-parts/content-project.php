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
	?>
	<?php echo do_shortcode('[URIS id=' . $galery_id . ']'); ?>

	<div class="project-details">
		<?php
			$project_title = get_post_meta( $post_id, 'project_page_title', true );
			$project_context = get_post_meta( $post_id, 'project_page_context', true );
			$project_client = get_post_meta( $post_id, 'project_page_client', true );
			$project_location = get_post_meta( $post_id, 'project_page_location', true );
		?>
		<h2><?php echo $project_title ?></h2>
		<h3><?php echo $project_context ?></h3>
		<h4><?php echo $project_client ?> - <?php echo $project_location ?></h4>
	</div>

	<div class="project-description">
	<?php
		the_content();
	?>
	</div>
</div>
