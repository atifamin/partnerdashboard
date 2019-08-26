<?php
session_start();
include "../../../config/config_main.php";
$ConfirmationCode = $_POST['confirmationcode']; 
$Email = $_POST['email'];

$Query = "SELECT * FROM `onboard_user` WHERE `user_confirmation_code`='".$ConfirmationCode."'"; 
$QueryR = mysqli_query($con_MAIN,$Query);
	
if(mysqli_num_rows($QueryR)>0){
	$onboard = mysqli_fetch_assoc($QueryR);
	$UserID = $onboard['user_id'];
	
	$Query1 = "SELECT * FROM `user` WHERE `user_id`=".$UserID." AND `user_email` = '".$Email."'"; 
	$Query1R = mysqli_query($con_MAIN,$Query1);
	if(mysqli_num_rows($Query1R)>0){
?>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR PASSWORD</p>
					</div> 
					<input id="confirmationcode" value="<?php echo $ConfirmationCode; ?>" type="hidden">
					<input type="hidden" id="email" value="<?php echo $Email; ?>" /> 
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="pwd1" class="form-control" type="password">
					</span>
					</div>
					<div class="yellow-alert">Confirm <strong>password</strong></div>
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="pwd2" class="form-control" type="password">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<button onclick="updateandlogin()" type="button" class="width-35 btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">SUBMIT</span>
					</button>					
<?php	
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