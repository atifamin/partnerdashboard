<?php
session_start();
include("../config/base_path.php");
/* Attempt to connect to MySQL database */
$mysqli =  mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");

	$user_id=$_SESSION['user_id'];
	$recipient_id = $_POST['notify_reply_id'];
	$notify_title = $_POST['notify_title'];
	$notify_msg = $_POST['notify_msg'];
	$read_notify_id = $_POST['notify_id'];
	

    $query="INSERT INTO norcom_notifications_replies ( notification_id, notification_sender_user_id, notification_recipient_user_id, notification_reply_title,notification_reply_text)
    VALUES ('".$read_notify_id."','".$user_id."', '".$recipient_id."','".$notify_title."', '".$notify_msg."')";
	$result = mysqli_query($mysqli,$query);
	$query="update norcom_notifications set notification_read_status=1 where notification_id=".$read_notify_id." ";
    $result = mysqli_query($mysqli,$query);
    echo 'Your Notification Reply send successfully!!';

?>