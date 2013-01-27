<?php
/* Template Name: About Form */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_about_form_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_about_form_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_about_form_crumb');

function ci_about_form_crumb() {
	echo '<h4 class="crumb-title-mult">';
	echo '<a class="parent-cat" title="About Us" href="http://www.creativityincluded.com/about-us/">About Us</a>';
	echo ' <b>&raquo;</b> ';
	echo '<a title="Our Philosophy" href="http://www.creativityincluded.com/about-us/our-philosophy/">Our Philosophy</a>';
	echo ' | ';
	echo '<span class="current-page">Our People</span>';
	echo ' | ';
	echo '<a title="Our Tools" href="http://www.creativityincluded.com/about-us/our-tools/">Our Tools</a>';	
	echo '</h4>';
}

/**
 * Add widgets
 *
 */

add_action('genesis_after_content_sidebar_wrap', 'ci_about_form_tips');

function ci_about_form_tips() {
	if ( ! dynamic_sidebar( 'About Form Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}


genesis();
?>