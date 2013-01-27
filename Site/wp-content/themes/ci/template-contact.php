<?php
/* Template Name: Contact */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_contact_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_contact_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_about_form_crumb');

function ci_about_form_crumb() {
	echo '<h4 class="crumb-title">';
	echo 'Contact Us';	
	echo '</h4>';
}

/**
 * Add widgets
 *
 */

add_action('genesis_after_content_sidebar_wrap', 'ci_contact_tips');

function ci_contact_tips() {
	if ( ! dynamic_sidebar( 'Contact Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>