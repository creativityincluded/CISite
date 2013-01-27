<?php
function wp_lightbox_ultimate_run_activation()
{
	include_once('wp_lightbox_config.php');
	$wp_lightbox_config = WP_Lightbox_Config::getInstance();
	//global $wp_lightbox_config;
	
	/*** Start of Add Default Options ***/
	$wp_lightbox_config->addValue('wp_lightbox_width','640');
	$wp_lightbox_config->addValue('wp_lightbox_height','480');
		
	$wp_lightbox_config->addValue('wp_lightbox_prettyPhoto_checkbox','1');
	$wp_lightbox_config->addValue('wp_lightbox_prettyPhoto_animation_speed','fast');
	$wp_lightbox_config->addValue('wp_lightbox_prettyPhoto_opacity','0.80');
	$wp_lightbox_config->addValue('wp_lightbox_prettyPhoto_theme','dark_rounded');
	
	$wp_lightbox_config->addValue('wp_lightbox_fancybox_overlayopacity','0.3');
	$wp_lightbox_config->addValue('wp_lightbox_fancybox_titlePosition','outside');
	$wp_lightbox_config->addValue('wp_lightbox_fancybox_transition_type','elastic');
	$wp_lightbox_config->addValue('wp_lightbox_fancybox_showCloseButton','1');	
	
	$wp_lightbox_config->addValue('wp_lightbox_colorbox_transition_type','elastic');
	$wp_lightbox_config->addValue('wp_lightbox_colorbox_opacity','0.85');	
	
	$wp_lightbox_config->saveConfig();
	/*** End of Add Default Options ***/
}
?>