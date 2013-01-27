<?php

function wp_lightbox_flowplayer_anchor_text_video_display($link,$width,$height,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="#" class="wp_lightbox_fp_trigger" rel="#$unique_video_overlay_id">$text</a>
	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">	
	<a class="player" href="$link" style="display:block;width:{$width}px;height:{$height}px;"></a>
	</div>
	</div>
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_flowplayer_video_display($link,$width,$height,$source,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="#" class="wp_lightbox_fp_trigger" rel="#$unique_video_overlay_id"><img src="$source" alt="" /></a>
	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">	
	<a class="player" href="$link" style="display:block;width:{$width}px;height:{$height}px;"></a>
	</div>
	</div>
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_flowplayer_anchor_text_protected_s3_video_display($name,$bucket,$width,$height,$text,$class)
{
	global $wp_lightbox_config;
	
	//Do some error checking on the name and bucket parameters
	if (preg_match("/http/", $name)){
		return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
	}
	if (preg_match("/http/", $bucket)){
		return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
	}
		
	$access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
	$secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
	$link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); 
	
	if(empty($access_key) || empty($secret_key)){
		return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
	}
	if(empty($link_duration) && $link_duration!='0'){
		$link_duration = '300';
	}
			
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	$objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
	$file = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
	$file = urlencode($file);

	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="#" class="wp_lightbox_fp_trigger" rel="#$unique_video_overlay_id">$text</a>
	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">	
	<a class="player" href="$file" style="display:block;width:{$width}px;height:{$height}px;"></a>
	</div>
	</div>
EOT;

	return $wp_lightbox_output;	
	
}

function wp_lightbox_flowplayer_protected_s3_video_display($name,$bucket,$width,$height,$source,$class)
{
	global $wp_lightbox_config;
	
	//Do some error checking on the name and bucket parameters
	if (preg_match("/http/", $name)){
		return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "name" field for your Protected S3 Video shortcode. You should only use the name of the video file in this field (Not the full URL of the file).</div>';	 
	}
	if (preg_match("/http/", $bucket)){
		return '<div class="wp_lightbox_error_message">Looks like you have entered a URL in the "bucket" field for your Protected S3 Video shortcode. You should only use the name of the bucket in this field (Not the full URL).</div>';	 
	}
		
	$access_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key');
	$secret_key = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key');
	$link_duration = $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration');
		
	if(empty($access_key) || empty($secret_key)){
		return '<div class="wp_lightbox_error_message">You must fill in a value in both the "AWS Access Key ID" and the "AWS Secret Access Key" fields in the settings menu!</div>';
	}
	if(empty($link_duration) && $link_duration!='0'){
		$link_duration = '300';
	}
		
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	$objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
	$file = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
	$file = urlencode($file);

	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="#" class="wp_lightbox_fp_trigger" rel="#$unique_video_overlay_id"><img src="$source" alt="" /></a>
	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">	
	<a class="player" href="$file" style="display:block;width:{$width}px;height:{$height}px;"></a>
	</div>
	</div>
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_embed_code_flowplayer($link,$width,$height,$class)
{
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor $class">
	<a class="player" href="$link" style="display:block;width:{$width}px;height:{$height}px;"></a>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_load_flowplayer_js()
{
	global $wp_lightbox_config;
	$wp_lightbox_library_url = WP_LIGHTBOX_LIB_URL;
	$wp_lightbox_plugin_url = WP_LIGHTBOX_PLUGIN_URL;
	$wp_lightbox_flowplayer_license_key = '';
	$wp_lightbox_flowplayer_autoplay_value = $wp_lightbox_config->getValue('wp_lightbox_flowplayer_autoplay');
	if(empty($wp_lightbox_flowplayer_autoplay_value))
	{
		$wp_lightbox_flowplayer_autoplay_value = 'false'; /* Automatically start videos: True/false */
	}
	
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
	
	if(!empty($wp_lightbox_flowplayer_license_key))
	{
		$wp_lightbox_flowplayer_output = <<<EOT
		<script type="text/javascript"> 
		/* <![CDATA[ */
		jQuery(document).ready(function($){	
			// setup overlay actions to a href
			$(".wp_lightbox_fp_trigger").overlay({		
				expose: '#789',
				$position				
				onLoad: function(content) {
					// find the player contained inside this overlay and load it
					this.getOverlay().find("a.player").flowplayer(0).load();
				},
				onClose: function(content) {
					this.getOverlay().find("a.player").flowplayer(0).pause();
					this.getOverlay().find("a.player").flowplayer(0).unload();
				}
			});	
			// install player
			$("a.player").flowplayer("$wp_lightbox_library_url/js/flowplayer.commercial-3.2.7.swf", {
				key: '$wp_lightbox_flowplayer_license_key',
				logo: {
					url: ''
				},
				play: {
					url: '$wp_lightbox_plugin_url/images/play-button.png',
					width: 64,
					height: 64
				},
				clip: { 
					autoPlay:$wp_lightbox_flowplayer_autoplay_value, 
					scaling:'fit'					
				} 
			});	
		});
		/*]]>*/  
		</script>	
EOT;
	}
	else
	{
		$wp_lightbox_flowplayer_output = <<<EOT
		<script type="text/javascript"> 
		/* <![CDATA[ */
		jQuery(document).ready(function($){	
			// setup overlay actions to a href
			$(".wp_lightbox_fp_trigger").overlay({		
				expose: '#789',	
				$position			
				onLoad: function(content) {
					// find the player contained inside this overlay and load it
					this.getOverlay().find("a.player").flowplayer(0).load();
				},
				onClose: function(content) {
					this.getOverlay().find("a.player").flowplayer(0).pause();
					this.getOverlay().find("a.player").flowplayer(0).unload();
				}
			});	
			// install player
			$("a.player").flowplayer("$wp_lightbox_library_url/js/flowplayer-3.2.7.swf", {
			
				clip: { 
					autoPlay:$wp_lightbox_flowplayer_autoplay_value, 
					scaling:'fit'					
				} 
			});	
		});
		/*]]>*/  
		</script>	
EOT;
	}

	echo $wp_lightbox_flowplayer_output;	
}

?>