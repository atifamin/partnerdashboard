<?php
include("../includes/header.php");
include("../includes/top_nav.php");
include("../includes/side_bar.php");
include ("../functions/functions.php"); 
?>

<div class="row">
<div class="col-sm-12">
<div style="clear:both;height:25px;"></div>
<?php
//echo $CertificationID.' '.$FirmID;
$CertificationID = $_SESSION['certification_id'];
$FirmID = $_SESSION['dbe_firm_id'];
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

<a href="#score"  data-toggle="collapse" aria-expanded="false" aria-controls="score">
<div class=" tab3_1" style="float:left;width:100%;background:#e4e6e9;padding:2%;margin-bottom:2%;">
	<div class="col-lg-6">
	<img src="<?php echo base_url; ?>assets/img/score_small1.png" alt="" style="width: 50%;"  class="img-responsive" /> 
	</div>
	<div class="col-lg-6">
	<span class="scoretitle" style="color: #0B70B8;font-size: 18px;margin: 39px 8px 0 0;float: left;">Service Core of Retired Executives</span>
	</div>
	
	<!-- <div id="tab5_score_response"><img src="<?php echo base_url; ?>assets/img/loading.gif" alt="Loader" style="margin-left:45%;" /></div> -->
</div>
</a>


<?php include "tab4/score.php";  ?>
<br>
<a href="#sbdc"  data-toggle="collapse" aria-expanded="false" aria-controls="sbdc">
<div class="tab3_2" style="float:left;width:100%;background:#e4e6e9;;padding:2%;margin-bottom:2%;">
	<div class="col-lg-6">
	<img src="<?php echo base_url; ?>assets/img/sbdc.png" alt=""  class="img-responsive" /> 
	</div>
	<div class="col-lg-6">
	<span class="scoretitle" style="color: #0B70B8;font-size: 18px;margin: 39px 8px 0 0;float: left;">Small Business Development Centers</span>
	</div>
</div>
</a>

<?php include "tab4/sbdc.php";  ?>
<br>
<a href="#vboc"  data-toggle="collapse" aria-expanded="false" aria-controls="vboc">
<div class="tab3_1" style="float:left;width:100%;background:#e4e6e9;padding:2%;margin-bottom:2%;">
	<div class="col-lg-6">
	<img src="<?php echo base_url; ?>assets/img/vboc.png" alt="" class="img-responsive" /> 
	</div>
	<div class="col-lg-6">
	<span class="scoretitle" style="color: #0B70B8;font-size: 18px;margin: 39px 8px 0 0;float: left;">Veteran Business Outreach Centers</span>
	</div>
</div>
</a>
<?php include "tab4/vboc.php";  ?>
<br>
<a href="#other"  data-toggle="collapse" aria-expanded="false" aria-controls="other">
<div class=" tab3_2" style="float:left;width:100%;background:#e4e6e9;;padding:2%;margin-bottom:2%;"> 
	<div class="col-lg-12">
	<span class="scoretitle" style="text-align:center;font-size:22px;">OTHER SUPPORT CENTERS</span>
	</div>
</div>
</a>
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
<?php 
include("../includes/footer.php");
 ?>