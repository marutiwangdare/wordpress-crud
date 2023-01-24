<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$row_id      = sanitize_text_field( $_GET['row_id'] );
$project     = btpjy_Helper::btpjy_project_info( $row_id );
$teams       = unserialize( $project->teams );

if ( $project->priority == 'High' ) {
    $priority_class = 'label-light-danger';
} elseif ( $project->priority == 'Medium' ) {
    $priority_class = 'label-light-warning';
} else {
    $priority_class = 'label-light-success';
}
?>
<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Project Details', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'View project details', 'projectify' ); ?></span>
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
							<?php $class = btpjy_Helper::btpjy_background_class(); ?>
							<div class="symbol symbol-50 symbol-lg-120 symbol-circle <?php echo esc_attr( $class ); ?>">
								<span class="display3 symbol-label font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $project->name ) ); ?></span>
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
										<?php echo esc_html( $project->name ); ?>
									</a>
									<!--end::Name-->
								</div>
								<!--begin::User-->
								<!--begin::Actions-->
								<div class="my-lg-0 my-1">
									<input type="hidden" name="projectid" id="projectid" value="<?php echo esc_attr( $row_id ); ?>">
									<select class="selectpicker" data-live-search="true" name="progress" id="progress">
										<option value=""><?php esc_html_e( 'Set the project progress', 'projectify' ); ?></option>
										<?php for ( $i=1; $i < 101; $i++ ) { ?>
										<option value="<?php echo esc_attr( $i ); ?>%" <?php selected( $project->progress, $i.'%' ); ?>><?php echo esc_html( $i ); ?>%</option>
										<?php } ?>
									</select>
									<a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'edit',
                                                'row_id'  => $project->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="btn btn-sm btn-light-primary font-weight-bolder mr-2"><?php esc_html_e( 'Edit', 'projectify' ); ?></a>
									<a href="#" data-id="<?php echo esc_attr( $project->id ); ?>" class="btn btn-sm btn-danger font-weight-bolder  delete-entities" data-table="btpjy_projects" data-id="<?php echo esc_attr( $projects->id ); ?>"><?php esc_html_e( 'Delete', 'projectify' ); ?></a>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Title-->
							<!--begin::Content-->
							<div class="d-flex align-items-center flex-wrap justify-content-between">
								<!--begin::Description-->
								<div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
									<?php echo esc_html( $project->project_breif ); ?>
								</div>
								<!--end::Description-->
							</div>
							<!--end::Content-->
							<div class="subtask-inner-details"> 
                                <strong><?php esc_html_e( 'Priority:', 'projectify' ); ?></strong>
                                <span id="ms_deadline_72-1">
                                    <span class="label <?php echo esc_attr( $priority_class ); ?> label-inline font-weight-bolder label-lg mr-2"><?php echo esc_html( $project->priority ); ?></span>
                                </span>
                            </div>
                            <?php if ( empty ( $project->progress ) ) {
                            	$project_progress = '0%';
                            } else {
                            	$project_progress = $project->progress;
                            } ?>
                            <!--begin::Progress-->
                            <strong class="mt-5 pb-2"><?php esc_html_e( 'Progress:', 'projectify' ); ?></strong>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo esc_attr( $project_progress ); ?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo esc_html( $project_progress ); ?></div>
                            </div>
                            <!--end::Progress-->
						</div>
						<!--end::Info-->
					</div>
					<!--end::Top-->
					<!--begin::Separator-->
					<div class="separator separator-solid my-7"></div>
					<!--end::Separator-->
					<!--begin::Bottom-->
					<div class="d-flex align-items-center flex-wrap">
						<!--begin: Item-->
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<span class="svg-icon svg-icon-2x">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<path d="M18.4246212,12.6464466 L21.2530483,9.81801948 C21.4483105,9.62275734 21.764893,9.62275734 21.9601551,9.81801948 L22.6672619,10.5251263 C22.862524,10.7203884 22.862524,11.0369709 22.6672619,11.232233 L19.8388348,14.0606602 C19.6435726,14.2559223 19.3269901,14.2559223 19.131728,14.0606602 L18.4246212,13.3535534 C18.2293591,13.1582912 18.2293591,12.8417088 18.4246212,12.6464466 Z M3.22182541,17.9497475 L13.1213203,8.05025253 C13.5118446,7.65972824 14.1450096,7.65972824 14.5355339,8.05025253 L15.9497475,9.46446609 C16.3402718,9.85499039 16.3402718,10.4881554 15.9497475,10.8786797 L6.05025253,20.7781746 C5.65972824,21.1686989 5.02656326,21.1686989 4.63603897,20.7781746 L3.22182541,19.363961 C2.83130112,18.9734367 2.83130112,18.3402718 3.22182541,17.9497475 Z" fill="#000000" opacity="0.3"></path>
											<path d="M12.3890873,1.28248558 L12.3890873,1.28248558 C15.150511,1.28248558 17.3890873,3.52106183 17.3890873,6.28248558 L17.3890873,10.7824856 C17.3890873,11.058628 17.1652297,11.2824856 16.8890873,11.2824856 L12.8890873,11.2824856 C12.6129449,11.2824856 12.3890873,11.058628 12.3890873,10.7824856 L12.3890873,1.28248558 Z" fill="#000000" transform="translate(14.889087, 6.282486) rotate(-45.000000) translate(-14.889087, -6.282486)"></path>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<div class="d-flex flex-column flex-lg-fill">
								<span class="text-dark-75 font-weight-bolder font-size-sm"><?php echo esc_html( btpjy_Helper::btpjy_count_tasks( $row_id ) ); ?></span>
							</div>
						</div>
						<!--end: Item-->
						<!--begin: Item-->
						<div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
							<span class="mr-4">
								<span class="svg-icon svg-icon-2x">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<rect x="0" y="0" width="24" height="24"></rect>
											<polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"></polygon>
											<path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M9,8 C8.44771525,8 8,8.44771525 8,9 C8,9.55228475 8.44771525,10 9,10 L18,10 C18.5522847,10 19,9.55228475 19,9 C19,8.44771525 18.5522847,8 18,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 C8,13.5522847 8.44771525,14 9,14 L14,14 C14.5522847,14 15,13.5522847 15,13 C15,12.4477153 14.5522847,12 14,12 L9,12 Z" fill="#000000"></path>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<div class="d-flex flex-column">
								<span class="text-dark-75 font-weight-bolder font-size-sm"><?php echo esc_html( btpjy_Helper::btpjy_get_comments_count( $row_id, 'project' ) ); ?></span>
							</div>
						</div>
						<!--end: Item-->
						<!--begin: Item-->
						<div class="d-flex align-items-center flex-lg-fill my-1">
							<span class="mr-4">
								<span class="svg-icon svg-icon-2x">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>
							</span>
							<div class="symbol-group symbol-hover">
								<?php 
									$all_tids  = btpjy_Helper::btpjy_get_team_member( $project->teams );
									$member_no = 1;
									foreach ( $all_tids as $team_key => $member ) {
										global $wpdb;
										$stable      = $wpdb->base_prefix . "btpjy_members";
				                		$membersmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
				                		if ( ! empty( $membersmall ) ) {
				                			if ( $member_no < 5 ) {
				                ?>
								<div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Mark Stone">
									<img alt="Pic" src="<?php echo esc_attr( $membersmall->picture ); ?>">
								</div>
								<?php } $member_no++; } }
								if ( $member_no > 5 ) {
								?>
								<div class="symbol symbol-30 symbol-circle symbol-light-primary" data-toggle="tooltip" title="" data-original-title="More users">
									<span class="symbol-label font-weight-bold"><?php esc_html_e( '5+', 'projectify' ); ?></span>
								</div>
								<?php } ?>
							</div>
						</div>
						<!--end: Item-->
					</div>
					<!--end::Bottom-->
				</div>
			</div>

			<div class="row">
				<div class="col-xxl-4 project-short-desc-col">
					<!--begin::Mixed Widget 7-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header align-items-center border-0 mt-4">
							<h3 class="card-title align-items-start flex-column">
								<span class="font-weight-bolder text-dark"><?php esc_html_e( 'Short description', 'projectify' ); ?></span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm"><?php esc_html_e( 'Summary about project', 'projectify' ); ?></span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body">
							<div id="mixed-widget-slider-1" class="carousel slide" data-ride="carousel" data-interval="8000">
								<!--begin::Carousel-->
								<div class="carousel-inner pt-9">
									<div class="carousel-item active">
										<!--begin::Section-->
										<div class="flex-grow-1">
											<!--begin::Text-->
											<p class="text-dark-75 font-size-lg font-weight-normal"><?php echo esc_html( $project->general_info ); ?></p>
											<!--end::Text-->
										</div>
										<!--begin::Section-->
										<div class="flex-grow-1">
											<!--begin::Subtitle-->
											<span class="font-size-h6 text-muted text-hover-primary font-weight-bold pt-3 pb-5 d-block text-uppercase"><?php esc_html_e( 'Teams' , 'projectify' ); ?></span>
											<!--end::Subtitle-->
											<!--begin::Labels-->
											<div class="d-inline">
												<?php 
													foreach ( $teams as $team_key => $team_value ) {
														global $wpdb;
														$table = $wpdb->base_prefix . "btpjy_teams";
														$teams = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE id = %s", $team_value ) );

														$class_arr = array( 'label-light-success', 'label-light-info', 'label-light-warning', 'label-light-danger', 'label-light-primary' );
                                        				shuffle( $class_arr );
												?>
												<span class="label label-lg <?php echo esc_attr( $class_arr[0] ); ?> label-inline font-size-sm font-weight-bolder py-5 mr-2 mb-2">
													<?php echo esc_html( $teams->name ); ?>
												</span>
												<?php } ?>
											</div>
											<!--end::Labels-->
										</div>
										<!--end::Section-->
										<!--begin::Section-->
										<div class="pt-7">
											<!--begin::Subtitle-->
											<span class="font-size-h6 text-muted text-hover-primary font-weight-bold pb-4 text-uppercase d-block"><?php esc_html_e( 'Memebrers' , 'projectify' ); ?></span>
											<!--end::Subtitle-->
											<!--begin::Symbols-->
											<div class="d-flex align-items-center">
												<?php echo wp_kses_post( btpjy_Helper::btpjy_project_member_html( $project->teams ) ); ?>
											</div>
											<!--end::Symbols-->
										</div>
										<!--end::Section-->
										<!--begin::Section-->
										<div class="d-flex pt-9">
											<!--begin::Info-->
											<div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column mr-3">
												<span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Start Date', 'projectify' ); ?></span>
												<span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $project->start_date ) ); ?></span>
											</div>
											<!--end::Info-->
											<!--begin::Info-->
											<div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column mr-3">
												<span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Due Date', 'projectify' ); ?></span>
												<span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $project->end_date ) ); ?></span>
											</div>
											<!--end::Info-->
											<!--begin::Info-->
											<div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column">
												<span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Deposit', 'projectify' ); ?></span>
												<span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_currency_position_html( $project->deposit_amnt ) ); ?></span>
											</div>
											<!--end::Info-->
										</div>
										<!--end::Section-->
									</div>
								</div>
								<!--end::Carousel-->
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 7-->
				</div>
				<div class="col-xl-8">
					<!--begin::List Widget 5-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder font-size-h4 text-dark-75"><?php esc_html_e( 'Project\'s Recent comments', 'projectify' ); ?></span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-2 recent-comments-div">
							<div class="tab-content mt-5" id="myTabList5">
								<!--begin::Tap pane-->
								<div class="tab-pane fade active show" id="kt_tab_list_5_1" role="tabpanel" aria-labelledby="kt_tab_list_5_1">
									<!--begin::Timeline-->
									<div class="timeline timeline-5">
										<div class="timeline-items">
											<?php global $wpdb;
									        $table    = $wpdb->base_prefix . "btpjy_comments";
									        $comments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $row_id ) );
									        $html     = '';
									        $s_no     = 1;
									        if ( ! empty ( $comments ) ) {
									            foreach ( $comments as $ckey => $cvalue ) {
									            	if ( $s_no < 20 ) {
									            		?>
											<div class="timeline-item">
												<!--begin::Icon-->
												<div class="timeline-media bg-light-primary">
													<span class="svg-icon svg-icon-primary svg-icon-md">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
																<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
															</g>
														</svg>
														<!--end::Svg Icon-->
													</span>
												</div>
												<!--end::Icon-->
												<!--begin::Info-->
												<?php 
													if ( $cvalue->type == 'btpjy_tasks' || $cvalue->type == 'btpjy_subtasks' ) {
														$view = 'view';
														$redirect = 'tasks';
													} elseif ( $cvalue->type == 'btpjy_bugs' ) {
														$view = 'bview';
														$redirect = 'projects';
													}
													$url_link = add_query_arg( 
		                                                array(
		                                                'action'  => $view,
		                                                'row_id'  => $cvalue->type_id,
		                                                ), admin_url( 'admin.php?page=projectify-pro-'.$redirect ) );
												?>
												<div class="timeline-desc timeline-desc-light-primary h-100">
													<a href="<?php echo esc_attr( $url_link ); ?>" class="text-dark">
														<span class="font-weight-bolder text-primary"><?php esc_html_e( 'By ', 'projectify' ); ?><?php echo esc_html( btpjy_Helper::btpjy_member_details( $cvalue->user_id, 'name' ) ).', '; ?></span>
	                                            		<span class="font-weight-bolder"><?php echo esc_html( date( 'F j Y', strtotime( $cvalue->date ) ) ).', '.esc_html( date( 'g:i A', strtotime( $cvalue->time ) ) ); ?></span>
	                                            	</a>
													<p class="font-weight-normal text-dark-50 pb-2 comment-text-2-line"><?php echo wp_kses_post( $cvalue->comment ); ?></p>
												</div>
												<!--end::Info-->
											</div>
											<?php } } } ?>

										</div>
									</div>
									<!--end::Timeline-->
								</div>
								<!--end::Tap pane-->
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::List Widget 4-->
				</div>
			</div>

			<div class="card card-custom gutter-b">
				<div class="card-header align-items-center border-0 mt-4">
					<h3 class="card-title align-items-start flex-column">
						<span class="font-weight-bolder text-dark"><?php esc_html_e( 'Tasks', 'projectify'); ?></span>
						<span class="text-muted mt-3 font-weight-bold font-size-sm"><?php esc_html_e( 'Project task details', 'projectify'); ?></span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Button-->
						<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#AddTaskModal">
							<span class="svg-icon svg-icon-md">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							        <rect x="0" y="0" width="24" height="24"/>
							        <rect fill="#000000" opacity="0.3" x="5" y="8" width="2" height="8" rx="1"/>
							        <path d="M6,21 C7.1045695,21 8,20.1045695 8,19 C8,17.8954305 7.1045695,17 6,17 C4.8954305,17 4,17.8954305 4,19 C4,20.1045695 4.8954305,21 6,21 Z M6,23 C3.790861,23 2,21.209139 2,19 C2,16.790861 3.790861,15 6,15 C8.209139,15 10,16.790861 10,19 C10,21.209139 8.209139,23 6,23 Z" fill="#000000" fill-rule="nonzero"/>
							        <rect fill="#000000" opacity="0.3" x="17" y="8" width="2" height="8" rx="1"/>
							        <path d="M18,21 C19.1045695,21 20,20.1045695 20,19 C20,17.8954305 19.1045695,17 18,17 C16.8954305,17 16,17.8954305 16,19 C16,20.1045695 16.8954305,21 18,21 Z M18,23 C15.790861,23 14,21.209139 14,19 C14,16.790861 15.790861,15 18,15 C20.209139,15 22,16.790861 22,19 C22,21.209139 20.209139,23 18,23 Z" fill="#000000" fill-rule="nonzero"/>
							        <path d="M6,7 C7.1045695,7 8,6.1045695 8,5 C8,3.8954305 7.1045695,3 6,3 C4.8954305,3 4,3.8954305 4,5 C4,6.1045695 4.8954305,7 6,7 Z M6,9 C3.790861,9 2,7.209139 2,5 C2,2.790861 3.790861,1 6,1 C8.209139,1 10,2.790861 10,5 C10,7.209139 8.209139,9 6,9 Z" fill="#000000" fill-rule="nonzero"/>
							        <path d="M18,7 C19.1045695,7 20,6.1045695 20,5 C20,3.8954305 19.1045695,3 18,3 C16.8954305,3 16,3.8954305 16,5 C16,6.1045695 16.8954305,7 18,7 Z M18,9 C15.790861,9 14,7.209139 14,5 C14,2.790861 15.790861,1 18,1 C20.209139,1 22,2.790861 22,5 C22,7.209139 20.209139,9 18,9 Z" fill="#000000" fill-rule="nonzero"/>
							    </g>
							</svg><!--end::Svg Icon--></span>
							<?php esc_html_e( 'Add Tasks', 'projectify' ); ?>
						</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
					<div class="card-header align-items-center border-0 mt-4 single-milestone-wrapper">
						<?php
							global $wpdb;
							$ttable = $wpdb->base_prefix . "btpjy_tasks";
							$tdata  = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $ttable WHERE project_id = %s", $row_id ) );
							foreach ( $tdata as $tkey => $tvalue ) {
								if ( $tvalue->status == 'Pending' ) {
									$tclass = 'label-light-danger';
								} elseif ( $tvalue->status == 'Processing' ) {
									$tclass = 'label-light-warning';
								} else {
									$tclass = 'label-light-success';
								}

								if ( $tvalue->priority == 'High' ) {
									$priority_class = 'label-light-danger';
								} elseif ( $tvalue->priority == 'Medium' ) {
									$priority_class = 'label-light-warning';
								} else {
									$priority_class = 'label-light-success';
								}
						?>
						<!-- Tasks -->
						<div class="card-header align-items-center border-0 mt-4 single-task-wrapper">
							<span class="label label-light-primary label-inline font-weight-bolder label-lg mr-2"><?php esc_html_e( 'Task', 'projectify' ); ?></span>
							<h6 class="card-title align-items-start flex-column">
								<a href="<?php echo esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action'  => 'view',
                                            'row_id'  => $tvalue->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>">
                                            <?php esc_html_e( $tvalue->name, 'projectify'); ?>
                                </a>
                            </h6>
							<div class="mb-7">
								<span class="label <?php echo esc_attr( $tclass ); ?> label-inline font-weight-bolder label-lg mr-2"><?php esc_html_e( $tvalue->status, 'projectify' ); ?></span>
								<a href="<?php echo esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action'  => 'view',
                                            'row_id'  => $tvalue->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-icon btn-light-warning" title="<?php esc_attr_e( 'View Task', 'projectify' ); ?>">
		                            <span class="svg-icon svg-icon-md">
		                            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <rect x="0" y="0" width="24" height="24"/>
										        <path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"/>
										        <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1"/>
										    </g>
										</svg><!--end::Svg Icon-->
									</span>
								</a>
								<a href="#" class="btn btn-icon btn-light-twitter mr-2 fetch-task-entities" data-id="<?php echo esc_attr( $tvalue->id ); ?>" title="<?php esc_attr_e( 'Edit Task', 'projectify' ); ?>">
									<span class="svg-icon svg-icon-md">
	                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
	                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	                                            <rect x="0" y="0" width="24" height="24"></rect>
	                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
	                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
	                                        </g>
	                                    </svg><!--end::Svg Icon-->
	                                </span>
								</a>
								<a href="#" class="btn btn-icon btn-light-google delete-entities" data-table="btpjy_tasks" data-pid="<?php echo esc_attr( $project->id ); ?>" data-id="<?php echo esc_attr( $tvalue->id ); ?>" title="<?php esc_attr_e( 'Delete Task', 'projectify' ); ?>">
									<span class="svg-icon svg-icon-md">
		                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		                                        <rect x="0" y="0" width="24" height="24"></rect>
		                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
		                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
		                                    </g>
		                                </svg>
		                            </span>
								</a>
							</div>
							<div class="task-inner-details">
								<strong><?php esc_html_e( 'Estimate Time:', 'projectify' ); ?></strong>
								<span id="ms_cost_72-1"><?php echo esc_html( $tvalue->estimated_time ); ?></span> | 
								<strong><?php esc_html_e( 'Start Date:', 'projectify' ); ?></strong>
								<span id="ms_start_72-1"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->start ) ); ?></span> | 
								<strong><?php esc_html_e( 'Deadline:', 'projectify' ); ?></strong>
								<span id="ms_deadline_72-1"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->end ) ); ?></span> | 
								<strong><?php esc_html_e( 'Assignee:', 'projectify' ); ?></strong>
								<span id="ms_deadline_72-1"><?php echo esc_html( btpjy_Helper::btpjy_get_assignee_names( $tvalue->assignee ) ); ?></span> | 
								<strong><?php esc_html_e( 'Priority:', 'projectify' ); ?></strong>
								<span id="ms_deadline_72-1">
									<span class="label <?php echo esc_attr( $priority_class ); ?> label-inline font-weight-bolder label-lg mr-2"><?php echo esc_html( $tvalue->priority ); ?></span>
								</span>
							</div>
						</div>
						<!-- End of tasks -->
						<?php } ?>

					</div>
				</div>
			</div>

			<div class="card card-custom gutter-b">
				<div class="card-header align-items-center border-0 mt-4">
					<h3 class="card-title align-items-start flex-column">
						<span class="font-weight-bolder text-dark"><?php esc_html_e( 'Project Files', 'projectify'); ?></span>
						<span class="text-muted mt-3 font-weight-bold font-size-sm"><?php esc_html_e( 'All uploaded files for this project', 'projectify'); ?></span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Button-->
						<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#AddFilesModal">
							<span class="svg-icon svg-icon-md">
                            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <rect x="0" y="0" width="24" height="24"/>
								        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1"/>
								        <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>
								    </g>
								</svg><!--end::Svg Icon-->
							</span>
							<?php esc_html_e( 'Add Files', 'projectify' ); ?>
						</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
					<div id="btpjy_datatable_wrapper" class="table-responsive dt-bootstrap4 no-footer">
	                    <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline" id="members-listing">
	                        <thead>
	                            <tr>
	                                <th><?php esc_html_e( 'S No. #', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'File name', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'Related to', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'File type', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'Uploaded', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'Actions', 'projectify' ); ?></th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php 
	                        		$file_arr = btpjy_Helper::btpjy_all_files( $row_id );
	                        		if ( ! empty ( $file_arr ) ) {
	                        			$s_no = 1;
	                        			foreach ( $file_arr as $file_key => $file_value ) {
	                        	?>
	                        	<tr>
	                        		<td><?php echo esc_html( $s_no ); ?></td>
	                        		<td>
	                        			<a href="<?php echo esc_attr( esc_url( $file_value['file_path'] ) ); ?>" target="_blank" class="text-dark">
	                        				<?php echo esc_html( $file_value['file_name'] ); ?>
	                        			</a>
	                        		</td>
	                        		<td><?php echo esc_html( $file_value['ralated_to'] ); ?></td>
	                        		<td><?php echo esc_html( $file_value['file_type'] ); ?></td>
	                        		<td><?php echo esc_html( $file_value['date_time'] ); ?></td>
	                        		<td>
	                        			<a href="<?php echo esc_attr( esc_url( $file_value['file_path'] ) ); ?>" class="btn btn-icon btn-light-success mr-2" download>
                                            <span class="svg-icon svg-icon-md">
                                            	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
												        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1"/>
												        <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) "/>
												    </g>
												</svg><!--end::Svg Icon-->
											</span>
                                        </a>
	                        		</td>
	                        	</tr>
	                        	<?php $s_no++; } } ?>
	                        </tbody>
	                    </table>
	                </div>
	            </div>
            </div>

			<div class="card card-custom gutter-b">
				<div class="card-header align-items-center border-0 mt-4">
					<h3 class="card-title align-items-start flex-column">
						<span class="font-weight-bolder text-dark"><?php esc_html_e( 'Project Messages', 'projectify'); ?></span>
						<span class="text-muted mt-3 font-weight-bold font-size-sm"><?php esc_html_e( 'Send email alerts to team members & client', 'projectify'); ?></span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Button-->
						<a href="#" class="btn btn-primary font-weight-bolder" data-toggle="modal" data-target="#AddMessageModal">
							<span class="svg-icon svg-icon-md">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								        <rect x="0" y="0" width="24" height="24"/>
								        <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3"/>
								        <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000"/>
								    </g>
								</svg><!--end::Svg Icon-->
							</span>	
							<?php esc_html_e( 'Send Meaasge', 'projectify' ); ?>
						</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
                    <div class="previous-comments">
                        <span class="font-weight-bolder text-dark"><?php esc_html_e( 'Previous Messages', 'projectify'); ?></span>
                        <div class="comment-wrapper-message">
                            <div class="timeline timeline-5">
                                <div class="timeline-items">
                                	<?php 
                                        global $wpdb;
                                        $table    = $wpdb->base_prefix . "btpjy_messages";
                                        $messages = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s", $row_id ) );
                                        if ( ! empty ( $messages ) ) {
                                            foreach ( $messages as $message_key => $message_value ) {
                                    ?>
                                	<!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Icon-->
                                        <div class="timeline-media bg-light-warning">
                                        	<span class="svg-icon svg-icon-warning svg-icon-md">
                                        		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												        <rect x="0" y="0" width="24" height="24"/>
												        <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"/>
												        <path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z" fill="#000000"/>
												    </g>
												</svg><!--end::Svg Icon-->
											</span>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="timeline-desc timeline-desc-light-warning h-100">
                                            <span class="font-weight-bolder">
                                            	<?php echo esc_html( date( 'F j Y', strtotime( $message_value->date ) ) ).', '.esc_html( date( 'g:i A', strtotime( $message_value->time ) ) ); ?>
                                            </span>
                                            <span class="font-weight-bolder comment-date-right">
                                                <a href="#" class="btn btn-icon btn-light-google delete-entities" data-table="btpjy_messages" data-id="<?php echo esc_attr( $message_value->id ); ?>" title="<?php esc_attr_e( 'Delete message', 'projectify' ); ?>">
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </span>
                                            <div class="font-weight-normal text-dark-50 comment-desc-text"><?php echo wp_kses_post( $message_value->message ); ?></div>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                	<?php } } else {
                                		echo esc_html__( 'No messages yet!', 'projectify' );
                                	} ?>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- Add Task Modal -->
<div class="modal fade" id="AddTaskModal" tabindex="-1" role="dialog" aria-labelledby="AddTaskModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e( 'Enter task details', 'projectify' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="AddTaskForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <?php $nonce = wp_create_nonce( 'btpjy_save_tasks' ); ?>
                    <input type="hidden" name="btpjy_save_tasks_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                    <input type="hidden" name="action" value="btpjy_save_tasks">
                	<!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Title', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <input class="form-control form-control-solid form-control-lg" name="t_title" id="t_title" type="text" placeholder="<?php esc_attr_e( 'Enter Task title', 'projectify' ); ?>">
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Description', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <textarea class="form-control form-control-solid form-control-lg" name="t_desc" id="t_desc"></textarea>
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Starting Date', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <input class="form-control form-control-solid form-control-lg" name="t_start" id="t_start" type="text" placeholder="<?php esc_attr_e( 'Enter Task title', 'projectify' ); ?>">
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Deadline', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <input class="form-control form-control-solid form-control-lg" name="t_end" id="t_end" type="text" placeholder="<?php esc_attr_e( 'Enter Task title', 'projectify' ); ?>">
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Estimated Time', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <input class="form-control form-control-solid form-control-lg" name="t_time" id="t_time" type="text" placeholder="<?php esc_attr_e( 'Enter Task title', 'projectify' ); ?>">
                        </div>
                    </div>
                    <!--end::Group-->

					<div class="form-group row fv-plugins-icon-container">
						<label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Assignee', 'projectify' ); ?></label>
						<div class="col-lg-10 col-xl-10">
							<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" multiple="multiple" name="t_assingee[]" id="t_assingee">
								<option value=""><?php esc_html_e( 'Select Task Assignee...', 'projectify' ); ?></option>
								<?php $all_tids = btpjy_Helper::btpjy_get_team_member( $project->teams ); 
								foreach ( $all_tids as $member_key => $member_ids ) {
									$stable = $wpdb->base_prefix . "btpjy_members";
									$msmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member_ids ) );
									if ( ! empty ( $msmall->id ) && ! empty ( $msmall->name ) ) {
								?>
								<option value="<?php echo esc_attr( $msmall->user_id ); ?>"><?php echo esc_html( $msmall->name ); ?></option>
								<?php } } ?>
							</select>
						</div>
					</div>
					<!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Status', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="t_status">
                                <option value="Pending"><?php esc_html_e( 'Pending', 'projectify' ); ?></option>
                                <option value="Processing"><?php esc_html_e( 'Processing', 'projectify' ); ?></option>
                                <option value="Completed"><?php esc_html_e( 'Completed', 'projectify' ); ?></option>
                            </select>
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Priority', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="priority">
                                <option value="Low"><?php esc_html_e( 'Low', 'projectify' ); ?></option>
                                <option value="High"><?php esc_html_e( 'High', 'projectify' ); ?></option>
                                <option value="Medium"><?php esc_html_e( 'Medium', 'projectify' ); ?></option>
                            </select>
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--end::Group-->
					<input type="hidden" name="project_id" value="<?php echo esc_attr( $row_id ); ?>">
					<div class="form-group">
						<button type="submit" class="btn btn-success mr-2" id="AddTaskBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?></button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Task Modal -->
<div class="modal fade" id="EditdTaskModal" tabindex="-1" role="dialog" aria-labelledby="EditdTaskModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e( 'Edit task details', 'projectify' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <!--begin::Wizard Form-->
                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="EditTaskForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <?php $nonce = wp_create_nonce( 'btpjy_edit_tasks' ); ?>
                    <input type="hidden" name="btpjy_edit_tasks_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                    <input type="hidden" name="action" value="btpjy_edit_tasks">
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Title', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-solid form-control-lg" name="t_title" id="t_title" type="text" placeholder="<?php esc_attr_e( 'Enter task title', 'projectify' ); ?>" value="">
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Description', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <textarea class="form-control form-control-solid form-control-lg" rows="5" name="t_desc" id="t_desc">
                            </textarea>
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Assginee', 'projectify' ); ?></label>
                        <div class="col-xl-9 col-lg-9">
                            <?php $users_list = btpjy_Helper::btpjy_get_users_list(); ?>
                            <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" multiple="multiple" name="t_assingee[]" id="select_t_assingee">
                                <option value=""><?php esc_html_e( 'Select Task Assignee...', 'projectify' ); ?></option>
								<?php $all_tids = btpjy_Helper::btpjy_get_team_member( $project->teams ); 
								foreach ( $all_tids as $member_key => $member_ids ) {
									$stable = $wpdb->base_prefix . "btpjy_members";
									$msmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member_ids ) );
									if ( ! empty ( $msmall->id ) && ! empty ( $msmall->name ) ) {
								?>
								<option value="<?php echo esc_attr( $msmall->user_id ); ?>"><?php echo esc_html( $msmall->name ); ?></option>
								<?php } } ?>
                            </select>
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Start Date', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-solid form-control-lg" name="t_start" id="t_start" type="text" placeholder="<?php esc_attr_e( 'Start Date', 'projectify' ); ?>" value="">
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Due Date', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-solid form-control-lg" name="t_end" id="t_end" type="text" placeholder="<?php esc_attr_e( 'Due Date', 'projectify' ); ?>" value="">
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Estimated Time', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control form-control-solid form-control-lg" name="t_time" id="t_time" type="text" placeholder="<?php esc_attr_e( 'Enter estimated tile like( 5 Hours )', 'projectify' ); ?>" value="">
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Status', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="t_status" id="t_status">
                                <option value="Pending"><?php esc_html_e( 'Pending', 'projectify' ); ?></option>
                                <option value="Processing"><?php esc_html_e( 'Processing', 'projectify' ); ?></option>
                                <option value="Completed"><?php esc_html_e( 'Completed', 'projectify' ); ?></option>
                            </select>
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Priority', 'projectify' ); ?></label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="priority" id="t_priority">
                                <option value="Low"><?php esc_html_e( 'Low', 'projectify' ); ?></option>
                                <option value="High"><?php esc_html_e( 'High', 'projectify' ); ?></option>
                                <option value="Medium"><?php esc_html_e( 'Medium', 'projectify' ); ?></option>
                            </select>
                        <div class="fv-plugins-message-container"></div></div>
                    </div>
                    <!--end::Group-->
                    <input type="hidden" name="project_id" id="project_id" value="<?php echo esc_attr( $row_id ); ?>">
                    <input type="hidden" name="id" id="id" value="">
                    <!--end::Group-->
                    <!--begin::Wizard Actions-->
                    <div class="d-flex justify-content-between border-top pt-10 mt-15">
                        <div>
                            <button type="submit" class="btn btn-success font-weight-bolder px-10 py-3" id="EditTaskBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?>
                            <span class="svg-icon svg-icon-md ml-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002)"></path>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span></button>
                        </div>
                    </div>
                </form>
                <!--end::Wizard Form-->
            </div>
        </div>
    </div>
</div>

<!-- Send Message Modal -->
<div class="modal fade" id="AddMessageModal" tabindex="-1" role="dialog" aria-labelledby="AddMessageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php esc_html_e( 'Enter message details', 'projectify' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="AddMessageForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                	<?php $nonce = wp_create_nonce( 'btpjy_add_messages' ); ?>
                    <input type="hidden" name="btpjy_add_messages_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                    <input type="hidden" name="action" value="btpjy_add_messages">
                	<div class="form-group row fv-plugins-icon-container">
						<label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Message Visibility', 'projectify' ); ?></label>
						<div class="col-lg-10 col-xl-10">
							<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="visibility">
								<option value="all"><?php esc_html_e( 'Visible to All', 'projectify' ); ?></option>
								<option value="internal"><?php esc_html_e( 'Internal Message (Client cannot see this)', 'projectify' ); ?></option>
							</select>
						</div>
					</div>
                	<!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Message Notifications', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <div class="checkbox-inline">
                                <label class="checkbox checkbox-success">
                                <input name="team" type="checkbox" checked>
                                <span></span><?php esc_html_e( 'Send a notification to the Project Team', 'projectify' ); ?></label>
                            </div>
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Message', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <?php   
                                wp_editor( '', 'send_message', $settings = array( 'editor_height' => 200, 'media_buttons' => false, 'textarea_rows' => 20, 'drag_drop_upload' => true ) ); 
                            ?>
                        </div>
                    </div>
                    <!--end::Group-->

					<input type="hidden" name="project_id" value="<?php echo esc_attr( $row_id ); ?>">
					<div class="form-group">
						<button type="submit" class="btn btn-success mr-2" id="AddMessageBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?></button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Add Files Modal -->
<div class="modal fade" id="AddFilesModal" tabindex="-1" role="dialog" aria-labelledby="AddFilesModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddFilesModalLabel"><?php esc_html_e( 'Upload files for project', 'projectify' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="AddFilesForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                	<?php $nonce = wp_create_nonce( 'btpjy_add_files' ); ?>
                    <input type="hidden" name="btpjy_add_files_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                    <input type="hidden" name="action" value="btpjy_add_files">

                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
						<label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Related to ( Task/Subtask )', 'projectify' ); ?></label>
						<div class="col-lg-10 col-xl-10">
							<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="related_to" id="related_to">
								<option value="general"><?php esc_html_e( 'General files', 'projectify' ); ?></option>
								<option value="task"><?php esc_html_e( 'Task', 'projectify' ); ?></option>
							</select>
						</div>
					</div>
					<!--end::Group-->

					<!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container" id="task_form_group">
						<label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Task', 'projectify' ); ?></label>
						<div class="col-lg-10 col-xl-10">
							<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="task">
								<option value=""><?php esc_html_e( 'Select related task...', 'projectify' ); ?></option>
								<?php $task_list = btpjy_Helper::btpjy_get_task_list( $row_id ); 
									foreach ( $task_list as $tl_key => $tl_value ) {
								?>
								<option value="<?php echo esc_attr( $tl_value['id'] ); ?>"><?php echo esc_html( $tl_value['name'] ); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<!--end::Group-->

                    <!--end::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                    	<label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Files', 'projectify' ); ?></label>
                    	<div class="col-lg-10 col-xl-10">
                    		<div id="files-placeholder_btpjy">
	                            <p><?php esc_html_e( 'Upload files to add attachments!', 'projectify' ); ?></p>
	                        </div>
	                        <input type="button" name="upload-btn" id="upload-btn-files" class="button-secondary button" value="<?php esc_attr_e( 'Upload Files', 'projectify' ); ?>">
                    	</div>
                    </div>

					<input type="hidden" name="project_id" value="<?php echo esc_attr( $row_id ); ?>">
					<div class="form-group">
						<button type="submit" class="btn btn-success mr-2" id="AddFilesBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?></button>
					</div>
                </form>
            </div>
        </div>
    </div>
</div>