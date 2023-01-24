<?php
defined('ABSPATH') or wp_die();

global $wpdb;
$user_id = sanitize_text_field( $_GET['user_id'] );
$table   = $wpdb->base_prefix . "btpjy_members";
$members = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table WHERE user_id = %s", $user_id ) );
?>
<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Member Assigneed Project\'s', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'You can view member assigneed project details', 'projectify' ); ?></span>
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
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Overview-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-325px" id="btpjy_profile_aside">
                    <!--begin::Nav Panels Wizard 2-->
                    <div class="card card-custom gutter-b">
                        <!--begin::Body-->
                        <div class="card-body pt-4 custom-padding-card">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end">
                                <div class="dropdown dropdown-inline">
                                    <a href="#" class="btn btn-icon-primary btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                        <!--begin::Navigation-->
                                        <ul class="navi navi-hover py-5">
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'edit',
                                                'user_id' => $member->user_id,
                                                ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                                                    <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                                                    <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="navi-text"><?php esc_html_e( 'Edit', 'projectify' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
				                                add_query_arg( 
				                                array(
				                                'action'  => 'contact',
				                                'user_id' => $member->user_id,
				                                ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3"></path>
                                                                    <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="navi-text"><?php esc_html_e( 'Contact', 'projectify' ); ?></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end::Navigation-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-90 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label" style="background-image:url('<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $members->picture ) ); ?>');"></div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary"><?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->name ) ); ?></a>
                                    <div class="text-muted"><?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->job_title ) ); ?></div>
                                </div>
                            </div>
                            </br>
                            <div class="mb-0">
                                <a href="https://www.facebook.com/profile.php?id=<?php echo esc_attr( $member->facebook ); ?>" class="btn btn-icon btn-circle btn-light-facebook mr-2">
                                    <i class="fab fa-facebook-f icon-1x"></i>
                                </a>
                                <a href="https://join.skype.com/invite/<?php echo esc_attr( $member->skype ); ?>" class="btn btn-icon btn-circle btn-light-twitter mr-2">
                                    <i class="fab fa-skype icon-1x"></i>
                                </a>
                                <a href="mailto:<?php echo esc_attr( $users->user_email ); ?>" class="btn btn-icon btn-circle btn-light-google">
                                    <i class="far fa-envelope icon-1x"></i>
                                </a>
                            </div>
                            <!--end::User-->
                            <!--begin::Contacts-->
                            <div class="py-8">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M13.0799676,14.7839934 L15.2839934,12.5799676 C15.8927139,11.9712471 16.0436229,11.0413042 15.6586342,10.2713269 L15.5337539,10.0215663 C15.1487653,9.25158901 15.2996742,8.3216461 15.9083948,7.71292558 L18.6411989,4.98012149 C18.836461,4.78485934 19.1530435,4.78485934 19.3483056,4.98012149 C19.3863063,5.01812215 19.4179321,5.06200062 19.4419658,5.11006808 L20.5459415,7.31801948 C21.3904962,9.0071287 21.0594452,11.0471565 19.7240871,12.3825146 L13.7252616,18.3813401 C12.2717221,19.8348796 10.1217008,20.3424308 8.17157288,19.6923882 L5.75709327,18.8875616 C5.49512161,18.8002377 5.35354162,18.5170777 5.4408655,18.2551061 C5.46541191,18.1814669 5.50676633,18.114554 5.56165376,18.0596666 L8.21292558,15.4083948 C8.8216461,14.7996742 9.75158901,14.6487653 10.5215663,15.0337539 L10.7713269,15.1586342 C11.5413042,15.5436229 12.4712471,15.3927139 13.0799676,14.7839934 Z" fill="#000000"></path>
                                                    <path d="M14.1480759,6.00715131 L13.9566988,7.99797396 C12.4781389,7.8558405 11.0097207,8.36895892 9.93933983,9.43933983 C8.8724631,10.5062166 8.35911588,11.9685602 8.49664195,13.4426352 L6.50528978,13.6284215 C6.31304559,11.5678496 7.03283934,9.51741319 8.52512627,8.02512627 C10.0223249,6.52792766 12.0812426,5.80846733 14.1480759,6.00715131 Z M14.4980938,2.02230302 L14.313049,4.01372424 C11.6618299,3.76737046 9.03000738,4.69181803 7.1109127,6.6109127 C5.19447112,8.52735429 4.26985715,11.1545872 4.51274152,13.802405 L2.52110319,13.985098 C2.22450978,10.7517681 3.35562581,7.53777247 5.69669914,5.19669914 C8.04101739,2.85238089 11.2606138,1.72147333 14.4980938,2.02230302 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <span class="text-muted font-weight-bold"><?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->phone ) ); ?></span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold"><?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->email ) ); ?></a>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="flex-shrink-0 mr-2">
                                        <span class="svg-icon svg-icon-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                    <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"></path>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>
                                    </span>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold"><?php echo esc_html( $members->city.', '.$members->state.', '.$members->country ); ?></a>
                                </div>
                            </div>
                            <!--end::Contacts-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Nav Panels Wizard 2-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                	<!--begin::Tables Widget 5-->
		            <div class="card card-custom">
		                <!--begin::Header-->
		                <div class="card-header flex-wrap border-0 pt-6 pb-0">
		                    <div class="card-title">
		                        <h3 class="card-label"><?php esc_html_e( 'Projects List', 'projectify' ); ?>
		                        <span class="text-muted pt-2 font-size-sm d-block"><?php esc_html_e( 'All your projects are listed here.', 'projectify' ); ?></span></h3>
		                    </div>
		                </div>
		                <!--end::Header-->

		                <div class="table-responsive">
		                    <table id="members-listing" class="table">
		                        <thead>
		                            <tr>
		                                <th><?php esc_html_e( 'S No. #', 'projectify' ); ?></th>
		                                <th><?php esc_html_e( 'Title', 'projectify' ); ?></th>
		                                <th><?php esc_html_e( 'Start', 'projectify' ); ?></th>
		                                <th><?php esc_html_e( 'Due Date', 'projectify' ); ?></th>
		                                <th><?php esc_html_e( 'Status', 'projectify' ); ?></th>
		                                <th><?php esc_html_e( 'Actions', 'projectify' ); ?></th>
		                            </tr>
		                            </thead>
		                            <tbody>
		                                <?php 
		                                    $all_tasks = btpjy_Helper::btpjy_get_projects();
		                                    $all_tasks = array_reverse( $all_tasks );
		                                    $sno = 1;
		                                    foreach ( $all_tasks as $tkey => $tvalue ) {
		                                    	$member_arr = btpjy_Helper::btpjy_get_team_member( $tvalue->teams );;
		                                    	if ( in_array( $user_id, $member_arr ) ) {
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
		                                    <td><?php echo esc_html( $tvalue->name ); ?></td>
		                                    <td><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->start_date ) ); ?></td>
		                                    <td><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->end_date ) ); ?></td>
		                                    <td><span class="label label-lg font-weight-bold <?php echo esc_attr( $p_class ); ?> label-inline"><?php echo esc_html( $progress ); ?></span></td>
		                                    <td nowrap="nowrap">
		                                        <a href="<?php echo esc_url( 
		                                            add_query_arg( 
		                                            array(
		                                            'action'  => 'view',
		                                            'row_id'  => $tvalue->id,
		                                            ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="btn btn-sm btn-clean btn-icon" title="View details">
		                                            <span class="svg-icon svg-icon-info svg-icon-md">
		                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		                                                    <rect x="0" y="0" width="24" height="24"/>
		                                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
		                                                </g>
		                                            </svg><!--end::Svg Icon--></span>
		                                        </a>
		                                        <a href="<?php echo esc_url( 
		                                                add_query_arg( 
		                                                array(
		                                                'action'  => 'edit',
		                                                'row_id'  => $tvalue->id,
		                                                ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="btn btn-sm btn-clean btn-icon" title="Edit details">
		                                                <span class="svg-icon svg-icon-success svg-icon-md">
		                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		                                                            <rect x="0" y="0" width="24" height="24"/>
		                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
		                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
		                                                        </g>
		                                                    </svg><!--end::Svg Icon-->
		                                                </span>
		                                        </a>
		                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon delete-entities" data-table="btpjy_projects" data-id="<?php echo esc_attr( $tvalue->id ); ?>" title="Delete">
		                                            <span class="svg-icon svg-icon-danger svg-icon-md">
		                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		                                                        <rect x="0" y="0" width="24" height="24"></rect>
		                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
		                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
		                                                    </g>
		                                                </svg>
		                                            </span>
		                                        </a>
		                                    </td>
		                                </tr>
		                                <?php $sno++; } } ?>
		                            </tbody>
		                    </table>
		                </div>
		            </div>
		            <!--end::Tables Widget 5-->
                </div>
            </div>
        </div>
    </div>
</div>