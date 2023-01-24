<?php
defined( 'ABSPATH' ) or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

class btpjy_AnnounceActions {

	/* Save clients */
	public static function btpjy_save_announce() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_announces_nounce'], 'btpjy_save_announces' ) ) {
			die();
		}

		$a_title = isset( $_POST['a_title'] ) ? sanitize_text_field( $_POST['a_title'] ) : '';
		$a_desc  = isset( $_POST['a_desc'] ) ? sanitize_text_field( $_POST['a_desc'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $a_title ) ) {
			$message = esc_html__( 'Please enter title.', 'projectify' );
		}
		if ( empty ( $a_desc ) ) {
			$message = esc_html__( 'Please enter description.', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'title'       => $a_title,
				'description' => stripslashes( $a_desc ),
				'date'        => date( 'Y-m-d' ),
			);

			$table_name = 'btpjy_announcements';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			
			if ( $query == true ) {
				btpjy_Helper::btpjy_send_new_announcement_details( $a_desc );
				wp_send_json_success( array( 'message' => esc_html__( 'Announcement created successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Announcement not created successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Edit clients */
	public static function btpjy_edit_announce() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_edit_announces_nounce'], 'btpjy_edit_announces' ) ) {
			die();
		}

		$a_title = isset( $_POST['a_title'] ) ? sanitize_text_field( $_POST['a_title'] ) : '';
		$a_desc  = isset( $_POST['a_desc'] ) ? sanitize_text_field( $_POST['a_desc'] ) : '';
		$id      = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $a_title ) ) {
			$message = esc_html__( 'Please enter title.', 'projectify' );
		}
		if ( empty ( $a_desc ) ) {
			$message = esc_html__( 'Please enter description.', 'projectify' );
		}
		
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'title'       => $a_title,
				'description' => stripslashes( $a_desc )
			);
			$where = array(
				'id' => $id
			);
			$table_name = 'btpjy_announcements';
			$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Announcement edited successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Announcement not edited successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}
}