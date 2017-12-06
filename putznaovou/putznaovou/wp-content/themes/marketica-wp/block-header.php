<?php
/**
 * Header Block
 */

global $woocommerce;
?>

<header id="header" class="site-header">
    <div class="header-top-wrap">
        <div class="container-wrap">

            <div class="header-left">
                <div class="site-logo">
                    <a href="<?php echo home_url('/'); ?>">
                        <?php if( !of_get_option( 'tokopress_site_logo' ) ) : ?>
                            <span class="logo-text"><?php bloginfo( 'name' ); ?></span>
                        <?php else : ?>
                            <img src="<?php echo of_get_option( 'tokopress_site_logo' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                    </a>
                </div>
            </div>

            <div class="header-right">

                <div class="header-right-wrap">

                    <?php if( has_nav_menu( 'primary_menu' ) ) : ?>
                        <?php
                            $primary_args = array(
                                'theme_location'    => 'primary_menu',
                                'container'         => false,
                                'menu_class'        => 'header-menu',
                                'menu_id'           => 'header-menu'
                            );
                            wp_nav_menu( $primary_args );
                        ?>
                    <?php endif; ?>

                    <?php if( has_nav_menu( 'primary_menu' ) || ( has_nav_menu( 'secondary_menu' ) && !function_exists( 'ubermenu' ) ) ) : ?>
                        <div class="quicknav-menu">
                            <a rel="nofollow" class="quicknav-icon <?php echo ( is_rtl() ? 'sb-toggle-right' : 'sb-toggle-left' ); ?>" href="javascript:void(0)">
                                <i class="fa fa-navicon"></i>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php do_action( 'marketica_quicknav_before' ); ?>

                    <?php if ( ! of_get_option( 'tokopress_wc_disable_search' ) ) : ?>
                        <div class="quicknav-search">
                            <a rel="nofollow" class="quicknav-icon" href="javascript:void(0)">
                                <i class="sli sli-magnifier"></i>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! of_get_option( 'tokopress_wc_disable_link_account' ) ) : ?>
                        <div class="quicknav-account">
                            <a rel="nofollow" class="quicknav-icon" href="javascript:void(0)">
                                <i class="sli sli-user"></i>
                            </a>
                            <ul class="account-menu">
                                <?php do_action( 'tokopress_quicknav_account' ); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! of_get_option( 'tokopress_wc_disable_mini_cart' ) ) : ?>
                        <?php if( class_exists( 'woocommerce' ) ) : ?>
                            <div class="quicknav-cart">
                                <a class="quicknav-icon" href="<?php echo WC()->cart->get_cart_url(); ?>">
                                    <i class="sli sli-basket"></i>
                                    <span class="cart-subtotal">
                                        <?php echo WC()->cart->get_cart_subtotal(); ?>
                                    </span>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>

            </div>

            <?php if ( ! of_get_option( 'tokopress_wc_disable_search' ) ) : ?>
                <div class="header-right-search">
                    <?php $searchform = apply_filters( 'tokopress_header_searchform', 'block-search' ); ?>
                    <?php if ( $searchform ) get_template_part( $searchform ); ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php if( has_nav_menu( 'secondary_menu' ) ) : ?>
        <?php if ( function_exists( 'ubermenu' ) ) : ?>
            <div class="site-navigation-megamenu-wrap">
                <div class="container-wrap">
                <?php ubermenu( 'main' , array( 'theme_location' => 'secondary_menu' ) ); ?>
                </div>
            </div>
        <?php else : ?>
            <div class="site-navigation-wrap">
                <div class="container-wrap">
                    <nav class="site-navigation">
                        <?php
                        $secondary_args = array(
                            'theme_location'    => 'secondary_menu',
                            'container'         => false,
                            'menu_class'        => 'site-navigation-menu',
                            'menu_id'           => 'site-navigation-menu'
                        );
                        wp_nav_menu( $secondary_args );
                        ?>

                    </nav>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</header>
