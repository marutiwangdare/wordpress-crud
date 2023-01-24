<div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?php esc_html_e( 'Teams', 'projectify' ); ?></h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Dropdown-->
                <a href="<?php echo esc_url( add_query_arg( 'action', 'add', admin_url( 'admin.php?page=projectify-pro-teams' ) ) ); ?>" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                    <i class="fas fa-users"></i><?php esc_html_e( 'New Team', 'projectify' ); ?></a>
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
                    $btpjy_get_teams = btpjy_Helper::btpjy_get_teams();
                    $btpjy_get_teams = array_reverse( $btpjy_get_teams );
                    foreach ( $btpjy_get_teams as $tkey => $team ) {
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
                                            <li class="navi-separator mt-3 opacity-70"></li>
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'view',
                                                'row_id'  => $team->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-teams' ) ) ); ?>" class="navi-link">
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
                                                    <span class="navi-text"><?php esc_html_e( 'View', 'projectify' ); ?></span>
                                                </a>
                                            </li>
                                            <li class="navi-item">
                                                <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'edit',
                                                'row_id'  => $team->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-teams' ) ) ); ?>" class="navi-link">
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
                                                <a href="#" class="navi-link  delete-entities" data-table="btpjy_teams" data-id="<?php echo esc_attr( $team->id ); ?>">
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

                            <div class="d-flex align-items-end py-2">
                                <!--begin::Pic-->
                                <div class="d-flex align-items-center">
                                    <?php 
                                        $class_arr = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
                                        shuffle( $class_arr );
                                    ?>
                                    <!--begin::Pic-->
                                    <div class="d-flex flex-shrink-0 mr-5">
                                        <div class="symbol symbol-lg-75 symbol-circle <?php echo esc_attr( $class_arr[0] ); ?>">
                                            <span class="symbol-label font-size-h3 font-weight-boldest"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $team->name ) ); ?></span>
                                        </div>
                                    </div>
                                    <!--end::Pic-->
                                    <!--begin::Title-->
                                    <div class="d-flex flex-column">
                                        <a href="<?php echo esc_url( 
                                                add_query_arg( 
                                                array(
                                                'action'  => 'view',
                                                'row_id'  => $team->id,
                                                ), admin_url( 'admin.php?page=projectify-pro-teams' ) ) ); ?>" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0"><?php echo esc_html( $team->name ); ?></a>
                                    </div>
                                    <!--end::Title-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <div class="pt-7">
                                <!--begin::Subtitle-->
                                <span class="font-size-h6 text-muted text-hover-primary font-weight-bold pb-4 text-uppercase d-block"><?php esc_html_e( 'Team Leader', 'projectify' ); ?></span>
                                <!--end::Subtitle-->
                                <!--begin::Symbols-->
                                <div class="d-flex align-items-center">
                                    <?php 
                                        $class_arr = array( 'symbol-light-success', 'symbol-light-info', 'symbol-light-warning', 'symbol-light-danger', 'symbol-light-primary' );
                                        shuffle( $class_arr );
                                        $team_leader_data = btpjy_Helper::btpjy_member_info( $team->team_leader );
                                        if ( ! empty ( $team_leader_data ) ) {
                                            $first = $team_leader_data->first_name;
                                            $last  = $team_leader_data->last_name;
                                            $pic   = $team_leader_data->picture;
            
                                        if ( ! empty ( $pic ) ) { ?>
                                            <div class="symbol symbol-35 flex-shrink-0 mr-3">
                                                <img alt="Pic" src="<?php echo esc_attr( $pic ); ?>">
                                            </div>
                                        <?php } else { ?>
                                            <!--begin::Symbol-->
                                                <div class="symbol symbol-35 <?php echo esc_attr( $class_arr[0] ); ?> text-uppercase flex-shrink-0 mr-3">
                                                    <span class="symbol-label font-weight-bolder font-size-lg"><?php echo esc_html( btpjy_Helper::btpjy_get_initials( $first, $last ) ); ?></span>
                                                </div>
                                            <!--end::Symbol-->
                                        <?php } }
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="pt-7">
                                <!--begin::Subtitle-->
                                <span class="font-size-h6 text-muted text-hover-primary font-weight-bold pb-4 text-uppercase d-block"><?php esc_html_e( 'Memebrers', 'projectify' ); ?></span>
                                <!--end::Subtitle-->
                                <!--begin::Symbols-->
                                <div class="d-flex align-items-center">
                                    <?php
                                        $members = unserialize( $team->members );
                                        echo btpjy_Helper::btpjy_get_members_html( $members ); 
                                    ?>
                                </div>
                                <!--end::Symbols-->
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