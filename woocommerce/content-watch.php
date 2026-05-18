<?php
/**
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="product-description boxed-row pad-box">
<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
        <?php get_template_part( 'template-parts/selected-variation-gallery'); ?>
        
        <?php 
        
        if ( is_product() && 1240 == get_the_ID() ) {
            wc_get_template_part( 'components/watch/ll5_description');
        } else { 
            wc_get_template_part('components/watch/description'); 
        }
        
        ?>
        
        <?php do_action( 'woocommerce_single_product_summary' ); ?>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
