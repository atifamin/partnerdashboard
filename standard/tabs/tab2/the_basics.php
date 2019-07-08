<style>
.cfm-panel{
	background:url('<?php echo base_url; ?>assets/img/cash_flow_selector_animation_300.png') 
	no-repeat #fff; 
	height:332px; 
	width:300px; 
	float:left;
	}
	.circle-box{color:#fff;font-size:11px;font-weight:bold;text-align:center;width:80px;position:absolute;line-height:13px;cursor:pointer;height:80px;}
.circle-box:hover{color:#10253F;}
.circle-box-1{margin:4px 0 0 111px;}
.circle-box-6{margin:66px 0 0 6px;}
.circle-box-5{margin:188px 0 0 7px;}
.circle-box-4{margin:246px 0 0 110px;}
.circle-box-3{margin:185px 0 0 216px;}
.circle-box-2{margin:62px 0 0 216px;}
.cfm-panel-detail{float:left;width:59%;padding:3%;}
#tab2-loader{position:absolute;z-index:1000;margin:102px 0 0 88px;display:none;}
.current-selected{margin:154px 0 0 112px;color:#fff;font-size:13px;font-weight:bold;text-align:center;width:80px;position:absolute;line-height:13px;cursor:pointer;}
.cfm-panel{
	border-style: solid;
    padding: 1px;
    border-width: 4px;
    border-color: #d8dbdf;
    padding-right: 30%;
    padding-bottom: 21%;
}
</style>
<div class="col-sm-12" style="padding-top:25px;">
	<div class="widget-box">
		<div class="widget-header widgetheading" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
			<h4 class="smaller"><i class="ace-icon glyphicon glyphicon-th"></i> THE BASICS: Cash Flow Management 101</h4>
		</div>
		<div class="widget-body">
			<div class="widget-main" style="float: left; width: 100%;background:white;">
				<div id="tab2-loader"><img src="<?php echo base_url; ?>assets/img/loadin_g.gif" alt="Loading" /></div>
				<div class="cfm-panel">
				<?php
					$Tab2_Q1 = 'SELECT cfm_id,title FROM `cfm` WHERE `type`="CFM101" LIMIT 6';
					$Tab2_Q1R = mysqli_query($con_PRMSUB,$Tab2_Q1) or die(mysqli_error());
					if(mysqli_num_rows($Tab2_Q1R)>0){
						$IndexT2 = 1;
						while($Tab2_Q1D = mysqli_fetch_array($Tab2_Q1R)){
						?>
						<div onclick="show_cfm101(<?php echo $Tab2_Q1D['cfm_id']; ?>,'<?php echo $Tab2_Q1D['title']; ?>')" class="circle-box circle-box-<?php echo $IndexT2; ?>"><?php //echo $Tab2_Q1D['title']; ?></div>
						<?php	
						$IndexT2++; }
						
					}else{}
				?>
				<div id="current-selected" class="current-selected"></div>
				</div>
				<div id="cfm-panel-detail-id" class="cfm-panel-detail" style="background-color:aliceblue;width:69%;min-height: 351px;"> 
					<div class="alert alert-success1" style="text-align:center;margin-top:79px;"><h3>FOR CASH FLOW MANAGEMENT BASICS<br />CLICK THE CIRCLES ON THE LEFT</h3></div>
				</div>
			</div>
		</div>
	</div>
</div>