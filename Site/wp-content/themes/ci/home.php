<?php
/**
 * Only set up home areas if the widgets are populated
 *
 */

add_action('genesis_meta', 'ci_home_setup');
function ci_home_setup() {

	// Home Content
	if ( is_active_sidebar( 'home-content') ){
		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'ci_home_loop' );
	}

}

/**
 * Replace standard loop with Home Content widget area
 *
 */
function ci_home_loop() {
	echo '<div class="home-content">';
	dynamic_sidebar( 'home-content' );
	echo '</div>';
}

genesis();
?>