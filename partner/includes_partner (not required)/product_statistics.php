
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN Portlet PORTLET-->
    <div class="portlet light">
      <div class="portlet-title">
        <div class="caption"> <span class="caption-subject bold font-grey-gallery uppercase">Product Statistics</span> </div>
        <div class="tools">
          <div class="actions" style="margin-right: 33px;">
            <div class="btn-group"> <a class="btn btn-sm default dropdown-toggle" href="javascript:;" style="background-color:#DCE6F2;border-color:#DCE6F2;color:#4F81BD;" data-toggle="dropdown" aria-expanded="false"> DATE RANGE <i class="fa fa-angle-down"></i> </a>
              <ul class="dropdown-menu pull-right product_statistics_range">
                <li><a id="psr_1" onclick="load_product_statistics('Today','psr_1')" class="psr active">Today</a></li>
                <li><a id="psr_2" onclick="load_product_statistics('This Week','psr_2')" class="psr">This Week</a></li>
                <li><a id="psr_3" onclick="load_product_statistics('Last Week','psr_3')" class="psr">Last Week</a></li>
                <li><a id="psr_4" onclick="load_product_statistics('This Month','psr_4')" class="psr">This Month</a></li>
                <li><a id="psr_5" onclick="load_product_statistics('Last Month','psr_5')" class="psr">Last Month</a></li>
                <li><a id="psr_6" onclick="load_product_statistics('This Year','psr_6')" class="psr">This Year</a></li>
                <li><a id="psr_7" onclick="load_product_statistics('All Time','psr_7')" class="psr">All Time</a></li>
              </ul>
            </div>
          </div>
          <a href="" class="collapse" style="margin:-24px 0 0 138px; position:absolute;"> </a> <img src="assets/img/preloader_horizontal.gif" alt="Loading" style="margin:3px 0 0 -2px; position:absolute;display:none;" id="daterangeloader" /> </div>
      </div>
      <div class="portlet-body" id="my_tiles">
        <div id="product_statistics_response" class="tiles">
          <?php
													$Time = TimeFrequency('Today');
													$ProductStatistics = 'SELECT * FROM `partner_offer` WHERE `partner_id`='.$PartnerID.''; 
													$ProductStatisticsR = mysqli_query($con_PRMSUB,$ProductStatistics) or die(mysqli_error());
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
																		echo runner($POViews,'TotalViews',$con_PRMSUB);
																	?>
              <span style="color:#fff;">Views</span> </div>
            <div class="tile-body" style="color:#fff;margin-top:0px;padding-top:0px;text-align:left;">
              <?php
																		$POOViews = 'SELECT COUNT(*) AS TotalViews FROM `offer_box_views` WHERE `offer_box_view_date` '.$Time.' AND `offer_box_user_id`='.$UserID.' AND `offer_box_id`='.$OfferBoxID.'';
																		echo runner($POOViews,'TotalViews',$con_PRMSUB);
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
        </div>
      </div>
    </div>
    <!-- END GRID PORTLET--> 
  </div>
</div>
