<?php
session_start();
if(isset($_SESSION)){
if($_SESSION['user_id'] != ''){
	header('Location: dashboard.php');
}else{
	header('Location: onboard_login.php');
}
}
?>