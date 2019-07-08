<?php
session_start();
include("base_path.php");
/* Attempt to connect to MySQL database */
$mysqli =  mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");

	$user_id=$_SESSION['user_id'];
	$to = $_POST['to'];
	$title = $_POST['title'];
	$msg = $_POST['editor8'];
    //$replyid = $_POST['reply_id'];
    
     $status = 0;

    $query="INSERT INTO norcom_notifications (notification_sender_user_id, notification_recipient_user_id, 	notification_title, notification_text,notification_read_status)
    VALUES ('".$user_id."', '".$to."', '".$title."','".$msg."','".$status."')";
	$result = mysqli_query($mysqli,$query);
	//$query="update execdb_updates set update_read_status=1 where update_id=".$replyid." ";
    //$result = mysqli_query($mysqli,$query);
    //echo 'You have successfully Created an Update!!';
    
    //header("Location:   http://localhost/exc_dashboard/index.php");

?>
<script type="text/javascript">
//alert("You have successfully Created an Update!!");
window.location = "<?php echo base_url;?>";
</script>