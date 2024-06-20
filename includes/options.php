<table class="form-table">
	<tr valign="top">
		<th scope="row"><?php _e( 'Bucket Name', 'wp-liara-storage' ) ?></th>
		<td><input class="regular-text" type="text" name="wls_bucket_name"
				value="<?php echo get_option( 'wls_bucket_name' ); ?>" />
			<p class="description"><?php _e( 'Add your preferred bucket name.', 'wp-liara-storage' ) ?></p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Connected Domain', 'wp-liara-storage' ) ?></th>
		<td><input class="regular-text" type="text" name="wls_domain"
				value="<?php echo get_option( 'wls_domain' ); ?>" />
			<p class="description"><?php _e( 'Add your custom domain name connected to this bucket. It should start with <code>http</code> or <code>https</code>. Don\'t forget to add a trailing slash. Example: <code>https://example.com/</code>', 'wp-liara-storage' ) ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'API Endpoint', 'wp-liara-storage' ) ?></th>
		<td><input class="regular-text" type="text" name="wls_api_endpoint"
				value="<?php echo get_option( 'wls_api_endpoint' ); ?>" />
			<p class="description"><?php _e( 'Add API endpoint URL for this bucket. By Liara\'s default, it\'s <code>https://storage.iran.liara.space</code>.', 'wp-liara-storage' ) ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Accses Key', 'wp-liara-storage' ) ?></th>
		<td><input class="regular-text" type="text" name="wls_access_key"
				value="<?php echo get_option( 'wls_access_key' ); ?>" />
			<p class="description"><?php _e( 'Add your <strong>Access Key</strong> for this bucket. You can managae your keys at <code>https://console.liara.ir/buckets/keys</code>.', 'wp-liara-storage' ) ?>
			</p>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e( 'Secret Key', 'wp-liara-storage' ) ?></th>
		<td><input class="regular-text" type="text" name="wls_secret_key"
				value="<?php echo get_option( 'wls_secret_key' ); ?>" />
			<p class="description"><?php _e( 'Add your <strong>Secret Key</strong> for this bucket. You can managae your keys at <code>https://console.liara.ir/buckets/keys</code>.', 'wp-liara-storage' ) ?>
			</p>
		</td>
	</tr>
</table>
<hr>
<h4><?php _e( 'Usage', 'wp-liara-storage' ) ?>:</h4>
<p><?php _e( 'To list all files on your bucket, simply use the <code>[liara-list-files]</code> shortcode inside your post or page. To limit the file list to a specific folder, you can use the <code>[liara-list-files location="books"]</code> shortcode.', 'wp-liara-storage' ) ?></p>