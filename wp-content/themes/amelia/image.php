<?php 
/**
 * The template for displaying image attachments
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
		<div class="row post-border"></div>
	</div>
</div>

<!-- main -->
<div class="main">
	<div class="container">
		<!-- main-column -->
		<div id="main-column" 
			<?php if(get_theme_mod('pixelshow_pxs_sidebar_post') == true) : ?>
				class="full-page-post"
			<?php endif; ?>>
			
			<!-- fl-grid -->
			<div class="fl-grid">
				<aside id="post-<?php the_ID(); ?>" class="single-post-type">
				
					<!-- title -->
					<div class="post-header">
						<h2><?php the_title(); ?></h2>
					</div>
					
					<?php while ( have_posts() ) : the_post(); ?>
						<!-- image-container -->
						<div class="img-page-container">
							<?php echo wp_get_attachment_image( get_the_ID(), 'amelia-full-thumb' ); ?>
						</div>
						
						<!-- content and full size -->
						<?php 
						$metadata = wp_get_attachment_metadata();
						if ( $metadata ) {
							printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
								esc_html_x( 'Full size', 'Used before full size attachment link.', 'amelia' ),
								esc_url( wp_get_attachment_url() ),
								absint( $metadata['width'] ),
								absint( $metadata['height'] )
							);
						}
						?>
						
						<!-- edit link -->
						<?php
							edit_post_link(
								sprintf(
									__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'amelia' ),
									get_the_title()
								),
								'<span class="edit-link">',
								'</span>'
							);
						?>

						<!-- comments -->
						<?php
							if ( comments_open() || get_comments_number() ) {
								comments_template();
							}
							endwhile;
						?>
				</aside>
			</div>
		</div>

		<?php if(get_theme_mod('pixelshow_pxs_sidebar_post')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>