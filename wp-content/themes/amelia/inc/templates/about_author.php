<?php
$authordesc = get_the_author_meta( 'description' );

if ( ! empty ( $authordesc ) ) { ?>

<div class="author-post">
	<?php echo get_avatar( get_the_author_meta('email'), '100' ); ?>
	
	<div class="author-content">
		<div class="author-post-name"><?php the_author_posts_link(); ?></div>
		<div class="author-post-text"><?php the_author_meta('description'); ?></div>
		<ul class="socials author-socials">
			<?php if(get_the_author_meta('facebook')) : ?><li><a target="_blank" class="author-social" href="http://facebook.com/<?php echo the_author_meta('facebook'); ?>"><i class="fa fa-facebook"></i></a></li><?php endif; ?>
			<?php if(get_the_author_meta('twitter')) : ?><li><a target="_blank" class="author-social" href="http://twitter.com/<?php echo the_author_meta('twitter'); ?>"><i class="fa fa-twitter"></i></a></li><?php endif; ?>
			<?php if(get_the_author_meta('instagram')) : ?><li><a target="_blank" class="author-social" href="http://instagram.com/<?php echo the_author_meta('instagram'); ?>"><i class="fa fa-instagram"></i></a></li><?php endif; ?>
			<?php if(get_the_author_meta('google')) : ?><li><a target="_blank" class="author-social" href="http://plus.google.com/<?php echo the_author_meta('google'); ?>?rel=author"><i class="fa fa-google-plus"></i></a></li><?php endif; ?>
			<?php if(get_the_author_meta('pinterest')) : ?><li><a target="_blank" class="author-social" href="http://pinterest.com/<?php echo the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest"></i></a></li><?php endif; ?>
			<?php if(get_the_author_meta('tumblr')) : ?><li><a target="_blank" class="author-social" href="http://<?php echo the_author_meta('tumblr'); ?>.tumblr.com/"><i class="fa fa-tumblr"></i></a></li><?php endif; ?>
		</ul>
	</div>
	
</div>
	
<?php } ?>
