<!-- main -->
<div class="main">
	<div class="container">
		<!-- main-column -->
		<div id="main-column" 
			<?php if(get_theme_mod('pixelshow_pxs_sidebar_archive') == true) : ?>
				class="all-width-list"
			<?php endif; ?>>

			<!-- fl-grid -->
			<ul class="fl-grid post-list">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php if(get_theme_mod('pixelshow_pxs_archive_layout') == 'grid') : ?>
						<?php get_template_part('content', 'grid'); ?>
					
					<?php elseif(get_theme_mod('pixelshow_pxs_archive_layout') == 'list') : ?>
						<?php get_template_part('content', 'list'); ?>
					
					<?php elseif(get_theme_mod('pixelshow_pxs_archive_layout') == 'full_list') : ?>
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'list'); ?>
						<?php endif; ?>
					
					<?php elseif(get_theme_mod('pixelshow_pxs_archive_layout') == 'full_grid') : ?>
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'grid'); ?>
						<?php endif; ?>
					
					<?php else : ?>
						
						<?php get_template_part('content'); ?>
					<?php endif; ?>	
				<?php endwhile; ?>
				
				</ul>
				<?php endif; ?>													
		
			<!-- Pagination -->
			<?php pixelshow_pagination(); ?>
		</div>
		
		<?php if(get_theme_mod('pixelshow_pxs_sidebar_archive')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>