<?php 
	/**
	 * Plugin Name: First Plugin
	 * 
	 * Other header tag research on self.
	 */


	defined('ABSPATH') || die ('Access Denied');


	// Define FP_PLUGIN_FILE.
	if ( ! defined( 'FP_PLUGIN_FILE' ) ) {
		define( 'FP_PLUGIN_PATH', plugin_dir_path(__FILE__));
		define( 'FP_PLUGIN_FILE', __FILE__ );
		define( 'FP_PLUGIN_URL',plugin_dir_url( __FILE__ ) );
	}

	include ( FP_PLUGIN_PATH. '/includes/activate.php' );
	include ( FP_PLUGIN_PATH. '/includes/max_adds_post.php' );
	include ( FP_PLUGIN_PATH. '/includes/metaboxes.php' );


	add_action('wp_enqueue_scripts', 'fp_wp_enqueue_scripts');

	function fp_wp_enqueue_scripts() {
		wp_enqueue_style('fp_styles', FP_PLUGIN_URL.'assets/css/style.css');
		wp_enqueue_script('fp_scripes', FP_PLUGIN_URL.'assets/js/custom.js', array(), '1.0.0', true);
	}


