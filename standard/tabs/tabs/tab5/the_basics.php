<div class="col-sm-12" style="padding-top:25px;">
									<div class="widget-box" style="float: left; width: 100%;">
										<div class="widget-header widgetheading">
											<h4 class="smaller"><i class="ace-icon fa fa-eye"></i> THE BASICS: Increasing Contract Win Rate</h4>
										</div>
										<div class="widget-body">
										<?php
											$Tab2_Q2 = 'SELECT `bidwin_id`,`title`,`content_code` FROM `bidwin` WHERE `type`="Basics" GROUP BY `content_code`';
											$Tab2_Q2R = mysqli_query($con_MAIN,$Tab2_Q2) or die(mysqli_error());
											if(mysqli_num_rows($Tab2_Q2R)>0){
										?>
											<div class="widget-main no-padding">
												<div class="col-sm-12" style="padding:0px;">
									<div class="tabbable tabs-left">
										<ul class="nav nav-tabs" id="myTab3">
										<?php $Tab2_Index1 = 1;
											while($Tab2_Q2D = mysqli_fetch_assoc($Tab2_Q2R)){
										?>
											<li class="tab5_tabpane_<?php echo $Tab2_Index1; ?> <?php if($Tab2_Index1 == 1){echo 'active';} ?>">
												<a data-toggle="tab" href="#<?php echo replace_string($Tab2_Q2D['content_code'],'_',' '); ?>">
													<?php echo $Tab2_Q2D['title']; ?>
												</a>
											</li>
										<?php $Tab2_Index1++; } ?>	 
										</ul>
										<div class="tab-content" style="background:#4F81BC;min-height:246px;">
											<?php
												$Tab2_Q3 = 'SELECT * FROM `bidwin` WHERE `type`="Basics" GROUP BY `content_code`';
												$Tab2_Q3R = mysqli_query($con_MAIN,$Tab2_Q3) or die(mysqli_error());
												$Tab2_Index2 = 1;
												while($Tab2_Q3D = mysqli_fetch_assoc($Tab2_Q3R)){
											?>
											<div id="<?php echo replace_string($Tab2_Q3D['content_code'],'_',' '); ?>" class="tab-pane <?php if($Tab2_Index2 == 1){echo 'in active';} ?>">
												<h3 style="color:#ffcc00;margin-top:0px;"><?php echo $Tab2_Q3D['title']; ?></h3>
												<p><?php echo substr($Tab2_Q3D['text'],0,500); ?></p>
												<a <?php if($Tab2_Q3D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q3D['ref_url']; ?>" class="pull-right moreinfoa">MORE RESOURCES</a>
											</div>
											<?php $Tab2_Index2++; } ?> 
										</div>
									</div>
								</div>   
											</div>
											<?php } ?>
										</div>
									</div>
								</div>