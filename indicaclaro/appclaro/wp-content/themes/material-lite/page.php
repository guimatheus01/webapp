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

<div id="primary" class="" class="" role="main">
        <div class="full-page login-page" filter-color="black" style="background: #F44336;padding-top: 5vh;min-height: calc(100vh - 0px);">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
                       	</div>
                    </div>
                </div>
            </div>
<?php get_footer(); ?>




