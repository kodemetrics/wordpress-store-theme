<?php
if (! defined('ABSPATH')) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $rossi_showcountdown, $rossi_productrows, $rossi_productsfound, $rossi_options;

//hide countdown on category page, show on all others
if(!isset($rossi_showcountdown)) {
	$rossi_showcountdown = true;
}

// Store loop count we're currently on
if (empty($woocommerce_loop['loop']))
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns']))
	$woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 3);

// Ensure visibility
if (! $product || ! $product->is_visible())
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if (0 == ($woocommerce_loop['loop'] - 1) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns']) {
	$classes[] = 'first';
}
if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns']) {
	$classes[] = 'last';
}

$count   = $product->get_rating_count();

if ($woocommerce_loop['columns']==3 || $woocommerce_loop['columns']==4) {
	$colwidth = 12/$woocommerce_loop['columns'];
} else {
	$colwidth = 3;
}

$colwidth_sm = $colwidth + 1;

$classes[] = ' item-col col-xs-6 col-sm-'. $colwidth_sm .' col-lg-'.$colwidth ;?>

<?php if ((0 == ($woocommerce_loop['loop'] - 1) % 2) && ($woocommerce_loop['columns'] == 2)) {
	if($rossi_productrows!=1){
		echo '<div class="group">';
	}
} ?>
<div <?php post_class($classes); ?>>
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
				<div class="listview">
					<div class="vgwc-text-block">
						<h3 class="vgwc-product-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="vgwc-product-rating"><?php echo $product->get_rating_html(); ?> <?php echo $product->get_review_count(). __(' review(s)', 'rossi'); ?></div>
						<?php echo $product->get_price_html(); ?>
						<div class="product-desc"><?php the_excerpt(); ?></div>
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
<?php if (((0 == $woocommerce_loop['loop'] % 2 || $rossi_productsfound == $woocommerce_loop['loop']) && $woocommerce_loop['columns'] == 2) ) { /* for odd case: $rossi_productsfound == $woocommerce_loop['loop'] */
	if($rossi_productrows!=1){
		echo '</div>';
	}
} ?>
