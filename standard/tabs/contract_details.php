<?php

include("../includes/header.php");
include("../includes/top_nav.php");
include("../includes/side_bar.php");
include("../functions/functions.php"); 

?>
<?php include("../includes/stats.php") ?>
<?php
$VendorID 			= $_SESSION['vendor_id'];
$CertificationID 	= $_SESSION['certification_id'];
$FirmID 			= $_SESSION['dbe_firm_id'];

if($FirmID > 0){
	
	$CheckPrimes = 'SELECT COUNT(*) AS PrimeContractors FROM `prime_contractor` WHERE `dbe_firm_id` ='.$FirmID.'';
	$CheckPrimesR = mysqli_query($con_AWT,$CheckPrimes);
	$TotalPrimes = mysqli_fetch_assoc($CheckPrimesR);
	$TotalPrimes = $TotalPrimes['PrimeContractors'];
	
	$CheckSub = 'SELECT COUNT(*) AS SubContractors FROM `sub_contractor` WHERE `dbe_firm_id` ='.$FirmID.'';
	$CheckSubR = mysqli_query($con_AWT,$CheckSub);
	$TotalSub = mysqli_fetch_assoc($CheckSubR);
	$TotalSub = $TotalSub['SubContractors'];
	 
	if($TotalPrimes>0 && $TotalSub>0){
		include "tab1/both_contractors.php";
	}elseif($TotalPrimes>0){
		include "tab1/prime_contractors.php";
	}elseif($TotalSub>0){ 
		include "tab1/sub_contractors.php";
	}
	
}elseif($CertificationID>0 || $VendorID>0){
	include "tab1/scpr_prime_contracts.php";
}else{
?>
<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger">There are no contracts</div>
	</div>
</div>
<?php
 } ?>

 
<?php 
include("../includes/footer.php");
 ?>
<script>

$("#cont-detail-6-anc").click(function(){
	  if($("#cont-detail-6-chev").hasClass('ace-icon fa fa-chevron-up')){
		$("#cont-detail-6-chev").removeClass("ace-icon fa fa-chevron-up");
		$("#cont-detail-6-chev").addClass("ace-icon fa fa-chevron-down");
	  }
	  else{
		$("#cont-detail-6-chev").removeClass("ace-icon fa fa-chevron-down");
		$("#cont-detail-6-chev").addClass("ace-icon fa fa-chevron-up");
	  }
  });

  $('#view-sub-cont-6-anc').click(function(){
		if($('#view-sub-cont-6-chev').hasClass('ace-icon fa fa-chevron-up')){
			
			
			$('#view-sub-cont-6-chev').removeClass('ace-icon fa fa-chevron-up');
			$('#view-sub-cont-6-chev').addClass('ace-icon fa fa-chevron-down');
			
		}
		else{
			
			$('#view-sub-cont-6-chev').removeClass('ace-icon fa fa-chevron-down');
			$('#view-sub-cont-6-chev').addClass('ace-icon fa fa-chevron-up');
		}
	});

<?php 
	
	echo $chevronsubContractOnlyMore;
	
	?>

</script>