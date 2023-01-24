<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$row_id     = sanitize_text_field( $_GET['row_id'] );
$project    = btpjy_Helper::btpjy_project_info( $row_id );
$teams      = unserialize( $project->teams );

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
												<span class="label label-lg <?php echo esc_attr( $class_arr[0] ); ?> label-inline font-size-sm font-weight-bolder py-5 mr-4">
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
		                                                ), admin_url( 'admin.php?page=projectify-pro-member-'.$redirect ) );
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
                                            ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ); ?>">
                                            <?php esc_html_e( $tvalue->name, 'projectify'); ?>
                                </a>
                            </h6>
							<div class="mb-7">
								<span class="label <?php echo esc_attr( $tclass ); ?> label-inline font-weight-bolder label-lg mr-2"><?php esc_html_e( $tvalue->status, 'projectify' ); ?></span>
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
				</div>
				<div class="card-body">
					<div id="btpjy_datatable_wrapper" class="table-responsive dt-bootstrap4 no-footer">
	                    <table class="table table-separate table-head-custom table-checkable dataTable no-footer dtr-inline" id="members-listing">
	                        <thead>
	                            <tr>
	                                <th><?php esc_html_e( 'S No. #', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'File name', 'projectify' ); ?></th>
	                                <th><?php esc_html_e( 'Related task/subtask', 'projectify' ); ?></th>
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
                                            <div class="font-weight-normal text-dark-50 comment-desc-text"><?php echo wp_kses_post( $message_value->message ); ?></div>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                	<?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>

		</div>
	</div>
</div>