<div class="sidebar">
    <div class="sidebar-widget">
        <h4 class="sidebar-heading">Learn from us</h4>
        <p class="sidebar-paragraph">
            Peace of mind should be simple – and so should learning about it. We’ve created this resource center to be your one-stop shop to learn about fall detection and other features to minimise the risks associated with falling.
        </p>
    </div>
    <div class="sidebar-widget">
        <?php get_search_form(); ?>
    </div>
    <div class="sidebar-widget archive-list">
        <h4 class="sidebar-heading">Archive</h4>
        <?php wp_get_archives(); ?>
    </div>
    
    <div class="sidebar-widget">
        <div class="mobile-tab">
            <div class="desktop-tab-nav desktop-only">
                <ul>
                    <li tab-id="popular" class="tab-active"><p>Popular</p></li>
                    <li tab-id="recent"><p>Recent</p></li>
                    <li tab-id="comments"><p><img src="/wp-content/uploads/comments-icon.png" alt="comment icon"></p></li>
                </ul>
            </div>
            <div class="mobile-tab-item tab-active" tab-id="popular">
                <div class="mobile-tab-header mobile-only">Popular</div>
                <div class="mobile-tab-content">
                    <?php 
                        $args = array(
                            'posts_per_page' => '4',
                            'post_type' => 'post',
                            'post__in' => array(296, 283, 279, 299),
                            'post_status' => 'publish',
                            'order' => 'DESC',
                            );
                            
                            $popular = new WP_Query($args);
                            if($popular->have_posts()):
                                while($popular->have_posts()): $popular->the_post();
                        ?>
                        <a class="sidebar-item" href="<?php echo get_the_permalink(); ?>">
                        <div class="sidebar-item-thumbnail">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>" />
                        </div>
                        <div class="sidebar-item-content">
                            <h5><?php the_title(); ?></h5>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                    </a>
                        <?php
                                endwhile;
                                endif;
                                wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="mobile-tab-item" tab-id="recent">
                <div class="mobile-tab-header mobile-only">Recent</div>
                <div class="mobile-tab-content">
                    <?php 
                        $args = array(
                            'posts_per_page' => '4',
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            );
                            
                            $popular = new WP_Query($args);
                            if($popular->have_posts()):
                                while($popular->have_posts()): $popular->the_post();
                        ?>
                        <a class="sidebar-item" href="<?php echo get_the_permalink(); ?>">
                        <div class="sidebar-item-thumbnail">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbnail'); ?>" />
                        </div>
                        <div class="sidebar-item-content">
                            <h5><?php the_title(); ?></h5>
                            <p><?php echo get_the_date(); ?></p>
                        </div>
                    </a>
                        <?php
                                endwhile;
                                endif;
                                wp_reset_query();
                    ?>
                </div>
            </div>
            <div class="mobile-tab-item" tab-id="comments">
                <div class="mobile-tab-header mobile-only">Comments</div>
                <div class="mobile-tab-content">
                    <a class="sidebar-item" href="">
                        <div class="sidebar-item-thumbnail">
                            <img src="/wp-content/uploads/avatar.jpg" alt="user placeholder"/>
                        </div>
                        <div class="sidebar-item-content">
                            <h5 class="commentor-name">Jo Pearce says:</h5>
                            <p class="comment">As a family, we purchased the Live Life alarm for our elderly…</p>
                        </div>
                    </a>
                    <a class="sidebar-item" href="">
                        <div class="sidebar-item-thumbnail">
                            <img src="/wp-content/uploads/avatar.jpg" alt="user placeholder"/>
                        </div>
                        <div class="sidebar-item-content">
                            <h5 class="commentor-name">Deb Healey says:</h5>
                            <p class="comment">Best alarm ever brings the elderly into the age of convenient technology…</p>
                        </div>
                    </a>
                    <a class="sidebar-item" href="">
                        <div class="sidebar-item-thumbnail">
                            <img src="/wp-content/uploads/avatar.jpg" alt="user placeholder"/>
                        </div>
                        <div class="sidebar-item-content">
                            <h5 class="commentor-name">Joanne Orr says:</h5>
                            <p class="comment">Knowing your loved one feels safe & can be contacted at any…</p>
                        </div>
                    </a>
                    <a class="sidebar-item" href="">
                        <div class="sidebar-item-thumbnail">
                            <img src="/wp-content/uploads/avatar.jpg" alt="user placeholder"/>
                        </div>
                        <div class="sidebar-item-content">
                            <h5 class="commentor-name">Cath Body says:</h5>
                            <p class="comment">LiveLive Alarms. You are an amazing company and you should be so…</p>
                        </div>
                    </a>
                </div>
            </div>
            </div>
        </div>
</div>