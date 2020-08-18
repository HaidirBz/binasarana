<?php
/**
 * Template Name: Archives
*/

global $flexitheme; get_header(); ?>

    <div id="main">
    
        <?php $flexitheme->hook('main_before'); ?>

        <div id="content">
            
            <?php $flexitheme->hook('content_before'); ?>
        
            <?php 
                if (have_posts()) : while (have_posts()) : the_post();
                    /**
                     * Find the post formatting for the pages in the post-page.php file
                     */
                    get_template_part('post', 'page');
                endwhile;
                
                else :
                    get_template_part('post', 'noresults');
                endif; 
            ?>
            
            <div class="sitemap">
            
                <div>
                    <h2><?php _e('The Last 20 Posts', 'themater'); ?></h2>
                    
                    <ul class="sitemap-list">
                        <?php wp_get_archives('type=postbypost&limit=20&show_post_count=1'); ?>
                    </ul>
                    
                </div>
                
                <div class="clearfix">
                    
                    <div class="alignleft sitemap-col-archives">
                        <h2><?php _e('Categories', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_list_categories('title_li=&show_count=1'); ?>
                        </ul>
                    </div>
                    
                    <div class="alignleft sitemap-col-archives">
                        <h2><?php _e('Monthly Archives', 'themater'); ?></h2>
                        <ul class="sitemap-list">
                            <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
                        </ul>
                    </div>
                </div>
                
            </div>
            
            <?php $flexitheme->hook('content_after'); ?>
        
        </div><!-- #content -->
    
        <?php get_sidebars(); ?>
        
        <?php $flexitheme->hook('main_after'); ?>
        
    </div><!-- #main -->
    
<?php get_footer(); ?>