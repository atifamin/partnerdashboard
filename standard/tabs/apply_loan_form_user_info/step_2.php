<div class="row">
	<div class="form-group col-md-8">
    <label for="main_contact_fname">Main Contact First Name:</label>
    <input type="text" class="form-control user_info_fields_2" name="main_contact_fname" value="<?php echo $user_info->main_contact_fname; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-4">
    <label for="main_contact_lname">Main Contact Last Name:</label>
    <input type="text" class="form-control user_info_fields_2" name="main_contact_lname" value="<?php echo $user_info->main_contact_lname; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8">
    <label for="alternate_contact_fname">Alternate Contact First Name:</label>
    <input type="text" class="form-control user_info_fields_2" name="alternate_contact_fname" value="<?php echo $user_info->alternate_contact_fname; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-4">
    <label for="alternate_contact_lname">Alternate Contact Last Name:</label>
    <input type="text" class="form-control user_info_fields_2" name="alternate_contact_lname" value="<?php echo $user_info->alternate_contact_lname; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="main_contact_title">Main Contact Title:</label>
    <input type="text" class="form-control user_info_fields_2" name="main_contact_title" value="<?php echo $user_info->main_contact_title; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="alternate_contract_title">Alternate Contact Title:</label>
    <input type="text" class="form-control user_info_fields_2" name="alternate_contract_title" value="<?php echo $user_info->alternate_contract_title; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="main_contact_email">Main Contact Email:</label>
    <input type="email" class="form-control user_info_fields_2" name="main_contact_email" value="<?php echo $user_info->main_contact_email; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="alternate_contract_email">Alternate Contact Email:</label>
    <input type="email" class="form-control user_info_fields_2" name="alternate_contract_email" value="<?php echo $user_info->alternate_contract_email; ?>" readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="main_contract_mobile_phone">Main Contact Mobile Phone:</label>
    <input type="number" class="form-control user_info_fields_2" name="main_contract_mobile_phone" value="<?php echo $user_info->main_contract_mobile_phone; ?>" readonly="" >
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="alternate_contract_mobile_phone">Alternate Contact Mobile Phone:</label>
    <input type="number" class="form-control user_info_fields_2" name="alternate_contract_mobile_phone" value="<?php echo $user_info->alternate_contract_mobile_phone; ?>"  readonly="" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-12 correct-div">
    <div class="row bg-correct">
      <div class="col-md-4">
        <label for="step_2_checkbox" class="text-correct">Is this info correct?</label>
      </div>
      <div class="col-md-8">
        <label class="option"><input type="radio" name="step_2_checkbox"  value="Yes" class="yes_step_2" id="company_name">  Yes</label><br>
        <label class="option"><input type="radio" name="step_2_checkbox" class="no_step_2" id="company_name" value="No">  No</label>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
	
</script>