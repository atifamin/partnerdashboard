									<div class="modal fade bs-modal-lg" id="addpopup" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Add New Offer</h4>
                                                </div>
                                                <div id="" class="modal-body">
<form id="addnewofferform">
<input type="hidden" id="" name="" value="" /> 
<table class="producttable">
	<tr><td colspan="4"><div id="addofferform_response"></div></td></tr>
	<tr>
		<th>Offer Title:</th>
		<td colspan="3">
			<input name="offer_title" id="offer_title" onkeypress="removewarnings('warning_offer_title')" class="col-md-12 form-control" type="text">
			<div id="warning_offer_title" class="help-block help-block-error popuperror">Please enter Offer title.</div>
		</td> 
	</tr>
	<tr>
		<th>Offer Name:</th>
		<td colspan="3">
			<input name="offer_name" id="offer_name" onkeypress="removewarnings('warning_offer_name')" class="col-md-12 form-control" type="text">
			<div id="warning_offer_name" class="help-block help-block-error popuperror">Please enter Offer Name.</div>
		</td> 
	</tr>
	<tr>
		<th>Offer Type:</th>
		<td colspan="3">
			<input name="offer_type" id="offer_type" onkeypress="removewarnings('warning_offer_type')" class="col-md-12 form-control" type="text">
			<div id="warning_offer_type" class="help-block help-block-error popuperror">Please enter Offer Type.</div>
		</td> 
	</tr>
	<tr>
		<th>Offer Min:</th>
		<td>
			<input name="offer_amount_min" id="offer_amount_min" onkeypress="removewarnings('warning_offer_amount_min')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_amount_min" class="help-block help-block-error popuperror">Required</div>
		</td>
		<th>Offer Max:</th>
		<td>
			<input name="offer_amount_max" id="offer_amount_max" onkeypress="removewarnings('warning_offer_amount_max')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_amount_max" class="help-block help-block-error popuperror">Required</div>
		</td>
	</tr> 
	<tr>
		<td colspan="4">
			<div id="warning_offer_amounts" class="help-block help-block-error popuperror" style="text-align:center;">Offer Minimum must be less than Offer Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Interest Min:</th>
		<td>
			<input name="offer_rate_min" id="offer_rate_min" onkeypress="removewarnings('warning_offer_rate_min')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_rate_min" class="help-block help-block-error popuperror">Required</div>
		</td>
		<th>Interest Max: </th>
		<td>
			<input name="offer_rate_max" id="offer_rate_max" onkeypress="removewarnings('warning_offer_rate_max')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_rate_max" class="help-block help-block-error popuperror">Required</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_rates" class="help-block help-block-error popuperror" style="text-align:center;">Interest Minimum must be less than Interest Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Offer Term Min:</th>
		<td>
			<select class="col-md-12 form-control" id="offer_term_min" onchange="removewarnings('warning_offer_terms')" name="offer_term_min">
				<option value="3">3</option>
				<option value="6">6</option>
				<option value="9">9</option>
				<option value="12">12</option>
				<option value="18">18</option>
				<option value="24">24</option>
				<option value="36">36</option>
				<option value="48">48</option>
			</select>
			<div id="warning_offer_term_min" class="help-block help-block-error popuperror">Please enter Offer title.</div>
		</td>
		<th>Offer Term Max</th>
		<td>
			<select class="col-md-12 form-control" onchange="removewarnings('warning_offer_terms')" id="offer_term_max" name="offer_term_max">
				<option value="3">3</option>
				<option value="6">6</option>
				<option value="9">9</option>
				<option value="12">12</option>
				<option value="18">18</option>
				<option value="24">24</option>
				<option value="36">36</option>
				<option value="48">48</option>
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
		<td>
			<input name="offer_apr_min" id="offer_apr_min" onkeypress="removewarnings('warning_offer_apr_min')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_apr_min" class="help-block help-block-error popuperror">Required.</div>
		</td>
		<th>Offer APR Max: </th>
		<td>
			<input name="offer_apr_max" id="offer_apr_max" onkeypress="removewarnings('warning_offer_apr_max')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_apr_max" class="help-block help-block-error popuperror">Required.</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_aprs" class="help-block help-block-error popuperror" style="text-align:center;">Offer APR Minimum must be less than Offer APR Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Offer Origination Min:</th>
		<td>
			<input name="offer_origination_min" id="offer_origination_min" onkeypress="removewarnings('warning_offer_origination_min')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_origination_min" class="help-block help-block-error popuperror">Required.</div>
		</td>
		<th>Offer Origination Max:</th>
		<td>
			<input name="offer_origination_max" id="offer_origination_max" onkeypress="removewarnings('warning_offer_origination_max')" placeholder="00.00" class="col-md-12 form-control decimal" type="text">
			<div id="warning_offer_origination_max" class="help-block help-block-error popuperror">Required.</div>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<div id="warning_offer_originations" class="help-block help-block-error popuperror" style="text-align:center;">Offer Origination Minimum must be less than Offer Origination Maximum</div>
		</td>
	</tr>
	<tr>
		<th>Offer Other Fees:</th>
		<td><input name="offer_other_fees" id="offer_other_fees" placeholder="00.00" class="col-md-12 form-control decimal" type="text"></td>
		<th>Offer Pre-Payment: </th>
		<td>
			<select class="col-md-12 form-control" id="offer_prepayment_penalty" name="offer_prepayment_penalty">
				<option value="YES">YES</option>
				<option value="NO">NO</option>
			</select>
		</td>
	</tr>
	<tr>
		<th>Offer CTA URL: </th>
		<td>
			<input name="offer_cta_url" id="offer_cta_url" onkeypress="removewarnings('warning_offer_cta_url')" placeholder="http://abc.com" class="col-md-12 form-control" type="text">
			<div id="warning_offer_cta_url" class="help-block help-block-error popuperror">Required</div>
		</td>
		<th>Status: </th>
		<td>
			<select class="col-md-12 form-control" id="finserv_status" name="finserv_status">
				<option value="Active">Active</option>
				<option value="InActive">InActive</option>
			</select>
		</td>
	</tr>
</table>
</form>
												</div>
                                                <div class="modal-footer">
													<img src="assets/img/preloader_horizontal.gif" alt="Loading" style="display:none;" id="addpopuploader" /> 
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button onclick="addnewoffer()" type="button" class="btn green">Save changes</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
