<?php ?>
<footer>
		<div class="footer-widget-area boxed-row">
		    <?php
    	        $args= array(
    	            'theme_location' => 'lla-secondary-menu',
    	            'container' => 'div',
    	            'container_class' => 'footer-widget',
    	            'container_id' => 'footer-widget1',
    	            'menu_class' => 'pad-box'
    	            );
	        ?>
	        <?php wp_nav_menu($args); ?>
	        <?php
    	        $args= array(
    	            'theme_location' => 'lla-service-menu',
    	            'container' => 'div',
    	            'container_class' => 'footer-widget',
    	            'container_id' => 'footer-widget2',
    	            'menu_class' => 'pad-box'
    	            );
	        ?>
	        <?php wp_nav_menu($args); ?>
			<div id="footer-widget3" class="footer-widget">
				<div class="footer-text-widget pad-box">
				<p class="widget-text-header">Peace of mind.</p>
				<p class="widget-text-body">Peace of mind for you with freedom and safety for your loved one.</p>
				<p class="widget-text-header">Satisfaction guaranteed.</p>
				<p class="widget-text-body">Our system comes with a 30 day return policy.</p>	
				</div>
			</div>
			<div id="footer-widget4" class="footer-widget pad-box">
				<div>
					<ul class="icon-listing">
						<li><?php echo wp_get_attachment_image(350, 'full'); ?>Free Call<a href="tel:0800555179" class="hover-over list-phone">0800 555 179</a></li>
						<li><?php echo wp_get_attachment_image(349, 'full'); ?><a href="mailto:info@livelifealarms.co.nz" class="hover-over">info@livelifealarms.co.nz</a></li>
						<li><?php echo wp_get_attachment_image(468, 'full'); ?><a href="https://www.facebook.com/livelifealarms/"  rel="noopener" target="_blank" nofollow><b><span style="color: #bfbcb5;">Live</span><span style="color: #e40030;">Life</span></b> on Facebook</a></li>
						<li><?php echo wp_get_attachment_image(509, 'full',"", ["style" =>"margin-top:25px;"]); ?></li>
					</ul>
				</div>
				<div>
					<?php echo wp_get_attachment_image(466, 'full'); ?>
					<div style="display: flex; align-items: center;">
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright-area boxed-row pad-box">
			<p class="copyright-text">© Copyright <?php echo date('Y'); ?>. LiveLife Alarms. All rights reserved.</p>
			<p class="copyright-ABN">NZBN: 9429046616173</p>
			<p class="copyright-links"><a href="/privacy-policy/">Privacy Policy</a>  |  <a href="/disclaimers/">Disclaimers</a></p>
		</div>
	</footer>
	<!-- CopyRights Section -->
</body>
<?php wp_footer(); ?>
</html>