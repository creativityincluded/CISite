<?php
function wp_lightbox_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$text,$class)
{
	$browser = new WP_LIGHTBOX_CHECK_BROWSER();
	$platform_name = $browser->getPlatform();
	$wp_lightbox_output = '';
	
	if($platform_name=="iPad" || $platform_name=="iPhone")
	{
		$wp_lightbox_output .= wp_lightbox_html5_anchor_text_protected_s3_video_display($name,$bucket,$poster,$width,$height,$text,$class);
	}
	else
	{
		$wp_lightbox_output .= wp_lightbox_flowplayer_anchor_text_protected_s3_video_display($name,$bucket,$width,$height,$text,$class);
	}

	return $wp_lightbox_output;
}

function wp_lightbox_protected_s3_video_display($name,$bucket,$poster,$width,$height,$source,$class)
{
	$browser = new WP_LIGHTBOX_CHECK_BROWSER();
	$platform_name = $browser->getPlatform();
	$wp_lightbox_output = '';
	
	if($platform_name=="iPad" || $platform_name=="iPhone")
	{
		$wp_lightbox_output .= wp_lightbox_html5_protected_s3_video_display($name,$bucket,$poster,$width,$height,$source,$class);
	}
	else
	{
		$wp_lightbox_output .= wp_lightbox_flowplayer_protected_s3_video_display($name,$bucket,$width,$height,$source,$class);
	}

	return $wp_lightbox_output;
}

function wp_lightbox_embed_protected_s3_video_display($name,$bucket,$poster,$width,$height,$class)
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

	$unique_video_overlay_id = wp_lightbox_generate_unique_id();
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
	
	$browser = new WP_LIGHTBOX_CHECK_BROWSER();
	$platform_name = $browser->getPlatform();
	$wp_lightbox_output = '';
	
	if($platform_name=="iPad" || $platform_name=="iPhone")
	{
		$wp_lightbox_output = wp_lightbox_embed_code_html5($link,$poster_url,$width,$height,$class);
	}
	else
	{
		$link = urlencode($link);
		$wp_lightbox_output = wp_lightbox_embed_code_flowplayer($link,$width,$height,$class);
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_anchor_text_mp4_video_display($link,$poster,$width,$height,$text,$class)
{
	$browser = new WP_LIGHTBOX_CHECK_BROWSER();
	$platform_name = $browser->getPlatform();
	$wp_lightbox_output = '';
	$anchor_type = "text";
	if($platform_name=="iPad" || $platform_name=="iPhone")
	{
		$wp_lightbox_output .= get_html5_video_embed_code($link,$poster,$width,$height,$text,$anchor_type,$class);
	}
	else
	{
		$wp_lightbox_output .= wp_lightbox_flowplayer_anchor_text_video_display($link,$width,$height,$text,$class);
	}

	return $wp_lightbox_output;	
}

function wp_lightbox_mp4_video_display($link,$poster,$width,$height,$source,$class)
{
	$browser = new WP_LIGHTBOX_CHECK_BROWSER();
	$platform_name = $browser->getPlatform();
	$wp_lightbox_output = '';
	$anchor_type = "image";
	if($platform_name=="iPad" || $platform_name=="iPhone")
	{
		$wp_lightbox_output .= get_html5_video_embed_code($link,$poster,$width,$height,$source,$anchor_type,$class);
	}
	else
	{
		$wp_lightbox_output .= wp_lightbox_flowplayer_video_display($link,$width,$height,$source,$class);
	}

	return $wp_lightbox_output;
}

function get_html5_video_embed_code($link,$poster,$width,$height,$anchor,$anchor_type,$class)
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
	
	if($anchor_type=="text")
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id">$anchor</a>
	  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
			<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
				<source src="$link" type="video/mp4" />  
			</video>
	  </div> 
	  </div> 
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="#$unique_player_id" class="wp_lightbox_html5_trigger" rel="#$unique_video_overlay_id"><img src="$anchor" alt="" /></a>
	  	<div id="$unique_video_overlay_id" class="lightbox_ultimate_fp_overlay" style="width:{$width}px;">
			<video id="$unique_player_id" width="$width" height="$height" $poster_url controls="control" preload="none"> 
				<source src="$link" type="video/mp4" />  
			</video>
	  </div> 
	  </div> 
EOT;
	}

	return $wp_lightbox_output;	
}

function wp_lightbox_anchor_text_secure_s3_file_download_display($name,$bucket,$text,$class)
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

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link">$text</a>
	</div>
EOT;
	
	return $wp_lightbox_output;	
}

function wp_lightbox_secure_s3_file_download_display($name,$bucket,$source,$class)
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

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
	<a href="$link"><img src="$source" alt="" /></a>
	</div>
EOT;
	
	return $wp_lightbox_output;
}

function wp_lightbox_ultimate_fancy_gallery_display($class,$content)
{
	$wp_lightbox_output = 
	'<div class="'.$class.'">'.do_shortcode($content).'</div><div class="lightbox_ultimate_clear_float"></div>';
	return $wp_lightbox_output;
}

?>
