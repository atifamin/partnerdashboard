<?php
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
			WHERE pc.contract_number = sc.contract_number AND sc.dbe_firm_id = '.$FirmID.'
			ORDER BY pc.contract_id DESC'; 
$Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error()); 
if(mysqli_num_rows($Tab1_Q1R)>0){
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){

?>
<div class="row">
	<div class="col-sm-12" style="padding-top: 25px;">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-rss orange"></i>
					Contract Details
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>
			<div class="widget-body">
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
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-default"><img src="<?php echo base_url;  ?>assets/img/get_financing.PNG" style="cursor: pointer;width: 100%;height: 100%;margin-bottom: 5px;" alt="Get Financing"></a></td>
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
			WHERE pc.contract_number = sc.contract_number AND sc.dbe_firm_id = '.$FirmID.'
			AND pc.contract_number="'.$Tab1_Q1D['contract_number'].'"';
$Tab1_Q1R_S = mysqli_query($con_MAIN,$Tab1_Q1_S) or die(mysqli_error());
if(mysqli_num_rows($Tab1_Q1R_S)>0){ 

?>								
	<div class="col-sm-12">
		<div class="widget-box transparent">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-user orange"></i>
					Sub-Contractors
				</h4>

				<div class="widget-toolbar">
					<a href="#" data-action="collapse">
						<i class="ace-icon fa fa-chevron-up"></i>
					</a>
				</div>
			</div>

			<div class="widget-body">
				<div class="widget-main no-padding">
					<table class="table table-bordered">
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

								<td class="hidden-480" style="background:#93CDDD;color:#10253F;text-align:center;">
									<?php
										$Tab1_Q4 = 'SELECT `Certification Type` FROM `sbdvbe` WHERE `Certification ID`='.$FirmID.'';
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
<div class="hr hr32 hr-dotted"></div>
<div style="clear:both;height:0px;"></div>
<?php  
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
		<div class="widget-header widget-header-large" style="background:#1F497D;color:#fff;">
			<h4 class="widget-title">View other Sub-Contracts You Have Recently Won</h4>
			<div class="widget-toolbar">
				<a href="#" data-action="collapse">
					<i class="ace-icon fa fa-chevron-down"></i>
				</a> 
			</div>
		</div>

		<div class="widget-body">
			<div class="widget-main">
				<?php include "sub_contractors_more.php"; ?>
			</div>
		</div>
	</div>
</div> 
<div style="clear:both;height:20px;"></div>
<?php
}
?>