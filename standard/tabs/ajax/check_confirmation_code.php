<?php
session_start();
include "../../config/config_main.php";
$ConfirmationCode = $_POST['confirmationcode']; 

$Query = "SELECT * FROM `onboard_user` WHERE `user_confirmation_code`='".$ConfirmationCode."'"; 
$QueryR = mysqli_query($con_MAIN,$Query);
if(mysqli_num_rows($QueryR)>0){
	
	$Status = mysqli_fetch_assoc($QueryR);
	$CodeStatus = $Status['user_onboard_status'];
	$USERID = $Status['user_id'];
	if($CodeStatus == 'COMPLETED'){
?>	
					<input id="userid" class="form-control" value="<?php echo $USERID; ?>" type="hidden">
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
<?php	
	}else{
?>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR EMAIL ADDRESS</p>
					</div> 
					<input id="confirmationcode" class="form-control" value="<?php echo $ConfirmationCode; ?>" placeholder="" type="hidden">
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="email" class="form-control" type="text">
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