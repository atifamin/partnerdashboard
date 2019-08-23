<?php 
include "../../config/config_prmsub.php";
include "../../base_path.php";
$UserZipCode = $_POST['user_zip_code'];
	$URL = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$UserZipCode.'&sensor=true';
		$result     = file_get_contents($URL);
		$County   	= json_decode($result,true); 
		$UserState = $County['results'][0]['address_components'][3]['long_name'];

$Q1 = 'SELECT `page_id`, `page_name`, `page_group`, `page_location_zip` FROM suppserv WHERE `page_group` <> "SCORE" AND `page_group` <> "SBDC" AND `page_group` <> "VOC" AND `page_region_served` LIKE "%'.$UserState.'%"';
$Q1R = mysqli_query($con_MAIN,$Q1) or die(mysqli_error());
if(mysqli_num_rows($Q1R)>0){
	?> 
<div class="row" style="max-height: 250px;overflow-y: scroll;">
<?php 
	while($dis = mysqli_fetch_assoc($Q1R)){ 
	$Logo = '';
	$PageGroup = $dis['page_group'];
	if($PageGroup == 'VOC'){
		$Logo = 'vboc_logo_icon.png';	
	}elseif($PageGroup == 'WBC'){
		$Logo = 'wbc_icon_logo.png';	
	}elseif($PageGroup == 'DAC'){
		$Logo = 'others_type.png';	
	}elseif($PageGroup == 'EXAC'){
		$Logo = 'others_type.png';	
	}else{
		$Logo = 'others_type.png';
	}
?>  
			<div class="col-lg-4">
				<a href="#modal_tab5_data" role="button" data-toggle="modal" onclick="load_tab5_data(<?php echo $dis['page_id']; ?>)" type="button">
				<div class="vboc_branch" style="background: #4F81BD;min-height: 120px;cursor: pointer;width:100%;">
					<div class="vbocimg" style="float:left;"><img src="<?php echo base_url; ?>assets/img/<?php echo $Logo; ?>" alt="" width="" /></div>
					<div class="vbocbranch" style="color: #fff;font-size: 13px;text-align: center;margin: 4px 0px;line-height: 22px;padding: 10px;"><?php echo $dis['page_name']; ?></div>
				</div>
				</a>
			</div>
<?php		 
	}
	?>
	</div>
	<?php
}else{
	echo '<h5 style="color:#fff;text-align:center;">No Record Found!</h5>';
} 
?>	  
 