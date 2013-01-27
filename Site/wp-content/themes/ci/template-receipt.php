<?php
/* Template Name: Receipt */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_receipt_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_receipt_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_receipt_crumb');

function ci_receipt_crumb() {
	echo '<h4 class="crumb-title-mult">';
	echo '<span class="current-page">Receipt</span>';
	echo '</h4>';
}

/**
 * Add widgets
 *
 */

add_action('genesis_after_content_sidebar_wrap', 'ci_receipt_tips');

function ci_receipt_tips() {
	if ( ! dynamic_sidebar( 'Cart Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}


genesis();
?>