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

