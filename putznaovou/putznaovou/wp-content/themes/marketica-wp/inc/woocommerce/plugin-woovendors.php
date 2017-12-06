<?php

function tokopress_woovendors_settings( $options ) {
    $options[] = array(
        'name'  => __( 'WooVendors', 'tokopress' ),
        'type'  => 'heading'
    );

    $options[] = array(
        'name' => __( 'WooVendors - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'Vendor Description on Top of Shop Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_description',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Show Vendor Logo on Vendor Description', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_logo',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Show Vendor Profile on Vendor Description', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_profile',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Show Vendor Overall Review Rating on Vendor Description', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_review',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( '"Sold by" at Product List', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Custom "Sold by" text', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_shop_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'WooVendors - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

		$options[] = array(
			'name' => __( '"Seller Info" at Product Tab', 'tokopress' ),
			'desc' => '',
			'id' => 'tokopress_woovendors_product_tab',
			'std' => '',
			'type' => 'select',
			'options' => array(
					'no' => __( 'No', 'tokopress' ),
					'yes' => __( 'Yes', 'tokopress' ),
				)
		);

        $options[] = array(
            'name' => __( 'Add "View Store" link at the end of Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_viewstorelink',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'no' => __( 'No', 'tokopress' ),
                    'yes' => __( 'Yes', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( '"More From This Seller" Products', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_moreproducts',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Vendor Details at Product Sidebar', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_vendordetails',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'no' => __( 'No', 'tokopress' ),
                    'yes' => __( 'Yes', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( '"Sold by" at Item Details', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Custom "Sold by" text', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_product_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'WooVendors - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Custom "Sold by" text', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_woovendors_cart_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_woovendors_settings', 20 );

tokopress_remove_filter_class( 'woocommerce_after_shop_loop_item','WC_Product_Vendors_Vendor_Frontend', 'add_sold_by_loop', 9 );
tokopress_remove_filter_class( 'woocommerce_single_product_summary','WC_Product_Vendors_Vendor_Frontend', 'add_sold_by_single', 39 );
tokopress_remove_filter_class( 'woocommerce_get_item_data','WC_Product_Vendors_Vendor_Frontend', 'add_sold_by_cart', 10 );

add_action( 'tokopress_quicknav_account', 'tokopress_woovendors_quicknav_account' );
function tokopress_woovendors_quicknav_account() {
    // printf( '<li><a rel="nofollow" href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
}

add_action( 'tokopress_before_inner_content', 'tokopress_woovendors_store_header', 5 );
function tokopress_woovendors_store_header() {
    get_template_part( 'woovendors/store-header' );
}

if( of_get_option( 'tokopress_woovendors_shop_soldby' ) != 'no' ) {
    add_action( 'woocommerce_after_shop_loop_item', 'tokopress_woovendors_product_seller_name', 9 );
}
function tokopress_woovendors_product_seller_name() {
	$soldby_text = of_get_option( 'tokopress_woovendors_shop_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
	if ( trim( $soldby_text ) == '.' ) {
		$soldby_text = '';
	}
    echo tokopress_get_the_term_list( get_the_ID(), 'wcpv_product_vendors', '<p class="product-seller-name">'.$soldby_text.' ', ', ', '</p>' );
}

if( of_get_option( 'tokopress_woovendors_product_moreproducts' ) != 'no' ) {
    add_action( 'tokopress_wc_after_single_product', 'tokopress_woovendors_more_products', 5 );
}
function tokopress_woovendors_more_products() {
    get_template_part( 'woovendors/block-more-products' );
}

if( of_get_option( 'tokopress_woovendors_product_soldby' ) != 'no' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_sold_by_meta', 25, 2 );
}
function tokopress_woovendors_sold_by_meta() {
	$soldby_text = of_get_option( 'tokopress_woovendors_product_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
    echo tokopress_get_the_term_list( get_the_ID(), 'wcpv_product_vendors', '<ul class="list-item-details"><li><span class="data-type">'.$soldby_text.'</span><span class="value">', ', ', '</span></li></ul>' );
}

if( of_get_option( 'tokopress_woovendors_cart_soldby' ) != 'no' ) {
    add_filter( 'woocommerce_get_item_data', 'woovendors_product_seller_info', 10, 2 );
}
function woovendors_product_seller_info( $item_data, $cart_item ) {
	$soldby_text = of_get_option( 'tokopress_woovendors_cart_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
    $soldby = tokopress_get_the_term_list( $cart_item['data']->post->ID, 'wcpv_product_vendors', '', ', ', '' );
    if ( $soldby ) {
        $item_data[] = array(
            'name'  => $soldby_text,
            'value' => tokopress_get_the_term_list( $cart_item['data']->post->ID, 'wcpv_product_vendors', '', ', ', '' )
        );
    }
    return $item_data;
}

if( of_get_option( 'tokopress_woovendors_product_tab' ) == 'yes' ) {
	add_filter( 'woocommerce_product_tabs', 'tokopress_woovendors_seller_info_tab' );
}
function tokopress_woovendors_seller_info_tab( $tabs ) {
	global $post;
	$vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
	if ( $vendor ) {
		$tabs[ 'seller_info' ] = array(
			'title'    => apply_filters( 'woovendors_seller_info_label', __( 'Seller info', 'tokopress' ) ),
			'priority' => 50,
			'callback' => 'tokopress_woovendors_seller_info_tab_panel',
		);
	}
	return $tabs;
}

function tokopress_woovendors_seller_info_tab_panel() {
	global $post;
	$vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
	if ( $vendor ) {
		$vendor = WC_Product_Vendors_Utils::get_vendor_data_by_id( $vendor[0]->term_id );
		if ( !empty($vendor) ) {
			echo '<h2>'.$vendor['name'].'</h2>';
			echo '<div class="pv_seller_info">';
			if ( isset( $vendor['profile'] ) && $vendor['profile'] ) {
				$allowed_html = array(
					'a' => array(
						'href'  => array(),
						'title' => array(),
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
				);
				echo '<p>' . wp_kses( $vendor['profile'], $allowed_html ) . '</p>';
			}
			$link = get_term_link( $vendor['term_id'], WC_PRODUCT_VENDORS_TAXONOMY );
			echo '<a href="'.esc_url( $link ).'" class="button alt">'.__( 'View Store', 'tokopress' ).'</a>';
			echo '</div>';
		}
	}
}

if( of_get_option( 'tokopress_woovendors_product_vendordetails' ) == 'yes' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_product_sidebar_vendor', 15 );
}
function tokopress_woovendors_product_sidebar_vendor() {
	global $post;
	$vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
	if ( $vendor ) {
		$vendor = WC_Product_Vendors_Utils::get_vendor_data_by_id( $vendor[0]->term_id );
		if ( !empty($vendor) ) {
			echo '<div class="widget vendor-details">';
			if ( isset( $vendor['logo'] ) && $vendor['logo'] ) {
				echo wp_get_attachment_image( absint( $vendor['logo'] ), array('60', '60') );
			}
			echo '<h3 class="widget-title">'.esc_html( $vendor['name'] ).'</h3>';
			if ( isset( $vendor['profile'] ) && $vendor['profile'] ) {
				$allowed_html = array(
					'a' => array(
						'href'  => array(),
						'title' => array(),
					),
					'br'     => array(),
					'em'     => array(),
					'strong' => array(),
				);
				echo '<span class="text">' . wp_kses( $vendor['profile'], $allowed_html ) . '</span>';
			}
			$link = get_term_link( $vendor['term_id'], WC_PRODUCT_VENDORS_TAXONOMY );
			echo '<a href="'.esc_url( $link ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
			echo '</div>';
		}
	}
}

if( of_get_option( 'tokopress_woovendors_product_viewstorelink' ) == 'yes' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_woovendors_product_viewstorelink', 99 );
}
function tokopress_woovendors_product_viewstorelink() {
    global $post;
    $vendor = WC_Product_Vendors_Utils::is_vendor_product( $post->ID );
    if ( $vendor ) {
        $vendor = WC_Product_Vendors_Utils::get_vendor_data_by_id( $vendor[0]->term_id );
        if ( !empty($vendor) ) {
            $link = get_term_link( $vendor['term_id'], WC_PRODUCT_VENDORS_TAXONOMY );
            echo '<div class="view-store-link">';
            echo '<a href="'.esc_url( $link ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
            echo '</div>';
        }
    }
}
