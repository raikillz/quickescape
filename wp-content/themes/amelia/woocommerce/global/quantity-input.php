<?php
/**
 * Product quantity inputs
 * @see        http://docs.woothemes.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.2.0
 */

if(!defined('ABSPATH')) {
	exit;
}
?>

<div class="quantity mkd-quantity-buttons">
	<span class="mkd-quantity-minus"><span class="fa fa-angle-down"></span></span>
	<input type="text" step="<?php echo esc_attr($step); ?>" <?php if(is_numeric($min_value)) : ?> min="<?php echo esc_attr($min_value); ?>" <?php endif; ?><?php if(is_numeric($max_value)) : ?>max="<?php echo esc_attr($max_value); ?>"<?php endif; ?> name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($input_value); ?>" title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'amelia') ?>" class="input-text qty text mkd-quantity-input" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
	<span class="mkd-quantity-plus"><span class="fa fa-angle-up"></span></span>
</div>
