<div class="wrap">
 
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
 
    <form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
 
        <div id="universal-message-container">
            <h2>${PLUGIN_NAME} Admin</h2>
 
            <div class="options">
            <p>
                <label>Custom Field</label>
                <br />
                <input type="text" name="acme-message"
                value="<?php echo esc_attr( $this->deserializer->get_value( '${PLUGIN_TEXT_DOMAIN}-custom-data' ) ); ?>"
                />
            </p>
        </div><!-- #universal-message-container -->
 
        <?php
            wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
            submit_button();
        ?>
 
    </form>
 
</div><!-- .wrap -->