<?php
defined( 'ABSPATH' ) or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

class btpjy_MembersActions {

	/* Save members */
	public static function btpjy_save_members() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_members_nounce'], 'btpjy_save_members' ) ) {
			die();
		}

		$entry          = isset( $_POST['entry'] ) ? sanitize_text_field( $_POST['entry'] ) : '';
		$user_id        = isset( $_POST['user_id'] ) ? sanitize_text_field( $_POST['user_id'] ) : '';
		$username       = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : '';
		$profile_avatar = isset( $_POST['profile_avatar'] ) ? sanitize_text_field( $_POST['profile_avatar'] ) : '';
		$firstname      = isset( $_POST['firstname'] ) ? sanitize_text_field( $_POST['firstname'] ) : '';
		$lastname       = isset( $_POST['lastname'] ) ? sanitize_text_field( $_POST['lastname'] ) : '';
		$phone          = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
		$email          = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$facebook       = isset( $_POST['facebook'] ) ? sanitize_text_field( $_POST['facebook'] ) : '';
		$skype          = isset( $_POST['skype'] ) ? sanitize_text_field( $_POST['skype'] ) : '';
		$designation    = isset( $_POST['designation'] ) ? sanitize_text_field( $_POST['designation'] ) : '';
		$department     = isset( $_POST['department'] ) ? sanitize_text_field( $_POST['department'] ) : '';
		$role           = isset( $_POST['role'] ) ? sanitize_text_field( $_POST['role'] ) : 'team-member';
		$communication  = isset( $_POST['communication'] ) ? array_map( 'sanitize_text_field', $_POST['communication'] ) : '';
		$address1       = isset( $_POST['address1'] ) ? sanitize_text_field( $_POST['address1'] ) : '';
		$address2       = isset( $_POST['address2'] ) ? sanitize_text_field( $_POST['address2'] ) : '';
		$city           = isset( $_POST['city'] ) ? sanitize_text_field( $_POST['city'] ) : '';
		$state          = isset( $_POST['state'] ) ? sanitize_text_field( $_POST['state'] ) : '';
		$country        = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
		$postcode       = isset( $_POST['postcode'] ) ? sanitize_text_field( $_POST['postcode'] ) : '';
		$status         = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : 'active';

		/* validations */
		$message = '';
		if ( $entry == 'exist' && empty ( $user_id ) ) {
			$message = esc_html__( 'Please select User first', 'projectify' );
		}
		if ( empty ( $firstname ) ) {
			$message = esc_html__( 'Please enter first name', 'projectify' );
		}
		if ( empty ( $lastname ) ) {
			$message = esc_html__( 'Please enter last name', 'projectify' );
		}
		if ( empty ( $phone ) ) {
			$message = esc_html__( 'Please enter phone number', 'projectify' );
		}
		if ( empty ( $email ) ) {
			$message = esc_html__( 'Please enter user email', 'projectify' );
		}
		if ( $entry == 'new' ) {
			if ( empty ( $username ) ) {
				$message = esc_html__( 'Please enter member username.', 'projectify' );
			}
		}

		/* End validations */

		if ( empty( $message ) ) {

			if ( $entry == 'new' ) {
				$user_id = username_exists( $username );

				if ( ! $user_id && false == email_exists( $email ) ) {
				    $random_password = wp_generate_password( $length = 12, $include_standard_special_chars = false );
				    $userdata        = array(
				    	'first_name'   => $firstname,
				    	'last_name'    => $lastname,
					    'user_pass'    => $random_password,
					    'user_login'   => $username,
					    'user_email'   => $email,
					    'display_name' => $firstname.' '.$lastname,
					);
					$user_id         = wp_insert_user( $userdata ) ;
 
					// On success.
					if ( ! is_wp_error( $user_id ) ) {
					    $message     = esc_html__( 'User created successfully. ', 'projectify' );
					    $status      = 'success';
						$message     .= btpjy_Helper::btpjy_send_member_login_details( $firstname.' '.$lastname, $firstname, $username, $random_password, $email );
					}

				} else {
				    $message = esc_html__( 'User already exists. Please enter different email or username.', 'projectify' );
				    $status  = 'error';
				}

			} else {
				$message   = '';
			  	$status    = 'success';
			}

			if ( isset( $status ) && ! empty( $status ) && $status == 'success' ) {
				$data = array(
					'user_id'      => $user_id,
					'first_name'   => $firstname,
					'last_name'    => $lastname,
					'user_name'    => $username,
					'name'         => $firstname.' '.$lastname,
					'phone'        => $phone,
					'email'        => $email,
					'picture'      => $profile_avatar,
					'facebook'     => $facebook,
					'skype'        => $skype,
					'job_title'    => $designation,
					'department'   => $department,
					'role'         => $role,
					'notification' => serialize( $communication ),
					'address1'     => $address1,
					'address2'     => $address2,
					'city'         => $city,
					'state'        => $state,
					'country'      => $country,
					'postcode'     => $postcode,
					'status'       => $status,
				);
				$table_name = 'btpjy_members';
				$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
				if ( $query == true ) {
					wp_send_json_success( array( 'message' => esc_html__( 'Member created successfully', 'projectify' ) ) );
				} else {
					wp_send_json_error( array( 'message' => esc_html__( 'Member not created successfully', 'projectify' ) ) );
				}
			} else {
				wp_send_json_error( array( 'message' => $message ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Edit members */
	public static function btpjy_edit_members() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_edit_members_nounce'], 'btpjy_edit_members' ) ) {
			die();
		}

		$user_id        = isset( $_POST['user_id'] ) ? sanitize_text_field( $_POST['user_id'] ) : '';
		$username       = isset( $_POST['username'] ) ? sanitize_text_field( $_POST['username'] ) : '';
		$profile_avatar = isset( $_POST['profile_avatar'] ) ? sanitize_text_field( $_POST['profile_avatar'] ) : '';
		$firstname      = isset( $_POST['firstname'] ) ? sanitize_text_field( $_POST['firstname'] ) : '';
		$lastname       = isset( $_POST['lastname'] ) ? sanitize_text_field( $_POST['lastname'] ) : '';
		$phone          = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
		$email          = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$facebook       = isset( $_POST['facebook'] ) ? sanitize_text_field( $_POST['facebook'] ) : '';
		$skype          = isset( $_POST['skype'] ) ? sanitize_text_field( $_POST['skype'] ) : '';
		$designation    = isset( $_POST['designation'] ) ? sanitize_text_field( $_POST['designation'] ) : '';
		$department     = isset( $_POST['department'] ) ? sanitize_text_field( $_POST['department'] ) : '';
		$role           = isset( $_POST['role'] ) ? sanitize_text_field( $_POST['role'] ) : 'team-member';
		$communication  = isset( $_POST['communication'] ) ? array_map( 'sanitize_text_field', $_POST['communication'] ) : '';
		$address1       = isset( $_POST['address1'] ) ? sanitize_text_field( $_POST['address1'] ) : '';
		$address2       = isset( $_POST['address2'] ) ? sanitize_text_field( $_POST['address2'] ) : '';
		$city           = isset( $_POST['city'] ) ? sanitize_text_field( $_POST['city'] ) : '';
		$state          = isset( $_POST['state'] ) ? sanitize_text_field( $_POST['state'] ) : '';
		$country        = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
		$postcode       = isset( $_POST['postcode'] ) ? sanitize_text_field( $_POST['postcode'] ) : '';
		$status         = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : 'active';
		$id             = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $user_id ) ) {
			$message = esc_html__( 'Select User first', 'projectify' );
		}
		if ( empty ( $firstname ) ) {
			$message = esc_html__( 'Please enter first name', 'projectify' );
		}
		if ( empty ( $lastname ) ) {
			$message = esc_html__( 'Please enter last name', 'projectify' );
		}
		if ( empty ( $phone ) ) {
			$message = esc_html__( 'Please enter phone number', 'projectify' );
		}
		if ( empty ( $email ) ) {
			$message = esc_html__( 'Please enter user email', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {
			$data = array(
				'user_id'      => $user_id,
				'first_name'   => $firstname,
				'last_name'    => $lastname,
				'user_name'    => $username,
				'name'         => $firstname.' '.$lastname,
				'phone'        => $phone,
				'email'        => $email,
				'picture'      => $profile_avatar,
				'facebook'     => $facebook,
				'skype'        => $skype,
				'job_title'    => $designation,
				'department'   => $department,
				'role'         => $role,
				'notification' => serialize( $communication ),
				'address1'     => $address1,
				'address2'     => $address2,
				'city'         => $city,
				'state'        => $state,
				'country'      => $country,
				'postcode'     => $postcode,
				'status'       => $status,
			);
			$where = array(
				'id' => $id
			);
			$table_name = 'btpjy_members';
			$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Member edited successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Member not edited successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	public static function btpjy_add_department() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_add_departments_nounce'], 'btpjy_add_departments' ) ) {
			die();
		}

		$name   = isset( $_POST['department'] ) ? sanitize_text_field( $_POST['department'] ) : '';
		$status = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $name ) ) {
			$message = esc_html__( 'Please enter department name', 'projectify' );
		}
		if ( empty ( $status ) ) {
			$message = esc_html__( 'Please select status', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {
			$data = array(
				'name'   => $name,
				'status' => $status,
			);

			$table_name = 'btpjy_departments';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Department created successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Department not created successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	public static function btpjy_fetch_member_details() {
		check_ajax_referer( 'btpjy_ajax_nonce', 'nounce' );

		if ( ! empty ( $_POST['id'] ) ) {
			$id            = sanitize_text_field( $_POST['id'] );
			$user          = get_userdata( $id );
			$first_name    = $user->first_name;
			$last_name     = $user->last_name;
			$user_login    = $user->user_login;
			$user_email    = $user->user_email;
			$return        = array(
				'status'  => 'success',
				'message' => esc_html__( 'Data found', 'projectify' ),
				'first'   => $first_name,
				'last'    => $last_name,
				'login'   => $user_login,
				'email'   => $user_email,
			);
		} else {
			$return = array(
				'status'  => 'error',
				'message' => esc_html__( 'Something went wrong!.', 'projectify' ),
			);
		}
		wp_send_json( $return );
		wp_die();
	}

	public static function btpjy_save_contacts() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_contacts_nounce'], 'btpjy_save_contacts' ) ) {
			die();
		}

		$name        = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
		$email       = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$recevier_id = isset( $_POST['recevier_id'] ) ? sanitize_text_field( $_POST['recevier_id'] ) : '';
		$sender_id   = isset( $_POST['sender_id'] ) ? sanitize_text_field( $_POST['sender_id'] ) : '';
		$subject     = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
		$messagee    = isset( $_POST['textarea_rows'] ) ? wp_kses_post( $_POST['textarea_rows'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $messagee ) ) {
			$messagee = esc_html__( 'Please enter message content.', 'projectify' );
		}

		if ( empty( $message ) ) {
			$data = array(
				'recevier_name'  => $name,
				'recevier_email' => $email,
				'recevier_id'    => $recevier_id,
				'sender_id'      => $sender_id,
				'subject'        => $subject,
				'message'        => $message,
				'date'           => date( 'Y-m-d' ),
				'time'           => date( 'H:i:s' ),
			);
			$table_name = 'btpjy_contacts';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {

				$general_settings = get_option( 'btpjy_settings' );
				$company_logo     = $general_settings['company_logo'];
				$company_name     = $general_settings['company_name'];
				$sender_name      = btpjy_Helper::btpjy_member_details( $sender_id, 'name' );
				$body             = $message;
				$heading          = esc_html__( 'You have new message from '.$sender_name.' ('.$company_name.' )', 'projectify' );
				$headers          = array( 'Content-Type: text/html; charset=UTF-8' );
				$message          = btpjy_Helper::btpjy_email_html( $company_logo, $body, $heading );
				$enquerysend      = wp_mail( $email, $subject, wp_kses_post( $message ), $headers );

				if ( $enquerysend ) {
					wp_send_json_success( array( 'message' => esc_html__( 'Message sent successfully', 'projectify' ) ) );
				} else {
					wp_send_json_error( array( 'message' => esc_html__( 'Message not sent successfully', 'projectify' ) ) );
				}
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Message not sent successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

}