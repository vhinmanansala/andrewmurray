<?php
/**
 * Admin functions.
 *
 * @package andrewmurray
 */

/**
 * Enqueue Editor Assets.
 */
function am_enqueue_block_editor_assets() {
	wp_dequeue_style( 'boylen-plus-editor' );

	wp_enqueue_style(
		'andrewmurray-editor',
		get_stylesheet_directory_uri() . '/assets/dist/editor.css',
		array( 'wp-edit-blocks', 'common', 'gumponents' ),
		1
	);

	wp_enqueue_script(
		'andrewmurray-editor',
		get_stylesheet_directory_uri() . '/assets/dist/editor.js',
		array( 'bn-blocks' ),
		1,
		false
	);
}
add_action( 'enqueue_block_editor_assets', 'am_enqueue_block_editor_assets', 20 );
