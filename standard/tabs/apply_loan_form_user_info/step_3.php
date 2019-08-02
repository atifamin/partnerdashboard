<div class="form-group">
    <label for="terms">I agree with the T&C</label>
    <input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" <?php if ($user_info->is_past_due_debts == 1) { echo "checked";} ?> required>
    <div class="help-block with-errors"></div>
  </div>