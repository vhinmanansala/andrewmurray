<?php
/**
 * Main Functions File.
 *
 * @package andrewmurray
 */

// Load functions.
require_once 'inc/functions-admin.php';
require_once 'inc/functions-frontend.php';
require_once 'assets/src/blocks/content-thumbnail-slider/index.php';

function ngstyle_child_menu_items($item_output, $item, $depth, $args)
{
    if ($args->theme_location != 'main' || $depth !== 1) {
        return $item_output;
    }

    $element  = '<span class="arrow-icon"></span>';
    $element .= $item_output;

    return $element;
}
add_filter('walker_nav_menu_start_el', 'ngstyle_child_menu_items', 10, 4);

class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-menu-wrap-container'><div class='sub-menu-wrap'><ul class='sub-menu'>\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div></div>\n";
    }
}

add_filter('nav_menu_item_args', function ($args, $item, $depth) {
    $title = apply_filters('the_title', $item->title, $item->ID);
    $args->link_before = '<span>';
    $args->link_after = '</span>';

    return $args;
}, 10, 3);


add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
	register_rest_field( 
	    'page', // Where to add the field (Here, blog posts. Could be an array)
	    'featured_image_src', // Name of new field (You can call this anything)
    	array(
	        'get_callback'    => 'get_image_src',
	        'update_callback' => null,
	        'schema'          => null,
		)
    );
}

function get_image_src( $object, $field_name, $request ) {
	$feat_img_array = wp_get_attachment_image_src($object['featured_media'], 'full');
	return $feat_img_array;
}