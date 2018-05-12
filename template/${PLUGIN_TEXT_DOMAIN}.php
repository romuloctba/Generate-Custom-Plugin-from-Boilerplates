<?php
/**
 * Plugin Name: ${PLUGIN_NAME}
 * Version: 1.0.0
 * Plugin URI: ${PLUGIN_URL}
 * Description: ${PLUGIN_NAME}
 * Author: ${PLUGIN_AUTHOR}
 * Author URI: ${PLUGIN_URL}
 * Requires at least: 4.4.0
 * Tested up to: 4.6.0
 *
 * Text Domain: ${PLUGIN_TEXT_DOMAIN}
 * Domain Path: /languages
 *
 * @package WordPress
 * @author  ${PLUGIN_AUTHOR}
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if ( ! class_exists( '${PLUGIN_CLASS_NAME}' ) ) {

	/**
	 * Main Class.
	 */
	class ${PLUGIN_CLASS_NAME} {


		/**
		* Plugin version.
		*
		* @var string
		*/
		const VERSION = '1.0.0';


		/**
		 * Instance of this class.
		 *
		 * @var object
		 */
		protected static $instance = null;

		/**
		 * Return an instance of this class.
		 *
		 * @return object single instance of this class.
		 */
		public static function get_instance() {
			if ( null === self::$instance ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		private function __construct() {
			if ( ! class_exists( 'WooCommerce' ) ) {
				add_action( 'admin_notices', array( $this, 'fallback_notice' ) );
			} else {
				$this->load_plugin_textdomain();
				$this->includes();
			}
		}

		/**
		 * Method to includes our dependencies.
		 *
		 * @var string
		 */
		public function includes() {
			include_once 'includes/${PLUGIN_TEXT_DOMAIN}-functionality.php';
			include_once 'admin/${PLUGIN_TEXT_DOMAIN}-admin.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @access public
		 * @return bool
		 */
		public function load_plugin_textdomain() {
			$locale = apply_filters( 'wepb_plugin_locale', get_locale(), '${PLUGIN_TEXT_DOMAIN}' );

			//load_textdomain( '${PLUGIN_TEXT_DOMAIN}', trailingslashit( WP_LANG_DIR ) . '${PLUGIN_TEXT_DOMAIN}/${PLUGIN_TEXT_DOMAIN}' . '-' . $locale . '.mo' );

			//load_plugin_textdomain( '${PLUGIN_TEXT_DOMAIN}', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

			return true;
		}

		/**
		 * Fallback notice.
		 *
		 * We need some plugins to work, and if any isn't active we'll show you!
		 */
		public function fallback_notice() {
			echo '<div class="error">';
			echo '<p>' . __( '${PLUGIN_NAME}: Needs the WooCommerce Plugin activated.', '${PLUGIN_TEXT_DOMAIN}' ) . '</p>';
			echo '</div>';
		}
	}
}

/**
* Initialize the plugin.
*/
add_action( 'plugins_loaded', array( '${PLUGIN_CLASS_NAME}', 'get_instance' ) );
