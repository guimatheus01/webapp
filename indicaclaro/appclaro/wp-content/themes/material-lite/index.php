<?php
/**
 * @version    1.0
 * @package    Material Lite
 * @author     Ghuwad Team <contact@ghuwad.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.ghuwad.com
 */

get_header(); ?>
<div class="wrapper wrapper-full-page">
	<div class="full-page login-page" filter-color="black" style="padding-top: 12vh;min-height: calc(100vh - 0px);">
		<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
		<div class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
						<form>
							<img src="<?php echo get_template_directory_uri() ?>/assets/img/CLARO.png" alt="" class="img-responsive">
							<div class="card card-login card-hidden">
								<br><br>
								
								<div class="footer text-center">
									<a href="<?php echo home_url() ?>/cadastro-de-parceiro/" class="btn btn-red btn-wd btn-lg">Seja um Parceiro<div class="ripple-container"></div></a>
									<br>
									<a href="<?php echo home_url() ?>/login" class="btn btn-red btn-wd btn-lg">Fazer Login<div class="ripple-container"></div></a>
								</div>
								<br>
								<br>
								<br>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
<?php get_footer(); ?>