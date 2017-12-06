<?php
/**
 * @version    1.0
 * @package    Material Lite
 * @author     Ghuwad Team <contact@ghuwad.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.ghuwad.com
 *
 * You can find common theme function at ghuwad/inc/common-functions.php
 */

if ( ! isset( $content_width ) ) $content_width = 900;

// Initialize theme
include_once get_template_directory() . '/ghuwad/theme.php';

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
wp_redirect( home_url() );
exit();
}

add_action( 'wp_login_failed', 'pippin_login_fail' );  // hook failed login
function pippin_login_fail( $username ) {
     $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
     // if there's a valid referrer, and it's not the default log-in screen
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_redirect(home_url() . '/login/?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
          exit;
     }
}

function remove_menus(){

 remove_menu_page( 'index.php' ); //Dashboard 
 remove_menu_page( 'edit.php' ); //Posts - publicações
 remove_menu_page( 'upload.php' ); //Media - imagens, vídeos, docs, etc...
 remove_menu_page( 'edit.php?post_type=page' ); //Pages - páginas
 remove_menu_page( 'edit-comments.php' ); //Comments - comentários
 remove_menu_page( 'themes.php' ); //Appearance - aparência (recomendo!)
 remove_menu_page( 'plugins.php' ); //Plugins (recomendo!)
 remove_menu_page( 'users.php' ); //Users - usuários 
 remove_menu_page( 'tools.php' ); //Tools - ferramentas (recomendo!)
 remove_menu_page( 'options-general.php' ); //Settings - configurações 
 remove_menu_page( 'admin.php?page=wpcf7' ); //remove contact-form 7 do menu do wp-admin
 remove_menu_page( 'admin.php?page=ninja-forms' ); //remove contact-form 7 do menu do wp-admin
 remove_menu_page( 'admin.php?page=bwp_minify_general' ); //remove contact-form 7 do menu do wp-admin
 remove_menu_page( 'link-manager.php' ); //Tools - ferramentas (recomendo!)

 }
 add_action( 'admin_menu', 'remove_menus' );


function ninja_forms_get_subs( $args = array() ) { 
 
    $plugin_settings = nf_get_settings(); 
 
    if ( isset ( $plugin_settings['date_format'] ) ) { 
        $date_format = $plugin_settings['date_format']; 
    } else { 
        $date_format = 'm/d/Y'; 
    } 
 
    if( is_array( $args ) AND ! empty( $args ) ) { 
 
        $subs_results = array(); 
        $meta_query = array(); 
        $date_query = array(); 
 
        if( isset( $args['form_id'] ) ) { 
            $meta_query[] = array( 
                'key' => '_form_id',  
                'value' => $args['form_id'],  
 ); 
        } 
 
        if( isset( $args['action'])) { 
            $meta_query[] = array( 
                'key' => '_action',  
                'value' => $args['action'],  
 ); 
        } 
         
        $query_args = array( 
            'post_type' => 'nf_sub',  
            'date_query' => $date_query,  
            'meta_query' => $meta_query,  
            'posts_per_page' => -1,  
 ); 
 
        if( isset( $args['user_id'] ) ) { 
            $query_args['author'] = $args['user_id']; 
        } 
 
 
 
        if( isset( $args['begin_date'] ) AND $args['begin_date'] != '') { 
            $query_args['date_query']['after'] = nf_get_begin_date( $args['begin_date'] )->format("Y-m-d G:i:s"); 
        } 
 
        if( isset( $args['end_date'] ) AND $args['end_date'] != '' ) { 
            $query_args['date_query']['before'] = nf_get_end_date( $args['end_date'] )->format("Y-m-d G:i:s"); 
        } 
 
        $subs = get_posts( $query_args ); 
 
        if ( is_array( $subs ) && ! empty( $subs ) ) { 
            $x = 0; 
            foreach ( $subs as $sub ) { 
                $data = array(); 
                $subs_results[$x]['id'] = $sub->ID; 
                $subs_results[$x]['user_id'] = $sub->post_author; 
                $subs_results[$x]['form_id'] = get_post_meta( $sub->ID, '_form_id' ); 
                $subs_results[$x]['action'] = get_post_meta( $sub->ID, '_action' ); 
 
                $meta = get_post_custom( $sub->ID ); 
 
                foreach ( $meta as $key => $array ) { 
                    if ( strpos( $key, '_field_' ) !== false ) { 
                        $field_id = str_replace( '_field_', '', $key ); 
                        $user_value = $array[0]; 
                        $data[] = array( 'field_id' => $field_id, 'user_value' => $user_value ); 
                    } 
                } 
 
                $subs_results[$x]['data'] = $data; 
                $subs_results[$x]['date_updated'] = $sub->post_modified; 
 
                $x++; 
            } 
        } 
 
        return $subs_results; 
    } 
} 

