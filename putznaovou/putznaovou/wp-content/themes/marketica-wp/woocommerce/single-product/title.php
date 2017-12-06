<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author     WooThemes
 * @package    WooCommerce/Templates
 * @version    3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
	if ( of_get_option( 'tokopress_wc_hide_product_header' ) ) {
		the_title( '<h1 class="product_title entry-title">', '</h1>' );
	}
}
else {
	if ( of_get_option( 'tokopress_wc_hide_product_header' ) ) {
		the_title( '<h1 itemprop="name" class="product_title entry-title">', '</h1>' );
	}
	else {
		echo '<meta itemprop="name" content="'.esc_attr( get_the_title() ).'" />';
	}
}
