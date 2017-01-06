<?php
/*
Plugin Name: Test Plugin
Description: Testing wp features
Version:     1.0.0
Plugin URI:  https://github.com/dreboard
Author:      Andre Board
Author URI:  https://github.com/dreboard
Text Domain: test-plug
Domain Path: /languages/
License:     GPL v2 or later

Copyright 2016 Andre Board

*/
if(!defined('ABSPATH')){
	exit();
}

/**
 * @uses remove_meta_box( $id, $page, $context );
 */
function dwwp_remove_dashboard_news(){
    remove_meta_box('dashboard_primary', 'dashboard', 'postbox-container-2');
}

add_action('wp_dashboard_setup', 'dwwp_remove_dashboard_news');
//add_filter('wp_hook', 'dwwp_run_test_plug');


/**
 * Add link to google analytics on adminbar
 * @uses $wp_admin_bar
 */
function dwwp_add_google_link()
{
	global $wp_admin_bar;
	//echo '<pre>';
	//var_dump($wp_admin_bar);
	$args = [
		'id'    => 'google_analytics',
		'title' => 'Google Analytics',
		'href'  => 'https://analytics.google.com/'
		];
	$wp_admin_bar->add_menu($args);
}
add_action('wp_before_admin_bar_render', 'dwwp_add_google_link');