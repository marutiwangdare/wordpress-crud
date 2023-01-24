<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

$user_id = get_current_user_id();
$members = btpjy_Helper::btpjy_member_info( $user_id );

$communication = unserialize( $members->notification );
if ( count( $communication ) > '1' ) {
    $email_noti = $communication[0];
} else {
    $email_noti = '';
}
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
            <div class="content d-flex flex-column flex-column-fluid add-member-panel" id="btpjy_content">
            <!--begin::Subheader-->
            <div class="subheader py-2 py-lg-6 subheader-transparent" id="btpjy_subheader">
                <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <!--begin::Details-->
                    <div class="d-flex align-items-center flex-wrap mr-2">
                        <!--begin::Title-->
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"><?php esc_html_e( 'Your Profile Details', 'projectify' ); ?></h5>
                        <!--end::Title-->
                        <!--begin::Separator-->
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-300"></div>
                        <!--end::Separator-->
                        <!--begin::Search Form-->
                        <div class="d-flex align-items-center" id="btpjy_subheader_search">
                            <span class="text-dark-50 font-weight-bold" id="btpjy_subheader_total"><?php esc_html_e( 'Edit your profile details and save', 'projectify' ); ?></span>
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
                                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <div class="wizard-title"><?php esc_html_e( 'Profile', 'projectify' ); ?></div>
                                                    <div class="wizard-desc"><?php esc_html_e( 'User\'s Personal Information', 'projectify' ); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-step" id="wizard-step-two" data-wizard-type="step" data-wizard-state="pending">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon mr-4">
                                                    <span class="svg-icon svg-icon-xxl">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                                                <path d="M14.5,11 C15.0522847,11 15.5,11.4477153 15.5,12 L15.5,15 C15.5,15.5522847 15.0522847,16 14.5,16 L9.5,16 C8.94771525,16 8.5,15.5522847 8.5,15 L8.5,12 C8.5,11.4477153 8.94771525,11 9.5,11 L9.5,10.5 C9.5,9.11928813 10.6192881,8 12,8 C13.3807119,8 14.5,9.11928813 14.5,10.5 L14.5,11 Z M12,9 C11.1715729,9 10.5,9.67157288 10.5,10.5 L10.5,11 L13.5,11 L13.5,10.5 C13.5,9.67157288 12.8284271,9 12,9 Z" fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <div class="wizard-title"><?php esc_html_e( 'Account', 'projectify' ); ?></div>
                                                    <div class="wizard-desc"><?php esc_html_e( 'User\'s Account Details', 'projectify' ); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-step" id="wizard-step-three" data-wizard-type="step" data-wizard-state="pending">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon mr-4">
                                                    <span class="svg-icon svg-icon-xxl">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"></path>
                                                                <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747)" points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"></polygon>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <div class="wizard-title"><?php esc_html_e( 'Address', 'projectify' ); ?></div>
                                                    <div class="wizard-desc"><?php esc_html_e( 'User\'s Shipping Address', 'projectify' ); ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-step" id="wizard-step-four" data-wizard-type="step" data-wizard-state="pending">
                                            <div class="wizard-wrapper">
                                                <div class="wizard-icon mr-4">
                                                    <span class="svg-icon svg-icon-xxl">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000"></path>
                                                                <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1"></rect>
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <div class="wizard-label">
                                                    <div class="wizard-title"><?php esc_html_e( 'Submission', 'projectify' ); ?></div>
                                                    <div class="wizard-desc"><?php esc_html_e( 'Review and Submit', 'projectify' ); ?></div>
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
                                                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="EditMembersForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
                                                    <?php $nonce = wp_create_nonce( 'btpjy_edit_members' ); ?>
                                                    <input type="hidden" name="btpjy_edit_members_nounce" value="<?php echo esc_attr( $nonce ); ?>">
                                                    <input type="hidden" name="action" value="btpjy_edit_members_action">
                                                    <input type="hidden" name="user_id" value="<?php echo esc_attr( $user_id ); ?>">
                                                    <input type="hidden" name="id" value="<?php echo esc_attr( $members->id ); ?>">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-9">
                                                            <!--begin::Wizard Step 1-->
                                                            <div class="my-5 step" id="member-fields-panel-one" data-wizard-type="step-content" data-wizard-state="current">
                                                                <h5 class="text-dark font-weight-bold mb-10"><?php esc_html_e( 'User\'s Profile Details:', 'projectify' ); ?></h5>
                                                                <!--begin::Group-->
                                                                <div class="form-group row">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label text-left"><?php esc_html_e( 'Photo', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <div class="image-input image-input-outline" id="btpjy_user_add_avatar">
                                                                            <div class="image-input-wrapper" style="background-image:url('<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $members->picture ) ); ?>');"></div>
                                                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                                                <i class="fa fa-pen icon-sm text-muted upload-image-btn"></i>
                                                                                <input type="hidden" name="profile_avatar" id="profile_avatar" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $members->picture ) ); ?>">
                                                                                <input type="hidden" name="profile_avatar_remove">
                                                                            </label>
                                                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'First Name', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input class="form-control form-control-solid form-control-lg" name="firstname" type="text" placeholder="<?php esc_attr_e( 'First Name', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->first_name ) ); ?>">
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Last Name', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input class="form-control form-control-solid form-control-lg" name="lastname" type="text" placeholder="<?php esc_attr_e( 'Last Name', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->last_name ) ); ?>">
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Contact Phone', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <div class="input-group input-group-solid input-group-lg">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="fas fa-phone-alt"></i>
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="phone" placeholder="<?php esc_attr_e( 'Phone', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->phone ) ); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Email Address', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <div class="input-group input-group-solid input-group-lg">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="far fa-envelope"></i>
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="email" placeholder="<?php esc_attr_e( 'Your Email', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->email ) ); ?>">
                                                                        </div>
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Facebook ID', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <div class="input-group input-group-solid input-group-lg">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="fab fa-facebook-f"></i>
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="facebook" placeholder="<?php esc_attr_e( 'Your FB ID like:- 100063975758895', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->facebook ) ); ?>">
                                                                        </div>
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Skype ID', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <div class="input-group input-group-solid input-group-lg">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <i class="fab fa-skype"></i>
                                                                                </span>
                                                                            </div>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="skype" placeholder="<?php esc_attr_e( 'Your Skype ID like:- xiIh6C7CCziQ', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->skype ) ); ?>">
                                                                        </div>
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Wizard Actions-->
                                                                <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                                    <div>
                                                                        <button type="button" id="next-step-one" class="btn btn-primary font-weight-bolder px-10 py-3" data-wizard-type="action-next"><?php esc_html_e( 'Next', 'projectify' ); ?> 
                                                                        <span class="svg-icon svg-icon-md ml-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span></button>
                                                                    </div>
                                                                </div>
                                                                <!--end::Wizard Actions-->
                                                            </div>
                                                            <!--end::Wizard Step 1-->
                                                            <!--begin::Wizard Step 2-->
                                                            <div class="my-5 step" id="member-fields-panel-two" data-wizard-type="step-content" data-wizard-state="">
                                                                <h5 class="text-dark font-weight-bold mb-10 mt-5"><?php esc_html_e( 'User\'s Account Details', 'projectify' ); ?></h5>
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-xl-3 col-lg-3 col-form-label"><?php esc_html_e( 'Job Title', 'projectify' ); ?></label>
                                                                    <div class="col-lg-9 col-xl-9">
                                                                        <input class="form-control form-control-solid form-control-lg" name="designation" type="text" placeholder="<?php esc_attr_e( 'Designation', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->job_title ) ); ?>">
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Department', 'projectify' ); ?></label>
                                                                    <div class="col-xl-9 col-lg-9">
                                                                        <select class="form-control form-control-lg form-control-solid" name="department">
                                                                            <option value="<?php echo esc_attr( $members->department ); ?>">
                                                                                <?php echo esc_html( $members->department ); ?>
                                                                            </option>
                                                                        </select>
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Permission Level', 'projectify' ); ?></label>
                                                                    <div class="col-xl-9 col-lg-9">
                                                                        <select class="form-control form-control-lg form-control-solid" name="role">
                                                                            <option value="<?php echo esc_attr( $members->role ); ?>">
                                                                                <?php echo esc_html( $members->role ); ?>
                                                                            </option>
                                                                        </select>
                                                                        <div class="fv-plugins-message-container"></div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Communication', 'projectify' ); ?></label>
                                                                    <div class="col-xl-9 col-lg-9 col-form-label">
                                                                        <div class="checkbox-inline">
                                                                            <label class="checkbox">
                                                                            <input name="communication[]" type="checkbox" <?php checked( $email_noti, 'on' ); ?>>
                                                                            <span></span><?php esc_html_e( 'Email', 'projectify' ); ?></label>
                                                                        </div>
                                                                    <div class="fv-plugins-message-container"></div></div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <div class="form-group row fv-plugins-icon-container">
                                                                    <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Status', 'projectify' ); ?></label>
                                                                    <div class="col-xl-9 col-lg-9">
                                                                        <select class="form-control form-control-lg form-control-solid" name="status">
                                                                            <option value="<?php echo esc_attr( $members->status ); ?>">
                                                                                <?php echo esc_html( $members->status ); ?>
                                                                            </option>
                                                                        </select>
                                                                        <div class="fv-plugins-message-container"></div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Group-->
                                                                <!--begin::Wizard Actions-->
                                                                <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                                    <div class="mr-2">
                                                                        <button type="button" id="prev-step-two" class="btn btn-light-primary font-weight-bolder px-10 py-3" data-wizard-type="action-prev">
                                                                        <span class="svg-icon svg-icon-md mr-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                    <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span><?php esc_html_e( 'Previous', 'projectify' ); ?></button>
                                                                    </div>
                                                                    <div>
                                                                        <button type="button" id="next-step-two" class="btn btn-primary font-weight-bolder px-10 py-3" data-wizard-type="action-next"><?php esc_html_e( 'Next', 'projectify' ); ?> 
                                                                        <span class="svg-icon svg-icon-md ml-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span></button>
                                                                    </div>
                                                                </div>
                                                                <!--end::Wizard Actions-->
                                                            </div>
                                                            <!--end::Wizard Step 2-->
                                                            <!--begin::Wizard Step 3-->
                                                            <div class="my-5 step" id="member-fields-panel-three" data-wizard-type="step-content" data-wizard-state="">
                                                                <h5 class="mb-10 font-weight-bold text-dark"><?php esc_html_e( 'Setup Your Address', 'projectify' ); ?></h5>
                                                                <!--begin::Group-->
                                                                <div class="form-group fv-plugins-icon-container">
                                                                    <label><?php esc_html_e( 'Address Line 1', 'projectify' ); ?></label>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address1" placeholder="<?php esc_attr_e( 'Address Line 1', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->address1 ) ); ?>">
                                                                <div class="fv-plugins-message-container"></div></div>
                                                                <!--end::Group-->
                                                                <!--begin::Group-->
                                                                <div class="form-group">
                                                                    <label><?php esc_html_e( 'Address Line 2', 'projectify' ); ?></label>
                                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address2" placeholder="<?php esc_attr_e( 'Address Line 2', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->address2 ) ); ?>">
                                                                </div>
                                                                <!--begin::Row-->
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <!--begin::Group-->
                                                                        <div class="form-group fv-plugins-icon-container">
                                                                            <label><?php esc_html_e( 'Postcode', 'projectify' ); ?></label>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="postcode" placeholder="<?php esc_attr_e( 'Enter Postcode', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->postcode ) ); ?>">
                                                                        <div class="fv-plugins-message-container"></div></div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                    <!--begin::Group-->
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group fv-plugins-icon-container">
                                                                            <label><?php esc_html_e( 'City', 'projectify' ); ?></label>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="city" placeholder="<?php esc_attr_e( 'Enter City', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->city ) ); ?>">
                                                                        <div class="fv-plugins-message-container"></div></div>
                                                                    </div>
                                                                    <!--end::Group-->
                                                                </div>
                                                                <!--end::Row-->
                                                                <!--begin::Row-->
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <!--begin::Group-->
                                                                        <div class="form-group fv-plugins-icon-container">
                                                                            <label><?php esc_html_e( 'State', 'projectify' ); ?></label>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="state" placeholder="<?php esc_attr_e( 'Enter State', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->state ) ); ?>">
                                                                        <div class="fv-plugins-message-container"></div></div>
                                                                        <!--end::Group-->
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <!--begin::Group-->
                                                                        <div class="form-group fv-plugins-icon-container">
                                                                            <label><?php esc_html_e( 'Country', 'projectify' ); ?></label>
                                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="country" placeholder="<?php esc_attr_e( 'Enter Country', 'projectify' ); ?>" value="<?php echo esc_html( btpjy_Helper::btpjy_value_check( $members->country ) ); ?>">
                                                                        <div class="fv-plugins-message-container"></div></div>
                                                                        <!--end::Group-->
                                                                    </div>
                                                                </div>
                                                                <!--begin::Wizard Actions-->
                                                                <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                                    <div class="mr-2">
                                                                        <button type="button" id="prev-step-three" class="btn btn-light-primary font-weight-bolder px-10 py-3" data-wizard-type="action-prev">
                                                                        <span class="svg-icon svg-icon-md mr-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                    <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span><?php esc_html_e( 'Previous', 'projectify' ); ?></button>
                                                                    </div>
                                                                    <div>
                                                                        <button type="button" id="next-step-three" class="btn btn-primary font-weight-bolder px-10 py-3" data-wizard-type="action-next"><?php esc_html_e( 'Next', 'projectify' ); ?> 
                                                                        <span class="svg-icon svg-icon-md ml-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                    <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span></button>
                                                                    </div>
                                                                </div>
                                                                <!--end::Wizard Actions-->
                                                            </div>
                                                            <!--end::Wizard Step 3-->
                                                            <!--begin::Wizard Step 4-->
                                                            <div class="my-5 step" id="member-fields-panel-four" data-wizard-type="step-content" data-wizard-state="">
                                                                <h5 class="mb-10 font-weight-bold text-dark"><?php esc_html_e( 'Review User Details and Submit', 'projectify' ); ?></h5>
                                                                <!--begin::Item-->
                                                                <div class="border-bottom mb-5 pb-5">
                                                                    <div class="font-weight-bolder mb-3"><?php esc_html_e( 'To update your profile details just submit this form and its done.!!', 'projectify' ); ?></div>
                                                                </div>
                                                                <!--end::Item-->
                                                                <!--begin::Wizard Actions-->
                                                                <div class="d-flex justify-content-between border-top pt-10 mt-15">
                                                                    <div class="mr-2">
                                                                        <button type="button" id="prev-step-four" class="btn btn-light-primary font-weight-bolder px-10 py-3" data-wizard-type="action-prev">
                                                                        <span class="svg-icon svg-icon-md mr-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                    <path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)"></path>
                                                                                </g>
                                                                            </svg>
                                                                            <!--end::Svg Icon-->
                                                                        </span><?php esc_html_e( 'Previous', 'projectify' ); ?></button>
                                                                    </div>
                                                                    <div>
                                                                        <button type="submit" class="btn btn-success font-weight-bolder px-10 py-3" id="EditMembersBtn"><?php esc_html_e( 'Submit', 'projectify' ); ?>
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
                                                            <!--end::Wizard Step 4-->
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
        </div>
    </div>
</div>