<?php
// add plugin settings page
if ( ! function_exists( 'rqwls_load_liara_storage_settings' ) ) {
	function rqwls_load_liara_storage_settings() { ?>
		<div class="wrap">
			<h1><?php _e( 'Liara S3-Storage Settings', 'wp-liara-storage' ) ?></h1>
			<p><?php _e( 'On this page, you can customize the settings of the Liara S3-Storage plugin.', 'wp-liara-storage' ) ?>
			</p>
			<form method="post" action="options.php">
				<?php settings_fields( 'wp_liara_settings' );
				do_settings_sections( 'wp_liara_settings' );

				include_once ( plugin_dir_path( __FILE__ ) . 'options.php' );

				submit_button(); ?>
			</form>
		</div>
	<?php }
}


// add admin menu for plugin settings page
if ( ! function_exists( 'rqwls_liara_storage_menu' ) ) {
	function rqwls_liara_storage_menu() {
		$page_title = __( 'Liara S3-Storage Settings', 'wp-liara-storage' );
		$menu_title = __( 'Liara S3', 'wp-liara-storage' );
		$capability = 'manage_options';
		$menu_slug = 'wp-liara-storage';
		$function = 'rqwls_load_liara_storage_settings';
		$icon_url = 'dashicons-media-code';
		$position = 100;
		add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function, $position );
	}
}

// register plugin options
if ( ! function_exists( "rqwls_update_liara_storage_settings" ) ) {
	function rqwls_update_liara_storage_settings() {
		register_setting( 'wp_liara_settings', 'wls_bucket_name' );
		register_setting( 'wp_liara_settings', 'wls_domain' );
		register_setting( 'wp_liara_settings', 'wls_api_endpoint' );
		register_setting( 'wp_liara_settings', 'wls_access_key' );
		register_setting( 'wp_liara_settings', 'wls_secret_key' );
	}
}

// hook admin menu and page to WP
add_action( 'admin_menu', 'rqwls_liara_storage_menu' );
add_action( 'admin_init', 'rqwls_update_liara_storage_settings' );
