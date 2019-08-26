<?php
session_start();
include("../../../base_path.php");
include("../../../config/config_main.php");
include("../../../config/config_taskboard.php");
$data = $_POST;

$Query = "select * from tasks order by task_id DESC limit 1";
$QueryRun = mysqli_query($con_TaskBoard,$Query);
$LastTask = mysqli_fetch_assoc($QueryRun);

$data['task_id'] = $LastTask['task_id'];

$Query = "INSERT INTO user_info_update (
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
		    `federal_tax_id`,
		    `type_of_business`,
		    `no_of_employees`,
		    `current_year_profit`,
		    `last_year_profit`,
		    `funding_amount`,
		    `use_of_funds`,
		    `currently_financed`,
		    `largest_client1`,
		    `largest_client2`,
		    `largest_client3`,
		    `largest_client4`

		    ) VALUES(

			'".$data['task_id']."',
		    '".$_SESSION['user_id']."',
		    '".$data['company_name']."',
		    '".$data["address"]."',
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
		    '".$data['federal_tax_id']."',
		    '".$data['type_of_business']."',
		    '".$data['no_of_employees']."',
		    '".$data['current_year_profit']."',
		    '".$data['last_year_profit']."',
		    '".$data['funding_amount']."',
		    '".$data['use_of_funds']."',
		    '".$data['currently_financed']."',
		    '".$data['largest_client1']."',
		    '".$data['largest_client2']."',
		    '".$data['largest_client3']."',
		    '".$data['largest_client4']."'
			)";
			mysqli_query($con_MAIN,$Query);
			header("Location: ".base_url."tabs/contract_details.php");

?>