<?php
session_start();
include("../../config/base_path.php");
include("../../config/config_main.php");
$id = $_GET['h'];

$query = "SELECT * FROM bizvault_user_uploaded_required_file where bizvault_user_uploaded_required_file_id = ".$id."";
$query_run = mysqli_query($con_MAIN,$query);
$query_row = (object)mysqli_fetch_assoc($query_run);
$filename = $query_row->bizvault_user_uploaded_required_file_filename;
$url = $query_row->bizvault_user_uploaded_required_file_full_pathname;

$fileNameArray = explode(".", $filename);
$fileExtension			= strtolower(end($fileNameArray));
$officeExtensionArray	= array("doc","DOC","docx","DOCX","xls","XLS","xlsx","XLSX","ppt","PPT","pptx","PPTX");
$pdfExtensionArray		= array("pdf","PDF");
$imagesExtensionArray	= array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
$audioExtensionArray	= array("mp3","MP3");
$videoExtensionArray	= array("mp4","MP4","webm","WEBM");
$otherExtensions		= array("txt","TXT","log","LOG");

$html = '';

if(in_array($fileExtension, $officeExtensionArray))
    $html = '<iframe src="https://view.officeapps.live.com/op/embed.aspx?src='.$url.'" frameborder="0" style="width:100%;min-height:650px;"></iframe>';
if(in_array($fileExtension, $pdfExtensionArray) || in_array($fileExtension, $otherExtensions))
    $html = '<iframe src="'.$url.'" frameborder="0" style="width:100%;min-height:650px;"></iframe>';
if(in_array($fileExtension, $imagesExtensionArray))
    $html = '<img src="'.$url.'" alt="" style="width:100%;">';
if(in_array($fileExtension, $audioExtensionArray))
    $html = '<audio controls><source src="'.$url.'" type="audio/mpeg">Your browser does not support the audio tag.</audio>';
if(in_array($fileExtension, $videoExtensionArray))
    $html = '<video width="320" height="240" controls style="width:100%;height:100%"><source src="'.$url.'" type="video/mp4">Your browser does not support the video tag.</video>';



$UserCertficationID = $_SESSION['certification_id'];
$Q_Sub = 'SELECT  `Legal Business Name` AS BusinessName from sbdvbe  WHERE `Certification ID`= '.$UserCertficationID.'';
$Q_SubR = mysqli_query($con_MAIN,$Q_Sub);
$Name = mysqli_fetch_assoc($Q_SubR);
$BusinessName = $Name['BusinessName'];

$BNArray = explode(" ", $BusinessName);
if(!empty($BNArray)){
    $BNShortForm = '';
    foreach($BNArray as $BNKEY=>$BNVAL):
        $BNShortForm .= substr($BNVAL,0,1);
    endforeach;
}

//echo "<pre>"; print_r($BNShortForm); exit;
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AWT-CEP Contractor Dashboard - File Viewer</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="<?php echo base_url; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url; ?>bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url; ?>bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url; ?>assets/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="<?php echo base_url; ?>assets/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper" style="margin:0;">
    <section class="content">
      <div class="row">
        <div class="col-md-offset-2 col-md-8">
          <div class="box box-widget widget-user">
            <div class="widget-user-header bg-aqua-active" align="center">
              <h3 class="widget-user-username" style="font-weight:900;"><?php echo ucwords(strtolower($BusinessName)); ?></h3>
              <h5 class="widget-user-desc" style="float:right;"><a href="<?php echo $url; ?>" class="btn btn-xs btn-success" download>Download File</a></h5>
            </div>
            <div class="widget-user-image">
            <div class="img-circle" style="width: 100px;height: 100px;background-color: #084554;text-align: center;vertical-align: middle;line-height: 6.5;border: 5px solid white;color: white;font-weight: 900;"><?php echo $BNShortForm; ?></div>
              <!-- <img class="img-circle" src="../dist/img/user1-128x128.jpg" alt="User Avatar"> -->
            </div>
            <div class="box-footer" style="min-height:650px;padding:5% 0 0 0;background-color: #ecf0f5;">
            <?php echo $html; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script src="<?php echo base_url; ?>bower_components/jquery/dist/jquery.min.js"></script> 
<script src="<?php echo base_url; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> 
<script src="<?php echo base_url; ?>bower_components/fastclick/lib/fastclick.js"></script> 
<script src="<?php echo base_url; ?>assets/dist/js/adminlte.min.js"></script> 
<script src="<?php echo base_url; ?>assets/dist/js/demo.js"></script>
</body>
</html>