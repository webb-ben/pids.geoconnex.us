<?php
/*
Plugin Name: Request Forwarder
Plugin URI: https://github.com/webb-ben/geoconnex.us/tree/master/simple-yourls/yourls/plugins/request-forward
Description: Attempts to remove file extensions from the short URL and forwards extension in the long URL.
Version: 1.0
Author: Ben Webb
*/

// Remove extension from keyword during sanitazation
yourls_add_filter('sanitize_string', 'remove_extension');
function remove_extension( $keyword ) {

    preg_match("/[.].*$/i", $keyword, $e);
	return str_replace($e[0], '', $keyword);

}

yourls_add_filter('redirect_location', 'extension_forward' );
function extension_forward($long_url) {

    preg_match("/[.].*$/i", $_SERVER['REQUEST_URI'], $e);
    return $long_url.$e[0];

}