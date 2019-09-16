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

/*$s3Client->createBucket(array('Bucket' => 'aqeelahmadbucket'));*/

/*$result = $s3Client->putObject(array(
    'Bucket' => 'aqeelahmadbucket',
    'Key'    => 'All_New_Accord.png',
	'SourceFile' => 'All_New_Accord.png',
	'ACL'  	 => 'public-read'
));*/

/*$result = $s3Client->deleteObject(array(
    'Bucket' => 'aqeelahmadbucket',
    'Key' => 'All_New_Accord.png',
));*/

//echo "<pre>"; print_r($result); exit;