<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* Uninstall Plugin */

// if not uninstalled plugin
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) 
	exit(); // out!


/*esle:
	if uninstalled plugin, this options will be deleted
*/
delete_option('alobaidi_captcha_dis_comment_form');
delete_option('alobaidi_captcha_user_logged');
delete_option('alobaidi_captcha_dis_login_form');
delete_option('alobaidi_captcha_dis_register_form');
delete_option('alobaidi_captcha_dis_restpassword_form');
delete_option('alobaidi_captcha_question_txt');
delete_option('alobaidi_captcha_empty_txt');
delete_option('alobaidi_captcha_error_txt');
delete_option('alobaidi_captcha_default_question');