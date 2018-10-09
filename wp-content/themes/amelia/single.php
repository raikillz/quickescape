<?php 
/**
 * Single Post
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
<div class="page-title-wrapper"><div class="container"><div class="row post-border"></div></div></div>

<!-- main -->
<div class="main">
	<div class="container">
		<!-- main-column -->
		<div id="main-column" 
			<?php if(get_theme_mod('pixelshow_pxs_sidebar_post') == true) : ?>
				class="full-page-post"
			<?php endif; ?>>
			<!-- fl-grid -->
			<ul class="fl-grid">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('content'); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</ul>
		</div>

		<?php if(get_theme_mod('pixelshow_pxs_sidebar_post')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>