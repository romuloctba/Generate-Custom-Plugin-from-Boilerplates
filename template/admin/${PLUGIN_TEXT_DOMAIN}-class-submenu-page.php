<?php
/**
 * Creates the submenu
 *
 * @package ${PLUGIN_NAME}
 */

/**
 * Creates the submenu
 * @package ${PLUGIN_NAME}
 */
class ${PLUGIN_CLASS_NAME}_Submenu_Page {

	private $deserializer;

	public function __construct( $deserializer ) {
		$this->deserializer = $deserializer;
	}

	/**
	 * Renders the contents
	 */
	public function render() {
		include_once( 'views/${PLUGIN_TEXT_DOMAIN}_admin.php' );
	}
}