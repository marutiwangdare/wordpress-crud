<div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'New Team', 'projectify' ); ?></h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="btpjy_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'Enter Team details and submit', 'projectify' ); ?></span>
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
                        <!--begin::Card-->
                        <div class="card card-custom card-shadowless rounded-top-0 members-inner-panel">
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin::Wizard Form-->
                                        <form class="form fv-plugins-bootstrap fv-plugins-framework" id="AddTeamsForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                                            <?php $nonce = wp_create_nonce( 'btpjy_save_teams' ); ?>
                                            <input type="hidden" name="btpjy_save_teams_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                                            <input type="hidden" name="action" value="btpjy_save_teams_action">
                                            <div class="row justify-content-center">
                                                <div class="col-xl-9">
                                                    <!--begin::Wizard Step 1-->
                                                    <div class="my-5 step" id="member-fields-panel-one" data-wizard-type="step-content" data-wizard-state="current">
                                                        <h5 class="text-dark font-weight-bold mb-10"><?php esc_html_e( 'User\'s Profile Details:', 'projectify' ); ?></h5>
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Title', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <input class="form-control form-control-solid form-control-lg" name="title" placeholder="<?php esc_attr_e( 'Enter title for team' ); ?>" type="text">
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Description', 'projectify' ); ?></label>
                                                            <div class="col-lg-9 col-xl-9">
                                                                <textarea class="form-control form-control-solid form-control-lg" name="description" placeholder="<?php esc_attr_e( 'Enter description for team' ); ?>"></textarea>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Select Team Member\'s', 'projectify' ); ?></label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <?php $users_list = btpjy_Helper::btpjy_get_members(); ?>
                                                                <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="user_ids[]" multiple="multiple">
                                                                    <option value=""><?php esc_html_e( 'Select team member\'s...', 'projectify' ); ?></option>
                                                                    <?php 
                                                                    if ( ! empty( $users_list ) )  { 
                                                                        foreach ( $users_list as $key => $user ) { 
                                                                    ?>
                                                                       <option value="<?php echo esc_attr( $user->user_id ); ?>">
                                                                           <?php echo esc_html( $user->name ); ?>
                                                                       </option>
                                                                    <?php } } ?>
                                                                </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Select Team Leader', 'projectify' ); ?></label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <?php $users_list = btpjy_Helper::btpjy_get_members(); ?>
                                                                <select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="leader">
                                                                    <option value=""><?php esc_html_e( 'Select team member\'s...', 'projectify' ); ?></option>
                                                                    <?php 
                                                                    if ( ! empty( $users_list ) )  { 
                                                                        foreach ( $users_list as $key => $user ) { 
                                                                    ?>
                                                                       <option value="<?php echo esc_attr( $user->user_id ); ?>">
                                                                           <?php echo esc_html( $user->name ); ?>
                                                                       </option>
                                                                    <?php } } ?>
                                                                </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <div class="form-group row fv-plugins-icon-container">
                                                            <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Status', 'projectify' ); ?></label>
                                                            <div class="col-xl-9 col-lg-9">
                                                                <select class="form-control form-control-lg form-control-solid" name="status">
                                                                    <option value="active"><?php esc_html_e( 'Active', 'projectify' ); ?></option>
                                                                    <option value="inactive"><?php esc_html_e( 'Inactive', 'projectify' ); ?></option>
                                                                </select>
                                                                <div class="fv-plugins-message-container"></div>
                                                            </div>
                                                        </div>
                                                        <!--end::Group-->
                                                        <!--begin::Wizard Actions-->
                                                        <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                            <div>
                                                                <button type="submit" class="btn btn-success font-weight-bolder px-10 py-3" id="AddTeamsBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?>
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