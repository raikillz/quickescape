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
		<?php if(has_post_thumbnail()) : ?>
		<div class="post-img">
			<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('amelia-misc-thumb'); ?></a>
		</div>
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
			<?php echo pixelshow_string_limit_words(get_the_excerpt(), 32);  ?>
		</div>
		
		<!-- Post: Meta -->
		<div class="list-meta">
			<span class="date"><i class="fa fa-clock-o"></i> <?php the_time( get_option('date_format') ); ?></span>
			<?php get_template_part('inc/templates/comments_counter'); ?>
		</div>
	</div>
</li>