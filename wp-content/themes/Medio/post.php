<?php global $flexitheme; ?>
    
    <div <?php post_class('post post-box clearfix'); ?> id="post-<?php the_ID(); ?>">
    
        <div class="postmeta-primary">

            <span class="meta_date"><?php echo get_the_date(); ?></span>
            
            <?php if(comments_open( get_the_ID() ))  {
                    ?> &nbsp; <span class="meta_comments"><?php comments_popup_link( __( 'No comments', 'themater' ), __( '1 Comment', 'themater' ), __( '% Comments', 'themater' ) ); ?></span><?php
                } ?> 
        </div>
        
        <h2 class="title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themater' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
        
        <div class="entry clearfix">
            
            <?php
                if(has_post_thumbnail())  {
                    ?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(
                        array($flexitheme->get_option('featured_image_width'), $flexitheme->get_option('featured_image_height')),
                        array("class" => $flexitheme->get_option('featured_image_position') . " featured_image")
                    ); ?></a><?php  
                }
            ?>
            
            <p>
                <?php
                  echo $flexitheme->shorten(get_the_excerpt(), '40');
                ?>
            </p>

        </div>
        
        <?php if($flexitheme->display('read_more')) { ?>
        <div class="readmore">
            <a href="<?php the_permalink(); ?>#more-<?php the_ID(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themater' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $flexitheme->option('read_more'); ?></a>
        </div>
        <?php } ?>
        
    </div><!-- Post ID <?php the_ID(); ?> -->