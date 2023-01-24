<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
?>
<div class="d-flex flex-column flex-root staff-dashboard">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="btpjy_wrapper">
            <div class="horizontal-menu">
                <nav class="bottom-navbar">
                    <div class="container">
                        <ul class="nav page-navigation">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo esc_attr( admin_url( 'admin.php?page=projectify-pro-panel-member-dashboard' ) ); ?>">
                                <i class="fas fa-home menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Dashboard', 'clockify' ); ?></span>
                                </a>
                            </li>
                            <li class="nav-item mega-menu">
                                <a href="<?php echo esc_attr( admin_url( 'admin.php?page=projectify-pro-team-members' ) ); ?>" class="nav-link">
                                <i class="fas fa-user-clock menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Members', 'clockify' ); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo esc_attr( admin_url( 'admin.php?page=projectify-pro-member-projects' ) ); ?>" class="nav-link">
                                <i class="far fa-clipboard menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Projects', 'clockify' ); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo esc_attr( admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ); ?>" class="nav-link">
                                <i class="far fa-calendar-alt menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Tasks', 'clockify' ); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo esc_attr( admin_url( 'admin.php?page=projectify-pro-member-announcements' ) ); ?>" class="nav-link">
                                <i class="fas fa-bullhorn menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Announcements', 'clockify' ); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo esc_attr( admin_url( 'admin.php?page=projectify-pro-member-profile' ) ); ?>" class="nav-link">
                                <i class="fas fa-user menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Profile', 'clockify' ); ?></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo esc_attr( wp_logout_url() ); ?>" class="nav-link">
                                <i class="fas fa-sign-out-alt menu-icon"></i>
                                <span class="menu-title"><?php esc_html_e( 'Logout', 'clockify' ); ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Dashboard-->
                        <div class="row second-level-statics">
                            <div class="col-xl-4">
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

                                                        $member_arr = array();
                                                        $all_tids   = btpjy_Helper::btpjy_get_team_member( $value->teams );
                                                        foreach ( $all_tids as $team_key => $member ) {
                                                            global $wpdb;
                                                            $stable      = $wpdb->base_prefix . "btpjy_members";
                                                            $membersmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE id = %s", $member ) );
                                                            array_push( $member_arr, $membersmall->user_id );
                                                        }

                                                        if ( in_array( get_current_user_id(), $member_arr ) ) { 
                                                            $teams       = unserialize( $value->teams );
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
                                                                    ), admin_url( 'admin.php?page=projectify-pro-member-projects' ) ) ); ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-2"><?php echo esc_html( $value->name ); ?></a>
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
                                                    </div>
                                                    <!--end::Section-->
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
                                                <?php $p_no++; } } } ?>
                                            </div>
                                            <!--end::Carousel-->
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 7-->
                            </div>
                            <div class="col-xxl-4">
                                <div class="row statics-top-bar">
                                    <div class="col-xxl-12">
                                        <div class="card card-custom bg-gradient-primary text-white mb-8 mb-lg-0">
                                            <div class="card-body align-items-center">
                                                <h6 class="font-weight-normal text-center"><?php esc_html_e( 'Projects', 'projectify' ); ?></h6>
                                                <h2 class="text-white text-center mb-0"><?php echo esc_html( btpjy_Helper::btpjy_get_member_project_count() ); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="card card-custom bg-gradient-danger text-white mb-8 mb-lg-0">
                                            <div class="card-body">
                                                <h6 class="font-weight-normal text-center"><?php esc_html_e( 'Tasks', 'projectify' ); ?></h6>
                                                <h2 class="text-white text-center mb-0"><?php echo esc_html( btpjy_Helper::btpjy_get_member_task_count() ); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12">
                                        <div class="card card-custom bg-gradient-warning text-white mb-8 mb-lg-0">
                                            <div class="card-body">
                                                <h6 class="font-weight-normal text-center"><?php esc_html_e( 'Announcements', 'projectify' ); ?></h6>
                                                <h2 class="text-white text-center mb-0"><?php echo esc_html( count( btpjy_Helper::btpjy_get_announcements() ) ); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                            $member_arr = unserialize( $tvalue->assignee );
                                                            if ( in_array( get_current_user_id(), $member_arr ) && $sno < 11 ) {

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
                                                            ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ); ?>" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">
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
                                                            ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ); ?>" class="btn btn-icon btn-light btn-hover-primary btn-sm">
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