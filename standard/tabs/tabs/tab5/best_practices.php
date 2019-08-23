<div class="col-sm-12">
									<div class="widget-box" style="float: left; width: 100%;">
										<div class="widget-header widgetheading">
											<h4 class="smaller"><i class="ace-icon glyphicon glyphicon-list"></i> BEST PRACTICES: Contract Win Rate Tips</h4>
										</div>
							<div class="widget-body">
										<?php
											$Tab2_Q4 = 'SELECT `bidwin_id`,`title`,`content_code` FROM `bidwin` WHERE `type`="Best Practices"';
											$Tab2_Q4R = mysqli_query($con_MAIN,$Tab2_Q4) or die(mysqli_error());
											$Count = mysqli_num_rows($Tab2_Q4R);
										?>
											<div class="widget-main no-padding">
												<div class="col-sm-12" style="padding:0px;">
									<div class="tabbable tabs-left">
										<ul class="nav nav-tabs bestpractices" id="myTab31_tab5"> 
											<?php
												$Tab2_Q5 = 'SELECT `bidwin_id`,`content_code` FROM `bidwin` WHERE `type`="Best Practices" LIMIT 1';
												$Tab2_Q5R = mysqli_query($con_MAIN,$Tab2_Q5) or die(mysqli_error());
												$Tab2_Index5 = 1;
												$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);
												$ContentCode = $Tab2_Q5D['content_code'];
											?>
											<li class="tabpane_best_1"> 
												<a><input <?php if(strpos($ContentCode,'BD') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Bid Decisioning</a>
											</li>
											<li class="tabpane_best_2"> 
												<a><input <?php if(strpos($ContentCode,'BAP') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Bid Analysis & Pricing</a>
											</li>
											<li class="tabpane_best_3"> 
												<a><input <?php if(strpos($ContentCode,'PS') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Partnering Strategies</a>
											</li>
											<li class="tabpane_best_4"> 
												<a><input <?php if(strpos($ContentCode,'MKT') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Marketing and Promotion</a>
											</li>
										</ul>
										<div class="buttons_the_basic">
											<input type="hidden" value="<?php echo $Tab2_Q5D['bidwin_id']; ?>" id="current_bidwin_id" />
											<button id="firstbtn_tab5" onclick="loadbidwindata('Previous')" type="button" disabled="disabled" class="the_basic_buttons">PREVIOUS</button>
											<button id="lastbtn_tab5" onclick="loadbidwindata('Next')" type="button" class="the_basic_buttons the_basic_buttons_next">NEXT</button>
											<ul class="paging">
												<?php
													$Tab2_Q4 = 'SELECT `bidwin_id` FROM `bidwin` WHERE `type`="Best Practices"';
													$Tab2_Q4R = mysqli_query($con_MAIN,$Tab2_Q4) or die(mysqli_error());
													$Count = mysqli_num_rows($Tab2_Q4R); 
													if($Count>0){
														$Pagination = 1; 
														while($Indexes = mysqli_fetch_assoc($Tab2_Q4R)){
														if($Count == $Pagination){
															$Show = 'Last';
														}elseif($Pagination == 1){
															$Show = 'First';
														}else{$Show = '';}
												?>
												<li><a id="pagination_id_<?php echo $Indexes['bidwin_id']; ?>" class="paginationli <?php if($Pagination == 1){echo 'active';} ?>" onclick="load_basic_practice_bidwin(<?php echo $Indexes['bidwin_id']; ?>,'<?php echo $Show; ?>')"><?php echo $Pagination; ?></a></li>
												<?php
														$Pagination++; }
													}
												?>
											</ul>
										</div>
										<div class="tab-content no-padding" style="background:#95B3D7;min-height:258px;">  
											<div id="bestpractice_response_content_tab5">
											<?php 
												$Tab2_Q5 = 'SELECT * FROM `bidwin` WHERE `type`="Best Practices" LIMIT 1';
												$Tab2_Q5R = mysqli_query($con_MAIN,$Tab2_Q5) or die(mysqli_error());
												$Tab2_Index5 = 1;
												while($Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R)){
											?>
											<div id="<?php echo replace_string(replace_string($Tab2_Q5D['content_code'],'_',' '),'_',','); ?>" class="tab-pane <?php if($Tab2_Index5 == 1){echo 'in active';} ?>">
												 
												<?php if(diff_days_of_dates($Tab2_Q5D['creation_date'])<10){ ?>
													<div class="new_this_week">NEW This Week! </div> 
												<?php
													}elseif(diff_days_of_dates($Tab2_Q5D['creation_date'])<30){
												?>
													<div class="new_this_week">NEW</div> 
												<?php		
													}
												?>
												<div class="blog_post_heading"><span style="text-transform:uppercase;"><?php echo $Tab2_Q5D['content_type']; ?></span> - <span style="color:#fff;"><i>[Source: <?php echo $Tab2_Q5D['ref_url']; ?>]</i></span></div>
												<p style="padding:10px;color:#10253F;"><?php echo substr($Tab2_Q5D['text'],0,500); ?></p>
												<a <?php if($Tab2_Q5D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q5D['ref_url']; ?>" class="pull-right moreinfoa">READ MORE</a>
											</div>
											<?php $Tab2_Index5++; } ?> 
											</div>
										</div>
									</div>
								</div> 
											</div> 
										</div>
									</div>
								</div>