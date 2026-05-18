<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action( 'wpo_wcpdf_before_document', $this->get_type(), $this->order ); ?>

<table class="head container">
	<tr>
		<td class="header">
		<?php
		if ( $this->has_header_logo() ) {
			do_action( 'wpo_wcpdf_before_shop_logo', $this->get_type(), $this->order );
			$this->header_logo();
			do_action( 'wpo_wcpdf_after_shop_logo', $this->get_type(), $this->order );
		} else {
			$this->title();
		}
		?>
		</td>
		<td class="shop-info">
			<?php do_action( 'wpo_wcpdf_before_shop_name', $this->get_type(), $this->order ); ?>
			<div class="shop-name"><h3><?php $this->shop_name(); ?></h3></div>
			<?php do_action( 'wpo_wcpdf_after_shop_name', $this->get_type(), $this->order ); ?>
			<?php do_action( 'wpo_wcpdf_before_shop_address', $this->get_type(), $this->order ); ?>
			<div class="shop-address"><?php $this->shop_address(); ?></div>
			<?php do_action( 'wpo_wcpdf_after_shop_address', $this->get_type(), $this->order ); ?>
		</td>
	</tr>
</table>

<?php do_action( 'wpo_wcpdf_before_document_label', $this->get_type(), $this->order ); ?>

<h1 class="document-type-label">
	<?php if ( $this->has_header_logo() ) $this->title(); ?>
</h1>

<?php do_action( 'wpo_wcpdf_after_document_label', $this->get_type(), $this->order ); ?>

<table class="order-data-addresses">
	<tr>
		<td class="address shipping-address">
			<!-- <h3><?php _e( 'Shipping Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3> -->
			<?php do_action( 'wpo_wcpdf_before_shipping_address', $this->get_type(), $this->order ); ?>
			<?php $this->shipping_address(); ?>
			<?php do_action( 'wpo_wcpdf_after_shipping_address', $this->get_type(), $this->order ); ?>
			<?php if ( isset( $this->settings['display_email'] ) ) : ?>
				<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php endif; ?>
			<?php if ( isset( $this->settings['display_phone'] ) ) : ?>
				<div class="shipping-phone"><?php $this->shipping_phone( ! $this->show_billing_address() ); ?></div>
			<?php endif; ?>
		</td>
		<td class="address billing-address">
			<?php if ( $this->show_billing_address() ) : ?>
				<h3><?php _e( 'Billing Address:', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
				<?php do_action( 'wpo_wcpdf_before_billing_address', $this->get_type(), $this->order ); ?>
				<?php $this->billing_address(); ?>
				<?php do_action( 'wpo_wcpdf_after_billing_address', $this->get_type(), $this->order ); ?>
				<?php if ( isset( $this->settings['display_phone'] ) && ! empty( $this->get_billing_phone() ) ) : ?>
					<div class="billing-phone"><?php $this->billing_phone(); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</td>
		<td class="order-data">
			<table>
				<?php do_action( 'wpo_wcpdf_before_order_data', $this->get_type(), $this->order ); ?>
				<tr class="order-number">
					<th><?php _e( 'Order Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->order_number(); ?></td>
				</tr>
				<tr class="order-date">
					<th><?php _e( 'Order Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php $this->order_date(); ?></td>
				</tr>
				<?php if ( $shipping_method = $this->get_shipping_method() ) : ?>
				<tr class="shipping-method">
					<th><?php _e( 'Shipping Method:', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<td><?php echo $shipping_method; ?></td>
				</tr>
				<?php endif; ?>
				<?php do_action( 'wpo_wcpdf_after_order_data', $this->get_type(), $this->order ); ?>
			</table>			
		</td>
	</tr>
</table>
<table style="width: 100%;">
    <tr>
		<td style="width: 60%;">
		<h2 class="invoice_title" style="margin-top: -30px;">Mobile Alarm Details</h2>
		<?php
                $preferred_time = get_post_meta($this->order->ID,'Preferred Time',true);
                $contact_number = get_post_meta($this->order->ID,'Contact Number',true);
                $mobile_number = get_post_meta ($this->order->ID,'Mobile Alarm Number',true);
                $mobile_account = get_post_meta ($this->order->ID,'Mobile Account Username',true);
                $mobile_password = get_post_meta ($this->order->ID,'Mobile Account Password',true);
                $service_pin = get_post_meta ($this->order->ID,'Customer Service PIN',true);
                $sim_card = get_post_meta ($this->order->ID,'Sim Card #',true);
                $contact_1 = get_post_meta ($this->order->ID,'Contact person 1 #',true);
                $contact_2 = get_post_meta ($this->order->ID,'Contact person 2 #',true);
                $contact_3 = get_post_meta ($this->order->ID,'Contact person 3 #',true);
                $contact_4 = get_post_meta ($this->order->ID,'Contact person 4 #',true);
                $contact_5 = get_post_meta ($this->order->ID,'Contact person 5 #',true);
				$contact_6 = get_post_meta ($this->order->ID,'Contact person 6 #',true);
				$customer_address = get_post_meta ($this->order->ID,'Customer Address', true);
                $sms_name = get_post_meta ($this->order->ID,'Name in SMS',true);
                $prepaid_applied = get_post_meta ($this->order->ID,'Prepaid Credit Applied',true);
            
					if (isset($mobile_number)) {
                    echo '<p class="phone_text" style="margin-bottom: 5px;"><strong>' .__('Mobile Alarm Number: ') . '</strong>&nbsp; &nbsp;' . $mobile_number . '</p>';
					}
					if (isset($contact_1)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 1 #: ') . '&nbsp; &nbsp;' . $contact_1 . '</p>';
					}
					if (isset($contact_2)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 2 #: ') . '&nbsp; &nbsp;' . $contact_2 . '</p>';
					}
					if (isset($contact_3)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 3 #: ') . '&nbsp; &nbsp;' . $contact_3 . '</p>';
					}
					if (isset($contact_4)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 4 #: ') . '&nbsp; &nbsp;' . $contact_4 . '</p>';
					}
					if (isset($contact_5)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 5 #: ') . '&nbsp; &nbsp;' . $contact_5 . '</p>';
					}

					if (isset($contact_6)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Contact person 6 #: ') . '&nbsp; &nbsp;' . $contact_6 . '</p>';
					}
					if(!empty($customer_address)){
						if (isset($customer_address)) {
							echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Customers Address: ') . '&nbsp; &nbsp;' . $customer_address . '</p>';
						} 
					}
					if (isset($sms_name)) {
						echo '<p class="phone_text" style="margin-bottom: 5px;">' .__('Name in emergency text message: ') . '&nbsp; &nbsp;' . $sms_name . '</p>';
					}	
                ?>
		</td>
    </tr>
</table>
<?php do_action( 'wpo_wcpdf_before_order_details', $this->get_type(), $this->order ); ?>

<table class="order-details">
	<thead>
		<tr>
			<th class="product"><?php _e( 'Product', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
			<th class="quantity"><?php _e( 'Quantity', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ( $this->get_order_items() as $item_id => $item ) : ?>
			<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', 'item-'.$item_id, esc_attr( $this->get_type() ), $this->order, $item_id ); ?>">
				<td class="product">
					<?php $description_label = __( 'Description', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
					<span class="item-name"><?php echo $item['name']; ?></span>
					<?php do_action( 'wpo_wcpdf_before_item_meta', $this->get_type(), $item, $this->order  ); ?>
					<span class="item-meta"><?php echo $item['meta']; ?></span>
					<dl class="meta">
						<?php $description_label = __( 'SKU', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
						<?php if ( ! empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="sku"><?php echo esc_attr( $item['sku'] ); ?></dd><?php endif; ?>
					
					</dl>
					<?php do_action( 'wpo_wcpdf_after_item_meta', $this->get_type(), $item, $this->order  ); ?>
				</td>
				<td class="quantity"><?php echo $item['quantity']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<div class="bottom-spacer"></div>

<?php do_action( 'wpo_wcpdf_after_order_details', $this->get_type(), $this->order ); ?>


<?php do_action( 'wpo_wcpdf_before_customer_notes', $this->get_type(), $this->order ); ?>

<div class="customer-notes">
	<?php if ( $this->get_shipping_notes() ) : ?>
		<h3><?php _e( 'Customer Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
		<?php $this->shipping_notes(); ?>
	<?php endif; ?>
</div>

<?php do_action( 'wpo_wcpdf_after_customer_notes', $this->get_type(), $this->order ); ?>

<?php if ( $this->get_footer() ) : ?>
	<div id="footer">
		<!-- hook available: wpo_wcpdf_before_footer -->
		<?php $this->footer(); ?>
		<!-- hook available: wpo_wcpdf_after_footer -->
	</div><!-- #letter-footer -->
<?php endif; ?>

<?php do_action( 'wpo_wcpdf_after_document', $this->get_type(), $this->order ); ?>