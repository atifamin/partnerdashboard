<?php 
$Tab1_Q1 = '';
if($CertificationID>0){
	$Tab1_Q1 = 'SELECT * FROM `scprs` WHERE `Certification ID`='.$CertificationID.' GROUP BY `Purchase Order ID` ORDER BY scprs_record_id DESC LIMIT 100 OFFSET 1';
}elseif($VendorID>0){
	$Tab1_Q1 = 'SELECT * FROM `scprs` WHERE `Vendor ID`='.$VendorID.' GROUP BY `Purchase Order ID` ORDER BY scprs_record_id DESC LIMIT 100 OFFSET 1';
}
$Tab1_Q1R = mysqli_query($con_SCPR,$Tab1_Q1) or die(mysqli_error()); 
if(mysqli_num_rows($Tab1_Q1R)>0){ 
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){

?>							<div class="row">
								<div class="col-sm-12" style="padding-top: 25px;">
									<div class="widget-box transparent collapsed">
										<div class="widget-header widget-header-flat">
											<h4 class="widget-title lighter">
												<i class="ace-icon fa fa-rss orange"></i>
												Contract Details
											</h4>

											<div class="widget-toolbar">
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-down"></i>
												</a>
											</div>
										</div>
										<div class="widget-body">
											<div class="widget-main">
												<table class="table table-bordered primetable"> 

													<tbody>
														<tr>
															<td><strong>Department/Agency Name</strong></td>
															<td><?php echo $Tab1_Q1D['Business Unit Name']; ?></td> 
														</tr>
														<tr>
															<td><strong>Contract Number</strong></td>
															<td>
															<?php if($Tab1_Q1D['Contract ID']!=''){ ?> 
																<?php
																	$CID = $Tab1_Q1D['Contract ID'];
																	$CID_F = substr($CID,0,10);
																	$CID_L = substr($CID,-8,8); 
																	if($CID_F == 0000000000){
																		echo '<div id="contractid_'.$Tab1_Q1D['Contract ID'].'" style="float:left;"><b class="dark-blue">...'.$CID_L.'</b></div>';
																	}else{
																		echo $CID;
																	}
																?> 
																<?php if($CID_F == 0000000000){ ?>
																<div onclick="showentireconid('<?php echo $Tab1_Q1D['Contract ID']; ?>')" style="color:#1F497D;font-size:12px;text-align:right;float:right;cursor:pointer;">[Click Here to View Entire Contract ID]</div>
																<?php } ?>
															<?php } ?>
															</td> 
														</tr>
														<tr>
															<td><strong>Purchase Order ID</strong></td>  
															<td>
															<?php if($Tab1_Q1D['Purchase Order ID']!=''){ ?> 
																<?php
																	$PID = '';
																	$PID = $Tab1_Q1D['Purchase Order ID'];
																	$PID_F = substr($PID,0,10);
																	$PID_L = substr($PID,-8,8); 
																	if($PID_F == 0000000000){
																		echo '<div id="purchaseid_'.$Tab1_Q1D['Purchase Order ID'].'" style="float:left;"><b class="dark-blue">...'.$PID_L.'</b></div>';
																	}else{
																		echo $PID;
																	}
																?> 
																<?php if($PID_F == 0000000000){ ?>
																<div onclick="showentirepurid('<?php echo $Tab1_Q1D['Purchase Order ID']; ?>')" style="color:#1F497D;font-size:12px;text-align:right;float:right;cursor:pointer;">[Click Here to View Entire Purchase Order ID]</div>
																<?php } ?>
															<?php } ?>
															</td>
														</tr>
														<tr>
															<td><strong>Total Transactions:</strong></td>
															<td><?php echo nice_number(totalTransactions($Tab1_Q1D['Purchase Order ID'])); ?></td> 
														</tr>
														<tr>
															<td><strong>Total Transaction Amount:</strong></td>
															<td><b class="dark-blue">$ <?php echo nice_number(totalTransaction_Amount($Tab1_Q1D['Purchase Order ID']),'format'); ?></b></td> 
														</tr>
														<tr>
															<td><strong>Award Total:</strong></td>
															<td><b class="dark-blue">$ <?php echo nice_number(awardTotal($Tab1_Q1D['Purchase Order ID']),'format'); ?></b></td> 
														</tr> 
														<?php
															$TransactionDate = $Tab1_Q1D['Transaction Date'];
															$EnteredDate = $Tab1_Q1D['Entered Date'];
															if($TransactionDate!='' || $TransactionDate!=NULL){
														?>
														<tr>
															<td><strong>Transaction Date:</strong></td>
															<td><b class="dark-blue"><?php echo $TransactionDate; ?></b></td> 
														</tr>
														<?php
															}elseif($EnteredDate!='' || $EnteredDate!=NULL){
														?>
														<tr>
															<td><strong>Entered Date:</strong></td>
															<td><b class="dark-blue"><?php echo $EnteredDate; ?></b></td> 
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
								<div style="clear:both;height:0px;"></div> 
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

	