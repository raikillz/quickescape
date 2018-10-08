<?php
/*
Plugin Name: Alobaidi Captcha
Plugin URI: http://wp-plugins.in/Alobaidi_Captcha
Description: Add captcha to forms easily, comment form, login form, register form, rest password form, easy to use and translate ready, no spam comments with Alobaidi Captcha.
Version: 1.0.3
Author: Alobaidi
Author URI: http://wp-plugins.in
License: GPLv2 or later
*/

/*  Copyright 2015 Alobaidi (email: wp-plugins@outlook.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Add plugin meta links
function Alobaidi_Captcha_plugin_row_meta( $links, $file ) {

	if ( strpos( $file, 'alobaidi-captcha.php' ) !== false ) {
		
		$new_links = array(
						'<a href="http://wp-plugins.in/Alobaidi_Captcha" target="_blank">Explanation of Use</a>',
						'<a href="https://profiles.wordpress.org/alobaidi#content-plugins" target="_blank">More Plugins</a>',
						'<a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=24967&url=19686&tid1=inside_plugin_meta" target="_blank">Elegant Themes</a>',
						'<a href="https://www.bluehost.com/track/wptime" target="_blank">Bluehost</a>'
					);
		
		$links = array_merge( $links, $new_links );
		
	}
	
	return $links;
	
}
add_filter( 'plugin_row_meta', 'Alobaidi_Captcha_plugin_row_meta', 10, 2 );


// Add settings page link in before activate/deactivate links.
function Alobaidi_Captcha_plugin_action_links( $actions, $plugin_file ){
	
	static $plugin;

	if ( !isset($plugin) ){
		$plugin = plugin_basename(__FILE__);
	}
		
	if ($plugin == $plugin_file) {
		
		if ( is_ssl() ) {
			$settings_link = '<a href="'.admin_url( 'plugins.php?page=alobaidi_captcha_settings', 'https' ).'">Settings</a>';
		}else{
			$settings_link = '<a href="'.admin_url( 'plugins.php?page=alobaidi_captcha_settings', 'http' ).'">Settings</a>';
		}
		
		$settings = array($settings_link);
		
		$actions = array_merge($settings, $actions);
			
	}
	
	return $actions;
	
}
add_filter( 'plugin_action_links', 'Alobaidi_Captcha_plugin_action_links', 10, 5 );


// Register Alobaidi Captcha Session
function Register_Alobaidi_Captcha_Session(){

	if( !session_id() ){
		session_start();
	}

}
add_action('init', 'Register_Alobaidi_Captcha_Session', 1);


// Set default question
if( !get_option('alobaidi_captcha_default_question') ){
	update_option('alobaidi_captcha_question_txt', 'Enter total');
	update_option('alobaidi_captcha_default_question', 'true');
}


// Include files
include 'settings.php';
include 'comment-form.php';
include 'login-form.php';
include 'register-form.php';
include 'rest-password-form.php';