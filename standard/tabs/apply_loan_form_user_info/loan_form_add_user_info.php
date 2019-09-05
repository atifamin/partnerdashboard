
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
		    `main_contact_fname`,
		    `main_contact_lname`,
		    `alternate_contact_fname`,
		    `alternate_contact_lname`,
		    `main_contact_title`,
		    `alternate_contract_title`,
		    `main_contact_email`,
		    `alternate_contract_email`,
		    `main_contract_mobile_phone`,
		    `alternate_contract_mobile_phone`,
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
		    `largest_client4`,
		    `has_existing_suretybond_broker-agent`,
		    `suretybond_amount`,
		    `suretybond_broker-agent_company_name`,
		    `suretybond_broker-agent_company_website`,
		    `suretybond_broker-agent_company_phone`,
		    `surtybond_broker-agent_contact_fname`,
		    `surtybond_broker-agent_contact_lname`,
		    `surtybond_broker-agent_contact_phone`

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
		    '".$data['main_contact_fname']."',
		    '".$data['main_contact_lname']."',
		    '".$data['alternate_contact_fname']."',
		    '".$data['alternate_contact_lname']."',
		    '".$data['main_contact_title']."',
		    '".$data['alternate_contract_title']."',
		    '".$data['main_contact_email']."',
		    '".$data['alternate_contract_email']."',
		    '".$data['main_contract_mobile_phone']."',
		    '".$data['alternate_contract_mobile_phone']."',
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
		    '".$data['largest_client4']."',
		    '".$data['has_existing_suretybond_broker-agent']."',
		    '".$data['suretybond_amount']."',
		    '".$data['suretybond_broker-agent_company_name']."',
		    '".$data['suretybond_broker-agent_company_website']."',
		    '".$data['suretybond_broker-agent_company_phone']."',
		    '".$data['surtybond_broker-agent_contact_fname']."',
		    '".$data['surtybond_broker-agent_contact_lname']."',
		    '".$data['surtybond_broker-agent_contact_phone']."'
			)";
			mysqli_query($con_MAIN,$Query)  or die(mysqli_error($con_MAIN));

			header("Location: ".base_url."tabs/contract_details.php");

?>