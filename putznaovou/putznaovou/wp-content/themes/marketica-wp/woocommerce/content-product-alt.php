<?php
/**
 * Aditional WooCommerce Product Style.
 *
 * @package 	WooCommerce/Templates
 * @author 		WooThemes
 *
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$hide_sale  = of_get_option( 'tokopress_wc_hide_products_sale_flas' );
$hide_price  = of_get_option( 'tokopress_wc_hide_products_price' );
$hide_title  = of_get_option( 'tokopress_wc_hide_products_title' );
$hide_detail = of_get_option( 'tokopress_wc_hide_products_detail_button' );
$hide_cart   = of_get_option( 'tokopress_wc_hide_products_cart_button' );
$shorten_title = of_get_option( 'tokopress_wc_shorten_products_title' ) ? ' shorten-title' : '';
?>
<li <?php post_class('product-hover-caption'); ?>>
	<div class="product-inner">
	<figure>
        <?php if ( !$hide_sale ) woocommerce_show_product_loop_sale_flash(); ?>
        <?php if ( !$hide_price || !$hide_title ||  !$hide_detail || !$hide_cart ) : ?>
            <?php woocommerce_template_loop_product_thumbnail(); ?>
            <figcaption>
                <div class="product-caption">
    				<?php if( !$hide_title ) : ?>
    	                <div class="product-detail<?php echo $shorten_title; ?>">
    	                    <span class="product-title<?php echo $shorten_title; ?>"><?php the_title(); ?></span>
    	                </div>
    	            <?php endif; ?>
                    <?php if( !$hide_price ) : ?>
                        <?php woocommerce_template_loop_price(); ?>
                    <?php endif; ?>
                    <?php if( !$hide_detail || !$hide_cart ) : ?>
                        <div class="product-action">
                            <?php if( !$hide_detail ) : ?>
                                <a href="<?php the_permalink(); ?>" rel="nofollow" class="button detail_button_loop">
                                    <?php echo apply_filters( 'tokopress_button_detail_text', __( 'detail', 'tokopress' ) ); ?>
                                </a>
                            <?php endif; ?>
                            <?php if( !$hide_cart ) : ?>
            					<?php woocommerce_template_loop_add_to_cart(); ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </figcaption>
        <?php else : ?>
            <a href="<?php the_permalink(); ?>">
                <?php woocommerce_template_loop_product_thumbnail(); ?>
            </a>
        <?php endif; ?>
    </figure>
    </div>
</li>
