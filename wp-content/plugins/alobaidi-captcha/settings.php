<?php

	defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	

	function Alobaidi_Captcha_Settings() {
		add_plugins_page( 'Alobaidi Captcha Settings', 'Alobaidi Captcha', 'manage_options', 'alobaidi_captcha_settings', 'Alobaidi_Captcha_Settings_Page');
	}
	add_action( 'admin_menu', 'Alobaidi_Captcha_Settings' );
	
	
	function Alobaidi_Captcha_register_settings() {
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_dis_comment_form' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_user_logged' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_dis_login_form' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_dis_register_form' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_dis_restpassword_form' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_question_txt' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_empty_txt' );
		register_setting( 'alobaidi_captcha_setting', 'alobaidi_captcha_error_txt' );
	}
	add_action( 'admin_init', 'Alobaidi_Captcha_register_settings' );
		
		
	function Alobaidi_Captcha_Settings_Page(){ // settings page function start
		?>
			<div class="wrap">
				<h2>Alobaidi Captcha Settings</h2>
                
				<?php if( isset($_GET['settings-updated']) && $_GET['settings-updated'] ){ ?>
					<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
						<p><strong>Settings saved.</strong></p>
                        <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
					</div>
				<?php } ?>
                
            	<form method="post" action="options.php">
                	<?php settings_fields( 'alobaidi_captcha_setting' ); ?>
                    
                    <h3>Comment Form Captcha</h3>
                	<table class="form-table">
                		<tbody>
                            
                            <tr>
                                <th scope="row"><label for="alobaidi_captcha_dis_comment_form">Disable Captcha</label></th>
                                <td>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>Comment Form</span></legend>
                                        <label for="alobaidi_captcha_dis_comment_form">
                                            <input name="alobaidi_captcha_dis_comment_form" type="checkbox" id="alobaidi_captcha_dis_comment_form" value="1" <?php checked( get_option('alobaidi_captcha_dis_comment_form'), 1, true ); ?>>Disable comment form captcha.
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><label for="alobaidi_captcha_user_logged">User Logged</label></th>
                                <td>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>User Logged</span></legend>
                                        <label for="alobaidi_captcha_user_logged">
                                            <input name="alobaidi_captcha_user_logged" type="checkbox" id="alobaidi_captcha_user_logged" value="1" <?php checked( get_option('alobaidi_captcha_user_logged'), 1, true ); ?>>Disable comment form captcha if user is logged.
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>
                            
                    	</tbody>
                    </table>
                    
                    <h3>User Forms Captcha</h3>
                    <table class="form-table">
                    	<tbody>
                        
                            <tr>
                                <th scope="row"><label for="alobaidi_captcha_dis_login_form">Login Form</label></th>
                                <td>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>Login Form</span></legend>
                                        <label for="alobaidi_captcha_dis_login_form">
                                            <input name="alobaidi_captcha_dis_login_form" type="checkbox" id="alobaidi_captcha_dis_login_form" value="1" <?php checked( get_option('alobaidi_captcha_dis_login_form'), 1, true ); ?>>Disable login form captcha.
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><label for="alobaidi_captcha_dis_register_form">Register Form</label></th>
                                <td>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>Register Form</span></legend>
                                        <label for="alobaidi_captcha_dis_register_form">
                                            <input name="alobaidi_captcha_dis_register_form" type="checkbox" id="alobaidi_captcha_dis_register_form" value="1" <?php checked( get_option('alobaidi_captcha_dis_register_form'), 1, true ); ?>>Disable register form captcha.
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><label for="alobaidi_captcha_dis_restpassword_form">Rest Password Form</label></th>
                                <td>
                                    <fieldset>
                                        <legend class="screen-reader-text"><span>Rest Password Form</span></legend>
                                        <label for="alobaidi_captcha_dis_restpassword_form">
                                            <input name="alobaidi_captcha_dis_restpassword_form" type="checkbox" id="alobaidi_captcha_dis_restpassword_form" value="1" <?php checked( get_option('alobaidi_captcha_dis_restpassword_form'), 1, true ); ?>>Disable rest password form captcha.
                                        </label>
                                    </fieldset>
                                </td>
                            </tr>
                        
                        </tbody>
                    </table>
                    
                    <h3>Texts Translate</h3>
                	<table class="form-table">
                		<tbody>
                        
                        	<?php
							
								$question = get_option('alobaidi_captcha_question_txt');
								
								if( get_option('alobaidi_captcha_empty_txt') ){
									$empty = get_option('alobaidi_captcha_empty_txt');
								}else{
									$empty = 'Please enter the total.';
								}
								
								if( get_option('alobaidi_captcha_error_txt') ){
									$error_message = get_option('alobaidi_captcha_error_txt');
								}else{
									$error_message = 'Please enter correct total.';
								}
								
							?>
                            
                    		<tr>
                        		<th scope="row"><label for="alobaidi_captcha_question_txt">Question</label></th>
                            	<td>
                                    <input class="regular-text" name="alobaidi_captcha_question_txt" type="text" id="alobaidi_captcha_question_txt" value="<?php echo esc_attr( $question ); ?>">
								</td>
                        	</tr>
                            
                    		<tr>
                        		<th scope="row"><label for="alobaidi_captcha_empty_txt">Error Message 1</label></th>
                            	<td>
                                    <input class="regular-text" name="alobaidi_captcha_empty_txt" type="text" id="alobaidi_captcha_empty_txt" value="<?php echo esc_attr( $empty ); ?>">
								</td>
                        	</tr>
                            
                    		<tr>
                        		<th scope="row"><label for="alobaidi_captcha_error_txt">Error Message 2</label></th>
                            	<td>
                                    <input class="regular-text" name="alobaidi_captcha_error_txt" type="text" id="alobaidi_captcha_error_txt" value="<?php echo esc_attr( $error_message ); ?>">
								</td>
                        	</tr>
                        
                    	</tbody>
                    </table>
                    
                    <p class="submit"><input id="submit" class="button button-primary" type="submit" name="submit" value="Save Changes"></p>
                </form>
                
            	<div class="tool-box">
					<h3 class="title">Recommended Links</h3>
					<p>Get collection of 88 WordPress themes for $89 only, a lot of features and free support! <a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=24967&url=19686&tid1=inside_plugin_settings" target="_blank">Get it now</a>.</p>
					<p>See also:</p>
						<ul>
							<li><a href="https://creativemarket.com/themes/wordpress?u=WPTime" target="_blank">Premium WordPress themes on CreativeMarket</a>.</li>
							<li><a href="https://www.bluehost.com/track/wptime" target="_blank">The best Web Hosting</a>.</li>
							<li><a href="https://www.siteground.com/go/wp_hosting_wptime_s_plugins" target="_blank">Managed WordPress Hosting</a>.</li>
						</ul>
					<p><a href="http://www.elegantthemes.com/affiliates/idevaffiliate.php?id=24967&url=19686&tid1=inside_plugin_settings" target="_blank"><img style="max-width:100% !important;" src="<?php echo plugins_url('/banner/elegantthemes.jpg', __FILE__); ?>"></a></p>
                <p><a href="https://www.bluehost.com/track/wptime" target="_blank"><img style="max-width:100% !important;" src="<?php echo plugins_url('/banner/bluehost.png', __FILE__); ?>"></a></p>
				</div>
                
            </div>
        <?php
	} // settings page function end