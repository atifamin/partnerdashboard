<div class="row">
  	<div class="form-group col-md-8">
	    <label for="business_structure">Business Structure:</label>
	    <select class="form-control" name="business_structure" id="business_structure" disabled>
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
	    <select class="form-control" name="year_established" id="year_established" disabled>
	      <option value="<?php echo $user_info->year_established; ?>" selected><?php echo $user_info->year_established; ?></option>
	      <option value="Less Than 2 Years">Less Than 2 Years</option>
	      <option value="3-5 Years">3-5 Years</option>
	      <option value="5-10 Years">5-10 Years</option>
	      <option value="10-20 Years">10-20 Years</option>
	      <option value="20+ Years">20+ Years</option>
	    </select>
	    <div class="help-block with-errors"></div>
  	</div>
  	<div class="form-group col-md-8 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6 ">
	  			<label for="business_structure" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6"> 
	  			<label class="option"><input type="radio" name="business_structure_checkbox" id="business_structure" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="business_structure_checkbox" id="business_structure" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-4 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-8">
	  			<label for="year_established" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-4">
	  			<label class="option"><input type="radio" name="year_established_checkbox" value="Yes" checked="" id="year_established" class="yes_condition"> Yes</label><br>
	  			<label class="option"><input type="radio" name="year_established_checkbox" id="year_established" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-4">
	    <label for="state_of_incorporation">State of Incorportation:</label>
	    <input type="text" class="form-control" name="state_of_incorporation" id="state_of_incorporation" value="<?php echo $user_info->state_of_incorporation; ?>" readonly>
	    <div class="help-block with-errors"></div>
  	</div>
  	<div class="form-group col-md-8">
	    <label for="federal_tax_id">Federal Tax ID#:</label>
	    <input type="text" class="form-control" name="federal_tax" id="federal_tax" value="<?php echo $user_info->federal_tax_id; ?> " readonly>
	    <div class="help-block with-errors"></div>
  	</div>
  	<div class="form-group col-md-4 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-8">
	  			<label for="state_of_incorporation" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-4">
	  			<label class="option"><input type="radio" value="Yes" checked="" class="yes_condition" id="state_of_incorporation" name="state_of_incorporation_checkbox" selected> Yes</label><br>
	  			<label class="option"><input type="radio" id="state_of_incorporation" name="state_of_incorporation_checkbox" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-8 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6">
	  			<label for="federal_tax" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="option"><input type="radio" value="Yes" checked="" class="yes_condition" id="federal_tax" name="federal_tax_checkbox"> Yes</label><br>
	  			<label class="option"><input type="radio" name="federal_tax_checkbox" class="no_condition" id="federal_tax" value="No"> No</label>
	  		</div>
	  	</div>
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
	    <label for="no_of_employees"> No. of Employees:</label>
	    <select class="form-control" name="no_of_employees" id="no_of_employees" disabled>
	      <option value="<?php echo $user_info-> no_of_employees; ?>" selected ><?php echo $user_info-> no_of_employees; ?></option>
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
  	<div class="form-group col-md-8 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6">
	  			<label for="type_of_business_login" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="option"><input type="radio" name="type_of_business_login_checkbox" id="type_of_business_login" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="type_of_business_login_checkbox" id="type_of_business_login" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-4 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-8">
	  			<label for="no_of_employees" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-4">
	  			<label class="option"><input type="radio" name="no_of_employees_checkbox" id="no_of_employees" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="no_of_employees_checkbox" id="no_of_employees" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-6">
	    <label for="current_year_profit">Current Year Profit (Projected):</label>
	    <select class="form-control" name="current_year_profit" id="current_year_profit" disabled>
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
	    <select class="form-control" name="last_year_profit" id="last_year_profit" disabled>
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
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-7">
	  			<label for="current_year_profit" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-5">
	  			<label class="option"><input type="radio" name="current_year_profit_checkbox" id="current_year_profit" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="current_year_profit_checkbox" id="current_year_profit" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-7">
	  			<label for="last_year_profit" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-5">
	  			<label class="option"><input type="radio" name="last_year_profit_checkbox" id="last_year_profit" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="last_year_profit_checkbox" id="last_year_profit" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-6">
	    <label for="funding_amount">Funding Amount Requesting:</label>
	    <select class="form-control" name="funding_amount" id="funding_amount" disabled>
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
	    <select class="form-control" name="use_of_funds" id="use_of_funds" disabled>
	      <option value="<?php echo $user_info->use_of_funds; ?>" selected><?php echo $user_info->use_of_funds; ?></option>
	      <option value="Working Capital">Working Capital</option>
	      <option value="Payroll">Payroll</option>
	      <option value="Inventory/Materials">Inventory/Materials</option>
	      <option value="Other">Other</option>
	    </select>
	    <div class="help-block with-errors"></div>
  	</div>
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-7">
	  			<label for="funding_amount" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-5">
	  			<label class="option"><input type="radio" name="funding_amount_checkbox" id="funding_amount" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="funding_amount_checkbox" id="funding_amount" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-7">
	  			<label for="use_of_funds" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-5">
	  			<label class="option"><input type="radio" name="use_of_funds_checkbox" id="use_of_funds" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="use_of_funds_checkbox" id="use_of_funds" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-12">
	    <label for="currently_financed">How Currently Financed:</label>
	    <select class="form-control" name="currently_financed" id="currently_financed" disabled>
	      <option value="<?php echo $user_info->currently_financed; ?>" selected><?php echo $user_info->currently_financed; ?></option>
	      <option value="Self Financed">Self Financed</option>
	      <option value="Bank Loan/Line of Credit">Bank Loan/Line of Credit</option>
	      <option value="Owner Equity">Owner Equity</option>
	      <option value="Other">Other</option>
	    </select>
	    <div class="help-block with-errors"></div>
  	</div>
  	<div class="form-group col-md-12 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-4">
	  			<label for="currently_financed" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-8">
	  			<label class="option"><input type="radio" name="currently_financed_checkbox" id="currently_financed" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="currently_financed_checkbox" id="currently_financed" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-12">
	    <label for="largest_client1">Four Largest Clients:</label>
	    <div class="row">
	      <div class="col-md-6">
	        <input type="text" class="form-control" name="largest_client1" id="largest_client1" value="<?php echo $user_info->largest_client1; ?>" readonly>
	        <div class="help-block with-errors"></div>
	      </div>
	      <div class="col-md-6">
	        <input type="text" class="form-control" name="largest_client2" id="largest_client2" value="<?php echo $user_info->largest_client2; ?>" readonly>
	        <div class="help-block with-errors"></div>
	      </div>
	  </div>
	</div>
	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6">
	  			<label for="largest_client1" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="option"><input type="radio" name="largest_client1_checkbox" id="largest_client1" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="largest_client1_checkbox" id="largest_client1" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6">
	  			<label for="largest_client2" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="option"><input type="radio" name="largest_client2_checkbox" id="largest_client2" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="largest_client2_checkbox" id="largest_client2" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
	<div class="form-group col-md-12">
		<div class="row">
	      <div class="col-md-6">
	        <input type="text" class="form-control" name="largest_client3" id="largest_client3" value="<?php echo $user_info->largest_client3; ?>" readonly>
	        <div class="help-block with-errors"></div>
	      </div>
	      <div class="col-md-6">
	        <input type="text" class="form-control" name="largest_client4" id="largest_client4" value="<?php echo $user_info->largest_client4; ?>" readonly>
	        <div class="help-block with-errors"></div>
	      </div>
	    </div>
  	</div>
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6">
	  			<label for="largest_client3" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="option"><input type="radio" name="largest_client3_checkbox" id="largest_client3" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="largest_client3_checkbox" id="largest_client3" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>
  	<div class="form-group col-md-6 correct-div">
	  	<div class="row bg-correct">
	  		<div class="col-md-6">
	  			<label for="largest_client4" class="text-correct">Is this info correct?</label>
	  		</div>
	  		<div class="col-md-6">
	  			<label class="option"><input type="radio" name="largest_client4_checkbox" id="largest_client4" class="yes_condition" value="Yes" checked=""> Yes</label><br>
	  			<label class="option"><input type="radio" name="largest_client4_checkbox" id="largest_client4" class="no_condition" value="No"> No</label>
	  		</div>
	  	</div>
  	</div>

</div>

<script type="text/javascript">
	
</script>