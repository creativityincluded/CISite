<?php
/* Template Name: About Philosophy */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_about_philosophy_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_about_philosophy_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_about_philosophy_head_crumb');

function ci_about_philosophy_head_crumb() {
	echo '<h4 class="crumb-title-mult">';
	echo '<a class="parent-cat" title="About Us" href="http://www.creativityincluded.com/about-us/">About Us</a>';
	echo ' <b>&raquo; </b>';
	echo '<span class="current-page">Our Philosophy</span>';
	echo ' | ';
	echo '<a title="Our People" href="http://www.creativityincluded.com/about-us/our-people/">Our People</a>';
	echo ' | ';
	echo '<a title="Our Tools" href="http://www.creativityincluded.com/about-us/our-tools/">Our Tools</a>';	
	echo '</h4>';
}

/**
 * Add the Breadcrumb-style footer
 *
 */
add_action('genesis_after_content', 'ci_about_philosophy_foot_crumb');

function ci_about_philosophy_foot_crumb() {
	echo '<h4 class="crumb-title-bottom">';
	echo '<a class="parent-cat" title="About Us" href="http://www.creativityincluded.com/about-us/">About Us</a>';
	echo ' <b>&raquo;</b> ';
	echo '<span class="current-page">Our Philosophy</span>';
	echo ' | ';
	echo '<a title="Our People" href="http://www.creativityincluded.com/about-us/our-people/">Our People</a>';
	echo ' | ';
	echo '<a title="Our Tools" href="http://www.creativityincluded.com/about-us/our-tools/">Our Tools</a>';	
	echo '</h4>';
}

/**
 * Add widgets
 *
 */
 
add_action('genesis_after_post_content', 'ci_about_philosophy_widgets');

function ci_about_philosophy_widgets() {
	require(CHILD_DIR.'/lib/includes/about-philosophy-widgets.php');
}

add_action('genesis_after_content_sidebar_wrap', 'ci_about_philosophy_tips');

function ci_about_philosophy_tips() {
	if ( ! dynamic_sidebar( 'About Philosophy Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>