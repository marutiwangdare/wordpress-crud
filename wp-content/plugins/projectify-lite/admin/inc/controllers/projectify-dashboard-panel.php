<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="btpjy_wrapper">
			<?php require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/nav/nav.php'; ?>
            <div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
                <div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<div class="row statics-top-bar">
									<div class="col-xxl-3">
										<div class="card card-custom bg-gradient-primary text-white mb-8 mb-lg-0">
											<div class="card-body align-items-center">
												<h6 class="font-weight-normal text-center"><?php esc_html_e( 'Teams', 'projectify' ); ?></h6>
												<h2 class="text-white text-center mb-0"><?php echo count( btpjy_Helper::btpjy_get_teams() ); ?></h2>
											</div>
										</div>
									</div>
									<div class="col-xxl-3">
										<div class="card card-custom bg-gradient-danger text-white mb-8 mb-lg-0">
											<div class="card-body">
												<h6 class="font-weight-normal text-center"><?php esc_html_e( 'Members', 'projectify' ); ?></h6>
												<h2 class="text-white text-center mb-0"><?php echo count( btpjy_Helper::btpjy_get_members() ); ?></h2>
											</div>
										</div>
									</div>
									<div class="col-xxl-3">
										<div class="card card-custom bg-gradient-warning text-white mb-8 mb-lg-0">
											<div class="card-body">
												<h6 class="font-weight-normal text-center"><?php esc_html_e( 'Projects', 'projectify' ); ?></h6>
												<h2 class="text-white text-center mb-0"><?php echo count( btpjy_Helper::btpjy_get_projects() ); ?></h2>
											</div>
										</div>
									</div>
									<div class="col-xxl-3">
										<div class="card card-custom bg-gradient-info text-white mb-8 mb-lg-0">
											<div class="card-body">
												<h6 class="font-weight-normal text-center"><?php esc_html_e( 'Tasks', 'projectify' ); ?></h6>
												<h2 class="text-white text-center mb-0"><?php echo count( btpjy_Helper::btpjy_get_tasks() ); ?></h2>
											</div>
										</div>
									</div>
								</div>
								
								<!--begin::Row-->
								<div class="row">
									<div class="col-xxl-4">
										<!--begin::Mixed Widget 7-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<div id="mixed-widget-slider-1" class="carousel slide pointer-event" data-ride="carousel" data-interval="8000">
													<!--begin::Top-->
													<div class="d-flex align-items-center justify-content-between">
														<!--begin::Label-->
														<span class="font-size-h6 font-weight-bolder text-uppercase pr-2"><?php esc_html_e( 'Projects', 'projectify' ); ?></span>
														<!--end::Label-->
														<!--begin::Action-->
														<div class="">
															<a href="#mixed-widget-slider-1" class="btn btn-icon btn-light btn-sm mr-1" role="button" data-slide="prev">
																<span class="svg-icon svg-icon-md">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</a>
															<a href="#mixed-widget-slider-1" class="btn btn-icon btn-light btn-sm" role="button" data-slide="next">
																<span class="svg-icon svg-icon-md">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</a>
														</div>
														<!--end::Action-->
													</div>
													<!--end::Top-->
													<!--begin::Carousel-->
		                                            <div class="carousel-inner pt-9">
		                                                <?php $all_projects = btpjy_Helper::btpjy_get_projects();
		                                                $all_projects = array_reverse( $all_projects );
		                                                $p_no = 1;   
		                                                if ( ! empty( $all_projects ) ) {
		                                                    foreach ( $all_projects as $key => $value ) {
		                                                        $teams = unserialize( $value->teams );
		                                                ?>
		                                                <div class="carousel-item <?php if ( $p_no == 1 ) { echo esc_attr( 'active'); } ?>">
		                                                    <!--begin::Section-->
		                                                    <div class="flex-grow-1">
		                                                        <!--begin::Title-->
		                                                        <h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold">
		                                                        	<a href="<?php echo esc_url( 
						                                            add_query_arg( 
						                                            array(
						                                            'action'  => 'view',
						                                            'row_id'  => $value->id,
						                                            ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-2"><?php echo esc_html( $value->name ); ?></a>
						                                        </h3>
		                                                        <!--end::Title-->
		                                                        <!--begin::Text-->
		                                                        <p class="text-dark-75 font-size-lg font-weight-normal pt-2"><?php echo esc_html( $value->general_info ); ?></p>
		                                                        <!--end::Text-->
		                                                    </div>
		                                                    <!--end::Section-->
		                                                    <!--begin::Section-->
		                                                    <div class="flex-grow-1">
		                                                        <!--begin::Subtitle-->
		                                                        <span class="font-size-h6 text-muted text-hover-primary font-weight-bold pt-3 pb-5 d-block text-uppercase"><?php esc_html_e( 'Teams', 'projectify' ); ?></span>
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
		                                                        <span class="font-size-h6 text-muted text-hover-primary font-weight-bold pb-4 text-uppercase d-block"><?php esc_html_e( 'Memebrers', 'projectify' ); ?></span>
		                                                        <!--end::Subtitle-->
		                                                        <!--begin::Symbols-->
		                                                        <div class="d-flex align-items-center">
		                                                            <?php echo wp_kses_post( btpjy_Helper::btpjy_project_member_html( $value->teams ) ); ?>
		                                                        </div>
		                                                        <!--end::Symbols-->
		                                                    </div>
		                                                    <!--end::Section-->
		                                                    <!--begin::Section-->
		                                                    <div class="d-flex pt-9">
		                                                        <!--begin::Info-->
		                                                        <div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column mr-3">
		                                                            <span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Start Date', 'projectify' ); ?></span>
		                                                            <span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $value->start_date ) ); ?></span>
		                                                        </div>
		                                                        <!--end::Info-->
		                                                        <!--begin::Info-->
		                                                        <div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column mr-3">
		                                                            <span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Due Date', 'projectify' ); ?></span>
		                                                            <span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $value->end_date ) ); ?></span>
		                                                        </div>
		                                                        <!--end::Info-->
		                                                        <!--begin::Info-->
		                                                        <div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column mr-3">
		                                                            <span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Deposit Amount', 'projectify' ); ?></span>
		                                                            <span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_currency_position_html( $value->deposit_amnt ) ); ?></span>
		                                                        </div>
		                                                        <!--end::Info-->
		                                                    </div>
		                                                    <?php if ( empty ( $value->progress ) ) {
					                                            $project_progress = '0%';
					                                        } else {
					                                            $project_progress = $value->progress;
					                                        } ?>
					                                        <div class="pt-9">
						                                        <div class="progress">
						                                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: <?php echo esc_attr( $project_progress ); ?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo esc_html( $project_progress ); ?></div>
						                                        </div>
						                                    </div>
		                                                </div>
		                                                <?php $p_no++; } } ?>
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
													<span class="card-label font-weight-bolder font-size-h4 text-dark-75"><?php esc_html_e( 'Recent comments', 'projectify' ); ?></span>
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
														        $comments = $wpdb->get_results( "SELECT * FROM $table" );
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
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row second-level-statics">
									<div class="col-xl-6">
										<!--begin::Stats Widget 10-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<div id="stats-widget-slider-1" class="carousel slide pointer-event" data-ride="carousel" data-interval="8000">
													<!--begin::Top-->
													<div class="d-flex align-items-center justify-content-between flex-wrap">
														<!--begin::Label-->
														<span class="font-size-h6 font-weight-bolder text-uppercase pr-2"><?php esc_html_e( 'Announcements', 'projectify' ); ?></span>
														<!--end::Label-->
														<!--begin::Action-->
														<div class="p-0">
															<a href="#stats-widget-slider-1" class="btn btn-icon btn-light btn-sm mr-1" role="button" data-slide="prev">
																<span class="svg-icon svg-icon-md">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</a>
															<a href="#stats-widget-slider-1" class="btn btn-icon btn-light btn-sm" role="button" data-slide="next">
																<span class="svg-icon svg-icon-md">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</a>
														</div>
														<!--end::Action-->
													</div>
													<!--end::Top-->
													<!--begin::Carousel-->
													<div class="carousel-inner pt-9">
	                                                <?php 
	                                                    $announce_list = btpjy_Helper::btpjy_get_announcements();
	                                                    $announce_list = array_reverse( $announce_list );
	                                                    $sno           = 1;
	                                                    foreach ( $announce_list as $ckey => $announcement ) {
	                                                ?>
	                                                <!--begin::Item-->
	                                                <div class="carousel-item <?php if ( $sno == 1 ) { echo esc_attr( 'active'); } ?>">
	                                                    <!--begin::Section-->
	                                                    <div class="d-flex flex-column justify-content-between h-100">
	                                                        <!--begin::Title-->
	                                                        <h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold cursor-pointer"><?php echo esc_html( $announcement->title ); ?></h3>
	                                                        <!--end::Title-->
	                                                        <!--begin::Text-->
	                                                        <p class="text-dark-75 font-size-lg font-weight-normal pt-2 mb-0"><?php echo esc_html( $announcement->description ); ?></p>
	                                                        <!--end::Text-->
	                                                    </div>
	                                                    <!--end::Section-->
	                                                </div>
	                                                <!--end::Item-->
	                                                <?php $sno++; } ?>
	                                            </div>
													<!--end::Carousel-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 10-->
									</div>
									<div class="col-xxl-6">
										<!--begin::Mixed Widget 7-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<div id="team-widget-slider-1" class="carousel slide" data-ride="carousel" data-interval="8000">
													<!--begin::Top-->
													<div class="d-flex align-items-center justify-content-between">
														<!--begin::Label-->
														<span class="font-size-h6 font-weight-bolder text-uppercase pr-2"><?php esc_html_e( 'Teams', 'projectify' ); ?></span>
														<!--end::Label-->
														<!--begin::Action-->
														<div class="">
															<a href="#team-widget-slider-1" class="btn btn-icon btn-light btn-sm mr-1" role="button" data-slide="prev">
																<span class="svg-icon svg-icon-md">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</a>
															<a href="#team-widget-slider-1" class="btn btn-icon btn-light btn-sm" role="button" data-slide="next">
																<span class="svg-icon svg-icon-md">
																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)"></path>
																		</g>
																	</svg>
																	<!--end::Svg Icon-->
																</span>
															</a>
														</div>
														<!--end::Action-->
													</div>
													<!--end::Top-->
													<!--begin::Carousel-->
													<div class="carousel-inner pt-9">
														<?php 
										                    $btpjy_get_teams = btpjy_Helper::btpjy_get_teams();
										                    $btpjy_get_teams = array_reverse( $btpjy_get_teams );
										                    $s_no = 1;
										                    foreach ( $btpjy_get_teams as $tkey => $team ) {
										                ?>
														<div class="carousel-item <?php if ( $s_no == 1 ) { echo esc_attr( 'active' ); } ?>">
															<!--begin::Section-->
															<div class="flex-grow-1">
																<!--begin::Title-->
																<h3 class="font-size-h4 text-dark-75 text-hover-primary font-weight-bold">
																	<a href="<?php echo esc_url( 
					                                                add_query_arg( 
					                                                array(
					                                                'action'  => 'view',
					                                                'row_id'  => $team->id,
					                                                ), admin_url( 'admin.php?page=projectify-pro-teams' ) ) ); ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0"><?php echo esc_html( $team->name ); ?></a>
																</h3>
																<!--end::Title-->
															</div>
															<!--end::Section-->
															<!--begin::Section-->
															<div class="pt-7">
								                                <!--begin::Subtitle-->
								                                <span class="font-size-h6 text-muted text-hover-primary font-weight-bold pb-4 text-uppercase d-block"><?php esc_html_e( 'Team Leader', 'projectify' ); ?></span>
								                                <!--end::Subtitle-->
								                                <!--begin::Symbols-->
								                                <div class="d-flex align-items-center">
								                                    <?php 
								                                        $class_arr = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
								                                        shuffle( $class_arr );
								                                        $all_members = btpjy_Helper::btpjy_get_members();
								                                        foreach ( $all_members as $mkey => $memberr ) {
								                                            if ( $team->team_leader ==$memberr->user_id ) {
								                                                $first = $memberr->first_name;
								                                                $last  = $memberr->last_name;
								                                                $pic   = $memberr->picture;
								                                            }
								                                        }

								                                        if ( ! empty ( $pic ) ) { ?>
								                                            <div class="symbol symbol-35 flex-shrink-0 mr-3">
								                                                <img alt="Pic" src="<?php echo esc_attr( $pic ); ?>">
								                                            </div>
								                                        <?php } else { ?>
								                                            <!--begin::Symbol-->
								                                                <div class="symbol symbol-35 <?php echo esc_attr( $class_arr[0] ); ?> text-uppercase flex-shrink-0 mr-3">
								                                                    <span class="symbol-label font-weight-bolder font-size-lg"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $first, $last ) ); ?></span>
								                                                </div>
								                                            <!--end::Symbol-->
								                                        <?php }
								                                    ?>
								                                </div>
								                            </div>
								                            <div class="pt-7">
								                                <!--begin::Subtitle-->
								                                <span class="font-size-h6 text-muted text-hover-primary font-weight-bold pb-4 text-uppercase d-block"><?php esc_html_e( 'Memebrers', 'projectify' ); ?></span>
								                                <!--end::Subtitle-->
								                                <!--begin::Symbols-->
								                                <div class="d-flex align-items-center">
								                                    <?php
								                                        $members = unserialize( $team->members );
								                                        echo btpjy_Helper::btpjy_get_members_html( $members ); 
								                                    ?>
								                                </div>
								                                <!--end::Symbols-->
								                            </div>
															<!--end::Section-->
														</div>
														<?php $s_no++; } ?>
													</div>
													<!--end::Carousel-->
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Mixed Widget 7-->
									</div>
								</div>
								<!--end::Row-->
								<!--begin::Tables Widget 5-->
		                        <div class="card card-custom">
		                            <!--begin::Header-->
		                            <div class="card-header border-0 pt-7">
		                                <h3 class="card-title align-items-start flex-column">
		                                    <span class="card-label font-weight-bold font-size-h4 text-dark-75"><?php esc_html_e( 'Recently Assigneed Task', 'projectify' ); ?></span>
		                                </h3>
		                                <div class="card-toolbar">
		                                    <ul class="nav nav-pills nav-pills-sm nav-dark">
		                                        <li class="nav-item ml-0">
		                                            <a class="nav-link py-2 px-4 active font-weight-bolder font-size-sm" data-toggle="tab" href="#btpjy_tab_table_5_1"><?php esc_html_e( 'Tasks', 'projectify' ); ?></a>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </div>
		                            <!--end::Header-->
		                            <!--begin::Body-->
		                            <div class="card-body pt-0 pb-4">
		                                <div class="tab-content mt-2" id="myTabTable5">
		                                    <!--begin::Tap pane-->
		                                    <div class="tab-pane fade show active" id="btpjy_tab_table_5_1" role="tabpanel" aria-labelledby="btpjy_tab_table_5_1">
		                                        <!--begin::Table-->
		                                        <div class="table-responsive">
		                                            <table class="table table-borderless table-vertical-center">
		                                                <thead>
		                                                    <tr>
		                                                        <th class="p-0 w-50px"><?php esc_html_e( 'S.no', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-200px"><?php esc_html_e( 'Title', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-200px"><?php esc_html_e( 'Project', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-100px"><?php esc_html_e( 'Starting Date', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-125px"><?php esc_html_e( 'Deadline', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-110px"><?php esc_html_e( 'Estimate Time', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-125px"><?php esc_html_e( 'Assignee', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-125px"><?php esc_html_e( 'Status', 'projectify' ); ?></th>
		                                                        <th class="p-0 min-w-150px"><?php esc_html_e( 'Action', 'projectify' ); ?></th>
		                                                    </tr>
		                                                </thead>
		                                                <tbody>
		                                                    <?php 
		                                                        $all_tasks = btpjy_Helper::btpjy_get_tasks();
		                                                        $all_tasks = array_reverse( $all_tasks );
		                                                        $sno = 1;
		                                                        foreach ( $all_tasks as $tkey => $tvalue ) {
		                                                            if ( $sno < 11 ) {

		                                                            if ( $tvalue->status == 'Pending' ) {
		                                                                $progress = 'Pending';
		                                                                $p_class  = 'label-light-primary';
		                                                            } elseif ( $tvalue->status == 'Processing' ) {
		                                                                $progress = 'Processing';
		                                                                $p_class  = 'label-light-warning';
		                                                            } else {
		                                                                $progress = 'Completed';
		                                                                $p_class  = 'label-light-success';
		                                                            }

		                                                            $project_data = btpjy_Helper::btpjy_project_info( $tvalue->project_id );
		                                                    ?>
		                                                    <tr>
		                                                        <td class="pl-0 py-5">
		                                                            <?php echo esc_html( $sno ); ?>
		                                                        </td>
		                                                        <td class="pl-0 ml-n3">
		                                                            <a href="<?php echo esc_url( 
		                                                            add_query_arg( 
		                                                            array(
		                                                            'action'  => 'view',
		                                                            'row_id'  => $tvalue->id,
		                                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
		                                                            <?php echo esc_html( $tvalue->name ); ?></a>
		                                                        </td>
		                                                        <td class="text-left">
		                                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
		                                                                <?php echo esc_html( $project_data->name ); ?>
		                                                            </span>
		                                                        </td>
		                                                        <td class="text-left">
		                                                            <span class="text-muted font-weight-500"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->start ) ); ?></span>
		                                                        </td>
		                                                        <td class="text-left">
		                                                            <span class="text-muted font-weight-500"><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->end ) ); ?></span>
		                                                        </td>
		                                                        <td class="text-left">
		                                                            <span class="text-muted font-weight-500"><?php echo esc_html( $tvalue->estimated_time ); ?></span>
		                                                        </td>
		                                                        <td class="text-left">
		                                                            <span class="text-muted font-weight-500"><?php echo esc_html( btpjy_Helper::btpjy_get_assignee_names( $tvalue->assignee ) ); ?></span>
		                                                        </td>
		                                                        <td class="text-left">
		                                                            <span class="label label-lg <?php echo esc_attr( $p_class ); ?> label-inline"><?php echo esc_html( $tvalue->status ); ?></span>
		                                                        </td>
		                                                        <td class="text-left pr-0">
		                                                            <a href="<?php echo esc_url( 
		                                                            add_query_arg( 
		                                                            array(
		                                                            'action'  => 'view',
		                                                            'row_id'  => $tvalue->id,
		                                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
		                                                                <span class="svg-icon svg-icon-md svg-icon-primary">
		                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		                                                                            <rect x="0" y="0" width="24" height="24"></rect>
		                                                                            <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
		                                                                            <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
		                                                                        </g>
		                                                                    </svg>
		                                                                    <!--end::Svg Icon-->
		                                                                </span>
		                                                            </a>
		                                                            <a href="<?php echo esc_url( 
					                                                add_query_arg( 
					                                                array(
					                                                'action'  => 'edit',
					                                                'row_id'  => $tvalue->id,
					                                                ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"></path>
																					<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																	<a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm delete-entities" data-table="btpjy_tasks" data-pid="<?php echo esc_attr( $tvalue->project_id ); ?>" data-mid="<?php echo esc_attr( $tvalue->milestone_id ); ?>" data-id="<?php echo esc_attr( $tvalue->id ); ?>">
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<rect x="0" y="0" width="24" height="24"></rect>
																					<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
																					<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
		                                                        </td>
		                                                    </tr>
		                                                    <?php $sno++; } } ?>
		                                                </tbody>
		                                            </table>
		                                        </div>
		                                        <!--end::Tablet-->
		                                    </div>
		                                    <!--end::Tap pane-->
		                                </div>
		                            </div>
		                            <!--end::Body-->
		                        </div>
		                        <!--end::Tables Widget 5-->
								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
            </div>
        </div>
    </div>
</div>