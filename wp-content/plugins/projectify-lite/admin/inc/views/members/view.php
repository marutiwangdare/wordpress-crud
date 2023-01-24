<div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?php esc_html_e( 'Members', 'projectify' ); ?></h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <a href="#" class="btn btn-fixed-height btn-success font-weight-bolder font-size-sm px-5 my-1 mr-2" data-toggle="modal" data-target="#AddDepartmentModal">
                    <i class="fa fa-user"></i><?php esc_html_e( 'Add Department', 'projectify' ); ?></a>
                <!--begin::Dropdown-->
                <a href="<?php echo esc_url( add_query_arg( 'action', 'add', admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                    <i class="fa fa-user"></i><?php esc_html_e( 'New Member', 'projectify' ); ?></a>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
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
                            <!--begin::Toolbar-->
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
                                            <li class="navi-separator mb-3 opacity-70"></li>
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'project',
                                                'user_id' => $member->user_id,
                                                ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-success">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                                                    <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="navi-text"><?php esc_html_e( 'Check Projects', 'projectify' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'task',
                                                'user_id' => $member->user_id,
                                                ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <rect fill="#000000" opacity="0.3" x="11" y="8" width="2" height="9" rx="1"/>
                                                                <path d="M12,21 C13.1045695,21 14,20.1045695 14,19 C14,17.8954305 13.1045695,17 12,17 C10.8954305,17 10,17.8954305 10,19 C10,20.1045695 10.8954305,21 12,21 Z M12,23 C9.790861,23 8,21.209139 8,19 C8,16.790861 9.790861,15 12,15 C14.209139,15 16,16.790861 16,19 C16,21.209139 14.209139,23 12,23 Z" fill="#000000" fill-rule="nonzero"/>
                                                                <path d="M12,7 C13.1045695,7 14,6.1045695 14,5 C14,3.8954305 13.1045695,3 12,3 C10.8954305,3 10,3.8954305 10,5 C10,6.1045695 10.8954305,7 12,7 Z M12,9 C9.790861,9 8,7.209139 8,5 C8,2.790861 9.790861,1 12,1 C14.209139,1 16,2.790861 16,5 C16,7.209139 14.209139,9 12,9 Z" fill="#000000" fill-rule="nonzero"/>
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="navi-text"><?php esc_html_e( 'Check Tasks', 'projectify' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="navi-separator mt-3 opacity-70"></li>
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'edit',
                                                'user_id' => $member->user_id,
                                                ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="navi-link">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-md svg-icon-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>
                                                                </g>
                                                            </svg>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </span>
                                                    <span class="navi-text"><?php esc_html_e( 'Edit', 'projectify' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link  delete-entities" data-table="btpjy_members" data-id="<?php echo esc_attr( $member->id ); ?>">
                                                    <span class="navi-icon">
                                                        <span class="svg-icon svg-icon-danger svg-icon-2x">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                                                                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                                                    </g>
                                                                </g>
                                                            </svg><!--end::Svg Icon-->
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
                            <!--end::Toolbar-->
                            <div class="text-center mb-7">
                                <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                    <div class="symbol-label" style="background-image:url('<?php echo esc_attr( $member->picture ); ?>')"></div>
                                    <i class="symbol-badge symbol-badge-bottom bg-success"></i>
                                </div>
                                <h4 class="font-weight-bold my-2">
                                    <a href="<?php echo esc_url( 
                                add_query_arg( 
                                array(
                                'action'  => 'profile',
                                'user_id' => $member->user_id,
                                ), admin_url( 'admin.php?page=projectify-pro-members' ) ) ); ?>" class="text-dark"><?php echo esc_html( $member->name ); ?></a></h4>
                                <div class="text-muted mb-2"><?php echo esc_html( $member->job_title ); ?></div>
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

<!-- Add Department -->
<div class="modal fade" id="AddDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="AddDepartmentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddDepartmentModalLabel"><?php esc_html_e( 'Enter department details', 'projectify' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="AddDepartmentForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <?php $nonce = wp_create_nonce( 'btpjy_add_departments' ); ?>
                    <input type="hidden" name="btpjy_add_departments_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                    <input type="hidden" name="action" value="btpjy_add_departments">
                    
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Department', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <input class="form-control form-control-solid form-control-lg" name="department" id="department" type="text" placeholder="<?php esc_attr_e( 'Enter department title', 'projectify' ); ?>">
                        </div>
                    </div>
                    <!--end::Group-->
                    <!--begin::Group-->
                    <div class="form-group row fv-plugins-icon-container">
                        <label class="col-xl-2 col-lg-2 col-form-label"><?php esc_html_e( 'Status', 'projectify' ); ?></label>
                        <div class="col-lg-10 col-xl-10">
                            <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="status">
                                <option value="Active"><?php esc_html_e( 'Active', 'projectify' ); ?></option>
                                <option value="Inactive"><?php esc_html_e( 'Inactive', 'projectify' ); ?></option>
                            </select>
                        </div>
                    </div>
                    <!--end::Group-->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success mr-2" id="AddDepartmentBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>