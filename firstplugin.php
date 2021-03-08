<?php 
/**
 * Plugin Name: First Plugin
 * 
 * Other header tag research on self.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define FP_PLUGIN_FILE.
if ( ! defined( 'FP_PLUGIN_FILE' ) ) {
	define( 'FP_PLUGIN_FILE', __FILE__ );
}

// Defination to action hooks.
function greeting() {
	echo '<pre>' . print_r( 'Hi Milan', true ) . '</pre>';

	do_action( 'firstplugin_greeting_essays' );
}
// add_action( 'init', 'greeting' );



// Defination to filter hooks.
function countries_list() {
	$filter =  apply_filters( 'firstplugin_countries_list', array( 'Nepal', 'India', 'China' ), 'Milan', 'Malla' );
	// echo '<pre>' . print_r( $filter, true ) . '</pre>';


}
add_action( 'init', 'countries_list' );
