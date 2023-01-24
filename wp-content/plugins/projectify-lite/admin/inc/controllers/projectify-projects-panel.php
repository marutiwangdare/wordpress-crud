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
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/projects/add.php';
                } elseif ( $action == 'edit' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/projects/edit.php';
                } elseif ( $action == 'view' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/projects/projects.php';
                } elseif ( $action == 'bedit' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/bugs/edit.php';
                } elseif ( $action == 'bview' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/bugs/view.php';
                } else {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/projects/view.php';
                }
            ?>
        </div>
    </div>
</div>