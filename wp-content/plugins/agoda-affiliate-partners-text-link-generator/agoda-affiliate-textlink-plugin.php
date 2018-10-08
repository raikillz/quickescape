<?php
/*
Plugin Name: Agoda Affiliate Partners Text Link Generator
Description: This tool was built so that our affiliate partners can easily generate text links in Wordpress.
Version:     1.0
Author:      Agoda
Author URI: https://partners.agoda.com
Text Domain: Agoda Affiliate Partners Text Link Generator
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

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

if(is_admin()){
		require_once( dirname( __FILE__ ) . '/admin/textlink.php' );
}

register_activation_hook( __FILE__, 'agdtlwp_init_textlink_plugin' );
register_uninstall_hook( __FILE__, 'agdtlwp_remove_textlink_plugin' );

function agdtlwp_init_textlink_plugin() {
	agdtlwp_init_db();
}

function agdtlwp_remove_textlink_plugin() {
	$cookie_name = "agoda_textlink_cid_cookie";
	setcookie($cookie_name, '', time() - 3600, "/");
	agdtlwp_clear_db();
}

function agdtlwp_init_db(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'agodapartnertextlink';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		user_id int NOT NULL,
		cid int NOT NULL,
		PRIMARY KEY (user_id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

function agdtlwp_clear_db(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'agodapartnertextlink';
	$wpdb->query($wpdb->prepare("DROP TABLE $table_name"));
}

?>
