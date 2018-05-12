<?php
add_action('admin_menu', '${PLUGIN_TEXT_DOMAIN}_add_menu_pages');

function ${PLUGIN_TEXT_DOMAIN}_add_menu_pages() {
    // Add a new submenu under Settings:
    add_options_page(
        __('${PLUGIN_NAME}','${PLUGIN_TEXT_DOMAIN}'),
        __('Configurar ${PLUGIN_NAME}','${PLUGIN_TEXT_DOMAIN}'), 
        'manage_options', 
        '${PLUGIN_TEXT_DOMAIN}-settings', 
        '${PLUGIN_TEXT_DOMAIN}_settings_page'
    );
}

function ${PLUGIN_TEXT_DOMAIN}_settings_page () {
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $opt_name = 'mt_favorite_color';
    $hidden_field_name = 'mt_submit_hidden';
    $data_field_name = 'mt_favorite_color';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        $opt_val = $_POST[ $data_field_name ];
        update_option( $opt_name, $opt_val );
    ?>
    <div class="updated">
        <p>
            <strong><?php _e('settings saved.', 'menu-test' ); ?></strong>
        </p>
    </div>
    
    <?php
    } // if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        echo '<div class="wrap">';
        echo "<h2>" . __( '${PLUGIN_NAME} Settings', 'menu-test' ) . "</h2>";
    ?>

    <form name="form1" method="post" action="">
    <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
    <p><?php _e("Favorite Color:", 'menu-test' ); ?> 
    <input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
    </p><hr />

    <p class="submit">
    <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>

    </form>
    </div>

    <?php
}
