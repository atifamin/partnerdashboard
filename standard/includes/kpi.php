<div class="row">
							<?php
								$CurrentYear = date('Y');
								$LastYear	 = $CurrentYear-1;
							?>
							<div class="row">
								<div style="width:100%;height:139px;position:absolute;background:#4f81bd;z-index:999;"></div>
								<div class="col-sm-12 infobox-container">  									
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="z-index: 10000;">
									<div class="align-center kpi_headings" style="background:#4f81bd;padding:20px 0px;margin-top:10px;margin-bottom:10px;">
									<h2>YOUR <?php echo date('Y'); ?></h2>
									<h4>TOTAL CONTRACT REVENUE</h4>
									</div>
									<div class="infobox infobox-green infobox-large infobox-dark">
										<div class="kpi1_text">$<?php echo nice_number(totalContractRevenue($CurrentYear),'format'); ?></div>
									</div>
									</div>									
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="z-index: 10000;">
									<div class="align-center kpi_headings" style="background:#4f81bd;padding:20px 0px;margin-top:10px;margin-bottom:10px;">
									<h2>TOTAL CONTRACTS</h2>
									<h4>YOU WON THIS YEAR</h4>
									</div>
									<div class="infobox infobox-blue infobox-large infobox-dark">
										<div class="kpi2_text">
											<?php
												$thisYearTotalPrimeContracts1 = thisYearTotalPrimeContracts($CurrentYear);
												$thisYearTotalSubContracts1 = thisYearTotalSubContracts($CurrentYear);
												$TotalContractsThisYear1 = $thisYearTotalPrimeContracts1+$thisYearTotalSubContracts1;
												$Lenght1 = strlen($TotalContractsThisYear1);
												if($Lenght1>=3){
													$Style1 = 'style="font-size:44px;margin-top:63px;"';
												}else{$Style1='';}
											?>
											<div class="kpi_big" <?php echo $Style1; ?>><?php echo $TotalContractsThisYear1; ?></div>
											<div class="kpi_pc"><?php echo $thisYearTotalPrimeContracts1; ?> Prime Contracts<br /><?php echo $thisYearTotalSubContracts1; ?> Sub Contracts</div> 
										
										</div>
									</div>
									</div>									
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="z-index: 10000;">
									<div class="align-center kpi_headings" style="background:#4f81bd;padding:20px 0px;margin-top:10px;margin-bottom:10px;">
									<h2>TOTAL CONTRACTS</h2>
									<h4>YOU WON LAST YEAR</h4>
									</div>
									<div class="infobox infobox-grey infobox-large infobox-dark">
										<div class="kpi3_text">
											<?php
												$thisYearTotalPrimeContracts = thisYearTotalPrimeContracts($LastYear);
												$thisYearTotalSubContracts = thisYearTotalSubContracts($LastYear);
												$TotalContractsThisYear = $thisYearTotalPrimeContracts+$thisYearTotalSubContracts;
												$Lenght = strlen($TotalContractsThisYear);
												if($Lenght>=3){
													$Style = 'style="font-size:44px;margin-top:63px;"';
												}else{$Style='';}
											?>
											<div class="kpi_big" <?php echo $Style; ?>><?php echo $TotalContractsThisYear; ?></div>
											<div class="kpi_pc"><?php echo $thisYearTotalPrimeContracts; ?> Prime Contracts<br /><?php echo $thisYearTotalSubContracts; ?> Sub Contracts</div> 
										</div>
									</div>
									</div>									
									<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="z-index: 10000;">
									<div class="align-center kpi_headings" style="background:#4f81bd;padding:20px 0px;margin-top:10px;margin-bottom:10px;">
									<h2>NEW CONTRACTS</h2>
									<h4>AVAILABLE THIS MONTH</h4>
									</div>
									<div class="infobox infobox-purple infobox-large infobox-dark">
										<div class="kpi4_text">
											<div class="kpi_big"><?php echo newBusinessOpp(); ?></div>
											<div class="kpi_pc">New Business<br />Opportunities</div>
											<!--<div class="kpi_sc">Opportunities</div>-->
										</div>
									</div>
									</div>
								</div> 
							</div><!-- /.row -->
							<div class="row">
								<div class="space-6"></div>
								<div class="col-lg-6 no-padding"> 									
								<div class="col-sm-12 widget-container-col ui-sortable" style="padding-left:0px;">
									<div class="widget-box widget-color-dark">
										<div class="widget-header widget-hea1der-small bidwindrate_header">
											<h6 class="widget-title"><i class="ace-icon fa fa-gift bigger-150"></i> YOUR BID WIN RATE</h6>
											<div class="widget-toolbar" style="border-color:#fff !important;"> 
												<a href="#" data-action="reload">
													<i class="ace-icon fa fa-refresh"></i>
												</a>
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a> 
											</div>
										</div>

										<div class="widget-body" style="border:2px solid #32C5D2;float:left;width:100%;padding-bottom:21px;">
											<div class="widget-main bidwinrate_body">
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 no-padding"> 
													<div class="piechartmain">
														<div class="widget-header widget-hea1der-small bidwindrate_header">
															<h6 class="widget-title" style="color:#fff;"><i class="ace-icon fa fa-gift bigger-150"></i> YOUR BID WIN RATE</h6>
														</div>
														<div class="infobox easypiechart no-padding" style="margin-top:-8px;margin-left:26px;background:transparent;">
															<div class="infobox-progress no-padding" style="width:92px;float:left;">
																<div id="piechart-placeholder"></div>
															</div>
															<?php
																$BidWinRate = bidWonLost();
																$BidLost	= 100-$BidWinRate;
																if($BidWinRate==0){$BidLost = 0;}
															?>
															<div class="infobox-data no-padding" style="float: left; margin-top: 25px; min-width: 41px ! important; margin-left: 11px;">
																<span class="infobox-text"><?php echo $BidWinRate; ?>% WON</span>
																<span class="infobox-text"><?php echo $BidLost; ?>% LOST</span> 
															</div>
														</div>
														<style type="text/css">.legend table{display:none !important;}</style>
														<div id="piechart-placeholder"></div>
														<div class="piechart_bottom">
															<div class="piechart_bottom_half piechart_bottom_left">Your Bid<br />Win Rate</div>
															<div class="piechart_bottom_half piechart_bottom_right"><?php echo $BidWinRate; ?>%</div>
														</div>
													</div>													
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="industry_avg">
														<div class="avg_val" style="font-size:63px;">31%</div>
														<div class="avg_title" style="padding:10px 0;">INDUSTRY AVERAGE</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" onclick="active_wining_contract_tab()" style="cursor:pointer;">
													<div class="industry_avg bid_winning_tips">
														<div class="avg_val" style="font-size:74px;"><img src="assets/img/bid_winning_icon.png" alt="" /></div>
														<div class="avg_title bid_winning_title">Bid Winning<br />Tips and Tools</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div> 
								<div class="col-lg-6 no-padding"> 									
								<div class="col-sm-12 widget-container-col ui-sortable" style="padding-right:0px;">
									<div class="widget-box widget-color-dark">
										<div class="widget-header widget-hea1der-small bidwindrate_header">
											<h6 class="widget-title"><i class="ace-icon glyphicon glyphicon-signal bigger-150"></i> YOUR CASH FLOW HEALTH RATING</h6>
											<div class="widget-toolbar" style="border-color:#fff !important;"> 
												<a href="#" data-action="reload">
													<i class="ace-icon fa fa-refresh"></i>
												</a>
												<a href="#" data-action="collapse">
													<i class="ace-icon fa fa-chevron-up"></i>
												</a> 
											</div>
										</div>

										<div class="widget-body"  style="border:2px solid #32C5D2;float:left;width:100%;padding-bottom:20px;">
											<div class="widget-main bidwinrate_body">
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="cashflow_1">
														<div class="cashflow_1_img"><img src="assets/img/cash_flow_1.png" alt="" class="img-responsive" /></div>
														<div class="cashflow_1_val"><?php echo nice_number(cashFlowLast($LastYear)); ?></div>
														<div class="cashflow_2_val">YOUR SCORE</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="cashflow_1">
														<div class="cashflow_1_img"><img src="assets/img/cash_flow_2.png" alt="" class="img-responsive" /></div>
														<div class="cashflow_1_val">34.6</div>
														<div class="cashflow_2_val">INDUSTRY AVERAGE</div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
													<div class="industry_avg bid_winning_tips">
														<div class="avg_val" style="padding: 23px 0px;"><img src="assets/img/cash_flow_3.png" alt="" /></div>
														<div class="avg_title bid_winning_title">CASH FLOW<br />HEALTH CHECK</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div> 
							</div><!-- /.row -->