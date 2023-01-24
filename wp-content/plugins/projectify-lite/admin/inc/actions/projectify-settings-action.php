<?php
defined( 'ABSPATH' ) or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

class btpjy_SettingsActions {

	/* Save general settings */
	public static function btpjy_save_general_settings() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_setting_options'], 'btpjy_save_settings' ) ) {
			die();
		}

		$company_name   = isset( $_POST['company_name'] ) ? sanitize_text_field( $_POST['company_name'] ) : '';
		$company_logo   = isset( $_POST['company_logo'] ) ? sanitize_text_field( $_POST['company_logo'] ) : '';
		$date_format    = isset( $_POST['date_format'] ) ? sanitize_text_field( $_POST['date_format'] ) : '';
		$time_format    = isset( $_POST['time_format'] ) ? sanitize_text_field( $_POST['time_format'] ) : '';
		$cur_symbol     = isset( $_POST['cur_symbol'] ) ? sanitize_text_field( $_POST['cur_symbol'] ) : '';
		$cur_position   = isset( $_POST['cur_position'] ) ? sanitize_text_field( $_POST['cur_position'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $company_name ) ) {
			$message = esc_html__( 'Please enter your company name.', 'projectify' );
		}
		if ( empty ( $date_format ) ) {
			$message = esc_html__( 'Please select date format.', 'projectify' );
		}
		if ( empty ( $time_format ) ) {
			$message = esc_html__( 'Please select time format.', 'projectify' );
		}
		if ( empty ( $cur_symbol ) ) {
			$message = esc_html__( 'Please enter your currency symbol here.', 'projectify' );
		}
		if ( empty ( $cur_position ) ) {
			$message = esc_html__( 'Please select currency position', 'projectify' );
		}
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'company_name'   => $company_name,
				'company_logo'   => $company_logo,
				'date_format'    => $date_format,
				'time_format'    => $time_format,
				'cur_symbol'     => $cur_symbol,
				'cur_position'   => $cur_position,
			);
			update_option( 'btpjy_settings', $data );
			wp_send_json_success( array( 'message' => esc_html__( 'Settings updated successfully', 'projectify' ) ) );
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Save email settings */
	public static function btpjy_save_email_settings() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_email_templates_options'], 'btpjy_save_email_templates' ) ) {
			die();
		}

		$member_account_subject    = isset( $_POST['member_account_subject'] ) ? sanitize_text_field( $_POST['member_account_subject'] ) : '';
		$member_account_heading    = isset( $_POST['member_account_heading'] ) ? sanitize_text_field( $_POST['member_account_heading'] ) : '';
		$member_account_body       = isset( $_POST['member_account_body'] ) ? wp_kses_post( $_POST['member_account_body'] ) : '';
		$project_assigneed_subject = isset( $_POST['project_assigneed_subject'] ) ? sanitize_text_field( $_POST['project_assigneed_subject'] ) : '';
		$project_assigneed_heading = isset( $_POST['project_assigneed_heading'] ) ? sanitize_text_field( $_POST['project_assigneed_heading'] ) : '';
		$project_assigneed_body    = isset( $_POST['project_assigneed_body'] ) ? wp_kses_post( $_POST['project_assigneed_body'] ) : '';
		$task_assigneed_subject    = isset( $_POST['task_assigneed_subject'] ) ? sanitize_text_field( $_POST['task_assigneed_subject'] ) : '';
		$task_assigneed_heading    = isset( $_POST['task_assigneed_heading'] ) ? sanitize_text_field( $_POST['task_assigneed_heading'] ) : '';
		$task_assigneed_body       = isset( $_POST['task_assigneed_body'] ) ? wp_kses_post( $_POST['task_assigneed_body'] ) : '';
		$new_comment_subject       = isset( $_POST['new_comment_subject'] ) ? sanitize_text_field( $_POST['new_comment_subject'] ) : '';
		$new_comment_heading       = isset( $_POST['new_comment_heading'] ) ? sanitize_text_field( $_POST['new_comment_heading'] ) : '';
		$new_comment_body          = isset( $_POST['new_comment_body'] ) ? wp_kses_post( $_POST['new_comment_body'] ) : '';
		$new_announcement_subject  = isset( $_POST['new_announcement_subject'] ) ? sanitize_text_field( $_POST['new_announcement_subject'] ) : '';
		$new_announcement_heading  = isset( $_POST['new_announcement_heading'] ) ? sanitize_text_field( $_POST['new_announcement_heading'] ) : '';
		$new_announcement_body     = isset( $_POST['new_announcement_body'] ) ? wp_kses_post( $_POST['new_announcement_body'] ) : '';

		$message        = '';
		$member_account = [
            'subject' => $member_account_subject,
            'heading' => $member_account_heading,
			'body'    => $member_account_body,
			'tags'    => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {full_name}, {first_name}, {login_url}, {company_name}, {account_details}.'
		];

		$project_assigneed = [
            'subject' => $project_assigneed_subject,
            'heading' => $project_assigneed_heading,
			'body'    => $project_assigneed_body,
			'tags'    => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {project_name}, {project_url}, {login_url}, {company_name}, {full_name}, {project_description}.'
		];

		$task_assigneed = [
            'subject' => $task_assigneed_subject,
            'heading' => $task_assigneed_heading,
			'body'    => $task_assigneed_body,
			'tags'    => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {task_name}, {task_url}, {login_url}, {company_name}, {full_name}, {task_description}.'
		];

		$new_comment = [
            'subject' => $new_comment_subject,
            'heading' => $new_comment_heading,
			'body'    => $new_comment_body,
			'tags'    => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {comment_on}, {comment_url}, {login_url}, {company_name}, {full_name}, {comment_text}.'
		];

		$new_announcement = [
            'subject' => $new_announcement_subject,
            'heading' => $new_announcement_heading,
			'body'    => $new_announcement_body,
			'tags'    => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {company_name}, {full_name}, {announcement_text}.'
		];

		if ( empty( $message ) ) {
			$data = array(
				'member_account'    => $member_account,
				'project_assigneed' => $project_assigneed,
				'task_assigneed'    => $task_assigneed,
				'new_comment'       => $new_comment,
				'new_announcement'  => $new_announcement,
			);
			update_option( 'btpjy_email_templates', $data );
			wp_send_json_success( array( 'message' => esc_html__( 'Settings updated successfully', 'projectify' ) ) );
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	public static function btpjy_save_email_settings_settings() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_email_settings_options'], 'btpjy_save_email_settings' ) ) {
			die();
		}

		$email_enable      = isset( $_POST['email_enable'] ) ? sanitize_text_field( $_POST['email_enable'] ) : '';
		$email_from        = isset( $_POST['email_from'] ) ? sanitize_text_field( $_POST['email_from'] ) : '';
		$from_name         = isset( $_POST['from_name'] ) ? sanitize_text_field( $_POST['from_name'] ) : '';
		$footer_txt        = isset( $_POST['footer_txt'] ) ? wp_kses_post( $_POST['footer_txt'] ) : '';
		$member_account    = isset( $_POST['member_account'] ) ? sanitize_text_field( $_POST['member_account'] ) : '';
		$project_assigneed = isset( $_POST['project_assigneed'] ) ? sanitize_text_field( $_POST['project_assigneed'] ) : '';
		$task_assigneed    = isset( $_POST['task_assigneed'] ) ? sanitize_text_field( $_POST['task_assigneed'] ) : '';
		$new_comment       = isset( $_POST['new_comment'] ) ? sanitize_text_field( $_POST['new_comment'] ) : '';
		$new_announcement  = isset( $_POST['new_announcement'] ) ? sanitize_text_field( $_POST['new_announcement'] ) : '';

		/* validations */
		$message = '';
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'email_enable'          => $email_enable,
				'email_from'            => $email_from,
				'from_name'             => $from_name,
				'footer_txt'            => $footer_txt,
				'member_account'        => $member_account,
				'project_assigneed'     => $project_assigneed,
				'task_assigneed'        => $task_assigneed,
				'new_comment'           => $new_comment,
				'new_announcement'      => $new_announcement,
			);
			update_option( 'btpjy_email_settings', $data );
			wp_send_json_success( array( 'message' => esc_html__( 'Settings updated successfully', 'projectify' ) ) );
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

}