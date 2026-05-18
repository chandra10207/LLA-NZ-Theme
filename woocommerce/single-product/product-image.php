<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$gallery_image_ids = $product->get_gallery_image_ids();
$terms = get_the_terms( $product->get_id(), 'product_cat' );
if($terms[0]->name == '4GX Alarm') {
    wc_get_template_part('single-product/slider-alarm');
} else if($terms[0]->name == '4GX Watch') {
    
    if( 1240 == $product->get_id()){
        wc_get_template_part('single-product/slider-watch-ll5');
    }
    else{
         wc_get_template_part('single-product/slider-watch');
    }
    

   
}else {
    if(!empty ($gallery_image_ids)) {
    ?>
    	<div>
    		<div class="product-slider">
    			<div id="slider1" count-id="<?php echo count($gallery_image_ids)-1; ?>" >
    			        <img img-id="1" src="<?php echo wp_get_attachment_image_src($gallery_image_ids[0], $default)[0]; ?>" alt="<?php echo get_post_meta($gallery_image_ids[0], '_wp_attachment_image_alt', TRUE); ?>">
    			</div>
    			<div id="slider-prev" class="slider-nav"></div>
    			<div id="slider-next" class="slider-nav"></div>
    		</div>
    		<div class="product-slider-nav">
    		    <?php for($i = 0; $i<count($gallery_image_ids); $i++) { ?>
    			<div><img img-id="<?php echo $i; ?>" src="<?php echo wp_get_attachment_image_src($gallery_image_ids[$i], $default)[0]; ?>" alt="<?php echo get_post_meta($gallery_image_ids[$i], '_wp_attachment_image_alt', TRUE); ?>"></div>
    		    <?php } ?>
    		</div>
    	</div>
    
    <?php
    }
}
