<?php

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
wp_redirect( home_url() );
exit();
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

 }
 add_action( 'admin_menu', 'remove_menus' );
?>
