<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

rossi_get_header(); ?>
<?php
global $rossi_options, $rossi_showcountdown, $rossi_productrows;

$rossi_showcountdown = false;
$rossi_productrows = 1;
?>
<div class="main-container page-shop">
	<div class="page-content">
		<div class="container">
			<?php
				/**
				 * woocommerce_before_main_content hook
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action('woocommerce_before_main_content');
			?>
			<div class="row">
				<?php if($rossi_options['sidebar_pos']=='left' || !isset($rossi_options['sidebar_pos'])) :?>
					<?php get_sidebar('category'); ?>
				<?php endif; ?>
				
				<div id="archive-product" class="col-xs-12 col-md-<?php echo (is_active_sidebar( 'sidebar-category' )) ? 9 : 12 ; ?>">
					<div class="archive-border <?php if($rossi_options['sidebar_pos']=='right') { echo ' border-right';} ?>">
						<?php do_action('woocommerce_archive_description'); ?>
						
						<?php if (have_posts()) : ?>
							
							<?php
								/**
								* remove message from 'woocommerce_before_shop_loop' and show here
								*/
								do_action('woocommerce_show_message');
							?>
							<div class="shop_header">
							<?php
							if(is_shop()){
								esc_html_e('All Categories', 'rossi');
							} elseif (is_product_category()) {
								echo single_cat_title('', false);
							}
							?></div>
							<?php if($rossi_options['cat_banner_img'] != '') { ?>
								<div class="rossi-banner banner-category"><a href="<?php echo esc_url($rossi_options['cat_banner_link']); ?>"><img src="<?php echo esc_url($rossi_options['cat_banner_img']['url']); ?>" alt=""></a></div>
							<?php } ?>
							<div class="toolbar">
								<div class="view-mode">
									<a href="#" class="grid active" title="<?php echo esc_attr__('Grid', 'rossi'); ?>"><i class="fa fa-th-large"></i> <strong><?php echo esc_html__('Grid', 'rossi'); ?></strong></a>
									<a href="#" class="list" title="<?php echo esc_attr__('List', 'rossi'); ?>"><i class="fa fa-th-list"></i> <strong><?php echo esc_html__('List', 'rossi'); ?></strong></a>
								</div>
								<?php
									/**
									 * woocommerce_before_shop_loop hook
									 *
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									//do_action('woocommerce_after_shop_loop');
									do_action('woocommerce_before_shop_loop');
								?>
								<div class="clearfix"></div>
							</div>
						<?php endif; ?>	
							
						<?php if (have_posts()) : ?>	
						
							<?php woocommerce_product_subcategories(array('before' => '<div class="shop-category row">','after' => '</div>')); ?>
						
							<?php woocommerce_product_loop_start(); ?>

								<?php while (have_posts()) : the_post(); ?>

									<?php wc_get_template_part('content', 'product'); ?>

								<?php endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>

							<div class="toolbar tb-bottom">
								<?php
									/**
									 * woocommerce_before_shop_loop hook
									 *
									 * @hooked woocommerce_result_count - 20
									 * @hooked woocommerce_catalog_ordering - 30
									 */
									do_action('woocommerce_after_shop_loop');
									//do_action('woocommerce_before_shop_loop');
								?>
								<div class="clearfix"></div>
							</div>
							
						<?php elseif (! woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

							<?php wc_get_template('loop/no-products-found.php'); ?>

						<?php endif; ?>

					<?php
						/**
						 * woocommerce_after_main_content hook
						 *
						 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
						 */
						do_action('woocommerce_after_main_content');
					?>

					<?php
						/**
						 * woocommerce_sidebar hook
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						//do_action('woocommerce_sidebar');
					?>
					</div>
				</div>
				
				<?php if($rossi_options['sidebar_pos']=='right') :?>
					<?php get_sidebar('category'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<script>
	(function($) {
		"use strict";
		jQuery(document).ready(function(){
			jQuery('.view-mode').each(function(){
			<?php if($rossi_options['layout_product']=='gridview') { ?>
				/* Grid View */					
				jQuery('#archive-product .view-mode').find('.grid').addClass('active');
				jQuery('#archive-product .view-mode').find('.list').removeClass('active');
				
				jQuery('#archive-product .shop-products').removeClass('list-view');
				jQuery('#archive-product .shop-products').addClass('grid-view');
				
				jQuery('#archive-product .list-col4').removeClass('col-xs-12 col-sm-6 col-lg-4');
				jQuery('#archive-product .list-col8').removeClass('col-xs-12 col-sm-6 col-lg-8');
			<?php } ?>
			<?php if($rossi_options['layout_product']=='listview') { ?>
				/* List View */								
				jQuery('#archive-product .view-mode').find('.list').addClass('active');
				jQuery('#archive-product .view-mode').find('.grid').removeClass('active');
				
				jQuery('#archive-product .shop-products').addClass('list-view');
				jQuery('#archive-product .shop-products').removeClass('grid-view');
				
				jQuery('#archive-product .list-col4').addClass('col-xs-12 col-sm-6 col-lg-4');
				jQuery('#archive-product .list-col8').addClass('col-xs-12 col-sm-6 col-lg-8');
			<?php } ?>
			});
		});
	})(jQuery);
</script>
<?php get_footer('shop'); ?>