<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

$display_dimension = apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() );

if ( $product && ( $product->has_attributes() || $display_dimension ) ) {
	$hide = false;
}
else {
	$hide = true;
}

if ( $hide )
	return;

$attributes = $product->get_attributes();
?>
<ul class="list-item-details">

	<?php if ( version_compare( WC_VERSION, '3.0.0', '>=' ) ) : ?>

		<?php if ( apply_filters( 'wc_product_enable_dimensions_display', $product->has_weight() || $product->has_dimensions() ) ) : ?>

			<?php if ( $product->has_weight() ) : ?>
				<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'Weight', 'tokopress' ), esc_html( wc_format_weight( $product->get_weight() ) ) ); ?>
			<?php endif; ?>

			<?php if ( $product->has_dimensions() ) : ?>
				<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'Dimensions', 'tokopress' ), esc_html( wc_format_dimensions( $product->get_dimensions( false ) ) ) ); ?>
			<?php endif; ?>

		<?php endif; ?>

		<?php foreach ( $attributes as $attribute ) : ?>
			<li>
				<span class="data-type"><?php echo wc_attribute_label( $attribute->get_name() ); ?></span>
				<span class="value"><?php
					$values = array();

					if ( $attribute->is_taxonomy() ) {
						$attribute_taxonomy = $attribute->get_taxonomy_object();
						$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

						foreach ( $attribute_values as $attribute_value ) {
							$value_name = esc_html( $attribute_value->name );

							if ( $attribute_taxonomy->attribute_public ) {
								$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
							} else {
								$values[] = $value_name;
							}
						}
					} else {
						$values = $attribute->get_options();

						foreach ( $values as &$value ) {
							$value = esc_html( $value );
						}
					}

					echo apply_filters( 'woocommerce_attribute', wptexturize( implode( ', ', $values ) ), $attribute, $values );
				?></span>
			</li>
		<?php endforeach; ?>

	<?php else : ?>

		<?php if ( $product->enable_dimensions_display() ) : ?>

			<?php if ( $product->has_weight() ) : $has_row = true; ?>
				<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'Weight', 'tokopress' ), $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ) ); ?>
			<?php endif; ?>

			<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
				<?php printf( '<li><span class="data-type">%s</span><span class="value">%s</span></li>', __( 'Dimensions', 'tokopress' ), $product->get_dimensions() ); ?>
			<?php endif; ?>

		<?php endif; ?>

		<?php foreach ( $attributes as $attribute ) :
			if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
				continue;
			}
			?>
			<li>
				<span class="data-type">
					<?php echo wc_attribute_label( $attribute['name'] ); ?>
				</span>
				<span class="value">
					<?php
					if ( $attribute['is_taxonomy'] ) {
						$values = wc_get_product_terms( $product->id, $attribute['name'], array( 'fields' => 'names' ) );
						echo apply_filters( 'woocommerce_attribute', implode( ', ', $values ), $attribute, $values );
					}
					else {
						// Convert pipes to commas and display values
						$values = array_map( 'trim', explode( WC_DELIMITER, $attribute['value'] ) );
						echo apply_filters( 'woocommerce_attribute', implode( ', ', $values ), $attribute, $values );
					}
					?>
				</span>
			</li>
		<?php endforeach; ?>

	<?php endif; ?>

</ul>
