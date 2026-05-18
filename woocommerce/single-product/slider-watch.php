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
?>
<!-- Master Slider -->
<div class="master-slider" autoplay="autoplay">
    
    <div class="master-display">
        <div class="master-display-item" type="image" index="1">
            <?php echo wp_get_attachment_image(337, 'full');?>
        </div>
        <div class="master-display-item" type="image" index="2">
            <?php echo wp_get_attachment_image(336, 'full');?>
        </div>

        <div class="master-display-item popup-on-click" type="image" index="3" popup-id="watch-slider-3">
            <?php echo wp_get_attachment_image(529, 'full');?>
        </div>
        <div class="master-display-item" type="image" index="4">
            <?php echo wp_get_attachment_image(334, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="5">
            <?php echo wp_get_attachment_image(333, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="6">
            <?php echo wp_get_attachment_image(332, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="7">
            <?php echo wp_get_attachment_image(331, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="8">
            <?php echo wp_get_attachment_image(330, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="9">
            <?php echo wp_get_attachment_image(329, 'full');?>
        </div>
        
        <div class="master-display-item popup-on-click" type="image" index="10" popup-id="watch-sound">
            <?php echo wp_get_attachment_image(328, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="11">
            <?php echo wp_get_attachment_image(339, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="12">
            <?php echo wp_get_attachment_image(338, 'full');?>
        </div>
        
        <div class="master-navigators">
        <a href="#" class="master-prev"><img src="/wp-content/uploads/master-slider-prev.png" alt="previous-arrow"></a>
        <a href="#" class="master-next"><img src="/wp-content/uploads/master-slider-next.png" alt="next-arrow"></a>
        </div>
    </div>
    <div class="master-navigation">
        <div class="master-thumbnail navigation-active" type="image" index="1">
            <?php echo wp_get_attachment_image(337, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="2">
            <?php echo wp_get_attachment_image(336, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="3">
            <?php echo wp_get_attachment_image(529, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="4">
            <?php echo wp_get_attachment_image(334, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="5">
            <?php echo wp_get_attachment_image(333, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="6">
            <?php echo wp_get_attachment_image(332, 'full');?>
        </div>
        <div class="master-thumbnail" type="iframe-video" index="7">
            <?php echo wp_get_attachment_image(331, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="8">
            <?php echo wp_get_attachment_image(330, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="9">
            <?php echo wp_get_attachment_image(329, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="10">
            <?php echo wp_get_attachment_image(328, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="11">
            <?php echo wp_get_attachment_image(339, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="12">
            <?php echo wp_get_attachment_image(338, 'full');?>
        </div>
        
    </div>
</div>
<!-- Master Slider -->
