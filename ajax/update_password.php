<?php
session_start();
include "../config/config_main.php";
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if (isset($_POST) && !empty($_POST)) {
	if ($password == $cpassword) {
		$new = md5($password);
		$Q1 = "UPDATE `user` SET `user_password`='".$new."' where `user_id` = ".$user_id."";
		$Q1R = mysqli_query($con_MAIN,$Q1);
		echo "<div style='font-size:20px;text-align:center;color:#0c627b;text-transform:uppercase;margin-top:30px;'>Password Recovered Successfuly!</div>";
	}else{
		echo "<div style='font-size:19px;text-align:center;color:#aa0a0a;text-transform:uppercase;margin-top:28px;'>Your password doesn't match!</div>";
		?>
		
			<div class="row" style="margin-top: 15px;">
				<div class="col-md-12" style="padding: 0px">
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type email">
						<input class="input100" type="email" id="email" placeholder="Email Address" value="<?php echo $row->user_email; ?>" style="font-size: 17px;padding: 0 22px;" readonly="readonly">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-md-6" style="padding: 0px">
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type user password">
						<input class="input100" type="password" id="password" placeholder="Enter Password" style="font-size: 17px;padding: 0 15px;">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="col-md-6" style="padding: 0px">
					<div class="wrap-input100 validate-input m-b-20" data-validate="Type confirm password">
						<input class="input100" type="password" id="cpassword" placeholder="Re Enter Password" style="font-size: 17px;padding: 0 15px;">
						<span class="focus-input100"></span>
					</div>
				</div>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" onclick="update_password(<?php echo $row->user_id; ?>)">
						SUBMIT
					</button>
				</div>
			</div>
			
<?php
	}
}else{
	echo "<div style='font-size:19px;text-align:center;color:#aa0a0a;text-transform:uppercase;margin-top:28px;'>Failed to Recover your password, try again!</div>";
}
?>