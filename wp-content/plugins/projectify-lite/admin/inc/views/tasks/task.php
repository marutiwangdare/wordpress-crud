<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$row_id         = sanitize_text_field( $_GET['row_id'] );
$task_details   = btpjy_Helper::btpjy_task_info( $row_id );
$project_detail = btpjy_Helper::btpjy_project_info( $task_details->project_id );

if ( $project_detail->priority == 'High' ) {
    $priority_class = 'label-light-danger';
} elseif ( $project_detail->priority == 'Medium' ) {
    $priority_class = 'label-light-warning';
} else {
    $priority_class = 'label-light-success';
}
?>
<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Task Details', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'You can view task details', 'projectify' ); ?></span>
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
                                <span class="display3 symbol-label font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $task_details->name ) ); ?></span>
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
                                        <?php echo esc_html( $task_details->name ); ?>
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
                                                'row_id'  => $task_details->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-tasks' ) ) ); ?>" class="btn btn-sm btn-light-primary font-weight-bolder mr-2"><?php esc_html_e( 'Edit', 'projectify' ); ?></a>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Title-->
                            <!--begin::Content-->
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <!--begin::Description-->
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                    <?php echo esc_html( $task_details->description ); ?>
                                </div>
                                <!--end::Description-->
                            </div>
                            <!--end::Content-->
                            <div class="subtask-inner-details">
                                <strong><?php esc_html_e( 'Project:', 'projectify' ); ?></strong>
                                <span id="ms_start_72-1">
                                    <a href="<?php echo esc_url( 
                                            add_query_arg( 
                                            array(
                                            'action'  => 'view',
                                            'row_id'  => $project_detail->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-projects' ) ) ); ?>" class="navi-link text-dark">
                                        <?php echo esc_html( $project_detail->name ); ?>
                                    </a>
                                </span> |  
                                <strong><?php esc_html_e( 'Priority:', 'projectify' ); ?></strong>
                                <span id="ms_deadline_72-1">
                                    <span class="label <?php echo esc_attr( $priority_class ); ?> label-inline font-weight-bolder label-lg mr-2"><?php echo esc_html( $task_details->priority ); ?></span>
                                </span>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Top-->
                    <!--begin::Separator-->
                    <div class="separator separator-solid my-7"></div>
                    <!--end::Separator-->
                    <!--begin::Bottom-->
                    <div class="d-flex align-items-center flex-wrap">
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                            <span class="mr-4">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"></polygon>
                                            <path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M9,8 C8.44771525,8 8,8.44771525 8,9 C8,9.55228475 8.44771525,10 9,10 L18,10 C18.5522847,10 19,9.55228475 19,9 C19,8.44771525 18.5522847,8 18,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 C8,13.5522847 8.44771525,14 9,14 L14,14 C14.5522847,14 15,13.5522847 15,13 C15,12.4477153 14.5522847,12 14,12 L9,12 Z" fill="#000000"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <div class="d-flex flex-column">
                                <span class="text-dark-75 font-weight-bolder font-size-sm"><?php echo esc_html( btpjy_Helper::btpjy_get_comments_count( $task_details->project_id, 'btpjy_tasks', $row_id ) ); ?></span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill my-1">
                            <span class="mr-4">
                                <span class="svg-icon svg-icon-2x">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                            <div class="symbol-group symbol-hover">
                                <?php 
                                    $all_tids  = unserialize( $task_details->assignee );
                                    $member_no = 1;
                                    foreach ( $all_tids as $team_key => $member ) {
                                        global $wpdb;
                                        $stable      = $wpdb->base_prefix . "btpjy_members";
                                        $membersmall = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $stable WHERE user_id = %s", $member ) );
                                        if ( ! empty( $membersmall ) ) {
                                            $member_no++;
                                ?>
                                <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="" data-original-title="Mark Stone">
                                    <img alt="Pic" src="<?php echo esc_attr( $membersmall->picture ); ?>">
                                </div>
                                <?php } }
                                if ( $member_no > 5 ) {
                                ?>
                                <div class="symbol symbol-30 symbol-circle symbol-light-primary" data-toggle="tooltip" title="" data-original-title="More users">
                                    <span class="symbol-label font-weight-bold"><?php esc_html_e( '5+', 'projectify' ); ?></span>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--end::Bottom-->
                </div>
            </div>

            <div class="card card-custom gutter-b">
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="font-weight-bolder text-dark"><?php esc_html_e( 'Comments', 'projectify'); ?></span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm"><?php esc_html_e( 'Task\'s Comments', 'projectify'); ?></span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="previous-comments">
                        <span class="font-weight-bolder text-dark"><?php esc_html_e( 'Previous Comments', 'projectify'); ?></span>
                        <div class="comment-wrapper">
                            <div class="timeline timeline-5">
                                <div class="timeline-items">
                                    <?php 
                                        global $wpdb;
                                        $table    = $wpdb->base_prefix . "btpjy_comments";
                                        $comments = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE project_id = %s AND type = %s AND type_id = %s", $task_details->project_id, 'btpjy_tasks', $row_id ) );
                                        if ( ! empty ( $comments ) ) {
                                            foreach ( $comments as $ckey => $cvalue ) {
                                    ?>
                                    <!--begin::Item-->
                                    <div class="timeline-item">
                                        <!--begin::Icon-->
                                        <div class="timeline-media bg-light-primary">
                                            <span class="svg-icon svg-icon-primary svg-icon-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"></path>
                                                        <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Icon-->
                                        <!--begin::Info-->
                                        <div class="timeline-desc timeline-desc-light-primary h-100">
                                            <span class="font-weight-bolder text-primary"><?php esc_html_e( 'By ', 'projectify' ); ?><?php echo esc_html( btpjy_Helper::btpjy_member_details( $cvalue->user_id, 'name' ) ).', '; ?></span>
                                            <span class="font-weight-bolder"><?php echo esc_html( date( 'F j Y', strtotime( $cvalue->date ) ) ).', '.esc_html( date( 'g:i A', strtotime( $cvalue->time ) ) ); ?></span>
                                            <span class="font-weight-bolder comment-date-right">
                                                <?php if ( get_current_user_id() == $cvalue->user_id ) { ?>
                                                <a href="#" class="btn btn-icon btn-light-twitter mr-2 fetch-comment-entities" data-id="<?php echo esc_attr( $cvalue->id ); ?>" title="<?php esc_attr_e( 'Edit comment', 'projectify' ); ?>">
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>
                                                                <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>
                                                            </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </a>
                                                <?php } ?>
                                                <a href="#" class="btn btn-icon btn-light-google delete-entities" data-table="btpjy_comments" data-id="<?php echo esc_attr( $cvalue->id ); ?>" title="<?php esc_attr_e( 'Delete comment', 'projectify' ); ?>">
                                                    <span class="svg-icon svg-icon-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </span>
                                            <div class="font-weight-normal text-dark-50 comment-desc-text"><?php echo wp_kses_post( $cvalue->comment ); ?></div>
                                            <?php $media_files = unserialize( $cvalue->media );
                                                if ( ! empty ( $media_files ) ) { ?>
                                                    <span class="font-weight-bolder text-dark pb-2"><?php esc_html_e( 'Attachments', 'projectify'); ?></span>
                                                    <br>
                                            <?php foreach ( $media_files as $media_key => $media_value ) {
                                                    $myFile   = pathinfo( $media_value );
                                                    $validate = wp_check_filetype_and_ext( $media_value, $myFile['basename'] );
                                                    if ( $validate["ext"] == 'jpg' || $validate["ext"] == 'png' ) { ?>
                                                        <div class="comments-image-item">
                                                            <a target="_blank" href="<?php echo esc_attr( $media_value ); ?>"><img src="<?php echo esc_attr( $media_value ); ?>"></a>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="comments-image-item">
                                                            <a href="<?php echo esc_attr( $media_value ); ?>" download>
                                                                <?php echo esc_html( $myFile['basename'] ); ?>
                                                            </a>
                                                        </div>
                                                    <?php }
                                                } }
                                            ?>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                    <?php } } else { ?>
                                        <p><?php esc_html_e( 'No comments yet!', 'projectify' ); ?></p>
                                    <?php } ?>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <form class="form" id="AddCommentForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                        <?php $nonce = wp_create_nonce( 'btpjy_save_comments' ); ?>
                        <input type="hidden" name="btpjy_save_comments_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                        <input type="hidden" name="action" value="btpjy_save_comments">
                        <div class="form-group fv-plugins-icon-container">
                            <label class="col-form-label"><?php esc_html_e( 'Post your Comment', 'projectify' ); ?></label>
                            <?php   
                                wp_editor( '', 'comment', $settings = array( 'editor_height' => 200, 'media_buttons' => false, 'textarea_rows' => 20, 'drag_drop_upload' => true ) ); 
                            ?>
                        </div>

                        <div id="myplugin-placeholder_btpjy">
                            <p><?php esc_html_e( 'Upload files to add attachments!', 'projectify' ); ?></p>
                        </div>
                        <input type="button" name="upload-btn" id="upload-btn-btpjy" class="button-secondary button" value="<?php esc_attr_e( 'Upload Files', 'projectify' ); ?>">

                        <input type="hidden" name="project_id" value="<?php echo esc_attr( $task_details->project_id ); ?>">
                        <input type="hidden" name="type" value="btpjy_tasks">
                        <input type="hidden" name="type_id" value="<?php echo esc_attr( $row_id ); ?>">
                        <input type="hidden" name="user_id" value="<?php echo esc_attr( get_current_user_id() ); ?>">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mr-2" id="AddCommentBtn"><?php esc_html_e( 'Add Comment', 'projectify' ); ?></button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Edit Comment Modal -->
<div class="modal fade" id="EditcommentModal" tabindex="-1" role="dialog" aria-labelledby="EditcommentModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditcommentModal"><?php esc_html_e( 'Edit Comment details', 'projectify' ); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" id="EditcommentForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                    <?php $nonce = wp_create_nonce( 'btpjy_edit_comments' ); ?>
                        <input type="hidden" name="btpjy_edit_comments_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                        <input type="hidden" name="action" value="btpjy_edit_comments">
                        <div class="form-group fv-plugins-icon-container">
                            <label class="col-form-label"><?php esc_html_e( 'Post your Comment', 'projectify' ); ?></label>
                            <?php   
                                wp_editor( '', 'edit_comment', $settings = array( 'editor_height' => 200, 'media_buttons' => false, 'textarea_rows' => 20, 'drag_drop_upload' => true ) ); 
                            ?>
                        </div>
                        <div id="edit-placeholder_btpjy"></div>
                        <input type="button" name="upload-btn" id="edit-upload-btn-btpjy" class="button-secondary button" value="<?php esc_attr_e( 'Upload Files', 'projectify' ); ?>">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mr-2" id="EditCommentBtn"><?php esc_html_e( 'Edit Comment', 'projectify' ); ?></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>