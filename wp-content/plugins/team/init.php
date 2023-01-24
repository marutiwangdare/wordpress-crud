<?php
/*
Plugin Name: Team Management
Description:
Version: 1
Author: sinetiks.com
Author URI: http://sinetiks.com
*/
// function to create the DB / Options / Defaults					
function ss_options_install()
{

	global $wpdb;

	$table_name = $wpdb->prefix . "school";
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');

//menu items
add_action('admin_menu', 'sinetiks_schools_modifymenu');
function sinetiks_schools_modifymenu()
{

	//this is the main item for the menu
	add_menu_page(
		'Team Management', //page title
		'Team', //menu title
		'manage_options', //capabilities
		'swrj_team_dashboard', //menu slug
		'swrj_team_dashboard' //function
	);

	//this is a submenu
	add_submenu_page(
		'swrj_team_dashboard', //parent slug
		'categories', //page title
		'categories', //menu title
		'manage_options', //capability
		'swrj_category_list', //menu slug
		'swrj_category_list'
	); //function
	//this is a submenu
	add_submenu_page(
		'swrj_team_dashboard', //parent slug
		'Add New School', //page title
		'Add New', //menu title
		'manage_options', //capability
		'sinetiks_schools_create', //menu slug
		'sinetiks_schools_create'
	); //function

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(
		null, //parent slug
		'Update School', //page title
		'Update', //menu title
		'manage_options', //capability
		'sinetiks_schools_update', //menu slug
		'sinetiks_schools_update'
	); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'dashboard.php');
require_once(ROOTDIR . 'category/list.php');
require_once(ROOTDIR . 'category/create.php');
require_once(ROOTDIR . 'category/update.php');
