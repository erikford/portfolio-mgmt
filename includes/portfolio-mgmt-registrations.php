<?php

/*----------------------------------------------------------------------------*/
/* Actions & Hooks
/*----------------------------------------------------------------------------*/

register_activation_hook( __FILE__, 'wap8_portfolio_mgmt_activation', 10 );
add_action( 'init', 'wap8_portfolio_services', 10 );
add_action( 'init', 'wap8_portfolio_tags', 10 );
add_action( 'init', 'wap8_portfolio', 10 );

/*----------------------------------------------------------------------------*/
/* Portfolio Services
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Services
 *
 * Register wap8-services as a hierarchical custom taxonomy for wap8-portfolio.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.8 Allow $args to be filtered by theme or plugin
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_services() {
	
	$labels = array(
		'name'                       => _x( 'Services', 'taxonomy general name', 'wap8plugin-i18n' ),
		'singular_name'              => _x( 'Service', 'taxonomy singular name', 'wap8plugin-i18n' ),
		'search_items'               => __( 'Search Services', 'wap8plugin-i18n' ),
		'popular_items'              => __( 'Popular Services', 'wap8plugin-i18n' ),
		'all_items'                  => __( 'All Services', 'wap8plugin-i18n' ),
		'view_item'                  => __( 'View Service', 'wap8plugin-i18n' ),
		'parent_item'                => __( 'Parent Service', 'wap8plugin-i18n' ),
		'parent_item_colon'          => __( 'Parent Service:', 'wap8plugin-i18n' ),
		'edit_item'                  => __( 'Edit Service', 'wap8plugin-i18n' ),
		'update_item'                => __( 'Update Service', 'wap8plugin-i18n' ),
		'add_new_item'               => __( 'Add New Service', 'wap8plugin-i18n' ),
		'new_item_name'              => __( 'New Service', 'wap8plugin-i18n' ),
		'separate_items_with_commas' => __( 'Separate Services with commas', 'wap8plugin-i18n' ),
		'add_or_remove_items'        => __( 'Add or remove Services', 'wap8plugin-i18n' ),
		'choose_from_most_used'      => __( 'Choose from Most Used Services', 'wap8plugin-i18n' ),
		'not_found'                  => __( 'No Services found.', 'wap8theme-i18n' )
	);
	
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'args'              => array(
			'orderby' => 'term_order'
			),
		'rewrite'           => array(
			'slug'       => 'portfolio/services',
			'with_front' => false ),
		'query_var'         => true
	);
	
	$args = apply_filters( 'portfolio_mgmt_services_args', $args );
	
	// register services as a custom taxonomy
	register_taxonomy(
		'wap8-services',  // unique handle to avoid potential conflicts
		'wap8-portfolio', // this custom taxonomy should only be associated with our custom post type registered in wap8-portfolio-registration.php
		$args             // array of arguments for this custom taxonomy
	);
	
}

/*----------------------------------------------------------------------------*/
/* Portfolio Tags
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Tags
 *
 * Register wap8-portfolio-tags as a hierarchical custom taxonomy for wap8-portfolio.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.8 Allow $args to be filtered by theme or plugin
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_tags() {
	
	$labels = array(
		'name'                       => _x( 'Portfolio Tags', 'taxonomy general name', 'wap8plugin-i18n' ),
		'singular_name'              => _x( 'Portfolio Tag', 'taxonomy singular name', 'wap8plugin-i18n'),
		'search_items'               => __( 'Search Portfolio Tags', 'wap8plugin-i18n' ),
		'popular_items'              => __( 'Popular Portfolio Tags', 'wap8plugin-i18n' ),
		'all_items'                  => __( 'All Portfolio Tags', 'wap8plugin-i18n' ),
		'view_item'                  => __( 'View Portfolio Tag', 'wap8plugin-i18n' ),
		'edit_item'                  => __( 'Edit Portfolio Tag', 'wap8plugin-i18n' ),
		'update_item'                => __( 'Update Portfolio Tag', 'wap8plugin-i18n' ),
		'add_new_item'               => __( 'Add New Portfolio Tag', 'wap8plugin-i18n' ),
		'new_item_name'              => __( 'New Portfolio Tag', 'wap8plugin-i18n' ),
		'separate_items_with_commas' => __( 'Separate Portfolio Tags with commas', 'wap8plugin-i18n' ),
		'add_or_remove_items'        => __( 'Add or Remove Portfolio Tags', 'wap8plugin-i18n' ),
		'choose_from_most_used'      => __( 'Choose from Most Used Portfolio Tags', 'wap8plugin-i18n' ),
		'not_found'                  => __( 'No Portfolio Tags found.', 'wap8plugin-i18n' )
	);
	
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'args'              => array(
			'orderby' => 'term_order'
			),
		'rewrite'           => array(
			'slug'       => 'portfolio/portfolio-tags',
			'with_front' => false
			),
		'query_var'         => true
	);
	
	$args = apply_filters( 'portfolio_mgmt_portfolio_tag_args', $args );
	
	// register portfolio tags as a custom taxonomy
	register_taxonomy(
		'wap8-portfolio-tags', // unique handle to avoid potential conflicts
		'wap8-portfolio',      // this custom taxonomy should only be associated with our custom post type registered in wap8-portfolio-registration.php
		$args                  // array of arguments for this custom taxonomy
	);
	
}

/*----------------------------------------------------------------------------*/
/* Portfolio
/*----------------------------------------------------------------------------*/

/**
 * Portfolio
 *
 * Register wap8-portfolio as a custom post type.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.8 Allow $args to be filtered by theme or plugin
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio() {
	
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
	
	$supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'revisions',
		'author'
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'rewrite'            => array(
			'slug'       => 'portfolio',
			'with_front' => false
			),
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'has_archive'        => true,
		'menu_position'      => 5,
		'supports'           => $supports
	);
	
	$args = apply_filters( 'portfolio_mgmt_args', $args );
	
	// register the post type
	register_post_type(
		'wap8-portfolio', // unique post type handle to avoid any potential conflicts
		$args             // array of arguments for this custom post type
	);
	
}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Activation
/*----------------------------------------------------------------------------*/

/**
 * Portfolio Mgmt. Activation
 *
 * Flush rewrite rules upon plugin activation.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.0.8
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_mgmt_activation() {
	
	// wap8-services custom taxonomy
	wap8_portfolio_services();
	
	// wap8-portfolio-tgs custom taxonomy
	wap8_portfolio_tags();
	
	// custom post type
	wap8_portfolio();
	
	// flush rewrite rules
	flush_rewrite_rules();
	
}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Deactivation
/*----------------------------------------------------------------------------*/

register_deactivation_hook( __FILE__, 'wap8_portfolio_mgmt_deactivation', 10 );

/**
 * Portfolio Mgmt. Deactivation
 *
 * Flush rewrite rules upon plugin deactivation.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.0.8
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_mgmt_deactivation() {
	flush_rewrite_rules();
}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Icons
/*----------------------------------------------------------------------------*/

add_action( 'admin_head', 'wap8_portfolio_mgmt_icons', 10 );

/**
 * Portfolio Mgmt. Icons
 *
 * Add custom icons to the WordPress dashboard.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.8 Switch out menu icon and add edit icon
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_mgmt_icons() {
	?>
	<style type="text/css" media="screen">
	#menu-posts-wap8-portfolio .wp-menu-image {
		background-image: url(<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>images/portfolio-mgmt-16.png) !important;
		background-position: 6px -18px !important;
		background-repeat: no-repeat;
	}
	#menu-posts-wap8-portfolio:hover .wp-menu-image,
	#menu-posts-wap8-portfolio.wp-has-current-submenu .wp-menu-image {
		background-position: 6px 6px !important;
	}
	#icon-edit.icon32-posts-wap8-portfolio {
		background-image: url(<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>images/portfolio-mgmt-32.png);
		background-position: 0 0;
		background-repeat: no-repeat;
	}
	</style>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Mgmt. Title Field Label
/*-----------------------------------------------------------------------------------*/

add_filter( 'enter_title_here', 'wap8_portfolio_mgmt_title_field_label', 10, 1 );

/**
 * Portfolio Mgmt. Title Field Label
 *
 * Modify the post editor title field for this custom post type.
 *
 * @param $title Default title field label
 * @return $title Modified title field label
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_mgmt_title_field_label( $title ) {

	$screen = get_current_screen();
	
	if ( 'wap8-portfolio' == $screen->post_type ) {
	
		$title = __( 'Case Study Title', 'wap8plugin-i18n' );
	
	}
	
	return $title;

}

/*----------------------------------------------------------------------------*/
/* Portfolio Mgmt. Post Thumbnail
/*----------------------------------------------------------------------------*/

add_action( 'init', 'wap8_portfolio_mgmt_post_thumbnail', 10 );

/**
 * Portfolio Mgmt. Post Thumbnail
 *
 * Add theme support for post-thumbnails, if the current theme does not already.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_mgmt_post_thumbnail() {
	
	if ( !current_theme_supports( 'post-thumbnails' ) ) { // if the currently active theme does not support post-thumbnails
		
		add_theme_support( 'post-thumbnail', array( 'wap8-portfolio' ) ); // add theme support for post-thumbnails for the custom post type only
		
	}
	
}