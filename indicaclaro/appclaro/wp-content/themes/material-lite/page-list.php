<?php
/**
 * @version    1.0
 * @package    Material Lite
 * @author     Ghuwad Team <contact@ghuwad.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Template Name: List
 * Websites: http://www.ghuwad.com
 */

get_header();


//Capturar ID do usuario logado
$user =  get_current_user_id( );

// Capturando os dados dos submists pelo banco de dados do wordpress
$item_info = $wpdb->get_results("
	SELECT p.ID, p.post_author, p.post_type, pm.post_id, pm.meta_key, pm.meta_value 

	FROM gw6i_posts as p INNER JOIN gw6i_postmeta as pm 
		ON p.ID = pm.post_id

	WHERE p.post_type = 'nf_sub' 
		AND p.post_status = 'publish'
		AND p.post_author = '".$user."'

	ORDER BY pm.post_id, pm.meta_key 

", ARRAY_A);


?>

<div id="primary" class="" class="" role="main">
		<div class="full-page login-page" filter-color="black" style="background: #F44336;padding-top: 5vh;min-height: calc(100vh - 0px);">
			<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
							<article id="post-<?php the_ID(); ?>" class="card card-login card-hidden">
								 <div class="card-header text-center" data-background-color="rose">
									<h4 class="card-title"><?php the_title() ?></h4>
								</div>
								<div class="category text-center">
									<br>
								<?php 

										foreach ($item_info as $inf){

											if ($inf['meta_key'] == "_field_20") {
												echo "<hr>";
												print "<strong>Nome:</strong> " . $inf['meta_value'] . "<br>"; 
											};
											if ($inf['meta_key'] == '_field_31') {
												print "<strong>CPF:</strong> " .  $inf['meta_value'] . "<br>";
											};
											if ($inf['meta_key'] == '_field_32') {
												print "<strong>Telefone:</strong> " .  $inf['meta_value'] . "<br>";
											};
											if ($inf['meta_key'] == '_field_36') {
												print "<strong>Situação:</strong> " . $inf['meta_value'] . "<br>";
											};
											if ($inf['meta_key'] == '_field_30') {

												//capturando o dado
												$string = $inf['meta_value'];
												//trasforando os dados em array
												$array = explode('"', $string);

												//tratando os dados
												$sw1 = (!$array[1] == NULL) ? $array[1].", " : "" ;
												$sw3 = (!$array[3] == NULL) ? $array[3].", " : "" ;
												$sw5 = (!$array[5] == NULL) ? $array[5]."." : "" ;

												print "<strong>Planos:</strong> {$sw1} {$sw3} {$sw5} <br> ";
											};
											
										};					

								?> 
								</div>
							</article>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>




