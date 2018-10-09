<?php
/**
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>
<li <?php post_class(); ?>>
	<?php
	do_action( 'woocommerce_before_shop_loop_item' );

	do_action( 'woocommerce_before_shop_loop_item_title' );

	do_action( 'woocommerce_after_shop_loop_item' );

    do_action( 'ukiyo_qodef_woo_pl_info_below_image' );

	?>
	<a href="<?php the_permalink(); ?>">
		<?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
	</a>
	<?php

	do_action( 'woocommerce_after_shop_loop_item_title' );
	
	?>
</li>