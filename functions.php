<?php
/**
 * the functions
 *
 * @package WordPress
 * @subpackage Interior Design
 */

function setup_interiordesign() {
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'interiordesign' ),
		'contact'  => __( 'Contact Menu', 'interiordesign' ),
	) );

    /*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

    add_editor_style( array( 'css/editor-style.css') );
}
add_action( 'after_setup_theme', 'setup_interiordesign');

/**
 * Register meta box(es).
 */
function register_project_meta_boxes($posttype, $post) {
	if ( 'templates/project.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
		add_meta_box( 'project-atributes', 
			__( 'Project Data', 'textdomain' ), 
			'project_meta_boxes', 
			'page'
		);
	}
}
add_action( 'add_meta_boxes', 'register_project_meta_boxes', 10, 2);
 
function project_meta_box($post, $root, $title){?>
	<?php wp_nonce_field( basename( __FILE__ ), 'project_page_' . $root . '_nonce' ); ?>
	<p>
		<label for="project_page_<?php echo $root ?>"><?php _e( $title, 'example' ); ?></label>
		<br />
		<input class="widefat" type="text" name="project_page_<?php echo $root ?>" id="project_page_<?php echo $root ?>" value="<?php echo esc_attr( get_post_meta( $post->ID, 'project_page_' . $root, true ) ); ?>" maxlength="100" />
	</p>
<?php
}

function project_meta_boxes( $post ) {
	project_meta_box($post, 'galleryid', 'UR Image Slider Id');
	project_meta_box($post, 'title', 'Title');
	project_meta_box($post, 'context', 'Context');
	project_meta_box($post, 'client', 'Company/Client');
	project_meta_box($post, 'location', 'Location');
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function project_save_one_meta($post_id, $post, $root){
	  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['project_page_' . $root . '_nonce'] ) || !wp_verify_nonce( $_POST['project_page_' . $root . '_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['project_page_' . $root] ) ? esc_attr( $_POST['project_page_' . $root] ) : '' );

  /* Get the meta key. */
  $meta_key = 'project_page_' . $root;

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}

function project_save_meta( $post_id, $post ) {
	if ( 'templates/project.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
		project_save_one_meta($post_id, $post, 'galleryid');
		project_save_one_meta($post_id, $post, 'title');
		project_save_one_meta($post_id, $post, 'context');
		project_save_one_meta($post_id, $post, 'client');
		project_save_one_meta($post_id, $post, 'location');
	}
}
add_action( 'save_post', 'project_save_meta' , 10, 2);

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function interiordesign_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'interiordesign_javascript_detection', 0 );

function interiordesign_scripts() {
    // Theme stylesheet.
	wp_enqueue_style( 'interiordesign-style', get_stylesheet_uri() );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array ( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'interiordesign_scripts' );