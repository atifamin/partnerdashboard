<?php
include("../includes/header.php");
include("../includes/top_nav.php");
include("../includes/side_bar.php");
include("../functions/functions.php"); 

?>

<link href="../assets/smartWizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
<link href="../plugins/iCheck/all.css" rel="stylesheet" type="text/css"/>

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

<?php 
function getBusiTypeByParent($QUERY, $CONN){
  $QUERY_R = exec_sqlQuery($CONN, $QUERY);
  $array = array();
  while($Row = mysqli_fetch_array($QUERY_R)){
    $type = new stdClass;
    $type->id = $Row['id'];
    $type->parent_id = $Row['parent_id'];
    $type->company_id = $Row['company_id'];
    $type->slug = $Row['slug'];
    $type->name = $Row['name'];
    $array[] = $type;
  }
  return $array;
}
$businesTypes = getBusiTypeByParent("SELECT * FROM business_type WHERE parent_id = 0", $con_AWT);
?>

<style>
.form-group.has-error .help-block {
	font-size: 12px;
}
#form-step-01{padding:2%;}
#bottom-message{
  position: absolute;
  top: 130px;
  z-index: 10000;
}
.dropdown-nested > .dropdown-nested-toggle{width:100%}
.dropdown-nested > .dropdown-nested-toggle > .dropdown-nested-text{color:black;}
.dropdown-nested > .dropdown-nested-toggle > .dropdown-nested-icon{float:right;margin-top: 8px;}
</style>

<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger">There are no contracts</div>
	</div>
</div>
<?php
 } ?>

<?php 
	$query1 = "SELECT * from user_info_view where (id = ".$_SESSION['user_id']." AND trans_type='user_info') or (id = ".$_SESSION['dbe_firm_id']." AND trans_type='dbe') or (id = ".$_SESSION['certification_id']." AND trans_type='sbdvbe')";
	$result1 = mysqli_query($con_AWT,$query1);
	$user_info = mysqli_fetch_object($result1);
?>

<div id="user_info_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #1F487C;">
        <h3 class="modal-title text-white">CONGRATULATIONS!<br>We’ve successfully configured your dashboard<br>Please take a quick moment to confirm that<br>Your data records are accurate and up to date.</h3>
      </div>
      <div class="modal-body">
      	<form action="apply_loan_form_user_info/loan_form_add_user_info.php" id="myForm-1" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
	        <div id="smartwizard_login">
	            <ul>
	              <li><a href="#step-01">Step 1<br />
	                <small>Contact Information</small></a></li>
	              <li><a href="#step-02">Step 2<br />
	                <small>Company Profile</small></a></li>
	              <li><a href="#step-03">Step 3<br />
	                <small>Finish</small></a></li>
	            </ul>
	            <div>
	              <div id="step-01">
	                <h2>Contact Information</h2>
	                <div id="form-step-00" role="form" data-toggle="validator">
	                	<?php include("apply_loan_form_user_info/step_1.php"); ?>
	                </div>
	              </div>
	              <div id="step-02">
	                <h2>Company Profile</h2>
	                <div id="form-step-01" role="form" data-toggle="validator">
	                	<?php include("apply_loan_form_user_info/step_2.php"); ?>
	                </div>
	              </div>
	              <div id="step-03" class="">
	                <h2>Terms and Conditions</h2>
	                <p> Terms and conditions: Keep your smile :) </p>
	                <div id="form-step-03" role="form" data-toggle="validator">
	                	<?php include("apply_loan_form_user_info/step_3.php"); ?>
	                </div>
	              </div>
	            </div>
	        </div>
    	</form>
      </div>
    </div>

  </div>
</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="../assets/smartWizard/js/jquery.smartWizard.js"></script>
<?php 
include("../includes/footer.php");
 ?>

<script>
$('.no_condition').on("click",function(e) {
	var name = $(this).attr('id');
	$('input[name='+name+']').removeAttr('readonly',false);
	$('#'+name+'').removeAttr('disabled',false);
});

$('.yes_condition').on("click",function(e) {
	var name = $(this).attr('id');
	$('input[name='+name+']').attr('readonly',true);
	$('#'+name+'').attr('disabled',true);
});

(function($) {
  $(function() {
    $('#type_of_business_login').dropdown();
  });
}(jQuery));

$(document).ready(function(){
	//alert();    
	// Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
    .addClass('btn btn-info')
    .on('click', function(){
        if( !$(this).hasClass('disabled')){
            var elmForm = $("#myForm-1");
            if(elmForm){
                elmForm.validator('validate');
                var elmErr = elmForm.find('.has-error');
                if(elmErr && elmErr.length > 0){
                    alert('Oops we still have error in the form');
                    return false;
                }else{
                    alert('Great! Your Information is Updated');
                    elmForm.submit();
                    return false;
                }
            }
        }
    });

    // Smart Wizard
    $('#smartwizard_login').smartWizard({
      selected: 0,
      theme: 'dots',
      transitionEffect:'fade',
      toolbarSettings: {toolbarPosition: 'bottom',
                        toolbarExtraButtons: [btnFinish]
                      },
      anchorSettings: {
                  markDoneStep: true, // add done css
                  markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                  removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                  enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
              }
    });

    $("#smartwizard_login").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);
        //stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        
        if(stepDirection === 'forward' && elmForm){
          
            elmForm.validator('validate');
            var elmErr = elmForm.children('.has-error');
            var elmFormErr = elmForm.find('.has-error');
            if(elmErr && elmFormErr.length > 0){
                return false;
            }
        }
        return true;
    });

    $("#smartwizard_login").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
        // Enable finish button only on last step
        if(stepNumber == 6){
            $('.btn-finish').removeClass('disabled');
        }else{
            $('.btn-finish').addClass('disabled');
        }
    });
});

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