<?php
/*
Plugin Name: Liara S3-Storage for WordPress
Plugin URI: https://byreza.net
Description: Simple UI to access Liara s3-storage files inside wordpress site.
Author: Reza Qalekhani
Version: 1.0
Author URI: https://byreza.net
Text Domain: wp-liara-storage
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly


include_once ( plugin_dir_path( __FILE__ ) . 'includes/settings.php' );
if ( get_option( 'wls_access_key' ) ) {
	include_once ( plugin_dir_path( __FILE__ ) . 'includes/storage-fetch.php' );
}

