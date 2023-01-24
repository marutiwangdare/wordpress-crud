<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

$email_templates   = get_option( 'btpjy_email_templates' );
$client_account    = $email_templates["client_account"];
$member_account    = $email_templates['member_account'];
$project_assigneed = $email_templates['project_assigneed'];
$task_assigneed    = $email_templates['task_assigneed'];
$subtask_assigneed = $email_templates['subtask_assigneed'];
$new_comment       = $email_templates['new_comment'];
$bug_assigneed     = $email_templates['bug_assigneed'];
$new_announcement  = $email_templates['new_announcement'];
?>
<form class="form-sample" id="EmailTemplateForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
  	<?php $nonce = wp_create_nonce('btpjy_save_email_templates'); ?>
  	<input type="hidden" name="btpjy_email_templates_options" value="<?php echo esc_attr( $nonce ); ?>">
  	<input type="hidden" name="action" value="btpjy_email_templates">
  	<div class="card-body">
  		<h4 class="card-title sub-heading-title"><?php esc_html_e( '1. Client Account details', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="client_account_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $client_account['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="client_account_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $client_account['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $client_account['body'], 'client_account_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '2. Member Account details', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="member_account_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $member_account['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="member_account_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $member_account['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $member_account['body'], 'member_account_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '3. Project Assigneed', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="project_assigneed_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $project_assigneed['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="project_assigneed_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $project_assigneed['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $project_assigneed['body'], 'project_assigneed_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '4. Task Assigneed', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="task_assigneed_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $task_assigneed['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="task_assigneed_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $task_assigneed['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $task_assigneed['body'], 'task_assigneed_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '5. Subtask Assigneed', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="subtask_assigneed_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $subtask_assigneed['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="subtask_assigneed_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $subtask_assigneed['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $subtask_assigneed['body'], 'subtask_assigneed_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '6. New Comment', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="new_comment_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $new_comment['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="new_comment_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $new_comment['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $new_comment['body'], 'new_comment_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '7. Bug Assigneed', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="bug_assigneed_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $bug_assigneed['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="bug_assigneed_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $bug_assigneed['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $bug_assigneed['body'], 'bug_assigneed_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<h4 class="card-title sub-heading-title"><?php esc_html_e( '8. New Announcement', 'clockify' ); ?></h4>
	  	<div class="form-group row">
		  	<div class="col-lg-6">
				<label><?php esc_html_e( 'Subject:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="new_announcement_subject" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $new_announcement['subject'] ) ); ?>">
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Email Heading:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="new_announcement_heading" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $new_announcement['heading'] ) ); ?>">
			</div>
	  	</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<label><?php esc_html_e( 'Email Body:', 'projectify' ); ?></label>
				<?php   
		          wp_editor( $new_announcement['body'], 'new_announcement_body', $settings = array( 'editor_height' => 400, 'media_buttons' => false, 'textarea_rows' => 40, 'drag_drop_upload' => true ) ); 
		        ?>
			</div>
		</div>
		<hr/>

		<div class="form-group row">
			<div class="col-lg-12">
				<button type="submit" class="btn btn-success font-weight-bolder px-10 py-3" id="EmailTemplateBtn"><?php esc_html_e( 'Save changes', 'projectify' ); ?>
					<span class="svg-icon svg-icon-md ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002)"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
			</div>
		</div>

	</div>
</form>