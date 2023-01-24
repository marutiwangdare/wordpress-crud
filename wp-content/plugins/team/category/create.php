<?php

function sinetiks_schools_create()
{
    if (isset($_POST['insert'])) {

        $id = $_POST["id"];
        $name = $_POST["name"];
        //insert
        if (isset($_POST['insert'])) {
            global $wpdb;
            $table_name = $wpdb->prefix . "school";

            $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'name' => $name), //data
                array('%s', '%s') //data format			
            );
            $message .= "School inserted";
        }
    }
?>
    <div class="wrap">
        <h2>Add New School</h2>
        <?php if (isset($message)) : ?><div class="updated">
                <p><?php echo $message; ?></p>
            </div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Three capital letters for the ID</p>
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id"  class="ss-field-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">School</th>
                    <td><input type="text" name="name"  class="ss-field-width" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
<?php
}
