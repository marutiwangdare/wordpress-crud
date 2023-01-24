<?php
defined( 'ABSPATH' ) or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

class btpjy_CommentActions {

	/* Save Comment */
	public static function btpjy_save_comments() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_comments_nounce'], 'btpjy_save_comments' ) ) {
			die();
		}

		$comment    = isset( $_POST['comment'] ) ? wp_kses_post( $_POST['comment'] ) : '';
		$project_id = isset( $_POST['project_id'] ) ? sanitize_text_field( $_POST['project_id'] ) : '';
		$type       = isset( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : '';
		$type_id    = isset( $_POST['type_id'] ) ? sanitize_text_field( $_POST['type_id'] ) : '';
		$user_id    = isset( $_POST['user_id'] ) ? sanitize_text_field( $_POST['user_id'] ) : '';
		$media      = isset( $_POST['media'] ) ? array_map( 'sanitize_text_field', $_POST['media'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $comment ) ) {
			$message = esc_html__( 'Please enter comment first.', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'project_id'  => $project_id,
				'type'        => $type,
				'type_id'     => $type_id,
				'user_id'     => $user_id,
				'comment'     => $comment,
				'date'        => date( 'Y-m-d' ),
				'time'        => date( 'H:i:s' ),
				'media'       => serialize( $media ),
				'status'      => esc_html__( 'New', 'projectify' ),
			);

			$table_name = 'btpjy_comments';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {
				btpjy_Helper::btpjy_send_new_comment_details( $project_id, $type, $type_id, $comment, $user_id );
				wp_send_json_success( array( 'message' => esc_html__( 'Comment Added', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Comment not added', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Edit Comment */
	public static function btpjy_edit_comments() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_edit_comments_nounce'], 'btpjy_edit_comments' ) ) {
			die();
		}

		$comment = isset( $_POST['edit_comment'] ) ? wp_kses_post( $_POST['edit_comment'] ) : '';
		$id      = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';
		$media   = isset( $_POST['media'] ) ? array_map( 'sanitize_text_field', $_POST['media'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $comment ) ) {
			$message = esc_html__( 'Please enter comment first.', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'comment'     => $comment,
				'date'        => date( 'Y-m-d' ),
				'time'        => date( 'H:i:s' ),
				'media'       => serialize( $media ),
				'status'      => esc_html__( 'Edited', 'projectify' ),
			);
			$where = array(
				'id' => $id
			);
			$table_name = 'btpjy_comments';
			$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );;
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Comment Edited', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Comment not Edited', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Fetch Comment Details */
	public static function btpjy_fetch_comments() {
		check_ajax_referer( 'btpjy_ajax_nonce', 'nounce' );

		if ( ! empty ( $_POST['id'] ) ) {
			global $wpdb;
			$id         = sanitize_text_field( $_POST['id'] );
			$table      = 'btpjy_comments';
			$table_name = $wpdb->base_prefix . "" .$table;
			$data       = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE id = %d", $id ) );
			$status     = 'success';
			$message    = esc_html__( 'Data fetched!.', 'clockify' );
			$inputs     = array(
				'edit_comment',
				'#id'
			);
			$values     = array(
				$data->comment,
				$data->id
			);

			$media_files = unserialize( $data->media );
			if ( ! empty ( $media_files ) ) {
				foreach ( $media_files as $mkey => $mvalue ) {
					$myFile   = pathinfo( $mvalue );
                    $validate = wp_check_filetype_and_ext( $mvalue, $myFile['basename'] );
                    if ( $validate["ext"] == 'jpg' || $validate["ext"] == 'png' ) { 
						$mfiles .= '<div class="myplugin-image-previeww"><img src="'.esc_attr( $mvalue ).'"></div>
	    							<input type="hidden" name="media[]" value="'.esc_attr( $mvalue ).'">';
	    			} else {
	    				$mfiles .= '<div class="comments-image-item">
                                        <a href="'.esc_attr( $media_value ).'">
                                            '.esc_html( $myFile['basename'] ).'
                                        </a>
                                    </div>';
	    			}
				}
			} else {
				$mfiles = '';
			}

		} else {
			$message = esc_html__( 'Something went wrong!.', 'projectify' );
			$status  = 'error';
			$inputs  = '';
			$values  = '';
			$mfiles  = '';
		}
		$return = array(
			'status'  => $status,
			'message' => $message,
			'inputs'  => $inputs,
			'values'  => $values,
			'mfiles'  => $mfiles,
		);
		wp_send_json( $return );
		wp_die();
	}
}