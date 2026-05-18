<?php ?>
<!DOCTYPE html>
<html lang="en-AU">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title> <?php wp_title('', true,''); ?> </title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Merriweather+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10847621585"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-10847621585');
	</script>

</head>
<body>
	<!-- Logo Section -->
	<header>
		<div class="header-top row full-row">
			<div class="header-logo-section boxed-row">
				<div class="logo-holder">
				    <a href="/">
					    <?php echo wp_get_attachment_image(173, 'full'); ?>
					</a>
				</div>
				<div class="tagline-holder">
				    <?php echo wp_get_attachment_image(462, 'full',"", ["class" => "no-display-500"]); ?>
				    <?php echo wp_get_attachment_image(235, 'full',"",["class" => "display-500"]); ?>
				</div>
				<div class="top-link-holder">
					<ul class="icon-listing">
						<li><?php echo wp_get_attachment_image(351, 'full'); ?>Free Express Delivery</li>
						<li><?php echo wp_get_attachment_image(350, 'full'); ?>Free Call<a href="tel:0800555179" class="hover-over list-phone" >0800 555 179</a></li>
						<li><?php echo wp_get_attachment_image(349, 'full'); ?><a href="mailto:info@livelifealarms.co.nz" class="hover-over">info@livelifealarms.co.nz</a></li>
					</ul>
				</div>
			</div>
			<div class="mobile-only full-row mobile-menu-top">
			    <div>
			        <a class="mobile-cart" href="/cart" style="margin-right:10px;"></a>
			        <a class="mobile-menu-anchor" href="#"></a>
			    </div>
			</div>
		</div>

		<div class="row menu-section full-row">
	    <?php
	        $args= array(
	            'theme_location' => 'lla-primary-menu',
	            'container' => 'nav',
	            'container_class' => 'desktop-menu boxed-row desktop-only'
	            );
	    ?>
	        <?php wp_nav_menu($args); ?>
	    <ul>
    	<li id="menu-item-232" class="has-child desktop-only">
    	    <a href="/cart/" id="cart-menu" class="<?php echo (!WC()->cart->is_empty() ? 'active' : ''); ?>" aria-label="Go to Cart"></a>
    	    <?php woocommerce_mini_cart(); ?>
    	</li>
    	</ul>
    	<!-- Mobile Menu -->
    	 <?php
	        $args= array(
	            'theme_location' => 'lla-primary-menu',
	            'container' => 'nav',
	            'container_class' => 'mobile-menu boxed-row mobile-only'
	            );
	    ?>
	        <?php wp_nav_menu($args); ?>
    	<!-- Mobile Menu -->
    	
	    </div>
	</header>
	<script>
	    const node = document.getElementById("menu-item-232");
        document.getElementById("menu-primary-menu").appendChild(node);
	</script>
	
    