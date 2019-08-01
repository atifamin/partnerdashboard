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

$query = "SELECT * from user_info_update where user_id = ".$_SESSION['user_id']."";
$res = mysqli_query($con_AWT,$query);
$row = mysqli_fetch_object($res);
if (count($row) == 0) {
	echo "<script>$(document).ready(function(){
			$('#user_info_modal').modal({
				modal: 'show',
				backdrop: 'static', 
				keyboard: false});
			});</script>";
}


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
<div id="user_info_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
<?php 
include("../includes/footer.php");
 ?>
<script>
// $('#user_info_modal').modal({
//     backdrop: 'static',
//     keyboard: false
// });

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