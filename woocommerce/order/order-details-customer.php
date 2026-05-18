<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="woocommerce-cart-form boxed-form customer-thankyou ">
        <div class="cart-header">
            <p>Customer details</p>
        </div>

	<div class="checkout-txt-box ">
                <?php if($order->get_billing_email()): ?>
                    <p><strong>Email: </strong><?php echo $order->get_billing_email(); ?></p>
                <?php endif; ?>
                <?php if($order->get_billing_phone()): ?>
                    <p><strong>Phone: </strong><?php echo $order->get_billing_phone();?></p>
                <?php endif; ?>
                <br/>
                <div class="half-grid">
                    <div class="grid-left">
                        <h3><span>Billing address</span></h3>
                        <p><?php echo $order->get_billing_first_name(); ?> <?php echo $order->get_billing_last_name(); ?></p>
                        <?php if($order->get_billing_address_1()): ?>
                            <p><?php echo $order->get_billing_address_1();?></p>
                        <?php endif; ?>
                        <p>
                            <?php 
                                if($order->get_billing_city()):
                                    echo $order->get_billing_city();
                                endif;
                                if($order->get_billing_state()):
                                    echo ', ';
                                    echo $order->get_billing_state();
                                endif;
                                if($order->get_billing_postcode()):
                                    echo ' ';
                                    echo $order->get_billing_postcode();
                                endif;
                             ?>
                        </p>
                    </div>
                    <div class="grid-right">
                        <h3><span>Shipping address</span></h3>
                        <p><?php echo $order->get_shipping_first_name(); ?> <?php echo $order->get_shipping_last_name(); ?></p>
                        <?php if($order->get_shipping_address_1()): ?>
                            <p><?php echo $order->get_shipping_address_1();?></p>
                        <?php endif; ?>
                        <p>
                            <?php 
                                if($order->get_shipping_city()):
                                    echo $order->get_shipping_city();
                                endif;
                                if($order->get_shipping_state()):
                                    echo ', ';
                                    echo $order->get_shipping_state();
                                endif;
                                if($order->get_shipping_postcode()):
                                    echo ' ';
                                    echo $order->get_shipping_postcode();
                                endif;
                             ?>
                        </p>
                    </div>
                </div>
            </div>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</section>
