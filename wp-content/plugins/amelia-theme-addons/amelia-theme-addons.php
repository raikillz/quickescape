<?php
/*
Plugin Name: Amelia Theme Addons
Plugin URI: https://themeforest.net/user/pixelshow
Description: Addons for admin panel and other extra theme features
Author: Pixelshow
Version: 1.0
Author URI: https://themeforest.net/user/pixelshow
Text Domain: amelia
License: General Public License
*/

/** 
* Author socials
*/
function pixelshow_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   =  esc_html__( 'Twitter Username', 'amelia' );
	$contactmethods['facebook']  = esc_html__( 'Facebook Username', 'amelia' );
	$contactmethods['google']    = esc_html__( 'Google Plus Username', 'amelia' );
	$contactmethods['tumblr']    = esc_html__( 'Tumblr Username', 'amelia' );
	$contactmethods['instagram'] = esc_html__( 'Instagram Username', 'amelia' );
	$contactmethods['pinterest'] = esc_html__( 'Pinterest Username', 'amelia' );

	return $contactmethods;
}
add_filter('user_contactmethods','pixelshow_contactmethods');