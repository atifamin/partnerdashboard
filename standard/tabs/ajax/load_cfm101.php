<?php
include "../../config/config_prmsub.php";
$CFMID = $_POST['cfmid'];
$Query = 'SELECT * FROM `cfm` WHERE `cfm_id`='.$CFMID.'';
$QueryR = mysqli_query($con_MAIN,$Query);
if(mysqli_num_rows($QueryR)>0){
	$CFM_Data = mysqli_fetch_assoc($QueryR); 
?>
<p><?php echo $CFM_Data['description']; ?></p> 
<h2 style="text-transform:uppercase;color:#FFCC00;"><?php echo $CFM_Data['title']; ?></h2>
<p><?php echo substr($CFM_Data['text'],0,1100); ?></p> 
<a <?php if($CFM_Data['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $CFM_Data['ref_url']; ?>" class="pull-right moreinfoa">READ MORE</a>
<?php
}else{
	echo '<span class="red">Data not found</span>';
}


?>