<?php
add_theme_support( 'menus' );
add_theme_support( 'woocommerce');

function lla_menus() {
  register_nav_menu('lla-primary-menu',__( 'Primary Menu' ));
  register_nav_menu('lla-secondary-menu',__( 'Secondary Menu' ));
  register_nav_menu('lla-service-menu',__( 'Service Menu' ));
}
add_action( 'init', 'lla_menus' );

//add cart to 
//add_filter('wp_nav_menu_items', 'add_admin_link', 10, 2);
function add_admin_link($items, $args){
    $append_text ="";
    if(!WC()->cart->is_empty()) {
        $append_text = "active";
    }
    if( $args->theme_location == 'lla-primary-menu' ){
        $items .= '<li id="menu-item-232" class="has-child"><a href="/cart/" id="cart-menu" class="'.$append_text.'"></a>';
        {woocommerce_mini_cart();}
        $items .='</li>';
    }
    return $items;
}


function theme_scripts() {
    wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');
    wp_enqueue_style('slick-css', get_stylesheet_directory_uri().'/js/slick/slick.css');
    
    wp_enqueue_script('jquery', get_template_directory_uri().'/js/jQuery.min.js');
    wp_enqueue_script('script', get_template_directory_uri().'/js/script.js');
    wp_enqueue_script('slick-js', get_template_directory_uri().'/js/slick/slick.min.js');
}

add_action('wp_enqueue_scripts', 'theme_scripts');



//CUSTOMIZE SPECIFIC PRODUCT
add_filter( 'template_include', 'custom_single_product_template_include', 50, 1 );
function custom_single_product_template_include( $template ) {
    if ( is_singular('product') && (has_term( '4gx-alarm', 'product_cat')) ) {
        $template = get_stylesheet_directory() . '/woocommerce/single-alarm.php';
    } elseif (  is_singular('product') && (has_term( '4gx-watch', 'product_cat'))  ) {
        $template = get_stylesheet_directory() . '/woocommerce/single-watch.php';
    }	
    return $template;
}

//Direct checkout
add_filter( 'woocommerce_add_to_cart_redirect', 'skip_cart_redirect_checkout' );
 
function skip_cart_redirect_checkout( $url ) {
	return wc_get_checkout_url();
}

// Removes Order Notes Title - Additional Information & Notes Field
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );
add_filter( 'woocommerce_checkout_fields' , 'remove_order_notes' );

function remove_order_notes( $fields ) {
     unset($fields['order']['order_comments']);
     return $fields;
}

//Checkout page hook
add_action( 'woocommerce_checkout_after_customer_details', 'woocommerce_add_header', 20 );
function woocommerce_add_header() {
    echo '<h2 class="checkout-heading override"><img src="/wp-content/uploads/checkout-cart-icon.png" alt="shopping cart"><span>Your Order&nbsp;</span> Details</h2>';
}


function terms_and_condition_check_by_default ( $terms_is_checked ) {
	return true;
}
add_filter( 'woocommerce_terms_is_checked_default', 'terms_and_condition_check_by_default', 10 );

//Limit excerpt Limit
function custom_excerpt_length( $length ) {
	return 34;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//Adding custom fields on order
//ADD CUSTOM FIELD AUTOMATICALLY ON ORDER
function update_order_meta( $order_id ) {
  $no_option = " ";
  update_post_meta( $order_id, 'Contact person 1 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 2 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 3 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 4 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 5 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Contact person 6 #', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'IMEI', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Mobile Account Password', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Mobile Account Username', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Mobile Alarm Number', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Name in SMS', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Prepaid Credit Applied', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Sim Card Number', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Industry', sanitize_text_field($no_option) );
  update_post_meta( $order_id, 'Customers Address', sanitize_text_field($no_option) );
}
add_action( 'woocommerce_checkout_update_order_meta', 'update_order_meta' );


//DISABLE THEME AND PLUGIN AUTOUPDATE
add_filter( 'auto_update_plugin', '__return_false' );
add_filter( 'auto_update_theme', '__return_false' );

//DISPLAY SHIPPING PHONE NUMBER
add_filter( 'woocommerce_shipping_fields', 'add_shipping_phone_field' );
function add_shipping_phone_field( $fields ) {
   $fields['shipping_phone'] = array(
      'label' => __('Shipping Phone'),
      'required' => false,
      'class' => array( 'form-row-wide' ),
      'priority' => 100,
   );
   return $fields;
}

add_filter( 'woocommerce_admin_shipping_fields' , 'add_order_admin_edit_shipping_phone' );
function add_order_admin_edit_shipping_phone( $fields ) {
    // Include shipping phone as editable field
    $fields['phone'] = array( 'label' => __("Shipping phone"), 'show' => '0');

    return $fields;
}


//Make shipping printable in email
function shipping_phone_display_in_order_email( $order, $sent_to_admin, $plain_text, $email ) {
    $output = '';
    $shipping_phone = get_post_meta( $order->id, '_shipping_phone', true );

    if ( !empty($shipping_phone) )
        $output = '<p><strong>' . __( "Phone:", "woocommerce" ) . '</strong> ' . $shipping_phone . '</p>';
    echo $output;
 }
add_action('woocommerce_email_customer_details','shipping_phone_display_in_order_email', 25, 4 );

//TRACKING CODE AFTER ORDER (THANK YOU)
add_action( 'woocommerce_thankyou', 'my_custom_tracking' );
function my_custom_tracking( $order_id ) {
    $order = new WC_Order( $order_id );
    $conversion_billing_email  = $order->get_billing_email();
    $conversion_order_total = $order->get_total();
?>
<script>
    gtag('set', 'user_data', {
	"email": <?php echo $conversion_billing_email; ?>
});
</script>
<!-- Event snippet for Website sale conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-10847621585/ZASsCNnKz5UDENGjxrQo',
      'transaction_id': '<?php echo $order_id; ?>'
  });
</script>


<?php
}
add_filter('woocommerce_admin_meta_boxes_variations_per_page', 'custom_variations_per_page');
function custom_variations_per_page($count)
{
    return 100; // Change this to the number of variations you want to load
}


//Rename product option selection dropdown
add_filter('woocommerce_dropdown_variation_attribute_options_args', 'custom_variation_placeholder_per_attribute', 50, 1);
function custom_variation_placeholder_per_attribute($args)
{
  
    $attribute_name = $args['attribute'];
    
//       if ( is_product() && get_the_ID() == 1240 ) {
//     echo 'aaa--' . $attribute_name;
// } 


    switch ($attribute_name) {
        case 'Watch Colour':
            $args['show_option_none'] = 'Select Watch Colour *';
            break;

        case 'Wristband':
            $args['show_option_none'] = 'Select Watchband *';
            break;

       
        default:
            $args['show_option_none'] = 'Choose an option';
            break;
    }

    return $args;
}

// add_filter( 'woocommerce_available_variation', 'hide_variations_without_any_price', 100, 3 );
function hide_variations_without_any_price( $variation_data, $product, $variation ) {
    
    $regular_price = $variation->get_regular_price();
    $sale_price = $variation->get_sale_price();
    $product_id = $product->get_id();
    
    if ( is_product() && $product_id == 1240 ) {
    //   echo '<pre>'; var_dump($variation); 
      return array(); 
    } 

    // if ( ( '' == $regular_price || $regular_price == null )) {
    //     return false;
    // }

    return $variation_data;
}

add_filter( 'woocommerce_available_variation', 'hide_variations_with_no_regular_price', 10, 3 );
function hide_variations_with_no_regular_price( $variation_data, $product, $variation ) {
    // Get the regular price of the variation
    $regular_price = $variation->get_regular_price();

    // Log for debugging (optional, remove in production)
    //error_log( 'Variation ID: ' . $variation->get_id() . ' | Regular Price: ' . ( $regular_price ? $regular_price : 'Empty' ) );

    // If the regular price is empty or not set, return null to hide the variation
    if ( empty( $regular_price ) || $regular_price === '' ) {
        return null; // Changed to null for WooCommerce 9.x compatibility
    }

    // Return the variation data if it has a regular price
    return $variation_data;
}

add_action( 'wp_footer', 'hide_variations_no_price_js' );
function hide_variations_no_price_js() {
    if ( is_product() ) {
        ?>
        <script>
        jQuery(document).ready(function($) {
            $(document).on('woocommerce_variation_has_changed', function() {
                $('form.variations_form select option').each(function() {
                    var variationData = $(this).data('variation');
                    if (variationData && (!variationData.price_html || variationData.price_html === '')) {
                        $(this).remove();
                    }
                });
            });
        });
        </script>
        <?php
    }
}

add_filter( 'woocommerce_ship_to_different_address_checked', '__return_false' );

add_action( 'wp_enqueue_scripts', 'lla_disable_woocommerce_state_select2', 100 );
function lla_disable_woocommerce_state_select2() {
    // Only target the checkout page to avoid breaking admin areas
    if ( is_checkout() ) {
        if ( class_exists( 'woocommerce' ) ) {
            wp_dequeue_style( 'select2' );
            wp_deregister_style( 'select2' );
            wp_dequeue_script( 'selectWoo' );
            wp_deregister_script( 'selectWoo' );
        }
    }
}