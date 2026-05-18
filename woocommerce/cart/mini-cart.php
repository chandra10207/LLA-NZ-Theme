<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
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

do_action( 'woocommerce_before_mini_cart' ); ?>
<?php if ( ! WC()->cart->is_empty() ) : ?>
<div class="sub-menu mini-cart">
    <div class="widget_shopping_cart_content">
        <a class="mini-cart-items">
    		<?php
    		do_action( 'woocommerce_before_mini_cart_contents' );
    
    		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
    
    			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
    				/**
    				 * Filter the product name.
    				 *
    				 * @param string $product_name Name of the product in the cart.
    				 */
    				$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
    				$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
    				$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
    				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
    				?>
    				<a class="mini-cart-item" href="<?php echo $product_permalink; ?>">
    					<?php if ( empty( $product_permalink ) ) : ?>
    						<?php echo $thumbnail . wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    					<?php else : ?>
    					    <?php echo $thumbnail; ?>
    					    <div>
    					        <p class="mini-cart-product"><?php echo $product_name; ?></p>
    					        <p style="margin-top: 5px;"><?php echo $cart_item['quantity']; ?> X <?php echo $product_price; ?></p>
    					    </div>
    					<?php endif; ?>
    				</a>
    				<?php
    			}
    		}
    
    		do_action( 'woocommerce_mini_cart_contents' );
    		?>
        </a>
        <div class="cart-pages">
        	<div class="cart-page"><a href="/cart/">View Cart</a></div>
        	<div class="checkout-page"><a href="/checkout/">Checkout</a></div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
