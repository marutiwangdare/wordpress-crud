<div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?php esc_html_e( 'Tasks', 'projectify' ); ?></h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Dropdown-->
                <a href="<?php echo esc_url( add_query_arg( 'action', 'add', admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                <i class="far fa-calendar-alt"></i><?php esc_html_e( 'Add Tasks', 'projectify' ); ?></a>
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
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_task_digits( 'all' ) ); ?></a>
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
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_task_digits( 'Processing' ) ); ?>
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
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_task_digits( 'Pending' ) ); ?>
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
                                        <?php echo esc_html( btpjy_Helper::btpjy_get_task_digits( 'Completed' ) ); ?>
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
            <!--begin::Tables Widget 5-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label"><?php esc_html_e( 'Tasks List', 'projectify' ); ?>
                        <span class="text-muted pt-2 font-size-sm d-block"><?php esc_html_e( 'All your Tasks are listed here.', 'projectify' ); ?></span></h3>
                    </div>
                </div>
                <!--end::Header-->

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
                                <th><?php esc_html_e( 'Actions', 'projectify' ); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $all_tasks = btpjy_Helper::btpjy_get_tasks();
                                    $all_tasks = array_reverse( $all_tasks );
                                    $sno = 1;
                                    foreach ( $all_tasks as $tkey => $tvalue ) {

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
                                    <td><?php echo esc_html( $project_data->name ); ?></td>
                                    <td><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->start ) ); ?></td>
                                    <td><?php echo esc_html( btpjy_Helper::btpjy_get_formated_date( $tvalue->end ) ); ?></td>
                                    <td><span class="label label-lg font-weight-bold <?php echo esc_attr( $p_class ); ?> label-inline"><?php echo esc_html( $progress ); ?></span></td>
                                    <td nowrap="nowrap">
                                        <a href="<?php echo esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action'  => 'view',
                                            'row_id'  => $tvalue->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-sm btn-clean btn-icon" title="View details">
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
                                                ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-sm btn-clean btn-icon" title="Edit details">
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
                                        <a href="javascript:;" class="btn btn-sm btn-clean btn-icon delete-entities" data-table="btpjy_tasks" data-pid="<?php echo esc_attr( $tvalue->project_id ); ?>" data-mid="<?php echo esc_attr( $tvalue->milestone_id ); ?>" data-id="<?php echo esc_attr( $tvalue->id ); ?>" title="Delete">
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
                                <?php $sno++; } ?>
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