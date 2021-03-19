<?php
/**
 * Activate Class
 *
 * @package FirstPlugin
 */

namespace firstplugin\includes;

defined( 'ABSPATH' ) || die( 'Access Denied' );

/**
 * Activate Class
 */
class Activate {

	/***
	 * Constructor
	 */
	public function __construct() {
		register_activation_hook( FP_PLUGIN_FILE, array( $this, 'fp_register_activation_hook' ) );
	}

	/**
	 * Register Activation
	 */
	public function fp_register_activation_hook() {
		global $wpdb;
		$prefix  = $wpdb->prefix;
		$collate = $wpdb->get_charset_collate();
		$sql     = "
            CREATE TABLE  `{$prefix}first_plugin_max_adds` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT, 
                `user_id` int(11) DEFAULT NULL, 
                `Title` VARCHAR(200) DEFAULT NULL, 
                `Image` VARCHAR(1000) DEFAULT NULL,
                PRIMARY KEY (`id`)
                ) {$collate};
        ";
		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}
}