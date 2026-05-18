<?php get_header(); ?>
<div class="breadcrumbs boxed-row">
    	<p><a href="/">Home</a> / <a href="/news/">News</a></p>
    </div>
    <div class="blog-box boxed-row product-details pad-box">
        <div class="blog-right">
        <?php
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post();
            		get_template_part( 'template-parts/excerpt/excerpt');
            	}
            } else {
                echo 'Not found anything';
            }
        ?>
        </div>
        <div class="blog-left">
            <?php include('sidebar.php'); ?>
        </div>
    </div>
<?php get_footer(); ?>