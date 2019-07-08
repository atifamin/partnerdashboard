<?php session_start(); ?>
<?php include "config/config_awt.php"; ?>
<?php include "config/config_main.php"; ?>
<?php include "config/config_prmsub.php"; ?>
<?php include "config/config_scpr.php"; ?>
<?php include "config/config_taskboard.php"; ?>
<?php include "functions/functions.php"; ?>

<?php
  $UserCertficationID = $_SESSION['certification_id'];
  $Q_Sub = 'SELECT  `Legal Business Name` AS BusinessName from sbdvbe  WHERE `Certification ID`= '.$UserCertficationID.'';
  $Q_SubR = mysqli_query($con_MAIN,$Q_Sub);
  $Name = mysqli_fetch_assoc($Q_SubR);
  $BusinessName = $Name['BusinessName'];  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>AWT-CEP Contractor Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Google Font -->
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">



  <style type="text/css">
    .white{color: white; margin-left: 1px;}

    @media only screen and (max-width: 640px) and (min-width: 300px)  {
      .margin-top-sidebar {margin-top:5px !important}
      .content-header{ margin-top: 90px !important; }
      .content{margin-top: 16px !important;} 
      .breadcrumb{top: 9px !important;} 
      .sidebar-toggle{background-color: #367fa9 !important;}
     .small{margin-right: 9px;}
     .padding-top       {padding-top: 1px;}
     .layout_res{margin-top:395px;}
     .dealflow{margin:auto !important;}
     .dealflow1{margin:auto !important;}

 
      }
    }
    @media only screen and (max-width: 720px) and (min-width: 641px)  {
      .imgclass {width: 10% !important}
    }
  </style>
</head>
