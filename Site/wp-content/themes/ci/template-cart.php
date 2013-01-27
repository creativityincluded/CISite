<?php
/* Template Name: Cart */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_cart_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_cart_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_cart_crumb');

function ci_cart_crumb() {
	echo '<h4 class="crumb-title">';
	echo '<span class="current-page">Shopping Cart</span>';
	echo '</h4>';
}

/**
 * Add widgets
 *
 */

add_action('genesis_after_content_sidebar_wrap', 'ci_cart_tips');

function ci_cart_tips() {
	if ( ! dynamic_sidebar( 'Cart Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}


genesis();
?>