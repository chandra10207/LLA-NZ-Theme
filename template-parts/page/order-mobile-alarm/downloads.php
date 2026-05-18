<div class="main-content template-half">
    <div class="breadcrumbs boxed-row">
    	<p><a href="/">Home</a> / <a href="/downloads/">Downloads</a></p>
    </div>
    <div class="full-row">
        <div class="boxed-row product-details pad-box">
            <div class="content-full-page">
                <div class="half-grid">
                    <div class="grid-left">
                        <h1 class="page-title"><span>Downloads.  </span>User guides and brochures.</h1>
                        <p><strong>Download technical information</strong></p>
                        <p>If you need help with installing, operating or trouble shooting the <strong>Live<span style="color:#e40030;">Life</span></strong> Alarm you can download guides here.</p>
                        <br>
                        <div class="download-icons">
                            
                            <a href="/wp-content/uploads/Live-Life-Alarms-NZ-Manual-2024-web.pdf">
                                <p><strong>User manual</strong></p>
                                <?php echo wp_get_attachment_image(144, 'full'); ?>
                            </a>
                            
                        </div>
                        
                    </div>
                    <div class="grid-right">
                        <h2><span>Technical info. </span>More information.</h2>
                        <p><strong>Your technical questions</strong></p>
                        <p>If you have any questions regarding using the <strong>Live<span style="color:#e40030;">Life</span></strong> Mobile Alarm please read our comprehensive <strong><a href="/order-mobile-alarm/faqs/">frequently asked questions</a></strong> section or view the <strong><a href="/order-mobile-alarm/features-in-detail/"></a></strong>Features in Detail page here.</p>
                        <br>
                        <div class="flex-div">
                            <a href="/order-mobile-alarm/faqs/"><?php echo wp_get_attachment_image(40, 'full'); ?></a>
                            <a href="/order-mobile-alarm/features-in-detail/"><?php echo wp_get_attachment_image(141, 'full'); ?></a>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <p><strong>Technical Specifications</strong></p>
                    <br>
                    <div class="tech-specifications">
                        <div class="tech-left">
                            <li><p>Operates on the Spark/Vodafone Mobile Network (covers 97% of Kiwi population).</p></li>
                            <li><p>Antenna: Internal WCDMA high energy design.</p></li>
                            <li><p>GPS: U-blox 8 chip (Support AGPS).</p></li>
                            <li><p>GPS location accuracy: To within 2 metres.</p></li>
                            <li><p>GPS Sensitivity. Cold start: -148dBm Hot Start: -162dBm.</p></li>
                            <li><p>GPS time to first fix: Cold start 32 secs, Warm start 11 secs, Hot start 1 sec.</p></li>
                            <li><p>Location feature: Send text ‘loc’ to pendant to receive auto-reply text with location.</p></li>
                            <li><p>Waterproof rating: IP7.</p></li>
                        </div>
                        <div class="tech-right">
                            <li><p>Battery type: Lithium-ion, 850mAh capacity, 3.7 Volts.</p></li>
                            <li><p>Battery usage span: At home use on default power saving mode of 4-5 days.</p></li>
                            <li><p>Recharge time: 45 minutes from low power alert. Charging voltage 5 Volts DC.</p></li>
                            <li><p>External power supply: Micro usage charger into charging station. 240 Volt adapter.</p></li>
                            <li><p>Operation temperature: -20 to +80 degrees Celsius.</p></li>
                            <li><p>Humidity: 5% – 95% non-condensing.</p></li>
                            <li><p>Weight: 42 grams.</p></li>
                            <li><p>Dimensions: 61mm x 42mm x 16mm.</p></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<style>
    .template-half h2 { margin-bottom: 25px; }
    .flex-div { display: flex; align-items: center;}
    .flex-div img:first-child { margin-right:15px; }
    
    .download-icons a p  {
        font-size: 14px;
        line-height: 17px;
        font-weight: 700;
        color: #55579f;
    }
    
    .download-icons a p {
        text-align: center;
    }
    
    .download-icons a img {
        margin-top: 20px;
    }
    
    .download-icons {
        display: grid;
        grid-template-columns: repeat(6, 14%);
        grid-column-gap: 3.2%;
        height: fit-content;
        height: -moz-fit-content;
    }
    
    .download-icons a {
        display: flex;
        flex-direction: column;
        align-items: center;
        height:100%;
        justify-content: space-between;
    }
    
    .tech-specifications {
        display: grid;
        grid-template-columns: 49.8% 49.8%;
        grid-column-gap: 0.4%;
    }
    .tech-specifications div li {
        padding: 10px 30px;
        margin-bottom: 5px;
    }
    
    .tech-specifications div li:nth-child(odd) {
        background: #e4e3df;
    }
    
    .tech-specifications div li:nth-child(even) {
        background: #d3d2cc;
    }
    
    .tech-specifications div li p {
        font-size: 14px;
        font-weight: 600;
    }
    
    @media only screen and (max-width: 800px) {
        .download-icons {
            grid-template-columns: repeat(2, 46%);
        }
        
        .tech-specifications {
            grid-template-columns: 100%;
            grid-column-gap: 0%;
        }
    }
</style>