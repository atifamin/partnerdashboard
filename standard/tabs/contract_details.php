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
<link href="../plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

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


<div id="user_info_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header text-center" style="background-color: #1F487C;">
        <h4 class="modal-title text-white">CONGRATULATIONS!<br>We’ve successfully configured your dashboard<br>Please take a quick moment to confirm that<br>Your data records are accurate and up to date.</h4>
      </div>
      <div class="modal-body">
      	<form action="apply_loan_form/apply_loan_add.php" id="myForm-1" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
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
	                  	<div class="row">
						  <div class="col-md-12">
						    <label for="company_name">Company Name:</label>
						    <input type="text" class="form-control" name="company_name" id="company_name" required="" readonly="" value="Vision Plus">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-12 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-4 ">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-8">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="col-md-12">
						    <label for="address">Address:</label>
						    <input type="text" class="form-control" name="address" id="address">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-12 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-4 ">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-8">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-8">
						    <label for="city">City:</label>
						    <input type="text" class="form-control" name="city" id="city">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-2">
						    <label for="state">State:</label>
						    <input type="text" class="form-control" name="state" id="state">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-2">
						    <label for="zip_code">Zip Code:</label>
						    <input type="text" class="form-control" name="zip_code" id="zip_code">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-12 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-4 ">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-8">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-8">
						    <label for="website">Website:</label>
						    <input type="text" class="form-control" name="website" id="website">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="phone">Phone:</label>
						    <input type="text" class="form-control" name="phone" id="phone">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-8 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-6">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-6">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-4 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-7">
						  			<label for="company_name" class="mt-10">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-5">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-8">
						    <label for="main_contact_name">Main Contact Name:</label>
						    <input type="text" class="form-control" name="main_contact_name" id="main_contact_name">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-4">
						    <label for="alternate_contact_name">Alternate Contact Name:</label>
						    <input type="text" class="form-control" name="alternate_contact_name" id="alternate_contact_name">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-8 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-6">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-6">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-4 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-7">
						  			<label for="company_name" class="mt-10">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-5">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-6">
						    <label for="title1">Title:</label>
						    <input type="text" class="form-control" name="title1" id="title1">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-6">
						    <label for="title2">Title:</label>
						    <input type="text" class="form-control" name="title2" id="title2">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-6 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-7">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-5">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-6 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-7">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-5">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-6">
						    <label for="email1">Email:</label>
						    <input type="email" class="form-control" name="email1" id="email1">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-6">
						    <label for="email2">Email:</label>
						    <input type="email" class="form-control" name="email2" id="email2">
						    <div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group col-md-6 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-7">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-5">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						  <div class="form-group col-md-6 correct-div">
						  	<div class="row bg-correct">
						  		<div class="col-md-7">
						  			<label for="company_name" class="mt-15">Is this info correct?</label>
						  		</div>
						  		<div class="col-md-5">
						  			<label><input type="radio" name="company_name_checkbox" value="Yes" checked="">Yes</label><br>
						  			<label><input type="radio" name="company_name_checkbox" id="company_name_checkbox" value="No">No</label>
						  		</div>
						  	</div>
						  </div>
						</div>
	                </div>
	              </div>
	              <div id="step-02">
	                <h2>Company Profile</h2>
	                <div id="form-step-01" role="form" data-toggle="validator">
	                	<div class="row">
						  	<div class="form-group col-md-8">
							    <label for="business_structure">Business Structure:</label>
							    <select class="form-control" name="business_structure" id="business_structure">
							      <option value="<?php echo $user_info->business_structure; ?>" selected><?php echo $user_info->business_structure; ?></option>
							      <option value="Sole Proprietor">Sole Proprietor</option>
							      <option value="LLC - Limited Liability Company">LLC - Limited Liability Company</option>
							      <option value="S-Corporation">S-Corporation</option>
							      <option value="C-Corporation">C-Corporation</option>
							      <option value="Other">Other</option>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-4">
							    <label for="year_established">How Old Is Your Business:</label>
							    <select class="form-control" name="year_established" id="year_established">
							      <option value="<?php echo $user_info->year_established; ?>" selected><?php echo $user_info->year_established; ?></option>
							      <option value="Less Than 2 Years">Less Than 2 Years</option>
							      <option value="3-5 Years">3-5 Years</option>
							      <option value="5-10 Years">5-10 Years</option>
							      <option value="10-20 Years">10-20 Years</option>
							      <option value="20+ Years">20+ Years</option>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-4">
							    <label for="state_of_incorporation">State of Incorportation:</label>
							    <input type="text" class="form-control" name="state_of_incorporation" id="state_of_incorporation" value="<?php echo $user_info->state_of_incorporation; ?>">
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-8">
							    <label for="federal_tax_id">Federal Tax ID#:</label>
							    <input type="text" class="form-control" name="federal_tax_id" id="federal_tax_id" value="<?php echo $user_info->federal_tax_id; ?>">
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-8">
							    <label for="type_of_business_login">Type of Business:</label>
							    <select data-dropdown='{ "closeReset": false }' name="type_of_business_login" id="type_of_business_login">
							      <?php foreach($businesTypes as $bKey=>$bVal): ?>
							      <optgroup label="<?php echo $bVal->name; ?>">
							        <?php foreach($bVal->sub as $b1Key=>$b1Val): ?>
							        <option value="<?php echo $b1Val->id; ?>"><?php echo $b1Val->name; ?></option>
							        <?php endforeach; ?>
							      </optgroup>
							      <?php endforeach; ?>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-4">
							    <label for="no_of_employees">No. of Employees:</label>
							    <select class="form-control" name="no_of_employees" id="no_of_employees">
							      <option value="<?php echo $user_info->no_of_employees; ?>" selected><?php echo $user_info->no_of_employees; ?></option>
							      <option value="1-5">1-5</option>
							      <option value="6-10">6-10</option>
							      <option value="11-20">11-20</option>
							      <option value="21-35">21-35</option>
							      <option value="35-50">35-50</option>
							      <option value="50-100">50-100</option>
							      <option value="100-250">100-250</option>
							      <option value="250-500">250-500</option>
							      <option value="500+">500+</option>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-6">
							    <label for="current_year_profit">Current Year Profit (Projected):</label>
							    <select class="form-control" name="current_year_profit" id="current_year_profit">
							      <option value="<?php echo $user_info->current_year_profit; ?>" selected><?php echo $user_info->current_year_profit; ?></option>
							      <option value="I Lost Money">I Lost Money</option>
							      <option value="I Made No Profit">I Made No Profit</option>
							      <option value="$1K - $10K">$1K - $10K</option>
							      <option value="$11K - $50K">$11K - $50K</option>
							      <option value="$51K - $100K">$51K - $100K</option>
							      <option value="$101K - $250K">$101K - $250K</option>
							      <option value="$251K - $500K">$251K - $500K</option>
							      <option value="$501K - $1M">$501K - $1M</option>
							      <option value="$1M - $5M">$1M - $5M</option>
							      <option value="$5M - $10M">$5M - $10M</option>
							      <option value="$10M+">$10M+</option>
							    </select>
						  	</div>
						  	<div class="form-group col-md-6">
							    <label for="last_year_profit">Last Year Profit:</label>
							    <select class="form-control" name="last_year_profit" id="last_year_profit">
							      <option value="<?php echo $user_info->last_year_profit; ?>" selected><?php echo $user_info->last_year_profit; ?></option>
							      <option value="I Lost Money">I Lost Money</option>
							      <option value="I Made No Profit">I Made No Profit</option>
							      <option value="$1K - $10K">$1K - $10K</option>
							      <option value="$11K - $50K">$11K - $50K</option>
							      <option value="$51K - $100K">$51K - $100K</option>
							      <option value="$101K - $250K">$101K - $250K</option>
							      <option value="$251K - $500K">$251K - $500K</option>
							      <option value="$501K - $1M">$501K - $1M</option>
							      <option value="$1M - $5M">$1M - $5M</option>
							      <option value="$5M - $10M">$5M - $10M</option>
							      <option value="$10M+">$10M+</option>
							    </select>
						  	</div>
						  	<div class="form-group col-md-6">
							    <label for="funding_amount">Funding Amount Requesting:</label>
							    <select class="form-control" name="funding_amount" id="funding_amount">
							      <option value="<?php echo $user_info->funding_amount; ?>" selected><?php echo $user_info->funding_amount; ?></option>
							      <option value="$5K - $10K">$5K - $10K</option>
							      <option value="$11K - $50K">$11K - $50K</option>
							      <option value="$51K - $100K">$51K - $100K</option>
							      <option value="$101K - $250K">$101K - $250K</option>
							      <option value="$250K+">$250K+</option>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-6">
							    <label for="use_of_funds">Use of Funds:</label>
							    <select class="form-control" name="use_of_funds" id="use_of_funds">
							      <option value="<?php echo $user_info->use_of_funds; ?>" selected><?php echo $user_info->use_of_funds; ?></option>
							      <option value="Working Capital">Working Capital</option>
							      <option value="Payroll">Payroll</option>
							      <option value="Inventory/Materials">Inventory/Materials</option>
							      <option value="Other">Other</option>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-12">
							    <label for="currently_financed">How Currently Financed:</label>
							    <select class="form-control" name="currently_financed" id="currently_financed">
							      <option value="<?php echo $user_info->currently_financed; ?>" selected><?php echo $user_info->currently_financed; ?></option>
							      <option value="Self Financed">Self Financed</option>
							      <option value="Bank Loan/Line of Credit">Bank Loan/Line of Credit</option>
							      <option value="Owner Equity">Owner Equity</option>
							      <option value="Other">Other</option>
							    </select>
							    <div class="help-block with-errors"></div>
						  	</div>
						  	<div class="form-group col-md-12">
							    <label for="largest_client1">Four Largest Clients:</label>
							    <div class="row">
							      <div class="col-md-6">
							        <input type="text" class="form-control" name="largest_client1" id="largest_client1" value="<?php echo $user_info->largest_client1; ?>">
							        <div class="help-block with-errors"></div>
							      </div>
							      <div class="col-md-6">
							        <input type="text" class="form-control" name="largest_client2" id="largest_client2" value="<?php echo $user_info->largest_client2; ?>">
							        <div class="help-block with-errors"></div>
							      </div>
							      <div class="col-md-6">
							        <input type="text" class="form-control" name="largest_client3" id="largest_client3" value="<?php echo $user_info->largest_client3; ?>">
							        <div class="help-block with-errors"></div>
							      </div>
							      <div class="col-md-6">
							        <input type="text" class="form-control" name="largest_client4" id="largest_client4" value="<?php echo $user_info->largest_client4; ?>">
							        <div class="help-block with-errors"></div>
							      </div>
							    </div>
						  	</div>
						</div>
	                </div>
	              </div>
	              <div id="step-03" class="">
	                <h2>Terms and Conditions</h2>
	                <p> Terms and conditions: Keep your smile :) </p>
	                <div id="form-step-03" role="form" data-toggle="validator">
	                  <div class="form-group">
	                    <label for="terms">I agree with the T&C</label>
	                    <input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" <?php if ($user_info->is_past_due_debts == 1) { echo "checked";} ?> required>
	                    <div class="help-block with-errors"></div>
	                  </div>
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
// $('#user_info_modal').modal({
//     backdrop: 'static',
//     keyboard: false
// });
$('#company_name_checkbox').click(function() {
	$('#company_name').removeAttr("readonly", false);
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
        $('#smartwizard_login').smartWizard("reset");
        $('#user_info_modal').modal('hide');
        $('#myForm-1').find("input, textarea").val("");
    });
    // Smart Wizard
    $('#smartwizard_login').smartWizard({
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