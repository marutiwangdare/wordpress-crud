<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
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
            <div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
                <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
                    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap mr-2">
                            <!--begin::Title-->
                            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Members', 'projectify' ); ?></h5>
                            <!--end::Title-->
                            <!--begin::Separator-->
                            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                            <!--end::Separator-->
                            <!--begin::Search Form-->
                            <div class="d-flex align-items-center" id="btpjy_subheader_search">
                                <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'List of all members', 'projectify' ); ?></span>
                            </div>
                            <!--end::Search Form-->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <div class="row">
                            <?php 
                                $members_list = btpjy_Helper::btpjy_get_members();
                                $members_list = array_reverse( $members_list );
                                foreach ( $members_list as $mkey => $member ) {
                            ?>
                            <div class="col-xxl-3 col-xl-6 col-md-6 col-sm-6 members-list-cards">
                                <!--begin::Card-->
                                <div class="card card-custom gutter-b card-stretch">
                                    <!--begin::Body-->
                                    <div class="card-body pt-4">
                                        <div class="text-center mb-7">
                                            <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                                <div class="symbol-label" style="background-image:url('<?php echo esc_attr( $member->picture ); ?>')"></div>
                                                <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                            </div>
                                            <h4 class="font-weight-bold my-2"><?php echo esc_html( $member->name ); ?></h4>
                                            <div class="text-muted mb-2"><?php echo esc_html( $member->job_title ); ?></div>
                                            <span class="label label-light-warning label-inline font-weight-bolder label-lg">Online</span>
                                        </div>
                                        <!--end::Contacts-->
                                        <div class="mb-7 text-center">
                                            <a href="https://www.facebook.com/profile.php?id=<?php echo esc_attr( $member->facebook ); ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                                <i class="fab fa-facebook-f icon-1x"></i>
                                            </a>
                                            <a href="https://join.skype.com/invite/<?php echo esc_attr( $member->skype ); ?>" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                                <i class="fab fa-skype icon-1x"></i>
                                            </a>
                                            <a href="mailto:<?php echo esc_attr( $member->email ); ?>" class="btn btn-icon btn-circle btn-light-google">
                                                <i class="far fa-envelope icon-1x"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <?php } ?>
                        </div>
                        <!--end::Dashboard-->
                    </div>
                    <!--end::Container-->
                </div>
            </div>
        </div>
    </div>
</div>