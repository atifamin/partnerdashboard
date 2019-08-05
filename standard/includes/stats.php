<div class="row">
  <div class="col-md-3 text-center">
    <img src="<?php echo base_url; ?>assets/img/bizVAULT-logo-trans.png" height="60px" class="">
  </div>
  <div class="col-md-2 bg-light-blue-1 text-center">
      <label class="m-6">Your Private bizVAULT™<br>Cloud Storage is Ready<br><a href="" class="text-red">CLICK HERE TO ACCESS</a> </label>
  </div>
  <div class="col-md-2 text-center">
    <img src="<?php echo base_url; ?>assets/img/bizvault_video_tour-large.png" width="110px">
    <div class="v-line-left"></div>
  </div>
  <div class="col-md-2">
    <!-- <div class="row text-center" style="background-color: #4E80C6; width: 130px;">
      <div class="col-md-12">
        <span class="text-white">0</span>
        <span style="color: #A9D8F4"> FILES MISSING</span>
      </div>
    </div>
    <div class="row text-center" style="background-color: #8dea7b; width: 130px;">
      <div class="col-md-12">
        <span class="text-white">UPLOADED</span>
      </div>
    </div> -->
    <img src="<?php echo base_url; ?>assets/img/progress.PNG" width="100px" height="75px">
  </div>
  <div class="col-md-3">
    <div class="v-line-right"></div>
    <label class="light-blue"><i class="fa fa-fw fa-clock-o icon-clock"></i>&nbsp&nbsp&nbspYour bizVAULT™ Notification</label>
    <label class="light-blue"><i class="fa fa fa-heartbeat icon-hearbeat"></i>&nbsp&nbsp&nbspYour bizVAULT™™ Activity Status</label>
    <label class="light-blue"><i class="fa fa-users icon-user"></i>&nbsp&nbsp&nbspYour bizVAULT™ Access Status</label>
  </div>
</div>
<div class="col-md-12">
    <hr class="h-line">
</div>
<div class="row">
  <?php
	$CurrentYear = date('Y');
	$LastYear	 = $CurrentYear-1;
  ?>
  <div class="col-lg-3 col-xs-6"> 
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;">$<?php echo nice_number(totalContractRevenue($CurrentYear),'format'); ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL REVENUE</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>
      </div>
      <div class="icon"> <i class="fa fa-fw fa-dollar"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6"> 
    <!-- small box -->
    
    <?php
	  $thisYearTotalPrimeContracts1 = thisYearTotalPrimeContracts($CurrentYear);
	  $thisYearTotalSubContracts1 = thisYearTotalSubContracts($CurrentYear);
	  $TotalContractsThisYear1 = $thisYearTotalPrimeContracts1+$thisYearTotalSubContracts1;
	  $Lenght1 = strlen($TotalContractsThisYear1);
	  if($Lenght1>=3){
		$Style1 = 'style="font-size:44px;margin-top:63px;"';
	  }else{$Style1='';}
	?>
    <div class="small-box" id="small-box-tc">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;"><?php echo $TotalContractsThisYear1; ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL CONTRACTS</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>  
      </div>
      <div class="icon"> <i class="fa fa-fw fa-trophy"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <?php
	  $thisYearTotalPrimeContracts = thisYearTotalPrimeContracts($LastYear);
	  $thisYearTotalSubContracts = thisYearTotalSubContracts($LastYear);
	  $TotalContractsThisYear = $thisYearTotalPrimeContracts+$thisYearTotalSubContracts;
	  $Lenght = strlen($TotalContractsThisYear);
	  if($Lenght>=3){
		$Style = 'style="font-size:44px;margin-top:63px;"';
	  }else{$Style='';}
	?>
    <!-- small box -->
    <div class="small-box" id="small-box-sc">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;"><?php echo $TotalContractsThisYear; ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL SUB-CONTRACTS</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>
      </div>
      <div class="icon"> <i class="far fa-thumbs-up"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6"> 
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;"><?php echo newBusinessOpp(); ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL BIDS</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>
      </div>
      <div class="icon"> <i class="fa fa-fw fa-group"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col --> 
</div>
