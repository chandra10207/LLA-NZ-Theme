<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<div class="blog-box boxed-row product-details pad-box">
   
    <div class="blog-right">
        <?php 
        global $post;
        $cats = get_the_category($post->id);
        $cat = $cats[0];
        ?>
         <div class="breadcrumbs boxed-row single-post-breadcrumb">
    	    <p><a href="/">Home</a> / <a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a> / <?php echo get_the_title(); ?></p>
        </div>
        <div class="single-post-bordered post-navigation">
            <?php if(get_previous_post_link()): ?>
                <?php echo get_previous_post_link($format = '&laquo; %link', $link = 'Previous'); ?>
            <?php endif; ?>
            <?php if(get_next_post_link()):?>
                <?php echo get_next_post_link($format = '%link &raquo;', $link = 'Next'); ?>
            <?php endif; ?> 
        </div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<div class="entry-content">
        	    <div class="single-post-img">
        	        <?php  if(has_post_thumbnail()):?>
                        <?php the_post_thumbnail(); ?>
                    <?php endif; ?>
        	    </div>
        	    <div class="single-post-title">
        	        <h1><?php echo get_the_title(); ?></h1>
        	    </div>
        	    <div class="single-post-content">
        	        <?php the_content(); ?>
        	    </div>
        		<div class="excerpt-meta single-post-bordered">
                    <span>By Admin</span>
                    <span><?php echo get_the_date(); ?></span>
                    <span><a href="/category/news-article/">News/Article</a></span>
                    <span>0 Comments</span>
                </div>
        	</div>
        </article>
    </div>
    <div class="blog-left">
        <?php include dirname(__FILE__).'/../../sidebar.php'; ?>
    </div>
</div>
<style>
    .breadcrumbs.boxed-row.single-post-breadcrumb {
        margin-top: 0px;
    }
    
    .breadcrumbs.boxed-row.single-post-breadcrumb p {
        color: #a59d99;
    }
    .breadcrumbs.boxed-row.single-post-breadcrumb a {
        color: #5b5651 ;
    }
    
    .post-navigation {
        text-align: right;
    }
    
     .post-navigation > a:last-child {
        margin-left: 10px;
    }
    
    
    .single-post-title {
        margin: 20px 0px;
    }
    
    .single-post-img img {
        width: 100%;
        height: auto;
    }
    
    .single-post-bordered {
        border-top: 1px solid #eaeaea;
        border-bottom: 1px solid #eaeaea;
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 5px 0;
    }
    

</style>