<?php
session_start();
include "../config/config_main.php";
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$Hash = md5($Password);

if (isset($_POST) && !empty($_POST)) {
	$Query1 = "update user SET `user_password`=".$Hash." where user_id = ".$user_id."";
	$Query1R = mysqli_query($con_MAIN,$Query1);
	echo "<div style='font-size:20px;text-align:center;color:#0c627b;text-transform:uppercase;margin-top:30px;'>Password Recovered Successfuly!</div>";
}else{
	echo "<div style='font-size:19px;text-align:center;color:#aa0a0a;text-transform:uppercase;margin-top:28px;'>Failed to Recover your password, try again!</div>";
}
?>