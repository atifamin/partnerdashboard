<div class="row">
  <div class="col-md-12">
    <label for="company_name">Company Name:</label>
    <input type="text" class="form-control" name="company_name"  required="" readonly="" value="<?php echo $user_info->company_name; ?>">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-12 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-4 ">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-8">
  			<label><input type="radio" name="company_name1_checkbox"  value="Yes" class="yes_condition" id="company_name" checked>Yes</label><br>
  			<label><input type="radio" name="company_name1_checkbox" class="no_condition" id="company_name" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="col-md-12">
    <label for="address">Address:</label>
    <input type="text" class="form-control" name="address" value="<?php echo $user_info->address; ?>" readonly>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-12 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-4 ">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-8">
  			<label><input type="radio" name="address_checkbox" value="Yes" checked="" id="address" class="yes_condition">Yes</label><br>
  			<label><input type="radio" name="address_checkbox" id="address" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-8">
    <label for="city">City:</label>
    <input type="text" class="form-control" name="city" value="<?php echo $user_info->city; ?>"  id="city" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-2">
    <label for="state">State:</label>
    <input type="text" class="form-control" name="state" value="<?php echo $user_info->state; ?>" id="state" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-2">
    <label for="zip_code">Zip Code:</label>
    <input type="text" class="form-control" name="zip_code" value="<?php echo $user_info->zip_code; ?>" id="zip_code" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-6 ">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-6">
  			<label><input type="radio" name="city_checkbox" id="city" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="city_checkbox" id="city" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-2 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-12">
  			<label><input type="radio" name="state_checkbox" id="state" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="state_checkbox" id="state" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-2 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-12">
  			<label><input type="radio" name="zip_code_checkbox" id="zip_code" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="zip_code_checkbox" id="zip_code" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-8">
    <label for="website">Website:</label>
    <input type="text" class="form-control" name="website" value="<?php echo $user_info->website; ?>" id="website" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-4">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" name="phone" value="<?php echo $user_info->phone; ?>"  readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-6">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-6">
  			<label><input type="radio" name="website_checkbox" id="website" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="website_checkbox" id="website" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-4 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-7">
  			<label for="company_name" class="mt-10">Is this info correct?</label>
  		</div>
  		<div class="col-md-5">
  			<label><input type="radio" name="phone_checkbox" id="phone" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="phone_checkbox" id="phone" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-8">
    <label for="main_contact_name">Main Contact Name:</label>
    <input type="text" class="form-control" name="main_contact_name" value="<?php echo $user_info->main_contact_name; ?>" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-4">
    <label for="alternate_contact_name">Alternate Contact Name:</label>
    <input type="text" class="form-control" name="alternate_contact_name" value="<?php echo $user_info->alternate_contact_name; ?>" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-6">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-6">
  			<label><input type="radio" name="main_contact_name_checkbox" id="main_contact_name" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="main_contact_name_checkbox" id="main_contact_name" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-4 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-7">
  			<label for="company_name" class="mt-10">Is this info correct?</label>
  		</div>
  		<div class="col-md-5">
  			<label><input type="radio" name="alternate_contact_checkbox" id="alternate_contact_name" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="alternate_contact_checkbox" id="alternate_contact_name" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-6">
    <label for="title1">Title:</label>
    <input type="text" class="form-control" name="title1" value="<?php echo $user_info->title1; ?>" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="title2">Title:</label>
    <input type="text" class="form-control" name="title2" value="<?php echo $user_info->title2; ?>" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-7">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-5">
  			<label><input type="radio" name="title1_checkbox" value="Yes" id="title1" class="yes_condition" checked="">Yes</label><br>
  			<label><input type="radio" name="title1_checkbox" id="title1" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-6 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-7">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-5">
  			<label><input type="radio" name="title2_checkbox" id="title2" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="title2_checkbox" id="title2" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-6">
    <label for="email1">Email:</label>
    <input type="email" class="form-control" name="email1" value="<?php echo $user_info->email1; ?>" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="email2">Email:</label>
    <input type="email" class="form-control" name="email2" value="<?php echo $user_info->email2; ?>" readonly="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-7">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-5">
  			<label><input type="radio" name="email1_checkbox" id="email1" class="yes_condition" value="Yes" checked="">Yes</label><br>
  			<label><input type="radio" name="email1_checkbox" id="email1" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
  <div class="form-group col-md-6 correct-div">
  	<div class="row bg-correct">
  		<div class="col-md-7">
  			<label for="company_name" class="mt-15">Is this info correct?</label>
  		</div>
  		<div class="col-md-5">
  			<label><input type="radio" name="email2_checkbox" value="Yes" id="email2" class="yes_condition" checked="">Yes</label><br>
  			<label><input type="radio" name="email2_checkbox" id="email2" class="no_condition" value="No">No</label>
  		</div>
  	</div>
  </div>
</div>