<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( version_compare( WC_VERSION, '3.0.0', '>=' ) ) : 

	if ( $upsells ) : ?>

		<section class="up-sells upsells products">

			<h2><?php esc_html_e( 'You may also like&hellip;', 'tokopress' ) ?></h2>

			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $upsells as $upsell ) : ?>

					<?php
				 	$post_object = get_post( $upsell->get_id() );
					setup_postdata( $GLOBALS['post'] =& $post_object );
					?>

					<?php if( "alt" == of_get_option( 'tokopress_wc_products_style' ) ) : ?>
						<?php wc_get_template_part( 'content-product', 'alt' ); ?>
					<?php else : ?>
						<?php wc_get_template_part( 'content-product' ); ?>
					<?php endif; ?>

				<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>

		</section>

	<?php endif;

	wp_reset_postdata();

elseif ( version_compare( WC_VERSION, '3.0.0', '<' ) ) : 
	
	global $product, $woocommerce_loop;

	$upsells = $product->get_upsells();

	if ( sizeof( $upsells ) == 0 ) return;

	$meta_query = WC()->query->get_meta_query();

	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => $posts_per_page,
		'orderby'             => $orderby,
		'post__in'            => $upsells,
		'post__not_in'        => array( $product->id ),
		'meta_query'          => $meta_query
	);

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<div class="upsells products">

			<h2><?php _e( 'You may also like&hellip;', 'tokopress' ) ?></h2>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php if( "alt" == of_get_option( 'tokopress_wc_products_style' ) ) : ?>
						<?php wc_get_template_part( 'content-product', 'alt' ); ?>
					<?php else : ?>
						<?php wc_get_template_part( 'content-product' ); ?>
					<?php endif; ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		</div>

	<?php endif;

	wp_reset_postdata();

endif; 
