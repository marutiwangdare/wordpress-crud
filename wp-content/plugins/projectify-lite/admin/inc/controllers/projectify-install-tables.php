<?php
defined( 'ABSPATH' ) or wp_die();

/**
 *  Create Datatables for Clockify
 */
class btpjy_InstallTables {
	
	public static function btpjy_include_upgrade_file() {
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	}

	public static function btpjy_initiate_tables() {
		self::btpjy_initiate_option_names();
		self::btpjy_include_upgrade_file();
		self::btpjy_initiate_teams_table();
        self::btpjy_initiate_members_table();
        self::btpjy_initiate_projects_table();
        self::btpjy_initiate_tasks_table();
        self::btpjy_initiate_comments_table();
        self::btpjy_initiate_departments_table();
        self::btpjy_initiate_annaouncements_table();
        self::btpjy_initiate_messages_table();
        self::btpjy_initiate_files_table();
        self::btpjy_initiate_templates();
		
	}

	public static function btpjy_initiate_option_names() {
		add_option( 'btpjy_settings' );
		add_option( 'btpjy_email_templates' );
		add_option( 'btpjy_email_settings' );
	}

    public static function btpjy_table_exists( $table_name ) {
	   global $wpdb;
	   $table = $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" );
	   return $table;
	}

	public static function btpjy_table_column_exists( $table_name, $column_name ) {
	   global $wpdb;
	   $column = $wpdb->get_results( $wpdb->prepare(
	       "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = %s AND TABLE_NAME = %s AND COLUMN_NAME = %s ",
	       DB_NAME, $table_name, $column_name
	   ) );
	   if ( ! empty( $column ) ) {
	       return true;
	   }
	   return false;
	}

	protected static function btpjy_get_wp_charset_collate() {

		global $wpdb;
		$charset_collate = '';

		if ( ! empty ( $wpdb->charset ) )
			$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";

		if ( ! empty ( $wpdb->collate ) )
			$charset_collate .= " COLLATE $wpdb->collate";

		return $charset_collate;
	}

	public static function btpjy_initiate_teams_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_teams";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) NOT NULL,
				  `description` longtext NOT NULL,
				  `members` varchar(255) NOT NULL,
				  `team_leader` varchar(255) NOT NULL,
				  `status` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

    public static function btpjy_initiate_members_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_members";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `user_id` varchar(255) NOT NULL,
				  `name` varchar(255) NOT NULL,
				  `first_name` varchar(255) NOT NULL,
				  `last_name` varchar(255) NOT NULL,
				  `user_name` varchar(255) NOT NULL,
				  `notification` varchar(255) NOT NULL,
				  `email` varchar(255) NOT NULL,
				  `phone` varchar(255) NOT NULL,
				  `picture` varchar(255) NOT NULL,
				  `department` varchar(255) NOT NULL,
				  `job_title` varchar(255) NOT NULL,
				  `role` varchar(255) NOT NULL,
				  `facebook` varchar(255) NOT NULL,
				  `skype` varchar(255) NOT NULL,
				  `status` varchar(255) NOT NULL,
				  `address1` varchar(255) NOT NULL,
				  `address2` varchar(255) NOT NULL,
				  `city` varchar(255) NOT NULL,
				  `state` varchar(255) NOT NULL,
				  `country` varchar(255) NOT NULL,
				  `postcode` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

    public static function btpjy_initiate_projects_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_projects";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) NOT NULL,
				  `project_breif` longtext NOT NULL,
				  `general_info` longtext NOT NULL,
				  `client` varchar(255) NOT NULL,
				  `start_date` varchar(255) NOT NULL,
				  `end_date` varchar(255) NOT NULL,
				  `deposit_amnt` varchar(255) NOT NULL,
				  `teams` varchar(255) NOT NULL,
				  `milestones` varchar(255) NOT NULL,
				  `alerts` varchar(255) NOT NULL,
				  `notify` varchar(255) NOT NULL,
				  `comments` varchar(255) NOT NULL,
				  `status` varchar(255) NOT NULL,
				  `priority` varchar(255) NOT NULL,
				  `progress` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

    public static function btpjy_initiate_tasks_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_tasks";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) NOT NULL,
                  `project_id` varchar(255) NOT NULL,
				  `milestone_id` varchar(255) NOT NULL,
				  `description` longtext NOT NULL,
				  `start` varchar(255) NOT NULL,
				  `end` varchar(255) NOT NULL,
				  `estimated_time` varchar(255) NOT NULL,
				  `assignee` varchar(255) NOT NULL,
				  `status` varchar(255) NOT NULL,
				  `priority` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

	public static function btpjy_initiate_comments_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_comments";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `project_id` varchar(255) NOT NULL,
				  `type` varchar(255) NOT NULL,
				  `type_id` varchar(255) NOT NULL,
				  `user_id` varchar(255) NOT NULL,
				  `comment` longtext NOT NULL,
				  `date` varchar(255) NOT NULL,
				  `time` varchar(255) NOT NULL,
				  `media` longtext NOT NULL,
				  `status` varchar(555) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

    public static function btpjy_initiate_departments_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_departments";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `name` varchar(255) NOT NULL,
				  `status` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

	public static function btpjy_initiate_annaouncements_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_announcements";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `title` varchar(255) NOT NULL,
				  `description` longtext NOT NULL,
				  `date` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

	public static function btpjy_initiate_messages_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_messages";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `team` varchar(255) NOT NULL,
				  `message` longtext NOT NULL,
				  `client` varchar(255) NOT NULL,
				  `visibility` varchar(255) NOT NULL,
				  `project_id` varchar(255) NOT NULL,
				  `date` varchar(255) NOT NULL,
				  `time` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

	public static function btpjy_initiate_files_table() {
		global $wpdb;
		$charset_collate = self::btpjy_get_wp_charset_collate();

		$table_name  = $wpdb->base_prefix . "btpjy_files";
		$table_check = self::btpjy_table_exists( $table_name );
		if ( empty ( $table_check ) ) {
			$wpdb->query(
				"CREATE TABLE IF NOT EXISTS `$table_name` (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `related_to` varchar(255) NOT NULL,
				  `task_id` varchar(255) NOT NULL,
				  `media` longtext NOT NULL,
				  `project_id` varchar(255) NOT NULL,
				  `date` varchar(255) NOT NULL,
				  `time` varchar(255) NOT NULL,
				 PRIMARY KEY (`id`)
				)$charset_collate;"
			);
		}
	}

	public static function btpjy_initiate_templates() {

		$btpjy_email_templates = get_option( 'btpjy_email_templates' );

		//Client Login Details
        $client_account = [
            'subject' => 'Account details {company_name}',
            'heading' => '{first_name} your login details!',
			'body'    => 'Dear {full_name},
			<br>
			Your account details are as below 
			<br>
			{account_details}
			<br>
			<br>
			Feel free to login and track your project status from here {login_url}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {full_name}, {first_name}, {login_url}, {company_name}, {account_details}.'
		];

		//Member Login Details
        $member_account = [
            'subject' => 'Account details {company_name}',
            'heading' => '{first_name} your login details!',
			'body'    => 'Dear {full_name},
			<br>
			Your account details are as below 
			<br>
			{account_details}
			<br>
			<br>
			You can login and see your assignned project, task & bugs status from here and start working on your tasks {login_url}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {full_name}, {first_name}, {login_url}, {company_name}, {account_details}.'
		];

		//Project Assigneed
        $project_assigneed = [
            'subject' => 'New Project Assigneed',
            'heading' => 'You\'ve been assigneed to the project ( {project_name} )',
			'body'    => 'Hi {full_name},
			<br>
			{company_name} assigneed you to <b>{project_name}</b> project
			<br>
			Please note that to start working on it, Please login to this {login_url} and go to this URL {project_url}.
			<br>
			{project_description}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {project_name}, {project_url}, {login_url}, {company_name}, {full_name}, {project_description}.'
		];

		//Task Assigneed
        $task_assigneed = [
            'subject' => 'New Task Assigneed',
            'heading' => 'You\'ve been assigneed to the task ( {task_name} )',
			'body'    => 'Hi {full_name},
			<br>
			{company_name} assigneed you to <b>{task_name}</b> task
			<br>
			Please note that to start working on it, Please login to this {login_url} and go to this URL {task_url}.
			<br>
			{task_description}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {task_name}, {task_url}, {login_url}, {company_name}, {full_name}, {task_description}.'
		];

		//Subtask Assigneed
        $subtask_assigneed = [
            'subject' => 'New Subtask Assigneed',
            'heading' => 'You\'ve been assigneed to the subtask ( {subtask_name} )',
			'body'    => 'Hi {full_name},
			<br>
			{company_name} assigneed you to <b>{subtask_name}</b> subtask
			<br>
			Please note that to start working on it, Please login to this {login_url} and go to this URL {subtask_url}.
			<br>
			{subtask_description}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {subtask_name}, {subtask_url}, {login_url}, {company_name}, {full_name}, {subtask_description}.'
		];

		//Bug Assigneed
        $bug_assigneed = [
            'subject' => 'New Bug Assigneed',
            'heading' => 'You\'ve been assigneed to the subtask ( {bug_name} )',
			'body'    => 'Hi {full_name},
			<br>
			{company_name} assigneed you to <b>{bug_name}</b> subtask
			<br>
			Please note that to start working on it, Please login to this {login_url} and go to this URL {bug_url}.
			<br>
			{bug_description}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {bug_name}, {bug_url}, {login_url}, {company_name}, {full_name}, {bug_description}.'
		];

		//New Comment
        $new_comment = [
            'subject' => 'New Comment',
            'heading' => 'You\'ve new comment on ( {comment_on} )',
			'body'    => 'Hi {full_name},
			<br>
			{comment_by} commented on {project} at {date/time}.
			<br>
			To view this comment, Please login to this {login_url} and go to this URL {comment_url}.
			<br>
			{comment_text}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {comment_by}, {project}, {date/time}, {comment_on}, {comment_url}, {login_url}, {full_name}, {comment_text}.'
		];

		//New Announcement
        $new_announcement = [
            'subject' => 'Announcement from {company_name}',
            'heading' => 'You\'ve new Announcement',
			'body'    => 'Hi {full_name},
			<br>
			{announcement_text}
			<br>
			Sincerely,
			<br>
			Manager Name
			<br>
			CEO, Company Name
			<br>',
			'tags'   => 'You may use these template tags inside subject, heading, body and those will be replaced by original values: {company_name}, {full_name}, {announcement_text}.'
		];

		$data = array(
			'client_account'    => $client_account,
			'member_account'    => $member_account,
			'project_assigneed' => $project_assigneed,
			'task_assigneed'    => $task_assigneed,
			'subtask_assigneed' => $subtask_assigneed,
			'new_comment'       => $new_comment,
			'bug_assigneed'     => $bug_assigneed,
			'new_announcement'  => $new_announcement,
		);
		if ( empty ( $btpjy_email_templates ) ) {
			update_option( 'btpjy_email_templates', $data );
		}
	}

}