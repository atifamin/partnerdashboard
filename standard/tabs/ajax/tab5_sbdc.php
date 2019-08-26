<?php 
include "../../../config/config_main.php";
include "../../../base_path.php";
$UserZipCode = $_POST['user_zip_code'];
	$URL = 'http://maps.googleapis.com/maps/api/geocode/json?address='.$UserZipCode.'&sensor=true';
		$result     = file_get_contents($URL);
		$County   	= json_decode($result,true); 
		
		$UserState = $County['results'][0]['address_components'][2]['long_name']; 
		$Su = explode(' ',$UserState);
		$UserCounty = $Su[0];
?>
<div class="row" style="max-height: 250px;overflow-y: scroll;">
<?php
$Q1 = 'SELECT `page_id`, `page_name`, `page_location_zip` FROM suppserv WHERE `page_group` = "SBDC" AND `page_region_served` LIKE "%'.$UserCounty.'%"';
$Q1R = mysqli_query($con_MAIN,$Q1) or die(mysqli_error());
if(mysqli_num_rows($Q1R)>0){
	while($dis = mysqli_fetch_assoc($Q1R)){ 
?> 
			<div class="col-lg-4">
			<a href="#modal_tab5_data" role="button" data-toggle="modal" onclick="load_tab5_data(<?php echo $dis['page_id']; ?>)" style="text-decoration:none;" type="button">
				<div class="sbdc_branch" style="background: #C4BD97;min-height: 120px;cursor: pointer;width:70%;">
					<div class="sbdcimg" style="float:left;"><img src="<?php echo base_url; ?>assets/img/sbdc_small.png" alt="" width="" /></div>
					<div class="sbdcbranch" style="color: #fff;font-size: 13px;text-align: center;margin: 4px 0px;line-height: 22px;padding: 10px;"><?php $Name = explode('SBDC',$dis['page_name']); echo $Name[0].' SBDC'; ?></div>
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