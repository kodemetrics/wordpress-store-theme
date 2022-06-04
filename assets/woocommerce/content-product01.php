<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $rossi_showcountdown, $rossi_productrows, $rossi_productsfound, $rossi_options;
?>

<div class="product-wrapper">
	<div class="vgwc-item">
		<div class="ma-box-content">
			<?php do_action('woocommerce_before_shop_loop_item'); ?>

			<div class="list-col4">
				<div class="vgwc-image-block">

					<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
						<?php
						echo $product->get_image('shop_catalog', array('class'=>'primary_image'));
						if($rossi_options['second_image'] && $rossi_options['second_image']){
							$attachment_ids = $product->get_gallery_attachment_ids();
							$image_second = '';
							if($attachment_ids[0] && ($attachment_ids[0] != get_post_thumbnail_id(get_the_ID()))) {
								$image_second = wp_get_attachment_image( $attachment_ids[0], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
							}
							elseif(isset($attachment_ids[1])){
								$image_second = wp_get_attachment_image( $attachment_ids[1], apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' ), false, array('class'=>'secondary_image') );
							}
						}
						echo $image_second;
						?>
					</a>

					<?php if ($product->is_featured()) : ?>
						<?php echo apply_filters('woocommerce_featured_flash', '<div class="vgwc-label vgwc-featured">' . esc_html__('Hot', 'rossi') . '</div>', $post, $product); ?>
					<?php endif; ?>

					<?php if ($product->is_on_sale()) : ?>
						<?php echo apply_filters('woocommerce_sale_flash', '<div class="vgwc-label vgwc-onsale">' . esc_html__('Sale', 'rossi') . '</div>', $post, $product); ?>
					<?php endif; ?>

				</div>
			</div>


			<div class="list-col8">
				<div class="gridview">
					<div class="vgwc-text-block">
						<h3 class="vgwc-product-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="vgwc-product-rating"><?php echo $product->get_rating_html(); ?> <?php echo $product->get_review_count(). __(' review(s)', 'rossi'); ?></div>
						<?php echo $product->get_price_html(); ?>
						<div class="vgwc-button-group">
							<div class="vgwc-add-to-cart">
								<?php echo do_shortcode('[add_to_cart id="'.$product->id.'" style="none" show_price="false"]') ?>
							</div>

							<div class="add-to-links">
								<?php if (class_exists('YITH_WCWL')) {
									echo '<div class="vgwc-wishlist">'.preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]')). '</div>';
								} ?>
								<?php if(class_exists('YITH_Woocompare')) {
									echo '<div class="vgwc-compare">'. do_shortcode('[yith_compare_button]') . '</div>';
								} ?>

								<div class="vgwc-quick">
									<a class="quickview quick-view" data-quick-id="<?php the_ID();?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php esc_html_e('Quick View', 'rossi');?></a>
								</div>

							</div>
						</div>
					</div>
				</div>

			

			</div>
			<div class="clearfix"></div>
			<?php do_action('woocommerce_after_shop_loop_item'); ?>
		</div>
	</div>
</div>
