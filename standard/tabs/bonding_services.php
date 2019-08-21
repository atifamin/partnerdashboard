<?php //print_r($_POST); ?>

<?php
$_FILE_NAME = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']); ?>
<?php if($_FILE_NAME == "contract_details.php"){ 
	$FirmID = $_SESSION['dbe_firm_id'];
	

	$VIDEO_QUERY = "select * from funding_video";
	$VIDEO_R = mysqli_query($con_AWT,$VIDEO_QUERY) or die(mysqli_error()); 
	$VIDEO_D =  mysqli_fetch_assoc($VIDEO_R);

	//echo "<pre>";print_r($Tab1_Q1D);


	?>

<style type="text/css">
	
</style>

<div class="row">
  <div class="col-lg-8 col-xs-12">
    <div class="box"> 
      <!-- <div class="box-header">
		 <h3 class="box-title">Responsive Hover Table</h3>

		 <div class="box-tools">
		   <div class="input-group input-group-sm" style="width: 150px;">
			 <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

			 <div class="input-group-btn">
			   <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			 </div>
		   </div>
		 </div>
	   </div> --> 
      <!-- /.box-header -->
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover modal-financing-table contract_details_table" id="">

        </table>
      </div>
      <!-- /.box-body --> 
    </div>
    <!-- /.box --> 
    
  </div>
  <div class="col-lg-4 col-xs-12" align="center">
    <div class="div-cont-amount"> <span class="container">$757,000</span> </div>
    <!-- <video width="auto" controls style="width:100%">
			<source src="<?php //echo base_url.$VIDEO_D['video_url_path']; ?>" type="video/mp4">
			Your browser does not support HTML5 video.
		</video> --> 
  </div>
</div>
<?php } 
if($_FILE_NAME != "contract_details.php"){
include("../includes/header.php");
include("../includes/top_nav.php");
include("../includes/side_bar.php");
include ("../functions/functions.php"); 
}
$NoResult = '<div class="alert alert-danger tab3_boxes" style="float:left;width:100%;margin-top:25px;"><div class="col-lg-4"><h3 style="margin-top:68px;color:#fff;">No Result Found!</h3></div></div>';
$UserOfferCodes = $_SESSION['user_offer_codes'];
$UserOfferScore = $_SESSION['user_offer_score']; 
$UserCertificationID = $_SESSION['certification_id'];
$UserID = $_SESSION['user_id'];
if($UserOfferCodes!='' && $UserOfferScore!=0){
$Score = explode(',',$UserOfferCodes);
$OfferCodes='';
$Index3_offer = 1;
foreach($Score as $key=>$val){
	$val = str_replace(' ','',$val);
	if($Index3_offer>1){
		$OfferCodes .=' OR po.offer_code LIKE "%'.$val.'%"';
	}else{
		$OfferCodes .=' po.offer_code LIKE "%'.$val.'%"';
	}
$Index3_offer++;	
} 	
$Tab3_Q1 = 'SELECT *
FROM partner_offer po
LEFT JOIN user_offer_status uos ON po.partner_offer_id = uos.partner_offer_id
WHERE ('.$OfferCodes.') 
AND po.offer_score <= '.$UserOfferScore.' 
AND uos.offer_status_user_id = '.$UserID.'
AND uos.user_minimum_score <= '.$UserOfferScore.'
';	 	

$Tab3_Q1R = mysqli_query($con_PRMSUB,$Tab3_Q1) or die(mysqli_error());
if(mysqli_num_rows($Tab3_Q1R)>0){
	while($OfferData = mysqli_fetch_assoc($Tab3_Q1R)){
		
$PartnerOfferID = $OfferData['partner_offer_id'];
//echo "<pre>";print_r($_POST);exit;

$InsQ = "INSERT INTO `partner_offer_views`(`partner_offer_user_id`,`partner_offer_id`) VALUES('".$UserID."','".$PartnerOfferID."')";
mysqli_query($con_PRMSUB,$InsQ) or die(mysqli_error());

// Partner Data
$Tab3_Q4 = 'SELECT * FROM `partner` WHERE `partner_id`='.$OfferData['partner_id'].'';
$Tab3_Q4R = mysqli_query($con_MAIN,$Tab3_Q4) or die(mysqli_error());	
if(mysqli_num_rows($Tab3_Q4R)>0){
	$PartnerName1 = mysqli_fetch_array($Tab3_Q4R); 
	$Logo = $PartnerName1['partner_logo_url'];
	if($Logo == ''){$Logo = 'assets/img/companylogo.png';}
	}else{ 	$Logo = 'assets/img/companylogo.png';}	
	
	$PartnerName = $PartnerName1['partner_name']; 
//UserCompany Name
$Tab3_Q5 = 'SELECT * FROM `sbdvbe` WHERE `Certification ID`='.$UserCertificationID.'';
$Tab3_Q5R = mysqli_query($con_MAIN,$Tab3_Q5) or die(mysqli_error());
if(mysqli_num_rows($Tab3_Q5R)>0){
	$UserC = mysqli_fetch_array($Tab3_Q5R);
	$UserCompany = $UserC['Legal Business Name'];
}else{
	$UserCompany='';
}

// For View Log
$S1 = 'SELECT `finserv_id` FROM `finserv` WHERE `partner_id`='.$OfferData['partner_id'].' AND `offer_id`='.$PartnerOfferID.''; 
$S1R = mysqli_query($con_PRMSUB,$S1) or die(mysqli_error());

$Tab2_Q5 = 'SELECT `cfm_id`,`content_code` FROM `cfm` WHERE `type`="Best Practices" LIMIT 1';
$Tab2_Q5R = mysqli_query($con_PRMSUB,$Tab2_Q5) or die(mysqli_error());
$Tab2_Index5 = 1;
$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);

if(mysqli_num_rows($S1R)>0){
	$FinSer = mysqli_fetch_assoc($S1R);
	$FinServID = $FinSer['finserv_id'];
$CFMid	 = $Tab2_Q5D['cfm_id'];
$UserID		 = $_SESSION['user_id'];
$Insert = "INSERT INTO `finserv_views`(`finserv_user_id`,`finserv_id`,`finserv_view_date`) VALUES ('".$UserID."','".$FinServID."','".date('Y-m-d H:i:s')."')";
$Tab2_Q5R = mysqli_query($con_PRMSUB,$Insert) or die(mysqli_error());
} 	

	//$OfferID = $_POST['offerid'];
	
	$Query = 'SELECT * FROM `offer_box` WHERE `offer_box_id`='.$OfferData['offer_box_id'].'';
	$QueryR = mysqli_query($con_PRMSUB,$Query);
	$row = mysqli_fetch_object($QueryR);
	//echo "<pre>";print_r($row);exit;
?>



<div class="row cus-border mt-10">
  <div class="col-md-4 text-center">
    <div class="mt-30"><span class="font-30 color-1">SURETY BONDING
      <!-- $<?php // echo number_format($row->offer_amount_min); ?> - $<?php // echo number_format($row->offer_amount_max); ?> --></span> </div>
	<a href="javascript:;" onclick="showofferboxpopupSurety(2,'Premium Surety Partner')" class="btn mb-10 mt-10" style="background-color: #642524;"><span class="text-white">REQUEST BONDING</span></a>
    <div class="vl-bonding-services"></div>
  </div>
  <div class="col-md-5 text-center" style="padding: 1px;">
  	<div class="color-2">
  		<strong class="font-25">SURETY BONDING SERVICES</strong><br>
  		<strong style="font-style: italic;">
  			Offering a wide range of services including: <br>
	  		Big Bonds <br>
	  		Performance Bonds <br>
	  		Payement Bonds <br>
	  		Maintenance Bonds
  		</strong>
  	</div><br>
    <div class="vl-bonding-services"></div>
  </div>
  <div class="col-md-3 text-center">
    <div class="mt-10 mb-10">
      <a href="javascript:;" type="button" onclick="showofferboxpopupSurety(2,'Premium Surety Partner')" class="btn custom-btn-1 mt-10"><span class="text-white font-25">CLICK HERE<br>TO GET<br>STARTED</span></a>
    </div>
  </div>
</div>
<div class="row mt-10 cus-border">
  <div class="col-md-4 text-center mt-10 mb-10">
    <div class="col-md-12 mb-10 text-white">
      <div class="bg-1"><span class="font-20">YOUR bizVAULT Status</span></div>
    </div>
    <div class="col-md-4"><img src="../assets/img/a13.png" width="80"></div>
    <div class="col-md-8">
      <div class="text-white bg-2 mt-10"><span>Your bizVAULT Contains All <br>
        Needed Documents and <br>
        Files</span></div>
    </div>
    <div class="vl-1"></div>
  </div>
  <!-- <div class="col-md-1">
			<div class="vl"></div>
		</div> -->
  <div class="col-md-5 text-center">
    <div class="mt-20"> 
    	<strong class="font-13 color-3" style="color: #283644;">SURETY SERVICES PROVIDED BY NETWORKS<br>OF SURETY BROKERS AND AGENTS<br></strong>
    	<strong class="font-17" style="color: #bd6e56;">SURETY BONDING FOR CALIFORNIA<br>CERTIFIED BUSINESS</strong>
    </div>
    <div class="vl"></div>
  </div>
  <div class="col-md-3 text-center">
  	<button type="button" class="btn btn-block btn-lg bg-button mt-10" onclick="open_video_modal()">
  		<span class="text-white font-13">California Certified Business FastFund</span>
  		<br>
  		<i class="fab fa-youtube mt-5 font-48"></i>
  		<br>
  		<span class="text-white font-13">Contact and Invoice Financing</span>
  	</button>
  	<!-- <div class="mt-10 bg-button"> <span class="text-white">California Certified Business FastFund</span>
  		<i class="fa fa-fw fa-youtube-play"></i>
	</div> -->
      <!-- <a href="" role="button" data-toggle="modal"><video class="mt-10 w-90" poster="../assets/img/video_thumbnail.PNG" width="auto" onclick="open_video_modal()">
      <source src="<?php echo base_url.$VIDEO_D['video_url_path']; ?>" type="video/mp4">
      Your browser does not support HTML5 video. </video></a> -->
  </div>
<?php
	}// While close
}else{
// Find Special Case
include "tab3/specialcase.php";	
}
}else{echo $NoResult;}
?>
<?php 
if($_FILE_NAME != "contract_details.php"){
include("../includes/footer.php");
}
 ?>

<script type="text/javascript">
	function getFinancing(id){
		var base_url = "<?php echo base_url; ?>";
		$.ajax({
	      type: "POST",
	      url: ""+base_url+"tabs/tab1/contract_detail.php",
	      data: {id:id},
	      success:function(data){

	        $('.contract_details_table').html(data);
	      }
	    });
	}

	function open_cycle_modal() {
		$('#modal-img-cycle').modal('show');
		$('#modal-default').scrollTop(0);
	}

	function open_works_modal() {
		$('#modal-img-works').modal('show');
		$('#modal-default').scrollTop(0);
	}

	function open_video_modal() {
		$('#modal-video').modal('show');
		$('#modal-default').scrollTop(0);
	}

</script>