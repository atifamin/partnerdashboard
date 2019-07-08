<?php
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
			WHERE pc.contract_number = sc.contract_number AND sc.dbe_firm_id = '.$FirmID.'
			ORDER BY pc.contract_id DESC';
$Tab1_Q1R = mysqli_query($con_AWT,$Tab1_Q1) or die(mysqli_error()); 
if(mysqli_num_rows($Tab1_Q1R)>0){
	$Index = 1;
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){

?>
							<div class="row">
								<div class="col-sm-12" style="padding-top: 25px;">
									<div class="widget-box transparent  <?php if($Index!=1){echo 'collapsed';}?>">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title lighter">
												<i class="ace-icon fa fa-rss orange"></i>
												Contract Details
											</h4>

											<div class="widget-toolbar">
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-<?php if($Index!=1){echo 'down';}else{echo 'up';}?>"></i>
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
															<td><strong>Bid Win Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></td>
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
												<?php include "sub_contractors_only_more.php"; ?>
											</div>
										</div>
									</div>
								</div> 
								<div style="clear:both;height:20px;"></div>
<?php
}
?>	