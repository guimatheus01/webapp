<?php
/**
 * Product Search
 */
?>

<form role="search" method="get" class="search-form ajaxsearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="search-field dokan-ajax-search-textfield" placeholder="<?php echo esc_attr_x( 'just type here &hellip;', 'placeholder', 'tokopress' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'tokopress' ); ?>" />
    <?php wp_dropdown_categories( array(
        'taxonomy' => 'product_cat',
        'show_option_all' => __( 'All', 'tokopress' ),
        'hierarchical' => true,
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
        'class' => 'orderby dokan-ajax-search-category',
        'walker' => new Dokan_LS_Walker_CategoryDropdown()
    ) ); ?>
    <input type="hidden" name="post_type" value="product" />
    <div class="quicknav-close">
        <a rel="nofollow" class="quicknav-icon" href="javascript:void(0)">
            <i class="sli sli-close"></i>
        </a>
    </div>
</form>
