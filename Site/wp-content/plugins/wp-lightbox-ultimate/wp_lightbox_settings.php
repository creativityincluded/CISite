<?php
include_once('admin_includes.php');

function wp_lightbox_plugin_options() 
{
  echo '<div class="wrap">';    
  echo '<div id="poststuff"><div id="post-body">';  
   
  echo wp_lightbox_admin_submenu_css();
  
   ?>
   <ul class=WpLightboxSubMenu>
   <li><a href="admin.php?page=wp-lightbox-ultimate">General Settings</a></li>
   <li><a href="admin.php?page=wp-lightbox-ultimate&action=library">Library Settings</a></li>
   </ul>
   <?php

   switch ($_GET['action'])
   {
       case 'library':
           wp_lightbox_add_library_menu();
           break;
       default:
           wp_lightbox_add_general_settings_menu();
           break;
   }
  
  echo '</div></div>';
  echo '</div>';

}

function wp_lightbox_add_general_settings_menu()
{
	global $wp_lightbox_config;
	if (isset($_POST['wp_lightbox_general_settings_update']))
	{
		$wp_lightbox_config->setValue('wp_lightbox_width',(string)$_POST["wp_lightbox_width"]);
		$wp_lightbox_config->setValue('wp_lightbox_height',(string)$_POST["wp_lightbox_height"]);
		
		$wp_lightbox_config->setValue('wp_lightbox_amazon_s3_access_key',trim($_POST["wp_lightbox_amazon_s3_access_key"]));
		$wp_lightbox_config->setValue('wp_lightbox_amazon_s3_secret_key',trim($_POST["wp_lightbox_amazon_s3_secret_key"]));
		$wp_lightbox_config->setValue('wp_lightbox_amazon_s3_link_duration',trim($_POST["wp_lightbox_amazon_s3_link_duration"]));		

        echo '<div id="message" class="updated fade"><p>';                
        echo '<strong>Options Updated!';        
        echo '</strong></p></div>';  
        $wp_lightbox_config->saveConfig();     		
	}
	?>
	<div class="wrap">	
	<br />
	<h3>WP Lightbox - General Settings v<?php echo WP_LIGHTBOX_VERSION; ?></h3>	
	<br />
	
	<div id="poststuff">
	<div id="post-body">
	
	<div class="postbox">
	<h3><label for="title">Quick Usage Guide</label></h3>
	<div class="inside">

	<p>1. Please use the appropriate shortcode to display your media with lightbox effect. All the shortcodes can be found on the <a href="http://www.tipsandtricks-hq.com/?p=3163#lightbox_ultimate_usage" target="_blank">plugin usage area</a>.</p>
    <p>2. You can customize the settings to change the way your media pops up. Please go through the settings tabs and configure your settings.</p>
    <p><strong>Note:</strong> If you are having any issues with this plugin please post it on our customer only support forum with the following two details:
    <br />a) URL of the page where you are using the shortcode.
    <br />b) The exact shortcode that you are using on that page.
    </p>
	
    </div></div>
		
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">    

    <div class="postbox">
    <h3><label for="title">General Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
	    Width
	    </td><td align="left">
	    <input name="wp_lightbox_width" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_width'); ?>"/>
	    <br /><i>This is the width of the pop over video.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    height
	    </td><td align="left">
	    <input name="wp_lightbox_height" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_height'); ?>"/>
	    <br /><i>This is the height of the pop over video.</i><br /><br />
	    </td></tr>
	             	          
		</table>	    
	</div></div>
	
	<div class="postbox">
    <h3><label for="title">Amazon Web Services(AWS) Simple Storage Service (S3) Related Settings</label></h3>
	<div class="inside">
	
	<strong><i>You only need to use this section if you are trying to embed the private/protected videos stored on your Amazon S3 account.</i></strong>
	<br /><br />
	
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
	    AWS Access Key ID
	    </td><td align="left">
	    <input name="wp_lightbox_amazon_s3_access_key" type="text" size="60" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_access_key'); ?>"/>
	    <br /><i>Your 20 character AWS Access Key ID.</i><br /><br />
	    </td></tr>
	    
	   	<tr valign="top"><td width="25%" align="left">
	    AWS Secret Access Key
	    </td><td align="left">
	    <input name="wp_lightbox_amazon_s3_secret_key" type="text" size="80" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_secret_key'); ?>"/>
	    <br /><i>Your 40 character AWS Secret Access Key.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    AWS S3 Video URL Expiry Time After Page Load
	    </td><td align="left">
	    <input name="wp_lightbox_amazon_s3_link_duration" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_amazon_s3_link_duration'); ?>"/>
	    <br /><i>Number of seconds before the protected video URL expires after a page loads (example value: 300). The protected embedded video is available for access for this specified amount of time after the page loads.</i><br /><br />
	    </td></tr>
	    
	 	</table>    
	</div></div>
		
    <div class="submit">
    <input type="submit" name="wp_lightbox_general_settings_update" value="<?php _e('Update options'); ?> &raquo;" />	    
    </div>		
	</form>
	
	</div></div>
	</div>	
	<?php 
}

function wp_lightbox_add_library_menu()
{
	global $wp_lightbox_config;
	if (isset($_POST['wp_lightbox_library_settings_update']))
	{
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_checkbox',($_POST["wp_lightbox_prettyPhoto_checkbox"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_animation_speed',(string)$_POST["wp_lightbox_prettyPhoto_animation_speed"]);
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_opacity',trim($_POST["wp_lightbox_prettyPhoto_opacity"]));
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_show_title',($_POST["wp_lightbox_prettyPhoto_show_title"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_theme',(string)$_POST["wp_lightbox_prettyPhoto_theme"]);
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_autoplay',($_POST["wp_lightbox_prettyPhoto_autoplay"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_modal',($_POST["wp_lightbox_prettyPhoto_modal"]=='1')?1:'');
		
		$wp_lightbox_config->setValue('wp_lightbox_fancybox_checkbox',($_POST["wp_lightbox_fancybox_checkbox"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_fancybox_overlayopacity',trim($_POST["wp_lightbox_fancybox_overlayopacity"]));
		$wp_lightbox_config->setValue('wp_lightbox_fancybox_show_title',($_POST["wp_lightbox_fancybox_show_title"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_fancybox_titlePosition',(string)$_POST["wp_lightbox_fancybox_titlePosition"]);
		$wp_lightbox_config->setValue('wp_lightbox_fancybox_showCloseButton',($_POST["wp_lightbox_fancybox_showCloseButton"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_fancybox_transition_type',(string)$_POST["wp_lightbox_fancybox_transition_type"]);
		
		$wp_lightbox_config->setValue('wp_lightbox_colorbox_checkbox',($_POST["wp_lightbox_colorbox_checkbox"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_colorbox_transition_type',(string)$_POST["wp_lightbox_colorbox_transition_type"]);
		$wp_lightbox_config->setValue('wp_lightbox_colorbox_opacity',trim($_POST["wp_lightbox_colorbox_opacity"]));
		$wp_lightbox_config->setValue('wp_lightbox_colorbox_overlayclose',($_POST["wp_lightbox_colorbox_overlayclose"]=='1')?1:'');		
		
		$wp_lightbox_config->setValue('wp_lightbox_special_checkbox',($_POST["wp_lightbox_special_checkbox"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_special_autoplay',($_POST["wp_lightbox_special_autoplay"]=='1')?1:'');
		
		$wp_lightbox_config->setValue('wp_lightbox_flowplayer_checkbox',($_POST["wp_lightbox_flowplayer_checkbox"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_flowplayer_autoplay',($_POST["wp_lightbox_flowplayer_autoplay"]=='1')?1:'');
		
		$wp_lightbox_config->setValue('wp_lightbox_html5_checkbox',($_POST["wp_lightbox_html5_checkbox"]=='1')?1:'');
		$wp_lightbox_config->setValue('wp_lightbox_html5_autoplay',($_POST["wp_lightbox_html5_autoplay"]=='1')?1:'');
		
		$wp_lightbox_config->setValue('wp_lightbox_html_overlay_display_checkbox',($_POST["wp_lightbox_html_overlay_display_checkbox"]=='1')?1:'');
		if($_POST["wp_lightbox_html_overlay_display_checkbox"]=='1')
		{
			$wp_lightbox_config->setValue('wp_lightbox_prettyPhoto_checkbox',1);
		}

        echo '<div id="message" class="updated fade"><p>';                
        echo '<strong>Options Updated!';        
        echo '</strong></p></div>';  
        $wp_lightbox_config->saveConfig();     		
	}
	?>
	<div class="wrap">
	<br />
	<h3>WP Lightbox - Library Settings v<?php echo WP_LIGHTBOX_VERSION; ?></h3>	
	<br />
	
	<div id="poststuff">
	<div id="post-body">
		
	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">    

    <div class="postbox">
    <h3><label for="title">PrettyPhoto Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable PrettyPhoto
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use prettyPhoto lightbox effect</i><br /><br />
	    </td></tr>
		    
	    <tr valign="top"><td width="25%" align="left">
	    Animation speed
	    </td><td align="left">
	    <?php $wp_lightbox_animation_speed_temp = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_animation_speed');?>
    	<select name="wp_lightbox_prettyPhoto_animation_speed" >
    		<option <?php echo ($wp_lightbox_animation_speed_temp==='fast')?'selected="selected"':'';?> value="fast">Fast</option>
    		<option <?php echo ($wp_lightbox_animation_speed_temp==='slow')?'selected="selected"':'';?> value="slow">Slow</option>
    		<option <?php echo ($wp_lightbox_animation_speed_temp==='normal')?'selected="selected"':'';?> value="normal">Normal</option>
    	</select>
	    <br /><i>Animation speed of the popover window.</i><br /><br />
	    </td></tr> 
	    
	    <tr valign="top"><td width="25%" align="left">
	    Opacity
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_opacity" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_opacity'); ?>"/>
	    <br /><i>This is the opacity of the popover window. Enter a value between 0 and 1.</i><br /><br />
	    </td></tr>
    
	    <tr valign="top"><td width="25%" align="left">
	    Show Title
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_show_title" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_show_title')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to show the title</i><br /><br />
	    </td></tr> 
	    
	    <tr valign="top"><td width="25%" align="left">
	    Theme
	    </td><td align="left">
	    <?php $wp_lightbox_theme_temp = $wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_theme');?>
    	<select name="wp_lightbox_prettyPhoto_theme" >
    		<option <?php echo ($wp_lightbox_theme_temp==='pp_default')?'selected="selected"':'';?> value="pp_default">PrettyPhoto default</option>
    		<option <?php echo ($wp_lightbox_theme_temp==='light_rounded')?'selected="selected"':'';?> value="light_rounded">Light Rounded</option>
    		<option <?php echo ($wp_lightbox_theme_temp==='dark_rounded')?'selected="selected"':'';?> value="dark_rounded">Dark Rounded</option>
    		<option <?php echo ($wp_lightbox_theme_temp==='light_square')?'selected="selected"':'';?> value="light_square">Light Square</option>
    		<option <?php echo ($wp_lightbox_theme_temp==='dark_square')?'selected="selected"':'';?> value="dark_square">Dark Square</option>
    		<option <?php echo ($wp_lightbox_theme_temp==='facebook')?'selected="selected"':'';?> value="facebook">Facebook</option>
    	</select>
	    <br /><i>Select the theme you want to use</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_autoplay" type="checkbox" <?php if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_autoplay')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start the videos on overlay</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Modal
	    </td><td align="left">
	    <input name="wp_lightbox_prettyPhoto_modal" type="checkbox" <?php if($wp_lightbox_config->getValue('wp_lightbox_prettyPhoto_modal')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked only the close button will close the popover window</i><br /><br />
	    </td></tr>
	           	          
		</table>	    
	</div></div>
	
	 <div class="postbox">
    <h3><label for="title">Fancybox Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable Fancybox
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_fancybox_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use fancybox lightbox effect</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Overlay Opacity
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_overlayopacity" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_fancybox_overlayopacity'); ?>"/>
	    <br /><i>This is the opacity of the overlay. Enter a value between 0 and 1.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Show Title
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_show_title" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_fancybox_show_title')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to show the title</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Title Position
	    </td><td align="left">
	    <?php $wp_lightbox_fancybox_titlePosition = $wp_lightbox_config->getValue('wp_lightbox_fancybox_titlePosition');?>
    	<select name="wp_lightbox_fancybox_titlePosition" >
    		<option <?php echo ($wp_lightbox_fancybox_titlePosition==='outside')?'selected="selected"':'';?> value="outside">Outside</option>
    		<option <?php echo ($wp_lightbox_fancybox_titlePosition==='inside')?'selected="selected"':'';?> value="inside">Inside</option>
    		<option <?php echo ($wp_lightbox_fancybox_titlePosition==='over')?'selected="selected"':'';?> value="over">Over</option>
    	</select>
	    <br /><i>Select the position of the title. Can be set to 'outside', 'inside' or 'over'.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Show Close Button
	    </td><td align="left">
	    <input name="wp_lightbox_fancybox_showCloseButton" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_fancybox_showCloseButton')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to show close button</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Transition Type
	    </td><td align="left">
	    <?php $wp_lightbox_fancybox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_fancybox_transition_type');?>
    	<select name="wp_lightbox_fancybox_transition_type" >
    		<option <?php echo ($wp_lightbox_fancybox_transition_type==='elastic')?'selected="selected"':'';?> value="elastic">Elastic</option>
    		<option <?php echo ($wp_lightbox_fancybox_transition_type==='fade')?'selected="selected"':'';?> value="fade">Fade</option>
    		<option <?php echo ($wp_lightbox_fancybox_transition_type==='none')?'selected="selected"':'';?> value="none">None</option>
    	</select>
	    <br /><i>Select transition type. Can be set to 'elastic', 'fade' or 'none'.</i><br /><br />
	    </td></tr>
	             	          
		</table>	    
	</div></div>
	
	<div class="postbox">
    <h3><label for="title">ColorBox Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable Colorbox
	    </td><td align="left">
	    <input name="wp_lightbox_colorbox_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_colorbox_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use ColorBox lightbox effect</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
	    Transition Type
	    </td><td align="left">
	    <?php $wp_lightbox_colorbox_transition_type = $wp_lightbox_config->getValue('wp_lightbox_colorbox_transition_type');?>
    	<select name="wp_lightbox_colorbox_transition_type" >
    		<option <?php echo ($wp_lightbox_colorbox_transition_type==='elastic')?'selected="selected"':'';?> value="elastic">Elastic</option>
    		<option <?php echo ($wp_lightbox_colorbox_transition_type==='fade')?'selected="selected"':'';?> value="fade">Fade</option>
    		<option <?php echo ($wp_lightbox_colorbox_transition_type==='none')?'selected="selected"':'';?> value="none">None</option>
    	</select>
	    <br /><i>Select the transition type of the popover window.</i><br /><br />
	    </td></tr>
	    
	   	<tr valign="top"><td width="25%" align="left">
	    Opacity
	    </td><td align="left">
	    <input name="wp_lightbox_colorbox_opacity" type="text" size="10" value="<?php echo $wp_lightbox_config->getValue('wp_lightbox_colorbox_opacity'); ?>"/>
	    <br /><i>This is the opacity of the overlay. Enter a value between 0 and 1.</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Close Overlay
	    </td><td align="left">
	    <input name="wp_lightbox_colorbox_overlayclose" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_colorbox_overlayclose')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Once checked only the close button will close the overlay</i><br /><br />
	    </td></tr>
	             	          
		</table>	    
	</div></div>
	
	<div class="postbox">
    <h3><label for="title">WP Lightbox Special Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable WP Lightbox Special
	    </td><td align="left">
	    <input name="wp_lightbox_special_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_special_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use WP Lightbox Special</i><br /><br />
	    </td></tr>
	    
	 	<tr valign="top"><td width="25%" align="left">
	    Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_special_autoplay" type="checkbox" <?php if($wp_lightbox_config->getValue('wp_lightbox_special_autoplay')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start the videos on overlay</i><br /><br />
	    </td></tr>
	    
	 	</table>    
	</div></div>
	
	<div class="postbox">
    <h3><label for="title">Flowplayer Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable Flowplayer
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use overlay display with Flowplayer</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_flowplayer_autoplay" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_flowplayer_autoplay')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start the videos on overlay</i><br /><br />
	    </td></tr>
	    	    
	 	</table>    
	</div></div>
	
	<div class="postbox">
    <h3><label for="title">HTML5 Settings</label></h3>
	<div class="inside">
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable HTML5
	    </td><td align="left">
	    <input name="wp_lightbox_html5_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_html5_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to use overlay display with HTML5</i><br /><br />
	    </td></tr>
	    
	    <tr valign="top"><td width="25%" align="left">
		Autoplay
	    </td><td align="left">
	    <input name="wp_lightbox_html5_autoplay" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_html5_autoplay')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to automatically start the videos on overlay</i><br /><br />
	    </td></tr>
	    	    
	 	</table>    
	</div></div>
	
	<div class="postbox">
    <h3><label for="title">HTML Overlay Related Settings</label></h3>
	<div class="inside">
		<br /><strong>Enabling this option will also Enable the prettyPhoto library (that library is also needed for this functionality)</strong>
		<br /><br />
		
		<table width="100%" border="0" cellspacing="0" cellpadding="6">
		
		<tr valign="top"><td width="25%" align="left">
		Enable HTML Overlay
	    </td><td align="left">
	    <input name="wp_lightbox_html_overlay_display_checkbox" type="checkbox"  <?php if($wp_lightbox_config->getValue('wp_lightbox_html_overlay_display_checkbox')!='') echo ' checked="checked"';?> value="1"/>
	    <br /><i>Check this box if you want to display HTML content in overlay</i><br /><br />
	    </td></tr>
	    	    	    
	 	</table>    
	</div></div>	
	
    <div class="submit">
    <input type="submit" name="wp_lightbox_library_settings_update" value="<?php _e('Update options'); ?> &raquo;" />	    
    </div>		
	</form>
	
	</div></div>
	</div>	
	<?php
}

?>