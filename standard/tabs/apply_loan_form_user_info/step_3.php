<style>
	.dropdown-nested{width:100%;}
	.dropdown-nested > .dropdown-nested-toggle{width:100%}
	.dropdown-nested > .dropdown-nested-toggle > .dropdown-nested-text{color:black;}
	.dropdown-nested > .dropdown-nested-toggle > .dropdown-nested-icon{float:right;margin-top: 8px;}
</style>


<div class="row">
	<div class="form-group col-md-8">
	    <label for="business_structure">Business Structure:</label>
	    <select class="form-control user_info_fields_3" name="business_structure" id="business_structure" disabled>
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
	    <select class="form-control user_info_fields_3" name="year_established" id="year_established" disabled>
	      <option value="<?php echo $user_info->year_established; ?>" selected><?php echo $user_info->year_established; ?></option>
	      <option value="Less Than 2 Years">Less Than 2 Years</option>
	      <option value="3-5 Years">3-5 Years</option>
	      <option value="5-10 Years">5-10 Years</option>
	      <option value="10-20 Years">10-20 Years</option>
	      <option value="20+ Years">20+ Years</option>
	    </select>
	    <div class="help-block with-errors"></div>
  	</div>
  	<?php
  		// foreach($businesTypes as $bKey=>$bVal):
  		// 	foreach($bVal->sub as $b1Key=>$b1Val):
  		// 		echo "<pre>"; print_r($b1Val);
  		// 		endforeach;
  		// 		endforeach;
  	 ?>
  	<div class="form-group col-md-8">
    	<label for="type_of_business">Type of Business:</label>
    	<select data-dropdown='{ "closeReset": false }' name="type_of_business" id="type_of_business1" class="type_of_business1">
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
	    <label for="no_of_employees"> No. of Employees:</label>
	    <select class="form-control user_info_fields_3" name="no_of_employees" id="no_of_employees" disabled>
	      <option value="<?php echo $user_info->no_of_employees; ?>" selected ><?php echo $user_info->no_of_employees; ?></option>
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
  	<div class="d-none">
  	<div class="form-group col-md-12 correct-div">
	    <div class="row" style="background-color: #D7D6FF">
	      	<div class="col-md-8">
	       		<label for="has_existing_suretybond_broker-agent" class="text-correct">Do You Currently Have Existing Surety Bonding Agent/Broker?</label>
	      	</div>
	      	<div class="col-md-4">
	        	<label class="option"><input type="radio" name="has_existing_suretybond_broker-agent"  value="1" checked="">  Yes</label><br>
	        	<label class="option"><input type="radio" name="has_existing_suretybond_broker-agent"  value="0">  No</label>
	      	</div>
	    </div>
  	</div>
  	<div class="form-group col-md-6">
	    <label for="suretybond_amount">Surety Bond Amount:</label>
	    <input type="number" class="form-control" name="suretybond_amount" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	 <div class="form-group col-md-6">
	    <label for="surtybond_broker-agent_contact_fname">Surety Bond Broker-Agent Contact First Name:</label>
	    <input type="text" class="form-control" name="surtybond_broker-agent_contact_fname" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	 <div class="form-group col-md-6">
	    <label for="suretybond_broker-agent_company_name">Surety Bond Broker-Agent Company Name:</label>
	    <input type="text" class="form-control" name="suretybond_broker-agent_company_name" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	 <div class="form-group col-md-6">
	    <label for="surtybond_broker-agent_contact_lname">Surety Bond Broker-Agent Contact Last Name:</label>
	    <input type="text" class="form-control" name="surtybond_broker-agent_contact_lname" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	 <div class="form-group col-md-6">
	    <label for="suretybond_broker-agent_company_website">Surety Bond Broker-Agent Company Website:</label>
	    <input type="text" class="form-control" name="suretybond_broker-agent_company_website" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	 <div class="form-group col-md-6">
	    <label for="surtybond_broker-agent_contact_phone">Surety Bond Broker-Agent  Phone:</label>
	    <input type="text" class="form-control" name="surtybond_broker-agent_contact_phone" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	 <div class="form-group col-md-6">
	    <label for="suretybond_broker-agent_company_phone">Surety Bond Broker-Agent Company Phone:</label>
	    <input type="text" class="form-control" name="suretybond_broker-agent_company_phone" value="" >
	    <div class="help-block with-errors"></div>
	 </div>
	</div>
  	<div class="form-group col-md-4 col-md-offset-8">
	    <label for="state_of_incorporation">State of Incorportation:</label>
	    <input type="text" class="form-control user_info_fields_3" name="state_of_incorporation" id="state_of_incorporation" value="<?php echo $user_info->state_of_incorporation; ?>" readonly>
	    <div class="help-block with-errors"></div>
  	</div>
	<div class="form-group col-md-6">
	    <label for="current_year_profit">Current Year Profit (Projected):</label>
	    <select class="form-control user_info_fields_3" name="current_year_profit" id="current_year_profit" disabled>
	      <option value="<?php echo $user_info->current_year_profit; ?>" selected ><?php echo $user_info->current_year_profit; ?></option>
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
	    <select class="form-control user_info_fields_3" name="last_year_profit" id="last_year_profit" disabled>
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
  	<div class="form-group col-md-12">
	    <label for="largest_client1">Four Largest Clients:</label>
	    <div class="row">
	      	<div class="col-md-6">
	        	<input type="text" class="form-control user_info_fields_3" name="largest_client1" id="largest_client1" value="<?php echo $user_info->largest_client1; ?>" readonly>
	        	<div class="help-block with-errors"></div>
	      	</div>
	      	<div class="col-md-6">
	        	<input type="text" class="form-control user_info_fields_3" name="largest_client2" id="largest_client2" value="<?php echo $user_info->largest_client2; ?>" readonly>
	        	<div class="help-block with-errors"></div>
	     	</div>
	      	<div class="col-md-6">
	        	<input type="text" class="form-control user_info_fields_3" name="largest_client3" id="largest_client3" value="<?php echo $user_info->largest_client3; ?>" readonly>
	        	<div class="help-block with-errors"></div>
	      	</div>
	      	<div class="col-md-6">
	       		<input type="text" class="form-control user_info_fields_3" name="largest_client4" id="largest_client4" value="<?php echo $user_info->largest_client4; ?>" readonly>
	        	<div class="help-block with-errors"></div>
	      	</div>
	  	</div>
	</div>
	<div class="form-group col-md-12 correct-div">
	    <div class="row bg-correct">
	      	<div class="col-md-4">
	       		<label for="step_3_checkbox" class="text-correct">Is this info correct?</label>
	      	</div>
	      	<div class="col-md-8">
	        	<label class="option"><input type="radio" name="step_3_checkbox"  value="Yes" class="yes_step_3">  Yes</label><br>
	        	<label class="option"><input type="radio" name="step_3_checkbox" class="no_step_3" value="No">  No</label>
	      	</div>
	    </div>
  	</div>
</div>
<script type="text/javascript">
	// $('#last_year_profit').on('select','select', function() {
 //        alert('The option with value ' + $(this).val());
 //    });
 $(document).ready(function(){  
$('#type_of_business1').change(function(){
    var selectedValue = $(this).val();
    alert(selectedValue);
});
});
 //    $(document).ready(function(){  
	// 	$('#type_of_business1').change(function(){
	// 		alert('o chal ja');
	// 	    // var selectedValue = $(this).val();
	// 	    // if (selectedValue === "1"){
	// 	    //     $("#maindivv").load("iteratemonths.php");
	// 	    // }
	// 	});
	// });
// function businesTypeId(){
// 	alert();
// 	var s = document.getElementById('type_of_business1');
// 	alert(s.value);
// }
</script>
