<!-- <div id="apply-load-modal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <form action="" method="post" id="apply_loan_form">
      <div class="modal-content">
        <div class="modal-body">
          <input type="hidden" name="task_todo" value="0">
		  <input type="hidden" name="task_container" value="33">
		  <div class="form-group">
            <label for="task_title" class="form-control-label">Deal Title :</label>
            <input name="task_title" id="task_title" type="text" class="form-control" required="required">
          </div> 
		  <div class="form-group">
            <label for="task_funding_amount_requested" class="form-control-label">Loan Amount :</label>
            <input name="task_funding_amount_requested" id="task_funding_amount_requested" type="text" class="form-control" required="required">
          </div>
        </div>
        <div class="modal-footer no-margin-top">
          <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal"> <i class="ace-icon fa fa-times"></i> Close </button>
          <button type="submit" class="btn btn-primary">Apply Loan</button>
        </div>
      </div>
    </form>
  </div>
</div> -->
<link href="../assets/smartWizard/css/smart_wizard.css" rel="stylesheet" type="text/css" />
<link href="../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
<style>
.form-group.has-error .help-block {
	font-size: 12px;
}
#form-step-1{padding:2%;}
</style>
<!-- Include SmartWizard CSS -->

<!-- Optional SmartWizard theme -->
<link href="../assets/smartWizard/css/smart_wizard_theme_circles.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_arrows.css" rel="stylesheet" type="text/css" />
<link href="../assets/smartWizard/css/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />
<div id="apply-load-modal" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <h1 style="text-align:center;">Standard User Online Application Form</h1>
        <form action="apply_loan_form/apply_loan_add.php" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
          
          <!-- SmartWizard html -->
          <div id="smartwizard">
            <ul>
              <li><a href="#step-1">Step 1<br />
                <small>Contact Information</small></a></li>
              <li><a href="#step-2">Step 2<br />
                <small>Company Profile</small></a></li>
              <li><a href="#step-3">Step 3<br />
                <small>Liabilities</small></a></li>
              <li><a href="#step-4">Step 4<br />
                <small>Bank Account</small></a></li>
              <li><a href="#step-5">Step 5<br />
                <small>Business References</small></a></li>
              <li><a href="#step-6">Step 6<br />
                <small>Authorized Management</small></a></li>
              <li><a href="#step-7">Step 7<br />
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
              <div id="step-3">
                <h2>Liabilities</h2>
                <div id="form-step-2" role="form" data-toggle="validator">
                  <?php include("apply_loan_form/step3.php"); ?>
                </div>
              </div>
              <div id="step-4">
                <h2>Business Bank Account And Writing Instructions</h2>
                <div id="form-step-3" role="form" data-toggle="validator">
                  <?php include("apply_loan_form/step4.php"); ?>
                </div>
              </div>
              <div id="step-5">
                <h2>Personal OR Business Referances (Provide Two)</h2>
                <div id="form-step-4" role="form" data-toggle="validator">
                  <?php include("apply_loan_form/step5.php"); ?>
                </div>
              </div>
              <div id="step-6">
                <div id="form-step-5" role="form" data-toggle="validator">
                  <?php include("apply_loan_form/step6.php"); ?>
                </div>
              </div>
              <div id="step-7" class="">
                <h2>Terms and Conditions</h2>
                <?php include("apply_loan_form/step7.php"); ?>
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

<!-- Include jQuery Validator plugin --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script> 
<script src="../plugins/iCheck/icheck.min.js"></script> 
<!-- Include SmartWizard JavaScript source --> 
<script type="text/javascript" src="../assets/smartWizard/js/jquery.smartWizard.js"></script> 
<script type="text/javascript">
$(document).ready(function(){
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
        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        
        if(stepDirection === 'forward' && elmForm){
          
            elmForm.validator('validate');
            var elmErr = elmForm.children('.has-error');
            
            if(elmErr && elmErr.length > 0){
                // Form validation failed
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

});

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
  checkboxClass: 'icheckbox_minimal-blue',
  radioClass   : 'iradio_minimal-blue'
})
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