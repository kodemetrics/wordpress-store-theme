<?php
/**
 * Woocommerce Compare page
 *
 * @author Your Inspiration Themes
 * @package YITH Woocommerce Compare
 * @version 1.1.4
 */

// remove the style of woocommerce
if( defined('WOOCOMMERCE_USE_CSS') && WOOCOMMERCE_USE_CSS ) wp_dequeue_style('woocommerce_frontend_styles');

$is_iframe = (bool)( isset( $_REQUEST['iframe'] ) && $_REQUEST['iframe'] );

wp_enqueue_script( 'jquery-fixedheadertable', YITH_WOOCOMPARE_ASSETS_URL . '/js/jquery.dataTables.min.js', array('jquery'), '1.3', true );
wp_enqueue_script( 'jquery-fixedcolumns', YITH_WOOCOMPARE_ASSETS_URL . '/js/FixedColumns.min.js', array('jquery', 'jquery-fixedheadertable'), '1.3', true );

$widths = array();
foreach( $products as $product ) $widths[] = '{ "sWidth": "205px", resizeable:true }';

/** FIX WOO 2.1 */
$wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';

$table_text = get_option( 'yith_woocompare_table_text' );
$localized_table_text = function_exists( 'icl_translate' ) ? icl_translate( 'Plugins', 'plugin_yit_compare_table_text', $table_text ) : $table_text;

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if gt IE 9]>
<html class="ie"<?php language_attributes() ?>>
<![endif]-->
<!--[if !IE]>
<html <?php language_attributes() ?>>
<![endif]-->

<!-- START HEAD -->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />

    <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" />-->
    <link rel="stylesheet" href="<?php echo esc_url($this->stylesheet_url()) ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/colorbox.css"/>
    <link rel="stylesheet" href="<?php echo YITH_WOOCOMPARE_URL ?>assets/css/jquery.dataTables.css"/>

    <?php wp_head() ?>

    <style type="text/css">
		body {
			font-family:  'calibri';
		}
        body.loading {
            background: url("<?php echo YITH_WOOCOMPARE_URL ?>assets/images/colorbox/loading.gif") no-repeat scroll center center transparent;
        }
		table.compare-list tr.price {
			width: 100%;
			font-size: 20px;
			color: #444;
			font-weight: bold;
			margin: 10px 0 12px;
		}
		table.compare-list tr.price > td {
			text-decoration: blink;
		}
		table.compare-list tr.price .old-price {
		  margin: 0;
		  color: #888888;
		  text-decoration: line-through;
		  font-size: 14px;
		}
		table.compare-list tr.price .old-price .amount {
		  margin: 0 5px 0 0;
		}
		table.compare-list tr.price .special-price {
		  display: inline-block;
		  margin: 0;
		}
		.atc-notice-wrapper,.quickview-wrapper {
			display: none;
		}
		.vgwc-product-price,
		.product-price,
		.compare-list .price,
		.price {
		  font-size: 20px !important;
		  color: #444 !important;
		  font-weight: bold;
		  margin: 10px 0 12px;
		}
		.vgwc-product-price .old-price,
		.vgwc-product-price del,
		.product-price .old-price,
		.product-price del,
		.compare-list .price .old-price,
		.compare-list .price del,
		.price .old-price,
		.price del {
		  margin: 0;
		  color: #888;
		  text-decoration: line-through;
		  font-size: 14px;
		  line-height: 16px;
		  opacity: 1 !important;
		  filter: alpha(opacity=100) !important;
		}
		.vgwc-product-price .old-price .amount,
		.vgwc-product-price del .amount,
		.product-price .old-price .amount,
		.product-price del .amount,
		.compare-list .price .old-price .amount,
		.compare-list .price del .amount,
		.price .old-price .amount,
		.price del .amount {
		  margin: 0 5px 0 0;
		}
		.vgwc-product-price .special-price,
		.vgwc-product-price ins,
		.product-price .special-price,
		.product-price ins,
		.compare-list .price .special-price,
		.compare-list .price ins,
		.price .special-price,
		.price ins {
		  display: inline-block;
		  margin: 0;
		  text-decoration: blink !important;
		}
		.vgwc-product-price > .amount:first-child,
		.product-price > .amount:first-child,
		.compare-list .price > .amount:first-child,
		.price > .amount:first-child {
		  margin: 0 5px 0 0;
		}
		.vgwc-product-price > .amount:last-child,
		.product-price > .amount:last-child,
		.compare-list .price > .amount:last-child,
		.price > .amount:last-child {
		  margin: 0 0 0 5px;
		}
		.vgwc-product-price.price-variable .amount:first-child,
		.product-price.price-variable .amount:first-child,
		.compare-list .price.price-variable .amount:first-child,
		.price.price-variable .amount:first-child {
		  margin: 0 5px 0 0;
		}
		.vgwc-product-price.price-variable .amount:last-child,
		.product-price.price-variable .amount:last-child,
		.compare-list .price.price-variable .amount:last-child,
		.price.price-variable .amount:last-child {
		  margin: 0 0 0 5px;
		}
		.vgwc-item .vgwc-product-price.price-variable del,
		.vgwc-item .product-price.price-variable del,
		.vgwc-item .compare-list .price.price-variable del,
		.vgwc-item .price.price-variable del {
		  display: none;
		}
    </style>
</head>
<!-- END HEAD -->

<?php global $product; ?>

<!-- START BODY -->
<body <?php body_class('woocommerce') ?>>

<h1>
    <?php echo $localized_table_text ?>
    <?php if ( ! $is_iframe ) : ?><a class="close" href="#"><?php esc_html_e( 'Close window [X]', 'rossi' ) ?></a><?php endif; ?>
</h1>

<?php do_action( 'yith_woocompare_before_main_table' ); ?>

<table class="compare-list" cellpadding="0" cellspacing="0"<?php if ( empty( $products ) ) echo ' style="width:100%"' ?>>
    <thead>
    <tr>
        <th>&nbsp;</th>
        <?php foreach( $products as $i => $product ) : ?>
            <td></td>
        <?php endforeach; ?>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>&nbsp;</th>
        <?php foreach( $products as $i => $product ) : ?>
            <td></td>
        <?php endforeach; ?>
    </tr>
    </tfoot>
    <tbody>

    <?php if ( empty( $products ) ) : ?>

        <tr class="no-products">
            <td><?php esc_html_e( 'No products added in the compare table.', 'rossi' ) ?></td>
        </tr>

    <?php else : ?>
        <tr class="remove">
            <th>&nbsp;</th>
            <?php foreach( $products as $i => $product ) : $product_class = ( $i % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product->id ?>
                <td class="<?php echo esc_attr($product_class); ?>">
                    <a href="<?php echo add_query_arg( 'redirect', 'view', $this->remove_product_url( $product->id ) ) ?>" data-product_id="<?php echo esc_attr($product->id); ?>"><?php esc_html_e( 'Remove', 'rossi' ) ?> <span class="remove">x</span></a>
                </td>
            <?php endforeach ?>
        </tr>

        <?php foreach ( $fields as $field => $name ) : ?>

            <tr class="<?php echo esc_attr($field); ?>">

                <th>
                    <?php echo $name ?>
                    <?php if ( $field == 'image' ) echo '<div class="fixed-th"></div>'; ?>
                </th>

                <?php foreach( $products as $i => $product ) : $product_class = ( $i % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product->id; ?>
                    <td class="<?php echo esc_attr($product_class); ?>"><?php
                        switch( $field ) {

                            case 'image':
                                echo '<div class="image-wrap">' . wp_get_attachment_image( $product->fields[$field], 'yith-woocompare-image' ) . '</div>';
                                break;

                            case 'add-to-cart':
                                $wc_get_template( 'loop/add-to-cart.php' );
                                break;

                            default:
                                echo empty( $product->fields[$field] ) ? '&nbsp;' : $product->fields[$field];
                                break;
                        }
                        ?>
                    </td>
                <?php endforeach ?>

            </tr>

        <?php endforeach; ?>

        <?php if ( $repeat_price == 'yes' && isset( $fields['price'] ) ) : ?>
            <tr class="price repeated">
                <th><?php echo $fields['price'] ?></th>

                <?php foreach( $products as $i => $product ) : $product_class = ( $i % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product->id ?>
                    <td class="<?php echo esc_attr($product_class) ?>"><?php echo $product->fields['price'] ?></td>
                <?php endforeach; ?>

            </tr>
        <?php endif; ?>

        <?php if ( $repeat_add_to_cart == 'yes' && isset( $fields['add-to-cart'] ) ) : ?>
            <tr class="add-to-cart repeated">
                <th><?php echo $fields['add-to-cart'] ?></th>

                <?php foreach( $products as $i => $product ) : $product_class = ( $i % 2 == 0 ? 'odd' : 'even' ) . ' product_' . $product->id ?>
                    <td class="<?php echo esc_attr($product_class) ?>"><?php $wc_get_template( 'loop/add-to-cart.php' ); ?></td>
                <?php endforeach; ?>

            </tr>
        <?php endif; ?>

    <?php endif; ?>

    </tbody>
</table>

<?php do_action( 'yith_woocompare_after_main_table' ); ?>

<?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?><?php if( wp_script_is( 'responsive-theme', 'enqueued' ) ) wp_dequeue_script( 'responsive-theme' ) ?>
<?php do_action('wp_print_footer_scripts'); ?>

<script type="text/javascript">

    jQuery(document).ready(function($){
        <?php if ( $is_iframe ) : ?>$('a').attr('target', '_parent');<?php endif; ?>

        var oTable;
        $('body').on( 'yith_woocompare_render_table', function(){
            if( $( window ).width() > 767 ) {
                oTable = $('table.compare-list').dataTable( {
                    "sScrollX": "100%",
                    //"sScrollXInner": "150%",
                    "bScrollInfinite": true,
                    "bScrollCollapse": true,
                    "bPaginate": false,
                    "bSort": false,
                    "bInfo": false,
                    "bFilter": false,
                    "bAutoWidth": false
                } );

                new FixedColumns( oTable );
                $('<table class="compare-list" />').insertAfter( $('h1') ).hide();
            }
        }).trigger('yith_woocompare_render_table');

        // add to cart
        var button_clicked;
        $(document).on('click', 'a.add_to_cart_button', function(){
            button_clicked = $(this);
            button_clicked.block({message: null, overlayCSS: {background: '#fff url(' + woocommerce_params.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6}});
        });

        // remove add to cart button after added
        $('body').on('added_to_cart', function( ev, fragments, cart_hash, button ){
            button_clicked.hide();

            <?php if ( $is_iframe ) : ?>
            $('a').attr('target', '_parent');

            // Replace fragments
            if ( fragments ) {
                $.each(fragments, function(key, value) {
                    $(key, window.parent.document).replaceWith(value);
                });
            }
            <?php endif; ?>
        });

        // close window
        $(document).on( 'click', 'a.close', function(e){
            e.preventDefault();
            window.close();
        });

        $(window).on( 'yith_woocompare_product_removed', function(){
            if( $( window ).width() > 767 ) {
                oTable.fnDestroy(true);
            }
            $('body').trigger('yith_woocompare_render_table');
        });

    });

</script>

</body>
</html>