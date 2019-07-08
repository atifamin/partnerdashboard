<style>
.nav-tabs-custom.nav nav-tabs {
border: none;
border-right: 1px solid #ddd;
}
.nav-tabs-custom.nav nav-tabs > li {
float: none;
margin-bottom: 0;
margin-right: -1px;
width:80%;
}
.nav-tabs-custom.nav nav-tabs > li > a {
margin-right: 0;
margin-bottom: 2px;
/* border: 1px solid transparent; */
border-radius: 4px 0 0 4px;
color:white;
}
.nav-tabs-custom.nav nav-tabs > li.active > a {
border: 1px solid #ddd;
border-right-color: transparent;
}
.nav-tabs {
	border:none;
	padding:2%;
}
.nav-tabs>li {
	width:100%!important;
	border-color: white;
    border-style: solid;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
	background-color: #337ab7!important;
	color:white!important;
}
.nav-tabs>li>a{
	color:white;
	background:#437bb596;
}

</style>
<div class="col-sm-12">
	<div class="widget-box" style="float: left; width: 100%;">
		<div class="widget-header widgetheading" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
			<h4 class="smaller"><i class="ace-icon fa fa-eye"></i> GET HELP</h4>
		</div>
		<div class="widget-body">
		<?php
			$Tab2_Q2 = 'SELECT `bidwin_id`,`title`,`content_code` FROM `bidwin` WHERE `type`="Get Help" GROUP BY `content_code`';
			$Tab2_Q2R = mysqli_query($con_PRMSUB,$Tab2_Q2) or die(mysqli_error());
			if(mysqli_num_rows($Tab2_Q2R)>0){
		?>
			<div class="widget-main no-padding">
				<div class="col-sm-12" style="padding:0px;">
	<!-- <div class="nav-tabs-custom"> -->
	<div class="row" style="background: white;margin-left: 1px;margin-right: 1px;">
		  <div class="col-lg-4" style="border-style: solid;padding: 2px;border-color: #d8dbdf;border-width:4px;">
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
		</div>
		<div class="col-lg-8">
		<div class="tab-content" style="min-height:197px;padding:0%;">
			<?php
				$Tab2_Q3 = 'SELECT * FROM `bidwin` WHERE `type`="Get Help" GROUP BY `content_code`';
				$Tab2_Q3R = mysqli_query($con_PRMSUB,$Tab2_Q3) or die(mysqli_error());
				$Tab2_Index2 = 1;
				while($Tab2_Q3D = mysqli_fetch_assoc($Tab2_Q3R)){
			?>
			<div id="<?php echo replace_string($Tab2_Q3D['content_code'],'_',' '); ?>" class="tab-pane <?php if($Tab2_Index2 == 1){echo 'in active';} ?>">
				<h3 style="color:white;margin-top:0px;background:#1f497d;padding:1%;"><?php echo $Tab2_Q3D['title']; ?></h3>
				<p style="background:aliceblue;padding:2%;margin-top:-1%;height:168px;"><?php echo substr($Tab2_Q3D['text'],0,500); ?> <br>
				<a <?php if($Tab2_Q3D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q3D['ref_url']; ?>" style="color:#1f497d;font-size:19px;font-weight:700;" class="pull-right moreinfoa">GET MORE INFO</a>
				</p>
			</div>
			<?php $Tab2_Index2++; } ?> 
		</div>
		</div>
		</div>
	<!-- </div> -->
</div>   
			</div>
			<?php } ?>
		</div>
	</div>
</div>