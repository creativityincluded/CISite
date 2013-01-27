<?php
define('WP_LIGHTBOX_PLUGIN_URL', plugins_url('',__FILE__));
define('WP_LIGHTBOX_LIB_URL',WP_LIGHTBOX_PLUGIN_URL.'/lib');
define('WP_LIGHTBOX_IMAGE_URL',WP_LIGHTBOX_PLUGIN_URL.'/images');

include_once('wp_lightbox_prettyPhoto_includes.php');
include_once('wp_lightbox_fancybox_includes.php');
include_once('wp_lightbox_ColorBox_includes.php');
include_once('wp_lightbox_utility_functions.php');
include_once('wp_lightbox_special_functions.php');
include_once('wp_lightbox_ultimate_amazon_s3_class.php');
include_once('wp_lightbox_flowplayer_includes.php');
include_once('wp_lightbox_html5_includes.php');
include_once('wp_lightbox_html_overlay_includes.php');
include_once('wp_lightbox_misc_functions.php');
include_once('wp_lightbox_check_browser_class.php');

add_shortcode('wp_lightbox_special_anchor_text_flv_video','wp_lightbox_special_anchor_text_flv_video_handler' );
add_shortcode('wp_lightbox_special_anchor_text_mp4_video','wp_lightbox_special_anchor_text_mp4_video_handler' );
add_shortcode('wp_lightbox_special_anchor_text_mov_video','wp_lightbox_special_anchor_text_mov_video_handler' );
add_shortcode('wp_lightbox_special_anchor_text_mp3','wp_lightbox_special_anchor_text_mp3_handler' );
add_shortcode('wp_lightbox_special_anchor_text_viddler_video','wp_lightbox_special_anchor_text_viddler_video_handler' );
add_shortcode('wp_lightbox_special_flv_video','wp_lightbox_special_flv_video_handler' );
add_shortcode('wp_lightbox_special_mp4_video','wp_lightbox_special_mp4_video_handler' );
add_shortcode('wp_lightbox_special_mov_video','wp_lightbox_special_mov_video_handler' );
add_shortcode('wp_lightbox_special_mp3','wp_lightbox_special_mp3_handler' );
add_shortcode('wp_lightbox_special_viddler_video','wp_lightbox_special_viddler_video_handler' );
add_shortcode('wp_lightbox_special_anchor_text_pdf','wp_lightbox_special_anchor_text_pdf_handler' );
add_shortcode('wp_lightbox_special_pdf','wp_lightbox_special_pdf_handler' );

add_shortcode('wp_lightbox_prettyPhoto_anchor_text_image','wp_lightbox_prettyPhoto_anchor_text_image_handler' );
add_shortcode('wp_lightbox_prettyPhoto_anchor_text_video','wp_lightbox_prettyPhoto_anchor_text_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_anchor_text_flash_video','wp_lightbox_prettyPhoto_anchor_text_flash_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_image','wp_lightbox_prettyPhoto_image_handler' );
add_shortcode('wp_lightbox_prettyPhoto_video','wp_lightbox_prettyPhoto_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_flash_video','wp_lightbox_prettyPhoto_flash_video_handler' );
add_shortcode('wp_lightbox_prettyPhoto_anchor_text_pdf','wp_lightbox_prettyPhoto_anchor_text_pdf_handler' );
add_shortcode('wp_lightbox_prettyPhoto_pdf','wp_lightbox_prettyPhoto_pdf_handler' );
add_shortcode('wp_lightbox_anchor_text_display_external_page','wp_lightbox_anchor_text_display_external_page_handler');
add_shortcode('wp_lightbox_display_external_page','wp_lightbox_display_external_page_handler');

add_shortcode('wp_lightbox_fancybox_anchor_text_image','wp_lightbox_fancybox_anchor_text_image_handler' );
add_shortcode('wp_lightbox_fancybox_anchor_text_youtube_video','wp_lightbox_fancybox_anchor_text_youtube_video_handler' );
add_shortcode('wp_lightbox_fancybox_anchor_text_vimeo_video','wp_lightbox_fancybox_anchor_text_vimeo_video_handler' );
add_shortcode('wp_lightbox_fancybox_anchor_text_flash_video','wp_lightbox_fancybox_anchor_text_flash_video_handler' );
add_shortcode('wp_lightbox_fancybox_image','wp_lightbox_fancybox_image_handler' );
add_shortcode('wp_lightbox_fancybox_youtube_video','wp_lightbox_fancybox_youtube_video_handler' );
add_shortcode('wp_lightbox_fancybox_vimeo_video','wp_lightbox_fancybox_vimeo_video_handler');
add_shortcode('wp_lightbox_fancybox_flash_video','wp_lightbox_fancybox_flash_video_handler');

add_shortcode('wp_lightbox_colorbox_anchor_text_image','wp_lightbox_colorbox_anchor_text_image_handler' );
add_shortcode('wp_lightbox_colorbox_anchor_text_video','wp_lightbox_colorbox_anchor_text_video_handler' );
add_shortcode('wp_lightbox_colorbox_image','wp_lightbox_colorbox_image_handler' );
add_shortcode('wp_lightbox_colorbox_video','wp_lightbox_colorbox_video_handler' );

add_shortcode('wp_lightbox_flowplayer_anchor_text_video','wp_lightbox_flowplayer_anchor_text_video_handler' );
add_shortcode('wp_lightbox_flowplayer_video','wp_lightbox_flowplayer_video_handler' );

add_shortcode('wp_lightbox_flowplayer_anchor_text_protected_s3_video','wp_lightbox_flowplayer_anchor_text_protected_s3_video_handler');
add_shortcode('wp_lightbox_flowplayer_protected_s3_video','wp_lightbox_flowplayer_protected_s3_video_handler');

add_shortcode('wp_lightbox_anchor_text_html5_video','wp_lightbox_anchor_text_html5_video_handler');
add_shortcode('wp_lightbox_html5_video','wp_lightbox_html5_video_handler');

add_shortcode('wp_lightbox_html5_anchor_text_protected_s3_video','wp_lightbox_html5_anchor_text_protected_s3_video_handler');
add_shortcode('wp_lightbox_html5_protected_s3_video','wp_lightbox_html5_protected_s3_video_handler');

add_shortcode('wp_lightbox_anchor_text_inline_html_overlay','wp_lightbox_anchor_text_inline_html_overlay_handler');
add_shortcode('wp_lightbox_inline_html_overlay','wp_lightbox_inline_html_overlay_handler');
add_shortcode('wp_lightbox_anchor_text_display_url_content_in_overlay','wp_lightbox_anchor_text_display_url_content_in_overlay_handler');
add_shortcode('wp_lightbox_display_url_content_in_overlay','wp_lightbox_display_url_content_in_overlay_handler');
add_shortcode('wp_lightbox_anchor_text_protected_s3_video','wp_lightbox_anchor_text_protected_s3_video_handler');
add_shortcode('wp_lightbox_protected_s3_video','wp_lightbox_protected_s3_video_handler');
add_shortcode('wp_lightbox_embed_protected_s3_video','wp_lightbox_embed_protected_s3_video_handler');
add_shortcode('wp_lightbox_anchor_text_mp4_video','wp_lightbox_anchor_text_mp4_video_handler');
add_shortcode('wp_lightbox_mp4_video','wp_lightbox_mp4_video_handler');
add_shortcode('wp_lightbox_anchor_text_secure_s3_file_download','wp_lightbox_anchor_text_secure_s3_file_download_handler');
add_shortcode('wp_lightbox_secure_s3_file_download','wp_lightbox_secure_s3_file_download_handler');
add_shortcode('wp_lightbox_anchor_text_secure_s3_pdf_file','wp_lightbox_anchor_text_secure_s3_pdf_file_handler');
add_shortcode('wp_lightbox_secure_s3_pdf_file','wp_lightbox_secure_s3_pdf_file_handler');

add_shortcode('wp_lightbox_ultimate_fancy_gallery','wp_lightbox_ultimate_fancy_gallery_handler');

add_action('init', 'wp_lightbox_init');
add_action('init', 'wp_lightbox_ultimate_tinyMCE_addbutton');
add_action('wp_head', 'wp_lightbox_header');
add_action('wp_footer', 'wp_lightbox_footer');
add_action('admin_menu', 'wp_lightbox_menu');

if (!is_admin())
{
	add_filter('widget_text', 'do_shortcode');
	add_filter('the_excerpt', 'do_shortcode',11);
	add_filter('the_content', 'do_shortcode',11);
}

function wp_lightbox_menu() 
{
	if(is_admin())
	{
		require_once(dirname(__FILE__).'/wp_lightbox_settings.php');
		add_options_page('WP Lightbox Settings', 'WP Lightbox', 'manage_options', 'wp-lightbox-ultimate', 'wp_lightbox_plugin_options');
	} 
}

function wp_lightbox_ultimate_tinyMCE_addbutton() 
{
	// check user permission
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
	return;	
	// Add only in Rich Editor mode
	if (get_user_option('rich_editing') == 'true') 
	{
		add_filter("mce_external_plugins", "wp_lightbox_ultimate_tinyMCE_load");
		add_filter('mce_buttons', 'wp_lightbox_ultimate_tinyMCE_register_button');
	}
}
function wp_lightbox_ultimate_tinyMCE_load($plugin_array) 
{
	$plug = WP_LIGHTBOX_LIB_URL . '/wp_lightbox_ultimate_tiny_mce_plugin.js';
	$plugin_array['wplightboxultimate'] = $plug;
	return $plugin_array;
}
function wp_lightbox_ultimate_tinyMCE_register_button($buttons) 
{
   array_push($buttons, "separator", "WpLightboxUltimateButton");
   return $buttons;	
}

function wp_lightbox_special_anchor_text_flv_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_special_anchor_text_flv_video_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_special_anchor_text_pdf_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_special_anchor_text_pdf_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_special_anchor_text_mp4_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_special_anchor_text_mp4_video_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_special_anchor_text_mov_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_special_anchor_text_mov_video_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_special_anchor_text_mp3_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_special_anchor_text_mp3_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_special_anchor_text_viddler_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_special_anchor_text_viddler_video_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_special_flv_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'title' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_special_flv_video_display($link,$width,$height,$source,$title,$class);
}

function wp_lightbox_special_pdf_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'title' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_special_pdf_display($link,$width,$height,$source,$title,$class);
}

function wp_lightbox_special_mp4_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'title' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_special_mp4_video_display($link,$width,$height,$source,$title,$class);
}

function wp_lightbox_special_mov_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'title' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_special_mov_video_display($link,$width,$height,$source,$title,$class);
}

function wp_lightbox_special_mp3_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'title' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_special_mp3_display($link,$width,$height,$source,$title,$class);	
}

function wp_lightbox_special_viddler_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'title' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_special_viddler_video_display($link,$width,$height,$source,$title,$class);
}

function wp_lightbox_prettyPhoto_anchor_text_image_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'text' => 'Click Me',
		'description' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_anchor_text_image_display($link,$text,$description,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_anchor_text_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'description' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_anchor_text_video_display($link,$width,$height,$text,$description,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_anchor_text_flash_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'description' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_prettyPhoto_anchor_text_flash_video_display($link,$width,$height,$text,$description,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_image_handler($atts){
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'description' => '',
		'source' => '',
		'title' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_image_display($link,$description,$source,$title,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_video_handler($atts){
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'description' => '',
		'source' => '',
		'title' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_video_display($link,$width,$height,$description,$source,$title,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_flash_video_handler($atts){
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'description' => '',
		'source' => '',
		'title' => '',
		'gallery_group' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_flash_video_display($link,$width,$height,$description,$source,$title,$gallery_group,$class);
}

function wp_lightbox_prettyPhoto_anchor_text_pdf_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_anchor_text_pdf_display($link,$width,$height,$title,$text,$class);
}

function wp_lightbox_prettyPhoto_pdf_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_prettyPhoto_pdf_display($link,$width,$height,$title,$source,$class);
}

function wp_lightbox_anchor_text_display_external_page_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_display_external_page_display($link,$width,$height,$title,$text,$class);	
}

function wp_lightbox_display_external_page_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have prettyPhoto checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have WP Lightbox Special checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_display_external_page_display($link,$width,$height,$title,$source,$class);
}

function wp_lightbox_fancybox_anchor_text_image_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_fancybox_anchor_text_image_display($link,$title,$text,$class);
}

function wp_lightbox_fancybox_anchor_text_youtube_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_fancybox_anchor_text_youtube_video_display($link,$title,$text,$class);
}

function wp_lightbox_fancybox_anchor_text_vimeo_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	

	return wp_lightbox_fancybox_anchor_text_vimeo_video_display($link,$title,$text,$class);
}

function wp_lightbox_fancybox_anchor_text_flash_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_fancybox_anchor_text_flash_video_display($link,$text,$class);
}

function wp_lightbox_fancybox_image_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_fancybox_image_display($link,$title,$source,$class);
}

function wp_lightbox_fancybox_youtube_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_fancybox_youtube_video_display($link,$title,$source,$class);
}

function wp_lightbox_fancybox_vimeo_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_fancybox_vimeo_video_display($link,$title,$source,$class);
}

function wp_lightbox_fancybox_flash_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have fancybox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_fancybox_flash_video_display($link,$source,$class);
}

function wp_lightbox_colorbox_anchor_text_image_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_colorbox_anchor_text_image_display($link,$title,$text,$class);
}

function wp_lightbox_colorbox_anchor_text_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_colorbox_anchor_text_video_display($link,$title,$text,$class);
}

function wp_lightbox_colorbox_image_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_colorbox_image_display($link,$source,$class);
}

function wp_lightbox_colorbox_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have colorbox checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_colorbox_video_display($link,$title,$source,$class);
}

function wp_lightbox_flowplayer_anchor_text_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_flowplayer_anchor_text_video_display($link,$width,$height,$text,$class);
}

function wp_lightbox_flowplayer_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_flowplayer_video_display($link,$width,$height,$source,$class);	
}

function wp_lightbox_flowplayer_anchor_text_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_flowplayer_anchor_text_protected_s3_video_display($name,$bucket,$width,$height,$text,$class);
}

function wp_lightbox_flowplayer_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_flowplayer_protected_s3_video_display($name,$bucket,$width,$height,$source,$class);	
}

function wp_lightbox_anchor_text_html5_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'poster' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_html5_video_display($link,$poster,$width,$height,$text,$class);
}

function wp_lightbox_html5_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'poster' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_html5_video_display($link,$poster,$width,$height,$source,$class);
}
//TODO
function wp_lightbox_html5_anchor_text_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_html5_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$text,$class);
}

function wp_lightbox_html5_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_html5_protected_s3_video_display($name,$bucket,$poster,$width,$height,$source,$class);
}

function wp_lightbox_anchor_text_inline_html_overlay_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML Overlay checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'div_id' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_anchor_text_inline_html_overlay_display($div_id,$text,$class);
}

function wp_lightbox_inline_html_overlay_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML Overlay checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'div_id' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_inline_html_overlay_display($div_id,$source,$class);
}

function wp_lightbox_anchor_text_display_url_content_in_overlay_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML Overlay checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'page_url' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	
	return wp_lightbox_anchor_text_url_content_in_overlay_display($page_url,$width,$height,$text,$class);
	
}

function wp_lightbox_display_url_content_in_overlay_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML Overlay checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'page_url' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	
	return wp_lightbox_url_content_in_overlay_display($page_url,$width,$height,$source,$class);
	
}

function wp_lightbox_anchor_text_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$text,$class);
}

function wp_lightbox_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_protected_s3_video_display($name,$bucket,$poster,$width,$height,$source,$class);
}

function wp_lightbox_embed_protected_s3_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'poster' => '',
		'width' => '',
		'height' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_embed_protected_s3_video_display($name,$bucket,$poster,$width,$height,$class);
}

function wp_lightbox_anchor_text_mp4_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'poster' => '',
		'width' => '',
		'height' => '',
		'text' => 'Click Me',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_mp4_video_display($link,$poster,$width,$height,$text,$class);	
}

function wp_lightbox_mp4_video_handler($atts)
{
	global $wp_lightbox_config;
	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have flowplayer checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')=='')
	{
		$wp_lightbox_output .= '<div class="wp_lightbox_error_message">';
		$wp_lightbox_output .= 'You do not have HTML5 checkbox enabled in the settings';
		$wp_lightbox_output .= '</div>';
		return $wp_lightbox_output;
	}
	extract(shortcode_atts(array(
		'link' => '',
		'poster' => '',
		'width' => '',
		'height' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_mp4_video_display($link,$poster,$width,$height,$source,$class);
}

function wp_lightbox_anchor_text_secure_s3_file_download_handler($atts)
{
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'text' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_secure_s3_file_download_display($name,$bucket,$text,$class);
} 

function wp_lightbox_secure_s3_file_download_handler($atts)
{
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_secure_s3_file_download_display($name,$bucket,$source,$class);
}

function wp_lightbox_anchor_text_secure_s3_pdf_file_handler($atts)
{
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'width' => '',
		'height' => '',
		'title' => '',
		'text' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_anchor_text_secure_s3_pdf_file_display($name,$bucket,$width,$height,$title,$text,$class);
}

function wp_lightbox_secure_s3_pdf_file_handler($atts)
{
	extract(shortcode_atts(array(
		'name' => '',
		'bucket' =>'',
		'width' => '',
		'height' => '',
		'title' => '',
		'source' => '',
		'class' => '',
	), $atts));
	return wp_lightbox_secure_s3_pdf_file_display($name,$bucket,$width,$height,$title,$source,$class);
}

function wp_lightbox_ultimate_fancy_gallery_handler($atts,$content=null,$code="")
{
	extract(shortcode_atts(array(
		'class' => 'lightbox_fancy_grid_view_gallery',
	), $atts));
	return wp_lightbox_ultimate_fancy_gallery_display($class,$content);	
}

function wp_lightbox_init() 
{
	global $wp_lightbox_config;
    if (!is_admin()) 
    {
    	wp_enqueue_script('jquery');
    	if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox'))
    	{
	        wp_register_script('prettyphoto', WP_LIGHTBOX_LIB_URL.'/js/prettyPhoto.js');
	        wp_enqueue_script('prettyphoto');
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox'))
    	{
    		wp_register_script('fancybox', WP_LIGHTBOX_LIB_URL.'/js/fancybox.js');
	        wp_enqueue_script('fancybox');
	  		wp_register_script('fancybox-easing', WP_LIGHTBOX_LIB_URL.'/js/fancybox_easing.js');
	        wp_enqueue_script('fancybox-easing');
	        wp_register_script('fancybox-mousewheel', WP_LIGHTBOX_LIB_URL.'/js/fancybox_mousewheel.js');
	        wp_enqueue_script('fancybox-mousewheel');

    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox'))
    	{
    		wp_register_script('colorbox', WP_LIGHTBOX_LIB_URL.'/js/colorbox.js');
    		wp_enqueue_script('colorbox');
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox'))
    	{
	    	wp_register_script('wp-lightbox-mootools-core', WP_LIGHTBOX_LIB_URL.'/js/wp_lightbox_special_mootools_core.js');
	    	wp_enqueue_script('wp-lightbox-mootools-core');
	    	wp_register_script('wp-lightbox-Quickie', WP_LIGHTBOX_LIB_URL.'/js/wp_lightbox_special_Quickie.js');
	    	wp_enqueue_script('wp-lightbox-Quickie');
	    	wp_register_script('wp-lightbox-Adv', WP_LIGHTBOX_LIB_URL.'/js/wp_lightbox_special_Adv.js');
	    	wp_enqueue_script('wp-lightbox-Adv');
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox'))
    	{
	    	wp_register_script('jquery.tools', WP_LIGHTBOX_LIB_URL.'/js/jquery.tools.min.js');
	    	wp_enqueue_script('jquery.tools');
	    	wp_register_script('flowplayer', WP_LIGHTBOX_LIB_URL.'/js/flowplayer-3.2.6.min.js');
	    	wp_enqueue_script('flowplayer');			
    	}
    	if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox'))
    	{
    		wp_register_script('jquery.tools', WP_LIGHTBOX_LIB_URL.'/js/jquery.tools.min.js');
	    	wp_enqueue_script('jquery.tools');	    	
    		wp_register_script('mediaelement', WP_LIGHTBOX_LIB_URL.'/mediaelement/mediaelement-and-player.min.js');
	    	wp_enqueue_script('mediaelement');
    	}
        if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox'))
    	{
    		wp_register_script('jquery.tools', WP_LIGHTBOX_LIB_URL.'/js/jquery.tools.min.js');
	    	wp_enqueue_script('jquery.tools');	    	
    		wp_register_script('mediaelement', WP_LIGHTBOX_LIB_URL.'/mediaelement/mediaelement-and-player.min.js');
	    	wp_enqueue_script('mediaelement');
    	}
    	
    }
} 

function wp_lightbox_header()
{
	global $wp_lightbox_config;
	if (!is_admin())
	{
		$wp_lightbox_special_autoplay = $wp_lightbox_config->getValue('wp_lightbox_special_autoplay');
		if($wp_lightbox_special_autoplay)
		{
			$wp_lightbox_special_autoplay = "true";
		}
		else
		{
			$wp_lightbox_special_autoplay = "false";
		}
		// Add javascript values in the page
		echo '<script type="text/javascript">
		WP_LIGHTBOX_VERSION="'.WP_LIGHTBOX_VERSION.'";
		WP_LIGHTBOX_PLUGIN_URL="'.WP_LIGHTBOX_PLUGIN_URL.'";
		WP_MEDIA_LB_AUTOPLAY="'.$wp_lightbox_special_autoplay.'";
		</script>';
		
		if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox'))
		{
			echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_LIB_URL.'/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />';
		}
		if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox'))
		{
			echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_LIB_URL.'/css/fancybox.css" type="text/css" media="screen" />';
		}
		if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox'))
		{
			echo '<link rel="stylesheet" type="text/css" href="'.WP_LIGHTBOX_LIB_URL.'/css/colorbox.css"/>';
		}
		if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox'))
		{
			echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_LIB_URL.'/css/wp-lightbox-special.css" type="text/css" media="screen" />';
		}
		if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox'))
		{
			//load flowplayer library specific stuff
		}
		if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox'))
		{
			echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_LIB_URL.'/mediaelement/mediaelementplayer.min.css" type="text/css" media="screen" charset="utf-8" />';
		}
		if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox'))
		{
			echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_LIB_URL.'/mediaelement/mediaelementplayer.min.css" type="text/css" media="screen" charset="utf-8" />';
		}
		echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_LIB_URL.'/css/wp_lightbox_ultimate.css" type="text/css" media="screen" charset="utf-8" />';
		echo '<link rel="stylesheet" href="'.WP_LIGHTBOX_PLUGIN_URL.'/wp_lightbox_ultimate_custom.css" type="text/css" media="screen" charset="utf-8" />';
	}
	
}

function wp_lightbox_footer()
{
	global $wp_lightbox_config;
	if (!is_admin())
	{
		if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox'))
		{
			wp_lightbox_load_prettyPhoto_js();
		}
		if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox'))
		{
			wp_lightbox_load_fancybox_js();
		}
		if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox'))
		{
			wp_lightbox_load_colorbox_js();
		}
		if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox'))
		{
			wp_lightbox_load_flowplayer_js();
		}
		if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox'))
		{
			wp_lightbox_load_html5_js();
		}
		if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox'))
		{
			wp_lightbox_load_html_overlay_js();
		}
	}
}

?>