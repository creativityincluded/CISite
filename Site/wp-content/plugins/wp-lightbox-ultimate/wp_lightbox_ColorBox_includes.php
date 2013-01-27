<?php
define('WP_LIGHTBOX_COLORBOX_IMAGE_REL','wp_lightbox_colorbox_image');
define('WP_LIGHTBOX_COLORBOX_VIDEO_REL','wp_lightbox_colorbox_video');

function wp_lightbox_colorbox_anchor_text_image_display($link,$title,$text,$class)
{
	$wp_lightbox_colorbox_image = WP_LIGHTBOX_COLORBOX_IMAGE_REL;

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_image" title="$title">$text</a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_colorbox_anchor_text_video_display($link,$title,$text,$class)
{
	$wp_lightbox_colorbox_video = WP_LIGHTBOX_COLORBOX_VIDEO_REL;
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_video" title="$title">$text</a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_colorbox_image_display($link,$source,$class)
{
	$wp_lightbox_colorbox_image = WP_LIGHTBOX_COLORBOX_IMAGE_REL;

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_image"><img src="$source" alt="" /></a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_colorbox_video_display($link,$title,$source,$class)
{
	$wp_lightbox_colorbox_video = WP_LIGHTBOX_COLORBOX_VIDEO_REL;
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_colorbox_video" title="$title"><img src="$source" alt="" /></a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_load_colorbox_js()
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	
	$wp_lightbox_colorbox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_colorbox_transition_type');
	if(empty($wp_lightbox_colorbox_transition_type))
	{
		$wp_lightbox_colorbox_transition_type = 'elastic';
	}
	$wp_lightbox_colorbox_opacity = $wp_lightbox_config->getValue('wp_lightbox_colorbox_opacity');
	if(empty($wp_lightbox_colorbox_opacity))
	{
		$wp_lightbox_colorbox_opacity = 0.85;
	}
	$wp_lightbox_colorbox_overlayclose = $wp_lightbox_config->getValue('wp_lightbox_colorbox_overlayclose');
	if(empty($wp_lightbox_colorbox_overlayclose))
	{
		$wp_lightbox_colorbox_overlayclose = 'true';
	}
	else
	{
		$wp_lightbox_colorbox_overlayclose = 'false';
	}
	
	$wp_lightbox_colorbox_image = WP_LIGHTBOX_COLORBOX_IMAGE_REL;
	$wp_lightbox_colorbox_video = WP_LIGHTBOX_COLORBOX_VIDEO_REL;
	
	$wp_lightbox_colorbox_output = <<<EOT
	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery.noConflict();
	jQuery(document).ready(function($){
		$(function(){
			$("a[rel='$wp_lightbox_colorbox_image']").colorbox({
				width:$wp_lightbox_width, 
				height:$wp_lightbox_height,
				transition: "$wp_lightbox_colorbox_transition_type", 
				opacity: $wp_lightbox_colorbox_opacity, 
				overlayClose: $wp_lightbox_colorbox_overlayclose
			});
			$("a[rel='$wp_lightbox_colorbox_video']").colorbox({
				iframe:true, 
				width:$wp_lightbox_width, 
				height:$wp_lightbox_height, 
				transition: "$wp_lightbox_colorbox_transition_type", 
				opacity: $wp_lightbox_colorbox_opacity, 
				overlayClose: $wp_lightbox_colorbox_overlayclose
			});
		});
	});
	/* ]]> */
	</script>
EOT;
	echo $wp_lightbox_colorbox_output;
}
?>