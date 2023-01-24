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
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/members/add.php';
                } elseif ( $action == 'edit' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/members/edit.php';
                } elseif ( $action == 'profile' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/members/profile.php';
                } elseif ( $action == 'task' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/members/task.php';
                } elseif ( $action == 'project' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/members/project.php';
                } else {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/members/view.php';
                }
            ?>
        </div>
    </div>
</div>