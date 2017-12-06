<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = get_userdata( get_query_var( 'author' ) );
$store_info   = dokan_get_store_info( $store_user->ID );
$dokan_appearance = get_option( 'dokan_appearance' );
$profile_layout = empty( $dokan_appearance['store_header_template'] ) ? 'default' : $dokan_appearance['store_header_template'];

get_header( 'shop' );
?>

    <?php if ( $profile_layout == 'default' && of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ) dokan_get_template_part( 'store-header' ); ?>

    <?php do_action( 'woocommerce_before_main_content' ); ?>

    <div id="dokan-primary" class="dokan-single-store">
        <div id="dokan-content" class="store-page-wrap woocommerce" role="main">

            <?php if ( $profile_layout != 'default' && of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ) dokan_get_template_part( 'store-header-dokan' ); ?>

        <div id="store-toc-wrapper">
            <div id="store-toc">
                <?php
                if( isset( $store_info['store_tnc'] ) ):
                ?>
                    <h2 class="headline"><?php _e( 'Terms And Conditions', 'tokopress' ); ?></h2>
                    <div>
                        <?php
                        echo wpautop($store_info['store_tnc']);
                        ?>
                    </div>
                <?php
                endif;
                ?>
            </div><!-- #store-toc -->
        </div><!-- #store-toc-wrap -->
        </div>
   </div><!-- .dokan-single-store -->

    <?php do_action( 'woocommerce_after_main_content' ); ?>

    <?php if ( class_exists( 'Dokan_Store_Location' ) && dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) : ?>
        <?php get_sidebar( 'dokan' ); ?>
    <?php else : ?>
        <?php if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) : ?>
            <?php get_sidebar( 'shop' ); ?>
        <?php endif; ?>
    <?php endif; ?>

<?php get_footer( 'shop' ); ?>
