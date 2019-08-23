<link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url; ?>dist/css/skins/_all-skins.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
	width:80%!important;
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
				$Tab2_Q2 = 'SELECT `cfm_id`,`title`,`content_code` FROM `cfm` WHERE `type`="Get Help" GROUP BY `content_code`';
				$Tab2_Q2R = mysqli_query($con_MAIN,$Tab2_Q2) or die(mysqli_error());
				if(mysqli_num_rows($Tab2_Q2R)>0){
			?>
				<div class="widget-main no-padding">
					<div class="col-sm-12" style="padding:0px;">
		<div class="nav-tabs-custom">
		 <div class="row">
		  <div class="col-lg-4">
			<ul class="nav nav-tabs" id="myTab3">
			<?php $Tab2_Index1 = 1;
				while($Tab2_Q2D = mysqli_fetch_assoc($Tab2_Q2R)){
			?>
				<li class="tabpane_<?php echo $Tab2_Index1; ?> <?php if($Tab2_Index1 == 1){echo 'active';} ?>">
					<a data-toggle="tab" href="#<?php echo replace_string($Tab2_Q2D['content_code'],'_',' '); ?>">
						<?php echo $Tab2_Q2D['title']; ?>
					</a>
				</li>
			<?php $Tab2_Index1++; } ?>	 
			</ul>
			</div>
			<div class="col-lg-8">
			<div class="tab-content" style="padding: 70px;margin-top: -7%;margin-left: -21%;">
				<?php
					$Tab2_Q3 = 'SELECT * FROM `cfm` WHERE `type`="Get Help" GROUP BY `content_code`';
					$Tab2_Q3R = mysqli_query($con_MAIN,$Tab2_Q3) or die(mysqli_error());
					$Tab2_Index2 = 1;
					while($Tab2_Q3D = mysqli_fetch_assoc($Tab2_Q3R)){
				?>
				<div id="<?php echo replace_string($Tab2_Q3D['content_code'],'_',' '); ?>" class="tab-pane <?php if($Tab2_Index2 == 1){echo 'in active';} ?>">
					<h3 style="color:white;margin-top:0px;background:#376092;padding:1%;"><?php echo $Tab2_Q3D['title']; ?></h3>
					<div style="background:aliceblue;height: 100px;padding: 2%;margin-top: -1%;">
					<p><?php echo substr($Tab2_Q3D['text'],0,500); ?></p>
					<a style="color:#337ab7;" <?php if($Tab2_Q3D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q3D['ref_url']; ?>" class="pull-right moreinfoa">GET MORE INFO</a>
					</div>
				</div>
				<?php $Tab2_Index2++; } ?> 
			</div>
			</div>
			</div>
		</div>
	</div>   
				</div>
				<?php } ?>
			</div>
		</div>
	</div>