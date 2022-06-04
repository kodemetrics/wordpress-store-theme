<?php
/**
 * Kapamau
 *

 /** Set the content width based on the theme's design and stylesheet. */

if ( ! isset( $content_width ) ) {
	          $content_width = 640;
}

function theme_setup() {

	/*Add default posts and comments RSS feed links to head.*/
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'custom-logo', array(
		'height'      => 65,
		'width'       => 240,
		'flex-height' => true,
	  'flex-width'  => true,
	  'header-text' => array( 'site-title', 'site-description' ),
	) );


	// Make theme available for translation,translations can be filed in the /languages/ directory
	// load_theme_textdomain('converio', get_template_directory() . '/languages');

    /* This theme uses wp_nav_menu() in three location. */
    register_nav_menus(
			array(
        'primary' => __( 'Primary Menu', 'theme' ),
				'footer' => __( 'Footer Menu', 'theme' )
			));

	/* Switch default core markup for search form, comment form, and comments to output valid HTML5.*/
	add_theme_support( 'html5', array('search-form','comment-form','comment-list','gallery','caption',) );

	/* Enable support for Post Formats.*/
	add_theme_support( 'post-formats', array('aside','image','video','quote','link','gallery','status','audio','chat',) );

	//support woocommerce
	add_theme_support( 'woocommerce' );
}

  add_action( 'after_setup_theme', 'theme_setup' );
  remove_action('wp_head', 'wp_generator');



function theme_widgets_init() {

   register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="box-icon"><h5 >',
		'after_title'   => '</h5></div>',
	) );

	register_sidebar( array(
		 'name'          => esc_html__( 'HM Widget Area', 'theme' ),
		 'id'            => 'hm-sidebar',
		 'description'   => '',
		 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		 'after_widget'  => '</aside>',
		 'before_title'  => '<div class="box-icon"><h5 >',
		 'after_title'   => '</h5></div>',
  ));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1 Widget Area', 'theme' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2 Widget Area', 'theme' ),
		'id'            => 'footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3 Widget Area', 'theme' ),
		'id'            => 'footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widgets %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'theme_widgets_init' );


	function theme_add_file_types_to_uploads($file_types){
			$new_filetypes = array();
			$new_filetypes['svg'] = 'image/svg+xml';
			$file_types = array_merge($file_types, $new_filetypes );
			return $file_types;
	}
	add_filter('upload_mimes', 'theme_add_file_types_to_uploads');


  function theme_scripts() {

	// Font Stylesheet.
	wp_enqueue_style( 'font-01',  'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700&display=swap' );
	wp_enqueue_style( 'font-02',  'https://fonts.googleapis.com/css?family=Poppins:200,300,400,600' );
	wp_enqueue_style( 'font-03',  'https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:100,200,300,400,500,600,700|Saira:100,200,300,400,500,600&display=swap');
    //wp_enqueue_style( 'material-design-icons','https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css');

    //Loads Stylesheet file with functionality specific to the theme.
  // wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap-.css', array(), '', 'all' );
	// wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
	// wp_enqueue_style( 'owl-theme-default-css', get_template_directory_uri() . '/assets/css/owl.theme.default.css' );
	// wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css' );
	// wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
	// wp_enqueue_style( 'widget-01', get_template_directory_uri() . '/assets/css/widget.css' );
	// wp_enqueue_style( 'widget-02', get_template_directory_uri() . '/assets/css/widgets.css' );
	// wp_enqueue_style( 'jquery-ui-2020', get_template_directory_uri() . '/assets/css/jquery-ui-2020.css' );
	// wp_enqueue_style( 'material-design-icons', get_template_directory_uri() . '/assets/css/material-design-icons/css/material-design-iconic-font.min.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' );


  // Loads JavaScript file with functionality specific to the theme.
    wp_enqueue_script( 'jquery-00', get_template_directory_uri() . '/assets/js/jquery-2.1.4.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'scrollUp-js', get_template_directory_uri() . '/assets/js/scrollUp.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'index-js', get_template_directory_uri() . '/assets/js/index.js', array( 'jquery' ), '', true );

	  if ( is_page_template( 'template-contact.php' ) ) {
		//wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', array(), '', 'all' );
		//wp_enqueue_style('font-Abel+Icons','https://fonts.googleapis.com/css?family=Abel');
	  }else if(is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		//wp_enqueue_script( 'comment-reply' );
	  }
  }
    add_action( 'wp_enqueue_scripts', 'theme_scripts' );
    add_filter('use_block_editor_for_post', '__return_false');


// add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
// function load_admin_styles() {
//     wp_enqueue_style( 'custom_admin_css', get_template_directory_uri() . '/style.css', false, '1.0.0' );
// }



/**
 * ============================================================================
 * Loading components.
 * ============================================================================
 * require_once get_template_directory() . '/inc/silder.php';
 * woocommerce/checkout/form-checkout.php
 * woocommerce/myaccount/form-login.php
 */
require_once get_template_directory() . '/inc/tmg-plugin-registration.php';
require_once get_template_directory() . '/inc/nav-walker.php';
require_once get_template_directory() . '/inc/post-silde.php';
require_once get_template_directory() . '/inc/banner.php';
require_once get_template_directory() . '/inc/general.php';
require_once get_template_directory() . '/inc/social.php';
require_once get_template_directory() . '/inc/shop.php';
require_once get_template_directory() . '/inc/customize.php';
// require_once get_template_directory() . '/inc/woocommerce-support.php';
require_once get_template_directory() . '/widget/recent-category.php';
require_once get_template_directory() . '/widget/social.php';
require_once get_template_directory() . '/widget/author.php';
require_once get_template_directory() . '/widget/adverts.php';
require_once get_template_directory() . '/widget/recent-blog-posts.php';
require_once get_template_directory() . '/widget/popular-blog-posts.php';
require_once get_template_directory() . '/widget/recent-comments.php';
//require_once get_template_directory() . '/woocommerce/custom-product.php';


//check if woocommerce plugin is activated
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) {
			return true;
		}
		else {
			return false;
		}
	}
}


//showing cart header menu item
function converio_cart_menu_item() {
if(is_woocommerce_activated()){
?>

<li class="border"><a class="cart collapsed" data-target=".shopping-bag" href="javascript:;">
	<span class="cart-icon"><?php esc_attr_e('Cart','converio');?></span>

	<?php
	global $woocommerce;
	$my_cart_count = $woocommerce->cart->cart_contents_count;

		echo '<span class="cart-number-box';
		if ($my_cart_count > 0) {
	 		echo ' active';
		}
		echo '">';echo sprintf( _n('%d', '%d', $woocommerce->cart->cart_contents_count, 'converio' ), $woocommerce->cart->cart_contents_count );
		echo '</span>';
	?>
	</a></li>
<?php }
}



// <div class="sassy-cart"> <a href="http://"><i class="fa fa-shopping-cart"></i></a>  </div>
function theme_cart_count() {
	if(is_woocommerce_activated()){
	?>
	   <div class="sassy-cart"> <a href="<?php echo site_url("cart")?>">
		   <i class="fa fa-shopping-cart"></i>
		<?php
		global $woocommerce;
		$my_cart_count = $woocommerce->cart->cart_contents_count;

			echo '<span class="cart-number-box';
			if ($my_cart_count > 0) {
		 		echo ' active';
			}
			echo '">';echo sprintf( _n('%d', '%d', $woocommerce->cart->cart_contents_count, 'converio' ), $woocommerce->cart->cart_contents_count );
			echo '</span>';
		?>
    	</a>  </div>
	<?php }
}


?>
