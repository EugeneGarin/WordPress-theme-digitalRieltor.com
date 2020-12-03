<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.
function my_get_the_product_thumbnail_url( $size = 'shop_catalog' ) {
	global $post;
	$image_size = apply_filters( 'single_product_archive_thumbnail_size', $size );
	return get_the_post_thumbnail_url( $post->ID, $image_size );
}
if ( $product->is_in_stock() ) : ?>

	<form method="post" action="<?=site_url()?>/сторінка-оформлення-заяви/" class="checkout_button text-center text-md-left">
		<input type="hidden" name="product_id" value="<?=$product->get_id()?>">
		<input type="hidden" name="product_name" value="<?=$product->get_name()?>">
		<input type="hidden" name="product_price" value="<?=$product->get_price()?>">
		<input type="hidden" name="product_short_description" value="<?=$product->get_short_description()?>">
		<input type="hidden" name="product_image_url" value='<?=my_get_the_product_thumbnail_url();?>'>
		<input type="submit" value="Оформити заяву" class="checkout_button_submit" >
	</form>

<?php endif; ?>
