<?php
session_start();
$UserID 			 = $_SESSION['user_id'];
$PartnerID			 = $_SESSION['partner_id']; 
include "../config/config_prmsub.php";
$FinservID = $_POST['finserv_id'];
$Status = $_POST['status'];
$Query = "UPDATE `finserv` SET `finserv_status`='".$Status."' WHERE `finserv_id`=".$FinservID."";
$QueryR = mysqli_query($con_PRMSUB,$Query) or die(mysqli_error());
echo 'Offer Updated Successfully.';
?>