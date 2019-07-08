<?php
session_start();
include "../config/config_main.php";
$UserID = $_POST['userid'];
$Email = $_POST['email'];
$Password = $_POST['password']; 
$Hash = md5($Password);
$Direct = $_POST['direct_login'];
	if($Direct == 'Yes'){
		$Query1 = "SELECT * FROM `user` WHERE `user_email` = '".$Email."' AND `user_password`= '".$Hash."'";
	}else{
		$Query1 = "SELECT * FROM `user` WHERE `user_id`=".$UserID." AND `user_email` = '".$Email."' AND `user_password`= '".$Hash."'";
	}
	$Query1R = mysqli_query($con_MAIN,$Query1);
	if(mysqli_num_rows($Query1R)>0){
		
		$UserData = mysqli_fetch_assoc($Query1R);
		$_SESSION['user_id'] 			= $UserData['user_id'];
		$_SESSION['vendor_id'] 			= $UserData['vendor_id'];
		$_SESSION['certification_id'] 	= $UserData['certification_id'];
		$_SESSION['dbe_firm_id'] 		= $UserData['dbe_firm_id'];
		$_SESSION['partner_id'] 		= $UserData['partner_id'];
		$_SESSION['user_type'] 			= $UserData['user_type'];
		$_SESSION['user_status'] 		= $UserData['user_status'];
		$_SESSION['user_offer_codes'] 	= $UserData['user_offer_codes'];
		$_SESSION['user_offer_score'] 	= $UserData['user_offer_score'];
		$_SESSION['user_email'] 		= $UserData['user_email'];
		$_SESSION['user_fname'] 		= $UserData['user_fname'];
		$_SESSION['user_lname'] 		= $UserData['user_lname'];
		$_SESSION['user_gender'] 		= $UserData['user_gender'];
	echo '<div class="cong_heading_4">PLEASE WAIT WHILE WE CONFIGURE YOUR DASHBOARD....</div>';
	}else{
?>
					<input id="userid" class="form-control" value="<?php echo $UserID; ?>" type="hidden">
					<div class="yellow-alert">Your eMail OR password is wrong.</div>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR EMAIL ADDRESS</p>
					</div>  
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="email" class="form-control" type="text">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR PASSWORD</p>
					</div>
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="password1" class="form-control" type="password">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<button onclick="logmein()" type="button" class="width-35 btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">SUBMIT</span>
					</button>
				<!-- 	<a href="Register.php" type="button" class="width-35 btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">Register</span>
					</a> -->
<?php		
	}
?>