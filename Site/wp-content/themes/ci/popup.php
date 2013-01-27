<?php
 /*
 Template Name: Popup
 Author: Rick R. Duncan
 URL: www.BuildBrandBelieve.com
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="MSSmartTagsPreventParsing" content="true" />
        <meta http-equiv="Imagetoolbar" content="No" />
        <title>Email A Friend</title>
        <style type="text/css">
            body {font-size:13px;}
        </style>
        <link rel='stylesheet' id='gforms_css-css'  href='<?php bloginfo('url'); ?>/wp-content/plugins/gravityforms/css/forms.css?ver=1.6.2.1.1' type='text/css' media='all' />
        <script type='text/javascript' src='<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js?ver=1.7.1'></script>
        <link rel="stylesheet" href='<?php bloginfo('stylesheet_directory'); ?>/style.css' type="text/css" media="screen" />
    </head>
    <body class="email">
        <div id="emailForm">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content('read more'); ?>
            <?php endwhile; endif; ?>
            <?php wp_footer(); ?>
        </div>
    </body>
</html>