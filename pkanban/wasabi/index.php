<?php

// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

use Aws\S3\S3Client;

// Instantiate the S3 client using your Wasabi profile
$s3Client = S3Client::factory(array(
	'endpoint' => 'http://s3.wasabisys.com',
	'profile' => 'wasabi',
	'region' => 'us-east-1',
	'version' => 'latest',
));
