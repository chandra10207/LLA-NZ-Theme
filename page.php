<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
	if (is_page('9')) { get_template_part('template-parts/page/who-needs-one'); }
	else if (is_page('126')) { get_template_part('template-parts/page/order-mobile-alarm/how-it-works'); }
	else if (is_page('53')) { get_template_part('template-parts/page/order-mobile-alarm/features-in-detail'); }
	else if (is_page('72')) { get_template_part('template-parts/page/order-mobile-alarm/faqs'); }
	else if (is_page('77')) { get_template_part('template-parts/page/order-mobile-alarm/videos'); }
	else if (is_page('79')) { get_template_part('template-parts/page/order-mobile-alarm/awards-and-design'); }
	else if (is_page('85')) { get_template_part('template-parts/page/order-mobile-alarm/beliefs-and-mission'); }
	else if (is_page('89')) { get_template_part('template-parts/page/order-mobile-alarm/mobile-coverage-information'); }
	else if (is_page('93')) { get_template_part('template-parts/page/order-mobile-alarm/recharging-sim-card'); }
	else if (is_page('133')) { get_template_part('template-parts/page/order-mobile-alarm/how-fall-detection-works'); }
	else if (is_page('139')) { get_template_part('template-parts/page/order-mobile-alarm/downloads'); }
	else if (is_page('123')) { get_template_part('template-parts/page/order-mobile-alarm/network-closure'); }
	else if (is_page('525')) { get_template_part('template-parts/page/order-mobile-alarm/applications'); }
	
	
	else if (is_page('70')) { get_template_part('template-parts/page/order-mobile-alarm'); }
	
	else if (is_page('15')) { get_template_part('template-parts/page/forms/quote-request'); }
	else if (is_page('17')) { get_template_part('template-parts/page/forms/ndis'); }
	else if (is_page('19')) { get_template_part('template-parts/page/forms/contact'); }
	
	else if (is_page('246')) { get_template_part('template-parts/page/forms/quote-request-thank-you'); }
	else if (is_page('248')) { get_template_part('template-parts/page/forms/setup-form'); }
	else if (is_page('250')) { get_template_part('template-parts/page/forms/thank-you'); }
	else if (is_page('252')) { get_template_part('template-parts/page/forms/setup-thank-you'); }
	else if (is_page('556')) { get_template_part('template-parts/page/forms/rewards'); }
	else if (is_page('559')) { get_template_part('template-parts/page/forms/rewards-thank-you'); }
	
	//else if (is_page('123')) { get_template_part('template-parts/page/order-mobile-alarm/network-closure'); }
	else if (is_page('11')) { get_template_part('template-parts/page/testimonials'); }
	else if(is_page('13'))  { get_template_part('template-parts/page/customer-service/customer-service'); }
	else if(is_page('21'))  { get_template_part('template-parts/page/customer-service/delivery-policy'); }
	else if(is_page('23'))  { get_template_part('template-parts/page/customer-service/security-policy'); }
	else if(is_page('31'))  { get_template_part('template-parts/page/customer-service/refund-returns'); }
	else if(is_page('109'))  { get_template_part('template-parts/page/customer-service/privacy-policy'); }
	else if(is_page('112'))  { get_template_part('template-parts/page/customer-service/terms-conditions'); }
	else if(is_page('115'))  { get_template_part('template-parts/page/customer-service/disclaimers'); }
	else if(is_page('117'))  { get_template_part('template-parts/page/customer-service/warranty'); }
	
	
	//Watch child pages
	else if(is_page('383'))  { get_template_part('template-parts/page/order-mobile-watch/features-in-detail'); }
	else if(is_page('386'))  { get_template_part('template-parts/page/order-mobile-watch/faqs'); }
	else if(is_page('391'))  { get_template_part('template-parts/page/order-mobile-watch/beliefs-and-mission'); }
	else if(is_page('409'))  { get_template_part('template-parts/page/order-mobile-watch/how-it-works'); }
	else if(is_page('411'))  { get_template_part('template-parts/page/order-mobile-watch/mobile-coverage-information'); }
	else if(is_page('414'))  { get_template_part('template-parts/page/order-mobile-watch/recharging-sim-card'); }
	else if(is_page('418'))  { get_template_part('template-parts/page/order-mobile-watch/downloads'); }
	else if(is_page('1332'))  { get_template_part('template-parts/page/order-mobile-watch/downloads-ll4'); }
	
	else { get_template_part( 'template-parts/content/content-page' ); }
	

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
