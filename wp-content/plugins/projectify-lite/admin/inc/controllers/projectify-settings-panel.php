<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="btpjy_wrapper">
            <?php require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/nav/nav.php'; ?>
            <div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
                <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
                    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <!--begin::Info-->
                        <div class="d-flex align-items-center flex-wrap mr-1">
                            <!--begin::Page Heading-->
                            <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <!--begin::Page Title-->
                                <h5 class="text-dark font-weight-bold my-1 mr-5"><?php esc_html_e( 'Settings', 'clockify' ); ?></h5>
                                <!--end::Page Title-->
                            </div>
                            <!--end::Page Heading-->
                        </div>
                        <!--end::Info-->
                    </div>
                </div>
                <div class="d-flex flex-column-fluid">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Tables Widget 5-->
                        <div class="card card-custom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#general-tab" role="tab"><?php esc_html_e( 'General Settings', 'clockify' ); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#template-tab" role="tab"><?php esc_html_e( 'Email Templates', 'clockify' ); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#notification-tab" role="tab"><?php esc_html_e( 'Notification Settings', 'clockify' ); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-danger" target="_blank" href="https://beastthemes.com/doc-projectify-wordpress-premium-plugin/" role="tab"><?php esc_html_e( 'Support', 'clockify' ); ?></a>
                                </li>
                            </ul><!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="general-tab" role="tabpanel">
                                    <?php require_once( BTPJL_PLUGIN_DIR_PATH . 'admin/inc/views/settings/general.php' ); ?>
                                </div>
                                <div class="tab-pane" id="template-tab" role="tabpanel">
                                    <?php require_once( BTPJL_PLUGIN_DIR_PATH . 'admin/inc/views/settings/email.php' ); ?>
                                </div>
                                <div class="tab-pane" id="notification-tab" role="tabpanel">
                                    <?php require_once( BTPJL_PLUGIN_DIR_PATH . 'admin/inc/views/settings/notification.php' ); ?>
                                </div>
                            </div>
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