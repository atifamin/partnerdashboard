<?php
session_start();
include("base_path.php");
/* Attempt to connect to MySQL database */
$mysqli =  mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");
//$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	$user_id = $_SESSION['user_id'];
	$to = $_POST['to'];
	$title = $_POST['title'];
	$msg = $_POST['editor4'];
    //$replyid = $_POST['reply_id'];
    $source= $_POST['source'];
    $subject= $_POST['subject'];
	$readmore= $_POST['readmore'];
     $status=1;

    $query="INSERT INTO norcom_messages (message_sender_user_id, message_recipient_user_id, message_title, message_source,message_subject_text,message_text,message_read_more_link,message_read_status)
    VALUES ('".$user_id."', '".$to."', '".$title."','".$source."', '".$subject."','".$msg."','".$readmore."','".$status."')";
	$result = mysqli_query($mysqli,$query);
	//$query="update execdb_updates set update_read_status=1 where update_id=".$replyid." ";
    //$result = mysqli_query($mysqli,$query);
    //echo 'You have successfully Created an Update!!';
    $query="SELECT user_fname,user_lname FROM `user` WHERE user_id= '".$to."'";
    $name = mysqli_query($mysqli,$query);
    $name=mysqli_fetch_assoc($name);
    //echo "<pre>";print_r($name['first_name']);exit;
    //header("Location:   http://localhost/exc_dashboard/index.php");

    //$emailTo =$_POST['emailUpdate'];
    $emailTo = "visionplusofficial@gmail.com";
    $from = "visionplus@info.com";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From:'.$from.'' . "\r\n";
    

    mail($emailTo,$title,$msg,$headers);

?>
<script type="text/javascript">
//alert("You have successfully Created an Update!!");
window.location = "<?php echo base_url;?>";
</script>