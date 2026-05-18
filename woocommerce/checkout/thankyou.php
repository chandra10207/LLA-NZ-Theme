<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order woo-thank-you-page">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>
		    
		    <div class="boxed-form checkout-txt-box">
    			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>
                <br>
    			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				    <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				    <?php if ( is_user_logged_in() ) : ?>
					    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
	    			<?php endif; ?>
		    	</p>
            </div>
		<?php else : ?>

			<div class="boxed-form checkout-txt-box">
    			<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received. It would be great if you could enter some phone numbers of your preferred responders into this easy and quick setup form so we can program your mobile alarm. <a href="/setup-form/">https://livelifealarms.co.nz/setup-form/</a>', 'woocommerce' ), $order ); ?></p>
    			<ul class="disc-list">
    			    <li><p>Order Number: <strong><?php echo $order->get_order_number(); ?></strong></p></li>
    			    <li><p>Date: <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong></p></li>
    			    <li><p>Total: <strong><?php echo $order->get_formatted_order_total(); ?></strong></p></li>
    			    <li><p>Payment Method: <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong></p></li>
    			</ul>
    		</div>

		<?php endif; ?>
		<div class="pad-box">
            <?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
            <br/>
		</div>
		
	    <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
		
	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
