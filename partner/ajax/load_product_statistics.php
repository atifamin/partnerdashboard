<?php
session_start();
$UserID 			 = $_SESSION['user_id'];
$PartnerID			 = $_SESSION['partner_id'];
include "../functions/functions.php";
include "../../config/config_main.php";
$Range = $_POST['range'];
?>
<?php 
													$Time = TimeFrequency($Range);
													$ProductStatistics = 'SELECT * FROM `partner_offer` WHERE `partner_id`='.$PartnerID.''; 
													$ProductStatisticsR = mysqli_query($con_MAIN,$ProductStatistics) or die(mysqli_error());
													if(mysqli_num_rows($ProductStatisticsR)>0){
														while($PSData = mysqli_fetch_assoc($ProductStatisticsR)){
															$ProductName = $PSData['offer_title'];
															$PartnerOfferID = $PSData['partner_offer_id'];
															$OfferBoxID = $PSData['offer_box_id'];
														?>

<div class="tile bg-my-studio">
  <div class="tile-body" style="color:#4B9126;text-decoration:underline;"><?php echo $ProductName; ?></div>
  <div class="tile-body" style="color:#fff;margin-top:0px;margin-bottom:0px;padding-top:0px;text-align:left;">
    <?php
																		$POViews = 'SELECT COUNT(*) AS TotalViews FROM `partner_offer_views` WHERE `product_offer_view_date` '.$Time.' AND `partner_offer_user_id`='.$UserID.' AND `partner_offer_id`='.$PartnerOfferID.'';
																		
																		echo runner($POViews,'TotalViews',$con_MAIN);
																	?>
    <span style="color:#fff;">Views</span> </div>
  <div class="tile-body" style="color:#fff;margin-top:0px;padding-top:0px;text-align:left;">
    <?php
																		$POOViews = 'SELECT COUNT(*) AS TotalViews FROM `offer_box_views` WHERE `offer_box_view_date` '.$Time.' AND `offer_box_user_id`='.$UserID.' AND `offer_box_id`='.$OfferBoxID.'';
																	
																		echo runner($POOViews,'TotalViews',$con_MAIN);
																	?>
    <span style="color:#fff;">Offers Opened</span> </div>
</div>
<?php	
														}
													}else{
														?>
<div class="caption-subject bold font-grey-gallery" style="text-align:center;color:#953735 !important;">No Products Available</div>
<?php
													}
												?>
