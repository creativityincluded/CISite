<?php

function wp_lightbox_anchor_text_inline_html_overlay_display($div_id,$text,$class)
{
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="#" class="wp_lightbox_html_overlay_trigger" rel="#$div_id">$text</a>
	</div> 
EOT;
	return $wp_lightbox_output;	
}

function wp_lightbox_inline_html_overlay_display($div_id,$source,$class)
{
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="#" class="wp_lightbox_html_overlay_trigger" rel="#$div_id"><img src="$source" alt="" /></a>
	</div> 
EOT;
	return $wp_lightbox_output;	
}

function wp_lightbox_anchor_text_url_content_in_overlay_display($page_url,$width,$height,$text,$class)
{
	global $wp_lightbox_config;
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}	
	$unique_overlay_id = wp_lightbox_generate_unique_id();	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$page_url" class="wp_lightbox_url_content_trigger" rel="#$unique_overlay_id">$text</a>
	<div id="$unique_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
	<div class="contentWrap" style="height:{$height}px;overflow-y:auto;"></div>  
	</div>
	</div>  
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_url_content_in_overlay_display($page_url,$width,$height,$source,$class)
{
	global $wp_lightbox_config;
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	
	$unique_overlay_id = wp_lightbox_generate_unique_id();
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$page_url" class="wp_lightbox_url_content_trigger" rel="#$unique_overlay_id"><img src="$source" alt="" /></a>
	<div id="$unique_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
	<div class="contentWrap" style="height:{$height}px;overflow-y:auto;"></div>  
	</div>
	</div>  
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_load_html_overlay_js()
{
	$browser = new WP_LIGHTBOX_CHECK_BROWSER();
	$platform_name = $browser->getPlatform();
	$wp_lightbox_output = '';
	
	if($platform_name=="iPad" || $platform_name=="iPhone")
	{
		$position = "fixed: false,";	
	}
	else
	{
		$position = "";
	}
	$wp_lightbox_html_output = <<<EOT
	<script type="text/javascript"> 
	/* <![CDATA[ */
	jQuery(document).ready(function($){  	
		// setup mediaelementplayer
		$('video').mediaelementplayer(/* Options */);		
		// setup overlay for external page		
		$(".wp_lightbox_url_content_trigger").overlay({	 		
			expose: '#789',
			$position	 
			onBeforeLoad: function() {	 
				// grab wrapper element inside content
				var wrap = this.getOverlay().find(".contentWrap");	 
				// load the page specified in the trigger
				wrap.load(this.getTrigger().attr("href"));
			}	 
		});		
		// setup overlay actions to a href
		$(".wp_lightbox_html_overlay_trigger").overlay({		
			expose: '#789',
			$position				
			onLoad: function(content) {
			},
			onClose: function(content) {				
				if (navigator.userAgent.indexOf("Firefox")== -1)
				{
					var count = 0;
					$("video").each(function(){	
						$("video")[count].player.pause();
						count=count+1;
						if(count > 20){
							return false;						
						}
					});
				}
			}
		});	
	});
	/*]]>*/  
	</script>
EOT;
	echo $wp_lightbox_html_output;
}
?>