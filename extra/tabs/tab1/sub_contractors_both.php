<?php
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
			WHERE pc.contract_number = sc.contract_number AND sc.dbe_firm_id = '.$FirmID.'';
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
											<div class="widget-main no-padding">
												<table class="table table-bordered"> 

													<tbody>
														<tr>
															<td><strong>Contract Number</strong></td>
															<td><b class="dark-blue"><?php echo $Tab1_Q1D['contract_number']; ?></b></td> 
														</tr>
														<tr>
															<td><strong>Description</strong></td>
															<td><?php echo $Tab1_Q1D['description_of_work']; ?></td> 
														</tr>
														<tr>
															<td><strong>Location</strong></td>
															<td><b class="dark-blue"><?php echo $Tab1_Q1D['dist_co_rte_pm']; ?></b></td> 
														</tr>
														<tr>
															<td><strong>Amount</strong></td>
															<td><b class="dark-blue">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></b></td> 
														</tr>
														<tr>
															<td><strong>Bid Wind Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></td>
															<td><b class="dark-blue"><?php echo date('M d, Y',strtotime($Tab1_Q1D['award_date'])); ?></b></td> 
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
								<div class="hr hr32 hr-dotted"></div>
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