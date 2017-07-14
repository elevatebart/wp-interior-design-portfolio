<?php
/**
 * The template used for displaying contact content
 *
 * @package WordPress
 * @subpackage Interior Design
 */
?>

<article id="post-<?php the_ID(); ?>" class="contact-page">
	<div class="contact-content">
        <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( [300,300], ['class' => 'round-image']);  
            }
			the_content();
		?>
	</div>
    <div class="contact-form">
		<?php
            $post_id = get_the_ID();
            $contact_id = get_post_meta( $post_id, 'contact_form_id', true );
            if(!empty($contact_id)){
                echo do_shortcode('[contact-form-7 id="' . $contact_id . '" title="Contact"]'); 
            }
        ?>
    </div>
</article>