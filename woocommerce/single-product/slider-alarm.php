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
            <?php echo wp_get_attachment_image(1458, 'full');?>
        </div>
        
        <div class="master-display-item" type="iframe-video" index="2">
            <?php echo wp_get_attachment_image(190, 'full');?>
            <img class="master-btn-play" src="/wp-content/uploads/button-play-video.png" height="49" width="49">
            <div class="in-frame">
                <img class="close-iframe" src="/wp-content/uploads/button-close-video.png" height="40" width="40">
                <iframe src="https://www.youtube.com/embed/mB16bPJ2Jto?si=zQTVaSepxohmBcCV" allowfullscreen></iframe>
            </div>
        </div>
        
        <div class="master-display-item popup-on-click" type="image" index="3" popup-id="slider-3">
            <?php echo wp_get_attachment_image(1511, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="4">
            <?php echo wp_get_attachment_image(184, 'full');?>
        </div>
        
        <div class="master-display-item popup-on-click" type="image" index="5" popup-id="slider-3">
            <?php echo wp_get_attachment_image(192, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="6">
            <?php echo wp_get_attachment_image(183, 'full');?>
        </div>
        
        <div class="master-display-item" type="iframe-video" index="7">
            <?php echo wp_get_attachment_image(180, 'full');?>
            <img class="master-btn-play" src="/wp-content/uploads/button-play-video.png" height="49" width="49">
            <div class="in-frame">
                <img class="close-iframe" src="/wp-content/uploads/button-close-video.png" height="40" width="40">
                <iframe src="https://www.youtube.com/embed/mB16bPJ2Jto?si=zQTVaSepxohmBcCV" allowfullscreen></iframe>
            </div>
        </div>
        
        <div class="master-display-item" type="image" index="8">
            <?php echo wp_get_attachment_image(188, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="9">
            <?php echo wp_get_attachment_image(191, 'full');?>
        </div>
        
        <div class="master-display-item popup-on-click" type="image" index="10" popup-id="soundcloud">
            <?php echo wp_get_attachment_image(182, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="11">
            <?php echo wp_get_attachment_image(193, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="12">
            <?php echo wp_get_attachment_image(181, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="13">
            <?php echo wp_get_attachment_image(179, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="14">
            <?php echo wp_get_attachment_image(186, 'full');?>
        </div>
        
        <div class="master-display-item" type="image" index="15">
            <?php echo wp_get_attachment_image(189, 'full');?>
        </div>
        <div class="master-navigators">
        <a href="#" class="master-prev"><img src="/wp-content/uploads/master-slider-prev.png" alt="previous-arrow"></a>
        <a href="#" class="master-next"><img src="/wp-content/uploads/master-slider-next.png" alt="next-arrow"></a>
        </div>
    </div>
    <div class="master-navigation">
        <div class="master-thumbnail navigation-active" type="image" index="1">
            <?php echo wp_get_attachment_image(1127, 'full');?>
        </div>
        <div class="master-thumbnail" type="iframe-video" index="2">
            <?php echo wp_get_attachment_image(190, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="3">
            <?php echo wp_get_attachment_image(1511, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="4">
            <?php echo wp_get_attachment_image(184, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="5">
            <?php echo wp_get_attachment_image(192, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="6">
            <?php echo wp_get_attachment_image(183, 'full');?>
        </div>
        <div class="master-thumbnail" type="iframe-video" index="7">
            <?php echo wp_get_attachment_image(180, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="8">
            <?php echo wp_get_attachment_image(188, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="9">
            <?php echo wp_get_attachment_image(191, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="10">
            <?php echo wp_get_attachment_image(182, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="11">
            <?php echo wp_get_attachment_image(193, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="12">
            <?php echo wp_get_attachment_image(181, 'full');?>
        </div>
        
        <div class="master-thumbnail" type="image" index="13">
            <?php echo wp_get_attachment_image(179, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="14">
            <?php echo wp_get_attachment_image(186, 'full');?>
        </div>
        <div class="master-thumbnail" type="image" index="15">
            <?php echo wp_get_attachment_image(189, 'full');?>
        </div>
    </div>
</div>
<!-- Master Slider -->
