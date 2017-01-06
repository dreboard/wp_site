<?php
/*
Plugin Name: Code Snips
Description: Display code snippets
Version:     1.0.0
Plugin URI:  https://github.com/dreboard
Author:      Andre Board
Author URI:  https://github.com/dreboard
Text Domain: code-snips
License:     GPL v2 or later

Copyright 2016 Andre Board

*/
if(!defined('ABSPATH')){
	exit();
}

/**
 * Create the new post type Code Snips
 */
function wpsite_register_post_type()
{
	$singular = 'Code Snip';
	$plural = 'Code Snips';

	$labels = [
		'name' => $plural,
		'sigular_name' => $singular,
		'add_name' => 'Create New',
		'add_new_item' => 'Create New '.$singular,
		'edit' => 'Edit Snip',
		'edit_item' => 'Edit '.$plural,
		'new_item' => 'Create New '.$singular,
		'view' => 'View '.$singular,
		'view_item' => 'View '.$singular,
		'search_items' => 'Search '.$plural,
		'parent' => 'Parent '.$singular,
		'not_found' => 'No '.$plural. ' found.',
		'not_found_in_trash' => 'No '.$plural. ' found in trash.',
	];


	$args = array(
		'labels'             => $labels,
		'description'        => 'Display code snippets',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-editor-code',
		'can_export' => true,
		'can_delete_with_user' => true,
		'map_meta_cap' => true,
		'show_in_admin_bar'       => true,
		'menu_position'     => 10,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ],
		'rewrite' => [
			'slug' => 'code_snips',
			'with_front' => true,
			'pages' => true,
			'feeds' => true
		]
	);
	register_post_type('code_snip', $args);
}

add_action('init', 'wpsite_register_post_type');