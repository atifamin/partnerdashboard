<?php
include("../includes/header.php");
include("../includes/top_nav.php");
include("../includes/side_bar.php");
include("../functions/functions.php");
?>
<link rel="stylesheet" href="../assets/css/bizVault.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<style type="text/css">

.bizvult-sidebar{

	background-color: #2a91f5;
	color: white;
	min-height: 100vh;
}

.side_bar-icons{

	display:inline-block;
    font-size: 30px;
    margin-left: -4px;
    margin-top: 10px;

}



</style>
<div class="row main-area">
  <div class="col-md-12 logo-area"> <img src="../assets/img/dummy-logo.jpg" alt="" width="150"> </div>
  <div class="col-md-1">
  	 <div class="row">
  	   <div class="col-md-6 bizvult-sidebar">
  	       <i class="fas fa-file-alt side_bar-icons"></i>
  	       <i class="fas fa-retweet side_bar-icons"></i>
  	       <i class="fas fa-clock side_bar-icons"></i>  	   
  	       <i class="fa fa-file-text-o side_bar-icons"></i>
  	       <i class="fa fa-file-text-o side_bar-icons"></i>
  	       <i class="fas fa-cog side_bar-icons"></i>
  	   </div>
  	   <div class="col-md-6"></div>
  	 </div>
  </div>
  <div class="col-md-11">MainSection
    <div class="col-md-12">top upload bar</div>
    <div class="col-md-12">Search bar</div>
    <div class="col-md-9">Main Area</div>
    <div class="col-md-3">Preview Area</div>
    <div class="col-md-12">Footer Area</div>
  </div>
</div>
<?php
include("../includes/footer.php");
?>
