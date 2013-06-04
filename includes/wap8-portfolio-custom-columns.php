<?php

/*----------------------------------------------------------------------------*/
/* Custom Portfolio Columns
/*----------------------------------------------------------------------------*/

add_filter( 'manage_edit-wap8-portfolio_columns', 'wap8_custom_portfolio_columns', 10, 1 );

/**
 * Custom Portfolio Columns
 *
 * Customizing the columns for the wap8-portfolio custom post type edit screen.
 *
 * @param $columns Post columns
 * @return $columns Custom post columns
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_custom_portfolio_columns( $columns ) {

	$columns = array(
		'cb'                         => '<input type="checkbox" />',
		'wap8-featured-image'        => __( 'Thumbnail', 'wap8plugin-i18n' ),
		'title'                      => _x( __( 'Case Study', 'wap8plugin-i18n' ), 'column name' ),
		'wap8-client-column'         => __( 'Client', 'wap8plugin-i18n' ),
		'author'                     => __( 'Author', 'wap8plugin-i18n' ),
		'wap8-services-column'       => __( 'Services', 'wap8plugin-i18n' ),	// custom column for services
		'wap8-portfolio-tags-column' => __( 'Portfolio Tags', 'wap8plugin-i18n' ), // custom column for portfolio tags
		'date'                       => _x( __( 'Date', 'wap8plugin-i18n' ), 'column name' )
	);
	
	return $columns;

}

/*----------------------------------------------------------------------------*/
/* Portfolio Columns Content
/*----------------------------------------------------------------------------*/

add_action( 'manage_wap8-portfolio_posts_custom_column', 'wap8_portfolio_columns_content', 10, 2 );

/**
 * Portfolio Columns Content
 *
 * Adding the custom taxonomies and client names to their respective custom
 * columns. The taxonomies should be comma separated anchors similar to post
 * categories and tags behavior.
 *
 * @param $column Custom columns
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_columns_content( $column, $post_id ) {
	
	global $post;
	
	switch ( $column ) {
		
		case 'wap8-featured-image' : // featured image
		
			$image = get_the_post_thumbnail( $post->ID, array( 60, 60 ) ); // get the thumb version of the featured image
			
			if ( $image ) { // if an image has been set
				
				echo $image;
				
			} else { // no image has been set
				
				echo __( '<i>No thumbnail.</i>', 'wap8theme-i18n' );
				
			}
			
			break;
		
		case 'wap8-client-column' : // client column
		
			$client = get_post_meta( $post->ID, '_wap8_client_name', true ); // get the client name from custom meta box
			
			if ( !empty( $client ) ) { // if a client name has been set
				
				echo $client;
				
			} else { // no client name has been set
				
				echo __( '<i>No client.</i>', 'wap8plugin-i18n' );
				
			}
			
			break;
		
		case 'wap8-services-column' : // services column
			
			$terms = get_the_terms( $post_id, 'wap8-services' ); // get the services for the post

			if ( !empty( $terms ) ) { // if terms were found

				$out = array();

				foreach ( $terms as $term ) { // loop through each term, linking to the 'edit posts' page for the specific term
					$out[] = sprintf(
						'<a href="%s">%s</a>',
						esc_url(
							add_query_arg(
								array(
									'post_type'      => $post->post_type,
									'wap8-services'  => $term->slug
								), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'wap8-services', 'display' ) )
						);
				}

				echo join( ', ', $out ); // join the terms and separate with a coma
				
			}

			else { // if no terms were found, output a default message
				
				_e( '<i>No services.</i>', 'wap8plugin-i18n' );
				
			}
		
			break;
		
		case 'wap8-portfolio-tags-column' : // portfolio tags column
		
			$terms = get_the_terms( $post_id, 'wap8-portfolio-tags' ); // get the portfolio tags for the post

			if ( !empty( $terms ) ) { // if terms were found

				$out = array();

				foreach ( $terms as $term ) { // loop through each term, linking to the 'edit posts' page for the specific term
					$out[] = sprintf(
						'<a href="%s">%s</a>',
						esc_url(
							add_query_arg(
								array(
									'post_type'           => $post->post_type,
									'wap8-portfolio-tags' => $term->slug
								), 'edit.php' ) ),
							esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'wap8-portfolio-tags', 'display' ) )
						);
				}

				echo join( ', ', $out ); // join the terms and separate with a coma
				
			}

			else { // if no terms were found, output a default message
				
				_e( '<i>No portfolio tags.</i>', 'wap8plugin-i18n' );
				
			}
			
			break;
		
		default : // break out of the switch statement for everything else
		
			break;
		
	}

}

/*----------------------------------------------------------------------------*/
/* Portfolio Sortable Columns
/*----------------------------------------------------------------------------*/

add_filter( 'manage_edit-wap8-portfolio_sortable_columns', 'wap8_portfolio_sortable_columns', 10, 1 );

/**
 * Portfolio Sortable Columns
 *
 * Let WordPress know the client column should be sortable.
 *
 * @param $columns Post columns
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_sortable_columns( $columns ) {

	$columns['wap8-client-column'] = 'wap8-client-column';

	return $columns;

}

/*----------------------------------------------------------------------------*/
/* Portfolio Edit Load
/*----------------------------------------------------------------------------*/

add_action( 'load-edit.php', 'wap8_portfolio_edit_load', 10 );

/**
 * Portfolio Edit Load
 *
 * Using the load-edit hook to insure we are on the edit.php screen. If so, add
 * our custom filter to request.
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_portfolio_edit_load() {
	
	add_filter( 'request', 'wap8_sort_portfolio_clients', 10, 1 );
	
}

/*----------------------------------------------------------------------------*/
/* Sort Portfolio Clients
/*----------------------------------------------------------------------------*/

/**
 * Sort Portfolio Clients
 *
 * If we are sorting the client column, sort _wap8_client_name by meta_value.
 *
 * @param $vars
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_sort_portfolio_clients( $vars ) {
	
	if ( isset( $vars['post_type'] ) && 'wap8-portfolio' == $vars['post_type'] ) { // if we are viewing the portfolio post type
		
		if ( isset( $vars['orderby'] ) && 'wap8-client-column' == $vars['orderby'] ) { // if we are ordering by client
			
			$vars =
			
				array_merge(
					$vars,
						array(
							'meta_key' => '_wap8_client_name',
							'orderby'  => 'meta_value'
					)
				);
			
		}
		
	}
	
	return $vars;
	
}