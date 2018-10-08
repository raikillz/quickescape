<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if( !get_option('alobaidi_captcha_dis_login_form') ){


// Add captcha field to login form
function Alobaidi_Captcha_Login_Field(){
	
	ob_start();
	$_SESSION['alobaidi_captcha_login_n1'] = rand(99,999);
	$_SESSION['alobaidi_captcha_login_n2'] = rand(1,4);
	
	if( get_option('alobaidi_captcha_question_txt') ){
		$space = ' ';
	}else{
		$space = null;
	}
	
	$question_translate = get_option('alobaidi_captcha_question_txt');
	$question = $question_translate.$space.$_SESSION['alobaidi_captcha_login_n1'].' + '.$_SESSION['alobaidi_captcha_login_n2'];
	
	?>
    	<p><label for="alobaidi-captcha-field"><?php echo $question; ?><br><input id="alobaidi-captcha-field" type="text" value="" name="alobaidi_captcha_login" class="alobaidi-captcha-field"></label></p>
    <?php
	
	echo ob_get_clean();
	
}
add_action( 'login_form', 'Alobaidi_Captcha_Login_Field' );


// Auth captcha
function Alobaidi_Captcha_Login_Auth( $user ){

	if( empty($_POST['alobaidi_captcha_login']) ){
		
		if( get_option('alobaidi_captcha_empty_txt') ){
			$empty = get_option('alobaidi_captcha_empty_txt');
		}else{
			$empty = 'Please enter the total.';
		}
		
		wp_die( $empty );
		
	}
	
	else{
		
		$total = $_SESSION['alobaidi_captcha_login_n1'] + $_SESSION['alobaidi_captcha_login_n2'];
			
		if( $_POST['alobaidi_captcha_login'] == $total ){
			return $user;
			unset($_SESSION['alobaidi_captcha_login_n1']);
			unset($_SESSION['alobaidi_captcha_login_n2']);
		}
		
		else{
			
			if( get_option('alobaidi_captcha_error_txt') ){
				$error_message = get_option('alobaidi_captcha_error_txt');
			}else{
				$error_message = 'Please enter correct total, if repeat it, go back and refresh the page.';
			}
			
			wp_die( $error_message );
			
		}
		
	}

}
add_filter( 'wp_authenticate_user', 'Alobaidi_Captcha_Login_Auth', 10, 2 );


}