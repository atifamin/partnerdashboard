<?php
session_start();
include "../../config/config_main.php";
$Email = $_POST['email'];
$Password = $_POST['pwd'];

$Query = "SELECT * FROM `user` WHERE `user_status`='active' AND `user_email`='".$Email."' AND `user_password`='".$Password."'";
$QueryR = mysqli_query($con_MAIN,$Query);
if(mysqli_num_rows($QueryR)>0){
	$UserData = mysqli_fetch_assoc($QueryR);
	$_SESSION['user_id'] 			= $UserData['user_id'];
	$_SESSION['vendor_id'] 			= $UserData['vendor_id'];
	$_SESSION['certification_id'] 	= $UserData['certification_id'];
	$_SESSION['dbe_firm_id'] 		= $UserData['dbe_firm_id'];
	$_SESSION['user_type'] 			= $UserData['user_type'];
	$_SESSION['user_status'] 		= $UserData['user_status'];
	$_SESSION['user_offer_codes'] 		= $UserData['user_offer_codes'];
	$_SESSION['user_offer_score'] 		= $UserData['user_offer_score'];
	$_SESSION['user_email'] 		= $UserData['user_email'];
	$_SESSION['user_fname'] 		= $UserData['user_fname'];
	$_SESSION['user_lname'] 		= $UserData['user_lname'];
	$_SESSION['user_gender'] 		= $UserData['user_gender']; 
	echo 'LoggedIn';
}else{
	echo '<span class="red">Your eMail or password is wrong!</span>';
}

?>