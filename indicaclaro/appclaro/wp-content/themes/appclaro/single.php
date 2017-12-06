<?php get_header() ?>
<?php while ( have_posts() ) : the_post(); ?>
   <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" style="background: #F44336;min-height: calc(100vh - 0px);">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <br><br><br>
                        <div class="col-sm-6 col-md-offset-3 col-sm-offset-3">
                            <form method="post" action="">
                            	<div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title"><?php the_title() ?></h4>
                                        <p><small>Faça seu cadastro</small></p>
                                    </div>
                                <?php the_content() ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <p class="copyright text-center">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="">Criado pela MEOAPP</a>, APP CLARO
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <?php endwhile; // end of the loop. ?>
<?php get_footer() ?>