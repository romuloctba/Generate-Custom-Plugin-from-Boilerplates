<?php
/**
 * @package ${PLUGIN_NAME}
 */
 
class ${PLUGIN_CLASS_NAME}_Serializer {
 
    /**
    * Initializes at admin_post hook
    */
    public function init() {
        add_action( 'admin_post', array( $this, 'save' ) );
    }
 
    /**
     * Validates nonce value, verifies user role
     */
    public function save() {
 
        if ( ! ( $this->has_valid_nonce() && current_user_can( 'manage_options' ) ) ) {
            echo '<p>User has no Permissions</p>';
        }
 
        if ( null !== wp_unslash( $_POST['acme-message'] ) ) {
            $value = sanitize_text_field( $_POST['acme-message'] );
            update_option( '${PLUGIN_TEXT_DOMAIN}-custom-data', $value );
        }
        $this->redirect();
    }
 
    /**
     * Checks Nonce
     *
     * @access private
     *
     * @return boolean False field isn't set, or if nonce is invalid
     */
    private function has_valid_nonce() {
 
        if ( ! isset( $_POST['acme-custom-message'] ) ) {
            return false;
        }
 
        $field  = wp_unslash( $_POST['acme-custom-message'] );
        $action = 'acme-settings-save';
 
        return wp_verify_nonce( $field, $action );
 
    }
 
    /**
     * Redirect to previous page if referall is set.
     * Otherwise the login page.
     *
     * @access private
     */
    private function redirect() {
 
        if ( ! isset( $_POST['_wp_http_referer'] ) ) {
            $_POST['_wp_http_referer'] = wp_login_url();
        }
 
        $url = sanitize_text_field(
                wp_unslash( $_POST['_wp_http_referer'] )
            );
 
        wp_safe_redirect( urldecode( $url ) );
        exit;
    }
}