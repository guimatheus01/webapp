<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

if ( version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
	$attachment_ids = $product->get_gallery_image_ids();
}
else {
	$attachment_ids = $product->get_gallery_attachment_ids();
}
$attachment_count = count( $attachment_ids );

if ( $attachment_count > 0 ) {
	echo '<div class="thumbnails owl-carousel woocommerce-product-gallery">';
}
else {
	echo '<div class="thumbnails woocommerce-product-gallery">';
}

if ( has_post_thumbnail() ) {

	$image_id = get_post_thumbnail_id();

	$image_title = esc_attr( get_the_title( $image_id ) );
	$full_size_image  = wp_get_attachment_image_src( $image_id, 'full' );
	$attributes = array(
		'title'                   => $image_title,
		'data-src'                => $full_size_image[0],
		'data-large_image'        => $full_size_image[0],
		'data-large_image_width'  => $full_size_image[1],
		'data-large_image_height' => $full_size_image[2],
	);
	$image_link = $full_size_image[0];
	$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), $attributes );

	if ( $attachment_count > 0 ) {
		$gallery = '[product-gallery]';
	} 
	else {
		$gallery = '';
	}

	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="woocommerce-product-gallery__image"><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a></div>', $image_link, $image_title, $image ), $post->ID );

}
else {

	echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="woocommerce-product-gallery__image"><a href="#"><img src="%s" alt="Placeholder" /></a></div>', wc_placeholder_img_src() ), $post->ID );

}

if ( $attachment_ids ) {

		$loop = 0;

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			$full_size_image  = wp_get_attachment_image_src( $attachment_id, 'full' );
			if ( empty($full_size_image) ) 
				continue;

			$image_title = esc_attr( get_the_title( $attachment_id ) );
			$attributes = array(
				'title'                   => $image_title,
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);
			$image_link = $full_size_image[0];

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), false, $attributes );
			$image_class = esc_attr( implode( ' ', $classes ) );
			$image_title = esc_attr( get_the_title( $attachment_id ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="woocommerce-product-gallery__image"><a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a></div>', $image_link, $image_class, $image_title, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

}
echo '</div>';
