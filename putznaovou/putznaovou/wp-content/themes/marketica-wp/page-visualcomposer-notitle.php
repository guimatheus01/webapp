<?php
/**
 * Template Name:Visual Composer + No Title
 */

add_filter( 'tokopress_content_class', 'toko_content_class_page_visualcomposernotitle' );
function toko_content_class_page_visualcomposernotitle( $classes ) {
	$classes[] = 'margintop-no';
	return $classes;
}

get_header(); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<div class="content-area" id="primary">
	    <div class="page-content">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; ?>
			<?php else : ?>

				<?php get_template_part( 'content', '404' ); ?>

			<?php endif; ?>

	    </div>
	</div>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
