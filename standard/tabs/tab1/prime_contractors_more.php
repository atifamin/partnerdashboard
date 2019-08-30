<?php
$chevronContractDetails = "";
$chevron = "";
$count = 1;
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			WHERE pc.dbe_firm_id = '.$FirmID.'
			ORDER BY pc.contract_id DESC';
$Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error()); 
//echo "<pre>"; print_r(mysqli_fetch_array($Tab1_Q1R));
if(mysqli_num_rows($Tab1_Q1R)>0){ 
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){
		$count++;

?>							
<div class="row">
	<div class="col-sm-12" style="padding-top: 25px;">
		<div class="widget-box transparent collapsed">
			<div class="widget-header widget-header-flat" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-rss orange"></i>
					Contract Details
					<a href="#contract-more<?php echo $count ;?>" id="cont-det-anc<?php echo $count ;?>" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="contract-more<?php echo $count ;?>">
					<i class="ace-icon fa fa-chevron-down pull-right" id="cont-det-chev<?php echo $count ;?>" style="color:white;"></i>
					</a>

					<?php
						
						$chevronContractDetails .= "
							
						$('#cont-det-anc".$count."').click(function(){
						if($('#cont-det-chev".$count."').hasClass('ace-icon fa fa-chevron-down')){
							
							$('#cont-det-chev".$count."').removeClass('ace-icon fa fa-chevron-down');
							$('#cont-det-chev".$count."').addClass('ace-icon fa fa-chevron-up');
							
						}
						else{
							
							$('#cont-det-chev".$count."').removeClass('ace-icon fa fa-chevron-up');
							$('#cont-det-chev".$count."').addClass('ace-icon fa fa-chevron-down');
						}
					});
						";
					
					?>
				</h4>
			</div>
			<div id="contract-more<?php echo $count ;?>" class="collapse">
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
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Contract <br> Amount</p></td>
							<td style="width:85px;"><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></td>
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-default"><img src="<?php echo base_url;  ?>assets/img/get_financing.PNG" style="cursor: pointer;width: 100%;height: 100%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancingFastFund(<?php echo $Tab1_Q1D['contract_id']; ?>)"></a></td>
							</tr>
							<tr>
							<?php 
								$award_amount = (10 / 100) * $Tab1_Q1D['award_amount'];
							?>
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Bonding <br> Requirement</p></td>
							<td style="width:85px;"><p style="color:#2f64ac;font-size:35px;text-align:center;margin-top:10%;font-weight: 600;">$<?php echo number_format($award_amount,0); ?></p></td>
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-bonding-services"><img src="<?php echo base_url;  ?>assets/img/bonding_services.PNG" style="cursor: pointer;width: 100%;height: 50%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancingSurety(<?php echo $Tab1_Q1D['contract_id']; ?>);" ></a></td>
							</tr>
						</tbody>
					</table>
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
$Tab1_Q1R_S = mysqli_query($con_MAIN,$Tab1_Q1_S) or die(mysqli_error());
if(mysqli_num_rows($Tab1_Q1R_S)>0){ 

?>								
	<div class="col-sm-12">
		<div class="widget-box transparent collapsed">
			<div class="widget-header widget-header-flat" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-user orange"></i>
					Sub-Contractors
					<a href="#Sub-Contractors<?php echo $count ;?>" id="sub-cont-anc<?php echo $count ;?>" data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="Sub-Contractors<?php echo $count ;?>">
					<i class="ace-icon fa fa-chevron-down pull-right" id="sub-cont-chev<?php echo $count; ?>" style="color:white;"></i>
					<?php
						
						$chevron .= "
							
						$('#sub-cont-anc".$count."').click(function(){
						if($('#sub-cont-chev".$count."').hasClass('ace-icon fa fa-chevron-down')){
							$('#sub-cont-chev".$count."').removeClass('ace-icon fa fa-chevron-down');
							$('#sub-cont-chev".$count."').addClass('ace-icon fa fa-chevron-up');
							
						}
						else{
							$('#sub-cont-chev".$count."').removeClass('ace-icon fa fa-chevron-up');
							$('#sub-cont-chev".$count."').addClass('ace-icon fa fa-chevron-down');
							
						}
					});
						";
					
					?>
					</a>
				</h4>
			</div>

			<div id="Sub-Contractors<?php echo $count ;?>" class="collapse">
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
	} // While Close
}else{ 
?>
<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger">There are no contracts</div>
	</div>
</div>
<?php		
	} ?>

<script type="text/javascript">
	// function getFinancingFastFund(id){
	// 	var base_url = "<?php // echo base_url; ?>";
	// 	$.ajax({
	//       type: "POST",
	//       url: ""+base_url+"tabs/tab1/contract_detail.php",
	//       data: {id:id},
	//       // cache: false,
	//       // contentType: false,
	//       // processData: false,
	//       success:function(data){
	//         $('#contract_details_table').html(data);
	//       }
	//     });
		// $.post(""+base_url+"tabs/financial_services.php", {id:id}).done(function(e){
  //       	console.log(e);
  //   	});
  	//}
</script>
	