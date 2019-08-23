<?php session_start(); ?>
<?php include "../config/config_main.php"; ?>
<?php include "config/config_taskboard.php"; ?>
<?php include "functions/functions.php"; ?>
<?php 
	
	$query='SELECT * From user Where user_type="partner"';
	$row = mysqli_query($con_MAIN,$query);
    $res = mysqli_fetch_all($row);
	echo '<pre>';
	print_r($res);exit;
	 echo $res->user_type;
	 if ($res->user_type=='partner') {
	 	echo "string";
	 }
?>
<?php 
	$query='SELECT * From user Where user_type="Standard"';
	$row = mysqli_query($con_MAIN,$query);
    $res = mysqli_fetch_object($row);
	//echo '<pre>';
	//print_r($res);exit;
	 //echo $res->user_type;
	 if ($res->user_type=='Standard') {
	 	echo "string 123";
	 }
?>
 	<!-- header("Location: http://localhost/partnerdashboard/dashboard.php");
	// 	}
	// else
	// {
	// 	 header("Location: http://localhost/partnerdashboard/stdashboard.php"); -->