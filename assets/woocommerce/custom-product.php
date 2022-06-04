<?php

add_filter("the_content", "slt_content_filter");
add_filter('widget_text','do_shortcode');

function slt_content_filter($content) {
// array of custom shortcodes requiring the fix
$block = join("|",array("h1","h2","xproduct","tm-product"));
// opening tag
$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
// closing tag
$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
return $rep;
}

add_shortcode('xproduct', 'getSequence');
function getSequence(){
  global $product, $woocommerce_loop;
  global $rossi_options;

  // $upsells = $product->get_upsells();
  // if (sizeof($upsells) == 0) return;

  // $meta_query = WC()->query->get_meta_query();
  // $args = array(
  // 	'post_type'           => 'product',
  // 	'ignore_sticky_posts' => 1,
  // 	'no_found_rows'       => 1,
  // 	'posts_per_page'      => $posts_per_page,
  // 	'orderby'             => $orderby,
  // 	'post__in'            => $upsells,
  // 	'post__not_in'        => array($product->id),
  // 	'meta_query'          => $meta_query
  // );

  $args = array('post_type' => 'product');

  $products = new WP_Query($args);
  $woocommerce_loop['columns'] = 3;

  if ($products->have_posts()) :
  ?>
  <!-- <div class="widget upsells_products_widget ">
  	<h3 class="vg-title widget-title">
      <span><?php echo esc_html($rossi_options['upsells_title']); ?> </span>
    </h3>

  	<div class="upsells products"> -->
     	<div class="woocommerce columns-4 row">


  			<?php while($products->have_posts()) : $products->the_post(); ?>

  				<?php wc_get_template_part('content', 'product02'); ?>

  			<?php endwhile; // end of the loop. ?>


    </div>
<!--
  	</div>
  </div> -->
  <?php endif;

  wp_reset_postdata();
}

 add_shortcode('tm-product', 'thm_product');
 function thm_product($atts, $content = null){
   extract(shortcode_atts(array(
         'title' => '',
         'columns' => '3',
         'limit' => '',
         'category' => '',
         'sale' => 'false'
 		 ), $atts));

     $out = '<div class="thm-product">';
     $out .= '<div class="thm-product-title"><h3>'.$title.'</h3></div>';
  	  #  echo do_shortcode('[products category="'.$category.'" columns="'.$columns.'" limit="'.$limit.'"]');
     $out .= do_shortcode('[products category="'.$category.'" columns="'.$columns.'" limit="'.$limit.'" on_sale="'.$sale.'"]');
     $out .= '</div>';
     return $out;
}



 ?>
