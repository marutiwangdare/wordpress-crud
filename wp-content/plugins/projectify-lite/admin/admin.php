<?php
defined( 'ABSPATH' ) or wp_die();

require_once( 'inc/controllers/projectify-menu-panel.php' );
require_once( 'inc/controllers/projectify-install-tables.php' );
require_once( 'inc/actions/projectify-members-action.php' );
require_once( 'inc/actions/projectify-teams-action.php' );
require_once( 'inc/actions/projectify-projects-action.php' );
require_once( 'inc/actions/projectify-announce-action.php' );
require_once( 'inc/actions/projectify-comments-action.php' );
require_once( 'inc/actions/projectify-settings-action.php' );

/* Action for creating data tables */
add_action( 'init', array( 'btpjy_InstallTables', 'btpjy_initiate_tables' ) );

/**-------------------------------------------------------------Teams-------------------------------------------------------------**/

/* Add Teams */
add_action( 'wp_ajax_nopriv_btpjy_save_teams_action', array( 'btpjy_TeamsActions', 'btpjy_save_teams' ) );
add_action( 'wp_ajax_btpjy_save_teams_action', array( 'btpjy_TeamsActions', 'btpjy_save_teams' ) );

/* Edit Teams */
add_action( 'wp_ajax_nopriv_btpjy_edit_teams_action', array( 'btpjy_TeamsActions', 'btpjy_edit_teams' ) );
add_action( 'wp_ajax_btpjy_edit_teams_action', array( 'btpjy_TeamsActions', 'btpjy_edit_teams' ) );

/**-------------------------------------------------------------Members-------------------------------------------------------------**/

/* Add Members */
add_action( 'wp_ajax_nopriv_btpjy_save_members_action', array( 'btpjy_MembersActions', 'btpjy_save_members' ) );
add_action( 'wp_ajax_btpjy_save_members_action', array( 'btpjy_MembersActions', 'btpjy_save_members' ) );

/* Edit Members */
add_action( 'wp_ajax_nopriv_btpjy_edit_members_action', array( 'btpjy_MembersActions', 'btpjy_edit_members' ) );
add_action( 'wp_ajax_btpjy_edit_members_action', array( 'btpjy_MembersActions', 'btpjy_edit_members' ) );

/* Add Department */
add_action( 'wp_ajax_nopriv_btpjy_add_departments', array( 'btpjy_MembersActions', 'btpjy_add_department' ) );
add_action( 'wp_ajax_btpjy_add_departments', array( 'btpjy_MembersActions', 'btpjy_add_department' ) );

/* Fetch Member */
add_action( 'wp_ajax_nopriv_btpjy_fetch_member', array( 'btpjy_MembersActions', 'btpjy_fetch_member_details' ) );
add_action( 'wp_ajax_btpjy_fetch_member', array( 'btpjy_MembersActions', 'btpjy_fetch_member_details' ) );

/**-------------------------------------------------------------Projects-------------------------------------------------------------**/

/* Add Projects */
add_action( 'wp_ajax_nopriv_btpjy_save_projects_action', array( 'btpjy_ProjectsActions', 'btpjy_save_projects' ) );
add_action( 'wp_ajax_btpjy_save_projects_action', array( 'btpjy_ProjectsActions', 'btpjy_save_projects' ) );

/* Edit Projects */
add_action( 'wp_ajax_nopriv_btpjy_edit_projects_action', array( 'btpjy_ProjectsActions', 'btpjy_edit_projects' ) );
add_action( 'wp_ajax_btpjy_edit_projects_action', array( 'btpjy_ProjectsActions', 'btpjy_edit_projects' ) );

/* Delete Task Details */
add_action( 'wp_ajax_nopriv_btpjy_delete_tasks_details', array( 'btpjy_ProjectsActions', 'btpjy_delete_task_details' ) );
add_action( 'wp_ajax_btpjy_delete_tasks_details', array( 'btpjy_ProjectsActions', 'btpjy_delete_task_details' ) );

/* Select Project */
add_action( 'wp_ajax_nopriv_btpjy_select_project', array( 'btpjy_ProjectsActions', 'btpjy_select_projects' ) );
add_action( 'wp_ajax_btpjy_select_project', array( 'btpjy_ProjectsActions', 'btpjy_select_projects' ) );

/* Add Messages */
add_action( 'wp_ajax_nopriv_btpjy_add_messages', array( 'btpjy_ProjectsActions', 'btpjy_add_messages' ) );
add_action( 'wp_ajax_btpjy_add_messages', array( 'btpjy_ProjectsActions', 'btpjy_add_messages' ) );

/* Add Bugs */
add_action( 'wp_ajax_nopriv_btpjy_add_bugs', array( 'btpjy_ProjectsActions', 'btpjy_add_bugs' ) );
add_action( 'wp_ajax_btpjy_add_bugs', array( 'btpjy_ProjectsActions', 'btpjy_add_bugs' ) );

/* Edit Bugs */
add_action( 'wp_ajax_nopriv_btpjy_edit_bugs', array( 'btpjy_ProjectsActions', 'btpjy_edit_bugs' ) );
add_action( 'wp_ajax_btpjy_edit_bugs', array( 'btpjy_ProjectsActions', 'btpjy_edit_bugs' ) );

/* Add Files */
add_action( 'wp_ajax_nopriv_btpjy_add_files', array( 'btpjy_ProjectsActions', 'btpjy_add_files' ) );
add_action( 'wp_ajax_btpjy_add_files', array( 'btpjy_ProjectsActions', 'btpjy_add_files' ) );

/* Set Project Progress */
add_action( 'wp_ajax_nopriv_btpjy_set_project_progress', array( 'btpjy_ProjectsActions', 'btpjy_set_project_progress' ) );
add_action( 'wp_ajax_btpjy_set_project_progress', array( 'btpjy_ProjectsActions', 'btpjy_set_project_progress' ) );

/**-------------------------------------------------------------Tasks-------------------------------------------------------------**/

/* Add Tasks */
add_action( 'wp_ajax_nopriv_btpjy_save_tasks', array( 'btpjy_ProjectsActions', 'btpjy_add_tasks' ) );
add_action( 'wp_ajax_btpjy_save_tasks', array( 'btpjy_ProjectsActions', 'btpjy_add_tasks' ) );

/* Fetch Tasks */
add_action( 'wp_ajax_nopriv_btpjy_fetch_tasks', array( 'btpjy_ProjectsActions', 'btpjy_fetch_tasks' ) );
add_action( 'wp_ajax_btpjy_fetch_tasks', array( 'btpjy_ProjectsActions', 'btpjy_fetch_tasks' ) );

/* Edit Tasks */
add_action( 'wp_ajax_nopriv_btpjy_edit_tasks', array( 'btpjy_ProjectsActions', 'btpjy_edit_tasks' ) );
add_action( 'wp_ajax_btpjy_edit_tasks', array( 'btpjy_ProjectsActions', 'btpjy_edit_tasks' ) );

/**-------------------------------------------------------------Announcements-------------------------------------------------------------**/

/* Add Announcement */
add_action( 'wp_ajax_nopriv_btpjy_save_announces', array( 'btpjy_AnnounceActions', 'btpjy_save_announce' ) );
add_action( 'wp_ajax_btpjy_save_announces', array( 'btpjy_AnnounceActions', 'btpjy_save_announce' ) );

/* Edit Announcement */
add_action( 'wp_ajax_nopriv_btpjy_edit_announces', array( 'btpjy_AnnounceActions', 'btpjy_edit_announce' ) );
add_action( 'wp_ajax_btpjy_edit_announces', array( 'btpjy_AnnounceActions', 'btpjy_edit_announce' ) );

/**-------------------------------------------------------------Comments-------------------------------------------------------------**/

/* Add Comments */
add_action( 'wp_ajax_nopriv_btpjy_save_comments', array( 'btpjy_CommentActions', 'btpjy_save_comments' ) );
add_action( 'wp_ajax_btpjy_save_comments', array( 'btpjy_CommentActions', 'btpjy_save_comments' ) );

/* Fetch Comments */
add_action( 'wp_ajax_nopriv_btpjy_fetch_comment', array( 'btpjy_CommentActions', 'btpjy_fetch_comments' ) );
add_action( 'wp_ajax_btpjy_fetch_comment', array( 'btpjy_CommentActions', 'btpjy_fetch_comments' ) );

/* Edit Comments */
add_action( 'wp_ajax_nopriv_btpjy_edit_comments', array( 'btpjy_CommentActions', 'btpjy_edit_comments' ) );
add_action( 'wp_ajax_btpjy_edit_comments', array( 'btpjy_CommentActions', 'btpjy_edit_comments' ) );

/**-------------------------------------------------------------Settings-------------------------------------------------------------**/

/* General Settings */
add_action( 'wp_ajax_nopriv_btpjy_settings', array( 'btpjy_SettingsActions', 'btpjy_save_general_settings' ) );
add_action( 'wp_ajax_btpjy_settings', array( 'btpjy_SettingsActions', 'btpjy_save_general_settings' ) );

/* Email Settings */
add_action( 'wp_ajax_nopriv_btpjy_email_templates', array( 'btpjy_SettingsActions', 'btpjy_save_email_settings' ) );
add_action( 'wp_ajax_btpjy_email_templates', array( 'btpjy_SettingsActions', 'btpjy_save_email_settings' ) );

/* SMS Settings */
add_action( 'wp_ajax_nopriv_btpjy_email_settings', array( 'btpjy_SettingsActions', 'btpjy_save_email_settings_settings' ) );
add_action( 'wp_ajax_btpjy_email_settings', array( 'btpjy_SettingsActions', 'btpjy_save_email_settings_settings' ) );

/**-------------------------------------------------------------Extra-------------------------------------------------------------**/

/**
 * Allow Members to upload media files
 */
class BTPJL_AllowUserMedia {
	
	function __construct() {
		add_action( 'init', array( 'BTPJL_AllowUserMedia', 'btpjy_allow_subscriber_uploads' ) );
		add_action( 'pre_get_posts', array( 'BTPJL_AllowUserMedia', 'btpjy_users_own_attachments' ) );
	}

	public static function btpjy_allow_subscriber_uploads() {
		if ( current_user_can('subscriber') && !current_user_can('upload_files') ){
			$contributor = get_role('subscriber');
			$contributor->add_cap('upload_files');
		}
		if ( current_user_can('btpjy_client') && !current_user_can('upload_files') ){
			$contributor = get_role('btpjy_client');
			$contributor->add_cap('upload_files');
		}
	}

	public static function btpjy_users_own_attachments( $wp_query_obj ) {

		global $current_user, $pagenow;

		$is_attachment_request = ($wp_query_obj->get('post_type')=='attachment');

		if( !$is_attachment_request )
			return;

		if( !is_a( $current_user, 'WP_User') )
			return;

		if( !in_array( $pagenow, array( 'upload.php', 'admin-ajax.php' ) ) )
			return;

		if( !current_user_can('delete_pages') )
			$wp_query_obj->set('author', $current_user->ID );

		return;
	}
}
new BTPJL_AllowUserMedia();