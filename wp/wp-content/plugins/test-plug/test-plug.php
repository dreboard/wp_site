<?php
/*
Plugin Name: Test Plugin
Description: Testing wp-cli plugin
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
function dwwp_run_test_plug(){
    remove_meta_box('dashboard_primary', 'dashboard', 'post_container_1');
}

add_action('wp_dashboard_setup', 'dwwp_run_test_plug');
//add_filter('wp_hook', 'dwwp_run_test_plug');
