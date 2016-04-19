<?php
// DEV
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Definitions
	define( 'THEME_DIR', get_bloginfo('stylesheet_directory'));
	define( 'DT_SERVER_DIR', get_template_directory());
	define( 'DT_THEME_DIR', get_template_directory_uri());

	define( 'DT_SITE_URL', get_bloginfo('url'));
	define( 'DT_SITE_NAME', get_bloginfo('name'));
	define( 'DT_SITE_DESCRIPTION', get_bloginfo('description'));

	define( 'DT_INC_DIR', DT_THEME_DIR . '/assets/inc/' );
	define( 'DT_JS_DIR', DT_THEME_DIR . '/assets/js/min' );
	define( 'DT_CSS_DIR', DT_THEME_DIR . '/assets/css' );
	define( 'DT_BOWER_DIR', DT_THEME_DIR . '/bower_components');

// Includes
	require_once 'inc/add_menus.php';
	require_once 'inc/add_styles_scripts.php';
	require_once 'inc/add_widgets.php';

	require_once 'inc/filter_bootstrap_pagination.php';
	require_once 'inc/filter_gallery.php';
	require_once 'inc/filter_mod_head.php';
	require_once 'inc/filter_page_excerpts.php';
	require_once 'inc/filter_widget_shortcodes.php';
	require_once 'inc/filter_dashboard_widget.php';

	require_once 'inc/function_get_vid_thumb.php';

	require_once 'inc/plug_category_images.php';
    require_once 'inc/filter_woo.php';
	
// Custom Post Types
	require_once 'inc/cpt_slider.php';
	// Add image sizes
	add_theme_support( 'post-thumbnails' );
	add_image_size('slider', 960, 9999, true);


// Woocommerce
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

function my_woocommerce_catalog_orderby( $orderby ) {
    unset($orderby["rating"]);
    return $orderby;
}
add_filter( "woocommerce_catalog_orderby", "my_woocommerce_catalog_orderby", 20 );

/*---Move Product Title*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 5 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

function wc_custom_single_addtocart_text() {
    return "Toevoegen aan winkelmand";
}
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wc_custom_single_addtocart_text' );

function my_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
        $count = WC()->cart->cart_contents_count;
        ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a><?php
    }
 
}
add_action( 'your_theme_header_top', 'my_wc_cart_count' );

?>