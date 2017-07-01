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