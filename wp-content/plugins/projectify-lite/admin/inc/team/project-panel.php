<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$action = '';
if ( isset( $_GET['action'] ) ) {
    $action = sanitize_text_field( $_GET['action'] );
}
?>
<div class="d-flex flex-column flex-root">
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

            <?php if ( $action == 'view' ) {
                require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/project-view.php';
             } else { ?>
                <div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
                    <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
                        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center flex-wrap mr-2">
                                <!--begin::Title-->
                                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Projects', 'projectify' ); ?></h5>
                                <!--end::Title-->
                                <!--begin::Separator-->
                                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                                <!--end::Separator-->
                                <!--begin::Search Form-->
                                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'All your Projects are listed here', 'projectify' ); ?></span>
                                </div>
                                <!--end::Search Form-->
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Card-->
                            <div class="row">
                                <?php
                                $all_projects = btpjy_Helper::btpjy_get_projects();
                                $all_projects = array_reverse( $all_projects );   
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

                                        $teams     = unserialize( $value->teams );
                                        $class_arr = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
                                        shuffle( $class_arr );

                                        if ( $value->status == 'no-progress' ) {
                                            $progress = 'No Progress';
                                            $p_class  = 'label-light-primary';
                                        } elseif ( $value->status == 'processing' ) {
                                            $progress = 'Processing';
                                            $p_class  = 'label-light-warning';
                                        } else {
                                            $progress = 'Completed';
                                            $p_class  = 'label-light-success';
                                        }
                                ?>
                                <div class="col-xxl-4 project-view-desc-col">
                                    <!--begin::Mixed Widget 7-->
                                    <div class="card card-custom card-stretch gutter-b project-card-col">
                                        <!--begin::Header-->
                                        <div class="card-header align-items-center border-0 mt-4">
                                            <div class="d-flex align-items-end py-2">
                                                <!--begin::Pic-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Pic-->
                                                    <div class="d-flex flex-shrink-0 mr-5">
                                                        <div class="symbol symbol-lg-75 symbol-circle symbol-light-info">
                                                            <span class="symbol-label font-size-h3 font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $value->name, '' ) ); ?></span>
                                                        </div>
                                                    </div>
                                                    <!--end::Pic-->
                                                    <!--begin::Title-->
                                                    <div class="d-flex flex-column project-title-text">
                                                        <a href="<?php echo esc_url( 
                                                            add_query_arg( 
                                                            array(
                                                            'action'  => 'view',
                                                            'row_id'  => $value->id,
                                                            ), admin_url( 'admin.php?page=projectify-pro-member-projects' ) ) ); ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-2"><?php echo esc_html( $value->name ); ?></a>
                                                            <span class="label label-lg <?php echo esc_attr( $p_class ); ?> label-inline font-size-sm font-weight-bolder py-5 mr-4">
                                                        <?php echo esc_html( $progress ); ?></span>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Body-->
                                        <div class="card-body">
                                            <div id="mixed-widget-slider-1" class="carousel slide" data-ride="carousel" data-interval="8000">
                                                <!--begin::Carousel-->
                                                <div class="carousel-inner pt-5">
                                                    <div class="carousel-item active">
                                                        <div class="flex-grow-1">
                                                            <!--begin::Subtitle-->
                                                            <span class="font-size-h6 text-hover-primary font-weight-bold pt-3 pb-2 d-block"><?php esc_html_e( 'Teams' , 'projectify' ); ?></span>
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
                                                        <div class="pt-2">
                                                            <!--begin::Subtitle-->
                                                            <span class="font-size-h6 text-hover-primary font-weight-bold pt-3 pb-2 d-block"><?php esc_html_e( 'Memebrers' , 'projectify' ); ?></span>
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
                                                        <div class="progress mt-7">
                                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo esc_attr( $project_progress ); ?>" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><?php echo esc_html( $project_progress ); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Carousel-->
                                            </div>
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Mixed Widget 7-->
                                </div>
                                <?php } } } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>