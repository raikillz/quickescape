<?php
define('AHCFREE_DS', DIRECTORY_SEPARATOR);
define('AHCFREE_PLUGIN_SUPDIRE_FILE', dirname(__FILE__).'visitors-traffic-real-time-statistics.php');
require_once("settings.php");
require_once("WPHitsCounter.php");

register_activation_hook(AHCFREE_PLUGIN_MAIN_FILE, 'ahcfree_set_default_options');
register_deactivation_hook(AHCFREE_PLUGIN_MAIN_FILE, 'ahcfree_unset_default_options');


class Globalsahcfree{

	static $plugin_options = array();
	static $lang = NULL;
	static $post_type = NULL; // post | page | category
	static $page_id = NULL;
	static $page_title = NULL;
}

Globalsahcfree::$plugin_options = get_option('ahcfree_wp_hits_counter_options');
Globalsahcfree::$lang = 'en';


$ahcfree_get_save_settings = ahcfree_get_save_settings();

if($ahcfree_get_save_settings == false or empty($ahcfree_get_save_settings))
{
	ahcfree_add_settings();
}

if(isset($ahcfree_get_save_settings[0]))
{
$hits_days = $ahcfree_get_save_settings[0]->set_hits_days;
$ajax_check = ($ahcfree_get_save_settings[0]->set_ajax_check * 1000);
$set_ips = $ahcfree_get_save_settings[0]->set_ips;
$set_google_map = $ahcfree_get_save_settings[0]->set_google_map;
}else{
$hits_days = 14;
$ajax_check = 15;
$set_ips = '';
$set_google_map = 'today_visitors';
}

define('AHC_VISITORS_VISITS_LIMIT', $hits_days );
define('AHCFREE_AJAX_CHECK', $ajax_check);
define('EXCLUDE_IPS', $set_ips);
define('SET_GOOGLE_MAP', $set_google_map);



$admincore = '';
	if (isset($_GET['page'])) $admincore = $_GET['page'];
	if( is_admin() && $admincore == 'ahc_hits_counter_menu_free') 
	{
	add_action('admin_enqueue_scripts', 'ahcfree_include_scripts');
	}
	
//add_action('admin_bar_menu', 'ahcfree_vtrts_add_items',  90);
//$plugin = plugin_basename( __FILE__ );
//add_filter( "plugin_action_links_$plugin", 'ahcfree_vtrtsp_plugin_add_settings_link' );

//add_action('parse_request', 'ahcfree_track_visitor', 1);
add_action('admin_menu', 'ahcfree_create_admin_menu_link');
//add_shortcode('ahcfree_show_google_map', 'ahcfree_google_map' );
//[ahcfree_show_google_map map_status="online"]

add_action('wp_ajax_ahcfree_get_hits_by_custom_duration','ahcfree_get_hits_by_custom_duration_callback');

define('AHCFREE_SERVER_CURRENT_TIMEZONE','+00:00');
?>
