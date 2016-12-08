<?php
/*
Plugin Name: Test Post Types
Description: Test post types plugin
Version:     1.0.0
Plugin URI:  https://github.com/dreboard
Author:      Andre Board
Author URI:  https://github.com/dreboard
Text Domain: test-types
License:     GPL v2 or later

Copyright 2016 Andre Board

*/
defined( 'ABSPATH' ) or die( 'No access!' );

function dwwp_register_post_type(){
	$args = array('public' => true, 'label' => 'Test Listing');
	register_post_type('test', $args);
}
add_action('init', 'dwwp_register_post_type');
