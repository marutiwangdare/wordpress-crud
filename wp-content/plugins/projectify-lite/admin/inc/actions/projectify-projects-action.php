<?php
defined( 'ABSPATH' ) or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

class btpjy_ProjectsActions {

	/* Save Projects */
	public static function btpjy_save_projects() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_projects_nounce'], 'btpjy_save_projects' ) ) {
			die();
		}

		$title         = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
		$description   = isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : '';
		$sdescription  = isset( $_POST['sdescription'] ) ? sanitize_text_field( $_POST['sdescription'] ) : '';
		$starting_date = isset( $_POST['starting_date'] ) ? sanitize_text_field( $_POST['starting_date'] ) : '';
		$due_date      = isset( $_POST['due_date'] ) ? sanitize_text_field( $_POST['due_date'] ) : '';
		$status        = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : '';
		$deposit       = isset( $_POST['deposit_amnt'] ) ? sanitize_text_field( $_POST['deposit_amnt'] ) : '';
		$team          = isset( $_POST['team'] ) ? array_map( 'sanitize_text_field', $_POST['team'] ) : '';
		$client_id     = isset( $_POST['client_id'] ) ? sanitize_text_field( $_POST['client_id'] ) : '';
		$alerts        = isset( $_POST['alerts'] ) ? array_map( 'sanitize_text_field', $_POST['alerts'] ) : '';
		$notify        = isset( $_POST['notify'] ) ? array_map( 'sanitize_text_field', $_POST['notify'] ) : '';
		$comments      = isset( $_POST['comments'] ) ? array_map( 'sanitize_text_field', $_POST['comments'] ) : '';
		$priority      = isset( $_POST['priority'] ) ? sanitize_text_field( $_POST['priority'] ) : '';


		/* validations */
		$message = '';
		if ( empty ( $title ) ) {
			$message = esc_html__( 'Please enter team title.', 'projectify' );
		}
		if ( empty ( $description ) ) {
			$message = esc_html__( 'Please enter project description', 'projectify' );
		}
		if ( empty ( $sdescription ) ) {
			$message = esc_html__( 'Please enter project short description', 'projectify' );
		}
		if ( empty ( $starting_date ) ) {
			$message = esc_html__( 'Please select Project starting date', 'projectify' );
		}
		if ( empty ( $due_date ) ) {
			$message = esc_html__( 'Please select Project due date', 'projectify' );
		}
		if ( empty ( $team ) ) {
			$message = esc_html__( 'Please select team', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'name'          => $title,
				'project_breif' => stripslashes( $description ),
				'general_info'  => stripslashes( $sdescription ),
				'client'        => $client_id,
				'start_date'    => $starting_date,
				'end_date'      => $due_date,
				'deposit_amnt'  => $deposit,
				'teams'         => serialize( $team ),
				'milestones'    => '',
				'alerts'        => serialize( $alerts ),
				'notify'        => serialize( $notify ),
				'comments'      => serialize( $comments ),
				'status'        => $status,
				'priority'      => $priority,
			);

			$table_name = 'btpjy_projects';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {
				global $wpdb;
				$lastid = $wpdb->insert_id;
				btpjy_Helper::btpjy_send_project_assigneed_details( $lastid, $title, $description, $team );
				wp_send_json_success( array( 'message' => esc_html__( 'Project created successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Project not created', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Edit Projects */
	public static function btpjy_edit_projects() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_edit_projects_nounce'], 'btpjy_edit_projects' ) ) {
			die();
		}

		$id            = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';
		$title         = isset( $_POST['title'] ) ? sanitize_text_field( $_POST['title'] ) : '';
		$description   = isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : '';
		$sdescription  = isset( $_POST['sdescription'] ) ? sanitize_text_field( $_POST['sdescription'] ) : '';
		$starting_date = isset( $_POST['starting_date'] ) ? sanitize_text_field( $_POST['starting_date'] ) : '';
		$due_date      = isset( $_POST['due_date'] ) ? sanitize_text_field( $_POST['due_date'] ) : '';
		$status        = isset( $_POST['status'] ) ? sanitize_text_field( $_POST['status'] ) : '';
		$deposit       = isset( $_POST['deposit_amnt'] ) ? sanitize_text_field( $_POST['deposit_amnt'] ) : '';
		$team          = isset( $_POST['team'] ) ? array_map( 'sanitize_text_field', $_POST['team'] ) : '';
		$client_id     = isset( $_POST['client_id'] ) ? sanitize_text_field( $_POST['client_id'] ) : '';
		$alerts        = isset( $_POST['alerts'] ) ? array_map( 'sanitize_text_field', $_POST['alerts'] ) : '';
		$notify        = isset( $_POST['notify'] ) ? array_map( 'sanitize_text_field', $_POST['notify'] ) : '';
		$comments      = isset( $_POST['comments'] ) ? array_map( 'sanitize_text_field', $_POST['comments'] ) : '';
		$priority      = isset( $_POST['priority'] ) ? sanitize_text_field( $_POST['priority'] ) : '';

		$project    = btpjy_Helper::btpjy_project_info( $id );
		$milestones = $project->milestones;

		/* validations */
		$message = '';
		if ( empty ( $title ) ) {
			$message = esc_html__( 'Please enter team title.', 'projectify' );
		}
		if ( empty ( $description ) ) {
			$message = esc_html__( 'Please enter project description', 'projectify' );
		}
		if ( empty ( $sdescription ) ) {
			$message = esc_html__( 'Please enter project short description', 'projectify' );
		}
		if ( empty ( $starting_date ) ) {
			$message = esc_html__( 'Please select Project starting date', 'projectify' );
		}
		if ( empty ( $due_date ) ) {
			$message = esc_html__( 'Please select Project due date', 'projectify' );
		}
		if ( empty ( $team ) ) {
			$message = esc_html__( 'Please select team', 'projectify' );
		}
		
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'name'          => $title,
				'project_breif' => stripslashes( $description ),
				'general_info'  => stripslashes( $sdescription ),
				'client'        => $client_id,
				'start_date'    => $starting_date,
				'end_date'      => $due_date,
				'deposit_amnt'  => $deposit,
				'teams'         => serialize( $team ),
				'milestones'    => $milestones,
				'alerts'        => serialize( $alerts ),
				'notify'        => serialize( $notify ),
				'comments'      => serialize( $comments ),
				'status'        => $status,
				'priority'      => $priority,
			);
			$where = array(
				'id' => $id
			);
			$table_name = 'btpjy_projects';
			$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Project updated successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Project not updated', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Delete Task details */
	public static function btpjy_delete_task_details() {
		check_ajax_referer( 'btpjy_ajax_nonce', 'nounce' );

		if ( ! empty ( $_POST['table'] ) && ! empty ( $_POST['id'] ) ) {
			$table = sanitize_text_field( $_POST['table'] );
			$id    = sanitize_text_field( $_POST['id'] );
			$pid   = sanitize_text_field( $_POST['pid'] );
			$mid   = sanitize_text_field( $_POST['mid'] );
			$tid   = sanitize_text_field( $_POST['tid'] );
			$data  = array( 'id' => $id );

			if ( $table == 'btpjy_bugs' ) {
				$bug_data = btpjy_Helper::btpjy_bug_info( $id );
				$bug_pid  = $bug_data->project_id;
			}

			$query = btpjy_Helper::btpjy_delete_intoDB( $table, $data );

			if ( $query == true ) {

				if ( $table == 'btpjy_projects' ) {
					$tasks = btpjy_Helper::btpjy_tasks_info( $id );
					foreach ( $tasks as $tkey => $tvalue ) {
						$t_table = 'btpjy_tasks';
						$query   = btpjy_Helper::btpjy_delete_intoDB( $t_table, array( 'id' => $tvalue->id ) );
						$query2  = btpjy_Helper::btpjy_delete_intoDB( 'btpjy_comments', array( 'project_id' => $id, 'type' => 'btpjy_tasks', 'type_id' => $tvalue->id ) );
					}
					$url = esc_url( admin_url( 'admin.php?page=projectify-pro-projects' ) );
				} elseif ( $table == 'btpjy_tasks' ) {
					$query2 = btpjy_Helper::btpjy_delete_intoDB( 'btpjy_comments', array( 'project_id' => $pid, 'type' => 'btpjy_tasks', 'type_id' => $id ) );
				} elseif ( $table == 'btpjy_teams' ) {
					$url = esc_url( admin_url( 'admin.php?page=projectify-pro-teams' ) );
				} elseif ( $table == 'btpjy_members' ) {
					$url = esc_url( admin_url( 'admin.php?page=projectify-pro-members' ) );
				} elseif ( $table == 'btpjy_announcements' ) {
					$url = esc_url( admin_url( 'admin.php?page=projectify-pro-announcements' ) );
				}

				$message = esc_html__( 'Data deleted successfully.', 'projectify' );
				$status  = 'success';
			} else {
				$message = esc_html__( 'Data not deleted successfully.', 'projectify' );
				$status  = 'error';
				$url     = '';
			}
		} else {
			$message = esc_html__( 'Something went wrong!.', 'projectify' );
			$status  = 'error';
			$url     = '';
		}
		$return = array(
			'status'  => $status,
			'message' => $message,
			'url'     => $url
		);
		wp_send_json( $return );
		wp_die();
	}

	/* Add Task */
	public static function btpjy_add_tasks() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_save_tasks_nounce'], 'btpjy_save_tasks' ) ) {
			die();
		}

		$title      = isset( $_POST['t_title'] ) ? sanitize_text_field( $_POST['t_title'] ) : '';
		$project_id = isset( $_POST['project_id'] ) ? sanitize_text_field( $_POST['project_id'] ) : '';
		$t_desc     = isset( $_POST['t_desc'] ) ? sanitize_text_field( $_POST['t_desc'] ) : '';
		$t_start    = isset( $_POST['t_start'] ) ? sanitize_text_field( $_POST['t_start'] ) : '';
		$t_end      = isset( $_POST['t_end'] ) ? sanitize_text_field( $_POST['t_end'] ) : '';
		$t_time     = isset( $_POST['t_time'] ) ? sanitize_text_field( $_POST['t_time'] ) : '';
		$t_assingee = isset( $_POST['t_assingee'] ) ? array_map( 'sanitize_text_field', $_POST['t_assingee'] ) : '';
		$t_status   = isset( $_POST['t_status'] ) ? sanitize_text_field( $_POST['t_status'] ) : '';
		$priority   = isset( $_POST['priority'] ) ? sanitize_text_field( $_POST['priority'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $title ) ) {
			$message = esc_html__( 'Please enter team title.', 'projectify' );
		}
		if ( empty ( $t_desc ) ) {
			$message = esc_html__( 'Please enter project description', 'projectify' );
		}
		if ( empty ( $project_id ) ) {
			$message = esc_html__( 'Please select Project', 'projectify' );
		}
		if ( empty ( $t_start ) ) {
			$message = esc_html__( 'Please select start date', 'projectify' );
		}
		if ( empty ( $t_end ) ) {
			$message = esc_html__( 'Please select end date', 'projectify' );
		}
		if ( empty ( $t_time ) ) {
			$message = esc_html__( 'Please enter estimate time', 'projectify' );
		}
		if ( empty ( $t_assingee ) ) {
			$message = esc_html__( 'Please select task assignee', 'projectify' );
		}

		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'project_id'     => $project_id,
				'description'    => stripslashes( $t_desc ),
				'name'           => $title,
				'start'          => $t_start,
				'end'            => $t_end,
				'estimated_time' => $t_time,
				'assignee'       => serialize( $t_assingee ),
				'status'         => $t_status,
				'priority'       => $priority,
			);

			$table_name = 'btpjy_tasks';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {
				global $wpdb;
				$lastid = $wpdb->insert_id;
				btpjy_Helper::btpjy_send_task_assigneed_details( $project_id, $lastid, $title, $t_desc, $t_assingee );
				wp_send_json_success( array( 'message' => esc_html__( 'Task created successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Task not created', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Edit Task */
	public static function btpjy_edit_tasks() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_edit_tasks_nounce'], 'btpjy_edit_tasks' ) ) {
			die();
		}

		$title      = isset( $_POST['t_title'] ) ? sanitize_text_field( $_POST['t_title'] ) : '';
		$project_id = isset( $_POST['project_id'] ) ? sanitize_text_field( $_POST['project_id'] ) : '';
		$t_desc     = isset( $_POST['t_desc'] ) ? sanitize_text_field( $_POST['t_desc'] ) : '';
		$t_start    = isset( $_POST['t_start'] ) ? sanitize_text_field( $_POST['t_start'] ) : '';
		$t_end      = isset( $_POST['t_end'] ) ? sanitize_text_field( $_POST['t_end'] ) : '';
		$t_time     = isset( $_POST['t_time'] ) ? sanitize_text_field( $_POST['t_time'] ) : '';
		$t_assingee = isset( $_POST['t_assingee'] ) ? array_map( 'sanitize_text_field', $_POST['t_assingee'] ) : '';
		$t_status   = isset( $_POST['t_status'] ) ? sanitize_text_field( $_POST['t_status'] ) : '';
		$priority   = isset( $_POST['priority'] ) ? sanitize_text_field( $_POST['priority'] ) : '';
		$id         = isset( $_POST['id'] ) ? sanitize_text_field( $_POST['id'] ) : '';

		/* validations */
		$message = '';
		if ( empty ( $title ) ) {
			$message = esc_html__( 'Please enter team title.', 'projectify' );
		}
		if ( empty ( $t_desc ) ) {
			$message = esc_html__( 'Please enter project description', 'projectify' );
		}
		if ( empty ( $project_id ) ) {
			$message = esc_html__( 'Please select Project', 'projectify' );
		}
		if ( empty ( $t_start ) ) {
			$message = esc_html__( 'Please select start date', 'projectify' );
		}
		if ( empty ( $t_end ) ) {
			$message = esc_html__( 'Please select end date', 'projectify' );
		}
		if ( empty ( $t_time ) ) {
			$message = esc_html__( 'Please enter estimate time', 'projectify' );
		}
		if ( empty ( $t_assingee ) ) {
			$message = esc_html__( 'Please select task assignee', 'projectify' );
		}

		if ( empty( $message ) ) {

			$data = array(
				'project_id'     => $project_id,
				'description'    => stripslashes( $t_desc ),
				'name'           => $title,
				'start'          => $t_start,
				'end'            => $t_end,
				'estimated_time' => $t_time,
				'assignee'       => serialize( $t_assingee ),
				'status'         => $t_status,
				'priority'       => $priority,
			);
			$where = array(
				'id' => $id
			);
			$table_name = 'btpjy_tasks';
			$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Task updated successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Task not updated successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Fetch Subtask Details */
	public static function btpjy_fetch_tasks() {
		check_ajax_referer( 'btpjy_ajax_nonce', 'nounce' );

		if ( ! empty ( $_POST['id'] ) ) {
			global $wpdb;
			$id         = sanitize_text_field( $_POST['id'] );
			$table      = 'btpjy_tasks';
			$table_name = $wpdb->base_prefix . "" .$table;
			$data       = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE id = %d", $id ) );
			$status     = 'success';
			$message    = esc_html__( 'Data fetched!.', 'clockify' );
			$inputs     = array(
				'#t_title',
				'#t_desc',
				'#select_t_assingee',
				'#t_start',
				'#t_end',
				'#t_time',
				'#t_status',
				'#t_priority',
				'#project_id',
				'#id',
			);
			$values     = array(
				$data->name,
				$data->description,
				unserialize( $data->assignee ),
				$data->start,
				$data->end,
				$data->estimated_time,
				$data->status,
				$data->priority,
				$data->project_id,
				$data->id
			);

		} else {
			$message = esc_html__( 'Something went wrong!.', 'projectify' );
			$status  = 'error';
			$inputs  = '';
			$values  = '';
		}
		$return = array(
			'status'  => $status,
			'message' => $message,
			'inputs'  => $inputs,
			'values'  => $values,
		);
		wp_send_json( $return );
		wp_die();
	}

	/* Generate Project option for select fields */
	public static function btpjy_select_projects() {
		check_ajax_referer( 'btpjy_ajax_nonce', 'nounce' );

		if ( ! empty ( $_POST['id'] ) ) {
			$row_id     = sanitize_text_field( $_POST['id'] );
			$project    = btpjy_Helper::btpjy_project_info( $row_id );
			$teams      = unserialize( $project->teams );
			$html       = '';
			$assignee   = '';

			$t_ids = array();
			foreach ( $teams as $tkey => $tvalue ) {
				$teams   = btpjy_Helper::btpjy_team_info( $tvalue );
				$members = unserialize( $teams->members );

				foreach ( $members as $m_key => $m_value ) {
					$member = btpjy_Helper::btpjy_member_info( $m_value );
					$assignee .= '<option value="'.esc_attr( $member->id ).'">'.esc_attr( $member->name ).'</option>';
				}
			}

			$status  = 'success';
			$message = esc_html__( 'Select assignees now', 'projectify' );

		} else {
			$message  = esc_html__( 'Something went wrong!.', 'projectify' );
			$status   = 'error';
			$assignee = '';
		}
		$return = array(
			'status'   => $status,
			'message'  => $message,
			'assignee' => $assignee
		);
		wp_send_json( $return );
		wp_die();
	}

	/* Add Messages */
	public static function btpjy_add_messages() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_add_messages_nounce'], 'btpjy_add_messages' ) ) {
			die();
		}

		$visibility = isset( $_POST['visibility'] ) ? sanitize_text_field( $_POST['visibility'] ) : '';
		$team       = isset( $_POST['team'] ) ? sanitize_text_field( $_POST['team'] ) : '';
		$project_id = isset( $_POST['project_id'] ) ? sanitize_text_field( $_POST['project_id'] ) : '';
		$messagee   = isset( $_POST['send_message'] ) ? wp_kses_post( $_POST['send_message'] ) : '';
		$m_array    = array();

		/* validations */
		$message = '';
		if ( empty ( $messagee ) ) {
			$message = esc_html__( 'Please enter Message first.', 'projectify' );
		}
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'team'       => $team,
				'message'    => stripslashes( $messagee ),
				'visibility' => $visibility,
				'project_id' => $project_id,
				'date'       => date( 'Y-m-d' ),
				'time'       => date( 'H:i:s' ),
			);

			$table_name = 'btpjy_messages';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {

				$project_info = btpjy_Helper::btpjy_project_info( $project_id );
				$teams_info   = unserialize( $project_info->teams );
				$result       = true;

				if ( ! empty ( $team ) && $team == 'on' ) {
					foreach ( $teams_info as $t_key => $t_value ) {
						$team_info = btpjy_Helper::btpjy_team_info( $t_value );
						$members   = unserialize( $team_info->members );
						foreach ( $members as $m_key => $m_value ) {
							$members_info = btpjy_Helper::btpjy_member_info( $m_value );
							array_push( $m_array, $members_info->email );
						}
					}
					$m_array = array_unique( $m_array ); 
					$email   = $m_array;
					$heading = esc_html__( 'Message alert for project ( '.$project_info->name.' )', 'projectify' );
					$result  = btpjy_Helper::btpjy_send_project_message( $messagee, $heading, $email );
				}

				if ( $result == true ) {
					wp_send_json_success( array( 'message' => esc_html__( 'Message Sent Successfully', 'projectify' ) ) );
				} else {
					wp_send_json_error( array( 'message' => esc_html__( 'Message not Sent Successfully', 'projectify' ) ) );
				}
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Message not Sent Successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Add Bugs */
	public static function btpjy_add_files() {
		if ( ! wp_verify_nonce( $_REQUEST['btpjy_add_files_nounce'], 'btpjy_add_files' ) ) {
			die();
		}

		$related_to = isset( $_POST['related_to'] ) ? sanitize_text_field( $_POST['related_to'] ) : '';
		$task_id    = isset( $_POST['task'] ) ? sanitize_text_field( $_POST['task'] ) : '';
		$project_id = isset( $_POST['project_id'] ) ? sanitize_text_field( $_POST['project_id'] ) : '';
		$media      = isset( $_POST['media'] ) ? array_map( 'sanitize_text_field', $_POST['media'] ) : '';

		/* validations */
		$message = '';
		if ( $related_to == 'task' ) {
			if ( empty ( $task_id ) ) {
				$message = esc_html__( 'Please select task.', 'projectify' );
			}
		} else {
			$task_id = '';
		}
		/* End validations */

		if ( empty( $message ) ) {

			$data = array(
				'related_to' => $related_to,
				'task_id'    => $task_id,
				'media'      => serialize( $media ),
				'project_id' => $project_id,
				'date'       => date( 'Y-m-d' ),
				'time'       => date( 'H:i:s' ),
			);
			
			$table_name = 'btpjy_files';
			$query      = btpjy_Helper::btpjy_insert_intoDB( $table_name, $data );
			if ( $query == true ) {
				wp_send_json_success( array( 'message' => esc_html__( 'Files uploaded successfully', 'projectify' ) ) );
			} else {
				wp_send_json_error( array( 'message' => esc_html__( 'Files not uploaded successfully', 'projectify' ) ) );
			}
		}
		wp_send_json_error( array( 'message' => $message ) );
	}

	/* Set project progress */
	public static function btpjy_set_project_progress() {
		check_ajax_referer( 'btpjy_ajax_nonce', 'nounce' );

		if ( ! empty ( $_POST['value'] ) ) {
			$value = isset( $_POST['value'] ) ? sanitize_text_field( $_POST['value'] ) : '';
			$pid   = isset( $_POST['pid'] ) ? sanitize_text_field( $_POST['pid'] ) : '';

			/* validations */
			$message = '';
			if ( empty ( $value ) ) {
				$message = esc_html__( 'Please select progress project.', 'projectify' );
			}

			if ( empty( $message ) ) {

				$data = array(
					'progress' => $value,
				);
				$where = array(
					'id' => $pid
				);
				$table_name = 'btpjy_projects';
				$query      = btpjy_Helper::btpjy_update_intoDB( $table_name, $data, $where );
				if ( $query == true ) {
					$return = array(
						'status'  => 'success',
						'message' => esc_html__( 'Progress status set!.', 'projectify' ),
					);
				} else {
					$return = array(
						'status'  => 'error',
						'message' => esc_html__( 'Progress status not set!.', 'projectify' ),
					);
				}
			} else {
				$return = array(
					'status'  => 'error',
					'message' => $message,
				);
			}

		} else {
			$return = array(
				'status'  => 'error',
				'message' => esc_html__( 'Something went wrong!.', 'projectify' ),
			);
		}
		wp_send_json( $return );
		wp_die();
	}

}