<?php
session_start();
include("base_path.php");
/* Attempt to connect to MySQL database */
$mysqli =  mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");

	$user_id=$_SESSION['user_id'];
	$title = $_POST['projectup_title'];
	$msg = $_POST['projectup_msg'];
	$project_id = $_POST['project_id'];
	


    $query="INSERT INTO execdb_project_update_comment ( project_id ,project_update_comment_owner_user_id, project_update_comment_title, project_update_comment_text )
    VALUES ('".$project_id."', '".$user_id."', '".$title."', '".$msg."')";
	$result = mysqli_query($mysqli,$query);
	$query="update execdb_project_updates set project_update_read_status=1 where project_update_id=".$project_id." ";
    $result = mysqli_query($mysqli,$query);
    echo 'Your Reply send successfully!!';

?>