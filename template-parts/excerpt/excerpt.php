<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */


?>
<div class="news-excerpt">
    <div class="single-excerpt">
        <div class="excerpt-date">
            <p class="excerpt-date-formatted"><?php echo get_the_date('d'); ?> <span><?php echo get_the_date('m, Y'); ?></span></p>
            <img src="/wp-content/uploads/pen-icon.png" alt="LiveLife Alarms Australia pen icon"/>
        </div>
        <div class="excerpt-thumbnail">
            <?php  if(has_post_thumbnail()):?>
                <?php the_post_thumbnail(); ?>
            <?php else: ?>
                <img src="/wp-content/uploads/NDIS-provider-live-life-medical-personal-alarm-systems-ndis.jpg">
            <?php endif; ?>
        </div>
        <div class="excerpt-section">
            <h2 class="news-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="excerpt-meta">
                <span>By Admin</span>
                <span><?php echo get_the_date(); ?></span>
                <span><a href="/category/news-article/">News/Article</a></span>
                <span>0 Comments</span>
            </div>
            <div class="excerpt-content">
               <?php the_excerpt(5); ?>
           </div>
        </div>
    </div>
    <div class="excerpt-permalink">
        <a href="<?php echo get_permalink(); ?>">Read More ></a>
    </div>
</div>