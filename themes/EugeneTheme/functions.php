<?php

/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');

/**
 *added some styles
 */
function register_custom_styles()
{
	wp_enqueue_style( "reset_styles", get_template_directory_uri()."/bootstrap-4.4.1/css/bootstrap-reboot.min.css");
	wp_enqueue_style( "custom_styles", get_template_directory_uri()."/css/styles.css");
	wp_enqueue_style( "bootstrap_styles", get_template_directory_uri()."/bootstrap-4.4.1/css/bootstrap.min.css");
	wp_enqueue_style( "fontawesome", get_template_directory_uri()."/fontawesome-5.13.0/css/all.min.css");
	wp_enqueue_style( "fancybox", "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css");
}
add_action('wp_enqueue_scripts', 'register_custom_styles');

/**
 *added some scripts
 */
function register_custom_scripts()
{
	wp_enqueue_script( "jquery", get_template_directory_uri()."/js/jquery-3.4.1.js");
	wp_enqueue_script( "main_js", get_template_directory_uri()."/js/main.js");
	wp_enqueue_script( "bootstrap", get_template_directory_uri()."/bootstrap-4.4.1/js/bootstrap.bundle.min.js");
	wp_enqueue_script( "fancybox", "https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js");
}
add_action('wp_enqueue_scripts', 'register_custom_scripts');

add_theme_support( 'menus' );

/**
 *added some widgets for sidebars
 */
function register_wp_sidebars() {
	register_sidebar(
		array(
			'id' => 'sidebar-left',
			'name' => 'sidebar-left',
			'description' => 'sidebar on the left side',
			'before_widget' => '<div id="%1$s" class="container pr-0 left-sidebar %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
		)
	);
}
add_action('widgets_init', 'register_wp_sidebars');

/**
 *added some metaboxes in page redactor of admin panel
 */
function custom_meta_boxes() {
	add_meta_box('sidebar-options', 'Sidebar options', 'sidebar_options_content', 'page', 'normal', 'high');
}

add_action('admin_menu', 'custom_meta_boxes');

function sidebar_options_content($post) {
	wp_nonce_field( basename( __FILE__ ), 'seo_metabox_nonce' );

	$html .= '<input type="checkbox" name="use_sidebar"';
	$html .= (get_post_meta($post->ID, 'use_sidebar',true) == 'on') ? ' checked="checked"' : '';
	$html .= ' />';

	$html .= '<span> Use sidebar for this page</span>';

	echo $html;
}

function sidebar_options_save_box_data ( $post_id ) {
	if ( !isset( $_POST['seo_metabox_nonce'] )
		|| !wp_verify_nonce( $_POST['seo_metabox_nonce'], basename( __FILE__ ) ) )
		return $post_id;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	$post = get_post($post_id);
	if ($post->post_type == 'page') {
		update_post_meta($post_id, 'use_sidebar', $_POST['use_sidebar']);
	}
	return $post_id;
}
add_action('save_post', 'sidebar_options_save_box_data');
//

/**
 *added some classes for all menu links (<a> tags)
 */
function add_menuclass($ulclass) {
	return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');

/**
 * added woocommerce support
 */
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
add_theme_support( 'wc-product-gallery-slider' );
//add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_filter( 'woocommerce_show_page_title', '__return_false' );
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );

/**
 * deleted sitename in output of function wp_get_document_title()
 */ 
add_filter( 'document_title_parts', function( $parts ){
	if( isset($parts['site']) ) unset($parts['site']);
	return $parts;
});

/**
 * added js script for checkout form, that deliver product name and code from $_REQUEST to hidden fiels
 */
function checkout_script() {
	if (is_page(151)) {
		if($_REQUEST['product_id'] != NULL || $_REQUEST["wpforms"]["submit"] == "wpforms-submit") {
			wp_enqueue_script('checkout_script', get_template_directory_uri() . '/js/checkout_script.js');
			$params = $_REQUEST;
			wp_localize_script('checkout_script', '_request', $params);
		}
		else {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			get_template_part('header');
			get_template_part( 404 ); exit();
		}
	}
}
add_action( 'wp_enqueue_scripts', 'checkout_script' );

/**
 * disabled woocommerce default sidebar
 */
function disable_woo_commerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10); 
}
add_action('init', 'disable_woo_commerce_sidebar');

/**
 *views counter for page
 */
add_action( 'wp_head', 'get_postviews' );
function get_postviews( $args = [] ){
	global $user_ID, $post, $wpdb;
	if( ! $post || ! is_singular() )
		return;
	$rg = (object) wp_parse_args( $args, [
		//meta key for post where will be saved views count
		'meta_key' => 'views',
		//0 - All. 1 - Only guests. 2 - Only authorized users.
		'who_count' => 0,
		'exclude_bots' => true,
	] );
	$do_count = false;
	switch( $rg->who_count ){
		case 0:
		$do_count = true;
		break;
		case 1:
		if( ! $user_ID )
			$do_count = true;
		break;
		case 2:
		if( $user_ID )
			$do_count = true;
		break;
	}
	if( $do_count && $rg->exclude_bots ){
		$notbot = 'Mozilla|Opera'; // Chrome|Safari|Firefox|Netscape == Mozilla
		$bot = 'Bot/|robot|Slurp/|yahoo';
		if(
			! preg_match( "/$notbot/i", $_SERVER['HTTP_USER_AGENT'] ) ||
			preg_match( "~$bot~i", $_SERVER['HTTP_USER_AGENT'] )
		){
			$do_count = false;
		}
	}
	if( $do_count ){
		$up = $wpdb->query( $wpdb->prepare(
			"UPDATE $wpdb->postmeta SET meta_value = (meta_value+1) WHERE post_id = %d AND meta_key = %s", $post->ID, $rg->meta_key
		) );
		if( ! $up )
			add_post_meta( $post->ID, $rg->meta_key, 1, true );
		wp_cache_delete( $post->ID, 'post_meta' );
	}
}

