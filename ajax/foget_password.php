<?php
session_start();
include "../config/config_main.php";
include "../config/base_path.php";
$Email = $_POST['email'];

if (isset($Email) && !empty($Email)) {
	$Query1 = "SELECT * FROM `user` WHERE `user_email` = '".$Email."' ";
	$Query1R = mysqli_query($con_MAIN,$Query1);
	if(mysqli_num_rows($Query1R)>0){

		$res = mysqli_fetch_assoc($Query1R);
		//$m = echo "<a href='".url."password_reset.php'>Here</a>";
		$to = $res['user_email'];
		$subject = "Recovered Password";

		$message = "Click <a href='".url."password_reset.php'>Here</a> to add your Password";
		$headers = "From : https://cpm-stage1.pw";
		if(mail($to, $subject, $message, $headers)){
			echo '<div class="cong_heading_4">MAIL HAS BEEN SENT TO YOUR MAIL ADDRESS.......</div>';
		}else{
			echo "Failed to Recover your password, try again";
		}

	}else{
		echo '<div class="cong_heading_4">USER EMAIL DOES NOT EXIST IN DATABASE</div>';
	}
}else{
	echo '<div class="cong_heading_4">PLEASE ENTER YOUR MAIL ADDRESS....</div>';
}

?>