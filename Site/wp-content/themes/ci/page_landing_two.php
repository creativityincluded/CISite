<?php
/**
 * This file adds the Landing template to the Creativity Included Child Theme.
 *
 * @author Creativity Included
 * @package CI Custoim Theme
 * @subpackage Customizations
 */

/*
Template Name: Landing
*/

// Add custom body class to the head
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {
   $classes[] = 'ci-landing';
   return $classes;
}

// Remove header, navigation, top search. breadcrumbs, footer widgets, footer and disclaimer
genesis();