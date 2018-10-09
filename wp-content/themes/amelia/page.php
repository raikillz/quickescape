<?php 
/**
 * The template for displaying pages
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<!-- page-title -->
		<div class="page-title-wrapper">
			<div class="container">
				<div class="page-title">
					<h2 class="grey-color"><?php the_title(); ?></h2>
				</div>
			</div>
		</div>
	
		<!-- main -->
	    <div class="main page-panel">
	    	<div class="container">

				<!-- main-column -->
				<div id="main-column">
	    			
					<!-- fl-grid -->
					<div class="post-entry">
						<?php the_content(); ?>
					</div>
					
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					?>
					
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	<?php endwhile; ?>
	<?php endif; ?>

<?php get_footer(); ?>