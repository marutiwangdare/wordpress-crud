<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$row_id   = sanitize_text_field( $_GET['row_id'] );
$announce = btpjy_Helper::btpjy_announce_info( $row_id );
?>
<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Announcement Details', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'View announcememnt details', 'projectify' ); ?></span>
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
                                <span class="display3 symbol-label font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $announce->title ) ); ?></span>
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
                                        <?php echo esc_html( $announce->title ); ?>
                                    </a>
                                    <!--end::Name-->
                                </div>
                                <!--begin::User-->
                                <!--begin::Actions-->
                                <div class="my-lg-0 my-1">
                                    <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'edit',
                                                'row_id'  => $announce->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-announcements' ) ) ); ?>" class="btn btn-sm btn-light-primary font-weight-bolder mr-2"><?php esc_html_e( 'Edit', 'projectify' ); ?></a>
                                    <a href="#" data-id="<?php echo esc_attr( $announce->id ); ?>" data-table="btpjy_announcements" class="btn btn-sm btn-danger font-weight-bolder delete-entities"><?php esc_html_e( 'Delete', 'projectify' ); ?></a>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <!--begin::Description-->
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                    <?php echo esc_html( $announce->description ); ?>
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>