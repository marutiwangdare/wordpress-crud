<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$row_id = sanitize_text_field( $_GET['row_id'] );

global $wpdb;
$table = $wpdb->base_prefix . "btpjy_teams";
$teams = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $row_id ) );

$members = unserialize( $teams->members );
$leader  = $teams->team_leader;
$table   = $wpdb->base_prefix . "btpjy_members";
$leader  = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %s", $leader ) );
?>
<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Team Details', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'View team details', 'projectify' ); ?></span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="<?php echo esc_attr( esc_url( $_SERVER['HTTP_REFERER'] ) ); ?>" class="btn btn-white btn-hover-bg-white btn-hover-text-primary font-weight-bold font-weight-bolder font-size-sm px-5 btn-fixed-height"><?php esc_html_e( 'Back', 'projectify' ); ?></a>
                <!--end::Button-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->

    <div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Card-->
			<div class="card card-custom gutter-b">
				<div class="card-body">
					<!--begin::Top-->
					<div class="d-flex">
						<!--begin::Pic-->
						<div class="flex-shrink-0 mr-7">
							<?php 
                                $class = btpjy_Helper::btpjy_background_class();
                            ?>
							<div class="symbol symbol-50 symbol-lg-120 symbol-circle <?php echo esc_attr( $class ); ?>">
								<span class="font-size-h3 symbol-label font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $teams->name ) ); ?></span>
							</div>
						</div>
						<!--end::Pic-->
						<!--begin: Info-->
						<div class="flex-grow-1">
							<!--begin::Title-->
							<div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
								<!--begin::User-->
								<div class="mr-3">
									<!--begin::Name-->
									<a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
										<?php echo esc_html( $teams->name ); ?>
									</a>
									<!--end::Name-->
								</div>
								<!--begin::User-->
								<!--begin::Actions-->
								<div class="my-lg-0 my-1">
									<a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'profile',
                                                'row_id'  => $teams->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-teams' ) ) ); ?>" class="btn btn-sm btn-light-primary font-weight-bolder mr-2"><?php esc_html_e( 'Edit', 'projectify' ); ?></a>
									<a href="#" class="btn btn-sm btn-danger font-weight-bolder delete-entities" data-table="btpjy_teams" data-id="<?php echo esc_attr( $teams->id ); ?>"><?php esc_html_e( 'Delete', 'projectify' ); ?></a>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Title-->
							<!--begin::Content-->
							<div class="d-flex align-items-center flex-wrap justify-content-between">
								<!--begin::Description-->
								<div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
									<?php echo esc_html( $teams->description ); ?>
								</div>
								<!--end::Description-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Info-->
					</div>
					<!--end::Top-->
				</div>
			</div>

			<!--begin::Subheader-->
		    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
		        <div class="d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		            <!--begin::Details-->
		            <div class="d-flex align-items-center flex-wrap mr-2">
		                <!--begin::Title-->
		                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Team Members', 'projectify' ); ?></h5>
		                <!--end::Title-->
		                <!--begin::Separator-->
		                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
		                <!--end::Separator-->
		                <!--begin::Search Form-->
		                <div class="d-flex align-items-center" id="btpjy_subheader_search">
		                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'View all team member details', 'projectify' ); ?></span>
		                </div>
		                <!--end::Search Form-->
		            </div>
		            <!--end::Details-->
		        </div>
		    </div>
		    <!--end::Subheader-->

			<div class="row">
                <?php if ( ! empty( $leader ) ) { ?>
				<!-- begin::Team-leader -->
				<div class="col-xxl-3 col-xl-6 col-md-6 col-sm-6 members-list-cards team-leader-card">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <div class="text-center mb-7">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label" style="background-image:url('<?php echo esc_attr( $leader->picture ); ?>')"></div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>
                                <h4 class="font-weight-bold my-2">
                                    <a href="<?php echo esc_url( 
                                        add_query_arg( 
                                        array(
                                        'action'  => 'contact',
                                        'user_id' => $leader->user_id,
                                        ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="text-dark"><?php echo esc_html( $leader->name ); ?>
                                    </a>
                                </h4>
                                <div class="text-muted mb-2"><?php echo esc_html( $leader->job_title ); ?></div>
                            </div>
                            <!--end::Contacts-->
                            <?php if ( ! empty ( $leader->facebook ) || ! empty ( $leader->skype ) || ! empty ( $leader->email ) ) { ?>
                            <div class="mb-7 text-center">
                                <?php if ( ! empty ( $leader->facebook ) ) { ?>
                                <a href="https://www.facebook.com/profile.php?id=<?php echo esc_attr( $leader->facebook ); ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                    <i class="fab fa-facebook-f icon-1x"></i>
                                </a>
                                <?php } if ( ! empty ( $leader->skype ) ) { ?>
                                <a href="https://join.skype.com/invite/<?php echo esc_attr( $leader->skype ); ?>" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                    <i class="fab fa-skype icon-1x"></i>
                                </a>
                                <?php } if ( ! empty ( $leader->email ) ) { ?>
                                <a href="mailto:<?php echo esc_attr( $leader->email ); ?>" class="btn btn-icon btn-circle btn-light-google">
                                    <i class="far fa-envelope icon-1x"></i>
                                </a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!-- end::Team-leader -->
                <?php } 
                foreach ( $members as $key => $member ) {
                	if ( $member != $teams->team_leader ) {
                        $table       = $wpdb->base_prefix . "btpjy_members";
                    	$member_data = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %s", $member ) );
                        if ( ! empty ( $member_data ) ) {
                ?>
                <div class="col-xxl-3 col-xl-6 col-md-6 col-sm-6 members-list-cards">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <div class="text-center mb-7">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label" style="background-image:url('<?php echo esc_attr( $member_data->picture ); ?>')"></div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>
                                <h4 class="font-weight-bold my-2">
                                    <a href="<?php echo esc_url( 
                                        add_query_arg( 
                                        array(
                                        'action'  => 'profile',
                                        'user_id' => $member_data->user_id,
                                        ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="text-dark"><?php echo esc_html( $member_data->name ); ?>
                                    </a>
                                </h4>
                                <div class="text-muted mb-2"><?php echo esc_html( $member_data->job_title ); ?></div>
                            </div>
                            <!--end::Contacts-->
                            <?php if ( ! empty ( $member_data->facebook ) || ! empty ( $member_data->skype ) || ! empty ( $member_data->email ) ) { ?>
                            <div class="mb-7 text-center">
                                <?php if ( ! empty ( $member_data->facebook ) ) { ?>
                                <a href="https://www.facebook.com/profile.php?id=<?php echo esc_attr( $member_data->facebook ); ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                    <i class="fab fa-facebook-f icon-1x"></i>
                                </a>
                                <?php } if ( ! empty ( $member_data->skype ) ) { ?>
                                <a href="https://join.skype.com/invite/<?php echo esc_attr( $member_data->skype ); ?>" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                    <i class="fab fa-skype icon-1x"></i>
                                </a>
                                <?php } if ( ! empty ( $member_data->email ) ) { ?>
                                <a href="mailto:<?php echo esc_attr( $member_data->email ); ?>" class="btn btn-icon btn-circle btn-light-google">
                                    <i class="far fa-envelope icon-1x"></i>
                                </a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
            	<?php } } } ?>
			</div>
		</div>
	</div>
</div>