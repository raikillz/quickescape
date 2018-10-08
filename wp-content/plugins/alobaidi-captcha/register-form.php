<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if( !get_option('alobaidi_captcha_dis_register_form') ){


// Add captcha field to register form
function Alobaidi_Captcha_Register_Field(){

	ob_start();
	$_SESSION['alobaidi_captcha_register_n1'] = rand(99,999);
	$_SESSION['alobaidi_captcha_register_n2'] = rand(1,4);
	
	if( get_option('alobaidi_captcha_question_txt') ){
		$space = ' ';
	}else{
		$space = null;
	}
	
	$question_translate = get_option('alobaidi_captcha_question_txt');
	$question = $question_translate.$space.$_SESSION['alobaidi_captcha_register_n1'].' + '.$_SESSION['alobaidi_captcha_register_n2'];
	
	?>
    	<p><label for="alobaidi-captcha-field"><?php echo $question; ?><br><input id="alobaidi-captcha-field" type="text" value="" name="alobaidi_captcha_register" class="alobaidi-captcha-field"></label></p>
    <?php
	
	echo ob_get_clean();

}
add_action( 'register_form', 'Alobaidi_Captcha_Register_Field' );


// Auth captcha
function Alobaidi_Captcha_Register_Auth( $errors ){
	
	if( empty($_POST['alobaidi_captcha_register']) ){
		
		if( get_option('alobaidi_captcha_empty_txt') ){
			$empty = get_option('alobaidi_captcha_empty_txt');
		}else{
			$empty = 'Please enter the total.';
		}
		
		wp_die( $empty );
		
	}
	
	else{
		
		$total = $_SESSION['alobaidi_captcha_register_n1'] + $_SESSION['alobaidi_captcha_register_n2'];
			
		if( $_POST['alobaidi_captcha_register'] == $total ){
			return $errors;
			unset($_SESSION['alobaidi_captcha_register_n1']);
			unset($_SESSION['alobaidi_captcha_register_n2']);
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
add_filter( 'registration_errors', 'Alobaidi_Captcha_Register_Auth', 10, 3 );


}