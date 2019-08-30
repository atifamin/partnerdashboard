<?php
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			WHERE pc.dbe_firm_id = '.$FirmID.'
			ORDER BY pc.contract_id DESC';
$Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error()); 
if(mysqli_num_rows($Tab1_Q1R)>0){
	$Index = 1;
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){

?>
<div class="row">
	<div class="col-sm-12" style="padding-top: 25px;">
		<div class="widget-box transparent  <?php if($Index!=1){echo 'collapsed';}?>">
			<div class="widget-header widget-header-flat" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;" >
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-rss orange"></i>
					Contract Details
					<a href="#contractdetails6" id="cont-detail-6-anc"  data-toggle="collapse" aria-expanded="true" aria-controls="contractdetails6">
					<i class="ace-icon fa fa-chevron-up pull-right" id="cont-detail-6-chev" style="color:white;"></i>
					</a>
				</h4>
			</div>
			<div id="contractdetails6" class="collapse in">
				<div class="widget-main">
					<table class="table table-bordered primetable"> 

						<tbody>
							<tr>
								<td><strong>Contract Number</strong></td>
								<td><b class="dark-blue"><?php echo $Tab1_Q1D['contract_number']; ?></b></td> 
							</tr>
							<tr>
								<td><strong>Description</strong></td>
								<td><b class="dark-blue"><?php echo $Tab1_Q1D['description_of_work']; ?></b></td> 
							</tr>
							<tr>
								<td><strong>Location</strong></td>
								<td><b class="dark-blue"><?php echo $Tab1_Q1D['dist_co_rte_pm']; ?></b></td> 
							</tr>
							<!-- <tr>
								<td><strong>Amount</strong></td>
								<td><b class="dark-blue">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></b></td> 
							</tr> -->
							<tr>
								<td><strong>Bid Win Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></td>
								<td><b class="dark-blue"><?php echo date('M d, Y',strtotime($Tab1_Q1D['award_date'])); ?></b></td> 
							</tr> 
							<tr>
							<td><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Contract <br>Amount</p></td>
							<td><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></td>
							<td><a type="button" data-toggle="modal" data-target="#modal-default1"><img src="<?php echo base_url;  ?>assets/img/get_financing.PNG" style="cursor: pointer;width: 100%;height: 100%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancingFastFund(<?php echo $Tab1_Q1D['contract_id']; ?>);"></a></td>
							</tr>
							<tr>
							<?php 
								$award_amount = (10 / 100) * $Tab1_Q1D['award_amount'];
							?>	
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Bonding <br> Requirement</p></td>
							<td style="width:85px;"><p style="color:#2f64ac;font-size:35px;text-align:center;margin-top:10%;font-weight: 600">$<?php echo number_format($award_amount,0); ?></p></td>
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-bonding-services-sub-contractors-only"><img src="<?php echo base_url;  ?>assets/img/bonding_services.PNG" style="cursor: pointer;width: 100%;height: 50%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancingSurety(<?php echo $Tab1_Q1D['contract_id']; ?>);" ></a></td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col --> 
	<div style="clear:both;height:0px;"></div> 
</div><!-- /.row -->
<div style="clear:both;height:0px;"></div> 
<?php 
	$Index++;
	$TotalRows = mysqli_num_rows($Tab1_Q1R);
	break;
	} // While Close
	}else{
	$TotalRows = mysqli_num_rows($Tab1_Q1R);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger">There are no contracts</div>
	</div>
</div>
<?php		
	} ?>
<?php
if($TotalRows>=2){
?>	
<div class="col-xs-12 col-sm-12 widget-container-col" style="padding:0px;">
	<div class="widget-box collapsed">
		<div class="widget-header widget-header-large" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
			<h4 class="widget-title">View other Sub-Contracts You Have Recently Won
			<a href="#view-other-subcontracts" id="view-sub-cont-6-anc"  data-toggle="collapse" aria-expanded="true" aria-controls="view-other-subcontracts">
				<i class="ace-icon fa fa-chevron-up pull-right" id="view-sub-cont-6-chev" style="color:white;"></i>
				</a>
			</h4>
		</div>

		<div class="collapse in" id="view-other-subcontracts">
			<div class="widget-main">
				<?php include "sub_contractors_only_more.php"; ?>
			</div>
		</div>
	</div>
</div> 
<div style="clear:both;height:20px;"></div>
<?php
}
?>	

<div class="modal fade" id="modal-default1">
  <div class="modal-dialog" style="width:80%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Contract Financing Options</h4>
      </div>
      <div class="modal-body">
        <?php include "./financial_services.php"; ?>
		
      </div>
	  
      <div class="modal-footer" ><!-- 
        <button type="button" class="btn btn-danger pull-left" style="margin-top:10px;" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade modal-scroll" id="modal-bonding-services-sub-contractors-only">
  	<div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
          <div class="modal-header bg-custom-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-white">CALIFORNIA CERTIFIED BUSINESS SURETY BONDING SERVICES</h3>
          </div>
          <div class="modal-body">
            <?php include "./bonding_services.php"; ?>
          </div>
          <div class="modal-footer" >
          </div>
        </div>
  	</div>
</div>

<script type="text/javascript">
	// function getFinancing(id) {
	// 	$.ajax({
	// 		type: 'POST',
	// 		url: "<?php // echo base_url;?>tabs/tab1/contract_detail.php",
	// 		data: {id:id},
	// 		success:function(data){
	// 			$('#contract_details_table').html(data);
	// 		}
	// 	});
	// }
</script>