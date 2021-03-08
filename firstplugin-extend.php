 <?php 
/**
 * Plugin Name: First Plugin - Extend
 * 
 * Other header tag research on self.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function additional_greeting() {
	// echo '<pre>' . print_r( 'I am 24 years old web dude!!', true ) . '</pre>';
}
add_action( 'firstplugin_greeting_essays', 'additional_greeting' );


function additional_countries_list( $countries_list, $arg2, $arg3 ) {
	$new_countries = array_merge( $countries_list, array( 'America', 'Europe' ) );
}
add_filter( 'firstplugin_countries_list', 'additional_countries_list' , 10, 3);