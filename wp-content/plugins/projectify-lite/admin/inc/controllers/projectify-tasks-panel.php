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
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/tasks/add.php';
                } elseif ( $action == 'edit' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/tasks/edit.php';
                } elseif ( $action == 'view' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/tasks/task.php';
                } elseif ( $action == 'subtask' ) {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/subtasks/subtask.php';
                } else {
                    require_once BTPJL_PLUGIN_DIR_PATH . '/admin/inc/views/tasks/view.php';
                }
            ?>
        </div>
    </div>
</div>