<?php session_start(); ?>
<?php include "config/config_awt.php"; ?>
<?php include "config/config_main.php"; ?>
<?php include "config/config_prmsub.php"; ?>
<?php include "config/config_scpr.php"; ?>
<?php include "config/config_taskboard.php"; ?>
<?php include "functions/functions.php"; ?>

<?php
    $UserID           = $_SESSION['user_id'];
    $VendorID         = $_SESSION['vendor_id'];
    $CertificationID  = $_SESSION['certification_id'];
    $FirmID           = $_SESSION['dbe_firm_id'];
    $PartnerID        = $_SESSION['partner_id'];
  ?>

<?php
  //check user role
  if(strtolower($_SESSION['user_type']) != 'partner'){
      header('Location: ../standard/dashboard.php');
  }


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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/css/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/plugins/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/plugins/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
    <link href="assets/css/partner_style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/partner_style_media.css" rel="stylesheet" type="text/css" /> 
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
    .white1{color: #C0C1C3; margin-left: 1px;}

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
     .text_res{margin-left: 105px !important;margin-top: -36px !important;}
     .text_res2{margin-left: 105px !important;margin-top: -47px !important;}
     .text_res3{margin-left: 105px !important;margin-top: -47px !important;}
     .text_res4{margin-left: 105px !important;margin-top: -61px !important;}
     .text_res5{margin-left: 105px !important;margin-top: -48px !important;}
     .img_res{width: 65px !important;}
     .img_res2{width: 65px !important;}
     .img_res3{width: 65px !important;}
     .img_res4{width: 65px !important;}
     .img_res5{width: 65px !important;}
     .content-header{height: 146px !important;}
     .State_Spend{height: auto !important;}
     .top_sectors{height: auto !important;}
     .product_statistics{height: auto !important;}
 
      }
    }
    @media only screen and (max-width: 720px) and (min-width: 641px)  {
      .imgclass {width: 10% !important}
    }
    .text1{background-color: #1F487C;width: 98%;margin-left: 1%;margin-bottom: 10px}

  </style>
</head>
