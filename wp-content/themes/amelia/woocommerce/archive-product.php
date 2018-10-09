<?php
/**
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

get_header(); ?>

	<!-- page-title -->
	<div class="page-title-wrapper">
		<div class="container">

			<div class="page-title">
				<h3 class="grey-color"><?php if(woocommerce_page_title(false) == '') { echo esc_html_e('Shop', 'amelia'); } else { woocommerce_page_title(); } ?></h3>
			</div>

		</div>
	</div>
	
	<div class="main<?php if(get_theme_mod('pixelshow_pxs_sidebar_left_position_shop')) : ?> home-sidebar-left<?php endif; ?>">
		<div class="container">
		
		<div id="main-column"<?php if(get_theme_mod('pixelshow_pxs_sidebar_shop') == true) : ?> class="all-width-shop" <?php endif; ?>>

	<?php
		do_action( 'woocommerce_archive_description' );
	?>

	<?php if ( have_posts() ) : ?>

		<?php
			do_action( 'woocommerce_before_shop_loop' );
		?>

		<?php woocommerce_product_loop_start(); ?>

			<?php woocommerce_product_subcategories(); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile;?>

		<?php woocommerce_product_loop_end(); ?>

		<?php
			do_action( 'woocommerce_after_shop_loop' );
		?>

	<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

		<?php wc_get_template( 'loop/no-products-found.php' ); ?>

	<?php endif; ?>

		</div>
			<?php if(get_theme_mod('pixelshow_pxs_sidebar_shop')) : else : ?>
			<?php do_action( 'woocommerce_sidebar' ); ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>