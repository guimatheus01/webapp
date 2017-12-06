<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

	if ( $related_products ) : ?>

		<section class="related products">

			<h2><?php esc_html_e( 'Related products', 'tokopress' ); ?></h2>

			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
				 	$post_object = get_post( $related_product->get_id() );
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

	if ( empty( $product ) || ! $product->exists() ) {
		return;
	}

	$related = $product->get_related( $posts_per_page );

	if ( sizeof( $related ) == 0 ) return;

	$args = apply_filters( 'woocommerce_related_products_args', array(
		'post_type'            => 'product',
		'ignore_sticky_posts'  => 1,
		'no_found_rows'        => 1,
		'posts_per_page'       => $posts_per_page,
		'orderby'              => $orderby,
		'post__in'             => $related,
		'post__not_in'         => array( $product->id )
	) );

	$products = new WP_Query( $args );

	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<div class="related products">

			<h2><?php _e( 'Related Products', 'tokopress' ); ?></h2>

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
