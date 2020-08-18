<?php global $flexitheme; get_header(); ?>

    <div id="main">
    
        <?php $flexitheme->hook('main_before'); ?>
    
        <div id="content">
        
            <?php $flexitheme->hook('content_before'); ?>
        
            <div class="entry">
                <?php _e('The page you requested could not be found.','themater'); ?>
            </div>
            
            <div id="content-search">
                <?php get_search_form(); ?>
            </div>
            
            <?php $flexitheme->hook('content_after'); ?>
        
        </div><!-- #content -->
    
        <?php get_sidebars(); ?>
        
        <?php $flexitheme->hook('main_after'); ?>
        
    </div><!-- #main -->
    
<?php get_footer(); ?>