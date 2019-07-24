
<style>
.dropdown-nested{width:100%;}
.dropdown-nested > .dropdown-nested-toggle{width:100%}
.dropdown-nested > .dropdown-nested-toggle > .dropdown-nested-text{color:black;}
.dropdown-nested > .dropdown-nested-toggle > .dropdown-nested-icon{float:right;margin-top: 8px;}
</style>
<div class="row">
  <div class="form-group col-md-8">
    <label for="business_structure">Business Structure:</label>
    <!-- <input type="text" class="form-control" name="company_type" id="company_type" > -->
    <select class="form-control" name="business_structure" id="business_structure" required>
      <option value="" selected hidden>Business Structure</option>
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
    <!-- <input type="text" class="form-control" name="year_established" id="year_established" > -->
    <select class="form-control" name="year_established" id="year_established" required>
      <option value="" selected hidden>How Old Is Your Business</option>
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
    <input type="text" class="form-control" name="state_of_incorporation" id="state_of_incorporation" required>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8">
    <label for="federal_tax_id">Federal Tax ID#:</label>
    <input type="text" class="form-control" name="federal_tax_id" id="federal_tax_id" required="">
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-8">
    <label for="type_of_business">Type of Business:</label>
    <!-- <input type="text" class="form-control" name="type_of_business" id="type_of_business" > -->
    <select data-dropdown='{ "closeReset": false }' name="type_of_business" id="type_of_business" required>
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
    <!-- <input type="text" class="form-control" name="no_of_employees" id="no_of_employees" > -->
    <select class="form-control" name="no_of_employees" id="no_of_employees" required>
      <option value="" selected hidden>No. of Employees</option>
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
    <select class="form-control" name="current_year_profit" id="current_year_profit" required>
      <option value="" selected hidden>Current Year Profit</option>
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
    <select class="form-control" name="last_year_profit" id="last_year_profit" required>
      <option value="" selected hidden>Last Year Profit</option>
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
    <!-- <input type="text" class="form-control" name="funding_amount" id="funding_amount" required> -->
    <select class="form-control" name="funding_amount" id="funding_amount" required>
      <option value="" selected hidden>Funding Amount Requesting</option>
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
    <!-- <input type="text" class="form-control" name="use_of_funds" id="use_of_funds" required> -->
    <select class="form-control" name="use_of_funds" id="use_of_funds" required>
      <option value="" selected hidden>Use of Funds</option>
      <option value="Working Capital">Working Capital</option>
      <option value="Payroll">Payroll</option>
      <option value="Inventory/Materials">Inventory/Materials</option>
      <option value="Other">Other</option>
    </select>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group col-md-12">
    <label for="currently_financed">How Currently Financed:</label>
    <!-- <input type="text" class="form-control" name="currently_financed" id="currently_financed" > -->
    <select class="form-control" name="currently_financed" id="currently_financed" required>
      <option value="" selected hidden>How Currently Financed</option>
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
        <input type="text" class="form-control" name="largest_client1" id="largest_client1" required="">
        <div class="help-block with-errors"></div>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="largest_client2" id="largest_client2" required="">
        <div class="help-block with-errors"></div>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="largest_client3" id="largest_client3" required="">
        <div class="help-block with-errors"></div>
      </div>
      <div class="col-md-6">
        <input type="text" class="form-control" name="largest_client4" id="largest_client4" required="">
        <div class="help-block with-errors"></div>
      </div>
    </div>
  </div>
</div>