<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$row_id         = sanitize_text_field( $_GET['row_id'] );
$task_details   = btpjy_Helper::btpjy_task_info( $row_id );
$project_detail = btpjy_Helper::btpjy_project_info( $task_details->project_id );
?>
<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Edit Task', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'Edit task details and submit', 'projectify' ); ?></span>
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
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card-custom card-transparent">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-4" id="btpjy_wizard" data-wizard-state="first" data-wizard-clickable="false">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <div class="wizard-step" id="wizard-step-one" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-icon mr-4">
                                            <span class="svg-icon svg-icon-xxl">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect opacity="0.200000003" x="0" y="0" width="24" height="24"/>
                                                        <path d="M4.5,7 L9.5,7 C10.3284271,7 11,7.67157288 11,8.5 C11,9.32842712 10.3284271,10 9.5,10 L4.5,10 C3.67157288,10 3,9.32842712 3,8.5 C3,7.67157288 3.67157288,7 4.5,7 Z M13.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L13.5,18 C12.6715729,18 12,17.3284271 12,16.5 C12,15.6715729 12.6715729,15 13.5,15 Z" fill="#000000" opacity="0.3"/>
                                                        <path d="M17,11 C15.3431458,11 14,9.65685425 14,8 C14,6.34314575 15.3431458,5 17,5 C18.6568542,5 20,6.34314575 20,8 C20,9.65685425 18.6568542,11 17,11 Z M6,19 C4.34314575,19 3,17.6568542 3,16 C3,14.3431458 4.34314575,13 6,13 C7.65685425,13 9,14.3431458 9,16 C9,17.6568542 7.65685425,19 6,19 Z" fill="#000000"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title"><?php esc_html_e( 'Details', 'projectify' ); ?></div>
                                            <div class="wizard-desc"><?php esc_html_e( 'Task General Information', 'projectify' ); ?></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0 members-inner-panel">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                        <form class="form fv-plugins-bootstrap fv-plugins-framework" id="EditTaskForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                                            <?php $nonce = wp_create_nonce( 'btpjy_edit_tasks' ); ?>
                                            <input type="hidden" name="btpjy_edit_tasks_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                                            <input type="hidden" name="action" value="btpjy_edit_tasks">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" id="member-fields-panel-one" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10"><?php esc_html_e( 'Task Details:', 'projectify' ); ?></h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Title', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="t_title" type="text" placeholder="<?php esc_attr_e( 'Enter task title', 'projectify' ); ?>" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $task_details->name ) ); ?>">
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Description', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea class="form-control form-control-solid form-control-lg" rows="5" name="t_desc">
                                                                    <?php echo esc_html( btpjy_Helper::btpjy_value_check( $task_details->description ) ); ?>
                                                                </textarea>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Project', 'projectify' ); ?></label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <?php $all_projects = btpjy_Helper::btpjy_get_projects(); ?>
                                                                <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="project_id" id="select_project_id">
                                                                    <option value=""><?php esc_html_e( 'Select Project...', 'projectify' ); ?></option>
                                                                    <?php foreach ( $all_projects as $pkey => $pvalue ) { ?>
                                                                    <option value="<?php echo esc_attr( $pvalue->id ); ?>"><?php echo esc_html( $pvalue->name ); ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Assginee', 'projectify' ); ?></label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <?php $users_list = btpjy_Helper::btpjy_get_users_list(); ?>
                                                                <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" multiple="multiple" name="t_assingee[]" id="select_t_assingee">
                                                                    <option value=""><?php esc_html_e( 'Select Team Member...', 'projectify' ); ?></option>
                                                                    <?php if ( ! empty( $users_list ) )  { foreach ( $users_list as $key => $users ) { ?>
                                                                       <option value="<?php echo esc_attr( $users->ID ); ?>">
                                                                           <?php echo esc_html( $users->display_name ); ?>
                                                                       </option>
                                                                    <?php } } ?>
                                                                </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Start Date', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="t_start" id="t_start" type="text" placeholder="<?php esc_attr_e( 'Start Date', 'projectify' ); ?>" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $task_details->start ) ); ?>">
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Due Date', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="t_end" id="t_end" type="text" placeholder="<?php esc_attr_e( 'Due Date', 'projectify' ); ?>" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $task_details->end ) ); ?>">
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Estimated Time', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="t_time" id="t_time" type="text" placeholder="<?php esc_attr_e( 'Enter estimated tile like( 5 Hours )', 'projectify' ); ?>" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $task_details->estimated_time ) ); ?>">
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Status', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="t_status">
                                                                    <option value="Pending" <?php selected( $task_details->status, 'Pending' ); ?>><?php esc_html_e( 'Pending', 'projectify' ); ?></option>
                                                                    <option value="Processing" <?php selected( $task_details->status, 'Processing' ); ?>><?php esc_html_e( 'Processing', 'projectify' ); ?></option>
                                                                    <option value="Completed" <?php selected( $task_details->status, 'Completed' ); ?>><?php esc_html_e( 'Completed', 'projectify' ); ?></option>
                                                                </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Priority', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="priority">
                                                                    <option value="Low" <?php selected( $task_details->priority, 'Low' ); ?>><?php esc_html_e( 'Low', 'projectify' ); ?></option>
                                                                    <option value="High" <?php selected( $task_details->priority, 'High' ); ?>><?php esc_html_e( 'High', 'projectify' ); ?></option>
                                                                    <option value="Medium" <?php selected( $task_details->priority, 'Medium' ); ?>><?php esc_html_e( 'Medium', 'projectify' ); ?></option>
                                                                </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <input type="hidden" name="id" value="<?php echo esc_attr( $row_id ); ?>">
                                                        <!--end::Group-->
                                                        <!--begin::Wizard Actions-->
                                                        <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                            <div>
                                                                <button type="submit" class="btn btn-success font-weight-bolder px-10 py-3" id="EditTaskBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?>
                                                                <span class="svg-icon svg-icon-md ml-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                            <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002)"></path>
                                                                        </g>
                                                                    </svg>
                                                                    <!--end::Svg Icon-->
                                                                </span></button>
                                                            </div>
                                                        </div>
                                                        <!--end::Wizard Actions-->
                                                    </div>
                                                    <!--end::Wizard Step 1-->
                                                </div>
                                            </div>
                                        </form>
                                        <!--end::Wizard Form-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Wizard-->
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>