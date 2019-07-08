								<div class="col-sm-12" style="padding-top:25px;">
									<div class="widget-box">
										<div class="widget-header widgetheading">
											<h4 class="smaller"><i class="ace-icon glyphicon glyphicon-th"></i> THE BASICS: Cash Flow Management 101</h4>
										</div>
										<div class="widget-body">
											<div class="widget-main" style="float: left; width: 100%;">
												<div id="tab2-loader"><img src="assets/img/loadin_g.gif" alt="Loading" /></div>
												<div class="cfm-panel">
												<?php
													$Tab2_Q1 = 'SELECT cfm_id,title FROM `cfm` WHERE `type`="CFM101" LIMIT 6';
													$Tab2_Q1R = mysqli_query($con_PRMSUB,$Tab2_Q1) or die(mysqli_error());
													if(mysqli_num_rows($Tab2_Q1R)>0){
														$IndexT2 = 1;
														while($Tab2_Q1D = mysqli_fetch_array($Tab2_Q1R)){
														?>
														<div onclick="show_cfm101(<?php echo $Tab2_Q1D['cfm_id']; ?>,'<?php echo $Tab2_Q1D['title']; ?>')" class="circle-box circle-box-<?php echo $IndexT2; ?>"><?php //echo $Tab2_Q1D['title']; ?></div>
														<?php	
														$IndexT2++; }
														
													}else{}
												?>
												<div id="current-selected" class="current-selected"></div>
												</div>
												<div id="cfm-panel-detail-id" class="cfm-panel-detail"> 
													<div class="alert alert-success1" style="text-align:center;margin-top:79px;"><h3>FOR CASH FLOW MANAGEMENT BASICS<br />CLICK THE CIRCLES ON THE LEFT</h3></div>
												</div>
											</div>
										</div>
									</div>
								</div>