<?php session_start(); ?>
<?php
include("../config/config_main.php");
include('../base_path.php');
?>
<link href="../assets/smartWizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
<link href="../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" href="../bower_components/jquery.dropdown-master/css/demo.css" /> -->
<link rel="stylesheet" type="text/css" href="<?PHP echo base_url; ?>bower_components/jquery.dropdown-master/css/dropdown.css" />
<style>
.form-group.has-error .help-block {
	font-size: 12px;
}
#form-step-1{padding:2%;}
#bottom-message{
  position: absolute;
  top: 130px;
  z-index: 10000;
}
</style>
<!-- Include SmartWizard CSS -->

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
$businesTypes = getBusiTypeByParent("SELECT * FROM business_type WHERE parent_id = 0", $con_MAIN);

foreach($businesTypes as $key=>$val){
  $businesTypes[$key]->sub = getBusiTypeByParent("SELECT * FROM business_type WHERE parent_id = ".$val->id."", $con_MAIN);
}

function exec_sqlQuery($con, $q){
  $result = mysqli_query($con,$q);
  return $result;
}

function bizVaultStatus($con){
  $userData = $_SESSION;
  $gettingBasicFiles = exec_sqlQuery($con, "SELECT *
  FROM bizvault_files_and_folders
  WHERE parent_id = (
  SELECT id
  FROM bizvault_files_and_folders
  WHERE slug = 'business_basic')");
  
  $completed = "no";
  $percentage = 0;
  $total_files = $gettingBasicFiles->num_rows;
  $uploaded_files = 0;

  while($row = mysqli_fetch_array($gettingBasicFiles)){
      $checkIfFileExists = exec_sqlQuery($con, "SELECT * FROM bizvault_filedoc_list WHERE bizvault_files_and_folders_id = ".$row['id']." AND user_id = ".$userData['user_id']."");
      if($checkIfFileExists->num_rows>0){
          $uploaded_files =+ $uploaded_files+1;
      }
  }
  if($total_files!=0 && $total_files==$uploaded_files){
      $completed = "yes";
  }
  if($uploaded_files!=0){
      $percentage = number_format($uploaded_files/$total_files*100);
  }

  $data['completed'] = $completed;
  $data['percentage'] = $percentage;
  return $data;
}



$FirmID = $_SESSION['dbe_firm_id'];
$Tab1_Q1 = 'SELECT *
FROM prime_contractor pc
JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
WHERE pc.contract_number = sc.contract_number AND pc.dbe_firm_id = '.$FirmID.'
GROUP BY pc.contract_id ORDER BY pc.contract_id DESC';
$Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error());  
$Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R); 

?>
<textarea name="bizVaultStatus" id="bizVaultStatus" cols="30" rows="10" style="display:none"><?php echo json_encode(bizVaultStatus($con_MAIN)); ?></textarea>
<!-- Optional SmartWizard theme -->

<div id="apply-load-modal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <h1 style="text-align:center;"><strong>FastFund Basic Application Form</strong></h1>
        <form action="apply_loan_form/apply_loan_add.php" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
          
          <!-- SmartWizard html -->
          <div id="smartwizard">
            <ul>
              <li><a href="#step-1">Step 1<br />
                <small>Contact Information</small></a></li>
              <li><a href="#step-2">Step 2<br />
                <small>Company Profile</small></a></li>
              <li><a href="#step-3">Step 3<br />
                <small>Finish</small></a></li>
            </ul>
            <div>
              <div id="step-1">
                <h2>Contact Information</h2>
                <div id="form-step-0" role="form" data-toggle="validator">
                  <?php include("apply_loan_form/step1.php"); ?>
                </div>
              </div>
              <div id="step-2">
                <h2>Company Profile</h2>
                <div id="form-step-1" role="form" data-toggle="validator">
                  <?php include("apply_loan_form/step2.php"); ?>
                </div>
              </div>
              <!-- <div id="step-3">
                <h2>Liabilities</h2>
                <div id="form-step-2" role="form" data-toggle="validator">
                  <?php //include("apply_loan_form/step3.php"); ?>
                </div>
              </div>
              <div id="step-4">
                <h2>Business Bank Account And Writing Instructions</h2>
                <div id="form-step-3" role="form" data-toggle="validator">
                  <?php //include("apply_loan_form/step4.php"); ?>
                </div>
              </div>
              <div id="step-5">
                <h2>Personal OR Business Referances (Provide Two)</h2>
                <div id="form-step-4" role="form" data-toggle="validator">
                  <?php //include("apply_loan_form/step5.php"); ?>
                </div>
              </div>
              <div id="step-6">
                <div id="form-step-5" role="form" data-toggle="validator">
                  <?php //include("apply_loan_form/step6.php"); ?>
                </div>
              </div> -->
              <div id="step-3" class="">
                <h2>Terms and Conditions</h2>
                <?php include("apply_loan_form/step3.php"); ?>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- <div class="modal-footer no-margin-top">
          <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
          <button type="submit" class="btn btn-primary">Apply Loan</button>
        </div> --> 
    </div>
  </div>
</div>
<!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Include jQuery Validator plugin --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Include SmartWizard JavaScript source --> 
<script type="text/javascript" src="../assets/smartWizard/js/jquery.smartWizard.js"></script>
<script src="<?PHP echo base_url; ?>bower_components/jquery.dropdown-master/js/jquery.dropdown.js"></script>
<script type="text/javascript">
(function($) {
  $(function() {
    $('#type_of_business').dropdown();
  });
}(jQuery));

$(document).ready(function(){
    var $bizVaultStatus = $("#bizVaultStatus").html();
    $bizVaultStatus = JSON.parse($bizVaultStatus);
    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
    .addClass('btn btn-info')
    .on('click', function(){
        if( !$(this).hasClass('disabled')){
            var elmForm = $("#myForm");
            if(elmForm){
                elmForm.validator('validate');
                var elmErr = elmForm.find('.has-error');
                if(elmErr && elmErr.length > 0){
                    alert('Oops we still have error in the form');
                    return false;
                }else{
                    alert('Great! we are ready to submit form');
                    elmForm.submit();
                    return false;
                }
            }
        }
    });
    
    var btnCancel = $('<button></button>').text('Cancel')
    .addClass('btn btn-danger')
    .on('click', function(){
        $('#smartwizard').smartWizard("reset");
        $('#apply-load-modal').modal('hide');
        $('#myForm').find("input, textarea").val("");
    });
    // Smart Wizard
    $('#smartwizard').smartWizard({
      selected: 0,
      theme: 'dots',
      transitionEffect:'fade',
      toolbarSettings: {toolbarPosition: 'bottom',
                        toolbarExtraButtons: [btnFinish, btnCancel]
                      },
      anchorSettings: {
                  markDoneStep: true, // add done css
                  markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                  removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                  enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
              }
    });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
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

    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
        // Enable finish button only on last step
        if(stepNumber == 6){
            $('.btn-finish').removeClass('disabled');
        }else{
            $('.btn-finish').addClass('disabled');
        }
    });
    
    if($bizVaultStatus.completed=="no"){
      $(".sw-toolbar-bottom").html('<div class="row" style="text-align:center;padding: 3% 0;background-color:white;" id="bottom-message"><div class="col-md-12" style="background-color:#17375e;padding:5% 0;"><div class="col-md-offset-2 col-md-8"><h1 style="font-size:42px;color:white">YOU ARE MISSING FILES IN YOUR bizVALUT<sup>TM</sup></h1></div></div><div class="col-md-12" style="background-color:#4f81bd;"><h1 style="color:#ffc000;font-weight:900;">STATUS</h1><p style="color:#f8fe00;font-size:28px;">In order to complete your Funding Request Please complete uploading your basic files to your bizVAULT</p></div><div class="col-md-12" style="background-color:#17375e;padding:5% 0;"><div class="col-md-offset-2 col-md-8"><a href="<?=base_url.'tabs/bizVault.php'?>" class="btn btn-block btn-primary" style="background-color:#cc6600;border-color:#cc6600;font-size:36px;color:white;">CLICK HERE TO UPLOAD <br>MISSING FILES</a></div></div></div>');
    }
});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
});

</script> 

<!-- <script>
	$("#apply_loan_form").on("submit", function(e){
		e.preventDefault();
		var task_title = $("#task_title").val();
		var task_funding_amount_requested = $("#task_funding_amount_requested").val();
		var task_todo = 0;
		var task_container = 33;
		var task_user = 1;
		$.post("<?php echo pkanban_url; ?>ajax/save_task",{task_title:task_title, task_funding_amount_requested:task_funding_amount_requested, task_todo:task_todo, task_container:task_container, task_user:task_user}).done(function(e){
			location.reload();
		});
	});
</script> -->