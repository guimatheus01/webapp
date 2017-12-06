<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<li <?php wc_product_cat_class( '', $category ); ?>>
	<div class="product-inner">

	<?php do_action( 'woocommerce_before_subcategory', $category ); ?>

	<div class="thumbnail-loop-wrap">

		<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">

			<?php
				/**
				 * woocommerce_before_subcategory_title hook
				 *
				 * @hooked woocommerce_subcategory_thumbnail - 10
				 */
				do_action( 'woocommerce_before_subcategory_title', $category );
			?>

		</a>

		<?php if ( of_get_option('tokopress_wc_products_category_style') == 'alt' ) : ?>
			<div class="add-to-cart-loop-wrap">

				<a class="button detail_button_loop" href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
					<?php
					echo $category->name;
					if ( $category->count > 0 ) {
						echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
					}
					?>
				</a>

			</div>
		<?php endif; ?>

		<?php
			/**
			 * woocommerce_after_subcategory_title hook
			 */
			do_action( 'woocommerce_after_subcategory_title', $category );
		?>

	</div>

	<?php if ( of_get_option('tokopress_wc_products_category_style') != 'alt' ) : ?>
		<div class="title-rating-loop-wrap">
			<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>">
				<h3>
				<?php
				echo $category->name;
				if ( $category->count > 0 ) {
					echo apply_filters( 'woocommerce_subcategory_count_html', ' <span class="count">(' . $category->count . ')</span>', $category );
				}
				?>
				</h3>
			</a>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_subcategory', $category ); ?>
	
	</div>
</li>
