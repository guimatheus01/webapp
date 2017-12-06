<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
tokopress_require_file( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'tokopress_register_required_plugins' );
function tokopress_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */

	$plugins = array(

		/* Required Plugin */
		array(
			'name'		=> 'WooCommerce',
			'slug'		=> 'woocommerce',
			'required'	=> true,
		),

		array(
			'name'     	=> 'Marketica Addons',
			'slug'     	=> 'tokopress-multipurpose-shortcode',
			'source'   	=> 'http://toko.press/api/bundles/tokopress-multipurpose-shortcode-v'.THEME_ADDONS_VERSION.'.zip',
			'version' 	=> THEME_ADDONS_VERSION,
			'required' 	=> true,
		),

		array(
			'name'     	=> 'Visual Composer',
			'slug'     	=> 'js_composer',
			'source'   	=> 'http://toko.press/api/bundles/js_composer-v5.1.1.zip',
			'version' 	=> '5.1.1',
			'required' 	=> true,
		),

		/* Recommended Plugin */

		array(
			'name'		=> 'WordPress Importer',
			'slug'		=> 'wordpress-importer',
			'source'   	=> 'http://toko.press/api/bundles/wordpress-importer-v2.0.2.zip',
			'version' 	=> '2.0.2',
			'required' 	=> true,
		),

		array(
			'name'		=> 'Widget Importer Exporter',
			'slug'		=> 'widget-importer-exporter',
			'required'	=> true,
		),

		array(
			'name'		=> 'Customizer Export/Import',
			'slug'		=> 'customizer-export-import',
			'required'	=> true,
		),

		array(
			'name'		=> 'One Click Demo Import',
			'slug'		=> 'one-click-demo-import',
			'source'   	=> 'http://toko.press/api/bundles/one-click-demo-import-v2.2.0.zip',
			'version' 	=> '2.2.0',
			'required'	=> true,
		),

		array(
			'name'		=> 'Force Regenerate Thumbnails',
			'slug'		=> 'force-regenerate-thumbnails',
			'required'	=> false,
		),

		array(
			'name'		=> 'MailChimp for WordPress',
			'slug'		=> 'mailchimp-for-wp',
			'version' 	=> '3.0.0',
			'required'	=> false,
		),

		array(
			'name'     => 'Revolution Slider',
			'slug'     => 'revslider',
			'source'   => 'http://toko.press/api/bundles/revslider-v5.4.2.zip',
			'version' 	=> '5.4.2',
			'required' => false
		),

	);

	// if ( class_exists('WooCommerce_Product_Vendors') ) {
	// 	$show_wcvendors = false;
	// }
	// elseif ( class_exists('FPMultiVendor') ) {
	// 	$show_wcvendors = false;
	// }
	// elseif ( class_exists('WeDevs_Dokan') ) {
	// 	$show_wcvendors = false;
	// }
	// else {
	// 	$show_wcvendors = true;
	// }
	// if ( $show_wcvendors ) {
	// 	$plugins[] = array(
	// 			'name'		=> 'WC Vendors',
	// 			'slug'		=> 'wc-vendors',
	// 			'required'	=> false,
	// 		);

	// }

	$plugins[] = array(
		'name'     	=> 'WooCommerce Simple Frontend Submission',
		'slug'     	=> 'wcxt-frontend-submission',
		'source'   	=> 'http://toko.press/api/bundles/wcxt-frontend-submission-v1.2.zip',
		'version' 	=> '1.2',
		'required' 	=> false,
	);
	$plugins[] = array(
		'name'		=> 'CMB2 - Metabox Library',
		'slug'		=> 'cmb2',
		'required'	=> ( function_exists( 'xt_wc_frontend_submission_shortcode' ) ? true : false ),
	);

	$config = array(
		'id'           => 'toko-tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'toko-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}

if ( !of_get_option( 'tokopress_enable_vc_license' ) ) {
	/* Set Visual Composer as Theme part and disable Visual Composer Updater */
	add_action( 'vc_before_init', 'toko_vc_set_as_theme', 9 );
	function toko_vc_set_as_theme() {
		if ( function_exists( 'vc_set_as_theme' ) ) {
			vc_set_as_theme(true);
			vc_manager()->disableUpdater(true);
		}
	}
}

/* Set Revolution Slider as Theme part and disable Revolution Slider Updater */
if ( function_exists( 'set_revslider_as_theme' ) ) {
	set_revslider_as_theme();
}

add_action( 'admin_head', 'toko_fix_notice_position' );
function toko_fix_notice_position() {
	echo '<style>#update-nag, .update-nag { display: block; float: none; }</style>';
}

add_filter( 'cei_export_option_keys', 'tokopress_cei_export_option_keys' );
function tokopress_cei_export_option_keys( $keys ) {
    $keys[] = 'marketica-wp';
    return $keys;
}

add_filter( 'pt-ocdi/import_files', 'tokopress_ocdi_import_files' );
function tokopress_ocdi_import_files() {
	$notices = array(
		__( 'Import dummy Revolution Slider for Homepage', 'tokopress' ),
		__( 'Regenerate thumbnails using Force Regenerate Thumbnails plugin', 'tokopress' ),
		__( 'Go to Settings - Permalinks and click "Save Changes" button', 'tokopress' ),
	);
	$import_notice = __( 'After you import this demo, you will have to:', 'tokopress' ).'<ol><li>'.implode( '</li><li>', $notices ).'</li></ol>';
    return array(
        array(
            'import_file_name'           => 'Marketica Demo',
            'categories'                 => array( 'TokoPress' ),
            'import_file_url'            => 'http://toko.press/import/marketica/01_dummy_contents.xml',
            'import_widget_file_url'     => 'http://toko.press/import/marketica/02_dummy_widgets.wie',
            'import_customizer_file_url' => 'http://toko.press/import/marketica/03_dummy_settings.dat',
            'import_preview_image_url'   => 'http://toko.press/import/marketica/preview.png',
            'import_notice'              => $import_notice,
        ),
    );
}

add_action( 'pt-ocdi/before_content_import', 'tokopress_ocdi_before_content_import' );
function tokopress_ocdi_before_content_import( $selected_import ) {
  	$catalog = array(
		'width' 	=> '256',
		'height'	=> '179',
		'crop'		=> 1 
	);
	$single = array(
		'width' 	=> '819',
		'height'	=> '9999',
		'crop'		=> 0
	);
	$thumbnail = array(
		'width' 	=> '200',
		'height'	=> '200',
		'crop'		=> 1
	);
	update_option( 'shop_catalog_image_size', $catalog ); 
	update_option( 'shop_single_image_size', $single ); 
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 
}

add_action( 'pt-ocdi/after_import', 'tokopress_ocdi_after_import' );
function tokopress_ocdi_after_import() {
    $primary_menu = get_term_by( 'name', 'Primary', 'nav_menu' );
    $secondary_menu = get_term_by( 'name', 'Secondary', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', 
    	array(
            'primary_menu' => $primary_menu->term_id,
            'secondary_menu' => $secondary_menu->term_id,
        )
    );

    $front_page_id = get_page_by_title( 'Homepage Boxed' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

    $shop_page_id = get_page_by_title( 'Shop' );
    $cart_page_id = get_page_by_title( 'Cart' );
    $checkout_page_id = get_page_by_title( 'Checkout' );
    $myaccount_page_id = get_page_by_title( 'My Account' );

    update_option( 'woocommerce_shop_page_id', $shop_page_id->ID );
    update_option( 'woocommerce_cart_page_id', $cart_page_id->ID );
    update_option( 'woocommerce_checkout_page_id', $checkout_page_id->ID );
    update_option( 'woocommerce_myaccount_page_id', $myaccount_page_id->ID );

}

// add_filter( 'http_request_args', 'tokopress_ocdi_disable_update_check', 10, 2 );
function tokopress_ocdi_disable_update_check( $response, $url ) {	
	if ( 0 === strpos( $url, 'https://api.wordpress.org/plugins/update-check' ) ) {
		$basename = 'one-click-demo-import/one-click-demo-import.php';
		$plugins  = json_decode( $response['body']['plugins'] );
		if ( isset( $plugins->plugins->$basename ) ) {
			unset( $plugins->plugins->$basename );
			if ( isset($plugins->active) && is_array($plugins->active) ) {
				unset( $plugins->active[ array_search( $basename, $plugins->active ) ] );
			}
		}
		$response['body']['plugins'] = json_encode( $plugins );
	}
	return $response;
}

add_action( 'marketica_quicknav_before', 'tokopress_quicknav_qtranslatex_lang_selector' );
function tokopress_quicknav_qtranslatex_lang_selector() {
	if ( function_exists( 'qtranxf_generateLanguageSelectCode' ) && of_get_option( 'tokopress_wc_enable_lang_selector' ) ) {
		echo '<div class="quicknav-lang">';
			echo '<a rel="nofollow" class="quicknav-icon" href="javascript:void(0)">';
			if ( function_exists( 'qtranxf_getLanguage' ) && function_exists( 'qtranxf_getLanguageDefault' ) && function_exists( 'qtranxf_flag_location' ) ) {
			global $q_config;
			$lang_name = qtranxf_getLanguage() ? qtranxf_getLanguage() : qtranxf_getLanguageDefault();
			$lang_flag = qtranxf_flag_location().$q_config['flag'][$lang_name];
			echo '<img src="'.$lang_flag.'" alt="'.$lang_name.'"/>';
			}
			echo '</a>';
			qtranxf_generateLanguageSelectCode( array('type'=>'both'), 'lang-menu' );
		echo '</div>';
	}
}

add_action( 'marketica_quicknav_before', 'tokopress_quicknav_wpml_lang_selector' );
function tokopress_quicknav_wpml_lang_selector() {
	if ( function_exists( 'icl_get_languages' ) && of_get_option( 'tokopress_wc_enable_lang_selector' ) ) {
		$languages = icl_get_languages('skip_missing=0');
		if( 1 < count($languages) ) { 
			$lang_active = ''; 
			$langs = array();
			foreach( $languages as $language ) {
				if ( $language['active'] ) $lang_active = $language;
				$langs[] = '<li><a href="'.$language['url'].'" style="background-image:url('.$language['country_flag_url'].');">'.$language['native_name'].'</a></li>';
			}
			echo '<div class="quicknav-lang">';
				echo '<a rel="nofollow" class="quicknav-icon" href="javascript:void(0)">';
					echo '<img src="'.$lang_active['country_flag_url'].'" alt="'.$lang_active['native_name'].'" />';
				echo '</a>';
				echo '<ul id="lang-menu-chooser">'.join('', $langs).'</ul>';
			echo '</div>';
		}                  
	}
}

/**
 * Enqueue & Dequeue Plugin Scripts
 */
add_action( 'wp_enqueue_scripts', 'tokopress_plugin_scripts', 999 );
add_action( 'wp_footer', 'tokopress_plugin_scripts' );
function tokopress_plugin_scripts() {
	wp_dequeue_style( 'fontawesome' );
	wp_dequeue_style( 'font-awesome' );
	wp_dequeue_style( 'mailchimp-for-wp-checkbox' );
	wp_dequeue_style( 'mailchimp-for-wp-form' );
	wp_dequeue_style( 'yith-wcwl-main' );
	wp_dequeue_style( 'yith-wcwl-font-awesome' );
	wp_dequeue_style( 'yith-wcwl-font-awesome-ie7' );
}

add_filter('vc_load_default_templates','tokopress_load_vc_templates');
function tokopress_load_vc_templates( $args ) {
	$args2 = array (
		array(
			'name'=> '1. '.__('Marketica - Boxed (v4)','tokopress'),
			'content'=>'[vc_row el_class="tpvc_row_full"][vc_column][rev_slider_vc alias="homePage" el_class="tpvc_row_full"][/vc_column][/vc_row][vc_row el_class="tpvc_row_full"][vc_column][tokopress_product_search][/vc_column][/vc_row][vc_row css=".vc_custom_1487021449658{padding-top: 0px !important;padding-right: 0px !important;padding-left: 0px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_product tpvc_wc_product_style="default" tpvc_wc_product_title="Best Sellers Products" tpvc_wc_product_per_page="4" tpvc_wc_product_columns="4" tpvc_wc_product_orderby="sales" tpvc_wc_product_title_icon="fa fa-usd" tpvc_wc_product_title_bg="#ffffff"][/vc_column][/vc_row][vc_row css=".vc_custom_1487570176644{margin-bottom: 0px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_divider tpvc_divider_heading="h2"][/vc_column][/vc_row][vc_row css=".vc_custom_1487042323949{padding-top: 30px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 30px !important;}"][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Single Click Easy Shop" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#a5d383" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-shopping-cart"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="24-hour Active Support" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#718aac" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-phone"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Hight Quality Items" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="3" tpvc_features_icon_color="#41bcc3" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-thumbs-o-up"][/vc_column][/vc_row][vc_row el_class="tpvc_row_full"][vc_column width="1/2" css=".vc_custom_1423411660325{background-image: url(http://demo2.toko.press/marketica4/dummy/wp-content/uploads/2015/02/marketica-background-dummy-01.png?id=2407) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Start Shopping Now" paragraf_title_color="#ffffff" paragraf_text="We Offer You a Very Good Deals that you will newer regret." paragraf_text_color="#ffffff" button_text="Shop Now" button_color="button-white" button_align="text-right"][/vc_column][vc_column width="1/2" css=".vc_custom_1423411677938{background-image: url(http://demo2.toko.press/marketica4/dummy/wp-content/uploads/2015/02/marketica-background-dummy-02.png?id=2406) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Partner With Us" paragraf_title_color="#ffffff" paragraf_text="Sign and Start Selling With Us. We Share The Highest Rate." paragraf_text_color="#ffffff" button_text="Start Selling" button_color="button-white" button_align="text-right"][/vc_column][/vc_row][vc_row css=".vc_custom_1487021449658{padding-top: 0px !important;padding-right: 0px !important;padding-left: 0px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_product tpvc_wc_product_style="default" tpvc_wc_product_title="Random Products" tpvc_wc_product_per_page="4" tpvc_wc_product_columns="4" tpvc_wc_product_orderby="rand" tpvc_wc_product_title_icon="fa fa-thumbs-o-up" tpvc_wc_product_title_bg="#ffffff"][/vc_column][/vc_row][vc_row css=".vc_custom_1487021861068{margin-bottom: -20px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_divider tpvc_divider_heading="h2"][/vc_column][/vc_row][vc_row css=".vc_custom_1487022001385{padding-top: 20px !important;padding-right: 50px !important;padding-bottom: 20px !important;padding-left: 50px !important;}" el_class="tpvc_row_full"][vc_column width="1/2" css=".vc_custom_1423091235132{padding-bottom: 30px !important;}"][tokopress_testimonial name="John Doe" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" image="2618"][/vc_column][vc_column width="1/2" css=".vc_custom_1423091246591{padding-bottom: 30px !important;}"][tokopress_testimonial name="Rachel Davis" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" role="Women Fashion" image="2617"][/vc_column][/vc_row][vc_row][vc_column][tokopress_product_categories tpvc_wc_cat_hide_title="hide" tpvc_wc_cat_parent="top" tpvc_wc_cat_numbers="3" tpvc_wc_cat_title_icon="fa fa-instagram"][/vc_column][/vc_row][vc_row css=".vc_custom_1423034152072{padding-bottom: 50px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_heading text="Our Happy Customers" heading="h2" heading_icon="fa fa-users"][tokopress_image_carousel image_size="full" carousel_id="home-carousel" images="1887,1888,1889,1890,1893,1891,1892"][/vc_column][/vc_row]',
		),
		array(
			'name'=> '2. '.__('Marketica - Full Width (v4)','tokopress'),
			'content'=>'[vc_row full_width="stretch_row_content_no_spaces"][vc_column][rev_slider_vc alias="homePage" el_class="tpvc_row_full"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][tokopress_product_search][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487048811271{padding-top: 30px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_column][tokopress_product tpvc_wc_product_style="default" tpvc_wc_product_title="Best Sellers Products" tpvc_wc_product_per_page="4" tpvc_wc_product_columns="4" tpvc_wc_product_orderby="sales" tpvc_wc_product_title_icon="fa fa-usd" tpvc_wc_product_title_bg="#ffffff"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487048833097{padding-top: 70px !important;padding-bottom: 80px !important;background-color: #f5f5f5 !important;}"][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Single Click Easy Shop" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#a5d383" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-shopping-cart"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="24-hour Active Support" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#718aac" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-phone"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Hight Quality Items" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="3" tpvc_features_icon_color="#41bcc3" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-thumbs-o-up"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces" css=".vc_custom_1487049251760{padding-top: 0px !important;padding-bottom: 0px !important;background-color: #333333 !important;}"][vc_column width="1/2" css=".vc_custom_1487049031110{background: #333333 url(http://demo2.toko.press/marketica4/dummy/wp-content/uploads/2015/02/marketica-background-dummy-01.png?id=2407) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Start Shopping Now" paragraf_title_color="#ffffff" paragraf_text="We Offer You a Very Good Deals that you will newer regret." paragraf_text_color="#ffffff" button_text="Shop Now" button_color="button-white" button_align="text-right"][/vc_column][vc_column width="1/2" css=".vc_custom_1487049057688{background: #333333 url(http://demo2.toko.press/marketica4/dummy/wp-content/uploads/2015/02/marketica-background-dummy-02.png?id=2406) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Partner With Us" paragraf_title_color="#ffffff" paragraf_text="Sign and Start Selling With Us. We Share The Highest Rate." paragraf_text_color="#ffffff" button_text="Start Selling" button_color="button-white" button_align="text-right"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487047825855{padding-top: 30px !important;padding-bottom: 80px !important;background-color: #ffffff !important;}"][vc_column][tokopress_product tpvc_wc_product_style="default" tpvc_wc_product_title="Latest Products" tpvc_wc_product_per_page="4" tpvc_wc_product_columns="4" tpvc_wc_product_title_icon="fa fa-usd" tpvc_wc_product_title_bg="#ffffff"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487047276347{padding-top: 50px !important;padding-bottom: 50px !important;background-color: #f5f5f5 !important;}" el_class="tpvc_row_full"][vc_column width="1/2" css=".vc_custom_1423091235132{padding-bottom: 30px !important;}"][tokopress_testimonial name="John Doe" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" image="2618"][/vc_column][vc_column width="1/2" css=".vc_custom_1423091246591{padding-bottom: 30px !important;}"][tokopress_testimonial name="Rachel Davis" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" role="Women Fashion" image="2617"][/vc_column][/vc_row][vc_row full_width="stretch_row_content_no_spaces"][vc_column][tokopress_product_categories tpvc_wc_cat_hide_title="hide" tpvc_wc_cat_parent="top" tpvc_wc_cat_numbers="3" tpvc_wc_cat_title_icon="fa fa-instagram"][/vc_column][/vc_row][vc_row full_width="stretch_row" css=".vc_custom_1487047194133{padding-bottom: 50px !important;background-color: #ffffff !important;}"][vc_column][tokopress_heading text="Our Happy Customers" heading="h2" heading_icon="fa fa-users"][tokopress_image_carousel image_size="full" carousel_id="home-carousel" images="1887,1888,1889,1890,1893,1891,1892"][/vc_column][/vc_row]',
		),
		array(
			'name'=> '3. '.__('Marketica - Home (Legacy)','tokopress'),
			'content'=>'[vc_row el_class="tpvc_row_full"][vc_column][rev_slider_vc alias="homePage" el_class="tpvc_row_full"][/vc_column][/vc_row][vc_row el_class="tpvc_row_full"][vc_column][tokopress_product_search][/vc_column][/vc_row][vc_row css=".vc_custom_1423033468018{margin-right: 0px !important;margin-bottom: 0px !important;margin-left: 0px !important;}" el_class="tpvc_row_full"][vc_column offset="vc_col-md-6"][tokopress_featured_product tpvc_wc_featured_orderby="title" tpvc_wc_featured_columns="1" tpvc_wc_featured_title_icon="fa fa-bullhorn"][/vc_column][vc_column offset="vc_col-md-6"][tokopress_product tpvc_wc_product_style="default" tpvc_wc_product_title="Latest Products" tpvc_wc_product_per_page="4" tpvc_wc_product_title_icon="fa fa-thumbs-o-up"][/vc_column][/vc_row][vc_row css=".vc_custom_1423034234355{padding-top: 50px !important;padding-right: 50px !important;padding-left: 50px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_divider tpvc_divider_heading="h2"][/vc_column][/vc_row][vc_row css=".vc_custom_1423098767434{padding-top: 30px !important;padding-right: 50px !important;padding-bottom: 0px !important;padding-left: 30px !important;}"][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Single Click Easy Shop" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#a5d383" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-shopping-cart"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="24-hour Active Support" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="#" tpvc_features_icon_color="#718aac" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-phone"][/vc_column][vc_column width="2/3" offset="vc_col-md-offset-0 vc_col-md-4 vc_col-sm-offset-2"][tokopress_features tpvc_features_title="Hight Quality Items" tpvc_features_icon_position="left-icon" tpvc_features_heading="h2" tpvc_features_url="3" tpvc_features_icon_color="#41bcc3" tpvc_features_description="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" tpvc_features_icon="fa fa-thumbs-o-up"][/vc_column][/vc_row][vc_row css=".vc_custom_1423033570729{margin-top: 30px !important;margin-bottom: 0px !important;padding-right: 50px !important;padding-left: 50px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_divider tpvc_divider_heading="h2"][/vc_column][/vc_row][vc_row css=".vc_custom_1423033611014{margin-bottom: 0px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_mini_product tpvc_wc_product_title="New Items" tpvc_wc_product_title_icon="fa fa-fire"][/vc_column][/vc_row][vc_row css=".vc_custom_1423091292191{padding-top: 50px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 50px !important;}" el_class="tpvc_row_full"][vc_column width="1/2" css=".vc_custom_1423091235132{padding-bottom: 30px !important;}"][tokopress_testimonial name="John Doe" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" image="2618"][/vc_column][vc_column width="1/2" css=".vc_custom_1423091246591{padding-bottom: 30px !important;}"][tokopress_testimonial name="Rachel Davis" excerpt="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin libero ante, pharetra a nibh at, commodo eleifend est. Nullam eget adipiscing lacus. Suspendisse sed ante sed elit porta auctor non vel ante. Nullam vel tempus risus. Donec non posuere justo. Nam vestibulum" role="Women Fashion" image="2617"][/vc_column][/vc_row][vc_row el_class="tpvc_row_full"][vc_column width="1/2" css=".vc_custom_1423411660325{background-image: url(http://demo2.toko.press/marketica4/dummy/wp-content/uploads/2015/02/marketica-background-dummy-01.png?id=2407) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Start Shopping Now" paragraf_title_color="#ffffff" paragraf_text="We Offer You a Very Good Deals that you will newer regret." paragraf_text_color="#ffffff" button_text="Shop Now" button_color="button-white" button_align="text-right"][/vc_column][vc_column width="1/2" css=".vc_custom_1423411677938{background-image: url(http://demo2.toko.press/marketica4/dummy/wp-content/uploads/2015/02/marketica-background-dummy-02.png?id=2406) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}"][tokopress_call_to_action paragraf_title="Partner With Us" paragraf_title_color="#ffffff" paragraf_text="Sign and Start Selling With Us. We Share The Highest Rate." paragraf_text_color="#ffffff" button_text="Start Selling" button_color="button-white" button_align="text-right"][/vc_column][/vc_row][vc_row css=".vc_custom_1423033662935{padding-top: 20px !important;padding-bottom: 20px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_heading text="Some Companies Used Our Service" heading="h2" heading_icon="fa fa-users"][/vc_column][/vc_row][vc_row css=".vc_custom_1423034152072{padding-bottom: 50px !important;}" el_class="tpvc_row_full"][vc_column][tokopress_image_carousel image_size="full" carousel_id="home-carousel" images="1887,1888,1889,1890,1893,1891,1892"][/vc_column][/vc_row]',
		),
		array(
			'name'=> '4. '.__('Marketica - Plan &amp; Pricing (Legacy)','tokopress'),
			'content'=>'[vc_row css=".vc_custom_1455170848987{margin-right: 0px !important;margin-left: 0px !important;}"][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170236702{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_items="1 User;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN"][/vc_column][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170256160{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_title="REGULAR" tpvc_plantable_value="20" tpvc_plantable_items="10 Users;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN" tpvc_plantable_btn_url="#"][/vc_column][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170266594{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_featured="featured" tpvc_plantable_title="PRO" tpvc_plantable_value="40" tpvc_plantable_items="100 User;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN" tpvc_plantable_btn_url="#"][/vc_column][vc_column width="1/2" offset="vc_col-md-3" css=".vc_custom_1455170276768{padding-right: 0px !important;padding-left: 0px !important;}"][tokopress_pricing tpvc_plantable_title="PLATINUM" tpvc_plantable_value="75" tpvc_plantable_items="Unlimited Users;
Unlimited Page Views;
Standart Feature;
Lorem Ipsum Dolor Sit.;
Consectetur Adipisicing" tpvc_plantable_btn_text="CHOOSE PLAN" tpvc_plantable_btn_url="#"][/vc_column][/vc_row]',
		),
		array(
			'name'=> '5. '.__('Marketica - Team Members (Legacy)','tokopress'),
			'content'=>'[vc_row css=".vc_custom_1423034465179{padding-top: 50px !important;padding-right: 50px !important;padding-bottom: 50px !important;padding-left: 50px !important;}" el_class="tpvc_row_full"][vc_column width="1/1"][vc_column_text el_class="text-center text-large"]Meet The Team That Built Marketica[/vc_column_text][vc_column_text el_class="text-center"]Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit.[/vc_column_text][/vc_column][/vc_row][vc_row el_class="tpvc_row_full"][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="JHON WILLIAM DOE" image_size="full" skill="CEO/Co-Founder" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1941"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="JANE ROE" image_size="full" skill="CTO/Co-Founder" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1937"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="WILLIAM SMITH" image_size="full" skill="Developer" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1938"][/vc_column][vc_column width="1/2" offset="vc_col-md-3"][tokopress_team name="CINDY DAVIS" image_size="full" skill="Designer" excerpt="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, in, neque, dolor voluptatibus quidem id impedit, optio voluptate obcaecati veritatis exercitationem." link_url="#" image="1939"][/vc_column][/vc_row]',
		),
	);
	return array_merge( $args, $args2 );
}

if ( shortcode_exists( 'wcxt-frontend-submission' ) ) {
	add_action( 'vc_before_init', 'tokopress_wc_frontend_submission_vcmap' );
	function tokopress_wc_frontend_submission_vcmap() {

		if ( ! class_exists('woocommerce') )
			return;

		vc_map( array(
		   'name'				=> __( 'WooCommerce - Simple Frontend Submission', 'tokopress' ),
		   'base'				=> 'wcxt-frontend-submission',
		   'class'				=> '',
		   'icon'				=> 'tokopress_icon',
		   'category'			=> 'Tokopress - Marketica',
		   // 'admin_enqueue_css' 	=> array( SHORTCODE_URL . '/css/component.css' ),
		   'params'				=> array(
		   							array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Visibility', 'tokopress' ),
										'description'	=> __( 'Vendor: only vendor can see frontend submission form', 'tokopress' ).'<br/>'.__( 'User: all logged-in users can see frontend submission form', 'tokopress' ).'<br/>'.__( 'All: everyone can see frontend submission form', 'tokopress' ),
										'param_name'	=> 'show_on',
										'value'			=> array(
															''			=> '',
															'Vendor'	=> 'vendor',
															'User'		=> 'user',
															'All'		=> 'all',
														),
										'std'			=> ''
									),

		   							array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Product Type', 'tokopress' ),
										'param_name'	=> 'product_type',
										'value'			=> array(
															''							=> '',
															'Physical'					=> 'physical',
															'Virtual (Service)'			=> 'virtual',
															'Digital (Downloadable)'	=> 'digital',
															'External/Affiliate'		=> 'external',
														),
										'std'			=> ''
									),

									array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Product SKU', 'tokopress' ),
										'param_name'	=> 'product_sku',
										'value'			=> array(
															'No'		=> 'no',
															'Yes'		=> 'yes',
														),
										'std'			=> 'no'
									),

									array(
										'type'			=> 'dropdown',
										'heading'		=> __( 'Product Status', 'tokopress' ),
										'param_name'	=> 'product_sku',
										'value'			=> array(
															'Pending Review'	=> 'pending',
															'Published'			=> 'publish',
															'Draft'				=> 'draft',
														),
										'std'			=> 'pending'
									),

								)
		   )
		);
	}
}
