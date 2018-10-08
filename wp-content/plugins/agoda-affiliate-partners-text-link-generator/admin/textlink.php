<?php

/*
Agoda Affiliate Partners Text Link Generator WordPress plugin, Copyright © 2017 Agoda Company Pte. Ltd. (Agoda.com)
Agoda Affiliate Partners Text Link Generator is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

http://www.gnu.org/licenses/gpl-2.0.html
You should have received a copy of the GNU General Public License along with this program; see also above URL; if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
*/
if ( ! defined( 'ABSPATH' ) ) exit; 

define("AGDTLWP_API_URL","https://sherpa.agoda.com/Wordpress/");

add_action('admin_head', 'agdtlwp_init_textlink_mce_button');
function agdtlwp_init_textlink_mce_button() {
  // Check if WYSIWYG is enabled
  if ( 'true' == get_user_option( 'rich_editing' ) ) {
	wp_register_style('agdtlwp_textlink', plugins_url('textlink-items/textlink.css',__FILE__ ));
	wp_enqueue_style('agdtlwp_textlink');
	wp_enqueue_script( 'agdtlwp_textlink_ajax', plugins_url('textlink-items/textlink-ajax.min.js',__FILE__ ), array('jquery'));
    wp_localize_script( 'agdtlwp_textlink_ajax', 'textlink_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    add_filter( 'mce_external_plugins', 'agdtlwp_create_textlink_tinymce_plugin' );
    add_filter( 'mce_buttons', 'agdtlwp_register_mce_button' );
  }
}

function agdtlwp_create_textlink_tinymce_plugin( $plugin_array ) {
  $plugin_array['agdtlwp_text_link_button'] = plugins_url('textlink-items/textlink.min.js',__FILE__);
  return $plugin_array;
}

function agdtlwp_register_mce_button( $buttons ) {
  array_push( $buttons, 'agdtlwp_text_link_button' );
  return $buttons;
}

add_action( 'wp_ajax_agdtlwp_textlink_save', 'agdtlwp_textlink_save' );
function agdtlwp_textlink_save() {
	global $wpdb;
	
	$rawcid = $_POST['cid'];
	$cid = 0;
	if(isset($rawcid) && !empty($rawcid)){
		$cid = intval(sanitize_text_field($rawcid));
	}
	$current_user_id = get_current_user_id();
	
	if($cid > 0){
		$table_name = $wpdb->prefix . 'agodapartnertextlink';
		$wpdb->query($wpdb->prepare("INSERT INTO $table_name (user_id,cid) VALUES ($current_user_id,$cid) ON DUPLICATE KEY UPDATE cid = %d",$cid));
		$cookie_name = "agoda_textlink_cid_cookie";
		$cookie_value = $cid;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}
	
	wp_die();
}

add_action( 'wp_ajax_agdtlwp_textlink_load', 'agdtlwp_textlink_load' );
function agdtlwp_textlink_load() {
	global $wpdb;
	$current_user_id = get_current_user_id();
	$table_name = $wpdb->prefix . 'agodapartnertextlink';
	$results = $wpdb->get_results(
		"SELECT cid FROM $table_name WHERE user_id = $current_user_id"
		);
	$resultarray = array();
	foreach($results as $item){
		$valid_item = intval($item);
		$resultarray[] = $valid_item;
	}
	echo json_encode($resultarray);
	wp_die();
}

add_action( 'wp_ajax_agdtlwp_textlink_track', 'agdtlwp_textlink_track' );
function agdtlwp_textlink_track() {
	$rawcid = $_POST['cid'];
	$cid = 0;
	if(isset($rawcid) && !empty($rawcid)){
		$cid = intval(sanitize_text_field($rawcid));
	}
	
	if($cid > 0){
	$url = AGDTLWP_API_URL.'SendTrafficMessage';
	$args = array(
            'body' => array(
				'cid' => $cid
            ),
        );
	echo wp_remote_retrieve_body(wp_remote_post($url,$args));
	}
	
	wp_die();
}

add_action( 'wp_ajax_agdtlwp_call_search_api', 'agdtlwp_call_search_api' );
function agdtlwp_call_search_api(){
	$raw_search_type =  $_GET['searchType'];
	$search_type = 'TextlinkCityArea';
	if(isset($search_type) && !empty($search_type)){
		$search_type = sanitize_text_field($raw_search_type);
	}
	
	$rawcid = $_GET['cid'];
	$cid = 0;
	if(isset($rawcid) && !empty($rawcid)){
		$cid = intval(sanitize_text_field($rawcid));
	}
	
	$raw_keyword  = $_GET['keyword'];
	$keyword = '';
	if(isset($raw_keyword) && !empty($raw_keyword)){
		$keyword = sanitize_text_field($raw_keyword);
	}
	
	$url = AGDTLWP_API_URL.'AutoSuggestion?cid='.$cid.'&keyword='.urlencode($keyword).'&locale=en-us&type='.$search_type;
	echo wp_remote_retrieve_body(wp_remote_get($url));
	wp_die();
}
?>