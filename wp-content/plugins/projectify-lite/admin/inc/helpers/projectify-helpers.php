<?php
defined( 'ABSPATH' ) or wp_die();

/**
 *  Helper class
 */
class btpjy_Helper{
	
	public static function btpjy_sanitize_array( $input ) {
		// Initialize the new array that will hold the sanitize values		
		$new_input = array();

		// Loop through the input and sanitize each of the values		
		foreach ( $input as $key => $val ) {
			$new_input[ $val['name'] ] = sanitize_text_field( $val['value'] );	
		}
		return $new_input;
	}
	
	public static function btpjy_value_check( $value ) {
		if ( ! empty ( $value ) ) {
			return $value;
		}
	}

	public static function btpjy_insert_intoDB( $table_name, $data ) {
		global $wpdb;
		$table        = $wpdb->base_prefix .''.$table_name;
		$result_check = $wpdb->insert( $table, $data );
		if ( $result_check ) {
			return true;
		} else {
			return false;
		}
	}

	public static function btpjy_update_intoDB( $table_name, $data, $where ) {
		global $wpdb;
		$table        = $wpdb->base_prefix .''.$table_name;
		$result_check = $wpdb->update( $table, $data, $where );
		if ( $result_check ) {
			return true;
		} else {
			return false;
		}
	}

	public static function btpjy_delete_intoDB( $table_name, $data ) {
		global $wpdb;
		$table        = $wpdb->base_prefix .''.$table_name;
		$result_check = $wpdb->delete( $table, $data );
		if ( $result_check ) {
			return true;
		} else {
			return false;
		}
	}

	public static function btpjy_get_users_list() {
		global $wpdb;
		$user_table = $wpdb->base_prefix . "users";
		$users_data = $wpdb->get_results( "SELECT * FROM $user_table" );
		return $users_data;
	}

	public static function btpjy_get_members() {
		global $wpdb;
		$members_table = $wpdb->base_prefix . "btpjy_members";
		$members_data  = $wpdb->get_results( "SELECT * FROM $members_table" );
		return $members_data;
	}

	public static function btpjy_get_teams() {
		global $wpdb;
		$teams_table = $wpdb->base_prefix . "btpjy_teams";
		$teams_data  = $wpdb->get_results( "SELECT * FROM $teams_table" );
		return $teams_data;
	}

	public static function btpjy_get_announcements() {
		global $wpdb;
		$table = $wpdb->base_prefix . "btpjy_announcements";
		$data  = $wpdb->get_results( "SELECT * FROM $table" );
		return $data;
	}

	public static function btpjy_get_projects() {
		global $wpdb;
		$table = $wpdb->base_prefix . "btpjy_projects";
		$data  = $wpdb->get_results( "SELECT * FROM $table" );
		return $data;
	}

	public static function btpjy_get_tasks() {
		global $wpdb;
		$table = $wpdb->base_prefix . "btpjy_tasks";
		$data  = $wpdb->get_results( "SELECT * FROM $table" );
		return $data;
	}

	public static function btpjy_get_departments() {
		global $wpdb;
		$table = $wpdb->base_prefix . "btpjy_departments";
		$data  = $wpdb->get_results( "SELECT * FROM $table" );
		return $data;
	}

	public static function btpjy_task_info( $id ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_tasks";
		$data   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $id ) );
		return $data;
	}

	public static function btpjy_member_info( $id ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_members";
		$data   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %s", $id ) );
		return $data;
	}

	public static function btpjy_team_info( $id ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_teams";
		$data   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $id ) );
		return $data;
	}

	public static function btpjy_announce_info( $id ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_announcements";
		$data   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $id ) );
		return $data;
	}

	public static function btpjy_project_info( $id ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_projects";
		$data   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $id ) );
		return $data;
	}

	public static function btpjy_tasks_info( $pid ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_tasks";
		$data   = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $pid ) );
		return $data;
	}

	public static function btpjy_get_members_html( $members ) {
		$html        = '';
		$class_arr   = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
		$all_members = self::btpjy_get_members();

		foreach ( $members as $key => $member ) {
			$memberr = btpjy_Helper::btpjy_member_info( $member );
			if ( ! empty ( $memberr ) ) {
				$first = $memberr->first_name;
				$last  = $memberr->last_name;
				$pic   = $memberr->picture;

				shuffle( $class_arr );
				
		        if ( ! empty ( $pic ) ) {
		        	$html .= '<div class="symbol symbol-35 flex-shrink-0 mr-3">
	                        <img alt="Pic" src="'.esc_attr( $pic ).'">
	                      </div>';
	          	} else {
	          		$html .= '<!--begin::Symbol-->
		                    <div class="symbol symbol-35 '. esc_attr( $class_arr[0] ).' flex-shrink-0 mr-3">
		                        <span class="symbol-label font-weight-bolder font-size-lg text-uppercase">'.self::btpjy_get_initials( $first, $last ).'</span>
		                    </div>
		                  <!--end::Symbol-->';
	          	}
          	}
		}

		return wp_kses_post( $html );
	}

	public static function btpjy_get_initials( $first, $last = null ) {

		$first = substr( $first, 0, 1 );
		$name  = $first;
		if ( ! empty ( $last ) ) {
			$last = substr( $last, 0, 1 );
			$name = $first.''.$last;
		}
		return $name;

	}

	public static function btpjy_background_class() {
		$class_arr = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
        shuffle( $class_arr );
        return $class_arr[0];
	}

	public static function btpjy_get_team_member( $string ) {
		$teams   = unserialize( $string );
		$all_ids = array();
		foreach ( $teams as $team_key => $team_value ) {
			global $wpdb;
			$table = $wpdb->base_prefix . "btpjy_teams";
			$team  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $team_value ) );

			$members = unserialize( $team->members );

			foreach ( $members as $key => $member ) {
				$stable       = $wpdb->base_prefix . "btpjy_members";
				$membersmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE user_id = %s", $member ) );
				array_push( $all_ids, $membersmall->id );
			}
		}

		$all_ids = array_unique( $all_ids );
		return $all_ids;
	}

	public static function btpjy_count_tasks( $row_id ) {
		$count = 0;
		global $wpdb;
		$ttable = $wpdb->base_prefix . "btpjy_tasks";
		$tdata  = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ttable WHERE project_id = %s", $row_id ) );
		foreach ( $tdata as $tkey => $tvalue ) {
			$count++;
		}
		
		return $count.' '.esc_html__( 'Tasks', 'projectify' );
	}

	public static function btpjy_project_member_html( $teams ) {
		$all_tids  = self::btpjy_get_team_member( $teams );
		$member_no = 1;
		$html      = '';
		foreach ( $all_tids as $team_key => $member ) {
			global $wpdb;
			$stable      = $wpdb->base_prefix . "btpjy_members";
    		$membersmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
    		if ( ! empty( $membersmall ) ) {
    			$class_arr   = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
    			shuffle( $class_arr );
    			if ( $member_no < 6 ) {
	    			if ( ! empty ( $membersmall->picture ) ) {
	    				$html .= '<div class="symbol symbol-35 flex-shrink-0 mr-3">
									<img alt="Pic" src="'.esc_attr( $membersmall->picture ).'">
								</div>';
	    			} else {
	    				$html .= '<div class="symbol symbol-35 '. esc_attr( $class_arr[0] ).' flex-shrink-0 mr-3">
									<span class="symbol-label font-weight-bolder font-size-lg">'.esc_html( self::btpjy_get_initials( $membersmall->first_name, $membersmall->last_name ) ).'</span>
								</div>';
	    			}
	    		}
	    		$member_no++;
    		}
    	}
    	if ( $member_no > 6 ) {
			$html .= '<div class="symbol symbol-35 '. esc_attr( $class_arr[0] ).' flex-shrink-0 mr-3">
							<span class="symbol-label font-weight-bolder font-size-lg">'.esc_html__( '6+', 'projectofy' ).'</span>
						</div>';
		}
    	return $html;
	}

	public static function btpjy_member_details( $id, $value ) {
		global $wpdb;
		$table  = $wpdb->base_prefix . "btpjy_members";
		$data   = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %s", $id ) );

		if ( empty ( $data ) ) {
			$user          = get_userdata( $id );
			$first_name    = $user->first_name;
			$last_name     = $user->last_name;
			$user_login    = $user->user_login;
			$user_nicename = $user->user_nicename;
			$user_email    = $user->user_email;
			$display_name  = $user->display_name;

			if ( ! empty ( $value ) && $value == 'firstname' ) {
				return $user->first_name;
			} elseif( ! empty ( $value ) && $value == 'lastname' ) {
				return $user->last_name;
			} elseif( ! empty ( $value ) && $value == 'email' ) {
				return $user->user_email;			
			} elseif( ! empty ( $value ) && $value == 'name' ) {
				return $user->first_name.' '.$user->last_name;
			}
		} else {
			if ( $value == 'name' ) {
				return $data->name;
			} elseif ( $value == 'firstname' ) {
				return $data->first_name;
			} elseif ( $value == 'lastname' ) {
				return $data->last_name;
			} elseif ( $value == 'email' ) {
				return $data->email;
			}
		}
	}

	public static function btpjy_send_project_message( $body, $message_heading, $receviers ) {
		$headers = array( 'Content-Type: text/html; charset=UTF-8' );
		$subject = esc_html__( 'Project Notification Alert', 'projectify' );
		$message = '<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
						<tr>
							<td bgcolor="#ffffff" align="center" style="padding: 15px;">
								<!--[if (gte mso 9)|(IE)]>
								<table align="center" border="0" cellspacing="0" cellpadding="0" width="500">
								<tr>
								<td align="center" valign="top" width="500">
								<![endif]-->
								<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 670px;" class="responsive-table">
									<tbody>
									<tr>
										<td>
											<!-- COPY -->
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tbody>
												<tr>
													<td align="center" style="font-size: 32px; font-family: Helvetica, Arial, sans-serif; font-weight: 700;color: #FF9800; padding-top: 30px;" class="padding-copy">'.$message_heading.'</td>
												</tr>
											</tbody>
											</table>
										</td>
									</tr>
									<tr>
										<!-- COPY -->
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody>
												<tr>
													<td align="" valign="top" style="padding: 15px 0;" class="logo">
														<p>'.$body.'<p>
													</td>
												</tr>
											</tbody>
										</table>
									</tr>
								</tbody>
								</table>
								<!--[if (gte mso 9)|(IE)]>
								</td>
								</tr>
								</table>
								<![endif]-->
							</td>
						</tr>
					</tbody>
				</table>';
		$enquerysend = wp_mail( $receviers, $subject, wp_kses_post( $message ), $headers );
		if ( $enquerysend ) {
			return true;
		} else {
			return false;
		}	
	}

	public static function btpjy_get_assignee_names( $assignee ) {
		$assignee = unserialize( $assignee );
		$names    = array();
		foreach ( $assignee as $key => $value ) {
			$member = self::btpjy_member_info( $value );
			$name   = $member->name;
			array_push( $names, $name );
		}
		$names = implode( ', ', $names );
		return $names;
	}

	public static function btpjy_get_date_format() {
		$savesetting = get_option( 'btpjy_settings' );

		if ( ! empty ( $savesetting ) ) {
			$date_format  = $savesetting['date_format'];

			if ( ! empty ( $date_format ) ) {
				return $date_format;
			} else {
				return 'F j Y';
			}
		} else {
			return 'F j Y';
		}
	}

	public static function btpjy_get_formated_date( $date ) {
		return date( self::btpjy_get_date_format(), strtotime( $date ) );
	}

	public static function btpjy_get_time_format() {
		$savesetting = get_option( 'btpjy_settings' );

		if ( ! empty ( $savesetting ) ) {

			$time_format  = $savesetting['time_format'];
			if ( ! empty ( $time_format ) ) {
				return $time_format;
			} else {
				return 'g:i A';
			}
		} else {
			return 'g:i A';
		}
	}

	public static function btpjy_get_formated_time( $time ) {
		return date( self::btpjy_get_time_format(), strtotime( $time ) );
	}

	public static function btpjy_get_currency_position() {
		$savesetting = get_option( 'btpjy_settings' );

		if ( ! empty ( $savesetting ) ) {
			$cur_position = $savesetting['cur_position'];
			if ( ! empty ( $cur_position ) ) {
				return $cur_position;
			} else {
				return 'Right';
			}
		} else {
			return 'Right';
		}
	}

	public static function btpjy_get_currency_symbol() {
		$savesetting = get_option( 'btpjy_settings' );

		if ( ! empty ( $savesetting ) ) {
			$cur_symbol = $savesetting['cur_symbol'];
			if ( ! empty ( $cur_symbol ) ) {
				return $cur_symbol;
			} else {
				return '$';
			}
		} else {
			return '$';
		}
	}

	public static function btpjy_get_currency_position_html( $string ) {
		$position       = self::btpjy_get_currency_position();
		$currency_symbl = self::btpjy_get_currency_symbol();

		if ( $position == 'Right' ) {
			$value = $string.' '.$currency_symbl;
		} else {
			$value = $currency_symbl.' '.$string;
		}
		return $value;
	}

	public static function btpjy_get_member_project_count() {
		$all_projects  = btpjy_Helper::btpjy_get_projects();
        $all_projects  = array_reverse( $all_projects );
        $project_count = 0; 
        if ( ! empty( $all_projects ) ) {
            foreach ( $all_projects as $key => $value ) {
                $member_arr = array();
                $all_tids   = btpjy_Helper::btpjy_get_team_member( $value->teams );
                foreach ( $all_tids as $team_key => $member ) {
                    global $wpdb;
                    $stable      = $wpdb->base_prefix . "btpjy_members";
                    $membersmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
                    array_push( $member_arr, $membersmall->user_id );
                }

                if ( in_array( get_current_user_id(), $member_arr ) || $value->status != 'Completed' ) {
                	$project_count++;
                }
            }
        }
        return $project_count;
	}

	public static function btpjy_get_member_task_count() {
		$all_tasks = btpjy_Helper::btpjy_get_tasks();
        $all_tasks = array_reverse( $all_tasks );
        $sno = 0;
        foreach ( $all_tasks as $tkey => $tvalue ) {
            $member_arr = unserialize( $tvalue->assignee );
            if ( in_array( get_current_user_id(), $member_arr ) || $tvalue->status != 'Completed' ) {
            	$sno++;
            }
        }
        return $sno;
	}

	public static function btpjy_get_email_notification_list() {
		$email_notifications = array(
			'member_account'    => 'Send Member Account details',
			'project_assigneed' => 'Project Assigneed Alert',
			'task_assigneed'    => 'Task Assigneed Alert',
			'new_comment'       => 'New Comment Alert',
			'new_announcement'  => 'Announcement Alert',
		);
		return $email_notifications;
	}

	public static function btpjy_get_comments_count( $pid, $type, $type_id = null ) {
		global $wpdb;
        $table    = $wpdb->base_prefix . "btpjy_comments";

        if ( ! empty ( $type_id ) ) {
        	$comments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s AND type = %s AND type_id = %s", $pid, $type, $type_id ) );
        } else {
        	$comments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $pid ) );
        }
        
        $count    = 0;
        if ( ! empty ( $comments ) ) {
        	$count = count($comments);
        }

        return $count. ' '. esc_html__( 'Comments', 'projectify' );
	}

	public static function btpjy_get_project_all_comments_files( $pid ) {
		global $wpdb;
        $table    = $wpdb->base_prefix . "btpjy_comments";
        $comments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $pid ) );
        $file_arr = array();
        if ( ! empty ( $comments ) ) {
            foreach ( $comments as $comment_key => $comment_value ) {
            	$media_files = unserialize( $comment_value->media );
            	$user_id     = $comment_value->user_id;
            	$date        = $comment_value->date;
            	$time        = $comment_value->time;
            	if ( ! empty ( $media_files ) ) {
            		foreach ( $media_files as $media_key => $media_value ) {
		            	$myFile   = pathinfo( $media_value );
		                $validate = wp_check_filetype_and_ext( $media_value, $myFile['basename'] );

		            	$data = array(
		            		'file_name'   => $myFile['basename'],
		            		'ralated_to'  => '',
		            		'file_type'   => $validate["ext"],
		            		'date_time'   => self::btpjy_get_formated_time( $time ).', '.self::btpjy_get_formated_date( $date ),
		            		'uploaded_by' => self::btpjy_member_details( $user_id, 'name' ),
		            		'file_path'   => $media_value,
		            	);
		            	array_push( $file_arr, $data );
		            }
	            }
            }
        }
        return $file_arr;
	}

	public static function btpjy_get_task_list( $pid ) {
		global $wpdb;
        $table = $wpdb->base_prefix . "btpjy_tasks";
        $tasks = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $pid ) );
        $list  = array();
        foreach ( $tasks as $key => $value ) {
        	$data = array(
        		'id'   => $value->id,
        		'name' => $value->name,
        	);
        	array_push( $list, $data );
        }
        return $list;
	}

	public static function btpjy_all_files( $pid ) {
		global $wpdb;
        $table    = $wpdb->base_prefix . "btpjy_files";
        $comments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $pid ) );
        $file_arr = array();
        if ( ! empty ( $comments ) ) {
            foreach ( $comments as $comment_key => $comment_value ) {
            	$media_files = unserialize( $comment_value->media );
            	$date        = $comment_value->date;
            	$time        = $comment_value->time;

            	$related_to = $comment_value->related_to;
            	if ( $related_to == 'task' ) {
            		$task_id = $comment_value->task_id;
            		$task_info = self::btpjy_task_info( $task_id );
            		$task_name = $task_info->name;
            	} else {
            		$task_name = esc_html__( 'General file', 'projectify' );
            	}

            	if ( ! empty ( $media_files ) ) {
            		foreach ( $media_files as $media_key => $media_value ) {
		            	$myFile   = pathinfo( $media_value );
		                $validate = wp_check_filetype_and_ext( $media_value, $myFile['basename'] );

		            	$data = array(
		            		'file_name'   => $myFile['basename'],
		            		'ralated_to'  => $task_name,
		            		'file_type'   => $validate["ext"],
		            		'date_time'   => self::btpjy_get_formated_time( $time ).', '.self::btpjy_get_formated_date( $date ),
		            		'file_path'   => $media_value,
		            	);
		            	array_push( $file_arr, $data );
		            }
	            }
            }
        }
        return $file_arr;
	}

	public static function btpjy_email_html( $logo, $body, $heading ) {
		$email_settings = get_option( 'btpjy_email_settings' );
		$footer_txt     = $email_settings['footer_txt'];
		$message = '<!DOCTYPE html>
						<html>
						<head>
						<title></title>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<meta http-equiv="X-UA-Compatible" content="IE=edge" />
						<style type="text/css">
						    /* FONTS */
						    @media screen {
						        @font-face {
						          font-family: "Lato";
						          font-style: normal;
						          font-weight: 400;
						          src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
						        }
						        
						        @font-face {
						          font-family: "Lato";
						          font-style: normal;
						          font-weight: 700;
						          src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
						        }
						        
						        @font-face {
						          font-family: "Lato";
						          font-style: italic;
						          font-weight: 400;
						          src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
						        }
						        
						        @font-face {
						          font-family: "Lato";
						          font-style: italic;
						          font-weight: 700;
						          src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
						        }
						    }
						    
						    /* CLIENT-SPECIFIC STYLES */
						    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; color: #03a9f4c7; }
						    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
						    img { -ms-interpolation-mode: bicubic; }

						    /* RESET STYLES */
						    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
						    table { border-collapse: collapse !important; }
						    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

						    /* iOS BLUE LINKS */
						    a[x-apple-data-detectors] {
						        color: inherit !important;
						        text-decoration: none !important;
						        font-size: inherit !important;
						        font-family: inherit !important;
						        font-weight: inherit !important;
						        line-height: inherit !important;
						    }
						    
						    /* MOBILE STYLES */
						    @media screen and (max-width:1000px){
						        h1 {
						            font-size: 32px !important;
						            line-height: 32px !important;
						        }
						    }

						    /* ANDROID CENTER FIX */
						    div[style*="margin: 16px 0;"] { margin: 0 !important; }
						</style>

						<style type="text/css">

						</style>
						</head>
						<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

						<table border="0" cellpadding="0" cellspacing="0" width="100%">
						    <!-- LOGO -->
						    <tr>
						        <td bgcolor="#03a9f4c7" align="center">
						            <!--[if (gte mso 9)|(IE)]>
						            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						            <tr>
						            <td align="center" valign="top" width="600">
						            <![endif]-->
						            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1000px;" >
						                <tr>
						                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
						                    </td>
						                </tr>
						            </table>
						            <!--[if (gte mso 9)|(IE)]>
						            </td>
						            </tr>
						            </table>
						            <![endif]-->
						        </td>
						    </tr>
						    <!-- HERO -->
						    ';
						    if ( ! empty ( $logo ) ) {
							    $message .= '<tr>
							        <td bgcolor="#03a9f4c7" align="center" style="padding: 0px 10px 0px 10px;">
							            <!--[if (gte mso 9)|(IE)]>
							            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
							            <tr>
							            <td align="center" valign="top" width="600">
							            <![endif]-->
							            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1000px;" >
							                <tr>
							                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
							                	<h1 style="font-size: 48px; font-weight: 400; margin: 0;">
							                        <a href="'.esc_attr( esc_url( home_url('/') ) ).'" target="_blank">
							                            <img src="' . esc_attr( $logo ) . '" />
							                        </a>
							                    </h1>
							                    </td>
							                </tr>
							            </table>
							            <!--[if (gte mso 9)|(IE)]>
							            </td>
							            </tr>
							            </table>
							            <![endif]-->
							        </td>
							    </tr>
							    <!-- COPY BLOCK -->';
							}
						    $message .= '<tr>
						        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
						            <!--[if (gte mso 9)|(IE)]>
						            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						            <tr>
						            <td align="center" valign="top" width="600">
						            <![endif]-->
						            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1000px;" >
						              <!-- COPY -->
						              <tr>
						                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
						                    <h4 style="margin-bottom: 30px;text-align: center;">
						                        '. esc_html( $heading ).'
						                    </h4>
											<p style="margin: 0;">
						                        '. esc_html( $body ).'
											</p>
						                </td>
						              </tr>
						              <!-- COPY -->
						            </table>
						            <!--[if (gte mso 9)|(IE)]>
						            </td>
						            </tr>
						            </table>
						            <![endif]-->
						        </td>
						    </tr>
						    <!-- FOOTER -->
						    <tr>
						        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
						            <!--[if (gte mso 9)|(IE)]>
						            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
						            <tr>
						            <td align="center" valign="top" width="600">
						            <![endif]-->
						            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 1000px;" >
						              <!-- NAVIGATION -->
						              <tr>
						                <td bgcolor="#f4f4f4" align="left" style="padding: 30px 30px 30px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
						                  <p style="margin: 0;">
						                  <!-- Navigation-->
						                  </p>
						                </td>
						              </tr>
						              <!-- ADDRESS -->
						              <tr>
						                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;text-align: center" >
						                  <p style="margin: 0;">'.esc_html( $footer_txt ).'</p>
						                </td>
						              </tr>
						            </table>
						            <!--[if (gte mso 9)|(IE)]>
						            </td>
						            </tr>
						            </table>
						            <![endif]-->
						        </td>
						    </tr>
						</table>
						    
						</body>
						</html>';
	}

	public static function btpjy_send_member_login_details( $name, $firstname, $username, $password, $member_email ) {
		$general_settings = get_option( 'btpjy_settings' );
		$email_settings   = get_option( 'btpjy_email_settings' );
		$email_templates  = get_option( 'btpjy_email_templates' );

		$email_enable    = $email_settings['email_enable'];
		$member_account  = $email_settings['member_account'];

		if ( $email_enable == 'yes' && $member_account == 'yes' ) {
			$client_template = $email_templates['member_account'];
			$company_logo    = $general_settings['company_logo'];
			$company_name    = $general_settings['company_name'];

			$account_details = '<h3>'.esc_html__( 'Your new account created on', 'projectify' ). ' '. esc_html( $company_name ) .'</h3><p>
						'.esc_html__( 'Username:- ', 'projectify' ). ' '.$username.' </p><p> '
						.esc_html__( 'Password:- ', 'projectify' ). ' '.$password. '</p>';

			$tags = array(
				'{company_name}',
				'{first_name}',
				'{full_name}',
				'{login_url}',
				'{account_details}'
			);

			$tag_replace = array(
				$company_name,
				$firstname,
				$name,
				admin_url(),
				$account_details,
			);

			$body        = str_replace( $tags, $tag_replace, $client_template['body'] );
			$headers     = array( 'Content-Type: text/html; charset=UTF-8' );
			$subject     = str_replace( $tags, $tag_replace, $client_template['subject'] );
			$message     = self::btpjy_email_html( $company_logo, $body, $client_template['heading'] );
			$enquerysend = wp_mail( $member_email, $subject, wp_kses_post( $message ), $headers );
			if ( $enquerysend ) {
				return esc_html__( 'Login details sent', 'clockify' );
			} else {
				return esc_html__( 'Login details not sent', 'clockify' );
			}	
		}
	}

	public static function btpjy_send_project_assigneed_details( $project_id, $project_name, $project_description, $teams ) {
		$general_settings  = get_option( 'btpjy_settings' );
		$email_settings    = get_option( 'btpjy_email_settings' );
		$email_templates   = get_option( 'btpjy_email_templates' );
		$email_enable      = $email_settings['email_enable'];
		$project_assigneed = $email_settings['project_assigneed'];
		$project_detail    = self::btpjy_project_info( $project_id );
		$notifys_alert     = unserialize( $project_detail->notify );
		$communic_alert    = unserialize( $project_detail->alerts );

		if ( $email_enable == 'yes' && $project_assigneed == 'yes' ) {
			$client_template = $email_templates['project_assigneed'];
			$company_logo    = $general_settings['company_logo'];
			$company_name    = $general_settings['company_name'];

			$project_url = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'view',
                                            'row_id' => $project_id,
                                            ), admin_url( 'admin.php?page=projectify-pro-member-projects' ) ) ).'"></a>';

			$all_tids  = self::btpjy_get_team_member( $teams );
			if ( in_array( 'team', $notifys_alert ) || in_array( 'email', $communic_alert ) ) {
				foreach ( $all_tids as $team_key => $member ) {
					global $wpdb;
					$stable       = $wpdb->base_prefix . "btpjy_members";
	        		$membersmall  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
	        		$full_name    = $membersmall->name;
	        		$member_email = $membersmall->email;
	        		$notification = unserialize( $membersmall->notification );
	        		$email_check  = 'off';
	        		if ( count( $notificaation ) == 1 ) {
	        			$email_check = $notificaation[0];
	        		}

	        		$tags = array(
						'{project_name}',
						'{project_url}',
						'{login_url}',
						'{company_name}',
						'{full_name}',
						'{project_description}'
					);

					$tag_replace = array(
						$project_name,
						$project_url,
						admin_url(),
						$company_name,
						$full_name,
						$project_description,
					);

					$body        = str_replace( $tags, $tag_replace, $client_template['body'] );
					$headers     = array( 'Content-Type: text/html; charset=UTF-8' );
					$subject     = str_replace( $tags, $tag_replace, $client_template['subject'] );
					$message     = self::btpjy_email_html( $company_logo, $body, $client_template['heading'] );
					if ( $email_check == 'on' ) {
						$enquerysend = wp_mail( $member_email, $subject, wp_kses_post( $message ), $headers );
					}
	        	}
	        }
		}
	}

	public static function btpjy_send_task_assigneed_details( $project_id, $task_id, $task_name, $task_description, $assignees ) {
		$general_settings = get_option( 'btpjy_settings' );
		$email_settings   = get_option( 'btpjy_email_settings' );
		$email_templates  = get_option( 'btpjy_email_templates' );
		$email_enable     = $email_settings['email_enable'];
		$task_assigneed   = $email_settings['task_assigneed'];
		$project_detail   = self::btpjy_project_info( $project_id );
		$notifys_alert    = unserialize( $project_detail->notify );
		$communic_alert   = unserialize( $project_detail->alerts );

		if ( $email_enable == 'yes' && $task_assigneed == 'yes' ) {
			$client_template = $email_templates['task_assigneed'];
			$company_logo    = $general_settings['company_logo'];
			$company_name    = $general_settings['company_name'];

			$task_url = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'view',
                                            'row_id' => $task_id,
                                            ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ).'"></a>';

			$all_tids  = unserialize( $assignees );
			if ( in_array( 'team', $notifys_alert ) || in_array( 'email', $communic_alert ) ) {
				foreach ( $all_tids as $team_key => $member ) {
					global $wpdb;
					$stable       = $wpdb->base_prefix . "btpjy_members";
	        		$membersmall  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
	        		$full_name    = $membersmall->name;
	        		$member_email = $membersmall->email;
	        		$notification = unserialize( $membersmall->notification );
	        		$email_check  = 'off';
	        		if ( count( $notificaation ) == 1 ) {
	        			$email_check = $notificaation[0];
	        		}

	        		$tags = array(
						'{task_name}',
						'{task_url}',
						'{login_url}',
						'{company_name}',
						'{full_name}',
						'{task_description}'
					);

					$tag_replace = array(
						$task_name,
						$task_url,
						admin_url(),
						$company_name,
						$full_name,
						$task_description,
					);

					$body        = str_replace( $tags, $tag_replace, $client_template['body'] );
					$headers     = array( 'Content-Type: text/html; charset=UTF-8' );
					$subject     = str_replace( $tags, $tag_replace, $client_template['subject'] );
					$message     = self::btpjy_email_html( $company_logo, $body, $client_template['heading'] );
					if ( $email_check == 'on' ) {
						$enquerysend = wp_mail( $member_email, $subject, wp_kses_post( $message ), $headers );
					}
	        	}
	        }
		}
	}

	public static function btpjy_send_new_announcement_details( $announcement_text ) {
		$general_settings = get_option( 'btpjy_settings' );
		$email_settings   = get_option( 'btpjy_email_settings' );
		$email_templates  = get_option( 'btpjy_email_templates' );

		$email_enable     = $email_settings['email_enable'];
		$new_announcement = $email_settings['new_announcement'];

		if ( $email_enable == 'yes' && $new_announcement == 'yes' ) {
			$client_template = $email_templates['new_announcement'];
			$company_logo    = $general_settings['company_logo'];
			$company_name    = $general_settings['company_name'];

			$all_tids  = self::btpjy_get_members();
			foreach ( $all_tids as $team_key => $member ) {
				global $wpdb;
				$stable       = $wpdb->base_prefix . "btpjy_members";
        		$membersmall  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
        		$full_name    = $membersmall->name;
        		$member_email = $membersmall->email;
        		$notification = unserialize( $membersmall->notification );
        		$email_check  = 'off';
        		if ( count( $notificaation ) == 1 ) {
        			$email_check = $notificaation[0];
        		}

        		$tags = array(
					'{bug_name}',
					'{bug_url}',
					'{login_url}',
					'{company_name}',
					'{full_name}',
					'{bug_description}'
				);

				$tag_replace = array(
					$project_name,
					$project_url,
					admin_url(),
					$company_name,
					$full_name,
					$project_description,
				);

				$body        = str_replace( $tags, $tag_replace, $client_template['body'] );
				$headers     = array( 'Content-Type: text/html; charset=UTF-8' );
				$subject     = str_replace( $tags, $tag_replace, $client_template['subject'] );
				$message     = self::btpjy_email_html( $company_logo, $body, $client_template['heading'] );
				if ( $email_check == 'on' ) {
					$enquerysend = wp_mail( $member_email, $subject, wp_kses_post( $message ), $headers );
				}
        	}
		}
	}

	public static function btpjy_send_new_comment_details( $project_id, $type, $typeid, $comment_text, $user_id ) {
		$general_settings = get_option( 'btpjy_settings' );
		$email_settings   = get_option( 'btpjy_email_settings' );
		$email_templates  = get_option( 'btpjy_email_templates' );
		$email_enable     = $email_settings['email_enable'];
		$new_comment      = $email_settings['new_comment'];
		$project_detail   = btpjy_Helper::btpjy_project_info( $project_id );
		$comments_alert   = unserialize( $project_detail->comments );
		$communic_alert   = unserialize( $project_detail->alerts );

		if ( $email_enable == 'yes' && $new_comment == 'yes' ) {
			$client_template = $email_templates['new_comment'];
			$company_logo    = $general_settings['company_logo'];
			$company_name    = $general_settings['company_name'];

			global $wpdb;

			if ( $type == 'btpjy_tasks' ) {
				$table = $wpdb->base_prefix . "btpjy_tasks";
				$data  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $typeid ) );
				$task  = esc_html__( 'Task:- ', 'projectify' ) .$data->name;
				$date  = self::btpjy_get_formated_date( $data->date );
				$time  = self::btpjy_get_formated_time( $data->time );
				$all_tids    = unserialize( $data->assignee );
				$comment_url = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'view',
                                            'row_id' => $data->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ).'"></a>';
				$commenturl1 = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'view',
                                            'row_id' => $data->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ).'"></a>';
			} elseif ( $type == 'btpjy_subtasks' ) {
				$table = $wpdb->base_prefix . "btpjy_subtasks";
				$data  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $typeid ) );
				$task  = esc_html__( 'Subtask:- ', 'projectify' ) .$data->name;
				$date  = self::btpjy_get_formated_date( $data->date );
				$time  = self::btpjy_get_formated_time( $data->time );
				$all_tids    = unserialize( $data->assignee );
				$comment_url = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'subtask',
                                            'row_id' => $data->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ).'"></a>';
				$commenturl1 = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'subtask',
                                            'row_id' => $data->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ).'"></a>';
			} elseif ( $type == 'btpjy_bugs' ) {
				$table = $wpdb->base_prefix . "btpjy_bugs";
				$data  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $typeid ) );
				$task  = esc_html__( 'Bug:- ', 'projectify' ) .$data->name;
				$date  = self::btpjy_get_formated_date( $data->date );
				$time  = self::btpjy_get_formated_time( $data->time );
				$all_tids    = unserialize( $data->assignee );
				$comment_url = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'bview',
                                            'row_id' => $data->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-member-projects' ) ) ).'"></a>';
				$commenturl1 = '<a href="'.esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action' => 'bview',
                                            'row_id' => $data->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ).'"></a>';
			}

			$cmtby = self::btpjy_member_details( $user_id, 'name' );

			if ( in_array( 'team', $comments_alert ) || in_array( 'email', $communic_alert ) ) {
				foreach ( $all_tids as $team_key => $member ) {
					$stable       = $wpdb->base_prefix . "btpjy_members";
	        		$membersmall  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
	        		$full_name    = $membersmall->name;
	        		$member_email = $membersmall->email;
	        		$notification = unserialize( $membersmall->notification );
	        		$email_check  = 'off';
	        		$sms_check    = 'off';
	        		if ( count( $notificaation ) == 1 ) {
	        			$email_check = $notificaation[0];
	        		}

	        		$tags = array(
	        			'{comment_by}',
	        			'{project}',
	        			'{date/time}',
						'{comment_on}',
						'{comment_url}',
						'{login_url}',
						'{full_name}',
						'{comment_text}'
					);
					$tag_replace = array(
						$cmtby,
						$project_detail->name. ' ( '.$task.' )',
						$date.', ' .$time,
						$task,
						$comment_url,
						admin_url(),
						$full_name,
						$comment_text,
					);
					$body        = str_replace( $tags, $tag_replace, $client_template['body'] );
					$headers     = array( 'Content-Type: text/html; charset=UTF-8' );
					$subject     = str_replace( $tags, $tag_replace, $client_template['subject'] );
					$message     = self::btpjy_email_html( $company_logo, $body, $client_template['heading'] );
					if ( $user_id != $member_email->user_id && $email_check == 'on' ) {
						$enquerysend = wp_mail( $member_email, $subject, wp_kses_post( $message ), $headers );
					}
	        	}
	        }

	        if ( in_array( 'admin', $comments_alert ) || in_array( 'email', $communic_alert ) ) {
	        	$tags = array(
	    			'{comment_by}',
	    			'{project}',
	    			'{date/time}',
					'{comment_on}',
					'{comment_url}',
					'{login_url}',
					'{full_name}',
					'{comment_text}'
				);
				$tag_replace = array(
					$cmtby,
					$project_detail->name. ' ( '.$task.' )',
					$date.', ' .$time,
					$task,
					$commenturl1,
					admin_url(),
					esc_html__( 'Administrator', 'projectify' ),
					$comment_text,
				);
				$body        = str_replace( $tags, $tag_replace, $client_template['body'] );
				$headers     = array( 'Content-Type: text/html; charset=UTF-8' );
				$subject     = str_replace( $tags, $tag_replace, $client_template['subject'] );
				$message     = self::btpjy_email_html( $company_logo, $body, $client_template['heading'] );
				$enquerysend = wp_mail( $member_email, $subject, wp_kses_post( $message ), $headers );
			}
		}
	}

	public static function btpjy_get_project_digits( $type ) {
		global $wpdb;
        $table = $wpdb->base_prefix . "btpjy_projects";
        $data  = $wpdb->get_results( "SELECT * FROM $table" );
        $count = 0;
        foreach ( $data as $key => $value ) {
        	if ( $value->status == $type || $type == 'all' ) {
        		$count++;
        	}
        }
        return $count;
	}

	public static function btpjy_get_task_digits( $type ) {
		global $wpdb;
        $table = $wpdb->base_prefix . "btpjy_tasks";
        $data  = $wpdb->get_results( "SELECT * FROM $table" );
        $count = 0;
        foreach ( $data as $key => $value ) {
        	if ( $value->status == $type || $type == 'all' ) {
        		$count++;
        	}
        }
        return $count;
	}

}