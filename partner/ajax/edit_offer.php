<?php
session_start();
$UserID 			 = $_SESSION['user_id'];
$PartnerID			 = $_SESSION['partner_id']; 
include "../../config/config_main.php";
$OfferBoxID = $_POST['offer_box_id'];
$PartnerID = $_POST['partner_id']; 
$Products = 'SELECT po.*, fin.*, ob.* FROM partner_offer po
LEFT JOIN offer_box ob ON ob.partner_offer_id = po.partner_offer_id
LEFT JOIN finserv fin ON fin.offer_id = po.partner_offer_id
WHERE po.partner_id = '.$PartnerID.' AND fin.partner_id = '.$PartnerID.' AND ob.offer_box_id = '.$OfferBoxID.'';
$ProductsR = mysqli_query($con_MAIN,$Products) or die(mysqli_error());
$Pro = mysqli_fetch_assoc($ProductsR);
?>
<form id="updateofferform">
<input type="hidden" id="offer_box_id" name="offer_box_id" value="<?php echo $Pro['offer_box_id']; ?>" />
<input type="hidden" id="finserv_id" name="finserv_id" value="<?php echo $Pro['finserv_id']; ?>" />
<input type="hidden" id="partner_offer_id" name="partner_offer_id" value="<?php echo $Pro['partner_offer_id']; ?>" />
<table class="producttable">
	<tr><td colspan="4"><div id="updateofferform_response"></div></td></tr>
	<tr>
		<th>Offer Title:</th>
		<td colspan="3"><input name="offer_title" id="offer_title" onkeypress="removewarnings('warning_offer_title')" value="<?php echo $Pro['offer_title']; ?>" class="col-md-12 form-control" type="text"><div id="warning_offer_title" class="help-block help-block-error popuperror">Please enter Offer title.</div></td> 
	</tr>
	<tr>
		<th>Offer Name:</th>
		<td colspan="3"><input name="offer_name" id="offer_name" onkeypress="removewarnings('warning_offer_name')" value="<?php echo $Pro['offer_name']; ?>" class="col-md-12 form-control" type="text"><div id="warning_offer_name" class="help-block help-block-error popuperror">Please enter Offer Name.</div></td> 
	</tr>
	<tr>
		<th>Offer Type:</th>
		<td colspan="3"><input name="offer_type" id="offer_type" onkeypress="removewarnings('warning_offer_type')" value="<?php echo $Pro['offer_type']; ?>" class="col-md-12 form-control" type="text"><div id="warning_offer_type" class="help-block help-block-error popuperror">Please enter Offer Type.</div></td> 
	</tr>
	<tr>
		<th>Offer Min:</th>
		<td><input name="offer_amount_min" id="offer_amount_min" onkeypress="removewarnings('warning_offer_amount_min')" value="<?php echo $Pro['offer_amount_min']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_amount_min" class="help-block help-block-error popuperror">Required</div></td>
		<th>Offer Max:</th>
		<td><input name="offer_amount_max" id="offer_amount_max" onkeypress="removewarnings('warning_offer_amount_max')" value="<?php echo $Pro['offer_amount_max']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_amount_max" class="help-block help-block-error popuperror">Required</div></td>
	</tr> 
	<tr>
		<td colspan="4">
			<div id="warning_offer_amounts" class="help-block help-block-error popuperror" style="text-align:center;">Offer Minimum must be less than Offer Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Interest Min:</th>
		<td><input name="offer_rate_min" id="offer_rate_min" onkeypress="removewarnings('warning_offer_rate_min')" value="<?php echo $Pro['offer_rate_min']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_rate_min" class="help-block help-block-error popuperror">Required</div></td>
		<th>Interest Max: </th>
		<td><input name="offer_rate_max" id="offer_rate_max" onkeypress="removewarnings('warning_offer_rate_max')" value="<?php echo $Pro['offer_rate_max']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_rate_max" class="help-block help-block-error popuperror">Required</div></td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_rates" class="help-block help-block-error popuperror" style="text-align:center;">Interest Minimum must be less than Interest Maximum</div>
		</td>
	</tr> 
	<?php $OfferTermMin = $Pro['offer_term_min']; ?>
	<?php $OfferTermMax = $Pro['offer_term_max']; ?>
	<tr>
		<th>Offer Term Min:</th>
		<td>
			<select class="col-md-12 form-control" id="offer_term_min" onchange="removewarnings('warning_offer_terms')" name="offer_term_min">
				<option <?php if($OfferTermMin == 3){echo 'selected="selected"';} ?> value="3">3</option>
				<option <?php if($OfferTermMin == 6){echo 'selected="selected"';} ?> value="6">6</option>
				<option <?php if($OfferTermMin == 9){echo 'selected="selected"';} ?> value="9">9</option>
				<option <?php if($OfferTermMin == 12){echo 'selected="selected"';} ?> value="12">12</option>
				<option <?php if($OfferTermMin == 18){echo 'selected="selected"';} ?> value="18">18</option>
				<option <?php if($OfferTermMin == 24){echo 'selected="selected"';} ?> value="24">24</option>
				<option <?php if($OfferTermMin == 36){echo 'selected="selected"';} ?> value="36">36</option>
				<option <?php if($OfferTermMin == 48){echo 'selected="selected"';} ?> value="48">48</option>
			</select>
			<div id="warning_offer_term_min" class="help-block help-block-error popuperror">Please enter Offer title.</div>
		</td>
		<th>Offer Term Max</th>
		<td>
			<select class="col-md-12 form-control" onchange="removewarnings('warning_offer_terms')" id="offer_term_max" name="offer_term_max">
				<option <?php if($OfferTermMax == 3){echo 'selected="selected"';} ?> value="3">3</option>
				<option <?php if($OfferTermMax == 6){echo 'selected="selected"';} ?> value="6">6</option>
				<option <?php if($OfferTermMax == 9){echo 'selected="selected"';} ?> value="9">9</option>
				<option <?php if($OfferTermMax == 12){echo 'selected="selected"';} ?> value="12">12</option>
				<option <?php if($OfferTermMax == 18){echo 'selected="selected"';} ?> value="18">18</option>
				<option <?php if($OfferTermMax == 24){echo 'selected="selected"';} ?> value="24">24</option>
				<option <?php if($OfferTermMax == 36){echo 'selected="selected"';} ?> value="36">36</option>
				<option <?php if($OfferTermMax == 48){echo 'selected="selected"';} ?> value="48">48</option>
			</select>
			<div id="warning_offer_term_max" class="help-block help-block-error popuperror">Please enter Offer title.</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_terms" class="help-block help-block-error popuperror" style="text-align:center;">Offer Term Minimum must be less than Offer Term Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Offer APR Min:</th>
		<td><input name="offer_apr_min" id="offer_apr_min" onkeypress="removewarnings('warning_offer_apr_min')" value="<?php echo $Pro['offer_apr_min']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_apr_min" class="help-block help-block-error popuperror">Required.</div></td>
		<th>Offer APR Max: </th>
		<td><input name="offer_apr_max" id="offer_apr_max" onkeypress="removewarnings('warning_offer_apr_max')" value="<?php echo $Pro['offer_apr_max']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_apr_max" class="help-block help-block-error popuperror">Required.</div></td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_aprs" class="help-block help-block-error popuperror" style="text-align:center;">Offer APR Minimum must be less than Offer APR Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Offer Origination Min:</th>
		<td><input name="offer_origination_min" id="offer_origination_min" onkeypress="removewarnings('warning_offer_origination_min')" value="<?php echo $Pro['offer_origination_min']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_origination_min" class="help-block help-block-error popuperror">Required.</div></td>
		<th>Offer Origination Max:</th>
		<td><input name="offer_origination_max" id="offer_origination_max" onkeypress="removewarnings('warning_offer_origination_max')" value="<?php echo $Pro['offer_origination_max']; ?>" class="col-md-12 form-control decimal" type="text"><div id="warning_offer_origination_max" class="help-block help-block-error popuperror">Required.</div></td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_originations" class="help-block help-block-error popuperror" style="text-align:center;">Offer Origination Minimum must be less than Offer Origination Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Offer Other Fees:</th>
		<td><input name="offer_other_fees" id="offer_other_fees" value="<?php echo $Pro['offer_other_fees']; ?>" class="col-md-12 form-control decimal" type="text"></td>
		<th>Offer Pre-Payment: </th>
		<td>
			<select class="col-md-12 form-control" id="offer_prepayment_penalty" name="offer_prepayment_penalty">
				<option <?php if($Pro['offer_prepayment_penalty']=='YES'){echo 'selected="selected"';} ?> value="YES">YES</option>
				<option <?php if($Pro['offer_prepayment_penalty']=='NO'){echo 'selected="selected"';} ?>  value="NO">NO</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Offer CTA URL: </th>
		<td><input name="offer_cta_url" id="offer_cta_url" onkeypress="removewarnings('warning_offer_cta_url')" value="<?php echo $Pro['offer_cta_url']; ?>" class="col-md-12 form-control" type="text"><div id="warning_offer_cta_url" class="help-block help-block-error popuperror">Required</div></td>
		<th>Status: </th>
		<td>
			<select class="col-md-12 form-control" id="finserv_status" name="finserv_status">
				<option <?php if($Pro['finserv_status']=='Active'){echo 'selected="selected"';} ?> value="Active">Active</option>
				<option <?php if($Pro['finserv_status']=='InActive'){echo 'selected="selected"';} ?>  value="InActive">InActive</option>
			</select>
		</td>
	</tr>
</table>
</form>
<script>
$(document).ready(function() {
    $(".decimal").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

</script>