<?php
// load requirements
require 'vendor/aws-autoloader.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

// get options from plugin settings
$access_key = get_option( 'wls_access_key' );
$secret_key = get_option( 'wls_secret_key' );
$endpoint = get_option( 'wls_api_endpoint' );

// declare an S3 client
$s3 = new S3Client( [ 
	'version' => 'latest',
	'region' => 'us-east-1',
	'endpoint' => $endpoint,
	'credentials' => [ 
		'key' => $access_key,
		'secret' => $secret_key,
	],
] );

// prettify files name
function rqwls_prettify_filename( $fileName ) {
	$baseName = pathinfo( $fileName, PATHINFO_FILENAME );
	$prettyName = ucwords( str_replace( '-', ' ', $baseName ) );
	return $prettyName;
}

// round file size in MB
function rqwls_round_filesize( $size ) {
	return round( $size / ( 1024 * 1024 ), 2 ) . ' MB';
}

// declare shortcode to list all files
// example: [liara-list-files location="files"] or simply [liara-list-files]
function rqwls_construct_shortcode( $atts ) {
	global $s3;
	$atts = shortcode_atts( array(
		'location' => '',
	), $atts, 'liara-list-files' );

	$location = $atts['location'];
	$bucket_name = get_option( 'wls_bucket_name' );
	$domain_prefix = get_option( 'wls_domain' );
	ob_start();
	try {
		$result = $s3->listObjectsV2( [ 
			'Bucket' => $bucket_name,
			'Prefix' => $location,
		] );

		if ( empty( $result['Contents'] ) ) {
			echo "The bucket is empty.\n";
		} else {
            echo '<ul class="liara-files">';
			foreach ( $result['Contents'] as $object ) {
				if ( $object['Size'] > 0 ) {
					$file_size_inMB = round( $object['Size'] / ( 1024 * 1024 ), 2 );
					$file_name = $object['Key']; ?>
					<li><a href="<?php echo $domain_prefix . $file_name; ?>"><?php echo rqwls_prettify_filename( $file_name ); ?></a> -
						<span><?php echo rqwls_round_filesize( $object['Size'] ); ?></span>
					</li>
				<?php }
			}
            echo '</ul>';
		}
	} catch (AwsException $e) {
		echo $e->getMessage() . PHP_EOL;
	}
	return ob_get_clean();
}

// hook shortcode to WP init
function rqwls_declare_shortcode() {
	add_shortcode( 'liara-list-files', 'rqwls_construct_shortcode' );
}
add_action( 'init', 'rqwls_declare_shortcode' );
