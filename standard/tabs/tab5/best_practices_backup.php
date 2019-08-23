<div class="col-sm-12">
									<div class="widget-box" style="float: left; width: 100%;">
										<div class="widget-header widgetheading">
											<h4 class="smaller"><i class="ace-icon glyphicon glyphicon-list"></i> BEST PRACTICES: Contract Win Rate Tips</h4>
										</div>
							<div class="widget-body">
										<?php
											$Tab2_Q4 = 'SELECT `bidwin_id`,`title`,`content_code` FROM `bidwin` WHERE `type`="Best Practices" GROUP BY `content_code`';
											$Tab2_Q4R = mysqli_query($con_MAIN,$Tab2_Q4) or die(mysqli_error());
											if(mysqli_num_rows($Tab2_Q4R)>0){
										?>
											<div class="widget-main no-padding">
												<div class="col-sm-12" style="padding:0px;">
									<div class="tabbable tabs-left">
										<ul class="nav nav-tabs bestpractices" id="myTab3">
										<?php $Tab2_Index3 = 1;
											while($Tab2_Q4D = mysqli_fetch_assoc($Tab2_Q4R)){
										?>
											<li class="tabpane_best_<?php echo $Tab2_Index3; ?> <?php if($Tab2_Index3 == 1){echo 'active';} ?>">
												<a data-toggle="tab" href="#<?php echo replace_string(replace_string($Tab2_Q4D['content_code'],'_',' '),'_',','); ?>">
													<input type="checkbox" name="" id="" class="" value="1" />
													<?php echo $Tab2_Q4D['title']; ?>
												</a>
											</li>
										<?php $Tab2_Index3++; } ?>	 
										</ul>
										<div class="tab-content no-padding" style="background:#95B3D7;min-height:200px;"> 
											<?php
												$Tab2_Q5 = 'SELECT * FROM `bidwin` WHERE `type`="Best Practices" GROUP BY `content_code`';
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
													<div class="new_this_week">NEW </div> 
												<?php		
													}
												?>
												<div class="blog_post_heading"><span style="text-transform:uppercase;"><?php echo $Tab2_Q5D['content_type']; ?></span> - <span style="color:#fff;"><i>[Source: <?php echo $Tab2_Q5D['ref_url']; ?>]</i></span></div>
												<p><?php echo substr($Tab2_Q5D['description'],0,500); ?></p>
												<a <?php if($Tab2_Q5D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q5D['ref_url']; ?>" class="pull-right moreinfoa">READ MORE</a>
											</div>
											<?php $Tab2_Index5++; } ?> 
										</div>
									</div>
								</div> 
											</div>
											<?php } ?>
										</div>
									</div>
								</div>