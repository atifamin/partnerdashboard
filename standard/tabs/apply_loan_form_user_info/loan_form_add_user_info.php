<?php
session_start();
include("../../../config/base_path.php");
include("../../../config/config_main.php");
include("../../../config/config_taskboard.php");
$data = $_POST;

$Query = "select * from tasks order by task_id DESC limit 1";
$QueryRun = mysqli_query($con_TaskBoard,$Query);
$LastTask = mysqli_fetch_assoc($QueryRun);

$data['task_id'] = $LastTask['task_id'];

if (!isset($_POST['business_structure'])) {
	$data['business_structure'] = NULL;
}
if (!isset($_POST['year_established'])) {
	$data['year_established'] = NULL;
}
if (!isset($_POST['type_of_business'])) {
	$data['type_of_business'] = NULL;
}
if (!isset($_POST['no_of_employees'])) {
	$data['no_of_employees'] = NULL;
}
if (!isset($_POST['current_year_profit'])) {
	$data['current_year_profit'] = NULL;
}
if (!isset($_POST['last_year_profit'])) {
	$data['last_year_profit'] = NULL;
}
$company_name = mysqli_real_escape_string($con_MAIN, $_POST['company_name']);
$address = mysqli_real_escape_string($con_MAIN, $_POST['address']);

$Query = "INSERT INTO `user_info_update` (
			`task_id`,
		    `user_id`,
		    `company_name`,
		    `address`,
		    `city`,
		    `state`,
		    `zip_code`,
		    `website`,
		    `phone`,
		    `main_contact_name`,
		    `alternate_contact_name`,
		    `title1`,
		    `title2`,
		    `email1`,
		    `email2`,
		    `mobile_phone1`,
		    `mobile_phone2`,
		    `business_structure`,
		    `year_established`,
		    `state_of_incorporation`,
		    `type_of_business`,
		    `no_of_employees`,
		    `current_year_profit`,
		    `last_year_profit`,
		    `largest_client1`,
		    `largest_client2`,
		    `largest_client3`,
		    `largest_client4`

		    ) VALUES(

			'".$data['task_id']."',
		    '".$_SESSION['user_id']."',
		    '".$company_name."',
		    '".$address."',
		    '".$data['city']."',
		    '".$data["state"]."',
		    '".$data['zip_code']."',
		    '".$data['website']."',
		    '".$data['phone']."',
		    '".$data['main_contact_name']."',
		    '".$data['alternate_contact_name']."',
		    '".$data['title1']."',
		    '".$data['title2']."',
		    '".$data['email1']."',
		    '".$data['email2']."',
		    '".$data['mobile_phone1']."',
		    '".$data['mobile_phone2']."',
		    '".$data['business_structure']."',
		    '".$data['year_established']."',
		    '".$data['state_of_incorporation']."',
		    '".$data['type_of_business']."',
		    '".$data['no_of_employees']."',
		    '".$data['current_year_profit']."',
		    '".$data['last_year_profit']."',
		    '".$data['largest_client1']."',
		    '".$data['largest_client2']."',
		    '".$data['largest_client3']."',
		    '".$data['largest_client4']."'
			)";
			// echo "<pre>"; print_r($Query);exit;
			mysqli_query($con_MAIN,$Query)  or die(mysqli_error($con_MAIN));

			header("Location: ".base_url."tabs/contract_details.php");

?>