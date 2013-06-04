<?php

/*----------------------------------------------------------------------------*/
/* Portfolio
/*----------------------------------------------------------------------------*/

add_action( 'init', 'wap8_portfolio', 10 );

/**
 * Portfolio
 *
 * Register wap8-portfolio as a custom post type upon activation.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.5 Remove menu icon
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio() {

	// declare $labels variable for storing labels array
	$labels = array(
		'name'               => _x( 'Portfolio', 'post type general name', 'wap8plugin-i18n' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'wap8plugin-i18n' ),
		'add_new'            => _x( 'Add New', 'wap8-portfolio', 'wap8plugin-i18n' ),
		'all_items'          => __( 'All Case Studies', 'wap8plugin-i18n' ),
		'add_new_item'       => __( 'Add New Case Study', 'wap8plugin-i18n' ),
		'edit'               => __( 'Edit', 'wap8plugin-i18n' ),
		'edit_item'          => __( 'Edit Case Study', 'wap8plugin-i18n' ),
		'new_item'           => __( 'New Case Study', 'wap8plugin-i18n' ),
		'view'               => __( 'View', 'wap8plugin-i18n' ),
		'view_item'          => __( 'View Case Study', 'wap8plugin-i18n' ),
		'search_items'       => __( 'Search Portfolio', 'wap8plugin-i18n' ),
		'not_found'          => __( 'No Case Studies found', 'wap8plugin-i18n' ),
		'not_found_in_trash' => __( 'No Case Studies found in Trash', 'wap8plugin-i18n' )
	);
	
	// declare $supports variable for storing supports array
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'revisions',
		'author'
	);
	
	// declare $args variable for storing args array
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio', 'with_front' => false ),
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'has_archive'        => true,
		'menu_position'      => 5,
		'supports'           => $supports
	);
	
	// register the post type
	register_post_type(
		'wap8-portfolio', // unique post type handle to avoid any potential conflicts
		$args             // array of arguments for this custom post type
	);

}

/*----------------------------------------------------------------------------*/
/* Portfolio Post Thumbnails
/*----------------------------------------------------------------------------*/

add_action( 'init', 'wap8_portfolio_post_thumbnails', 10 );

/**
 * Portfolio Post Thumbnails
 *
 * Add theme support for post-thumbnails, if the current theme does not already.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_post_thumbnails() {
	
	if ( !current_theme_supports( 'post-thumbnails' ) ) { // if the currently active theme does not support post-thumbnails
		
		add_theme_support( 'post-thumbnail', array( 'wap8-portfolio' ) ); // add theme support for post-thumbnails for the custom post type only
		
	}
	
}

/*----------------------------------------------------------------------------*/
/* Portfolio Plugin Activation
/*----------------------------------------------------------------------------*/

register_activation_hook( __FILE__, 'wap8_portfolio_plugin_activation', 10 );

/**
 * Portfolio Plugin Activation
 *
 * Flushing the permalinks upon plugin activation to avoid any potential 404 errors.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_plugin_activation() {
	global $wp_rewrite;
	$wp_rewrite -> flush_rules();
}

/*----------------------------------------------------------------------------*/
/* Portfolio Plugin Deactivation
/*----------------------------------------------------------------------------*/

register_deactivation_hook( __FILE__, 'wap8_portfolio_plugin_deactivation', 10 );

/**
 * Portfolio Plugin Deactivation
 *
 * Flushing the permalinks upon plugin deactivation to avoid any potential 404 errors.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_deactivation() {
	global $wp_rewrite;
	$wp_rewrite -> flush_rules();
}