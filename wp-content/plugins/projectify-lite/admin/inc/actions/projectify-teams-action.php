<?php
defined( 'ABSPATH' ) or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

class btpjy_TeamsActions {

	/* Save teams */
	public static function btpjy_save_teams() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_teams_nounce'], 'btpjy_save_teams' ) ) {
			die();
		}

		$title       = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
		$description = isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : '';
		$status      = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : '';
		$leader      = isset( $_POST['leader'] ) ? sanitize_text_field( $_POST['leader'] ) : '';
		$user_ids    = isset( $_POST['user_ids'] ) ? array_map( 'sanitize_text_field', $_POST['user_ids'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $title ) ) {
			$message = esc_html__( 'Please enter team title.', 'projectify' );
		}
		if ( empty ( $user_ids ) ) {
			$message = esc_html__( 'Please select team member\'s', 'projectify' );
		}
		if ( empty ( $leader ) ) {
			$message = esc_html__( 'Please select team leader', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'name'        => $title,
				'description' => $description,
				'members'     => serialize( $user_ids ),
				'team_leader' => $leader,
				'status'      => $status,
			);

			$table_name = 'btpjy_teams';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Team created successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Team not created successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Edit teams */
	public static function btpjy_edit_teams() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_edit_teams_nounce'], 'btpjy_edit_teams' ) ) {
			die();
		}

		$title       = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
		$description = isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : '';
		$status      = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : '';
		$leader      = isset( $_POST['leader'] ) ? sanitize_text_field( $_POST['leader'] ) : '';
		$user_ids    = isset( $_POST['user_ids'] ) ? array_map( 'sanitize_text_field', $_POST['user_ids'] ) : '';
		$id          = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $title ) ) {
			$message = esc_html__( 'Please enter team title.', 'projectify' );
		}
		if ( empty ( $user_ids ) ) {
			$message = esc_html__( 'Please select team member\'s', 'projectify' );
		}
		if ( empty ( $leader ) ) {
			$message = esc_html__( 'Please select team leader', 'projectify' );
		}
		
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'name'        => $title,
				'description' => $description,
				'members'     => serialize( $user_ids ),
				'team_leader' => $leader,
				'status'      => $status,
			);
			$where = array(
				'id' => $id
			);
			$table_name = 'btpjy_teams';
			$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Team edited successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Team not edited successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}
}