<?php
/**
 * the functions
 *
 * @package WordPress
 * @subpackage THWP
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

function thwp_scripts() {
    // Theme stylesheet.
	wp_enqueue_style( 'thwp-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'thwp_scripts' );