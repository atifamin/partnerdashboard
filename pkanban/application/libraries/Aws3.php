<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require("././wasabi/vendor/autoload.php");

use Aws\S3\S3Client;

/**
 *  
 */
class Aws3
{
	private $S3;

	function __construct(){
		/*$this->S3 = S3Client::factory([
			'region' => 'us-east-1',
			'version' => 'latest',
			'endpoint' => 'http://s3.wasabisys.com',
			'profile' => 'wasabi'
		]);*/
		$this->S3 = S3Client::factory([
			'region' => 'us-east-1',
			'version' => 'latest',
			'endpoint' => 'http://s3.wasabisys.com',
			'credentials' => [
				'key' => "LEMBD2LK9029Z04NRISZ",
				'secret' => "S8kL9qX7LCPo9lgaGSR28Zr9SuCBkAFVWMRW221S",
			]
		]);
	}

	public function addBucket($bucketName){
		$result = $this->S3->createBucket(array(
			'Bucket' =>$bucketName,
			'LocationConstraint' => 'us-east-1'
		));
		return $result;
	}

	public function sendFile($bucketName, $file){
		$OFN = $file['name'];
		$FA = explode(".", $OFN);
		$RFN = $FA[0]."_".time().rand();

		$result['file_ext'] = end($FA);
		$result['filename'] = $RFN.".".$result['file_ext'];
		$result['file_type'] = $file['type'];
		$result['file_size'] = $file['size'];
		
		$response = $this->S3->putObject(array(
			'Bucket' => $bucketName,
			'Key' => $result['filename'],
			'SourceFile' => $file['tmp_name'],
			//'Body' => fopen($file['tmp_name'], 'rb'),
			'ACL' => 'public-read'
		));

		$result['file_path'] = $response['ObjectURL'];
		$result['full_path'] = $response['ObjectURL'];
		return $result;
	}

	public function delete_bucket_file($bucketName, $filename){
		$res = $this->S3->deleteObject(array(
    	'Bucket' => $bucketName,
    	'Key'    => $filename
		));
		return $res;
	}
}

?>