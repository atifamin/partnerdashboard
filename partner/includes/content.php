<link rel="stylesheet" href="<?php echo base_url ;?>assets/css/style.css">
<style>
@media screen and (min-width: 1400px) {
#indAvg{margin-top:42%!important;}
}
</style>
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
	  
	  
	  <div class="row">

     <div class="col-lg-6 connectedSortable" style="margin-top:2px;">
         
         <!-- News box -->
         <div class="box box-info news-box box-solid">
           <div class="box-header">
             <div class="box-icon box-blue ">
             <!-- <img alt="news" src="<?php echo base_url ; ?>assets/img/news-icon.png" />-->
			 <i class="fa fa-newspaper-o fa-3x" style="margin-top:8px;color:white;" ></i>
             </div>
             <h3 class="box-title">Business News for <br> <?php echo $BusinessName; ?></h3>
           </div>
           <div id="news-wrapper" class="news-wrapper" style="height:284px;">
           <ul class="box-body news" id="news-box">
           
             
             
           </ul>
           </div>
           <!-- /.News -->
          
         </div>
         <!-- /.box (News box) -->

     

       </div>
       <!-- /.Left col -->
       <!-- right col (We are only adding the ID to make the widgets sortable)-->

		
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border" style="background-color: #337ab7; color: white;padding: 5px;border-style: solid;border-color: #d2d6de;margin-bottom: 5px;">
              
              <i class="fa fa-fw fa-signal"></i>
              <h3 class="box-title">Your Cash flow Health Rating</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding:20px;">
              <div class="row">
			    <div class="col-lg-4 col-xs-6 col-md-3 text-center">
                  <input type="text" class="knob" value="62" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#f56954">

                  <div class="knob-label">
				  <br>
				  <p style="margin-top: 10%;text-align:center;background-color:#c3d69b;padding:5px;color:#77933c;font-size:24px;">
				  <b><?php echo nice_number(cashFlowLast($LastYear)); ?></b></p>
				   <p style="text-align:center;background-color:#77933c;padding:0px;color:white;font-size:15px;margin-top: -8%;">YOUR SCORE<br></p>
				   
				   <p style="text-align:center;background-color:aliceblue;padding:5px;font-weight:500;font-size: 14px;margin-top:0%;">
					 <a href="#" >More info <i class="fa fa-arrow-circle-right"></i></a></p>
				  </div>
                </div>
				
				<div class="col-lg-4 col-xs-6 col-md-3 text-center">
                  <input type="text" class="knob" value="80" data-skin="tron" data-thickness="0.2" data-width="120" data-height="120" data-fgColor="#3c8dbc" data-readonly="true">

                  <div class="knob-label">
				  <br>
				  <p style="margin-top: 10%;text-align:center;background-color:#c3d69b;padding:5px;color:#77933c;font-size:24px;">
				   <b>34.6</b></p>
				   <p style="text-align:center;background-color:#77933c;padding:0px;color:white;font-size:15px;margin-top: -8%;">INDUSTRY AVERAGE<br></p>
				   
				   <p style="text-align:center;background-color:aliceblue;padding:5px;font-weight:500;font-size: 14px;margin-top:0%;">
					 <a href="#" >More info <i class="fa fa-arrow-circle-right"></i></a></p>
				  </div>
                </div>
				
				<div class="col-lg-4 col-xs-6 col-md-3 text-center" style="background-color:#B7DEE8;">
				
				<h1 style="text-align:center;font-size:100px;color: lavender;"><img src="assets/img/cash_flow_3.png" style="width:44%;"></h1>
				<p style="text-align:center;background-color:#0070C0;padding:5px;color:white;font-size:15px;margin-top: 21%;">Cash Flow</p>
				
				   <p style="text-align:center;background-color:aliceblue;padding:5px;margin-top: 3%;font-weight:500;font-size: 14px;margin-top:0%;">
					 <a href="#" >More info <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
				
			  </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
    <div class="row">
	  <?php
			$BidWinRate = bidWonLost();
			$BidLost	= 100-$BidWinRate;
			if($BidWinRate==0){$BidLost = 0;}
		?>
        <div class="col-md-6 col-xs-12 pull-right">
          <div class="box box-solid">
            <div class="box-header with-border" style="background-color: #337ab7; color: white;padding: 5px;border-style: solid;border-color: #d2d6de;margin-bottom: 5px;">
              
            <i class="fa fa-fw fa-gift"></i>
              <h3 class="box-title">Your Bid Win Rate</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="padding:20px!important;">
			 <div class="row">
			    <div class="col-lg-4" style="margin-top:-2%;">
				  <div class="chart-responsive">
					 <div class="chart" id="bid-win-chart" style="height: 212px; position: relative;"></div>
           
				  </div>
				 
          <span style="color:green;"><?php echo $BidWinRate; ?>% WON</span><br>
				 <span style="color:green;"><?php echo $BidLost; ?>% LOST</span> 
				 
				  <p style="background-color: #3c8dbc;color: white;padding: 4px;height: 39px;margin-top: -2px;font-size:13px;text-align:center;" >Your Bid Win Rate<strong> &nbsp;&nbsp;<?php echo $BidWinRate; ?>%</strong></p>
				</div>
				<div class="col-lg-4" style="background-color:#4F81BD;border-right-style:solid;border-right-color:white;border-right-width: 10px;">
					 <h1 style="text-align:center;font-size:70px;color: lavender;">31%</h1>
					 
					 <p id="indAvg" style="margin-top:84%;text-align:center;background-color: #1F497D;color:white;padding:5px;">Industry Average</p>
					 <p style="text-align:center;background-color:aliceblue;padding:5px;">
					 <a href="#" >More info <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
				<div class="col-lg-4" onclick="active_wining_contract_tab()" style="background-color:#B7DEE8;border-left-style:solid;border-left-color: white;border-left-width: 10px;">
				<h1 style="text-align:center;font-size:100px;color: lavender;">
        <img src="assets/img/bid_winning_icon.png" style="width:44%;cursor:pointer;"></h1><br>
				 <p style="margin-top: 11%;text-align: center;background-color: #0070C0;color: white;padding: 7px;">Bid Wining Tips and Tools</p>
				 <p style="text-align:center;background-color:aliceblue;padding:5px;">
					 <a href="#" >More info <i class="fa fa-arrow-circle-right"></i></a></p>
				</div>
			  </div> 
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
	  
	  
	  

	  
	  
<script src="bower_components/jquery-knob/js/jquery.knob.js"></script>
<script src="bower_components/raphael/raphael.min.js"></script>	  
<script src="bower_components/morris.js/morris.min.js"></script>	
<script src="assets/js/news.js"></script> 						
<script type="text/javascript">

var donut = new Morris.Donut({
      element: 'bid-win-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954"],
      data: [
        {label: "Bid Win Rate"+'<?php echo $BidWinRate; ?>', value: '<?php echo $BidWinRate; ?>'},
        {label: "Bid Lost Rate"+'<?php echo $BidLost; ?>', value: '<?php echo $BidLost; ?>'}
      ],
      hideHover: 'auto'
    });
</script>	
<script>
  $(function () {
    /* jQueryKnob */

    $(".knob").knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv)  // Angle
              , sa = this.startAngle          // Previous start angle
              , sat = this.startAngle         // Start angle
              , ea                            // Previous end angle
              , eat = sat + a                 // End angle
              , r = true;

          this.g.lineWidth = this.lineWidth;

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3);

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value);
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3);
            this.g.beginPath();
            this.g.strokeStyle = this.previousColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
            this.g.stroke();
          }

          this.g.beginPath();
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
          this.g.stroke();

          this.g.lineWidth = 2;
          this.g.beginPath();
          this.g.strokeStyle = this.o.fgColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
          this.g.stroke();

          return false;
        }
      }
    });
  });

</script>	
<script src="<?php echo base_url; ?>assets/js/news.js"></script>     