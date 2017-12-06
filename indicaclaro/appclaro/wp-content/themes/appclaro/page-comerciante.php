<?php get_header(); /* Template Name: Cadastro Revendedor */?>
<?php if (!is_user_logged_in()): ?>

<?php endif; ?>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" style="background: #F44336;padding-top: 20vh;min-height: calc(100vh - 0px);">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                        <form>
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="rose">
                                    <h4 class="card-title"><?php echo the_title() ?></h4>
                                </div>
                                <p class="category text-center">
                                    <br>
                                </p>
                                <?php echo do_shortcode('[ultimatemember form_id=76]'); ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>

