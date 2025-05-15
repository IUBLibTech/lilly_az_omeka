<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">

<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://webapp1.dlib.indiana.edu/piwik/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '90']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->


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
    
    <link rel="shortcut icon" type="image/x-icon" href="/themes/thedaily/img/favicon.ico" />


    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style', 'iconfonts'));
    queue_css_url('https://fonts.googleapis.com/css?family=Archivo+Black|Assistant:200,300,400');
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
<div id="bannercontainer">
	
		<?php

			if (is_current_url('/','/home')) {
			 echo theme_header_image();
		
            }
            elseif (is_current_url('/about')) {
			  ?><a href="/"><div id="headerItemPages"><img alt="The Lilly Library from A to Z" style="margin-top: 0em; width: 50%;" src="/themes/thedaily/img/headerItemPages.jpg"> </div></a>
            <?php }
          ?>  
               

        </header>
       
   <div id="wrap">     
        
    <!---    <?php echo theme_header_image(); ?>

        <article id="content" role="main"> --->

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
