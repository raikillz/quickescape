<?php

	/* Template Name: Customizer: Home Without Sidebar */

?>

<?php get_header(); ?>
	
	<div class="hero">
		<div class="container">
	  
			<div class="carousel carousel-default">
			<?php
				$featured_cat = get_theme_mod( 'pxs_featured_cat' );
				$number = get_theme_mod( 'pxs_featured_slider_slides' );
			?>
			<?php $feat_query = new WP_Query( array( 'cat' => $featured_cat, 'showposts' => $number ) ); ?>
			<?php if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post(); ?>

				<div style="background-image: url(<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'amelia-full-thumb' ); echo esc_attr($image[0]); ?>); background-position: center;" class="slide">
					<div class="slide-info">
						<span class="category-post-title"><?php pixelshow_category(' '); ?></span>
						<div class="heading"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
						<div class="date"><a><?php the_time( get_option('date_format') ); ?></a></div>
						<p class="hero-more"><a href="<?php echo get_permalink(); ?>" class="more-link"><span class="more-button"><?php esc_html_e( 'Continue Reading', 'amelia' ); ?></span></a></p>
					</div>
				</div>
			 
			<?php endwhile; endif; ?>
			</div>
		</div>
	</div>
	
	<!-- main -->
	<div class="main">
		<div class="container">

			<!-- main-column -->
			<div id="main-column all-width-list">
				<!-- fl-grid -->
				<ul class="fl-grid post-list">
					<?php
					$category_id = get_cat_ID('category name');
					$args = array(
						'cat'   => $category_id,
						'paged' => get_query_var('paged') ? get_query_var('paged') : 1
					);
					$cat_posts = new WP_query( $args );
					if($cat_posts->have_posts()):
						while($cat_posts->have_posts()):
							$cat_posts->the_post();
					?>

						<?php get_template_part('content'); ?>
					
					<?php endwhile; ?>

				<div class="pagination">
					<div class="older widget-title"><?php next_posts_link(__( 'Older Posts <i class="fa fa-angle-double-right"></i>', 'pixelshow')); ?></div>
					<div class="newer widget-title"><?php previous_posts_link(__( '<i class="fa fa-angle-double-left"></i> Newer Posts', 'pixelshow')); ?></div>
				</div>	

				<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				</ul>	
				
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>