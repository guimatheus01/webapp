<?php
/**
 * Page
 */

get_header(); ?>

<?php if ( of_get_option( 'tokopress_page_header_style' ) != 'inner' ) get_template_part( 'block-page-header-outer' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<section class="content-area" id="primary">

		<?php if ( of_get_option( 'tokopress_page_header_style' ) == 'inner' ) get_template_part( 'block-page-header-inner' ); ?>

	    <div class="page-content">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php if( has_shortcode( get_the_content(), 'pv_vendor_dashboard' ) || has_shortcode( get_the_content(), 'pv_orders' ) || has_shortcode( get_the_content(), 'pv_shop_settings' ) ) : ?>
						<div class="mgates-page">
							<?php get_template_part( 'content', 'page' ); ?>
						</div>
					<?php else : ?>
						<?php get_template_part( 'content', 'page' ); ?>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php else : ?>

				<?php get_template_part( 'content', '404' ); ?>

			<?php endif; ?>

	    </div>
	</section>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
