<?php
session_start();
if(isset($_SESSION)){
	if($_SESSION['user_id'] != ''){
		if(strtolower($_SESSION['user_type']) == 'partner'){
			header('Location: partner/dashboard.php');
		}
		else{
			header('Location: standard/tabs/contract_details.php');
		}
	}else{
		header('Location: onboard_login.php');
	}
}
?>