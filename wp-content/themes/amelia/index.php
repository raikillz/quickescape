<?php
/**
 * The template for displaying index page
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

get_header(); ?>
	
<?php if(get_theme_mod( 'pixelshow_pxs_featured_slider' ) == true) : ?>
	<?php get_template_part('inc/featured/featured'); ?>
<?php endif; ?>

<!-- main -->
<div class="main">
	<div class="container">

		<!-- main-column -->
		<div id="main-column" 
			<?php if(get_theme_mod('pixelshow_pxs_sidebar_homepage') == true) : ?>
				class="all-width-list"
			<?php endif; ?>
		>
			<!-- fl-grid -->
			<ul class="fl-grid post-list">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if(get_theme_mod('pixelshow_pxs_home_layout') == 'grid') : ?>
						<?php get_template_part('content', 'grid'); ?>
					
					<?php elseif(get_theme_mod('pixelshow_pxs_home_layout') == 'list') : ?>
						<?php get_template_part('content', 'list'); ?>
						
					<?php elseif(get_theme_mod('pixelshow_pxs_home_layout') == 'full_list') : ?>
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'list'); ?>
						<?php endif; ?>
					
					<?php elseif(get_theme_mod('pixelshow_pxs_home_layout') == 'full_grid') : ?>
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'grid'); ?>
						<?php endif; ?>
					<?php else : ?>
						<?php get_template_part('content'); ?>
					<?php endif; ?>	
						
				<?php endwhile; ?>
				<?php if(get_theme_mod('pixelshow_pxs_home_layout') == 'grid' || get_theme_mod('pixelshow_pxs_home_layout') == 'full_grid') : ?><?php endif; ?>
				<?php endif; ?>											
			</ul>				
				
			<!-- Pagination -->
			<?php pixelshow_pagination(); ?>

		</div>
		<?php if(get_theme_mod('pixelshow_pxs_sidebar_homepage')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>