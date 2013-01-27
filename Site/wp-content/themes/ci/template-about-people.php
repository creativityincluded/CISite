<?php
/* Template Name: About People */

add_filter( 'genesis_pre_get_option_site_layout', 'ci_about_people_page_layout' );

/**
 * Filter the layout option to force full width.
 *
 */
function ci_about_people_page_layout( $opt ) {
	return 'full-width-content';
}

/**
 * Add the Breadcrumb-style header
 *
 */
add_action('genesis_before_content', 'ci_about_people_head_crumb');

function ci_about_people_head_crumb() {
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
 * Add the Breadcrumb-style footer
 *
 */
add_action('genesis_after_content', 'ci_about_people_foot_crumb');

function ci_about_people_foot_crumb() {
	echo '<h4 class="crumb-title-bottom">';
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
 * Add CTA button
 *
 */
 
add_action('genesis_after_post_content', 'ci_cta_ct');

function ci_cta_ct() {
	echo '<div class="slide-button-container">';
	echo '<a href="http://www.creativityincluded.com/about-us/our-people/creative-team-app/">';
	echo '<div id="slide-button">';
     	echo '<div class="button-pointer">';
      	echo '</div>';
     echo '<div class="button-base">Woo! I want to play!</div> ';   
	echo '</div>';
	echo '</a>';
	echo '</div>';
}

/**
 * Add widgets
 *
 */

add_action('genesis_after_content_sidebar_wrap', 'ci_about_people_tips');

function ci_about_people_tips() {
	if ( ! dynamic_sidebar( 'About People Tip' ) ) {
	echo '<div class="widget">';
	echo '</div><!-- end .widget -->';
	}
}

genesis();
?>