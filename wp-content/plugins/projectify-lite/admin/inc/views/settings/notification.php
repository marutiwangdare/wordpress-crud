<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';

$btpjy_email      = get_option( 'btpjy_email_settings' );
$email_enable    = isset( $btpjy_email['email_enable'] ) ? sanitize_text_field( $btpjy_email['email_enable'] ) : '';
$email_from      = isset( $btpjy_email['email_from'] ) ? sanitize_text_field( $btpjy_email['email_from'] ) : '';
$from_name       = isset( $btpjy_email['from_name'] ) ? sanitize_text_field( $btpjy_email['from_name'] ) : '';
$footer_txt      = isset( $btpjy_email['footer_txt'] ) ? wp_kses_post( $btpjy_email['footer_txt'] ) : '';
?>
<form class="form-sample" id="btpjy-template-form" method="post" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>">
<?php $nonce = wp_create_nonce('btpjy_save_email_settings'); ?>
<input type="hidden" name="btpjy_save_email_settings_options" value="<?php echo esc_attr( $nonce ); ?>">
<input type="hidden" name="action" value="btpjy_email_settings">
    <div class="card-body">
        <h5 class="card-title sub-heading-title"><?php esc_html_e( 'Mail options', 'projectify' ); ?></h5>
        <?php
            if ( ! empty ( $email_enable ) && $email_enable == 'yes' ) {
                $classs = 'visible_row_api';
            }
        ?>
        <div class="form-group row fv-plugins-icon-container">
            <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Enable Email Notification', 'projectify' ); ?></label>
            <div class="col-xl-9 col-lg-9 col-form-label">
                <div class="checkbox-inline">
                    <label class="checkbox checkbox-success">
                    <input type="checkbox" name="email_enable" id="email_enable" value="yes" <?php if ( ! empty ( $email_enable ) && $email_enable == 'yes' ) { echo esc_attr( 'checked' ); } ?>>
                    <span></span><?php esc_html_e( 'Enable', 'projectify' ); ?></label>
                </div>
                <div class="fv-plugins-message-container"></div>
            </div>
        </div>
        <br>
    	<div class="email_hide_class <?php echo esc_attr( $classs ); ?>">
            <div class="form-group row">
                <div class="col-lg-6">
                    <label><?php esc_html_e( 'Envelope From Email Address:', 'projectify' ); ?></label>
                    <input type="text" class="form-control" name="email_from" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $email_from ) ); ?>">
                </div>
                <div class="col-lg-6">
                    <label><?php esc_html_e( 'Envelope From Name:', 'projectify' ); ?></label>
                    <input type="text" class="form-control" name="from_name" value="<?php echo esc_attr( btpjy_Helper::btpjy_value_check( $from_name ) ); ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <label><?php esc_html_e( 'Footer Text:', 'projectify' ); ?></label>
                    <?php   
                      wp_editor( $footer_txt, 'footer_txt', $settings = array( 'editor_height' => 100, 'media_buttons' => false, 'textarea_rows' => 10, 'drag_drop_upload' => true ) ); 
                    ?>
                </div>
            </div>
            <div class="form-group row fv-plugins-icon-container">
                <label class="col-form-label col-xl-3 col-lg-3"><?php esc_html_e( 'Enable Mail Notifications for:-', 'projectify' ); ?></label>
                <div class="col-xl-12 col-lg-12 col-form-label">
                    <div class="checkbox-inline">
                        <?php 
                            $email_notifications = btpjy_Helper::btpjy_get_email_notification_list();
                            foreach ( $email_notifications as $key => $value ) {
                        ?>
                        <label class="checkbox checkbox-success">
                        <input name="<?php echo esc_attr( $key ) ?>" type="checkbox" value="yes" <?php if ( isset( $btpjy_email[$key] ) && $btpjy_email[$key] == 'yes' ) { echo esc_attr( 'checked' ); } ?>>
                        <span></span><?php esc_html_e( $value, 'projectify' ); ?></label>
                        <?php } ?>
                    </div>
                <div class="fv-plugins-message-container"></div></div>
            </div>
        </div>
        <hr/>
    </div>
</form>