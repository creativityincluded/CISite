<?php
/* Template Name: Affiliates */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_aff_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_aff_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_aff_crumb');

function ci_aff_crumb() {
	echo '<h4 class="crumb-title">';
	echo 'Affiliate Program';	
	echo '</h4>';
}

/**
 * Add widgets
 *
 */

add_action('genesis_after_content_sidebar_wrap', 'ci_aff_tips');

function ci_aff_tips() {
	if ( ! dynamic_sidebar( 'Affiliate Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>