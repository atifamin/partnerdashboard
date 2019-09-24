      
<?php
$CheckPrimeQ = 'SELECT `contract_id` FROM `cpw_main` WHERE `dbe_firm_id`='.$FirmID.'';
$CheckPrimeQR = mysqli_query($con_MAIN,$CheckPrimeQ) or die(mysqli_error());
$CheckPrime_N = mysqli_num_rows($CheckPrimeQR);
// Check Sub
$CheckSubQ = 'SELECT `sub_contractor_id` FROM `cpw_subcontractors` WHERE `dbe_firm_id`='.$FirmID.'';
$CheckSubQR = mysqli_query($con_MAIN,$CheckSubQ) or die(mysqli_error());
$CheckSub_N = mysqli_num_rows($CheckSubQR);
if($CheckPrime_N>0 & $CheckSub_N>0){
?>  
		<div class="nav-tabs-custom"> 
            <ul class="nav nav-tabs">
                <li class="active"><a href="#primeContracts" data-toggle="tab">PRIME CONTRACTS WON  <span>&nbsp;</span></a></li>
                <li><a href="#subContracts" data-toggle="tab">SUB CONTRACS WON <span>&nbsp;</span></a></li> 
            </ul>
            <!-- Content container -->
           
                <!-- Prime Contractors -->
             <div class="tab-content">
                <div class="tab-pane active" id="primeContracts">
                   <?php include "prime_contractors.php"; ?>
                </div>
               

                <!-- Sub Contractors -->
                <div class="tab-pane"  id="subContracts">
                <?php include "sub_contractors_only.php"; ?>
                </div>
                
            </div>
        </div>
<?php
}elseif($CheckPrime_N>0){
	include "prime_contractors.php";
}elseif($CheckSub_N>0){
	include "sub_contractors.php";
}
?>		
		