											<?php
											//session_start();
											include "../../../config/config_main.php";
											include "../../functions/functions.php";
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
											
												$Tab2_Q5 = 'SELECT `bidwin_id`,`content_code` FROM `bidwin` WHERE `type`="Best Practices" '.$Limit.'';
												$Tab2_Q5R = mysqli_query($con_MAIN,$Tab2_Q5) or die(mysqli_error());
												$Tab2_Index5 = 1;
												$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);
												$ContentCode = $Tab2_Q5D['content_code'];
												// For View Log
												$BidWinID	 = $Tab2_Q5D['bidwin_id'];
												$UserID		 = $_SESSION['user_id'];
												$Insert = "INSERT INTO `bidwin_views`(`bidwin_user_id`,`bidwin_id`,`bidwin_view_date`) VALUES ('".$UserID."','".$BidWinID."','".date('Y-m-d H:i:s')."')";
												$Tab2_Q5R = mysqli_query($con_MAIN,$Insert) or die(mysqli_error());
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