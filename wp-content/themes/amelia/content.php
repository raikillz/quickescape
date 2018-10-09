<?php 
/**
 * The default template for displaying content
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */
?>

<aside id="post-<?php the_ID(); ?>" <?php if(is_single()) : ?><?php post_class('full-width-post single-post-type'); ?><?php else : ?><?php post_class('full-width-post'); ?><?php endif; ?>>
	
	<div class="post-header">
		<?php if(!get_theme_mod('pixelshow_pxs_post_cat')) : ?>
			<span class="category-post-title"><?php pixelshow_category(' '); ?></span>
		<?php endif; ?>
				
		<?php if(is_single()) : ?>
			<h2><a><?php the_title(); ?></a></h2>
		
		<?php else : ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php endif; ?>

		<span class="date"><?php the_time( get_option('date_format') ); ?></span>
	</div><!-- .post-header -->
	
	<?php if(has_post_format('gallery')) : ?>
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		<?php if($images) : ?>
			<div class="post-img">
			<ul class="bxslider">
			<?php foreach($images as $image) : ?>
				
				<?php $the_image = wp_get_attachment_image_src( $image, 'amelia-full-thumb' ); ?>
				<?php $the_caption = get_post_field('post_excerpt', $image); ?>
				<li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_html( $the_caption ); ?>"<?php endif; ?> alt="<?php echo esc_html( $the_caption ); ?>"/></li>
				
			<?php endforeach; ?>
			</ul>
			</div>
		<?php else : ?>
			<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('amelia-full-thumb'); ?></a>
		<?php endif; ?><!-- .gallery -->
	
	<?php elseif(has_post_format('video')) : ?>
		<div class="post-img">
			<?php $pixelshow_pxs_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if(wp_oembed_get( $pixelshow_pxs_video )) : ?>
				<?php echo str_replace('','', wp_oembed_get($pixelshow_pxs_video)); ?>
            <?php else : ?>
                <?php echo str_replace('','', $pixelshow_pxs_video); ?>
			<?php endif; ?>
		</div><!-- .video -->
	
	<?php elseif(has_post_format('audio')) : ?>
		<div class="post-img audio">
			<?php $pixelshow_pxs_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if(wp_oembed_get( $pixelshow_pxs_audio )) : ?>
				<?php echo str_replace('','', wp_oembed_get($pixelshow_pxs_audio)); ?>
            <?php else : ?>
                <?php echo str_replace('','', $pixelshow_pxs_audio); ?>
			<?php endif; ?>
		</div><!-- .audio -->
	
	<?php else : ?>
		<?php if(has_post_thumbnail()) : ?>
			<?php if(!get_theme_mod('pixelshow_pxs_post_thumb')) : ?>
				<?php if(is_single()) : ?>
					<?php the_post_thumbnail('amelia-full-thumb'); ?>
				<?php else: ?>
					<div class="post-img">
						<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('amelia-full-thumb'); ?></a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
		
	<?php endif; ?>
	<div class="post-entry">
		<?php if(is_single()) : ?>
			<?php echo the_content(); ?>
		<?php else : ?>
			<?php echo pixelshow_string_limit_words(get_the_excerpt(), 80); ?>
		<?php endif; ?>
		
		<?php wp_link_pages(); ?>	
		
	</div><!-- .post-entry -->
	
	<?php if(is_single()) : ?>
	
		<div class="list-meta">
			<?php get_template_part('inc/templates/comments_counter'); ?>
			
			<?php if(!get_theme_mod('pixelshow_pxs_post_share')) : ?>
				<?php get_template_part('inc/templates/socials_share'); ?>
			<?php endif; ?>
			
			<?php if(!get_theme_mod('pixelshow_pxs_post_tags')) : ?>
			<?php if(is_single()) : ?>
			<?php if(has_tag()) : ?>
				<div class="post-tags">
					<?php the_tags("",""); ?>
				</div>
			<?php endif; ?>	
			<?php endif; ?>
			<?php endif; ?>
		
		<?php if(!get_theme_mod('pixelshow_pxs_post_author')) : ?>
		<?php get_template_part('inc/templates/about_author'); ?>
		<?php endif; ?>
		
		<?php if(!get_theme_mod('pixelshow_pxs_post_tags')) : ?>
		<?php get_template_part('inc/templates/post_navigation'); ?>
		<?php endif; ?>
		</div><!-- .single list-meta -->
		
	<?php else : ?>
		<div class="list-meta">
			<?php get_template_part('inc/templates/socials_share'); ?>
			<?php get_template_part('inc/templates/comments_counter'); ?>
			<p class="more-link-wrapper"><a href="<?php echo get_permalink() ?>" class="more-link"><span class="more-button"><?php esc_html_e( 'Continue Reading', 'amelia' ); ?></span></a></p>
		</div><!-- .list-meta -->
	
	<?php endif; ?>
	
	<?php if(!get_theme_mod('pixelshow_pxs_post_related')) : ?>
		<?php if(is_single()) : ?>
			<?php get_template_part('inc/templates/related_posts'); ?>
		<?php endif; ?>
	<?php endif; ?><!-- .related-post -->
	
	<?php if(is_single()) : ?>
		<?php if(!get_theme_mod('pixelshow_pxs_post_comment_link')) : ?>
			<?php comments_template( '', true );  ?>
		<?php endif; ?>
	<?php endif; ?><!-- .comments -->
	
</aside><!-- .aside -->