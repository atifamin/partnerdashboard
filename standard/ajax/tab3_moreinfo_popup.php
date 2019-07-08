<?php 
include "../config/config_main.php";
$partnerid = $_POST['partnerid'];

$Q1 = 'SELECT `partner_description` FROM `partner` WHERE `partner_id`='.$partnerid.'';
$Q1R = mysqli_query($con_MAIN,$Q1) or die(mysqli_error());
if(mysqli_num_rows($Q1R)>0){
	while($dis = mysqli_fetch_assoc($Q1R)){ 	 
?>  
<p><?php echo $dis['partner_description']; ?></p>
<?php		 
	}
}else{
	echo '<h5 style="color:#fff;text-align:center;">No Record Found!</h5>';
} 
?>	  
 