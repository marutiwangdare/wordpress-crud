<?php
/*
Plugin Name: Projectify Lite
Plugin URI:  https://beastthemes.com/plugins/projectify-pro
Description: Projectify Lite is the World’s most advanced project management system which helps you to run your business efficiently and effectively, providing all of the tools that you need to communicate with your clients and your team. Keep all your information in one place, easily accessible. This plugin provides you the features to create a project, tasks, also you can create annucements.
Author: beastthemes
Author URI: https://beastthemes.com/
Version: 1.0.1
Text Domain: projectify
Domain Path: /lang/
 */

defined( 'ABSPATH' ) or wp_die();

if ( ! defined( 'BTPJL_PLUGIN_URL' ) ) {
	define( 'BTPJL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'BTPJL_PLUGIN_DIR_PATH' ) ) {
	define( 'BTPJL_PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'BTPJL_PLUGIN_BASENAME' ) ) {
	define( 'BTPJL_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'BTPJL_PLUGIN_FILE' ) ) {
	define( 'BTPJL_PLUGIN_FILE', __FILE__ );
}

final class btpjl_Projectify_pro {
	private static $instance = null;

	private function __construct() {
		$this->initialize_hooks();
	}

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function initialize_hooks() {
		if ( is_admin() ) {
			require_once( 'admin/admin.php' );
		}
	}
}
btpjl_Projectify_pro::get_instance();