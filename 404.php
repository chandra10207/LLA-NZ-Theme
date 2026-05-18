<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="main-content template-sidebar">
    <div class="breadcrumbs boxed-row">
    	
    </div>
    <div class="full-row">
        <div class="boxed-row product-details">
            <h1 class="page-title">Oops, This page could not be found!</h1>
            <div class="sidebar-grid">
                <div class="content-bar">
                    <div class="half-grid">
                        <div class="grid-left">
                            <span class="four-o-four">404</span>
                        </div>
                        <div class="grid-right">
                            <span>Helpful Links</span>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="/product/order-4gx-mobile-alarm/">Order Mobile Alarm</a></li>
                                <li><a href="/who-needs-one/">Who needs one</a></li>
                                <li><a href="/testimonials/">Testimonials</a></li>
                                <li><a href="/customer-service/">Customer Service</a></li>
                                <li><a href="/quote-request/">Quote</a></li>
                                <li><a href="/ndis/">NDIS</a></li>
                                <li><a href="/contact-us/">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="side-bar">
                    <a href="/product/order-4gx-mobile-alarm/">
                    <div class="sidebar-image">
                        <img src="/wp-content/uploads/live-life-alarms-4g-emergency-pendant-4g-australia.jpg">
                    </div>
                    </a>
                    <div class="sidebar-tears">
                        <ul>
                            <li><img src="/wp-content/uploads/live-life-personal-alarms-telstra-droplet-133.png"></li>
                            <li><img src="/wp-content/uploads/live-life-personal-alarms-4g-best-indoor-droplet.png"></li>
                            <li><img src="/wp-content/uploads/mobile-medical-alarm-for-seniors-that-calls-six-contacts.png"></li>
                            <li><img src="/wp-content/uploads/live-life-alarms-personal-emergency-pendant-smart-voice-teardrop.png"></li>
                        </ul>
                    </div>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .four-o-four {
        font-size: 170px;
        font-weight: 800;
        color: #f0f0f0;
    }
    
    .grid-right span {
        color: #4a4c9a;
        font-size: 15px;
        font-weight: 600;
    }
    
    .grid-right ul {
        margin-top: 20px;
    }
    
    .grid-right ul li {
        margin-bottom: 15px;
    }
    
    .grid-right ul li:before {
        font-family: 'awb-icons';
        content: "\f105;
        color: #fff;
        background: #a0ce4e;
    }
</style>

<?php
get_footer();
