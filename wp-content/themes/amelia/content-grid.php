<?php 
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/tag/search.
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */
?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post">
		
		<!-- Post: Img -->
		<?php if(has_post_format('gallery')) : ?>
	
				<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
				
				<?php if($images) : ?>
				<div class="post-img">
					<ul class="bxslider">
					<?php foreach($images as $image) : ?>
						
						<?php $the_image = wp_get_attachment_image_src( $image, 'amelia-misc-thumb' ); ?>
						<?php $the_caption = get_post_field('post_excerpt', $image); ?>
						<li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_html( $the_caption ); ?>"<?php endif; ?>alt="<?php echo esc_html( $the_caption ); ?>"/></li>
						
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			
			<?php else : ?>
				<?php if(has_post_thumbnail()) : ?>
				<?php if(!get_theme_mod('pixelshow_pxs_post_thumb')) : ?>
				<?php if(is_single()) : ?>
					<?php the_post_thumbnail('amelia-misc-thumb'); ?>
				<?php else: ?>
					<div class="post-img">
						<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('amelia-misc-thumb'); ?></a>
					</div>
				<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
			
		<!-- Post: Header -->
		<div class="post-header">
			<?php if(!get_theme_mod('pixelshow_pxs_post_cat')) : ?>
			<span class="category-post-title"><?php pixelshow_category(' '); ?></span>
			<?php endif; ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		
		<!-- Post: Entry -->
		<div class="post-entry">		
			<?php echo pixelshow_string_limit_words(get_the_excerpt(), 26); ?>
		</div>
		
		<!-- Post: Meta -->
		<div class="list-meta">
			<span class="date"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></span>
			<?php get_template_part('inc/templates/comments_counter'); ?>
		</div>
	</div>
</li>	