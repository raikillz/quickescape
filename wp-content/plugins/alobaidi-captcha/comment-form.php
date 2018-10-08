<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


if( !get_option('alobaidi_captcha_dis_comment_form') ){


// Add captcha field to comment form
function Alobaidi_Captcha_Comment_Field( $content ){
	
	if( get_option('alobaidi_captcha_user_logged') and is_user_logged_in() ){
		return $content;
		return false;
	}
	
	if( get_option('alobaidi_captcha_question_txt') ){
		$space = ' ';
	}else{
		$space = null;
	}
	
	$_SESSION['alobaidi_captcha_comment_n1'] = rand(99,999);
	$_SESSION['alobaidi_captcha_comment_n2'] = rand(1,4);
	
	$question_translate = get_option('alobaidi_captcha_question_txt');
	$question = $question_translate.$space.$_SESSION['alobaidi_captcha_comment_n1'].' + '.$_SESSION['alobaidi_captcha_comment_n2'];
	
	ob_start(); 
	?>
		<p class="alobaidi-captcha-comment"><label for="alobaidi-captcha-comment-field"><?php echo $question; ?></label><input id="alobaidi-captcha-comment-field" type="text" value="" name="alobaidi_captcha_comment" class="alobaidi-captcha-comment-field" placeholder="<?php echo $question; ?>"></p>
    <?php
	
	$captcha = ob_get_contents();
	ob_end_clean();
	
	return $content.$captcha;
	
}
add_filter( 'comment_form_field_comment' , 'Alobaidi_Captcha_Comment_Field' );


// Auth captcha
function Alobaidi_Captcha_Comment_Auth( $comment ){
	
	if( get_option('alobaidi_captcha_user_logged') and is_user_logged_in() or is_admin() ){
		return $comment;
		return false;
	}
	
	if( empty($_POST['alobaidi_captcha_comment']) ){
		
		if( get_option('alobaidi_captcha_empty_txt') ){
			$empty = get_option('alobaidi_captcha_empty_txt');
		}else{
			$empty = 'Please enter the total.';
		}
		
		wp_die( $empty );
		
	}
	
	else{
		
		$total = $_SESSION['alobaidi_captcha_comment_n1'] + $_SESSION['alobaidi_captcha_comment_n2'];
			
		if( $_POST['alobaidi_captcha_comment'] == $total ){
			return $comment;
			unset($_SESSION['alobaidi_captcha_comment_n1']);
			unset($_SESSION['alobaidi_captcha_comment_n2']);
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
add_filter( 'preprocess_comment' , 'Alobaidi_Captcha_Comment_Auth' );


}