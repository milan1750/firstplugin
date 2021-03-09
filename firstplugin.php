<?php 

	namespace firstplugin;
	use firstplugin\includes\FirstPlugin;

	/**
	 * Plugin Name:       First Plugin
	 * Plugin URI:        https://example.com/firstplugin
	 * Description:       Plugin for displaying custom adds on pages
	 * Version:           1.0.0
	 * Requires at least: 5.2
	 * Requires PHP:      7.2
	 * Author:            Milan Malla
	 * Author URI:        https://example.com
	 * Text Domain:       firstplugin
	 * License:           GPL v2 or later
	 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
	 */

	defined('ABSPATH') || exit;
	if ( ! defined( 'FP_PLUGIN_FILE' ) ) {
		define( 'FP_PLUGIN_FILE', __FILE__ );
	}

	if( ! defined( 'FP_PLUGIN_PATH' ) ) {
		define( 'FP_PLUGIN_PATH', plugin_dir_path(__FILE__) );
	}

	if( ! defined( 'FP_PLUGIN_URL' ) ) {
		define( 'FP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
	}

	include (FP_PLUGIN_PATH. 'includes/classfp.php');
	
	function fp() {
		return FirstPlugin::instance();
	}


	$GLOBALS['pf'] = fp();

