<?php 
/**
 * The template for displaying the footer
 *
 * @package     amelia
 * @version     2.0.1
 * @author      Pixelshow
 * @link        http://pixel-show.com
 * @copyright   Copyright (c) 2017 Pixelshow
 * @license     GPL v2
 */
?>

</div>
<!-- footer -->
	<footer>
		<!-- instagram -->
		<div class="instagram-footer">
			<div class="instagram-widget">
				<?php dynamic_sidebar( 'instagram_footer' ); ?>				
			</div>		
		</div>

		<!-- copy-wrapper -->
		<div class="copy-wrapper">
			<div class="container">
				<p class="copyright"><?php echo wp_kses_post(get_theme_mod('pixelshow_pxs_footer_copyright_right')); ?></p>
				
				<?php if(!get_theme_mod('pixelshow_pxs_topbar_social_check')) : ?>
					<ul class="socials right-socials">
						<?php get_template_part('inc/templates/socials_list'); ?>
					</ul>
				<?php endif; ?>
			</div>
			<div class="container" style="text-align:center">
				<?php create_copyright(); ?>
			</div>
		</div>
	</footer>
	
	<!-- back-to-top -->
	<div class="back-to-top">
		<a href="#"><i class="fa fa-angle-double-up"></i></a>
	</div>
	
	<?php wp_footer(); ?>
</body>
</html>
