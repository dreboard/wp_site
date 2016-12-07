<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
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

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/


/**
 * @uses remove_meta_box( $id, $page, $context );
 */
function dwwp_run_test_plug(){
    remove_meta_box('dashboard_primary', 'dashboard', 'post_container_1');
}

add_action('wp_dashboard_setup', 'dwwp_run_test_plug');
//add_filter('wp_hook', 'dwwp_run_test_plug');
