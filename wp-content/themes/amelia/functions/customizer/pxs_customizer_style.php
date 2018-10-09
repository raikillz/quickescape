<?php 
/**
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

/**
* Customizer - Add CSS
*/

//Header Margin Top
function pixelshow_header_paddint_top() {
	
	$header_paddint_top = get_theme_mod( 'pixelshow_pxs_header_padding_top' );
	$custom_css = '';
	if($header_paddint_top){
	$custom_css = " .main-panel .logo{ margin-top: {$header_paddint_top}px; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_header_paddint_top' );

//Header Margin Bottom
function pixelshow_header_paddint_bottom() {

	$header_paddint_bottom = get_theme_mod( 'pixelshow_pxs_header_padding_bottom' );
	$header_pb = '';
	if($header_paddint_bottom){
	$header_pb = " .main-panel .logo{ margin-bottom: {$header_paddint_bottom}px; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $header_pb );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_header_paddint_bottom' );

//Header Logo Width
function pixelshow_header_logo_width() {

	$header_logo_width = get_theme_mod( 'pixelshow_pxs_header_logo_width' );
	$logo_width = '';
	if($header_logo_width){
	$logo_width = " .main-panel .logo{ width: {$header_logo_width}px!important;} ";
	}
	wp_add_inline_style( 'amelia-main-styles', $logo_width );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_header_logo_width' );

//Header Logo Height
function pixelshow_header_logo_height() {

	$header_logo_height = get_theme_mod( 'pixelshow_pxs_header_logo_height' );
	$logo_height = '';
	if($header_logo_height){
	$logo_height = " .main-panel .logo{ height: {$header_logo_height}px!important; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $logo_height );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_header_logo_height' );

//Featured Button
function pixelshow_featured_cat_hide() {

	$featured_cat_hide = get_theme_mod( 'pixelshow_pxs_featured_cat_hide' );
	$f_cat_hide = '';
	if($featured_cat_hide){
	$f_cat_hide = " .hero .owl-next, .hero .owl-prev{ display: none!important;} ";
	}
	wp_add_inline_style( 'amelia-main-styles', $f_cat_hide );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_featured_cat_hide' );

//Main Color Accent
function pixelshow_main_color_accent() {

	$main_color_accent = get_theme_mod( 'pixelshow_pxs_color_accent' );
	$color_acc = '';
	if($main_color_accent){
	$color_acc = " .navigation li:hover > a, 
	.navigation li ul li a:hover, 
	.hero .owl-next:hover, 
	.hero .owl-prev:hover, 
	.post-entry a:hover, 
	.list-meta .socials li a:hover, 
	.single-post-type-type-type .socials li:hover a, 
	.logo-wrapper .socials a:hover{ color: {$main_color_accent}!important; }
	.navigation > li > a:after, 
	.searchbox-icon:hover, .fk-submit:hover, 
	.menu-tumbl:hover, .submit-active, .hero .owl-next:hover, 
	.hero .owl-prev:hover, .more-button, .socials li:hover a,
	.wpcf7-form input[type=submit] { background: {$main_color_accent}; }
	.searchbox-icon:hover, .fk-submit:hover, 
	.menu-tumbl:hover, .searchbox-submit, .submit-active, 
	.logo-wrapper .socials a:hover, 
	.glide-widget.pixelshow_social_widget a:hover { border: 1px solid {$main_color_accent}!important; }
	.searchbox-icon:hover, .fk-submit:hover, .menu-tumbl:hover, 
	.searchbox-submit, .submit-active, .logo-wrapper .socials a:hover, 
	.glide-widget.pixelshow_social_widget a:hover { border: 1px solid {$main_color_accent}!important; }
	.post-entry blockquote { border-color: {$main_color_accent}; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $color_acc );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_main_color_accent' );

//Widgets / Page Title / Glide Nav Background
function pixelshow_color_more_bg() {

	$color_more_bg = get_theme_mod( 'pixelshow_pxs_color_more_bg' );
	$color_morebg = '';
	if($color_more_bg){
	$color_morebg = " 	.widget, .glide-navigation .navbar li.menu-item-has-children.active, .page-title{ background: {$color_more_bg}; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $color_morebg );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_color_more_bg' );

//Widget Title / Category / To Top / Post Background
function pixelshow_wgt_title_bg() {

	$wgt_title_bg = get_theme_mod( 'pixelshow_pxs_color_more_border' );
	$wgt_titlebg = '';
	if($wgt_title_bg){
	$wgt_titlebg = ".widget-title, .about-widget a, .socials li a, 
	.tagcloud a, .back-to-top, .glide-navigation .menu-item-has-children i:hover,
	.single-post-type-type-type .post-tags a, .post-switch hr, .post-comments span.reply a, 
	#respond #submit{ background: {$wgt_title_bg}; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $wgt_titlebg );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_wgt_title_bg' );

//Widget Title / Category / To Top / Post Color
function pixelshow_wgt_title_color() {

	$wgt_title_color = get_theme_mod( 'pixelshow_pxs_color_more_text' );
	$wgt_titlecolor = '';
	if($wgt_title_color){
	$wgt_titlecolor = ".widget-title, .widget-title a, 
	.about-widget a, .socials li a, .tagcloud a, .back-to-top a, 
	.glide-navigation .menu-item-has-children i:hover, 
	.single-post-type-type-type .post-tags a, .post-switch hr, 
	.post-comments span.reply a, #respond #submit{ color: {$wgt_title_color}!important; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $wgt_titlecolor );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_wgt_title_color' );

//Background Color
function pixelshow_color_more_bg_hover() {

	$color_more_bg_hover = get_theme_mod( 'pixelshow_pxs_color_more_bg_hover' );
	$color_more_bghover = '';
	if($color_more_bg_hover){
	$color_more_bghover = " 	.main-panel{ background: {$color_more_bg_hover}; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $color_more_bghover );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_color_more_bg_hover' );

//Background Image
function pixelshow_background_img() {

	$background_img = get_theme_mod( 'pixelshow_pxs_background_image' );
	$backgroundimg = '';
	if($background_img){
	$backgroundimg = " 	.main-panel{ background-image: url({$background_img}); } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $backgroundimg );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_background_img' );

//Background Repeat
function pixelshow_background_repeat_view() {

	$background_repeat_view = get_theme_mod( 'pixelshow_pxs_color_more_text_hover' );
	$background_repeatview = '';
	if($background_repeat_view  == 'repeat'){
	$background_repeatview = " 	.main-panel{ background-repeat: repeat; } ";
	}
	elseif ($background_repeat_view  == 'repeat-x') {
	$background_repeatview = " 	.main-panel{ background-repeat: repeat-x; } ";
	}
	elseif ($background_repeat_view  == 'repeat-y') {
	$background_repeatview = " 	.main-panel{ background-repeat: repeat-y; } ";
	}
	else {
		$background_repeatview = " 	.main-panel{ background-repeat: no-repeat; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $background_repeatview );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_background_repeat_view' );

//Background Size
function pixelshow_body_background_size() {

	$body_background_size = get_theme_mod( 'pixelshow_pxs_body_background_size' );
	$body_backgroundsize = '';
	if($body_background_size  == 'auto'){
	$body_backgroundsize = " 	.main-panel{ background-size: auto; } ";
	}
	else {
		$body_backgroundsize = " 	.main-panel{ background-size: cover; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $body_backgroundsize );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_body_background_size' );

//Background Attachment
function pixelshow_body_background_attach() {

	$body_background_attach = get_theme_mod( 'pixelshow_pxs_body_background_attach' );
	$body_backgroundattach = '';
	if($body_background_attach  == 'scroll'){
	$body_backgroundattach = " 	.main-panel{ background-attachment: scroll; } ";
	}
	else {
		$body_backgroundattach = " 	.main-panel{ background-attachment: fixed; } ";
	}
	wp_add_inline_style( 'amelia-main-styles', $body_backgroundattach );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_body_background_attach' );

//Custom CSS
function pixelshow_custom_css_block() {

	$custom_css_block = get_theme_mod( 'pixelshow_pxs_custom_css' );
	$custom_cssblock = '';
	if($custom_css_block){
	$custom_cssblock = " 	{$custom_css_block} ";
	}
	wp_add_inline_style( 'amelia-main-styles', $custom_cssblock );
}
add_action( 'wp_enqueue_scripts', 'pixelshow_custom_css_block' );

?>