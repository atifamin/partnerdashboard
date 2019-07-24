<div class="row">
  <div class="form-group col-md-12">
    <label for="company_name">Company Name:</label>
    <input type="text" class="form-control" name="company_name" id="company_name" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-12">
    <label for="address">Address:</label>
    <input type="text" class="form-control" name="address" id="address" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8">
    <label for="city">City:</label>
    <input type="text" class="form-control" name="city" id="city" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-2">
    <label for="state">State:</label>
    <input type="text" class="form-control" name="state" id="state" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-2">
    <label for="zip_code">Zip Code:</label>
    <input type="text" class="form-control" name="zip_code" id="zip_code" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8">
    <label for="website">Website:</label>
    <input type="text" class="form-control" name="website" id="website" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-4">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" name="phone" id="phone" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8">
    <label for="main_contact_name">Main Contact Name:</label>
    <input type="text" class="form-control" name="main_contact_name" id="main_contact_name" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-4">
    <label for="alternate_contact_name">Alternate Contact Name:</label>
    <input type="text" class="form-control" name="alternate_contact_name" id="alternate_contact_name" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="title1">Title:</label>
    <input type="text" class="form-control" name="title1" id="title1" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="title2">Title:</label>
    <input type="text" class="form-control" name="title2" id="title2" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="email1">Email:</label>
    <input type="email" class="form-control" name="email1" id="email1" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-6">
    <label for="email2">Email:</label>
    <input type="email" class="form-control" name="email2" id="email2" required>
    <div class="help-block with-errors"></div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="contractnumber" class="col-sm-4 control-label">Contract Number</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="contractnumber" disabled value="<?=$Tab1_Q1D['contract_number']?>">
      </div>
    </div><br><br>
    <div class="form-group">
      <label for="contractamount" class="col-sm-4 control-label">Contract Amount</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="contractamount" disabled value="<?='$'.number_format($Tab1_Q1D['award_amount'])?>">
      </div>
    </div><br><br>
    <div class="form-group">
      <label for="bidwindate" class="col-sm-4 control-label">Bid Win Date</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="bidwindate" disabled value="<?=date('M d, Y', strtotime($Tab1_Q1D['award_date']))?>">
      </div>
    </div><br><br>
    <div class="form-group">
      <label for="description" class="col-sm-4 control-label">Description</label>
      <div class="col-sm-8">
        <textarea readonly="true" rows="3" cols="10" class="form-control" id="description" style="resize:none"><?=$Tab1_Q1D['description_of_work']?></textarea>
      </div>
    </div><br><br><br><br>
    <div class="form-group">
      <label for="location" class="col-sm-4 control-label">Location</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="location" disabled value="<?=$Tab1_Q1D['dist_co_rte_pm']?>">
      </div>
    </div><br><br>
  </div>
</div>