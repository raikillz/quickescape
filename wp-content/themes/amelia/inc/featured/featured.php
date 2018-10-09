<div class="hero">
  <?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'one_item') : ?><div class="container"><?php endif; ?>
  <?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'two_item') : ?><div class="container"><?php endif; ?>
  
	<?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'one_item') : ?><div class="carousel carousel-default"><?php endif; ?>
	<?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'two_item') : ?><div class="carousel carousel-two"><?php endif; ?>
	<?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'three_item') : ?><div class="carousel carousel-three"><?php endif; ?>
	<?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'one_full_item') : ?><div class="carousel carousel-onef"><?php endif; ?>
	<?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'two_full_item') : ?><div class="carousel carousel-twof"><?php endif; ?>
	
	<?php
		$featured_cat = get_theme_mod( 'pixelshow_pxs_featured_cat' );
		$number = get_theme_mod( 'pixelshow_pxs_featured_slider_slides' );
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
  <?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'one_item') : ?></div><?php endif; ?>
  <?php if(get_theme_mod('pixelshow_pxs_featured_item_view') == 'two_item') : ?></div><?php endif; ?>
</div>