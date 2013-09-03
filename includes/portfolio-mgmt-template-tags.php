<?php

/*----------------------------------------------------------------------------*/
/* List Services
/*----------------------------------------------------------------------------*/

/**
 * List Services
 *
 * Use this template tag, within the loop, to return a comma separated list of
 * services attached to a portfolio post and wrapped by a paragraph tag. Each
 * term will be wrapped with an anchor tag that links to an archive for that
 * term. If your theme does not contain the taxonomy-wap8-services.php template,
 * index.php will be used in its place.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_list_services( $post_id ) {

	echo get_the_term_list( $post_id, 'wap8-services', '<p class="folio-services">', ', ', '</p>' ); // echo a comma separated list of terms with an anchor
	
}

/*----------------------------------------------------------------------------*/
/* List Services without Link
/*----------------------------------------------------------------------------*/

/**
 * List Services No Link
 *
 * Use this template tag, within the loop, to return a comma separated list of
 * services attached to a portfolio post.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_list_services_nolink( $post_id ) {

	$terms = get_the_terms( $post_id, 'wap8-services' ); // declare a variable to store all terms attached to the post
	
	if ( !empty( $terms ) && !is_wp_error( $terms ) ) : // if terms were found and not a WordPress error

		echo '<p class="folio-services">'; // opening paragraph tag

		$services = array(); // store found terms in an array

		foreach ( $terms as $term ) { // loop through all of the found terms
			$services[] = $term->name; // display each term name
		}
		echo join( ', ', $services ); // join the terms separated by a comma
		
		echo '</p>'; // closing paragraph tag
		
	endif;
}

/*----------------------------------------------------------------------------*/
/* Unordered List of Services
/*----------------------------------------------------------------------------*/

/**
 * Unordered List of Services
 *
 * Use this template tag, within the loop, to return an unordered list of
 * services attached to a portfolio post. Each term will be wrapped with a list
 * item tag as well as an anchor tag. The anchor tag links to an archive for
 * that term. If your theme does not contain the taxonomy-wap8-services.php
 * template, index.php will be used in its place.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_ul_services( $post_id ) {
	
	echo '<ul class="folio-services">' . "\n"; // opening unordered list tag
	
	echo get_the_term_list( $post_id, 'wap8-services', '<li>', '', '</li>' ) . "\n"; // echo a list of terms with each one wrapped with a list item tag
	
	echo '</ul>' . "\n"; // closing unordered list tag
	
}

/*----------------------------------------------------------------------------*/
/* Unordered List of Services without Link
/*----------------------------------------------------------------------------*/

/**
 * Unordered List of Services No Link
 *
 * Use this template tag, within the loop, to return an unordered list of
 * services attached to a portfolio post.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_ul_services_nolink( $post_id ) {
	
	$terms = get_the_terms( $post_id, 'wap8-services' ); // declare a variable to store all terms attached to the post
	
	if ( !empty( $terms ) && !is_wp_error( $terms ) ) : // if terms were found and not a WordPress error
		
		echo '<ul class="folio-services">' . "\n"; // opening unordered list tag
		
		foreach ( $terms as $term) { // loop through all of the found terms
			echo '<li>' . $term->name . '</li>' . "\n"; // wrap each term name with a list item tag
		}
		
		echo '</ul>' . "\n"; // closing unordered list tag
		
	endif;
	
}

/*----------------------------------------------------------------------------*/
/* List Portfolio Tags
/*----------------------------------------------------------------------------*/

/**
 * List Portfolio Tags
 *
 * Use this template tag, within the loop, to return a comma separated list of
 * portfolio tags attached to a portfolio post and wrapped by a paragraph tag.
 * Each term will be wrapped with an anchor tag that links to an archive for
 * that term. If your theme does not contain the taxonomy-wap8-portfolio-tags.php
 * template, index.php will be used in its place.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_list_folio_tags( $post_id ) {

	echo get_the_term_list( $post_id, 'wap8-portfolio-tags', '<p class="folio-tags">', ', ', '</p>' ); // echo a comma separated list of terms with an anchor
	
}

/*----------------------------------------------------------------------------*/
/* List Portfolio Tags without Link
/*----------------------------------------------------------------------------*/

/**
 * List Portfolio Tags without Link
 *
 * Use this template tag, within the loop, to return a comma separated list of
 * services attached to a portfolio post.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_list_folio_tags_nolink( $post_id ) {

	$terms = get_the_terms( $post_id, 'wap8-portfolio-tags' ); // declare a variable to store all terms attached to the post
	
	if ( !empty( $terms ) && !is_wp_error( $terms ) ) : // if terms were found and not a WordPress error

		echo '<p class="folio-tags">'; // opening paragraph tag

		$folio_tags = array(); // store found terms in an array

		foreach ( $terms as $term ) { // loop through all of the found terms
			$folio_tags[] = $term->name; // display each term name
		}
		echo join( ', ', $folio_tags ); // join the terms separated by a comma
		
		echo '</p>'; // closing paragraph tag
		
	endif;
}

/*----------------------------------------------------------------------------*/
/* Unordered List of Portfolio Tags
/*----------------------------------------------------------------------------*/

/**
 * Unordered List of Portfolio Tags
 *
 * Use this template tag, within the loop, to return an unordered list of
 * portfolio tags attached to a portfolio post. Each term will be wrapped with
 * a list item tag as well as an anchor tag. The anchor tag links to an archive
 * for that term. If your theme does not contain the taxonomy-wap8-portfolio-tags.php
 * template, index.php will be used in its place.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_ul_folio_tags( $post_id ) {
	
	echo '<ul class="folio-tags">' . "\n"; // opening unordered list tag
	
	echo get_the_term_list( $post_id, 'wap8-portfolio-tags', '<li>', '', '</li>' ) . "\n"; // echo a list of terms with each one wrapped with a list item tag
	
	echo '</ul>' . "\n"; // closing unordered list tag
	
}

/*----------------------------------------------------------------------------*/
/* Unordered List of Portfolio Tags without Link
/*----------------------------------------------------------------------------*/

/**
 * Unordered List of Portfolio Tags without Link
 *
 * Use this template tag, within the loop, to return an unordered list of
 * portfolio tags attached to a portfolio post.
 *
 * @param $post_id Post ID
 *
 * @package Portfolio Mgmt.
 * @version 1.0.0
 * @since 1.0.0
 * @author Erik Ford for We Are Pixel8 <@notdivisible>
 *
 */

function wap8_ul_folio_tags_nolink( $post_id ) {
	
	$terms = get_the_terms( $post_id, 'wap8-portfolio-tags' ); // declare a variable to store all terms attached to the post
	
	if ( !empty( $terms ) && !is_wp_error( $terms ) ) : // if terms were found and not a WordPress error
		
		echo '<ul class="folio-tags">' . "\n"; // opening unordered list tag
		
		foreach ( $terms as $term) { // loop through all of the found terms
			echo '<li>' . $term->name . '</li>' . "\n"; // wrap each term name with a list item tag
		}
		
		echo '</ul>' . "\n"; // closing unordered list tag
		
	endif;
	
}