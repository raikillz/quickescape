<ul class="socials">
	<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
	<li><a href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php the_title(); ?>%20-%20<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
	<?php $pin_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
	<li><a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url( $pin_image ); ?>&description=<?php the_title(); ?>"><i class="fa fa-pinterest"></i></a></li>
	<li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a></li>
	<li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a></li>
</ul>