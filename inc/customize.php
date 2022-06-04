<?php

function get_breadcrumb() {
    echo '<ul><li><a href="'.home_url().'" rel="follow">Home</a></li>';
    if (is_category() || is_single()) {
        echo "<li>";
        the_category(' &bull; ');
           echo "</li>";
            if (is_single()) {
                echo "<li><a>";
                the_title();
                echo "</a></li>";
            }
    } elseif (is_page()) {
        echo "<li><a>";
        echo the_title();
         echo "</a></li>";
    } elseif (is_author()) {
        echo "<li><a>";
        echo get_the_author();
        echo "</a></li>";
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }elseif (is_shop()) {
      echo "string";
    }elseif (is_product()) {
      echo "string";
    }
}


/*
function get_breadcrumb() {
    if (is_shop()) {
      return woocommerce_breadcrumb();
    }elseif (is_product()) {
      return woocommerce_breadcrumb();
    }elseif (is_product_category()) {
      return woocommerce_breadcrumb();
    }else{
          echo '<ul><li><a href="'.home_url().'" rel="follow">Home</a></li>';
          if (is_category() || is_single()) {
              echo "<li>";
              the_category(' &bull; ');
                 echo "</li>";
                  if (is_single()) {
                      echo "<li><a>";
                      the_title();
                      echo "</a></li>";
                  }
          } elseif (is_page()) {
              echo "<li><a>";
              echo the_title();
               echo "</a></li>";
          } elseif (is_author()) {
              echo "<li><a>";
              echo get_the_author();
              echo "</a></li>";
          } elseif (is_search()) {
              echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
              echo '"<em>';
              echo the_search_query();
              echo '</em>"';
          }
    }
}

*/


	function add_img_title( $attr, $attachment = null ) {
	    $img_title = trim( strip_tags( $attachment->post_title ) );

	    $attr['title'] = the_title_attribute( 'echo=0' );
	    $attr['alt'] = $img_title;
	    return $attr;
	}
	add_filter( 'wp_get_attachment_image_attributes','add_img_title', 10, 2 );

	function custom_excerpt_length( $length ) {
	  	return 20 ;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function wpdocs_excerpt_more( $more ) {
         return '..';
    }
    add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



	function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'year',
	        'm' => 'month',
	        'w' => 'week',
	        'd' => 'day',
	        'h' => 'hour',
	        'i' => 'minute',
	        's' => 'second',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' ago' : 'just now';
   }


   	if ( ! function_exists( 'theme_pagination' ) ) :
	/* Pagination */
	function theme_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$translated = __( 'Page', 'mytextdomain' ); // Supply translatable string


	    echo '<div class="pagination-link">';
	    echo paginate_links( array(
	    	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    	'format' => '?paged=%#%',
	    	'current' => max( 1, get_query_var('paged') ),
	    	'total' => $wp_query->max_num_pages
	    ) );

	        echo '</div>';
	}
	endif;

	?>
