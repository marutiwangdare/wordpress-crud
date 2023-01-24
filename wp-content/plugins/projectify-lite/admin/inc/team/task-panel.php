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
                require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/team/task-view.php';
             } else { ?>
            <div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
                <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
                    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap mr-2">
                            <!--begin::Title-->
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Tasks', 'projectify' ); ?></h5>
                            <!--end::Title-->
                            <!--begin::Separator-->
                            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                            <!--end::Separator-->
                            <!--begin::Search Form-->
                            <div class="d-flex align-items-center" id="btpjy_subheader_search">
                                <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'All your Tasks are listed here', 'projectify' ); ?></span>
                            </div>
                            <!--end::Search Form-->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Tables Widget 5-->
                        <div class="card card-custom">
                            <div class="table-responsive">
                                <table id="members-listing" class="table">
                                    <thead>
                                        <tr>
                                            <th><?php esc_html_e( 'S No. #', 'projectify' ); ?></th>
                                            <th><?php esc_html_e( 'Title', 'projectify' ); ?></th>
                                            <th><?php esc_html_e( 'Project', 'projectify' ); ?></th>
                                            <th><?php esc_html_e( 'Start', 'projectify' ); ?></th>
                                            <th><?php esc_html_e( 'Due Date', 'projectify' ); ?></th>
                                            <th><?php esc_html_e( 'Status', 'projectify' ); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $all_tasks = btpjy_Helper::btpjy_get_tasks();
                                                $all_tasks = array_reverse( $all_tasks );
                                                $sno = 1;
                                                foreach ( $all_tasks as $tkey => $tvalue ) {
                                                    $member_arr = unserialize( $tvalue->assignee );
                                                    if ( in_array( get_current_user_id(), $member_arr ) ) {

                                                    $class_arr = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
                                                    shuffle( $class_arr );

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
                                                <td><?php echo esc_html( $sno ); ?></td>
                                                <td><a href="<?php echo esc_url( 
                                                        add_query_arg( 
                                                        array(
                                                        'action'  => 'view',
                                                        'row_id'  => $tvalue->id,
                                                        ), admin_url( 'admin.php?page=projectify-pro-member-tasks' ) ) ); ?>">
                                                        <?php echo esc_html( $tvalue->name ); ?></a></td>
                                                <td><?php echo esc_html( $project_data->name ); ?></td>
                                                <td><?php echo esc_html( $tvalue->start ); ?></td>
                                                <td><?php echo esc_html( $tvalue->end ); ?></td>
                                                <td><span class="label label-lg font-weight-bold <?php echo esc_attr( $p_class ); ?> label-inline"><?php echo esc_html( $progress ); ?></span></td>
                                            </tr>
                                            <?php $sno++; } } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Tables Widget 5-->
                        <!--end::Dashboard-->
                    </div>
                    <!--end::Container-->
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>