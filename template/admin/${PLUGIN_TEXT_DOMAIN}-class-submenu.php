<?php
/**
 * Creates the submenu item for the plugin.
 *
 * @package ${PLUGIN_NAME}
 */

/**
 * Creates the submenu item for the plugin.
 *
 * Registers a new menuunder 'Tools'
 * @package ${PLUGIN_NAME}
 */
class ${PLUGIN_CLASS_NAME}_Submenu {

	/**
	 * A reference the class responsible for rendering the submenu page.
	 *
	 * @var    ${PLUGIN_CLASS_NAME}_Submenu_Page
	 * @access private
	 */
	private $submenu_page;

	/**
	 * Initializes the partial classes.
	 *
	 * @param ${PLUGIN_CLASS_NAME}_Submenu_Page $submenu_page A reference that renders the page
	 */
	public function __construct( $submenu_page ) {
		$this->submenu_page = $submenu_page;
	}

	public function init() {
		add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}

	/**
	 * Creates the submenu
	 */
	public function add_options_page() {

		add_options_page(
			'${PLUGIN_NAME} Administration Page',
			'${PLUGIN_NAME} Administration',
			'manage_options',
			'${PLUGIN_TEXT_DOMAIN}',
			array( $this->submenu_page, 'render' )
		);
	}
}