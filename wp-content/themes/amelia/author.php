<?php 
/**
 * The template for displaying Author bios
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
			<p><?php esc_html_e( 'All Posts By', 'amelia' ); ?> :</p>
			<h2><?php the_post(); echo get_the_author(); ?></h2>
		</div><!-- .page-title -->
		
	</div>
</div><!-- .page-title-wrapper -->

<?php get_template_part('inc/templates/main_content_page'); ?>