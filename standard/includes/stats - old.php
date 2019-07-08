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
              
              <span style="font-weight:600;font-size:26px;">YOUR <?php echo date('Y'); ?></span><br>
			        Total Contract Revenue
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-dollar"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
         
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
              <span style="font-weight:600;font-size:26px;">YOUR <?php echo date('Y'); ?></span><br>
			         Total Contracts Won
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-trophy"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
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
              <span style="font-weight:600;font-size:26px;">YOUR <?php echo date('Y'); ?></span><br>
			        Total Sub-Contracts Won
            </div>
            <div class="icon">
              <i class="far fa-thumbs-up"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
		
              <h3><?php echo newBusinessOpp(); ?></h3>
			 
             <span style="font-weight:600;font-size:16px;" >NEW BUSINESS</br>
 				       OPPORTUNITIES  FOUND</span>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-group"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
</div>