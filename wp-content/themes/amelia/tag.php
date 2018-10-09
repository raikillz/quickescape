<?php 
/**
 * The template for displaying Tag page
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

get_header(); ?>

<!-- page-title -->
<div class="page-title-wrapper">
	<div class="container">
	
		<div class="page-title">
			<p><?php esc_html_e( 'Browsing Tag', 'amelia' ); ?> :</p>
			<h2><?php printf( esc_html__( '%s', 'amelia' ), single_tag_title( '', false ) ); ?></h2>
		</div><!-- .page-title -->
		
	</div>
</div><!-- .page-title-wrapper -->

<?php get_template_part('inc/templates/main_content_page'); ?>