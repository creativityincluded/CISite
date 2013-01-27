<?php
/* Template Name: About Tools */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_about_tools_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_about_tools_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_about_tools_head_crumb');

function ci_about_tools_head_crumb() {
	echo '<h4 class="crumb-title-mult">';
	echo '<a class="parent-cat" title="About Us" href="http://www.creativityincluded.com/about-us/">About Us</a>';
	echo ' <b>&raquo;</b> ';
	echo '<a title="Our Philosophy" href="http://www.creativityincluded.com/about-us/our-people/">Our Philosophy</a>';
	echo ' | ';
	echo '<a title="Our People" href="http://www.creativityincluded.com/about-us/our-people/">Our People</a>';
	echo ' | ';
	echo '<span class="current-page">Our Tools</span>';	
	echo '</h4>';	
}

/**
 * Add the Breadcrumb-style footer
 *
 */
add_action('genesis_after_content', 'ci_about_tools_foot_crumb');

function ci_about_tools_foot_crumb() {
	echo '<h4 class="crumb-title-bottom">';
	echo '<a class="parent-cat" title="About Us" href="http://www.creativityincluded.com/about-us/">About Us</a>';
	echo ' <b>&raquo;</b> ';
	echo '<a title="Our Philosophy" href="http://www.creativityincluded.com/about-us/our-people/">Our Philosophy</a>';
	echo ' | ';
	echo '<a title="Our People" href="http://www.creativityincluded.com/about-us/our-people/">Our People</a>';
	echo ' | ';
	echo '<span class="current-page">Our Tools</span>';	
	echo '</h4>';	
}

/**
 * Add widgets
 *
 */
 
add_action('genesis_after_post_content', 'ci_about_tools_widgets');

function ci_about_tools_widgets() {
	require(CHILD_DIR.'/lib/includes/about-tools-widgets.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_about_tools_tips');

function ci_about_tools_tips() {
	if ( ! dynamic_sidebar( 'About Tools Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}
 


genesis();
?>