<?php
function wp_lightbox_admin_submenu_css()
{
	?>
	<style type="text/css">
	.WpLightboxSubMenu{
	list-style:none;
	margin:0 0 5px 0;
	padding:0;
	height:2em;
	font-size:14px;
	clear:both;
	background:#ECECEC none repeat scroll 0 0;
	}

	.WpLightboxSubMenu li{
	float:left;
	padding:0;
	margin:0;
	}

	.WpLightboxSubMenu li a{
	display:block;
	float:left;
	margin:0 0 0 12px;
	padding:0 5px;
	text-decoration:none;
	line-height:200%;
	}
	.WpLightboxSubMenu li.current{
     border-top:2px solid #ECECEC;
     background:#F9F9F9;
	}
	</style>
	<?php
}
?>