<?php

/*
Plugin Name: Portfolio Mgmt.
Plugin URI: http://www.wearepixel8.com/plugins/portfolio-mgmt/
Description: Add the power of portfolio content management to your WordPress website with Portfolio Mgmt.
Version: 1.0.9
Author: We Are Pixel8
Author URI: http://www.wearepixel8.com
Text Domain: wap8plugin-i18n
Domain Path: /languages
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

include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-registrations.php' );    // register custom taxonomies and custom post type
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-meta-boxes.php' );       // add custom meta boxes to the post editor screen
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-help-tabs.php' );        // add help tabs to the portfolio post editor screen
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-updated-messages.php' ); // custom post type updated messages
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-custom-columns.php' );   // add custom columns to custom post type edit screen
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-widget.php' );           // portfolio widget
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-template-tags.php' );    // template tags
include( WAP8PORTFOLIO . 'includes/portfolio-mgmt-doc.php' );              // add documentation page

/*-----------------------------------------------------------------------------------*/
/* Portfolio Mgmt. Documentation Link
/*-----------------------------------------------------------------------------------*/

add_filter( 'plugin_action_links', 'wap8_portfolio_mgmt_doc_link', 10, 2 );

/**
 * Portfolio Mgmt. Documentation Link
 *
 * Add a shortcut link to the Portfolio Mgmt. Documentation page from the plugin
 * management screen.
 *
 * @param $links
 * @param $file
 *
 * @package Portfolio Mgmt.
 * @version 1.0.8
 * @since 1.0.8
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_mgmt_doc_link( $links, $file ) {
	
	if ( $file == plugin_basename( __FILE__ ) && current_user_can( 'edit_posts' ) ) {
		$links[] = '<a href="' . admin_url( 'edit.php?post_type=wap8-portfolio&page=wap8-portfolio-documentation' ) . '">' . __( 'Documentation', 'wap8plugin-i18n' ) . '</a>';
	}
	
	return $links;
	
}

/*-----------------------------------------------------------------------------------*/
/* Portfolio Text Domain
/*-----------------------------------------------------------------------------------*/

add_action( 'plugins_loaded', 'wap8_portfolio_text_domain', 10 );

/**
 * Portfolio Text Domain
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