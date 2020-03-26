<?php
/**
 * Front-end functions.
 *
 * @package andrewmurray
 */

/**
 * Theme Setup.
 */
function am_theme_setup() {
}
add_action( 'after_setup_theme', 'am_theme_setup' );

/**
 * Enqueue Scripts.
 */
function am_enqueue_scripts() {

	// Enqueue CSS.
	wp_dequeue_style( 'boylen-plus' );
	wp_enqueue_style( 'andrewmurray', get_stylesheet_directory_uri() . '/assets/dist/theme.css', null, '1', 'all' );

	// Enqueue JavaScript.
	wp_dequeue_script( 'boylen-plus' );
	wp_enqueue_script( 'andrewmurray', get_stylesheet_directory_uri() . '/assets/dist/theme.js', array( 'jquery', 'wp-hooks' ), '1', true );

}
add_action( 'wp_enqueue_scripts', 'am_enqueue_scripts', 20 );
