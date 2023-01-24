<?php
defined('ABSPATH') or wp_die();

$btpjy_settings = get_option( 'btpjy_settings' );
$company_name   = isset( $btpjy_settings['company_name'] ) ? sanitize_text_field( $btpjy_settings['company_name'] ) : '';
$company_logo   = isset( $btpjy_settings['company_logo'] ) ? sanitize_text_field( $btpjy_settings['company_logo'] ) : '';
$date_format    = isset( $btpjy_settings['date_format'] ) ? sanitize_text_field( $btpjy_settings['date_format'] ) : 'F j Y';
$time_format    = isset( $btpjy_settings['time_format'] ) ? sanitize_text_field( $btpjy_settings['time_format'] ) : 'g:i A';
$cur_symbol     = isset( $btpjy_settings['cur_symbol'] ) ? sanitize_text_field( $btpjy_settings['cur_symbol'] ) : '₹';
$cur_position   = isset( $btpjy_settings['cur_position'] ) ? sanitize_text_field( $btpjy_settings['cur_position'] ) : 'Right';
$client_login_a = isset( $btpjy_settings['client_login_a'] ) ? sanitize_text_field( $btpjy_settings['client_login_a'] ) : 'yes';
$client_login_d = isset( $btpjy_settings['client_login_d'] ) ? sanitize_text_field( $btpjy_settings['client_login_d'] ) : 'yes';
$client_access  = isset( $btpjy_settings['client_access'] ) ? sanitize_text_field( $btpjy_settings['client_access'] ) : 'yes';

?>
<form class="form-sample" id="GeneralSettingForm" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
  	<?php $nonce = wp_create_nonce('btpjy_save_settings'); ?>
  	<input type="hidden" name="btpjy_setting_options" value="<?php echo esc_attr( $nonce ); ?>">
  	<input type="hidden" name="action" value="btpjy_settings">
  	<div class="card-body">
  		<div class="form-group row">
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Company Name:', 'projectify' ); ?></label>
				<input type="text" class="form-control" name="company_name" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $company_name ) ); ?>">
				<span class="form-text text-muted"><?php esc_html_e( 'Please enter your company name', 'projectify' ); ?></span>
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Company logo:', 'projectify' ); ?></label>
				<div class="input-group">
					<input type="text" class="form-control" name="company_logo" id="company_logo" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $company_logo ) ); ?>">
					<div class="input-group-append">
						<button class="btn btn-primary upload-logo-btn" type="button"><?php esc_html_e( 'Upload', 'projectify' ); ?></button>
					</div>
				</div>
				<span class="form-text text-muted"><?php esc_html_e( 'Upload your company logo here.', 'projectify' ); ?></span>
			</div>
		</div>
  		<div class="form-group row">
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Date format:', 'projectify' ); ?></label>
				<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="date_format">
                    <option value="F j Y" <?php selected( $date_format, 'F j Y' ); ?>><?php echo esc_html( date('F j Y' ) . ' ( F j Y ) ' ); ?></option>
		            <option value="Y-m-d" <?php selected( $date_format, 'Y-m-d' ); ?>><?php echo esc_html( date('Y-m-d' ) . ' ( YYYY-MM-DD )' ); ?></option>
		            <option value="m/d/Y" <?php selected( $date_format, 'm/d/Y' ); ?>><?php echo esc_html( date('m/d/Y' ) . ' ( MM/DD/YYYY )' ); ?></option>
		            <option value="d-m-Y" <?php selected( $date_format, 'd-m-Y' ); ?>><?php echo esc_html( date('d-m-Y' ) . ' ( DD-MM-YYYY )' ); ?></option>
		            <option value="m-d-Y" <?php selected( $date_format, 'm-d-Y' ); ?>><?php echo esc_html( date('m-d-Y' ) . ' ( MM-DD-YYYY )' ); ?></option>
		            <option value="jS F Y" <?php selected( $date_format, 'jS F Y' ); ?>><?php echo esc_html( date('jS F Y' ) . ' ( d M YYYY )' ); ?></option>
                </select>
				<span class="form-text text-muted"><?php esc_html_e( 'Please select date format', 'projectify' ); ?></span>
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Time format:', 'projectify' ); ?></label>
				<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="time_format">
                    <option value="g:i a" <?php selected( $time_format, 'g:i a' ); ?>><?php echo esc_html( date( 'g:i a' ) . ' (  g:i a  )' ); ?></option>
		            <option value="g:i A" <?php selected( $time_format, 'g:i A' ); ?>><?php echo esc_html( date( 'g:i A' ) . ' (  g:i A  )' ); ?></option>
		            <option value="H:i" <?php selected( $time_format, 'H:i' ); ?>><?php echo esc_html( date( 'H:i' ) . ' (  H:i  )' ); ?></option>
		            <option value="H:i:s" <?php selected( $time_format, 'H:i:s' ); ?>><?php echo esc_html( date( 'H:i:s' ) . ' (  H:i:s  )' ); ?></option>
                </select>
				<span class="form-text text-muted"><?php esc_html_e( 'Please select time format', 'projectify' ); ?></span>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Currency Symbol:', 'projectify' ); ?></label>
				<input type="text" class="form-control" placeholder="<?php esc_attr_e( '$', 'projectify' ); ?>" name="cur_symbol" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $cur_symbol ) ); ?>">
				<span class="form-text text-muted"><?php esc_html_e( 'Please enter your currency symbol here', 'projectify' ); ?></span>
			</div>
			<div class="col-lg-6">
				<label><?php esc_html_e( 'Currency Position:', 'projectify' ); ?></label>
				<select class="form-control form-control-lg form-control-solid selectpicker" data-live-search="true" name="cur_position">
                    <option value="Right" <?php selected( $cur_position, 'Right' ); ?>><?php esc_html_e( 'Right', 'projectify' ); ?></option>
            		<option value="Left" <?php selected( $cur_position, 'Left' ); ?>><?php esc_html_e( 'Left', 'projectify' ); ?></option>
                </select>
				<span class="form-text text-muted"><?php esc_html_e( 'Please select currency position', 'projectify' ); ?></span>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-12">
				<button type="submit" class="btn btn-success font-weight-bolder px-10 py-3" id="GeneralSettingBtn"><?php esc_html_e( 'Save changes', 'projectify' ); ?>
					<span class="svg-icon svg-icon-md ml-3">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002)"></path>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </button>
			</div>
		</div>
	</div>
</form>