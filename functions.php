<?php
/**
 * the functions
 *
 * @package WordPress
 * @subpackage Interior Design
 */

function setup_thwp() {
    // This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'thwp' ),
		'contact'  => __( 'Contact Menu', 'thwp' ),
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
add_action( 'after_setup_theme', 'setup_thwp');

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function thwp_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'thwp_javascript_detection', 0 );

function thwp_scripts() {
    // Theme stylesheet.
	wp_enqueue_style( 'thwp-style', get_stylesheet_uri() );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array ( 'jquery' ));
}
add_action( 'wp_enqueue_scripts', 'thwp_scripts' );