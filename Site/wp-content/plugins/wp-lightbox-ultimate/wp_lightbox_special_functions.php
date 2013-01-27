<?php

function wp_lightbox_special_anchor_text_flv_video_display($link,$width,$height,$title,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[flash $wp_lightbox_width $wp_lightbox_height]" title="$title">$text</a>
		</div>	
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[flash $width $height]" title="$title">$text</a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_anchor_text_pdf_display($link,$width,$height,$title,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[flash $wp_lightbox_width $wp_lightbox_height]" title="$title">$text</a>
		</div>	
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[flash $width $height]" title="$title">$text</a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_anchor_text_mp4_video_display($link,$width,$height,$title,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[flash $wp_lightbox_width $wp_lightbox_height]" title="$title">$text</a>
		</div>
EOT;
		
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[flash $width $height]" title="$title">$text</a>
		</div>
EOT;
	}
	return $wp_lightbox_output;
	
}

function wp_lightbox_special_anchor_text_mov_video_display($link,$width,$height,$title,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[quicktime $wp_lightbox_width $wp_lightbox_height]" title="$title">$text</a>
		</div>
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[quicktime $width $height]" title="$title">$text</a>
		</div>	
EOT;
	}
	return $wp_lightbox_output;	
}

function wp_lightbox_special_anchor_text_mp3_display($link,$width,$height,$title,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[audio $wp_lightbox_width% $wp_lightbox_height]" title="$title">$text</a>
		</div>
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[audio $width% $height]" title="$title">$text</a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_anchor_text_viddler_video_display($link,$width,$height,$title,$text,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[social $wp_lightbox_width $wp_lightbox_height]" title="$title">$text</a>
		</div>
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
		<a href="$link" rel="lightbox[social $width $height]" title="$title">$text</a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_flv_video_display($link,$width,$height,$source,$title,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[flash $wp_lightbox_width $wp_lightbox_height]" title="$title"><img src="$source" alt="" /></a>
		</div>	
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[flash $width $height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_pdf_display($link,$width,$height,$source,$title,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[flash $wp_lightbox_width $wp_lightbox_height]" title="$title"><img src="$source" alt="" /></a>
		</div>	
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[flash $width $height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_mp4_video_display($link,$width,$height,$source,$title,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[flash $wp_lightbox_width $wp_lightbox_height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
		
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[flash $width $height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	return $wp_lightbox_output;
}

function wp_lightbox_special_mov_video_display($link,$width,$height,$source,$title,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[quicktime $wp_lightbox_width $wp_lightbox_height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[quicktime $width $height]" title="$title"><img src="$source" alt="" /></a>
		</div>	
EOT;
	}
	return $wp_lightbox_output;
}

function wp_lightbox_special_mp3_display($link,$width,$height,$source,$title,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[audio $wp_lightbox_width% $wp_lightbox_height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[audio $width% $height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_viddler_video_display($link,$width,$height,$source,$title,$class)
{
	global $wp_lightbox_config;
	$wp_lightbox_width = $wp_lightbox_config->getValue('wp_lightbox_width');
	$wp_lightbox_height = $wp_lightbox_config->getValue('wp_lightbox_height');
	if(empty($width)&&empty($height))
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[social $wp_lightbox_width $wp_lightbox_height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	else
	{
		$wp_lightbox_output = <<<EOT
		<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor $class">
		<a href="$link" rel="lightbox[social $width $height]" title="$title"><img src="$source" alt="" /></a>
		</div>
EOT;
	}
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_anchor_text_external_page_display($link,$width,$height,$text,$title,$class)
{
	global $wp_lightbox_config;
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_text_anchor $class">
	<a href="$link" rel="lightbox[external $width $height]" title="$title">$text</a>
	</div>
EOT;
	
	return $wp_lightbox_output;
}

function wp_lightbox_special_external_page_display($link,$width,$height,$source,$title)
{
	global $wp_lightbox_config;
	if(empty($width) || empty($height))
	{
		$width = $wp_lightbox_config->getValue('wp_lightbox_width');
		$height = $wp_lightbox_config->getValue('wp_lightbox_height');	
	}

	$wp_lightbox_output = <<<EOT
	<div class="lightbox_ultimate_anchor lightbox_ultimate_image_anchor">
	<a href="$link" rel="lightbox[external $width $height]" title="$title"><img src="$source" alt="" /></a>
	</div>
EOT;
	
	return $wp_lightbox_output;
}

?>