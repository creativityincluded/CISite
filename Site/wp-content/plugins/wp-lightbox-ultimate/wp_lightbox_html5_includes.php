<?php

function wp_lightbox_anchor_text_html5_video_display($link,$poster,$width,$height,$text,$class)
{		
	global $wp_lightbox_config;
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	$unique_player_id = wp_lightbox_generate_unique_id();
	$poster_url = '';
	
	if(!empty($poster))
	{
		$poster_url = <<<EOT
		poster="$poster"
EOT;
	}
	
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	$flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id">$text</a>
  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
		<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
							<source src="$link" type="video/mp4" /> 
							<object width="$width" height="$height" type="application/x-shockwave-flash" data="$flash_player_url"> 
								<param name="movie" value="$flash_player_url" /> 
								<param name="flashvars" value="controls=true&amp;file=$link" /> 								 
							</object> 
		</video>
  </div>
  </div>
  
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_html5_video_display($link,$poster,$width,$height,$source,$class)
{
	global $wp_lightbox_config;
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	$unique_player_id = wp_lightbox_generate_unique_id();	
	$poster_url = '';
	
	if(!empty($poster))
	{
		$poster_url = <<<EOT
		poster="$poster"
EOT;
	}
	
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	$flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id"><img src="$source" alt="" /></a>
  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
		<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
							<source src="$link" type="video/mp4" /> 
							<object width="$width" height="$height" type="application/x-shockwave-flash" data="$flash_player_url"> 
								<param name="movie" value="$flash_player_url" /> 
								<param name="flashvars" value="controls=true&amp;file=$link" /> 								 
							</object> 
		</video>
  </div>
  </div>
  
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_html5_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$text,$class)
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
	
	$objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
	$link = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
	//$link = urlencode($link);
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	$unique_player_id = wp_lightbox_generate_unique_id();
	$poster_url = '';
	
	if(!empty($poster))
	{
		$poster_url = <<<EOT
		poster="$poster"
EOT;
	}

	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	$flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id">$text</a>
  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
		<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
							<source src="$link" type="video/mp4" /> 
							<object width="$width" height="$height" type="application/x-shockwave-flash" data="$flash_player_url"> 
								<param name="movie" value="$flash_player_url" /> 
								<param name="flashvars" value="controls=true&amp;file=$link" /> 								 
							</object> 
		</video>
  </div>
  </div>
  
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_html5_protected_s3_video_display($name,$bucket,$poster,$width,$height,$source,$class)
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
			
	$objS3 = new wp_lightbox_ultimate_amazon_s3("$access_key", "$secret_key");
	$link = $objS3->getAuthenticatedURL($bucket,$name,$link_duration);
	//$link = urlencode($link);
	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
	$unique_player_id = wp_lightbox_generate_unique_id();
	$poster_url = '';
	
	if(!empty($poster))
	{
		$poster_url = <<<EOT
		poster="$poster"
EOT;
	}

	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}
	$flash_player_url = WP_LIGHTBOX_LIB_URL.'/mediaelement/flashmediaelement.swf';
	
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id"><img src="$source" alt="" /></a>
  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
		<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
							<source src="$link" type="video/mp4" /> 
							<object width="$width" height="$height" type="application/x-shockwave-flash" data="$flash_player_url"> 
								<param name="movie" value="$flash_player_url" /> 
								<param name="flashvars" value="controls=true&amp;file=$link" /> 								 
							</object> 
		</video>
  </div>
  </div>
  
EOT;

	return $wp_lightbox_output;
}

function wp_lightbox_embed_code_html5($link,$poster_url="",$width,$height,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_html5_autoplay = $wp_lightbox_config->getValue('wp_lightbox_html5_autoplay');
	$autoplay = "";
	if(!empty($wp_lightbox_html5_autoplay))
	{
	    $autoplay = 'autoplay="autoplay"';
	}
	$unique_player_id = wp_lightbox_generate_unique_id();
	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor $class">
	<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" $autoplay preload="none"> 
		<source src="$link" type="video/mp4" /> 
	</video>
	</div>
EOT;
	return $wp_lightbox_output;
}

function wp_lightbox_load_html5_js()
{
	global $wp_lightbox_config;
	$wp_lightbox_html5_autoplay = $wp_lightbox_config->getValue('wp_lightbox_html5_autoplay');
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
	$autoplay_code = "";
	if(!empty($wp_lightbox_html5_autoplay)) 
	{
		$autoplay_code = <<<EOT
		var wrapped_video_id = this.getTrigger().attr("href");
		var video_id = wrapped_video_id.replace("#", "");				
		var element = document.getElementById(video_id);
		element.player.play();
EOT;

	}
	
	$wp_lightbox_html5_output = <<<EOT
	<script type="text/javascript"> 
	/* <![CDATA[ */
	jQuery(document).ready(function($){
  	
		// setup mediaelementplayer
		$('video').mediaelementplayer(/* Options */);
		
		// setup overlay actions to a href
		$(".wp_lightbox_html5_trigger").overlay({		
			expose: '#789',
			$position				
			onLoad: function(content) {
				$autoplay_code
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
	echo $wp_lightbox_html5_output;
	
}

?>