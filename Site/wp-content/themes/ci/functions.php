<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Creativity Included Custom Theme' );
define( 'CHILD_THEME_URL', 'http://creativityincluded.com' );
define( 'CHILD_THEME_VERSION', '1.0' );
define( 'CHILD_THEME_SLUG', 'ci' );

/** Add viewport meta tag for mobile browsers 
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}
*/

/** Register widget containers (include) */
require(CHILD_DIR.'/lib/includes/widgets.php');

/** Set up image sizes */
/** Uncomment this if you need to use a lot */
/** require(CHILD_DIR.'/lib/includes/image-sizes.php'); */
add_image_size( 'ci_widget', '180', '150', true);
add_image_size( 'ebook_main', '175', '240', true);
add_image_size( 'icon', '78', '78', false);

/** Add structural divs */
add_action( 'genesis_before_content_sidebar_wrap', 'ci_add_top_content_div' );
function ci_add_top_content_div() {
	echo '<div class="top-content-bg"></div>';
}

add_action( 'genesis_after_content_sidebar_wrap', 'ci_add_bottom_content_div' );
function ci_add_bottom_content_div() {
	echo '<div class="bottom-content-bg"></div>';
}

// Remove the breadcrumbs
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove page titles from all pages except blog page template.
add_action( 'get_header', 'ci_remove_page_titles' );

function ci_remove_page_titles() {
    if ( !is_page_template( 'page_blog.php' ) )
        remove_action( 'genesis_post_title', 'genesis_do_post_title' );
}

// Remove the edit link
add_filter( 'edit_post_link', '__return_false' );

// Add support for excerpts on pages
add_post_type_support('page', 'excerpt');

// Remove default sidebars
unregister_sidebar( 'sidebar' );
unregister_sidebar( 'sidebar-alt' );

// Unregister site layout
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

// Customize the post info function
add_filter( 'genesis_post_info', 'post_info_filter' );
function post_info_filter($post_info) {
if (!is_page()) {
    $post_info = 'Posted on [post_date] by [post_author]';
    return $post_info;
}}

// Genesis Alert
function genesis_alert_shortcode($atts, $content='') {
	if(!function_exists('genesis_alert_shortcode')) {
		require(CHILD_DIR.'/lib/shortcodes/genesis-alert.php');
	}
}
add_shortcode('genesis_alert', 'genesis_alert_shortcode');

// Remove the post meta function
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

// Customize the footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'ci_do_footer' );
function ci_do_footer() {
    ?>
    	<div class="subnav">
	<a href="http://www.creativityincluded.com/affiliate-program/">Affiliate Programs</a> | <a href="http://www.creativityincluded.com/disclosures/">Disclosures</a> | <a href="http://www.creativityincluded.com/terms-of-use/">Terms Of Use</a>
	</div>
	<div class="credits">&copy;2012 Creativity Included | Powered by <a href="http://wordpress.org/" target="_blank">WordPress</a> + <a href="http://www.creativityincluded.com/genesis-framework" target="_blank">Genesis</a> + <a href="http://www.creativityincluded.com/gravityforms" target="ejejcsingle">Gravity Forms</a> + <a href="http://www.creativityincluded.com/cart66pro" target="_blank">Cart66</a></div>
	<?php
}