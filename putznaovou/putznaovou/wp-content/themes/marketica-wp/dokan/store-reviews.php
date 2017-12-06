<?php
/**
 * The Template for displaying all reviews.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user = get_userdata( get_query_var( 'author' ) );
$store_info = dokan_get_store_info( $store_user->ID );
$dokan_appearance = get_option( 'dokan_appearance' );
$profile_layout = empty( $dokan_appearance['store_header_template'] ) ? 'default' : $dokan_appearance['store_header_template'];

get_header( 'shop' );
?>

    <?php if ( $profile_layout == 'default' && of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ) dokan_get_template_part( 'store-header' ); ?>

    <?php do_action( 'woocommerce_before_main_content' ); ?>

    <div id="dokan-primary" class="dokan-single-store">
        <div id="dokan-content" class="store-page-wrap woocommerce" role="main">

            <?php if ( $profile_layout != 'default' && of_get_option( 'tokopress_dokan_shop_description' ) != 'no' ) dokan_get_template_part( 'store-header-dokan' ); ?>

            <?php
            if ( class_exists('Dokan_Pro_Reviews') )
                $dokan_template_reviews = Dokan_Pro_Reviews::init();
            elseif ( class_exists('Dokan_Template_reviews') )
                $dokan_template_reviews = Dokan_Template_reviews::init();
            $id                     = $store_user->ID;
            $post_type              = 'product';
            $limit                  = 20;
            $status                 = '1';
            $comments               = $dokan_template_reviews->comment_query( $id, $post_type, $limit, $status );
            ?>

            <div id="reviews" class="store-review-wrap">
                <div id="comments">

                    <h1 class="headline"><?php _e( 'Seller Review', 'tokopress' ); ?></h1>

                    <ol class="commentlist">
                        <?php
                        if ( count( $comments ) == 0 ) {
                            echo '<span colspan="5">' . __( 'No Result Found', 'tokopress' ) . '</span>';
                        } else {

                            foreach ($comments as $single_comment) {
                                $GLOBALS['comment'] = $single_comment;
                                $comment_date       = get_comment_date( 'l, F jS, Y \a\t g:i a', $single_comment->comment_ID );
                                $comment_author_img = get_avatar( $single_comment->comment_author_email, 180 );
                                $permalink          = get_comment_link( $single_comment );
                                ?>

                                <li <?php comment_class(); ?> itemtype="http://schema.org/Review" itemscope="" itemprop="reviews">
                                    <div class="review_comment_container">
                                        <div class="dokan-review-author-img"><?php echo $comment_author_img; ?></div>
                                        <div class="comment-text">
                                            <a href="<?php echo $permalink; ?>">
                                                <?php
                                                if ( get_option('woocommerce_enable_review_rating') == 'yes' ) :
                                                    $rating =  intval( get_comment_meta( $single_comment->comment_ID, 'rating', true ) ); ?>
                                                    <div class="dokan-rating">
                                                        <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf(__( 'Rated %d out of 5', 'tokopress' ), $rating) ?>">
                                                            <span style="width:<?php echo ( intval( get_comment_meta( $single_comment->comment_ID, 'rating', true ) ) / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php _e( 'out of 5', 'tokopress' ); ?></span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </a>
                                            <p>
                                                <strong itemprop="author"><?php echo $single_comment->comment_author; ?></strong>
                                                <em class="verified"><?php echo $single_comment->user_id == 0 ? '(Guest)' : ''; ?></em>
                                                -
                                                <a href="<?php echo $permalink; ?>">
                                                    <time datetime="<?php echo date( 'c', strtotime( $comment_date ) ); ?>" itemprop="datePublished"><?php echo $comment_date; ?></time>
                                                </a>
                                            </p>
                                            <div class="description" itemprop="description">
                                                <p><?php echo $single_comment->comment_content; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                               <?php
                            }
                        }
                        ?>
                    </ol>
                </div>
            </div>

            <?php
            echo $dokan_template_reviews->review_pagination( $id, $post_type, $limit, $status );
            ?>

        </div><!-- #content .site-content -->
    </div><!-- #primary .content-area -->

    <?php do_action( 'woocommerce_after_main_content' ); ?>

    <?php if ( class_exists( 'Dokan_Store_Location' ) && dokan_get_option( 'enable_theme_store_sidebar', 'dokan_general', 'off' ) == 'off' ) : ?>
        <?php get_sidebar( 'dokan' ); ?>
    <?php else : ?>
        <?php if ( ! of_get_option( 'tokopress_wc_hide_products_sidebar' ) ) : ?>
            <?php get_sidebar( 'shop' ); ?>
        <?php endif; ?>
    <?php endif; ?>

<?php get_footer(); ?>