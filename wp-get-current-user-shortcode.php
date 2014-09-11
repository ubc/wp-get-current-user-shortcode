<?php
/*
Plugin Name: [wp_get_current_user] - a shortcode to get the current user
Plugin URI: http://ctlt.ubc.ca
Description: A shortcode to get the current username
Author: Michael Ha
Version: 2
*/

/* wp_get_current_user_avatar attributes size= 32-150  */

add_shortcode( 'wp_get_current_user' , 'wp_get_current_user_func' );

function wp_get_current_user_func( $atts ) {

	$current_user = wp_get_current_user();
	
	return $current_user->user_login;
}

add_shortcode( 'wp_get_current_user_avatar' , 'wp_get_current_user_avatar_func' );

function wp_get_current_user_avatar_func( $atts ) {
	$a = shortcode_atts( array(
        'size' => '32',
    ), $atts );
	    preg_replace('/\D/', '', $a);
	    if (($a['size']> 31 && $a['size'] < 151)) :
	    	$size = $a['size'];
	    else:
	    	$size = 32;
	   	endif;

	return get_avatar( get_the_author_meta( 'ID' ), $size, '', 'User Avatar' );
}