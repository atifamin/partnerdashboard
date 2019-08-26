<?php 
include "../../../config/config_main.php";
include "../../../config/base_path.php";
$page_id = $_POST['suppserv_id'];


$Q1 = 'SELECT * FROM suppserv WHERE `page_id` ='.$page_id.'';
$Q1R = mysqli_query($con_MAIN,$Q1) or die(mysqli_error()); 
	$suppserv = mysqli_fetch_assoc($Q1R);
?> 
<div class="row">
	<?php
		$Logo = '';
		$PageGroup = $suppserv['page_group'];
		if($PageGroup == 'DAC'){
			$Logo = 'placeholder_120x120.png';	
		}elseif($PageGroup == 'EXAC'){
			$Logo = 'placeholder_120x120.png';	
		}elseif($PageGroup == 'SBDC'){
			$Logo = 'sbdc.png';	
		}elseif($PageGroup == 'SCORE'){
			$Logo = 'score2.png';	
		}elseif($PageGroup == 'VOC'){
			$Logo = 'vboc_logo_icon.png';	
		}elseif($PageGroup == 'WBC'){
			$Logo = 'wbc_icon_logo.png';	
		}else{
			$Logo = 'placeholder_120x120.png';
		}
	?>
	<div class="col-lg-5" style="border-right:1px solid #ccc;padding-left:30px;"><img class="img-responsive" src="<?php echo base_url; ?>assets/img/<?php echo $Logo; ?>" alt="<?php echo $PageGroup; ?>" /></div>
	<div class="col-lg-5" style="color:#999;font-size:18px;text-align:center;margin-top:26px;"><?php echo $suppserv['page_name']; ?></div>
</div>
<div style="clear:both;height:20px;"></div>
<div class="tab5_popup_row1">
	<div class="row" style="background:#95B3D7;color:#376092;">
		<div class="col-lg-6" style="text-align:left;">
			<strong>Name: </strong> <?php echo $suppserv['page_region_name']; ?><br />
			<strong>Address: </strong> <?php echo $suppserv['page_location_address']; ?><br />
			<strong>City: </strong> <?php echo $suppserv['page_location_city']; ?><br />
			<strong>Zip: </strong> <?php echo $suppserv['page_location_zip']; ?><br />
			<strong>Phone: </strong> <?php echo $suppserv['page_phone']; ?><br /> 
		</div>
		<div class="col-lg-6" style="text-align:right;">
			<strong>Contact Name: </strong> <?php echo $suppserv['page_contact_first_name']; ?> <?php echo $suppserv['page_contact_last_name']; ?><br />
			<strong>eMail: </strong> <?php echo $suppserv['page_email']; ?><br />
			<strong>Website: </strong> <a href="<?php echo $suppserv['page_website']; ?>" target="_blank">Visit <?php echo $PageGroup; ?> Branch Website</a><br /> 
		</div>
	</div>
</div>	  
<div class="tab5_popup_row2">
	<div class="row" style="background:#4F81BC;color:white;"> 
		<div class="col-lg-12" style="text-align:left;">
			<h3>Description</h3>
			<p><?php echo $suppserv['page_description']; ?></p> 
		</div> 
	</div>
</div>