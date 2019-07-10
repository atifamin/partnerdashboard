<?php session_start(); ?>
<?php $fileName =  basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']); ?>
<?php 
      if($fileName == "dashboard.php"){
      include "config/config_awt.php"; 
      include "config/config_main.php"; 
      include "config/config_prmsub.php"; 
      include "config/config_scpr.php";
	    include "base_path.php";
    }else{
      include "../config/config_awt.php"; 
      include "../config/config_main.php"; 
      include "../config/config_prmsub.php"; 
      include "../config/config_scpr.php";
	     include "../base_path.php";
      } 
    //check user role
  if(strtolower($_SESSION['user_type']) != 'standard'){
      header('Location: ../partner/dashboard.php');
  }
	$UserCertficationID = $_SESSION['certification_id'];
	$Q_Sub = 'SELECT  `Legal Business Name` AS BusinessName from sbdvbe  WHERE `Certification ID`= '.$UserCertficationID.'';
	$Q_SubR = mysqli_query($con_MAIN,$Q_Sub);
	$Name = mysqli_fetch_assoc($Q_SubR);
	$BusinessName = $Name['BusinessName'];	
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AWT-CEP Contractor Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url; ?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="<?php echo base_url; ?>bower_components/select2/dist/css/select2.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  
  <script src="<?php echo base_url; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url; ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
</head>
<style>
.small-box .icon {
 font-size:50px!important;
 right: 5px!important;
 top: -3px!important;
}
#small-box-tc{
  background-color:#5097AB;
  color:white;
}
#small-box-sc{
  background-color:#604A7B;
  color:white;
}
.sidebar-menu-header{
  text-align: center;
  color: #b8c7ce;
  border-bottom: 1px solid #d8dbdf;
  padding:2% 0;
}
.sidebar-menu-desc{
  padding: 12px 5px 12px 15px;
}
.sidebar-li > a{
  padding:0px !important;
  border:unset !important;
}
.sidebar-li:hover{
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
}
li.sidebar-li.active{
  border-color: #ffffff;
  -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
  filter: grayscale(100%);
  border-color:#144a5a !important;
}
@media only screen and (max-width: 595px) {
  .content-wrapper{
    margin-top: 25%;
  }
  .main-sidebar{
    padding-top:195px;
  }
}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
