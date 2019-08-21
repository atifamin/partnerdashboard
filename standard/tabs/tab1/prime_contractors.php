
<?php
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			WHERE pc.dbe_firm_id = '.$FirmID.'
			ORDER BY pc.contract_id DESC';
			
$Tab1_Q1R = mysqli_query($con_AWT,$Tab1_Q1) or die(mysqli_error()); 
if(mysqli_num_rows($Tab1_Q1R)>0){
	$Index = 1;
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){

?>							
<div class="row">
	<div class="col-sm-12" style="padding-top: 25px;">
		<div class="widget-box transparent <?php if($Index!=1){echo 'collapsed';}?>" >
			<div class="widget-header widget-header-flat" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-rss orange"></i>
					Contract Details
					<a href="#contractdetails" id="contractdetailsa"  data-toggle="collapse" aria-expanded="true" aria-controls="contractdetails">
					<i class="ace-icon fa fa-chevron-up pull-right" id="contractdetailsi" style="color:white;"></i>
					</a>
				</h4>
				</div>
			 
			<div id="contractdetails" class="collapse in">
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered primetable" style="margin-bottom: 10px;"> 

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
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Contract <br> Amount</p></td>
							<td style="width:85px;"><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></td>
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-default"><img src="<?php echo base_url;  ?>assets/img/get_financing.PNG" style="cursor: pointer;width: 100%;height: 100%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancing(<?php echo $Tab1_Q1D['contract_id']; ?>);" ></a></td>
							</tr>
							<tr>
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Bonding <br> Requirement</p></td>
							<td style="width:85px;"><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></td>
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-bonding-services"><img src="<?php echo base_url;  ?>assets/img/bonding_services.PNG" style="cursor: pointer;width: 100%;height: 50%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancing(<?php echo $Tab1_Q1D['contract_id']; ?>);" ></a></td>
							</tr>
						</tbody>
					</table>
					<!-- <div class="row">
					<div class="col-lg-4" style="border-style:solid;border-width:1px;border-color:darkgray;border-left:0px;border-top:0px;border-bottom:0px;margin-bottom:5px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Contract<br> Amount</p></div>
					<div class="col-lg-4" ><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></div>
					<div class="col-lg-4" style="border-style:solid;border-width:1px;border-color:darkgray;border-right:0px;border-top:0px;border-bottom:0px;margin-bottom:5px;padding:5px;">
					<a type="button" data-toggle="modal" data-target="#modal-default"><img src="<?php echo base_url;  ?>assets/img/get_financing.PNG" style="cursor: pointer;width: 100%;height: 50%;margin-bottom: 5px;" alt="Get Financing"></a></div>
					</div> -->
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col --> 
	<div style="clear:both;height:0px;"></div> 
<?php
$Tab1_Q1_S = 'SELECT *
	FROM prime_contractor pc
	JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
	WHERE pc.contract_number = sc.contract_number AND pc.dbe_firm_id = '.$FirmID.'
	AND pc.contract_number="'.$Tab1_Q1D['contract_number'].'"';
$Tab1_Q1R_S = mysqli_query($con_AWT,$Tab1_Q1_S) or die(mysqli_error());
if(mysqli_num_rows($Tab1_Q1R_S)>0){ 

?>								
	<div class="col-sm-12">
		<div class="widget-box transparent <?php if($Index!=1){echo 'collapsed';}?>">
			<div class="widget-header widget-header-flat" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-user orange"></i>
					Sub-Contractors
					<a href="#Sub-Contractors" id="M-sub-cont-anc" data-toggle="collapse"  role="button" aria-expanded="true" aria-controls="Sub-Contractors">
					<i id="M-sub-cont-chev" class="ace-icon fa fa-chevron-up pull-right" style="color:white;"></i>
					</a>
				</h4>
			</div>

			<div id="Sub-Contractors" class="collapse in">
				<div class="widget-main no-padding">
					<table class="table table-bordered ">
						<thead class="thin-border-bottom subtable">
							<tr>
								<th style="background:#4BACC6;color:#10253F;text-align:center;">
									<i class="ace-icon fa fa-caret-right blue"></i>NAME
								</th>

								<th style="background:#8EB4E3;color:#10253F;text-align:center;">
									<i class="ace-icon fa fa-caret-right blue"></i>AMOUNT
								</th>

								<th class="hidden-480 column3" style="background:#93CDDD;color:#10253F;text-align:center;">
									<i class="ace-icon fa fa-caret-right blue"></i>CERTIFICATION
								</th>
							</tr>
						</thead>

						<tbody>
						<?php
							while($Tab1_Q1D_S = mysqli_fetch_array($Tab1_Q1R_S)){
						?>
							<tr>
								<td style="background:#4BACC6;color:#fff;text-align:center;"><?php echo $Tab1_Q1D_S['subcontractor_name']; ?></td>

								<td style="background:#8EB4E3;color:#10253F;text-align:center;">$<?php echo number_format($Tab1_Q1D_S['subcontractor_amount'],0); ?></td>

								<td class="hidden-480 column3" style="background:#93CDDD;color:#10253F;text-align:center;">
								<?php
									$Tab1_Q4 = 'SELECT `Certification Type`,`Firm Type` FROM `dbe` WHERE `Firm ID`='.$FirmID.'';
									$Tab1_Q4R = mysqli_query($con_MAIN,$Tab1_Q4) or die(mysqli_error());
									if(mysqli_num_rows($Tab1_Q4R)>0){
										$Certifications = mysqli_fetch_assoc($Tab1_Q4R);
										if($Certifications['Certification Type'] == $Certifications['Firm Type']){
								?>
									<span class="label label-info arrowed-right arrowed-in"><?php echo $Certifications['Certification Type']; ?></span> 
								<?php			
										}else{
								?>
									<span class="label label-info arrowed-right arrowed-in"><?php echo $Certifications['Certification Type']; ?></span> 
									<span class="label label-success arrowed-right arrowed-in"><?php echo $Certifications['Firm Type']; ?></span>
								<?php
										}
									}
								?>	
								</td>
							</tr> 
						<?php
							}
						?>	
						</tbody>
					</table>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->
<?php } ?>								
</div><!-- /.row -->
							
<div style="clear:both;height:0px;"></div>
<div class="hr hr32 hr-dotted" style="margin:6px 0;"></div>
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
			<h4 class="widget-title">View other contracts you have recently won
			<a href="#View-Other-Contracts" id="view-other-cont-anc" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="View-Other-Contracts">
				<i class="ace-icon fa fa-chevron-down pull-right" id="view-other-cont-chev" style="color:white;"></i>
				</a>
				</h4>
		</div>

		<div id="View-Other-Contracts" class="collapse">
			<div class="widget-main">
				<?php include "prime_contractors_more.php"; ?>
			</div>
		</div>
	</div>
</div> 
<div style="clear:both;height:20px;"></div>
<?php
}
?>	
<style type="text/css">
	.bg-custom-header{
		background-color: #4F81BE;
	}
	.text-white{
		color: white;
	}

	.modal-scroll {
  		overflow-y: auto;
	}
</style>

<div class="modal fade modal-scroll" id="modal-default">
  	<div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
          <div class="modal-header bg-custom-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-white">CALIFORNIA CERTIFIED BUSINESS FASTFUND™ INVOICE FINANCING</h3>
          </div>
          <div class="modal-body">
            <?php include "./financial_services.php"; ?>
			
          </div>
		  
          <div class="modal-footer" >
            <!-- <button type="button" class="btn btn-danger pull-left" style="margin-top:10px;" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Close</button> -->
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
        <!-- /.modal-content -->
  	</div>
      <!-- /.modal-dialog -->
</div>
    <!-- /.modal -->

<div class="modal fade modal-scroll" id="modal-bonding-services">
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
	// 		type: "POST",
	// 		url: "<?php  // echo base_url;?> tabs/tab1/contract_detail.php"
	// 		data: {id:id},
	// 		success:function(data){
	// 			$('#contract_details_table').html(data);
	// 		}
	// 	});
	// }

$(document).ready(function(){
  $("#contractdetailsa").click(function(){
	  if($("#contractdetailsi").hasClass('ace-icon fa fa-chevron-up')){
		$("#contractdetailsi").removeClass("ace-icon fa fa-chevron-up");
		$("#contractdetailsi").addClass("ace-icon fa fa-chevron-down");
	  }
	  else{
		$("#contractdetailsi").removeClass("ace-icon fa fa-chevron-down");
		$("#contractdetailsi").addClass("ace-icon fa fa-chevron-up");
	  }
  });


  $("#M-sub-cont-anc").click(function(){
	  if($("#M-sub-cont-chev").hasClass('ace-icon fa fa-chevron-up')){
		$("#M-sub-cont-chev").removeClass("ace-icon fa fa-chevron-up");
		$("#M-sub-cont-chev").addClass("ace-icon fa fa-chevron-down");
	  }
	  else{
		$("#M-sub-cont-chev").removeClass("ace-icon fa fa-chevron-down");
		$("#M-sub-cont-chev").addClass("ace-icon fa fa-chevron-up");
	  }
  });

	  $('#view-other-cont-anc').click(function(){
		if($('#view-other-cont-chev').hasClass('ace-icon fa fa-chevron-down')){
			
			$('#view-other-cont-chev').removeClass('ace-icon fa fa-chevron-down');
			$('#view-other-cont-chev').addClass('ace-icon fa fa-chevron-up');
			
		}
		else{
			
			$('#view-other-cont-chev').removeClass('ace-icon fa fa-chevron-up');
			$('#view-other-cont-chev').addClass('ace-icon fa fa-chevron-down');
		}
	});
	
	

  <?php 
   
   echo $chevron;
   echo $chevronContractDetails;
 ?>
});
</script>