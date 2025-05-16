<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    
 	
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?> 
    
     <link rel="shortcut icon" type="image/x-icon" href="/~cyberdh/lilly/themes/thedaily/img/favicon.png" />
    
    <div id="branding-bar" class="iub" itemscope="itemscope" itemtype="http://schema.org/CollegeOrUniversity" role="complementary" aria-labelledby="campus-name">
	<div class="row pad">
			<img src="//assets.iu.edu/brand/3.x/trident-large.png" alt="" />
			<p id="iu-campus">
				<a href="https://www.indiana.edu" title="Indiana University Bloomington">
					<span id="campus-name" class="show-on-desktop" itemprop="name">Indiana University Bloomington</span>
					<span class="show-on-tablet" itemprop="name">Indiana University Bloomington</span>
					<span class="show-on-mobile" itemprop="name">IU Bloomington</span>
				</a>
			</p>
	</div>
</div>
	<link href="https://assets.iu.edu/brand/3.x/brand.css" rel="stylesheet" type="text/css">

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style', 'iconfonts'));
    queue_css_url('https://fonts.iu.edu/fonts/benton-sans-regular.eot');
    echo head_css();
    echo $this->partial('common/custom_colors.php');
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(array('globals'));
    queue_js_file(array('thedaily'), 'js');
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
   

        <header role="banner">
			
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

        <!---       <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?>
             <div id="site-description"><?php echo $description; ?></div>
            </div>
			
            <div id="search-container" role="search">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true, 'form_attributes' => array('role' => 'search', 'class' => 'closed'))); ?>
                <?php else: ?>
                <?php echo search_form(array('form_attributes' => array('role' => 'search', 'class' => 'closed'))); ?>
                <?php endif; ?>
                <button type="button" class="search-toggle" title="<?php echo __('Toggle search'); ?>"></button>
            </div>


            <nav id="top-nav" role="navigation" class="closed">
                <button type="button" class="menu-toggle" aria-label="<?php echo __('Toggle menu'); ?>"></button>
                <?php echo public_nav_main(); ?>
            </nav>
            
      ---!>                

        </header>
 
        <?php
        //    $currentItem = get_current_record('item', false);
        //    if (! $currentItem) {
        //        echo theme_header_image();
        //    }
?>
<div id="bannercontainer">
	
		<?php

			if (is_current_url('/','/home')) {
			 echo theme_header_image();
            }
            
?>
<div id="wrap">		
		
        <article id="content" role="main">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
            
            
</div>

