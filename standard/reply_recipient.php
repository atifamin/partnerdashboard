<?php
session_start();
include("../config/config_main.php");
/* Attempt to connect to MySQL database */
$con=mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");
// Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$user_id=$_SESSION['user_id'];
	$id = $_POST['id'];
	$title = $_POST['title'];
	$msg = $_POST['msg'];
	$replyid = $_POST['reply_id'];
	


    $query="INSERT INTO norcom_messages_reply (message_sender_user_id, message_recipient_user_id, message_id, message_reply_title,message_reply_text)
    VALUES ('".$user_id."', '".$id."', '".$replyid."','".$title."', '".$msg."')";
	$result = mysqli_query($con,$query);
	$query="update norcom_messages set message_read_status = 0 where message_id =".$replyid." ";
    $result = mysqli_query($con,$query);
    echo 'Your Reply send successfully!!';

?>