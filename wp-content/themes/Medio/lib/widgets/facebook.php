<?php

global $flexitheme;

$themater_facebook_defaults = array(
    'title' => 'Facebook',
    'url' => 'http://www.facebook.com/facebook',
    'width' => '',
    'height' => '250',
    'hide_cover' => 'true',
    'show_faces' => 'true',
    'stream' => 'false',
    'small_header' => 'true',
    'adapt_container_width' => 'true'
);
$flexitheme->options['widgets_options']['facebook'] = array_key_exists('facebook', $flexitheme->options['widgets_options'])
    ? array_merge($themater_facebook_defaults, $flexitheme->options['widgets_options']['facebook'])
    : $themater_facebook_defaults;
        
add_action('widgets_init', create_function('', 'return register_widget("ThematerFacebook");'));

class ThematerFacebook extends WP_Widget 
{
    function __construct() 
    {
        $widget_options = array('description' => __('The Page plugin lets you easily embed and promote any Facebook Page on your website. Just like on Facebook, your visitors can like and share the Page without having to leave your site.', 'themater') );
        $control_options = array( 'width' => 440);
        parent::__construct('themater_facebook', '&raquo; Facebook Like Box', $widget_options, $control_options);
    }

    function widget($args, $instance)
    {
        global $wpdb, $flexitheme;
        extract( $args );
        $instance = ! empty( $instance ) ? $instance : $flexitheme->options['widgets_options']['facebook'];
        $title = apply_filters('widget_title', $instance['title']);
        $url = $instance['url'];
        $width = $instance['width'];
        $height = $instance['height'];
        $hide_cover = $instance['hide_cover'] == 'true' ? 'true' : 'false';
        $show_faces = $instance['show_faces'] == 'true' ? 'true' : 'false';
        $stream = $instance['stream'] == 'true' ? 'true' : 'false';
        $small_header = $instance['small_header'] == 'true' ? 'true' : 'false';
        $adapt_container_width = $instance['adapt_container_width'] == 'true' ? 'true' : 'false';
        ?>
        <ul class="widget-container"><li class="facebook-widget">
        <?php  if ( $title ) {  ?> <h3 class="widgettitle"><?php echo $title; ?></h3> <?php }  ?>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=163862247017518";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-page" data-href="<?php echo $url; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-small-header="<?php echo $small_header; ?>" data-adapt-container-width="<?php echo $adapt_container_width; ?>" data-hide-cover="<?php echo $hide_cover; ?>" data-show-facepile="<?php echo $show_faces; ?>" data-show-posts="<?php echo $stream; ?>"></div>
            
        </li></ul>
     <?php
    }

    function update($new_instance, $old_instance) 
    {		
    	$instance = $old_instance;
    	$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
        $instance['hide_cover'] = strip_tags($new_instance['hide_cover']);
        $instance['show_faces'] = strip_tags($new_instance['show_faces']);
        $instance['stream'] = strip_tags($new_instance['stream']);
        $instance['small_header'] = strip_tags($new_instance['small_header']);
        $instance['adapt_container_width'] = strip_tags($new_instance['adapt_container_width']);
        return $instance;
    }
    
    function form($instance) 
    {	
        global $flexitheme;
		$instance = wp_parse_args( (array) $instance, $flexitheme->options['widgets_options']['facebook'] );
        
        ?>
        
            <div class="tt-widget">
                <table width="100%">
                    <tr>
                        <td class="tt-widget-label" width="30%"><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label></td>
                        <td class="tt-widget-content" width="70%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="tt-widget-label"><label for="<?php echo $this->get_field_id('url'); ?>">Facebook Page URL:</label></td>
                        <td class="tt-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" type="text" value="<?php echo esc_attr($instance['url']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="tt-widget-label">Sizes:</td>
                        <td class="tt-widget-content">
                            Width: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('width'); ?>" value="<?php echo esc_attr($instance['width']); ?>" /> px. &nbsp; &nbsp;
                            Height: <input type="text" style="width: 50px;" name="<?php echo $this->get_field_name('height'); ?>" value="<?php echo esc_attr($instance['height']); ?>" /> px.
                        </td>
                    </tr>
                    

                    <tr>
                        <td class="tt-widget-label">Misc Options:</td>
                        <td class="tt-widget-content">
                            <input type="checkbox" name="<?php echo $this->get_field_name('adapt_container_width'); ?>"  <?php checked('true', $instance['adapt_container_width']); ?> value="true" />  <?php _e('Adapt to container width (The width field should be leaved empty)', 'themater'); ?>   
                            <br /><input type="checkbox" name="<?php echo $this->get_field_name('show_faces'); ?>"  <?php checked('true', $instance['show_faces']); ?> value="true" />  <?php _e('Show Faces', 'themater'); ?>
                            <br /><input type="checkbox" name="<?php echo $this->get_field_name('stream'); ?>"  <?php checked('true', $instance['stream']); ?> value="true" />  <?php _e('Show Page Posts', 'themater'); ?>
                            <br /><input type="checkbox" name="<?php echo $this->get_field_name('hide_cover'); ?>"  <?php checked('true', $instance['hide_cover']); ?> value="true" />  <?php _e('Hide Cover Photo', 'themater'); ?>   
                            <br /><input type="checkbox" name="<?php echo $this->get_field_name('small_header'); ?>"  <?php checked('true', $instance['small_header']); ?> value="true" />  <?php _e('Use Small Header', 'themater'); ?>   
                        </td>
                    </tr>
                    
                </table>
            </div>
            
        <?php 
    }
} 
?>