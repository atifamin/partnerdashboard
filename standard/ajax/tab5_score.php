<?php 
include "../config/config_prmsub.php";
$UserZipCode = $_POST['user_zip_code'];

$Q1 = 'SELECT `page_id`, `page_name`, `page_location_zip` FROM suppserv WHERE `page_group` = "SCORE"';
$Q1R = mysqli_query($con_MAIN,$Q1) or die(mysqli_error());
if(mysqli_num_rows($Q1R)>0){
	while($dis = mysqli_fetch_assoc($Q1R)){
		$ScoreZipCode = $dis['page_location_zip'];
		
		$url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=$UserZipCode&destinations=$ScoreZipCode&language=en-EN&sensor=false"; 
		$data = @file_get_contents($url); 
		$result = json_decode($data, true);
		$Km = $result['rows'][0]['elements'][0]['distance']['text'];
		$Km1 = explode(' ',$Km);
		$Mile = number_format($Km1[0]*0.621371,0);
		
		if($Mile <= 60.000){
?>
			<div class="col-lg-1 col-xs-1 col-sm-1 col-md-1">&nbsp;</div>
			<div class="col-lg-2 col-xs-5 col-sm-5 col-md-2">
				<a href="#modal_tab5_data" role="button" data-toggle="modal" onclick="load_tab5_data(<?php echo $dis['page_id']; ?>)" type="button">
				<div class="branchscore">
					<div class="scoreimg"><img src="assets/img/score_small2.png" alt="Score" /></div>
					<div class="branchname"><?php echo $dis['page_name']; ?></div>
				</div>
				</a>
			</div>
<?php			
		}
	}
}else{
	echo '<h5 style="color:#fff;text-align:center;">No Record Found!</h5>';
}
?>	 