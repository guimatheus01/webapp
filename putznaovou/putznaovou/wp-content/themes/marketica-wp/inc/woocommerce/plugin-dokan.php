<?php

function tokopress_dokan_settings( $options ) {
    $options[] = array(
        'name'  => __( 'Dokan', 'tokopress' ),
        'type'  => 'heading'
    );

        // $options[] = array(
        //     'name' => __( '"Sold by" Vendor Name', 'tokopress' ),
        //     'desc' => '',
        //     'id' => 'tokopress_dokan_soldby_name',
        //     'std' => '',
        //     'type' => 'select',
        //     'options' => array(
        //             'display_name' => __( 'Display Name', 'tokopress' ),
        //             'shop_name' => __( 'Shop Name', 'tokopress' ),
        //         )
        // );

    $options[] = array(
        'name' => __( 'Dokan - Shop Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( 'Vendor Description on Top of Shop Page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_shop_description',
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
            'id' => 'tokopress_dokan_shop_soldby',
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
            'id' => 'tokopress_dokan_shop_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'Dokan - Single Product Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"Seller Info" at Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_tab',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

        $options[] = array(
            'name' => __( 'Add "View Store" link at the end of Product Tab', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_product_viewstorelink',
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
            'id' => 'tokopress_dokan_product_moreproducts',
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
            'id' => 'tokopress_dokan_product_vendordetails',
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
            'id' => 'tokopress_dokan_product_soldby',
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
            'id' => 'tokopress_dokan_product_soldby_text',
            'std' => '',
            'type' => 'text',
        );

    $options[] = array(
        'name' => __( 'Dokan - Cart Page', 'tokopress' ),
        'type' => 'info'
    );

        $options[] = array(
            'name' => __( '"Sold by" at Cart page', 'tokopress' ),
            'desc' => '',
            'id' => 'tokopress_dokan_cart_soldby',
            'std' => '',
            'type' => 'select',
            'options' => array(
                    'yes' => __( 'Yes', 'tokopress' ),
                    'no' => __( 'No', 'tokopress' ),
                )
        );

    return $options;
}
add_filter( 'of_options', 'tokopress_dokan_settings', 20 );

add_filter( 'tokopress_customizer_sections', 'tokopress_customizer_dokan_section' );
function tokopress_customizer_dokan_section( $tk_sections ) {
    $tk_sections[] = array(
            'slug'      => 'tokopress_dokan_section',
            'label'     => __( 'Dokan', 'tokopress' ),
            'priority'  => 160,
        );

    return $tk_sections;
}

add_filter( 'tokopress_customizer_data', 'tokopress_customizer_dokan_color' );
function tokopress_customizer_dokan_color( $tk_colors ) {
    $tk_colors[] = array(
        'slug'      => 'tokopress_dokan_menu_active',
        'default'   => '',
        'priority'  => 10,
        'label'     => __( 'Dokan Dashboard Menu Background (Active)', 'tokopress' ),
        'section'   => 'tokopress_dokan_section',
        'type'      => 'color',
        'selector'  => '.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.active',
        'property'  => 'background'
    );

    $tk_colors[] = array(
        'slug'      => 'tokopress_dokan_menu_hover',
        'default'   => '',
        'priority'  => 10,
        'label'     => __( 'Dokan Dashboard Menu Background (Hover)', 'tokopress' ),
        'section'   => 'tokopress_dokan_section',
        'type'      => 'color',
        'selector'  => '.dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li:hover, .dokan-dashboard .dokan-dash-sidebar ul.dokan-dashboard-menu li.dokan-common-links a:hover',
        'property'  => 'background'
    );

    $tk_colors[] = array(
        'slug'      => 'tokopress_dokan_button',
        'default'   => '',
        'priority'  => 10,
        'label'     => __( 'Dokan Button Background', 'tokopress' ),
        'section'   => 'tokopress_dokan_section',
        'type'      => 'color',
        'selector'  => 'input[type="submit"].dokan-btn-theme, a.dokan-btn-theme, .dokan-btn-theme, .dokan-support-reply-form #respond input#submit',
        'property'  => 'background',
        'propertyadd'   => '!important',
        'selector2'  => 'input[type="submit"].dokan-btn-theme, a.dokan-btn-theme, .dokan-btn-theme, .dokan-support-reply-form #respond input#submit',
        'property2'  => 'border-color',
        'property2add'   => '!important',
    );

    $tk_colors[] = array(
        'slug'      => 'tokopress_dokan_button_hover',
        'default'   => '',
        'priority'  => 10,
        'label'     => __( 'Dokan Button Background (Hover)', 'tokopress' ),
        'section'   => 'tokopress_dokan_section',
        'type'      => 'color',
        'selector'  => 'input[type="submit"].dokan-btn-theme:hover, a.dokan-btn-theme:hover, .dokan-btn-theme:hover, input[type="submit"].dokan-btn-theme:focus, a.dokan-btn-theme:focus, .dokan-btn-theme:focus, input[type="submit"].dokan-btn-theme:active, a.dokan-btn-theme:active, .dokan-btn-theme:active, input[type="submit"].dokan-btn-theme.active, a.dokan-btn-theme.active, .dokan-btn-theme.active, .open .dropdown-toggleinput[type="submit"].dokan-btn-theme, .open .dropdown-togglea.dokan-btn-theme, .open .dropdown-toggle.dokan-btn-theme, .dokan-support-reply-form #respond input#submit:hover',
        'property'  => 'background',
        'propertyadd'   => '!important',
        'selector2'  => 'input[type="submit"].dokan-btn-theme:hover, a.dokan-btn-theme:hover, .dokan-btn-theme:hover, input[type="submit"].dokan-btn-theme:focus, a.dokan-btn-theme:focus, .dokan-btn-theme:focus, input[type="submit"].dokan-btn-theme:active, a.dokan-btn-theme:active, .dokan-btn-theme:active, input[type="submit"].dokan-btn-theme.active, a.dokan-btn-theme.active, .dokan-btn-theme.active, .open .dropdown-toggleinput[type="submit"].dokan-btn-theme, .open .dropdown-togglea.dokan-btn-theme, .open .dropdown-toggle.dokan-btn-theme, .dokan-support-reply-form #respond input#submit:hover',
        'property2'  => 'border-color',
        'property2add'   => '!important',
    );

    $tk_colors[] = array(
        'slug'      => 'tokopress_dokan_link',
        'default'   => '',
        'priority'  => 10,
        'label'     => __( 'Dokan Dashboard Link Color', 'tokopress' ),
        'section'   => 'tokopress_dokan_section',
        'type'      => 'color',
        'selector'  => '.dokan-dashboard .dokan-dashboard-content a, .dokan-add-new-product-popup a',
        'property'  => 'color',
    );

    return $tk_colors;
}

add_filter( 'tokopress_layout_class', 'tokopress_dokan_layout_class' );
function tokopress_dokan_layout_class( $layout ) {
    if ( dokan_is_store_page () ) {
    	if ( class_exists( 'Dokan_Store_Location' ) && dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) {
			$layout = 'layout-2c-l';
    	}
    	else {
        	if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) {
				$layout = 'layout-2c-l';
        	}
        	else {
				$layout = 'layout-1c-full';
        	}
    	}
    }
	return $layout;
}

add_action( 'tokopress_quicknav_account', 'tokopress_dokan_quicknav_account' );
function tokopress_dokan_quicknav_account() {
	if ( ! is_user_logged_in() )
		return;

    global $current_user;

    $user_id = $current_user->ID;
    if ( ! dokan_is_user_seller( $user_id ) )
		return;

    $nav_urls = dokan_get_dashboard_nav();

    foreach ($nav_urls as $key => $item) {
        printf( '<li><a href="%s">%s %s</a></li>', $item['url'], $item['title'], $item['icon'] );
    }
    echo '<li class="quicknav-separator"></li>';

    add_filter( 'tokopress_wc_quicknav_account_submenus', '__return_false' );
}

if( of_get_option( 'tokopress_dokan_shop_soldby' ) != 'no' ) {
    add_action( 'woocommerce_after_shop_loop_item', 'tokopress_dokan_product_seller_name', 9 );
}
function tokopress_dokan_product_seller_name() {
	global $product;
	$user_id = $product->post->post_author;
	if ( ! dokan_is_user_seller( $user_id ) )
		return;
	$store_info = dokan_get_store_info( $user_id );
	if ( isset( $store_info['store_name'] ) && $store_info['store_name'] ) {
		$author_name = $store_info['store_name'];
	}
	else {
		$author = get_user_by( 'id', $user_id );
		$author_name = $author->display_name;
	}
	$soldby_text = of_get_option( 'tokopress_dokan_shop_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
	if ( trim( $soldby_text ) == '.' ) {
		$soldby_text = '';
	}
    printf( '<p class="product-seller-name">%s <a href="%s">%s</a></p>', $soldby_text, dokan_get_store_url( $user_id ), $author_name );
}

if( of_get_option( 'tokopress_dokan_product_tab' ) == 'no' ) {
    remove_filter( 'woocommerce_product_tabs', 'dokan_seller_product_tab' );
}

remove_action( 'woocommerce_product_tabs', 'dokan_more_from_seller_tab', 10 );
if( of_get_option( 'tokopress_dokan_product_moreproducts' ) != 'no' ) {
    add_action( 'tokopress_wc_after_single_product', 'tokopress_dokan_more_products', 5 );
}
function tokopress_dokan_more_products() {
	get_template_part( 'dokan/block-more-products' );
}

if( of_get_option( 'tokopress_dokan_product_soldby' ) != 'no' ) {
	add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_sold_by_meta', 25, 2 );
}
function tokopress_dokan_sold_by_meta() {
	global $product;
	$user_id = $product->post->post_author;
	if ( ! dokan_is_user_seller( $user_id ) )
		return;
	$store_info = dokan_get_store_info( $user_id );
	if ( isset( $store_info['store_name'] ) && $store_info['store_name'] ) {
		$author_name = $store_info['store_name'];
	}
	else {
		$author = get_user_by( 'id', $user_id );
		$author_name = $author->display_name;
	}
	$soldby_text = of_get_option( 'tokopress_dokan_product_soldby_text' );
    if ( $soldby_text && $soldby_text != '.' ) {
        $soldby_text = __( $soldby_text, 'tokopress' ); /* support qTranslateX */
    }
	if ( !$soldby_text ) {
		$soldby_text = __( 'sold by', 'tokopress' );
	}
    $soldby = sprintf( '<a href="%s">%s</a>', dokan_get_store_url( $user_id ), $author_name );
	echo '<ul class="list-item-details"><li><span class="data-type">'.$soldby_text.'</span><span class="value">'.$soldby.'</span></li></ul>';
}

if( of_get_option( 'tokopress_dokan_cart_soldby' ) == 'no' ) {
    remove_filter( 'woocommerce_get_item_data', 'dokan_product_seller_info', 10, 2 );
}

add_filter( 'body_class', 'toko_dokan_body_class_product_columns' );
function toko_dokan_body_class_product_columns( $classes ) {
    $columns = 0;
    if ( function_exists('dokan_is_store_page') && dokan_is_store_page() ) {
        $columns = apply_filters( 'loop_shop_columns', 3 );
        if ( $columns < 1 ) $columns = 3;
        if ( $columns > 5 ) $columns = 5;
    }
    if ( $columns ) {
        $classes[] = 'woocommerce';
        $classes[] = 'columns-' . $columns;
    }
    return $classes;
}

if ( class_exists('Dokan_WC_Product_Zoom') ) {
    add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
    remove_action( 'woocommerce_before_single_product_summary', 'tokopress_wc_single_product_image_slider', 10 );
}

add_filter( 'document_title_parts', 'tokopress_dokan_document_title_parts' );
function tokopress_dokan_document_title_parts( $title ) {
	if ( dokan_is_store_page() ) {
		$store_user = get_userdata( get_query_var( 'author' ) );
		$store_info = dokan_get_store_info( $store_user->ID );
        $title['title'] = $store_info['store_name'];
    }
    return $title;
}

add_filter( 'dokan_settings_fields', 'tokopress_dokan_settings_fields' );
function tokopress_dokan_settings_fields( $settings_fields ) {
    if ( isset( $settings_fields['dokan_appearance']['store_header_template']['options'] ) ) {
        $options = $settings_fields['dokan_appearance']['store_header_template']['options'];
        $options2 = array( 'default' => THEME_URI . '/img/store-header.jpg' );
        if ( isset( $options['default'] ) ) {
            $options2['layout0'] = $options['default'];
            unset( $options['default'] );
        }
        $options = array_merge( $options2, $options );
        $settings_fields['dokan_appearance']['store_header_template']['options'] = $options;
        $settings_fields['dokan_appearance']['store_header_template']['default'] = 'marketica';
    }
    return $settings_fields;
}

add_filter( 'dokan_get_seller_review_url', 'tokopress_dokan_get_seller_review_url' );
function tokopress_dokan_get_seller_review_url( $url ) {
	if ( !class_exists('Dokan_Pro_Store') ) {
		$url = 'javascript:void(0)';
	}
	return $url;
}

if( of_get_option( 'tokopress_dokan_product_vendordetails' ) == 'yes' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_product_sidebar_vendor', 15 );
}
function tokopress_dokan_product_sidebar_vendor() {
	global $product;
	$user_id = $product->post->post_author;
    if ( ! dokan_is_user_seller( $user_id ) )
		return;
	$store_user = get_user_by( 'id', $user_id );
	$store_info = dokan_get_store_info( $store_user->ID );
	echo '<div class="widget vendor-details">';
	echo get_avatar( $store_user->ID, 60 );
	echo '<h3 class="widget-title">'.esc_html( $store_info['store_name'] ).'</h3>';
    $rating = dokan_get_seller_rating( $store_user->ID );
    if ( isset( $rating['count'] ) && $rating['count'] ) {
        dokan_get_readable_seller_rating( $store_user->ID );
    }
	echo '<a href="'.dokan_get_store_url( $store_user->ID ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
	echo '</div>';
}

if( of_get_option( 'tokopress_dokan_product_viewstorelink' ) == 'yes' ) {
    add_action( 'tokopress_wc_main_content_right', 'tokopress_dokan_product_viewstorelink', 99 );
}
function tokopress_dokan_product_viewstorelink() {
	global $product;
	$user_id = $product->post->post_author;
    if ( ! dokan_is_user_seller( $user_id ) )
		return;
	echo '<div class="view-store-link">';
	echo '<a href="'.dokan_get_store_url( $user_id ).'" class="button">'.__( 'View Store', 'tokopress' ).'</a>';
	echo '</div>';
}

add_filter('woocommerce_login_redirect', 'tokopress_dokan_login_redirect', 20, 2);
function tokopress_dokan_login_redirect( $redirect_to, $user ) {
	if ( dokan_is_user_seller( $user->ID ) ) {
		$seller_dashboard = dokan_get_option( 'dashboard', 'dokan_pages' );
		if ( $seller_dashboard > 0 ) {
			$redirect_to = get_permalink( $seller_dashboard );
		}
	}
	return $redirect_to;
}

add_filter( 'tokopress_header_searchform', 'tokopress_header_seachform_dokanlivesearch' );
function tokopress_header_seachform_dokanlivesearch( $form ) {
    if ( class_exists('Dokan_Live_Search') ) {
        $form = 'block-search-dokanlivesearch';
    }
    return $form;
}

add_action( 'dokan_after_store_tabs', 'tokopress_dokan_fix_store_support_enqueue' );
function tokopress_dokan_fix_store_support_enqueue() {
    if ( class_exists('Dokan_Store_Support') ) {
        wp_enqueue_style( 'dokan-magnific-popup' );
        wp_enqueue_script( 'dokan-popup' );
    }
}
