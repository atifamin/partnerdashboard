      
<?php
$CheckPrimeQ = 'SELECT `contract_id` FROM `prime_contractor` WHERE `dbe_firm_id`='.$FirmID.'';
$CheckPrimeQR = mysqli_query($con_MAIN,$CheckPrimeQ) or die(mysqli_error());
$CheckPrime_N = mysqli_num_rows($CheckPrimeQR);
// Check Sub
$CheckSubQ = 'SELECT `sub_contractor_id` FROM `sub_contractor` WHERE `dbe_firm_id`='.$FirmID.'';
$CheckSubQR = mysqli_query($con_MAIN,$CheckSubQ) or die(mysqli_error());
$CheckSub_N = mysqli_num_rows($CheckSubQR);
if($CheckPrime_N>0 & $CheckSub_N>0){
?>  
		<div id="horizontal_tab_for_both_contractors"> 
            <ul>
                <li><a>PRIME CONTRACTS WON  <span>&nbsp;</span></a></li>
                <li><a>SUB CONTRACS WON <span>&nbsp;</span></a></li> 
            </ul>
            <!-- Content container -->
            <div>
                <!-- Prime Contractors -->
                <div><?php include "prime_contractors.php"; ?></div>

                <!-- Sub Contractors -->
                <div><?php include "sub_contractors_only.php"; ?></div>
            </div>
        </div>
<?php
}elseif($CheckPrime_N>0){
	include "prime_contractors.php";
}elseif($CheckSub_N>0){
	include "sub_contractors.php";
}
?>		
		