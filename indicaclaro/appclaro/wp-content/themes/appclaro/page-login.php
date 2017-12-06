<?php get_header(); /* Template Name: Login */?>

<div class="wrapper wrapper-full-page">
		<div class="full-page login-page" filter-color="black" style=";padding-top: 20vh;min-height: calc(100vh - 0px);">
			<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
							<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
								<div class="card card-login card-hidden">
									<div class="card-header text-center" data-background-color="rose">
										<h4 class="card-title">Login</h4>
									</div>
									<p class="category text-center">
										<br>
									</p>
									<div class="card-content">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">face</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Login</label>
												<input type="text" class="form-control" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
											</div>
										</div>
										<div class="input-group">
											<span class="input-group-addon">
												<i class="material-icons">lock_outline</i>
											</span>
											<div class="form-group label-floating">
												<label class="control-label">Senha</label>
												<input type="password"  class="form-control" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
											</div>
										</div>
									</div>
									<div class="footer text-center">
										<?php do_action('login_form'); ?>
										<input type="submit"  class="btn btn-rose btn-wd btn-lg" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
										<input type="hidden" name="redirect_to" value="<?php echo home_url(); ?>'/wp-admin" />
										<input type="hidden" name="user-cookie" value="1" />
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>

