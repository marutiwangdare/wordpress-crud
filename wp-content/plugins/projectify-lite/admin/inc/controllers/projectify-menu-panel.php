<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

/**
 *  Menu class to add menu panels
 */
class btpjy_AdminMenu {
	
	function __construct() {

		/* Action for creating menu pages */
		add_action( 'admin_menu', array( 'btpjy_AdminMenu', 'btpjy_create_menu' ) );
		add_action( 'admin_menu', array( 'btpjy_AdminMenu', 'btpjy_team_member_menu' ) );

	}

	public static function btpjy_create_menu() {
        $dashboard = add_menu_page( esc_html__( 'Projectify Lite', 'projectify' ), esc_html__( 'Projectify Lite', 'projectify' ), 'manage_options', 'projectify-pro-panel', array(
			'btpjy_AdminMenu',
			'btpjy_dashboard'
		), 'dashicons-portfolio', 25 );
		add_action( 'admin_print_styles-' . $dashboard, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

		$dashboard1 = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Projectify Lite', 'projectify' ), esc_html__( 'Dashboard', 'projectify' ), 'manage_options', 'projectify-pro-panel', array(
			'btpjy_AdminMenu',
			'btpjy_dashboard'
		) );
		add_action( 'admin_print_styles-' . $dashboard1, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

		$team = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Teams', 'projectify' ), esc_html__( 'Teams', 'projectify' ), 'manage_options', 'projectify-pro-teams', array(
			'btpjy_AdminMenu',
			'btpjy_teams'
		) );
		add_action( 'admin_print_styles-' . $team, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

        $team_members = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Members', 'projectify' ), esc_html__( 'Members', 'projectify' ), 'manage_options', 'projectify-pro-members', array(
			'btpjy_AdminMenu',
			'btpjy_members'
		) );
		add_action( 'admin_print_styles-' . $team_members, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

        $projects = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Projects', 'projectify' ), esc_html__( 'Projects', 'projectify' ), 'manage_options', 'projectify-pro-projects', array(
			'btpjy_AdminMenu',
			'btpjy_projects'
		) );
		add_action( 'admin_print_styles-' . $projects, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

        $tasks = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Tasks', 'projectify' ), esc_html__( 'Tasks', 'projectify' ), 'manage_options', 'projectify-pro-tasks', array(
			'btpjy_AdminMenu',
			'btpjy_tasks'
		) );
		add_action( 'admin_print_styles-' . $tasks, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

		$announcements = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Announcements', 'projectify' ), esc_html__( 'Announcements', 'projectify' ), 'manage_options', 'projectify-pro-announcements', array(
			'btpjy_AdminMenu',
			'btpjy_announcements'
		) );
		add_action( 'admin_print_styles-' . $announcements, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

        $settings = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Settings', 'projectify' ), esc_html__( 'Settings', 'projectify' ), 'manage_options', 'projectify-pro-settings', array(
			'btpjy_AdminMenu',
			'btpjy_settings'
		) );
		add_action( 'admin_print_styles-' . $settings, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

		$gopro = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Go Pro', 'projectify' ). ' <i class="fas fa-star go-pro-icon"></i>', esc_html__( 'Go Pro', 'projectify' ). ' <i class="fas fa-star go-pro-icon"></i>', 'manage_options', 'projectify-pro-gopro', array(
			'btpjy_AdminMenu',
			'btpjy_gopro'
		) );
		add_action( 'admin_print_styles-' . $gopro, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );
    }

    public static function btpjy_team_member_menu() {
    	$user_id = get_current_user_id();
		$members = btpjy_Helper::btpjy_member_info( $user_id );
		if ( ! empty( $members ) ) {
			$dashboard1 = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Dashboarda', 'projectify' ), esc_html__( 'Dashboard', 'projectify' ), 'subscriber', 'projectify-pro-panel-member-dashboard', array(
				'btpjy_AdminMenu',
				'btpjy_teammember_dashboard'
			) );
			add_action( 'admin_print_styles-' . $dashboard1, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

	        $team_members = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Members', 'projectify' ), esc_html__( 'Members', 'projectify' ), 'subscriber', 'projectify-pro-team-members', array(
				'btpjy_AdminMenu',
				'btpjy_teammember_members'
			) );
			add_action( 'admin_print_styles-' . $team_members, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );


	        $projects = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Projects', 'projectify' ), esc_html__( 'Projects', 'projectify' ), 'subscriber', 'projectify-pro-member-projects', array(
				'btpjy_AdminMenu',
				'btpjy_teammember_projects'
			) );
			add_action( 'admin_print_styles-' . $projects, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

	        $tasks = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Tasks', 'projectify' ), esc_html__( 'Tasks', 'projectify' ), 'subscriber', 'projectify-pro-member-tasks', array(
				'btpjy_AdminMenu',
				'btpjy_teammember_tasks'
			) );
			add_action( 'admin_print_styles-' . $tasks, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

			$announcement = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Announcements', 'projectify' ), esc_html__( 'Announcements', 'projectify' ), 'subscriber', 'projectify-pro-member-announcements', array(
				'btpjy_AdminMenu',
				'btpjy_teammember_announcements'
			) );
			add_action( 'admin_print_styles-' . $announcement, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );

			$profile = add_submenu_page( 'projectify-pro-panel', esc_html__( 'Profile', 'projectify' ), esc_html__( 'Profile', 'projectify' ), 'subscriber', 'projectify-pro-member-profile', array(
				'btpjy_AdminMenu',
				'btpjy_teammember_profile'
			) );
			add_action( 'admin_print_styles-' . $profile, array( 'btpjy_AdminMenu', 'btpjy_dashboard_assets' ) );
		}
    }

    public static function btpjy_dashboard() {
        require_once( 'projectify-dashboard-panel.php' );
    }

    public static function btpjy_teams() {
		require_once( 'projectify-teams-panel.php' );
    }

	public static function btpjy_members() {
		require_once( 'projectify-members-panel.php' );
    }

    public static function btpjy_projects() {
		require_once( 'projectify-projects-panel.php' );
    }

    public static function btpjy_tasks() {
		require_once( 'projectify-tasks-panel.php' );
    }

    public static function btpjy_announcements() {
		require_once( 'projectify-announce-panel.php' );
    }

    public static function btpjy_settings() {
		require_once( 'projectify-settings-panel.php' );
    }

    public static function btpjy_gopro() {
		require_once( 'projectify-settings-gopro.php' );
    }

    public static function btpjy_teammember_dashboard() {
        require_once( BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/dashboard-panel.php' );
    }
    public static function btpjy_teammember_members() {
        require_once( BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/members-panel.php' );
    }
    public static function btpjy_teammember_projects() {
        require_once( BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/project-panel.php' );
    }
    public static function btpjy_teammember_tasks() {
        require_once( BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/task-panel.php' );
    }
    public static function btpjy_teammember_announcements() {
        require_once( BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/announcements-panel.php' );
    }
    public static function btpjy_teammember_profile() {
        require_once( BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/profile-panel.php' );
    }

    public static function btpjy_dashboard_assets() {
        self::btpjy_enqueue_libraries();
		self::btpjy_enqueue_custom_assets();
    }

    public static function btpjy_enqueue_libraries() {

        /* Enqueue styles */
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'toastr', BTPJL_PLUGIN_URL . 'assets/css/toastr.min.css');
        wp_enqueue_style( 'jquery-confirm', BTPJL_PLUGIN_URL . 'assets/css/jquery-confirm.min.css');
		wp_enqueue_style( 'fontawesome', BTPJL_PLUGIN_URL . 'assets/css/fontawesome/css/all.min.css' );
		wp_enqueue_style( 'ki-icons', BTPJL_PLUGIN_URL . 'assets/css/ki-icon.min.css' );
        // wp_enqueue_style( 'dataTables', BTPJL_PLUGIN_URL . 'assets/css/dataTables.bootstrap4.min.css' );
		wp_enqueue_style( 'datetimepicker', BTPJL_PLUGIN_URL . 'assets/css/bootstrap-datetimepicker.min.css' );
		wp_enqueue_style( 'datatable', BTPJL_PLUGIN_URL . 'assets/css/datatables.bundle.css' );
		wp_enqueue_style( 'btpjy-layout-style', BTPJL_PLUGIN_URL . 'assets/css/layout-style.css' );
		wp_enqueue_style( 'btpjy-wizard-style', BTPJL_PLUGIN_URL . 'assets/css/wizard.css' );
		wp_enqueue_style( 'bootstrap-select', BTPJL_PLUGIN_URL . 'assets/css/bootstrap-select.min.css' );

        /* Enqueue Scripts */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_media();
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-form' );
		wp_enqueue_script( 'moment-2.24.0', BTPJL_PLUGIN_URL . 'assets/js/moment.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'popper', BTPJL_PLUGIN_URL . 'assets/js/popper.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'bootstrap', BTPJL_PLUGIN_URL . 'assets/js/bootstrap.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'toastr-js', BTPJL_PLUGIN_URL . 'assets/js/toastr.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'jquery-confirm-js', BTPJL_PLUGIN_URL . 'assets/js/jquery-confirm.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'jquery.dataTables', BTPJL_PLUGIN_URL . 'assets/js/jquery.dataTables.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'bootstrap-select', BTPJL_PLUGIN_URL . 'assets/js/bootstrap-select.min.js', array( 'jquery' ), true, true );
		wp_enqueue_script( 'bootstrap-datetimepicker', BTPJL_PLUGIN_URL . 'assets/js/bootstrap-datetimepicker.min.js', array( 'jquery' ), true, true );

    }

    public static function btpjy_enqueue_custom_assets() {
        wp_enqueue_style( 'btpjy-custom-style', BTPJL_PLUGIN_URL . 'admin/css/admin-style.css' );
		wp_enqueue_script( 'btpjy-custom-script', BTPJL_PLUGIN_URL . 'admin/js/admin-script.js' );
		wp_localize_script( 'btpjy-custom-script', 'ajax_admin', array(
            'ajax_url'    => admin_url( 'admin-ajax.php' ),
            'btpjy_nonce' => wp_create_nonce( 'btpjy_ajax_nonce' ),
        ));
    }
}

new btpjy_AdminMenu();