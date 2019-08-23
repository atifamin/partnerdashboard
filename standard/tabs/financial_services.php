<?php //print_r($_POST); ?>

<?php
$_FILE_NAME = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']); ?>
<?php if($_FILE_NAME == "contract_details.php"){ 
	$FirmID = $_SESSION['dbe_firm_id'];
	

	$VIDEO_QUERY = "select * from funding_video";
	$VIDEO_R = mysqli_query($con_MAIN,$VIDEO_QUERY) or die(mysqli_error()); 
	$VIDEO_D =  mysqli_fetch_assoc($VIDEO_R);

	?>

<style type="text/css">
	
</style>

<div class="row contract_details_table">
        
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

$Tab3_Q1R = mysqli_query($con_MAIN,$Tab3_Q1) or die(mysqli_error());
if(mysqli_num_rows($Tab3_Q1R)>0){
	while($OfferData = mysqli_fetch_assoc($Tab3_Q1R)){
		
$PartnerOfferID = $OfferData['partner_offer_id'];
//echo "<pre>";print_r($_POST);exit;

$InsQ = "INSERT INTO `partner_offer_views`(`partner_offer_user_id`,`partner_offer_id`) VALUES('".$UserID."','".$PartnerOfferID."')";
mysqli_query($con_MAIN,$InsQ) or die(mysqli_error());

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
$S1R = mysqli_query($con_MAIN,$S1) or die(mysqli_error());

$Tab2_Q5 = 'SELECT `cfm_id`,`content_code` FROM `cfm` WHERE `type`="Best Practices" LIMIT 1';
$Tab2_Q5R = mysqli_query($con_MAIN,$Tab2_Q5) or die(mysqli_error());
$Tab2_Index5 = 1;
$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);

if(mysqli_num_rows($S1R)>0){
	$FinSer = mysqli_fetch_assoc($S1R);
	$FinServID = $FinSer['finserv_id'];
$CFMid	 = $Tab2_Q5D['cfm_id'];
$UserID		 = $_SESSION['user_id'];
$Insert = "INSERT INTO `finserv_views`(`finserv_user_id`,`finserv_id`,`finserv_view_date`) VALUES ('".$UserID."','".$FinServID."','".date('Y-m-d H:i:s')."')";
$Tab2_Q5R = mysqli_query($con_MAIN,$Insert) or die(mysqli_error());
} 	

	//$OfferID = $_POST['offerid'];
	
	$Query = 'SELECT * FROM `offer_box` WHERE `offer_box_id`='.$OfferData['offer_box_id'].'';
	$QueryR = mysqli_query($con_MAIN,$Query);
	$row = mysqli_fetch_object($QueryR);
	//echo "<pre>";print_r($row);exit;
?>



<div class="row cus-border mt-10">
  <div class="col-md-4 text-center">
    <div class="mt-10"> <span class="font-30 color-1">Contract Financing<br>
    	$5,000 - $100,000
      <!-- $<?php // echo number_format($row->offer_amount_min); ?> - $<?php // echo number_format($row->offer_amount_max); ?> --></span> </div>
    <!-- <a href="#modal-table" role="button" data-toggle="modal" onclick="showofferboxpopup(2,'Basic Partner')" class="btn mb-10 mt-10 bg-button"><span class="text-white">REQUEST FINANCING</span></a> -->
	<a href="javascript:;" onclick="showofferboxpopup(2,'Basic Partner')" class="btn mb-10 mt-10 bg-button"><span class="text-white">REQUEST FINANCING</span></a>
    <div class="vl"></div>
  </div>
  <div class="col-md-5 text-center">
    <table class="mt-20 color-2 w-70" align="center">
      <tr class="text-left">
        <td>FINANCING TYPE:</td>
        <td>CONTACT FINANCING</td>
      </tr>
      <tr class="text-left">
        <td>APPLICATION FEE:</td>
        <td>$150.00 (One Time Fee)</td>
      </tr>
      <tr class="text-left">
        <td>INTEREST RATE:</td>
        <td>1% PER MONTH</td>
        <!-- <td><?php // echo number_format($row->offer_rate_min); ?>% - <?php // echo number_format($row->offer_rate_max); ?>%</td> -->
      </tr>
      <tr class="text-left">
        <td>REPAYMENT TERM:</td>
        <td>1-3 MONTHS </td>
        <!-- <td><?php //echo number_format($row->offer_term_min); ?> - <?php // echo number_format($row->offer_term_max); ?> Months</td> -->
      </tr>
    </table>
    <span class="color-2">(UPON PAYMENT OF SUBMITTED INVOICE)</span>
    <div class="vl"></div>
  </div>
  <div class="col-md-3 text-center">
    <div class="mt-10 mb-10"> <strong class="color-1 font-25">PRE-PAYMENT<br>
      PENELTY?</strong><br>
      <button type="button" class="btn custom-btn mt-10"><strong class="text-white font-25">NO</strong></button>
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
    <div class="mt-10"> <span class="mt-10 font-25 color-3">Contract and Invoice Financing<br>
      Solutions for your  California<br>
      Certified Business</span> </div>
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
  <div class="col-md-12">
    <hr class="new5">
  </div>
  <br>
  <div class="row mb-10">
    <div class="col-md-6 text-center">
    	<a href="" role="button" data-toggle="modal"><img src="../assets/img/financing-cycle.jpg" width="60%" onclick="open_cycle_modal()"></a></div>
    <div class="col-md-6 text-center">
    	<a href="" role="button" data-toggle="modal"><img src="../assets/img/financing-works.jpg" width="80%" class="mt-10" onclick="open_works_modal()"></a></div>
  </div>
</div>
<div class="modal fade text-center" id="modal-video">
	<video class="mt-10" width="80%" controls="">
      		<source src="<?php echo base_url.$VIDEO_D['video_url_path']; ?>" type="video/mp4">
      		Your browser does not support HTML5 video. 
  	</video>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade text-center" id="modal-img-cycle">
  <img src="../assets/img/financing-cycle.jpg" class="mt-10" width="50%">
</div>
<div class="modal fade text-center" id="modal-img-works">
  <img src="../assets/img/financing-works.jpg" class="mt-10" width="70%">
</div>
<!-- <div class="tab3_boxes" style="float:left;width:100%;margin-top:25px;padding:10px;">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;background:#9ec7c2;height: 230px;padding:0%;">
		<h4 style="color:white;background: #2e9288fa;padding: 2%;margin-top: 0%;"><?php echo $PartnerName; ?></h4><br /><?php if(isset($Logo)){ ?>
		<img src="<?php echo base_url.$Logo; ?>" alt="" width="200" />
		<?php } else{  ?>
		<img src="<?php echo base_url; ?>assets/img/partnerLogo.PNG" alt="" style="width:92px;margin-left: 3px;" />
		<?php } ?>
		<br />
			<a href="#more_info_popup" role="button" data-toggle="modal" onclick="showpartnerdescription(<?php echo $OfferData['partner_id']; ?>)" class="btn btn-sm btn-primary btn-white btn-round tab3btn" type="button" style="background:#EAF2F8 !important;color:#10253F !important;border:none;">
				<span class="bigger-110" style="color:#10253F !important;">MORE INFO</span>
				<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
			</a>
		</div>
		
		<div class=" profile-user-info-striped col-lg-4 col-md-4 col-sm-4 col-xs-4" style="background:#133e64;height: 230px;">
			<h4 style="color:#ffcc00;"><?php echo $OfferData['offer_title']; ?></h4>
			<h4 style="color:#fff;"><?php echo $OfferData['offer_type']; ?></h4>
		<hr>
			<h4 style="color:#fff;text-transform:capitalize;font-size:19px;text-align:center;"><?php echo $UserCompany; ?></h4> 
			<div class="profile-info-row">
				<div class="profile-info-name" style="color:white;"> YOU ARE </div>
				<div class="profile-info-value">
					<span id="username" class="editable"><span class="label label-success arrowed-in arrowed-in-right" style="color:white;"><?php echo $OfferData['offer_text']; ?></span></span>
				</div>
			</div>
			
			<div class="profile-info-row">
				<div class="profile-info-name" style="color:white;"> UP TO </div>
				<div class="profile-info-value">
					<span id="username" class="editable" style="color:white;">$ <?php echo number_format($OfferData['offer_up_to_amount'],0); ?></span>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right" style="background:#133e64;height: 230px;">
			<a href="#modal-table" role="button" data-toggle="modal" onclick="showofferboxpopup(<?php echo $OfferData['offer_box_id']; ?>,'<?php echo $PartnerName; ?>')" class="btn btn-sm btn-primary btn-white btn-round tab3btn" type="button" style="margin-top:120px;float:right;">
				<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
				<span class="bigger-110" style="font-size:12px !important;">CLICK HERE TO LEARN MORE</span>

				<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
			</a>
		</div>
	</div> -->
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