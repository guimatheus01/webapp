<?php
/**
 * Theme Options Settings
 */

/*
 * Load Option Framework
 */
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/option-framework/' );
tokopress_include_file( get_template_directory() . '/inc/option-framework/options-framework.php' );

/**
 * Set Option Name For Option Framework
 */
function optionsframework_option_name() {
	$optionsframework_settings = get_option( 'optionsframework' );
	if ( defined( 'THEME_NAME' ) ) {
		$optionsframework_settings['id'] = THEME_NAME;
	}
	else {
		$themename = wp_get_theme();
		$themename = preg_replace("/\W/", "_", strtolower($themename) );
		$optionsframework_settings['id'] = $themename;
	}
	update_option( 'optionsframework', $optionsframework_settings );

    $defaults = optionsframework_defaults();
	add_option( $optionsframework_settings['id'], $defaults, '', 'yes' );
}

/**
 * Get Default Options For Option Framework
 */
function optionsframework_defaults() {
    $options = null;
    $location = apply_filters( 'options_framework_location', array(get_template_directory() . '/inc/theme/options.php') );
    if ( $optionsfile = locate_template( $location ) ) {
        $maybe_options = tokopress_require_file( $optionsfile );
        if ( is_array( $maybe_options ) ) {
			$options = $maybe_options;
        } else if ( function_exists( 'optionsframework_options' ) ) {
			$options = optionsframework_options();
		}
    }
    $options = apply_filters( 'of_options', $options );
    $defaults = array();
    foreach ($options as $key => $value) {
    	if( isset($value['id']) && isset($value['std']) ) {
    		$defaults[$value['id']] = $value['std'];
    	}
    }
    return $defaults;
}

/*
 * Override a default filter for 'textarea' sanitization and $allowedposttags + embed and script.
 */
add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'tokopress_of_sanitize_textarea' );
}
function tokopress_of_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();

      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

/**
 * Load Custom Style For Option Framework
 */
function tokopress_style_option_framework() {
	wp_enqueue_style( 'style-option-framework', OPTIONS_FRAMEWORK_DIRECTORY . '/css/option-framework.css' );
}
add_action( 'optionsframework_custom_scripts', 'tokopress_style_option_framework' );

/**
 * Header Settings
 */
function tokopress_header_settings( $options ) {

	$options[] = array(
		'name' 	=> __( 'Header', 'tokopress' ),
		'type' 	=> 'heading'
	);

		if ( function_exists( 'wp_site_icon' ) ) {
			$options[] = array(
				'name' 	=> __( 'Favicon', 'tokopress' ),
				'type' 	=> 'info',
				'desc' 	=> sprintf( __( 'Go to <a href="%s">Appearance - Customize - Site Identity</a> to customize Favicon (Site Icon).', 'tokopress' ), admin_url( 'customize.php?autofocus[control]=site_icon' ) ),
			);
		}
		else {
			$options[] = array(
				'name' 	=> __( 'Favicon', 'tokopress' ),
				'id' 	=> 'tokopress_favicon',
				'type' 	=> 'upload',
			);
		}

		$options[] = array(
			'name' 	=> __( 'Sticky Header', 'tokopress' ),
			'type' 	=> 'info'
		);

			$options[] = array(
				'name' 	=> __( 'Sticky Header', 'tokopress' ),
				'desc' 	=> __( 'ENABLE sticky header', 'tokopress' ),
				'id' 	=> 'tokopress_sticky_header',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);

		$options[] = array(
			'name' 	=> __( 'Header Section', 'tokopress' ),
			'type' 	=> 'info'
		);

			$options[] = array(
				'name' 	=> __( 'Site Logo', 'tokopress' ),
				'id' 	=> 'tokopress_site_logo',
				'type' 	=> 'upload'
			);

			$options[] = array(
			    'name' => __('Site Logo - Height (px)', 'tokopress'),
			    'desc' => '',
			    'id' => 'tokopress_site_logo_h',
			    'std' => '30',
			    'type' => 'radio',
			    'options' => array(
				    '30' => '30px (default)',
				    '60' => '60px',
				    '90' => '90px',
				)
			);

			$options[] = array(
			    'name' => __('Site Logo - Maximum Width (px)', 'tokopress'),
			    'desc' => '',
			    'id' => 'tokopress_site_logo_w',
			    'std' => '200',
			    'type' => 'radio',
			    'options' => array(
				    '200' => '200px (default)',
				    '250' => '250px',
				)
			);

			$options[] = array(
				'name' 	=> __( 'Search', 'tokopress' ),
				'desc' 	=> __( 'DISABLE search', 'tokopress' ),
				'id' 	=> 'tokopress_wc_disable_search',
				'std' 	=> '',
				'type' 	=> 'checkbox'
			);

			$options[] = array(
				'name' 	=> __( 'Account Navigation', 'tokopress' ),
				'desc' 	=> __( 'DISABLE account dropdown navigation', 'tokopress' ),
				'id' 	=> 'tokopress_wc_disable_link_account',
				'std' 	=> '',
				'type' 	=> 'checkbox'
			);

			if ( function_exists( 'qtranxf_generateLanguageSelectCode' ) || function_exists( 'icl_get_languages' ) ) {
				$options[] = array(
					'name' 	=> __( 'Language Selector', 'tokopress' ),
					'desc' 	=> __( 'ENABLE language selector for WPML / QTranslateX', 'tokopress' ),
					'id' 	=> 'tokopress_wc_enable_lang_selector',
					'std' 	=> '',
					'type' 	=> 'checkbox'
				);
			}

			$options[] = array(
				'name' 	=> __( 'Cart Link', 'tokopress' ),
				'desc' 	=> __( 'DISABLE cart link', 'tokopress' ),
				'id' 	=> 'tokopress_wc_disable_mini_cart',
				'std' 	=> '',
				'type' 	=> 'checkbox'
			);

		$options[] = array(
			'name' 	=> __( 'Page Header Section', 'tokopress' ),
			'type' 	=> 'info'
		);

			$options[] = array(
				'name' => __( 'Page Header Style', 'tokopress' ),
				'desc' => '',
				'id' => 'tokopress_page_header_style',
				'std' => 'outer',
				'type' => 'images',
				'options' => array(
						'outer' => THEME_URI . '/img/page-header-outer.png',
						'inner' => THEME_URI . '/img/page-header-inner.png',
					)
			);

		$options[] = array(
			'name' 	=> __( 'Header Scripts', 'tokopress' ),
			'type' 	=> 'info'
		);

			$options[] = array(
				'name' 	=> __( 'Header Script', 'tokopress' ),
				'desc' 	=> __( 'You can put any script here, for example your Google Analytics scripts.', 'tokopress' ),
				'id' 	=> 'tokopress_header_script',
				'std' 	=> '',
				'type' 	=> 'textarea'
			);

	return $options;
}
add_filter( 'of_options', 'tokopress_header_settings', 2 );

/**
 * Footer Settings
 */
function tokopress_footer_settings( $options ) {

	$options[] = array(
		'name' 	=> __( 'Footer', 'tokopress' ),
		'type' 	=> 'heading'
	);

		$options[] = array(
			'name' 	=> __( 'Footer Section', 'tokopress' ),
			'type' 	=> 'info'
		);

			$options[] = array(
				'name' 	=> __( 'Footer Widget', 'tokopress' ),
				'desc' 	=> __( 'DISABLE footer widget', 'tokopress' ),
				'id' 	=> 'tokopresss_disable_footer_widget',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);

			$options[] = array(
				'name' 	=> __( 'Footer Credit', 'tokopress' ),
				'desc' 	=> __( 'DISABLE footer credit', 'tokopress' ),
				'id' 	=> 'tokopresss_disable_footer_credit',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);

			$options[] = array(
				'name' 	=> __( 'Footer Credit Text', 'tokopress' ),
				'desc' 	=> '',
				'id' 	=> 'tokopress_footer_text',
				'std' 	=> 'Copyright &copy; 2015 TokoPress<span><a href="#">Privacy Policy</a> . <a href="#">terms of services</a></span>',
				'type' 	=> 'textarea'
			);

		$options[] = array(
			'name' 	=> __( 'Footer Scripts', 'tokopress' ),
			'type' 	=> 'info'
		);

			$options[] = array(
				'name' 	=> __( 'Footer Script', 'tokopress' ),
				'desc' 	=> __( 'You can put any script here, for example your Google Analytics scripts.', 'tokopress' ),
				'id' 	=> 'tokopress_footer_script',
				'std' 	=> '',
				'type' 	=> 'textarea'
			);

	return $options;
}
add_filter( 'of_options', 'tokopress_footer_settings', 4 );

/**
 * Contact Tab Options
 */
function tokopress_contact_settings( $options ) {
	$options[] =array(
		'name' => __( 'Contact Template', 'tokopress' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' 	=> __( 'Contact Form', 'tokopress' ),
			'type' 	=> 'info',
			'desc' 	=> __( 'We use simple contact form here. If you need <b>advanced contact form</b> (with more fields and setting), we recommend you to use Contact Form 7, Ninja Forms, or Gravity Forms plugin.', 'tokopress' ),
		);

		$options[] = array(
			'name' 	=> __( 'Contact Map', 'tokopress' ),
			'type' 	=> 'info',
			'desc' 	=> '',
		);

		$options[] = array(
			'name' 	=> __( 'DISABLE Map', 'tokopress' ),
			'desc' 	=> __( 'DISABLE map from contact', 'tokopress' ),
			'id' 	=> 'tokopress_disable_contact_map',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name'=> __( 'Latitude', 'tokopress' ),
			'desc'=> __( 'Insert map Latitude koordinat', 'tokopress' ),
			'id'=> 'tokopress_contact_lat',
			'type'=> 'text',
			'std'=> '-6.903932'
		);
		$options[] = array(
			'name'=> __( 'Longitude', 'tokopress' ),
			'desc'=> __( 'Insert map Longitude koordinat', 'tokopress' ),
			'id'=> 'tokopress_contact_long',
			'type'=> 'text',
			'std'=> '107.610344'
		);
		$options[] = array(
			'name'=> __( 'Marker Title', 'tokopress' ),
			'desc'=> __( 'Insert marker title', 'tokopress' ),
			'id'=> 'tokopress_contact_marker_title',
			'type'=> 'text',
			'std'=> 'Marker Title'
		);
		$options[] = array(
			'name'=> __( 'Marker Description', 'tokopress' ),
			'desc'=> __( 'Insert marker description', 'tokopress' ),
			'id'=> 'tokopress_contact_marker_desc',
			'type'=> 'textarea',
			'std'=> 'Marker Content'
		);
		$options[] = array(
			'name'=> __( 'Google Maps API Key (optional)', 'tokopress' ),
			'desc'=> __( 'Usage of the Google Maps APIs now requires a key if your domain was not active prior to June 22nd, 2016.', 'tokopress' ).' <br/><a href="https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key">'.__( 'Click here to get your Google Maps API key', 'tokopress' ).'</a>',
			'id'=> 'tokopress_contact_apikey',
			'type'=> 'text',
			'std'=> ''
		);

	return $options;
}
add_filter( 'of_options', 'tokopress_contact_settings', 6 );

/**
 * Misc Tab Options
 */
function tokopress_misc_settings( $options ) {
	$options[] =array(
		'name' => __( 'Misc', 'tokopress' ),
		'type' => 'heading'
	);

		$options[] = array(
			'name' 	=> __( 'ENABLE Visual Composer License Page', 'tokopress' ),
			'desc' 	=> __( 'ENABLE Visual Composer License Page. It is useful if you purchase Visual Composer license to get direct plugin updates and official support from Visual Composer developer.', 'tokopress' ),
			'id' 	=> 'tokopress_enable_vc_license',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'DISABLE generator meta tag', 'tokopress' ),
			'desc' 	=> __( 'DISABLE generator meta tag from WordPress, WooCommerce, Visual Composer, and Revolution Slider for security purpose.', 'tokopress' ),
			'id' 	=> 'tokopress_disable_wordpress_generator',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'DISABLE WordPress Emoji', 'tokopress' ),
			'desc' 	=> __( 'DISABLE WordPress Emoji script if you do not need it.', 'tokopress' ),
			'id' 	=> 'tokopress_disable_wordpress_emoji',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

		$options[] = array(
			'name' 	=> __( 'DISABLE WordPress Responsive Images', 'tokopress' ),
			'desc' 	=> __( 'DISABLE WordPress Responsive Images srcset if you do not need it.', 'tokopress' ),
			'id' 	=> 'tokopress_disable_wordpress_responsive_images',
			'std' 	=> '0',
			'type' 	=> 'checkbox'
		);

	    if ( is_child_theme() ) {
			$options[] = array(
				'name' 	=> __( 'DISABLE Child Theme\'s style.css', 'tokopress' ),
				'desc' 	=> __( 'DISABLE Child Theme\'s style.css if you do not use it.', 'tokopress' ),
				'id' 	=> 'tokopress_disable_child_theme_style',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);
		}

		if ( class_exists( 'Jetpack' ) ) {
			$options[] = array(
				'name' 	=> __( 'DISABLE Jetpack JS & CSS', 'tokopress' ),
				'desc' 	=> __( 'DISABLE Jetpack JS & CSS if you do not need it.', 'tokopress' ),
				'id' 	=> 'tokopress_disable_jetpack_jscss',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);
		}

		if ( class_exists( 'woocommerce' ) ) {
			$options[] = array(
				'name' 	=> __( 'Custom WooCommerce Small Screen CSS', 'tokopress' ),
				'desc' 	=> __( 'Load custom woocommerce small screen CSS file. It is useful when your javascript minify plugin does not work.', 'tokopress' ),
				'id' 	=> 'tokopress_custom_woocommerce_smallscreen',
				'std' 	=> '0',
				'type' 	=> 'checkbox'
			);
		}

		// $options[] = array(
		// 	'name' 	=> __( 'Move jQuery To Bottom', 'tokopress' ),
		// 	'desc' 	=> __( 'Move jQuery to optimize page speed. Please remember that it is NOT compatible with all plugins.', 'tokopress' ),
		// 	'id' 	=> 'tokopress_jquery_bottom',
		// 	'std' 	=> '0',
		// 	'type' 	=> 'checkbox'
		// );

	return $options;
}
add_filter( 'of_options', 'tokopress_misc_settings', 25 );
