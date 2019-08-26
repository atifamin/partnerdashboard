<?php
session_start();
include("../../../base_path.php");
include("../../../config/config_main.php");
include("../../../config/config_taskboard.php");
$data = $_POST;

$task_title = $_POST['company_name']." - New Deal";
$task_funding_amount_requested = $_POST['funding_amount'];
$task_todo = 0;
$task_container = 33;
$task_user = 1;
$task_type = $data['task_type'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, pkanban_url."ajax/save_task");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "task_title=".$task_title."&task_funding_amount_requested=".$task_funding_amount_requested."&task_todo=".$task_todo."&task_container=".$task_container."&task_user=".$task_user."&task_type=".$task_type."");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);

curl_close ($ch);

$server_output = json_decode($server_output);
//Getting Last Added Task ID
$Query = "select * from tasks order by task_id DESC limit 1";
$QueryRun = mysqli_query($con_TaskBoard,$Query);
$LastTask = mysqli_fetch_assoc($QueryRun);

$data['task_id'] = $LastTask['task_id'];
if ($data['task_type'] == "Finance") {
    
$InsertQuery = "INSERT INTO user_fastfund_form1 (
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
    '".$data['main_contact_name']."',
    '".$data['alternate_contact_name']."',
    '".$data['title1']."',
    '".$data['title2']."',
    '".$data['email1']."',
    '".$data['email2']."',
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
}else {
    $InsertQuery = "INSERT INTO user_suretybond_form1 (
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
    '".$data['main_contact_name']."',
    '".$data['alternate_contact_name']."',
    '".$data['title1']."',
    '".$data['title2']."',
    '".$data['email1']."',
    '".$data['email2']."',
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
}
mysqli_query($con_MAIN,$InsertQuery);
header("Location: ".base_url."tabs/contract_details.php");

?>