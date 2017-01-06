<?php

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
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'supports'           => ['title', 'editor', 'author', 'custom-fields', 'thumbnail'],
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

/**
 *
 */
function wpsite_register_taxonomy()
{
	$singular = 'Topic';
	$plural = 'Topics';

	$labels = array(
		'name'                          => $plural,
		'singular_name'                 => $singular,
		'search_items'                  => 'Search ' .$plural,
		'all_items'                     => 'All ' .$plural,
		'popular_items'                 => 'Popular ' .$plural,
		'parent_item'                   => null,
		'parent_item_colon'             => null,
		'edit_item'                     => 'Edit '.$singular,
		'update_item'                   => 'Update '.$singular,
		'add_new_item'                  => 'Add New '.$singular,
		'new_item_name'                 => 'New '.$singular. ' Name',
		'menu_name'                     => $plural,
		'separate_items_with_commas'    => 'Separate '.$plural. ' with commas',
		'add_or_remove_items'           => 'Add or remove ' .$plural,
		'choose_from_most_used'         => 'Choose from most used ' .$plural,
		'not_found'                     => 'No ' .$plural.' found',
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'topic', 'code_snip', $args );
}
add_action('init', 'wpsite_register_taxonomy');


