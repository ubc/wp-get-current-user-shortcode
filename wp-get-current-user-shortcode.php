<?php
/*
Plugin Name: [wp_get_current_user] - a shortcode to get the current user
Plugin URI: http://ctlt.ubc.ca
Description: A shortcode to get the current username
Author: Michael Ha
Version: 2.0.0
*/

/* wp_get_current_user_avatar attributes size= 32-150  */

add_shortcode( 'wp_get_current_user' , 'wp_get_current_user_func' );

function wp_get_current_user_func( $atts ) {

	$current_user = wp_get_current_user();
	
	return $current_user->user_login;
}

add_shortcode( 'wp_get_current_user_avatar' , 'wp_get_current_user_avatar_func' );

function wp_get_current_user_avatar_func( $atts ) {
	$get_email = wp_get_current_user();
	$current_email = $get_email->user_email;
	$a = shortcode_atts( array(
        'size' => '32',
    ), $atts );
	    preg_replace('/\D/', '', $a);
	    if (($a['size']> 31 && $a['size'] < 151)) :
	    	$size = $a['size'];
	    else:
	    	$size = 32;
	   	endif;

	return get_avatar( $current_email, $size);
}