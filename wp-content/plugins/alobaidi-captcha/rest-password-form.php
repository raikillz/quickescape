<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if( !get_option('alobaidi_captcha_dis_restpassword_form') ){


// Add captcha field to rest password form
function Alobaidi_Captcha_RestPassword_Field(){

	ob_start();
	$_SESSION['alobaidi_captcha_restpassword_n1'] = rand(99,999);
	$_SESSION['alobaidi_captcha_restpassword_n2'] = rand(1,4);
	
	if( get_option('alobaidi_captcha_question_txt') ){
		$space = ' ';
	}else{
		$space = null;
	}
	
	$question_translate = get_option('alobaidi_captcha_question_txt');
	$question = $question_translate.$space.$_SESSION['alobaidi_captcha_restpassword_n1'].' + '.$_SESSION['alobaidi_captcha_restpassword_n2'];
	
	?>
    	<p><label for="alobaidi-captcha-field"><?php echo $question; ?><br><input id="alobaidi-captcha-field" type="text" value="" name="alobaidi_captcha_restpassword" class="alobaidi-captcha-field"></label></p>
    <?php
	
	echo ob_get_clean();

}
add_action( 'lostpassword_form', 'Alobaidi_Captcha_RestPassword_Field' );


// Auth captcha
function Alobaidi_Captcha_RestPassword_Auth( $errors ){

	if( empty($_POST['alobaidi_captcha_restpassword']) ){
		
		if( get_option('alobaidi_captcha_empty_txt') ){
			$empty = get_option('alobaidi_captcha_empty_txt');
		}else{
			$empty = 'Please enter the total.';
		}
		
		wp_die( $empty );
		
	}
	
	else{
		
		$total = $_SESSION['alobaidi_captcha_restpassword_n1'] + $_SESSION['alobaidi_captcha_restpassword_n2'];
			
		if( $_POST['alobaidi_captcha_restpassword'] == $total ){
			return $errors;
			unset($_SESSION['alobaidi_captcha_restpassword_n1']);
			unset($_SESSION['alobaidi_captcha_restpassword_n2']);
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
add_action( 'lostpassword_post', 'Alobaidi_Captcha_RestPassword_Auth', 10, 2 );


}