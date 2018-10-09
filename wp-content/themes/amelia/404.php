<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

get_header(); ?>
	
<!-- error-page -->
<div class="page-title-wrapper">
	<div class="container">
		<div class="error-page">
			<div class="page-title">
			
				<h2><?php esc_html_e( '404', 'amelia' ); ?></h2>
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'amelia' ); ?></p>
				<p><?php esc_html_e( 'Maybe try a search?', 'amelia' ); ?></p>
				
				<div class="widget widget_search">
					<?php get_search_form(); ?>
				</div><!-- .widget_search -->
				
			</div><!-- .page-title -->
		</div><!-- .error-page -->
	</div>
</div><!-- .page-title-wrapper -->
		
<?php get_footer(); ?>