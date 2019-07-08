
<div class="portlet light">
  <div class="portlet-title" style="color:#C5D9F1;background:#4F81BD;margin:-12px 0 0 -20px;padding:9px 20px;width:110%;">
    <div class="caption"> <span class="caption-subject bold font-grey-gallery uppercase" style="color:#C5D9F1 !important;">Your Product Details</span> </div>
    <div class="tools"> <a href="" class="collapse"> </a> </div>
  </div>
  <div class="portlet-body">
    <div class="tab-content">
<?php
$Products = 'SELECT po.*, fin.*, ob.* FROM partner_offer po
LEFT JOIN offer_box ob ON ob.partner_offer_id = po.partner_offer_id
LEFT JOIN finserv fin ON fin.offer_id = po.partner_offer_id
WHERE po.partner_id = '.$PartnerID.' AND fin.partner_id = '.$PartnerID.'';
$ProductsR = mysqli_query($con_PRMSUB,$Products) or die(mysqli_error());
if(mysqli_num_rows($ProductsR)>0){
while($ProData = mysqli_fetch_assoc($ProductsR)){
		$BG1 = 'border-color:#DCE6F2 !important;background:#DCE6F2 !important;';
		$BG2 = 'color:#4F81BD;';
	if($ProData['finserv_status'] == 'Active'){
		$BG1 = 'border-color:#DCE6F2 !important;background:#DCE6F2 !important;';
		$BG2 = 'color:#4F81BD;';
	}elseif($ProData['finserv_status'] == 'InActive'){
		$BG1 = 'border-color:#CD7371 !important;background:#CD7371 !important;';
		$BG2 = 'color:#953735 !important;';
	}
?>      
	  
	  <div class="portlet box" style="<?php echo $BG1; ?>">
        <div class="portlet-title">
          <div class="caption" style="<?php echo $BG2; ?>"><?php echo $ProData['offer_name']; ?></div>
          <div class="tools"> <a href="javascript:;" class="expand" style="<?php echo $BG2; ?>" data-original-title="" title=""> </a> </div>
        </div>
        <div class="portlet-body" style="display: none;">
          <table class="producttable">
            <tr>
              <th>Offer Name: </th>
              <td><?php echo $ProData['offer_name']; ?></td>
            </tr>
			<tr>
              <th>Offer Min:</th>
              <td>$<?php echo number_format($ProData['offer_amount_min'],2); ?></td>
            </tr>
            <tr>
              <th>Offer Max:</th>
              <td>$<?php echo number_format($ProData['offer_amount_max'],2); ?></td>
            </tr>
            <tr>
              <th>Offer Type:</th>
              <td><?php echo $ProData['offer_type']; ?></td>
            </tr>
            <tr>
              <th>Interest Min:</th>
              <td><?php echo $ProData['offer_rate_min']; ?>%</td>
            </tr>
            <tr>
              <th>Interest  Max: </th>
              <td><?php echo $ProData['offer_rate_max']; ?>%</td>
            </tr>
            <tr>
              <th>Offer Term Min:</th>
              <td><?php echo $ProData['offer_term_min']; ?> Months</td>
            </tr>
            <tr>
              <th>Offer Term Max</th>
              <td><?php echo $ProData['offer_term_max']; ?> Months</td>
            </tr>
            <tr>
              <th>Offer APR Min:</th>
              <td><?php echo $ProData['offer_apr_min']; ?>%</td>
            </tr>
            <tr>
              <th>Offer APR Max: </th>
              <td><?php echo $ProData['offer_apr_max']; ?>%</td>
            </tr>
            <tr>
              <th>Offer Origination Min:</th>
              <td><?php echo $ProData['offer_origination_min']; ?>%</td>
            </tr>
            <tr>
              <th>Offer Origination Max:</th>
              <td><?php echo $ProData['offer_origination_max']; ?>%</td>
            </tr>
            <tr>
              <th>Offer Other Fees:</th>
              <td>$<?php echo $ProData['offer_other_fees']; ?></td>
            </tr>
            <tr>
              <th>Offer Pre-Payment: </th>
              <td><?php echo $ProData['offer_prepayment_penalty']; ?></td>
            </tr>
            <tr>
              <th>Offer CTA URL: </th>
              <td><?php echo $ProData['offer_cta_url']; ?></td>
            </tr>
			<tr>
              <th>Status: </th>
              <td><?php echo $ProData['finserv_status']; ?></td>
            </tr>
          </table>
          <center>
            <a onclick="edit_offer(<?php echo $ProData['offer_box_id']; ?>,<?php echo $PartnerID; ?>)" data-toggle="modal" href="#editpopup" class="btn blue btn-sm">Edit Offer</a>
          </center>
          <br />
          <center>
			<div id="deactivate_response_<?php echo $ProData['finserv_id']; ?>"></div>
			<?php if($ProData['finserv_status']=='InActive'){ ?>
            <button onclick="deactivateoffer(<?php echo $ProData['finserv_id']; ?>,'Active')" type="button" class="btn blue btn-sm">Activate Offer</button>
			<?php }else{ ?>
			<button onclick="deactivateoffer(<?php echo $ProData['finserv_id']; ?>,'InActive')" type="button" class="btn red btn-sm">De-Activate Offer</button>
			<?php } ?>
          </center>
        </div>
      </div>
<?php
}
}else{
?>
<div class="caption-subject bold font-grey-gallery" style="text-align:center;color:#953735 !important;">No Products Available</div>
<?php	
}
?>	  
	  
      <center>
        <a data-toggle="modal" href="#addpopup" class="btn blue-madison">Create New Offer</a>
      </center>
    </div>
  </div>
</div>
