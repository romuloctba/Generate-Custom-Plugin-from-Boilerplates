<?php
/**
 * Retrieves from the database.
 *
 * @package ${PLUGIN_CLASS_NAME}
 */

/**
 * @package ${PLUGIN_CLASS_NAME}
 */
class ${PLUGIN_CLASS_NAME}_Deserializer {

	/**
	 * Retrieves the value for specified key or empty string.
	 *
	 * @param  string $option_key The key
	 * @return string             The value or an empty string.
	 */
	public function get_value( $option_key ) {
		return get_option( $option_key, '' );
	}
}