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

?>
<!-- Master Slider -->
<div class="master-slider" autoplay="autoplay">
    
    <div class="master-display">
        
        <?php if(!empty ($gallery_image_ids)) {
        
        for($i = 0; $i<count($gallery_image_ids); $i++) { ?>
       
             <div class="master-display-item" type="image" index="<?php echo $i; ?>">
                <?php echo wp_get_attachment_image($gallery_image_ids[$i], 'full');?>
            </div>
       
        <?php } }?>
        
        <div class="master-navigators">
        <a href="#" class="master-prev"><img src="/wp-content/uploads/master-slider-prev.png" alt="previous-arrow"></a>
        <a href="#" class="master-next"><img src="/wp-content/uploads/master-slider-next.png" alt="next-arrow"></a>
        </div>
    </div>
    <div class="master-navigation">
        
        
          <?php if(!empty ($gallery_image_ids)) {
        
        for($i = 0; $i<count($gallery_image_ids); $i++) { ?>
       
             <div class="master-thumbnail" type="image" index="<?php echo $i; ?>">
                <?php echo wp_get_attachment_image($gallery_image_ids[$i], 'full');?>
            </div>
            
       
        <?php } }?>
        
        
        
        <!--<div class="master-thumbnail navigation-active" type="image" index="1">-->
        <!--    <?php echo wp_get_attachment_image(337, 'full');?>-->
        <!--</div>-->
        
        
    </div>
</div>
<!-- Master Slider -->


