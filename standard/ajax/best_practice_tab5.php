											<?php
											include "../config/config_prmsub.php";
											include "../functions/functions.php";
											 ?> 
											<?php 
												$Limit = '';
												$PageID = $_POST['pageid'];
												$TotalRecord = $_POST['totalBidWin'];
												$OFFSET = $PageID-1;
												$OFFSETLast = $TotalRecord-1;
												if($PageID == 1){
													$Limit = ' LIMIT 1 OFFSET 0';
												}elseif($PageID == $TotalRecord){
													$Limit = ' LIMIT 1 OFFSET '.$OFFSETLast.'';
												}else{
													$Limit = ' LIMIT 1 OFFSET '.$OFFSET.'';
												}
												
												
												
												$Tab2_Q5 = 'SELECT * FROM `bidwin` WHERE `type`="Best Practices" '.$Limit.'';
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
												<div class="blog_post_heading" style="text-transform:uppercase;background:#376092;color:#ffcc00;"><span style="text-transform:uppercase;background:#376092;color:#ffcc00;"><?php echo $Tab2_Q5D['title']; ?></span></div>
												<div class="blog_post_heading"><span style="text-transform:uppercase;"><?php echo $Tab2_Q5D['content_type']; ?></span> - <span style="color:#fff;"><i>[Source: <?php echo $Tab2_Q5D['ref_url']; ?>]</i></span></div>
												<p style="padding:10px;color:#10253F;"><?php echo substr($Tab2_Q5D['text'],0,500); ?></p>
												<a <?php if($Tab2_Q5D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q5D['ref_url']; ?>" class="pull-right moreinfoa">READ MORE</a>
											</div>
											<?php $Tab2_Index5++; } ?>