<div class="content d-flex flex-column flex-column-fluid" id="btpjy_content">
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="btpjy_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5"><?php esc_html_e( 'Announcements', 'projectify' ); ?></h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Dropdown-->
                <a href="<?php echo esc_url( add_query_arg( 'action', 'add', admin_url( 'admin.php?page=projectify-pro-announcements' ) ) ); ?>" class="btn btn-fixed-height btn-primary font-weight-bolder font-size-sm px-5 my-1">
                    <i class="fa fa-user"></i><?php esc_html_e( 'Add New', 'projectify' ); ?></a>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
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
                        <h3 class="card-label"><?php esc_html_e( 'List', 'projectify' ); ?>
                        <span class="text-muted pt-2 font-size-sm d-block"><?php esc_html_e( 'All your announcements are listed here.', 'projectify' ); ?></span></h3>
                    </div>
                </div>
                <!--end::Header-->

                <div class="table-responsive">
                    <table id="members-listing" class="table">
                        <thead>
                            <tr>
                                <th><?php esc_html_e( 'S No. #', 'projectify' ); ?></th>
                                <th><?php esc_html_e( 'Announcement', 'projectify' ); ?></th>
                                <th><?php esc_html_e( 'Date', 'projectify' ); ?></th>
                                <th><?php esc_html_e( 'Actions', 'projectify' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $announce_list = btpjy_Helper::btpjy_get_announcements();
                                $announce_list = array_reverse( $announce_list );
                                $sno           = 1;
                                foreach ( $announce_list as $ckey => $announcement ) {
                            ?>
                            <tr>
                                <td><?php esc_html_e( $sno, 'projectify' ); ?></td>
                                <td><?php echo esc_html( $announcement->title, 'projectify' ); ?></td>
                                <td><?php echo esc_html( $announcement->date, 'projectify' ); ?></td>
                                <td nowrap="nowrap">
                                    <a href="<?php echo esc_url( 
                                        add_query_arg( 
                                        array(
                                        'action'  => 'view',
                                        'row_id'  => $announcement->id,
                                        ), admin_url( 'admin.php?page=projectify-pro-announcements' ) ) ); ?>" class="btn btn-sm btn-clean btn-icon" title="View details">
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
                                            'row_id'  => $announcement->id,
                                            ), admin_url( 'admin.php?page=projectify-pro-announcements' ) ) ); ?>" class="btn btn-sm btn-clean btn-icon" title="Edit details">
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
                                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon delete-entities" data-table="btpjy_announcements" data-id="<?php echo esc_attr( $announcement->id ); ?>" title="Delete">
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