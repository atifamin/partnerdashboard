<div class="row">
<div class="col-sm-12">
<div style="clear:both;height:25px;"></div>
<?php
//echo $CertificationID.' '.$FirmID;
if($CertificationID >0 || $FirmID >0){

if($CertificationID >0 && $FirmID >0){
	$Tab5_Q1 = 'SELECT `City`, `State`, `Postal Code` FROM `sbdvbe` WHERE `Certification ID`='.$CertificationID.'';
}elseif($CertificationID >0){
	$Tab5_Q1 = 'SELECT `City`, `State`, `Postal Code` FROM `sbdvbe` WHERE `Certification ID`='.$CertificationID.'';
}elseif($FirmID >0){
	$Tab5_Q1 = 'SELECT `City`, `State`, `Zip` AS `Postal Code` FROM `dbe` WHERE `Firm ID`='.$FirmID.'';
} 
$Tab5_Q1R = mysqli_query($con_MAIN,$Tab5_Q1) or die(mysqli_error());
if(mysqli_num_rows($Tab5_Q1R)>0){
	$UsData = mysqli_fetch_assoc($Tab5_Q1R);
	$ZipCode 	= $UsData['Postal Code'];
	$City 		= $UsData['City'];
	$State 		= $UsData['State'];
?>
<input type="hidden" id="user_zip_code" value="<?php echo $ZipCode; ?>" /> 
<?php include "tab4/score.php";  ?>
<?php include "tab4/sbdc.php";  ?>
<?php include "tab4/vboc.php";  ?>
<?php include "tab4/others.php";  ?>

<?php 
}else{
?>
<div class="alert alert-danger">No Record Found!</div>
<?php	
}
}else{
?>
<div class="alert alert-danger">No Record Found!</div>
<?php	
} ?>
</div>
</div>