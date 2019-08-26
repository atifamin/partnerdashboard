<?php
session_start();
include "../../../config/config_main.php";
$ConfirmationCode = $_POST['confirmationcode']; 
$Email = $_POST['email'];
$Password = $_POST['pwd1'];
$Hash = md5($Password);
$Query = "SELECT * FROM `onboard_user` WHERE `user_confirmation_code`='".$ConfirmationCode."'"; 
$QueryR = mysqli_query($con_MAIN,$Query);
	
if(mysqli_num_rows($QueryR)>0){
	$onboard = mysqli_fetch_assoc($QueryR);
	$UserID = $onboard['user_id'];
	
	$Query1 = "SELECT * FROM `user` WHERE `user_id`=".$UserID." AND `user_email` = '".$Email."'"; 
	$Query1R = mysqli_query($con_MAIN,$Query1);
	if(mysqli_num_rows($Query1R)>0){

	$Update = "UPDATE `user` SET `user_password`='".$Hash."' WHERE `user_id`=".$UserID."";
	$UpdateR = mysqli_query($con_MAIN,$Update);

$Query = "SELECT * FROM `user` WHERE `user_status`='active' AND `user_id`=".$UserID."";
$QueryR = mysqli_query($con_MAIN,$Query);
if(mysqli_num_rows($QueryR)>0){
	$UserData = mysqli_fetch_assoc($QueryR);
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
	echo '
		<div class="cong_heading_1">CONGRATULATIONS!!</div>
		<div class="cong_heading_2">YOU HAVE SUCCESSFULLY ACTIVATED YOUR</div>
		<div class="cong_heading_3">SMALL BUSINESS SUCCESS DASHBOARD</div>
		<div class="cong_heading_4">PLEASE WAIT WHILE WE CONFIGURE YOUR DASHBOARD....</div>'; 
		
	$Status = "COMPLETED";	
	$UpdateStatus = "UPDATE `onboard_user` SET `user_onboard_status`='".$Status."' WHERE `user_id`=".$UserID." AND `user_confirmation_code`='".$ConfirmationCode."'";	
	$QueryR = mysqli_query($con_MAIN,$UpdateStatus);
	
}else{echo 'Partner ID is 0';}
	
}else{
?>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR EMAIL ADDRESS</p>
					</div> 
					<input id="confirmationcode" class="form-control" value="<?php echo $ConfirmationCode; ?>" placeholder="" type="hidden">
					<div class="yellow-alert">invalid email<br /><strong>please try again</strong></div>
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="email" class="form-control" value="<?php echo $Email; ?>" type="text">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<button onclick="checkemail()" type="button" class="width-35 btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">SUBMIT</span>
					</button>
<?php	
}
}else{
?>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR CONFIRMATION CODE HERE</p>
					</div>
					<div class="yellow-alert">invalid confirmation code<br /><strong>please try again</strong></div>
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="confirmationcode" class="form-control" value="<?php echo $ConfirmationCode; ?>" placeholder="" type="text">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<button onclick="checkconfirmationcode()" type="button" class="width-35 btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">SUBMIT</span>
					</button> 
<?php	
}
?>