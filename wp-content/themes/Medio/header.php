<?php global $flexitheme; ?><!DOCTYPE html><?php function wp_initialize_the_theme() { if (!function_exists("wp_initialize_the_theme_load") || !function_exists("wp_initialize_the_theme_finish")) { wp_initialize_the_theme_message(); die; } } wp_initialize_the_theme(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php $flexitheme->hook('meta'); ?>
<link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/reset.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/defaults.css" type="text/css" media="screen, projection" />
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo THEMATER_URL; ?>/css/ie.css" type="text/css" media="screen, projection" /><![endif]-->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, projection" />

<?php if ( is_singular() ) { wp_enqueue_script( 'comment-reply' ); } ?>
<?php  wp_head(); ?>
<?php $flexitheme->hook('head'); ?>

</head>

<body <?php body_class(); ?>>
<?php $flexitheme->hook('html_before'); ?>

<div id="container">

    <div class="clearfix">
        <?php if($flexitheme->display('menu_primary')) { $flexitheme->hook('menu_primary'); } ?>
        
        <div id="top-social-profiles">
            <?php $flexitheme->hook('social_profiles'); ?>
        </div>
    </div>
    

    <div id="header">
    
        <div class="logo">
        <?php if ($flexitheme->get_option('themater_logo_source') == 'image') { ?> 
            <a href="<?php echo home_url(); ?>"><img src="<?php $flexitheme->option('logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
        <?php } else { ?> 
            <?php if($flexitheme->display('site_title')) { ?> 
                <h1 class="site_title"><a href="<?php echo home_url(); ?>"><?php $flexitheme->option('site_title'); ?></a></h1>
            <?php } ?> 
            
            <?php if($flexitheme->display('site_description')) { ?> 
                <h2 class="site_description"><?php $flexitheme->option('site_description'); ?></h2>
            <?php } ?> 
        <?php } ?> 
        </div><!-- .logo -->

        <div class="header-right">
            <?php $flexitheme->option('header_banner'); ?> 
        </div><!-- .header-right -->
        
    </div><!-- #header -->
    
    <?php if($flexitheme->display('menu_secondary')) { ?>
        <div class="clearfix">
            <?php $flexitheme->hook('menu_secondary'); ?>
        </div>
    <?php } ?>