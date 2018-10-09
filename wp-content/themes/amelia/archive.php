<?php 
/**
 * The template for displaying archive pages
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
			<?php
				if ( is_day() ) :
					echo _e( '<p>Daily Archives</p>', 'amelia' );
					printf( __( '<h2>%s</h2>', 'amelia' ), get_the_date() );

				elseif ( is_month() ) :
					echo _e( '<p>Monthly Archives</p>', 'amelia' );
					printf( __( '<h2>%s</h2>', 'amelia' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'amelia' ) ) );

				elseif ( is_year() ) :
					echo _e( '<p>Yearly Archives</p>', 'amelia' );
					printf( __( '<h2>%s</h2>', 'amelia' ), get_the_date( _x( 'Y', 'yearly archives date format', 'amelia' ) ) );

				else :
					_e( '<h1>Archives</h1>', 'amelia' );

				endif;
			?>
		</div><!-- page-title -->
		
	</div>
</div><!-- page-title-wrapper -->

<?php get_template_part('inc/templates/main_content_page'); ?>