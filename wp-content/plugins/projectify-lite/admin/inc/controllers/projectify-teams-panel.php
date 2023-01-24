<?php
defined('ABSPATH') or wp_die();
require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/helpers/projectify-helpers.php';
$action = '';
if ( isset( $_GET['action'] ) ) {
    $action = sanitize_text_field( $_GET['action'] );
}
?>
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
        <div class="d-flex flex-column flex-row-fluid wrapper" id="btpjy_wrapper">
            <?php
                require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/nav/nav.php';

                if ( $action == 'add' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/teams/add.php';
                } elseif ( $action == 'edit' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/teams/edit.php';
                } elseif ( $action == 'view' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/teams/team.php';
                } else {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/teams/view.php';
                }
            ?>
        </div>
    </div>
</div>