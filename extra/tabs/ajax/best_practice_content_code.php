<?php
session_start();
include "../../config/config_prmsub.php";
include "../../functions/functions.php";

	$Limit = '';
	$PageID = $_POST['pageid'];
	$TotalRecord = $_POST['totalCFM'];
	$OFFSET = $PageID-1;
	$OFFSETLast = $TotalRecord-1;
	if($PageID == 1){
		$Limit = ' LIMIT 1 OFFSET 0';
	}elseif($PageID == $TotalRecord){
		$Limit = ' LIMIT 1 OFFSET '.$OFFSETLast.'';
	}else{
		$Limit = ' LIMIT 1 OFFSET '.$OFFSET.'';
	}
	
	$Tab2_Q5 = 'SELECT `cfm_id`,`content_code` FROM `cfm` WHERE `type`="Best Practices" '.$Limit.'';
	$Tab2_Q5R = mysqli_query($con_PRMSUB,$Tab2_Q5) or die(mysqli_error());
	$Tab2_Index5 = 1;
	$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);
	$ContentCode = $Tab2_Q5D['content_code'];
	
	// For View Log
	$CFMid	 = $Tab2_Q5D['cfm_id'];
	$UserID		 = $_SESSION['user_id'];
	$Insert = "INSERT INTO `cfm_views`(`cfm_user_id`,`cfm_id`,`cfm_view_date`) VALUES ('".$UserID."','".$CFMid."','".date('Y-m-d H:i:s')."')";
	$Tab2_Q5R = mysqli_query($con_PRMSUB,$Insert) or die(mysqli_error());
?>
<li class="tabpane_best_1"> 
	<a><input <?php if(strpos($ContentCode,'GM') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> General Management</a>
</li>
<li class="tabpane_best_2"> 
	<a><input <?php if(strpos($ContentCode,'CI') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Cash In</a>
</li>
<li class="tabpane_best_3"> 
	<a><input <?php if(strpos($ContentCode,'CO') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Cash Out</a>
</li>
<li class="tabpane_best_4"> 
	<a><input <?php if(strpos($ContentCode,'MI') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Miscellaneous</a>
</li>