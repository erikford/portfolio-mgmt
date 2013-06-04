<?php

/*
Plugin Name: Portfolio Mgmt.
Plugin URI: http://www.wearepixel8.com/2943/portfolio-mgmt-wordpress-plugin/
Description: Add the power of portfolio content management to your WordPress website with Portfolio Mgmt.
Version: 1.0.6
Author: We Are Pixel8
Author URI: http://www.wearepixel8.com
License:
	Copyright 2012 - 2013 We Are Pixel8 <hello@wearepixel8.com>
	
	This program is free software; you can redistribute it and/or modify it under
	the terms of the GNU General Public License, version 2, as published by the Free
	Software Foundation.
	
	This program is distributed in the hope that it will be useful, but WITHOUT ANY
	WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
	PARTICULAR PURPOSE. See the GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software Foundation, Inc.,
	51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/*-----------------------------------------------------------------------------------*/
/* Constants
/*-----------------------------------------------------------------------------------*/

define( 'WAP8PORTFOLIO', plugin_dir_path( __FILE__ ) );

/*-----------------------------------------------------------------------------------*/
/* Includes
/*-----------------------------------------------------------------------------------*/

include( WAP8PORTFOLIO . 'includes/wap8-portfolio-taxonomies.php' ); // register custom taxonomies
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-registration.php' ); // register custom post type
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-meta-boxes.php' ); // add custom meta boxes to the post editor screen
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-help-tabs.php' ); // add help tabs to the portfolio post editor screen
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-updated-messages.php' ); // custom post updated messages
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-custom-columns.php' ); // add custom columns to custom post type edit screen
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-widget.php' ); // portfolio widget
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-template-tags.php' ); // template tags
include( WAP8PORTFOLIO . 'includes/wap8-portfolio-admin-pages.php' ); // add admin info page

/*-----------------------------------------------------------------------------------*/
/* Case Studies Title Field Label
/*-----------------------------------------------------------------------------------*/

add_filter( 'enter_title_here', 'wap8_case_studies_title_field_label', 10, 1 );

/**
 * Case Studies Title Field Label
 *
 * Modify the post editor title field for this custom post type.
 *
 * @param $title Default title field label
 * @return $title Modified title field label
 *
 * @package Portfolio Mgmt.
 * @version 1.0.4
 * @since 1.0.4
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_case_studies_title_field_label( $title ) {

	$screen = get_current_screen();
	
	if ( 'wap8-portfolio' == $screen->post_type ) {
	
		$title = __( 'Enter Case Study Title', 'wap8plugin-i18n' );
	
	}
	
	return $title;

}

/*----------------------------------------------------------------------------*/
/* Portfolio Menu Icon
/*----------------------------------------------------------------------------*/

add_action( 'admin_head', 'wap8_portfolio_menu_icon', 10 );

/**
 * Portfolio Menu Icon
 *
 * Add the menu icon to the admin menu.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.4
 * @since 1.0.4
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_menu_icon() {
	?>
	<style type="text/css" media="screen">
	#menu-posts-wap8-portfolio .wp-menu-image {
		background-image: url(<?php echo plugin_dir_url( dirname( __FILE__ ) ); ?>portfolio-mgmt/images/portfolio-icon.png) !important;
		background-position: 6px -18px !important;
		background-repeat: no-repeat;
	}
	#menu-posts-wap8-portfolio:hover .wp-menu-image,
	#menu-posts-wap8-portfolio.wp-has-current-submenu .wp-menu-image {
		background-position: 6px 6px !important;
	}
	</style>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/* Load language file
/*-----------------------------------------------------------------------------------*/

add_action( 'plugins_loaded', 'wap8_portfolio_text_domain', 10 );

/**
 * Portfolio text domain.
 *
 * Load the text domain for internationalization.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_text_domain() {
	
	load_plugin_textdomain( 'wap8plugin-i18n', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	
}