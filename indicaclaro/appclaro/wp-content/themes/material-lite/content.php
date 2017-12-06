<?php
/**
 * @version    1.0
 * @package    Material Lite
 * @author     Ghuwad Team <contact@ghuwad.com>
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Websites: http://www.ghuwad.com
 */
?>
<article id="post-<?php the_ID(); ?>" class="card card-login card-hidden">
    <!-- <header> -->
         <div class="card-header text-center" data-background-color="rose">
            <h4 class="card-title"><?php the_title() ?></h4>
        </div>
    <!-- </header> -->
	<?php if ( has_post_thumbnail() && !post_password_required()) : ?>
	<div class="entry-thumb mdl-card__media mdl-shadow--2dp">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<?php endif; ?>

    <div class="category text-center">
    	<?php the_content(); ?>
    </div>
</article>