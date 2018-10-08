<?php
/*
Plugin Name: Visitors Traffic Real Time Statistics Free
Description: Hits counter that shows analytical numbers of your WordPress site visitors and hits. <a href="admin.php?page=ahc_hits_counter_menu">Dashboard</a> | <a href="http://www.wp-buy.com/product/visitors-traffic-real-time-statistics-pro">Upgrade to pro.</a> 
Author: wp-buy
Author URI: https://www.wp-buy.com/
Version: 1.8

*/

//date_default_timezone_set(date_default_timezone_get());

	


define('AHCFREE_PLUGIN_MAIN_FILE', __FILE__);
define('AHCFREE_PLUGIN_ROOT_DIR', dirname(__FILE__));

require_once(AHCFREE_PLUGIN_ROOT_DIR. "/functions.php");
require_once(AHCFREE_PLUGIN_ROOT_DIR."/init.php");

if( !function_exists('get_plugin_data') ){
	include_once( ABSPATH. 'wp-admin/includes/plugin.php' );
}

if ( function_exists('get_plugin_data') ) {
	$woodhl_detail = get_plugin_data( __FILE__ );
	$installed_version = get_option( 'visitors-traffic-real-time-statistics-free-version' );
	if( $installed_version != $woodhl_detail['Version'] ){
		add_action( 'plugins_loaded', 'ahcfix_init' );
		update_option( 'visitors-traffic-real-time-statistics-free-version', $woodhl_detail['Version'] );
	}
}




function ahcfree_HideMessageAjaxFunction()
	{  
		add_option( 'ahcfree_upgrade_message','yes');
	}  

	
function ahcfree_after_plugin_row($plugin_file, $plugin_data, $status) {
	        
			if(get_option('ahcfree_upgrade_message') !='yes')
			{
				$class_name = $plugin_data['slug'];
				
		        echo '<tr id="' .$class_name. '-plugin-update-tr" class="plugin-update-tr active">';
		        echo '<td  colspan="3" class="plugin-update">';
		        echo '<div id="' .$class_name. '-upgradeMsg" class="update-message notice inline notice-warning notice-alt"  >';

				echo 'You are running visitors traffic free. To get more features, you can <a href="https://www.wp-buy.com/product/visitors-traffic-real-time-statistics-pro/" target="_blank"><strong>upgrade now</strong></a> or ';
				        
				echo '<span id="HideMe" style="cursor:pointer" ><a href="javascript:void(0)"><strong>dismiss</strong></a> this message</span>';
		        echo '</div>';
		        echo '</td>';
		        echo '</tr>';
		        
		        ?>
		        
		        <script type="text/javascript">
			    jQuery(document).ready(function() {
				    var row = jQuery('#<?php echo $class_name;?>-plugin-update-tr').closest('tr').prev();
				    jQuery(row).addClass('update');
					
					jQuery("#HideMe").click(function(){ 
					  jQuery.ajax({  
							type: 'POST',  
							url: '<?php echo admin_url();?>/admin-ajax.php',  
							data: {  
								action: 'ahcfree_HideMessageAjaxFunction'
							},  
							success: function(data, textStatus, XMLHttpRequest){  
								
								jQuery("#<?php echo $class_name;?>-upgradeMsg").hide();  
								  
							},  
							error: function(MLHttpRequest, textStatus, errorThrown){  
								alert(errorThrown);  
							}  
						});  
				  });
  
			    });
			    </script>
		        
		        <?php
			}
	    }
$path = plugin_basename( __FILE__ );		
add_action("after_plugin_row_{$path}", 'ahcfree_after_plugin_row', 10, 3);
add_action( 'wp_ajax_nopriv_ahcfree_HideMessageAjaxFunction', 'ahcfree_HideMessageAjaxFunction' );  
add_action( 'wp_ajax_ahcfree_HideMessageAjaxFunction', 'ahcfree_HideMessageAjaxFunction' ); 

if(ahcfree_GetWPTimezoneString() !='')
date_default_timezone_set(ahcfree_GetWPTimezoneString());

//--------------------------------------------
?>