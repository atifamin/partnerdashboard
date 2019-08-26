<?php
session_start();
include("../../../config/base_path.php");
include("../../../config/config_main.php");
include("../../../config/config_taskboard.php");
$data = $_POST;
$data['auth_name'] = json_encode($_POST['auth_name']);
$data['auth_title'] = json_encode($_POST['auth_title']);
$data['auth_phone'] = json_encode($_POST['auth_phone']);
$data['auth_home_address'] = json_encode($_POST['auth_home_address']);
$data['auth_city'] = json_encode($_POST['auth_city']);
$data['auth_state'] = json_encode($_POST['auth_state']);
$data['auth_zipcode'] = json_encode($_POST['auth_zipcode']);
$data['auth_email'] = json_encode($_POST['auth_email']);
$data['auth_ssn'] = json_encode($_POST['auth_ssn']);
$data['auth_dob'] = json_encode($_POST['auth_dob']);
$data['auth_signature'] = json_encode($_POST['auth_signature']);
$data['auth_date'] = json_encode($_POST['auth_date']);
//$data['auth_assets_held_trust'] = json_encode($_POST['auth_assets_held_trust']);
$data['auth_assets_held_trust'] = json_encode(array($_POST['auth_assets_held_trust1'], $_POST['auth_assets_held_trust3'], $_POST['auth_assets_held_trust3']));


$task_title = $_POST['company_name']." - New Deal";
$task_funding_amount_requested = $_POST['funding_amount'];
$task_todo = 0;
$task_container = 33;
$task_user = 1;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, pkanban_url."ajax/save_task");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "task_title=".$task_title."&task_funding_amount_requested=".$task_funding_amount_requested."&task_todo=".$task_todo."&task_container=".$task_container."&task_user=".$task_user."");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
$server_output = json_decode($server_output);

//Getting Last Added Task ID
$Query = "select * from tasks order by task_id DESC limit 1";
$QueryRun = mysqli_query($con_TaskBoard,$Query);
$LastTask = mysqli_fetch_assoc($QueryRun);

$data['task_id'] = $LastTask['task_id'];



$InsertQuery = "INSERT INTO user_application_form (
    `task_id`,
    `user_id`,
    `company_name`,
    `address`,
    `city`,
    `state`,
    `zip_code`,
    `website`,
    `phone`,
    `contact_name1`,
    `contact_name2`,
    `title1`,
    `title2`,
    `email1`,
    `email2`,
    `company_type`,
    `year_established`,
    `state_of_incorporation`,
    `federal_tax_id`,
    `type_of_business`,
    `no_of_employees`,
    `sale_profit_loss_year1`,
    `sale_profit_loss_year2`,
    `sale_profit_loss_amount1`,
    `sale_profit_loss_amount2`,
    `funding_amount`,
    `use_of_funds`,
    `currently_financed`,
    `largest_client1`,
    `largest_client2`,
    `largest_client3`,
    `largest_client4`,
    `is_past_due_debts`,
    `past_due_debts_amount`,
    `past_due_debts_creditors`,
    `is_deliquent_taxes`,
    `deliquent_taxes_amount`,
    `deliquent_taxing_agency`,
    `is_liens_of_file`,
    `liens_of_file_describe`,
    `is_past_bankruptcies`,
    `past_bankruptcies_date_discharge`,
    `bank_name`,
    `bank_aba`,
    `bank_city_state`,
    `bank_phone`,
    `bank_account_name`,
    `bank_account_number1`,
    `bank_account_number2`,
    `bank_contact_name`,
    `referance1_type`,
    `referance1_contact_name`,
    `referance1_phone`,
    `referance1_company_name`,
    `referance1_title`,
    `referance2_type`,
    `referance2_contact_name`,
    `referance2_phone`,
    `referance2_company_name`,
    `referance2_title`,
    `auth_name`,
    `auth_title`,
    `auth_phone`,
    `auth_home_address`,
    `auth_city`,
    `auth_state`,
    `auth_zipcode`,
    `auth_email`,
    `auth_ssn`,
    `auth_dob`,
    `auth_assets_held_trust`,
    `auth_signature`,
    `auth_date`
    
) VALUES (
    '".$data['task_id']."',
    '".$_SESSION['user_id']."',
    '".$data['company_name']."',
    '".$data["address"]."',
    '".$data['city']."',
    '".$data["state"]."',
    '".$data['zip_code']."',
    '".$data['website']."',
    '".$data['phone']."',
    '".$data['contact_name1']."',
    '".$data['contact_name2']."',
    '".$data['title1']."',
    '".$data['title2']."',
    '".$data['email1']."',
    '".$data['email2']."',
    '".$data['company_type']."',
    '".$data['year_established']."',
    '".$data['state_of_incorporation']."',
    '".$data['federal_tax_id']."',
    '".$data['type_of_business']."',
    '".$data['no_of_employees']."',
    '".$data['sale_profit_loss_year1']."',
    '".$data['sale_profit_loss_year2']."',
    '".$data['sale_profit_loss_amount1']."',
    '".$data['sale_profit_loss_amount2']."',
    '".$data['funding_amount']."',
    '".$data['use_of_funds']."',
    '".$data['currently_financed']."',
    '".$data['largest_client1']."',
    '".$data['largest_client2']."',
    '".$data['largest_client3']."',
    '".$data['largest_client4']."',
    '".$data['is_past_due_debts']."',
    '".$data['past_due_debts_amount']."',
    '".$data['past_due_debts_creditors']."',
    '".$data['is_deliquent_taxes']."',
    '".$data['deliquent_taxes_amount']."',
    '".$data['deliquent_taxing_agency']."',
    '".$data['is_liens_of_file']."',
    '".$data['liens_of_file_describe']."',
    '".$data['is_past_bankruptcies']."',
    '".$data['past_bankruptcies_date_discharge']."',
    '".$data['bank_name']."',
    '".$data['bank_aba']."',
    '".$data['bank_city_state']."',
    '".$data['bank_phone']."',
    '".$data['bank_account_name']."',
    '".$data['bank_account_number1']."',
    '".$data['bank_account_number2']."',
    '".$data['bank_contact_name']."',
    '".$data['referance1_type']."',
    '".$data['referance1_contact_name']."',
    '".$data['referance1_phone']."',
    '".$data['referance1_company_name']."',
    '".$data['referance1_title']."',
    '".$data['referance2_type']."',
    '".$data['referance2_contact_name']."',
    '".$data['referance2_phone']."',
    '".$data['referance2_company_name']."',
    '".$data['referance2_title']."',
    '".$data['auth_name']."',
    '".$data['auth_title']."',
    '".$data['auth_phone']."',
    '".$data['auth_home_address']."',
    '".$data['auth_city']."',
    '".$data['auth_state']."',
    '".$data['auth_zipcode']."',
    '".$data['auth_email']."',
    '".$data['auth_ssn']."',
    '".$data['auth_dob']."',
    '".$data['auth_assets_held_trust']."',
    '".$data['auth_signature']."',
    '".$data['auth_date']."'
)";

mysqli_query($con_MAIN,$InsertQuery);
header("Location: ".base_url."tabs/contract_details.php");

?>