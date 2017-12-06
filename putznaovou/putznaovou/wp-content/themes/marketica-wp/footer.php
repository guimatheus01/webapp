<?php
/**
 * Footer
 */
$allowed_html = array(
	'a' => array(
		'href'  => array(),
		'title' => array(),
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'p' => array(),
);
?>

		</div>
		</div>
		</div>

		<?php do_action( 'tokopress_after_wrapper' ); ?>

		<?php if( !of_get_option( 'tokopresss_disable_footer_widget' ) ) : ?>
			<?php get_template_part( 'block', 'footer-widget' ); ?>
		<?php endif; ?>

		<?php if( !of_get_option( 'tokopresss_disable_footer_credit' ) ) : ?>
			<?php $footer_text = of_get_option( 'tokopress_footer_text' ); ?>
			<div class="footer-credits">
				<div class="container-wrap">
	            	<div class="copyright"><?php echo wp_kses( $footer_text, $allowed_html ); /* support qTranslateX */ ?></div>
	            </div>
	        </div>
	    <?php endif; ?>

	</div>
	<div id="back-top" style="display:block;"><i class="fa fa-angle-up"></i></div>
	<div class="sb-slidebar <?php echo ( is_rtl() ? 'sb-right' : 'sb-left' ); ?> sb-style-push"></div>
    <?php wp_footer(); ?>
    </body>
</html>
