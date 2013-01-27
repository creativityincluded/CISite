<?php
define('WP_LIGHTBOX_FANCYBOX_IMAGE_REL','wp_lightbox_fancybox_image');
define('WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL','wp_lightbox_fancybox_youtube_video');
define('WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL','wp_lightbox_fancybox_vimeo_video');
define('WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL','wp_lightbox_fancybox_flash_video');

function wp_lightbox_fancybox_anchor_text_image_display($link,$title,$text,$class)
{
	$wp_lightbox_fancybox_image_rel = WP_LIGHTBOX_FANCYBOX_IMAGE_REL;
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_image_rel" title="$title">$text</a>
	</div>	
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_fancybox_anchor_text_youtube_video_display($link,$title,$text,$class)
{
	$wp_lightbox_fancybox_youtube_video_rel = WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL;
	if(strstr($link,'watch?v='))
	{
		$wp_lightbox_youtube_searched_parameter = 'watch?v=';
		$wp_lightbox_youtube_formatted_parameter = 'v/';
		$link = str_replace($wp_lightbox_youtube_searched_parameter,$wp_lightbox_youtube_formatted_parameter,$link);
	}
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_youtube_video_rel" title="$title">$text</a>
	</div>	
EOT;
	return $wp_lightbox_output;	
}

function wp_lightbox_fancybox_anchor_text_vimeo_video_display($link,$title,$text,$class)
{
	$wp_lightbox_fancybox_vimeo_video_rel = WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL;
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_vimeo_video_rel" title="$title">$text</a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_fancybox_anchor_text_flash_video_display($link,$text,$class)
{
	$wp_lightbox_fancybox_flash_video = WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL;
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_flash_video">$text</a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_fancybox_image_display($link,$title,$source,$class)
{
	$wp_lightbox_fancybox_image_rel = WP_LIGHTBOX_FANCYBOX_IMAGE_REL;
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_image_rel" title="$title"><img src="$source" alt="" /></a>
	</div>	
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_fancybox_youtube_video_display($link,$title,$source,$class)
{
	$wp_lightbox_fancybox_youtube_video_rel = WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL;
	if(strstr($link,'watch?v='))
	{
		$wp_lightbox_youtube_searched_parameter = 'watch?v=';
		$wp_lightbox_youtube_formatted_parameter = 'v/';
		$link = str_replace($wp_lightbox_youtube_searched_parameter,$wp_lightbox_youtube_formatted_parameter,$link);
	}	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_youtube_video_rel" title="$title"><img src="$source" alt="" /></a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_fancybox_vimeo_video_display($link,$title,$source,$class)
{
	$wp_lightbox_fancybox_vimeo_video_rel = WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL;
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_vimeo_video_rel" title="$title"><img src="$source" alt="" /></a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_fancybox_flash_video_display($link,$source,$class)
{
	$wp_lightbox_fancybox_flash_video = WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL;
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link" rel="$wp_lightbox_fancybox_flash_video"><img src="$source" alt="" /></a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_load_fancybox_js()
{
	$wp_lightbox_fancybox_image_rel = WP_LIGHTBOX_FANCYBOX_IMAGE_REL;
	$wp_lightbox_fancybox_youtube_video_rel = WP_LIGHTBOX_FANCYBOX_YOUTUBE_VIDEO_REL;
	$wp_lightbox_fancybox_vimeo_video_rel = WP_LIGHTBOX_FANCYBOX_VIMEO_VIDEO_REL;
	$wp_lightbox_fancybox_flash_video = WP_LIGHTBOX_FANCYBOX_FLASH_VIDEO_REL;
	
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	
	$wp_lightbox_fancybox_overlayopacity = $wp_lightbox_config->getValue('wp_lightbox_fancybox_overlayopacity');
	if(empty($wp_lightbox_fancybox_overlayopacity))
	{
		$wp_lightbox_fancybox_overlayopacity = 0.3;
	}
	$wp_lightbox_fancybox_show_title = $wp_lightbox_config->getValue('wp_lightbox_fancybox_show_title');
	if(empty($wp_lightbox_fancybox_show_title))
	{
		$wp_lightbox_fancybox_show_title = 'false';
	}
	$wp_lightbox_fancybox_titlePosition = $wp_lightbox_config->getValue('wp_lightbox_fancybox_titlePosition');
	if(empty($wp_lightbox_fancybox_titlePosition))
	{
		$wp_lightbox_fancybox_titlePosition = 'outside';
	}
	$wp_lightbox_fancybox_showCloseButton = $wp_lightbox_config->getValue('wp_lightbox_fancybox_showCloseButton');
	if(empty($wp_lightbox_fancybox_showCloseButton))
	{
		$wp_lightbox_fancybox_showCloseButton = 'false';
	}
	$wp_lightbox_fancybox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_fancybox_transition_type');
	if(empty($wp_lightbox_fancybox_transition_type))
	{
		$wp_lightbox_fancybox_transition_type = 'fade';
	}
	
	$wp_lightbox_fancybox_output = <<<EOT
	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery.noConflict();
	jQuery(document).ready(function($){
		$(function(){
			$("a[rel=$wp_lightbox_fancybox_image_rel]").fancybox({
						'showCloseButton': $wp_lightbox_fancybox_showCloseButton,
						'transitionIn'	 : '$wp_lightbox_fancybox_transition_type',
						'transitionOut'	 : '$wp_lightbox_fancybox_transition_type',
						'titleShow'      : $wp_lightbox_fancybox_show_title,
						'titlePosition'  : '$wp_lightbox_fancybox_titlePosition',
						'overlayOpacity' : $wp_lightbox_fancybox_overlayopacity
			});
		$("a[rel=$wp_lightbox_fancybox_youtube_video_rel]").click(function() {
				$.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'overlayOpacity' : $wp_lightbox_fancybox_overlayopacity,
					'showCloseButton': $wp_lightbox_fancybox_showCloseButton,
					'transitionIn'	: '$wp_lightbox_fancybox_transition_type',
					'transitionOut'	: '$wp_lightbox_fancybox_transition_type',
					'titleShow'      : $wp_lightbox_fancybox_show_title,
					'titlePosition'  : '$wp_lightbox_fancybox_titlePosition',
					'title'			: this.title,
					'width'			: $wp_lightbox_width,
					'height'		: $wp_lightbox_height,
					'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
					'type'			: 'swf',
					'swf'			: {
					'wmode'				: 'transparent',
					'allowfullscreen'	: 'true'
					}
				});
		
				return false;
			});
			$("a[rel=$wp_lightbox_fancybox_vimeo_video_rel]").click(function() {
				$.fancybox({
					'padding'		: 0,
					'autoScale'		: false,
					'overlayOpacity' : $wp_lightbox_fancybox_overlayopacity,
					'showCloseButton': $wp_lightbox_fancybox_showCloseButton,
					'transitionIn'	: '$wp_lightbox_fancybox_transition_type',
					'transitionOut'	: '$wp_lightbox_fancybox_transition_type',
					'titleShow'      : $wp_lightbox_fancybox_show_title,
					'titlePosition'  : '$wp_lightbox_fancybox_titlePosition',
					'title'			: this.title,
					'width'			: $wp_lightbox_width,
					'height'		: $wp_lightbox_height,
					'href'			: this.href.replace(new RegExp("([0-9])","i"),'moogaloop.swf?clip_id=$1'),
					'type'			: 'swf'
				});
		 
				return false;
			});
			$("a[rel=$wp_lightbox_fancybox_flash_video]").fancybox({
			    'padding'           : 0,
		        'autoScale'     	: false,
		        'overlayOpacity' : $wp_lightbox_fancybox_overlayopacity,
		       	'showCloseButton': $wp_lightbox_fancybox_showCloseButton,
				'transitionIn'	: '$wp_lightbox_fancybox_transition_type',
				'transitionOut'	: '$wp_lightbox_fancybox_transition_type',
				'width'				: $wp_lightbox_width,
				'height'			: $wp_lightbox_height
			});
		});
	});
	/* ]]> */
	</script>
EOT;
	echo $wp_lightbox_fancybox_output;
}
?>