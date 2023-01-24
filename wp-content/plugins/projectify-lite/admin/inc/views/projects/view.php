<?php
defined('ABSPATH') or wp_die();

$all_projects = btpjy_Helper::btpjy_get_projects();
$all_projects = array_reverse( $all_projects );
?>
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
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'All your Projects are listed here.', 'projectify' ); ?></span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Dropdown-->
                <a href="<?php echo esc_url( add_query_arg( 'action', 'add', admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                    <i class="far fa-clipboard"></i><?php esc_html_e( 'Add Project', 'projectify' ); ?></a>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="row project-statistics-wave-card">
                <div class="col-lg-6 col-xl-3 mb-5">
                    <!--begin::Iconbox-->
                    <div class="card card-custom wave wave-animate-slow wave-primary mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-primary svg-icon-4x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="4" y="10" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="10" y="4" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="10" y="10" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="16" y="4" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="16" y="10" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="4" y="16" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="10" y="16" width="4" height="4" rx="2"/>
                                                <rect fill="#000000" x="16" y="16" width="4" height="4" rx="2"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_project_digits( 'all' ) ); ?></a>
                                    <div class="text-dark-75"><?php esc_html_e( 'Total', 'projectify' ); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Iconbox-->
                </div>
                <div class="col-lg-6 col-xl-3 mb-5">
                    <!--begin::Iconbox-->
                    <div class="card card-custom wave wave-animate-slow wave-warning mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-warning svg-icon-4x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_project_digits( 'processing' ) ); ?>
                                    </a>
                                    <div class="text-dark-75"><?php esc_html_e( 'Processing', 'projectify' ); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Iconbox-->
                </div>
                <div class="col-lg-6 col-xl-3 mb-5">
                    <!--begin::Iconbox-->
                    <div class="card card-custom wave wave-animate-slow wave-info mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-info svg-icon-4x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"/>
                                                <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_project_digits( 'no-progress' ) ); ?>
                                    </a>
                                    <div class="text-dark-75"><?php esc_html_e( 'Pending', 'projectify' ); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Iconbox-->
                </div>
                <div class="col-lg-6 col-xl-3">
                    <!--begin::Iconbox-->
                    <div class="card card-custom wave wave-animate-slow wave-success mb-8 mb-lg-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="mr-6">
                                    <span class="svg-icon svg-icon-success svg-icon-4x">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_project_digits( 'completed' ) ); ?>
                                    </a>
                                    <div class="text-dark-75"><?php esc_html_e( 'Completed', 'projectify' ); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Iconbox-->
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="row">
                <?php            
                if ( ! empty( $all_projects ) ) {
                    foreach ( $all_projects as $key => $value ) {
                        $teams = unserialize( $value->teams );

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

                        $project_second = explode( ' ', $value->name );
                        if ( count( $project_second ) == 2 ) {
                            if ( null !== $project_second[1] && ! empty ( $project_second[1] ) ) {
                                $psecond = $project_second[1];
                            } 
                        } else {
                            $psecond = '';
                        }
                ?>
                <div class="col-xxl-4 project-view-desc-col">
                    <!--begin::Mixed Widget 7-->
                    <div class="card card-custom card-stretch gutter-b project-card-col">
                        <!--begin::Header-->
                        <div class="d-flex justify-content-end">
                            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" data-original-title="Quick actions">
                                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="svg-icon svg-icon-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1">
                                                <rect x="14" y="9" width="6" height="6" rx="3" fill="black"></rect>
                                                <rect x="3" y="9" width="6" height="6" rx="3" fill="black" fill-opacity="0.7"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                    <!--begin::Naviigation-->
                                    <ul class="navi navi-hover navi-active navi-accent">
                                        <li class="navi-header font-weight-bold py-5">
                                            <span class="font-size-lg"><?php esc_html_e( 'Quick Actions:', 'projectify' ); ?></span>
                                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="" data-original-title="Click to learn more..."></i>
                                        </li>
                                        <li class="navi-separator mt-3 opacity-70"></li>
                                        <li class="navi-item">
                                            <a href="<?php echo esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action'  => 'view',
                                            'row_id'  => $value->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="navi-link">
                                                <span class="navi-icon">
                                                    <span class="svg-icon svg-icon-info svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="navi-text"><?php esc_html_e( 'View', 'projectify' ); ?></span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'edit',
                                                'row_id'  => $value->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="navi-link">
                                                <span class="navi-icon">
                                                    <span class="svg-icon svg-icon-success svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                                <span class="navi-text"><?php esc_html_e( 'Edit', 'projectify' ); ?></span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a href="#" class="navi-link delete-entities" data-table="btpjy_projects" data-id="<?php echo esc_attr( $value->id ); ?>">
                                                <span class="navi-icon">
                                                    <span class="svg-icon svg-icon-danger svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </span>
                                                <span class="navi-text"><?php esc_html_e( 'Delete', 'projectify' ); ?></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!--end::Naviigation-->
                                </div>
                            </div>
                        </div>
                        <div class="card-header align-items-center border-0 mt-4">
                            <div class="d-flex align-items-end py-2">
                                <!--begin::Pic-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Pic-->
                                    <div class="d-flex flex-shrink-0 mr-5">
                                        <div class="symbol symbol-lg-75 symbol-circle symbol-light-info">
                                            <span class="symbol-label font-size-h3 font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $value->name, $psecond ) ); ?></span>
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
                                            ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-2"><?php echo esc_html( $value->name ); ?></a>
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
                                                <span class="label label-lg <?php echo esc_attr( $class_arr[0] ); ?> label-inline font-size-sm font-weight-bolder py-5 mr-2 mb-2">
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
                                            <!--begin::Info-->
                                            <div class="bg-light rounded w-90px h-60px d-flex flex-center flex-column">
                                                <span class="font-size-sm font-weight-bold text-muted pb-1"><?php esc_html_e( 'Deposit', 'projectify' ); ?></span>
                                                <span class="font-size-sm font-weight-bolder text-dark-75"><?php echo esc_html( btpjy_Helper::btpjy_get_currency_position_html( $value->deposit_amnt ) ); ?></span>
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
                <?php } } ?>
            </div>
        </div>
    </div>

</div>