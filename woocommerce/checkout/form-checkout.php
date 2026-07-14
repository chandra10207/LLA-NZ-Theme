<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>
<div class="checkout-wrapper product-details pad-box">
    <div class="checkout-top">
        <h2 class="desktop-only merriweather"><img src="/wp-content/uploads/checkout-cart-icon.png"><span>Your Cart:</span> Summary</h2>
        
        <div>
            <div class="checkout-phone">
                <img src="/wp-content/uploads/woocommerce-checkout-phone-icon.png">
                    <a href="tel:0800555179">0800 555 179<span>Order by phone</span></a>
            </div>
            <div class="show-on-demo">
                <img src="/wp-content/uploads/emergency-alarm-free-programming-1-1.png">
            </div>
        </div>
        <h2 class="mobile-only merriweather"><img src="/wp-content/uploads/checkout-cart-icon.png"><span>Your Cart:</span> Summary</h2>
    </div>
    <!-- Cart contents -->
    <?php do_action( 'woocommerce_before_cart' ); ?>
    
    <form class="woocommerce-cart-form boxed-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    	<?php do_action( 'woocommerce_before_cart_table' ); ?>
    
    	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
    		<?php if(WC()->cart->get_cart_contents_count() > 0):?>
    		<div class="cart-header">
    		    <?php if(WC()->cart->get_cart_contents_count() == 1): ?>
    		        <p>You have 1 item in your cart</p>
    		    <?php else: ?>
    		        <p>You have <?php echo WC()->cart->get_cart_contents_count(); ?> items in your cart</p>
    		    <?php endif;?>
    		</div>
    		<?php endif;?>
    		
    		<thead>
    			<tr>
    				<!--
    				<th class="product-thumbnail"><span class="screen-reader-text"><?php esc_html_e( 'Thumbnail image', 'woocommerce' ); ?></span></th>
    				-->
    				<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
    				<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
    				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
    				<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
    				<th class="product-remove"><span class="screen-reader-text"><?php esc_html_e( 'Remove item', 'woocommerce' ); ?></span></th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php do_action( 'woocommerce_before_cart_contents' ); ?>
    
    			<?php
    			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
    				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
    				/**
    				 * Filter the product name.
    				 *
    				 * @since 7.8.0
    				 * @param string $product_name Name of the product in the cart.
    				 */
    				$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
    
    				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
    					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
    					?>
    					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
    
    						<td class="product-thumbnail">
    						<?php
    						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
    
    						if ( ! $product_permalink ) {
    							echo $thumbnail; // PHPCS: XSS ok.
    						} else {
    							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
    						}
    						?>
    						
    						<?php
    						if ( ! $product_permalink ) {
    							/**
    							 * Filter the product name.
    							 *
    							 * @since 7.8.0
    							 * @param string $product_name Name of the product in the cart.
    							 * @param array $cart_item The product in the cart.
    							 * @param string $cart_item_key Key for the product in the cart.
    							 */
    							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $product_name, $cart_item, $cart_item_key ) . '&nbsp;' );
    						} else {
    							/**
    							 * Filter the product name.
    							 *
    							 * @since 7.8.0
    							 * @param string $product_url URL the product in the cart.
    							 */
    							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $product_name ), $cart_item, $cart_item_key ) );
    						}
    
    						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
    
    						// Meta data.
    						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
    
    						// Backorder notification.
    						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
    							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
    						}
    						?>
    						</td>
    
    						<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
    							<?php
    								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
    							?>
    						</td>
    
    						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
    						<?php
    						if ( $_product->is_sold_individually() ) {
    							$min_quantity = 1;
    							$max_quantity = 1;
    						} else {
    							$min_quantity = 0;
    							$max_quantity = $_product->get_max_purchase_quantity();
    						}
    
    						$product_quantity = woocommerce_quantity_input(
    							array(
    								'input_name'   => "cart[{$cart_item_key}][qty]",
    								'input_value'  => $cart_item['quantity'],
    								'max_value'    => $max_quantity,
    								'min_value'    => $min_quantity,
    								'product_name' => $product_name,
    							),
    							$_product,
    							false
    						);
    
    						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
    						?>
    						</td>
    
    						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
    							<?php
    								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
    							?>
    						</td>
    						
    						<td class="product-remove">
    							<?php
    								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    									'woocommerce_cart_item_remove_link',
    									sprintf(
    										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
    										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
    										/* translators: %s is the product name */
    										esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), $product_name ) ),
    										esc_attr( $product_id ),
    										esc_attr( $_product->get_sku() )
    									),
    									$cart_item_key
    								);
    							?>
    						</td>
    					</tr>
    					<?php
    				}
    			}
    			?>
    
    			<?php do_action( 'woocommerce_cart_contents' ); ?>
    
    			<tr>
    				<td colspan="6" class="actions">
    
    					<?php if ( wc_coupons_enabled() ) { ?>
    						<div class="coupon">
    							<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
    							<?php do_action( 'woocommerce_cart_coupon' ); ?>
    						</div>
    					<?php } ?>
    
    					<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
    
    					<?php do_action( 'woocommerce_cart_actions' ); ?>
    
    					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
    				</td>
    			</tr>
    
    			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
    		</tbody>
    	</table>
    	<?php do_action( 'woocommerce_after_cart_table' ); ?>
    </form>

    <div class="cart-collaterals cart_collateral_oncheckout boxed-form">
    	<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
    
    	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
    
    	<h2><?php _e( 'Cart totals', 'woocommerce' ); ?></h2>
    
    	<table cellspacing="0" class="shop_table shop_table_responsive">
    
    		<tr class="cart-subtotal">
    			<th><?php _e( 'Subtotal', 'woocommerce' ); ?></th>
    			<td data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
    		</tr>
    
    		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
    			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
    				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
    				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
    			</tr>
    		<?php endforeach; ?>
    
    		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
    
    			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>
    
    			<?php wc_cart_totals_shipping_html(); ?>
    
    			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>
    
    		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>
    
    			<tr class="shipping">
    				<th><?php _e( 'Shipping', 'woocommerce' ); ?></th>
    				<td data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></td>
    			</tr>
    
    		<?php endif; ?>
    
    		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
    			<tr class="fee">
    				<th><?php echo esc_html( $fee->name ); ?></th>
    				<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
    			</tr>
    		<?php endforeach; ?>
    
    		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) :
    			$taxable_address = WC()->customer->get_taxable_address();
    			$estimated_text  = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
    					? sprintf( ' <small>' . __( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] )
    					: '';
    
    			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
    				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
    					<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
    						<th><?php echo esc_html( $tax->label ) . $estimated_text; ?></th>
    						<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
    					</tr>
    				<?php endforeach; ?>
    			<?php else : ?>
    				<tr class="tax-total">
    					<th><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; ?></th>
    					<td data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
    				</tr>
    			<?php endif; ?>
    		<?php endif; ?>
    
    		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>
    
    		<tr class="order-total">
    			<th><?php _e( 'Total', 'woocommerce' ); ?></th>
    			<td data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
    		</tr>
    
    		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
    
    	</table>
    
    	<div class="wc-proceed-to-checkout">
    		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
    	</div>
    </div>
    </div>
    	<?php do_action( 'woocommerce_after_cart_totals' ); ?>
    
    <?php do_action( 'woocommerce_after_cart' ); ?>
    <!-- Cart contents -->

    <!-- Form checkout -->
    <h2 class="checkout-heading pad-box merriweather"><span>Billing </span>& <span>Shipping:</span></h2>
    <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
        
    	<?php if ( $checkout->get_checkout_fields() ) : ?>
    
    		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
    
    		<div class="" id="customer_details">
    			<div class="boxed-form">
    				<?php do_action( 'woocommerce_checkout_billing' ); ?>
    			</div>
    
    			<div class="boxed-form">
    				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
    			</div>
    		</div>
    		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
    
    	<?php endif; ?>
	    
	    
        
    	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
    	<h3 id="order_review_heading" class="merriweather"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
    	
    	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
    
    	<div id="order_review" class="woocommerce-checkout-review-order">
    		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
    	</div>
    
    	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
    
    </form>
    <!-- Form checkout -->
    

    
    <!-- After checkout -->
    <?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
    <!-- After checkout -->



	
            <!-- Programing info -->
        <div class="checkout-section pad-box" style="padding-top: 50px;">
            <h2 class="checkout-heading merriweather"><span>Programming </span>Information</h2>
            <div class="boxed-form free-programming-box checkout-txt-box">
                <div>
                    <p>We'll be in contact with you shortly after your order is complete.</p>
                    <p>We'll ask you to give us up to 6 phone numbers you'd like pre-programmed.</p>
                </div>
                <img src="/wp-content/uploads/emergency-alarm-free-programming-1-1.png" alt="free setup before delivery">
            </div>
        </div>
        <!-- Programing info -->
    
    <!-- Postage notes -->
    <div class="boxed-form postage-notes checkout-txt-box">
        <h2 class="checkout-heading merriweather"><span>Postage </span>Notes</h2>
        <div>
            <p><strong>Mobile Alarm</strong></p>
            <p><?php date_default_timezone_set('Australia/Sydney'); $tz =new DateTimeZone('Australia/Sydney'); $dt = new DateTime(); $dt->setTimezone($tz); echo $dt->format('j M Y'); ?> – You should expect your Live Life Alarm or Watch to be shipped with Express Post within 4-5 business days of your order, however, we will try our best to send your device sooner if we can.</p>
        </div>
    </div>
    <!-- Postage notes -->
</div>