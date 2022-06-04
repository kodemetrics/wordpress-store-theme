<?php
/**
 * Single Product Sale Flash
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

global $post, $product;
?>

<?php if ($product->is_featured()) : ?>
	<?php echo apply_filters('woocommerce_featured_flash', '<div class="vgwc-label vgwc-featured">' . esc_html__('Hot', 'rossi') . '</div>', $post, $product); ?>
<?php endif; ?>

<?php if ($product->is_on_sale()) : ?>
	<?php echo apply_filters('woocommerce_sale_flash', '<div class="vgwc-label vgwc-onsale">' . esc_html__('Sale', 'rossi') . '</div>', $post, $product); ?>
<?php endif; ?>