<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

global $woocommerce, $rossi_options;
?>

<?php do_action('woocommerce_before_mini_cart'); ?>
<div class="mini_cart_content">
	<div class="mini_cart_inner">

		<div class="top-cart-title">
			<a href="<?php echo WC()->cart->get_cart_url(); ?>">
			
			<span><?php echo esc_html($rossi_options['mini_cart_title']); ?></span>
			<i class="fa fa-caret-down"></i>
			<span class="item-cart">
				<span><span class="cart-quantity"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'rossi'), $woocommerce->cart->cart_contents_count);?></span> <?php echo esc_html($rossi_options['mini_cart_sub_title']); ?></span> - <span class="vg-price"><?php echo WC()->cart->get_cart_subtotal();?></span>
			</span></a>
		</div>
		<div class="mcart-border">
			<?php if (sizeof(WC()->cart->get_cart()) > 0) : ?>
				<ul class="cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
					<?php
					foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$_product     = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id   = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

						if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {

							$product_name  = apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);
							$thumbnail     = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
							$product_price = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);

							?>
							<li id="mcitem-<?php echo esc_attr($cart_item_key); ?>">
								<a class="product-image" href="<?php echo get_permalink($product_id); ?>">
									<?php echo str_replace(array('http:', 'https:'), '', $thumbnail); ?>
									<?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s', $cart_item['quantity']) . '</span>', $cart_item, $cart_item_key); ?>
								</a>
								<div class="product-details">
									<?php echo apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" onclick="vinageckoMiniCartRemove(\'%s\', \'%s\');return false;" class="remove" title="%s"><i class="fa fa-times-circle"></i></a>', esc_url(WC()->cart->get_remove_url($cart_item_key)), esc_url(WC()->cart->get_remove_url($cart_item_key)), $cart_item_key, ''), $cart_item_key); ?>
									<a class="product-name" href="<?php echo esc_url(get_permalink($product_id)); ?>"><?php echo $product_name; ?></a>
									<?php echo WC()->cart->get_item_data($cart_item); ?>
									<?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s', $product_price) . '</span>', $cart_item, $cart_item_key); ?>
								</div>
							</li>
							<?php
						}
					}
					?>
				</ul><!-- end product list -->
			<?php else: ?>
				<ul class="cart_empty <?php echo esc_attr($args['list_class']); ?>">
					<li><?php esc_html_e('You have no items in your shopping cart', 'rossi'); ?></li>
					<li class="total"><?php esc_html_e('Subtotal', 'rossi'); ?>: <?php echo WC()->cart->get_cart_subtotal(); ?></li>
				</ul>
			<?php endif; ?>

			<?php if (sizeof(WC()->cart->get_cart()) > 0) : ?>

				<p class="total"><?php esc_html_e('Subtotal', 'rossi'); ?>: <?php echo WC()->cart->get_cart_subtotal(); ?></p>

				<?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

				<p class="buttons">
					<a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="button checkout wc-forward pull-left"><?php esc_html_e('Checkout', 'rossi'); ?></a>
					<a href="<?php echo WC()->cart->get_cart_url(); ?>" class="button wc-forward pull-right"><?php esc_html_e('View Cart', 'rossi'); ?></a>
				</p>

			<?php endif; ?>
			<div class="loading"></div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php do_action('woocommerce_after_mini_cart'); ?>