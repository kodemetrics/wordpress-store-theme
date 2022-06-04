<?php
/**
 * Single Product Price, including microdata for SEO
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.49
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

global $post, $product;
?>
<div class="price-box" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<?php echo $product->get_price_html(); ?>

	<!--<meta itemprop="price" content="<?php //echo esc_attr($product->get_price()); ?>" />
	<meta itemprop="priceCurrency" content="<?php //echo get_woocommerce_currency(); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php //echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" /> -->

</div>