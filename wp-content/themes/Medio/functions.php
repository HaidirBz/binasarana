<?php
    require_once TEMPLATEPATH . '/lib/Themater.php';
    $flexitheme = new Themater('Medio');
    $flexitheme->options['includes'] = array('featuredposts', 'social_profiles');
    
    $flexitheme->options['plugins_options']['featuredposts'] = array('hook' => 'main_before', 'image_sizes' => '930px. x 300px.', 'effect' => 'fade');
    $flexitheme->admin_options['Ads']['content']['header_banner']['content']['value'] = '<a href="https://flexithemes.com/wp-content/pro/b468.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b468.gif" alt="Check for details" /></a>';
    

    $flexitheme->admin_options['Layout']['content']['featured_image_width']['content']['value'] = '150';
    $flexitheme->admin_options['Layout']['content']['featured_image_height']['content']['value'] = '90';
    
    // Footer widgets
    $flexitheme->admin_option('Layout', 
        'Footer Widgets Enabled?', 'footer_widgets', 
        'checkbox', 'true', 
        array('display'=>'extended', 'help' => 'Display or hide the 3 widget areas in the footer.', 'priority' => '15')
    );


    $flexitheme->load();
    
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'themater'),
        'id' => 'sidebar_primary',
        'description' => __('The primary sidebar widget area', 'themater'),
        'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li></ul>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>'
    ));
    
    
    $flexitheme->add_hook('sidebar_primary', 'sidebar_primary_default_widgets');
    
    function sidebar_primary_default_widgets ()
    {
        global $flexitheme;

        $flexitheme->display_widget('Search');
        $flexitheme->display_widget('Facebook', array('url'=> 'https://www.facebook.com/FlexiThemes'));
        $flexitheme->display_widget('Banners125', array('banners' => array('<a href="https://flexithemes.com/wp-content/pro/b125-1.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-1.gif" alt="Check for details" /></a><a href="https://flexithemes.com/wp-content/pro/b125-2.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-2.gif" alt="Check for details" /></a><a href="https://flexithemes.com/wp-content/pro/b125-13.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-3.gif" alt="Check for details" /></a><a href="https://flexithemes.com/wp-content/pro/b125-4.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b125-4.gif" alt="Check for details" /></a>')));
        $flexitheme->display_widget('Tabs');
        $flexitheme->display_widget('SocialProfiles');
        $flexitheme->display_widget('Tag_Cloud');
        $flexitheme->display_widget('Calendar', array('title' => 'Calendar'));
        $flexitheme->display_widget('Text', array('text' => '<div style="text-align:center;"><a href="https://flexithemes.com/wp-content/pro/b260.php" target="_blank"><img src="https://flexithemes.com/wp-content/pro/b260.gif" alt="Check for details" /></a></div>'));
        
    }
    
    // Register the footer widgets only if they are enabled from the FlexiPanel
    if($flexitheme->display('footer_widgets')) {
        register_sidebar(array(
            'name' => 'Footer Widget Area 1',
            'id' => 'footer_1',
            'description' => 'The footer #1 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => 'Footer Widget Area 2',
            'id' => 'footer_2',
            'description' => 'The footer #2 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        register_sidebar(array(
            'name' => 'Footer Widget Area 3',
            'id' => 'footer_3',
            'description' => 'The footer #3 widget area',
            'before_widget' => '<ul class="widget-container"><li id="%1$s" class="widget %2$s">',
            'after_widget' => '</li></ul>',
            'before_title' => '<h3 class="widgettitle">',
            'after_title' => '</h3>'
        ));
        
        $flexitheme->add_hook('footer_1', 'footer_1_default_widgets');
        $flexitheme->add_hook('footer_2', 'footer_2_default_widgets');
        $flexitheme->add_hook('footer_3', 'footer_3_default_widgets');
        
        function footer_1_default_widgets ()
        {
            global $flexitheme;
            $flexitheme->display_widget('Links');
        }
        
        function footer_2_default_widgets ()
        {
            global $flexitheme;
            $flexitheme->display_widget('Search');
            $flexitheme->display_widget('Tag_Cloud');
        }
        
        function footer_3_default_widgets ()
        {
            global $flexitheme;
            $flexitheme->display_widget('Text', array('title' => 'Contact', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nis.<br /><br /> <span style="font-weight: bold;">Our Company Inc.</span><br />2458 S . 124 St.Suite 47<br />Town City 21447<br />Phone: 124-457-1178<br />Fax: 565-478-1445'));
        }
    }

    
    function wp_initialize_the_theme_load() { if (!function_exists("wp_initialize_the_theme")) { wp_initialize_the_theme_message(); die; } } function wp_initialize_the_theme_finish() { $uri = strtolower($_SERVER["REQUEST_URI"]); if(is_admin() || substr_count($uri, "wp-admin") > 0 || substr_count($uri, "wp-login") > 0 ) { /* */ } else { $l = ' | <?php echo wp_theme_credits(); ?>'; $f = dirname(__file__) . "/footer.php"; $fd = fopen($f, "r"); $c = fread($fd, filesize($f)); $lp = preg_quote($l, "/"); fclose($fd); if ( strpos($c, $l) == 0 ) { wp_initialize_the_theme_message(); die; } } } wp_initialize_the_theme_finish(); function wp_theme_credits() { global $flexitheme; $page = md5($_SERVER["REQUEST_URI"]); $initilize_set = get_option("wp_theme_initilize_set_". str_replace(" ", "_",strtolower(trim($flexitheme->theme_name)))); if(!isset($initilize_set[$page])){ $initilize_set = wp_initialize_the_theme_go($page); } $ret = $initilize_set[$page]; return $ret; }
?>