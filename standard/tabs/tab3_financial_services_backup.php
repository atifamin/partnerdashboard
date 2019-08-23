<?php
include("../includes/header.php");
include("../includes/top_nav.php");
include("../includes/side_bar.php");
include ("../functions/functions.php"); 

?>

<div class="row">
<div class="col-sm-12">
<?php
$UserID = $_SESSION['user_id'];
$Tab3_Q1 = 'SELECT ob.offer_box_id, ob.partner_id, pf.offer_title, pf.offer_type, uos.*
FROM user_offer_status uos
LEFT JOIN partner_offer pf ON pf.partner_offer_id=uos.partner_offer_id
LEFT JOIN offer_box ob ON ob.offer_box_id = pf.offer_box_id
WHERE uos.user_offer_score = '.$UserID.'';
$Tab3_Q1R = mysqli_query($con_MAIN,$Tab3_Q1) or die(mysqli_error());
if(mysqli_num_rows($Tab3_Q1R)>0){
	$UserData = mysqli_fetch_assoc($Tab3_Q1R);

// Partner Data
$Tab3_Q4 = 'SELECT * FROM `partner` WHERE `partner_id`='.$UserData['partner_id'].'';
$Tab3_Q4R = mysqli_query($con_MAIN,$Tab3_Q4) or die(mysqli_error());	
if(mysqli_num_rows($Tab3_Q4R)>0){
	$PartnerName1 = mysqli_fetch_array($Tab3_Q4R);
	$PartnerName = $PartnerName1['partner_name'];
	$Logo		 = $PartnerName1['partner_logo_url'];
	if($Logo == ''){$Logo		 = 'assets/img/companylogo.png';}
}else{
	$PartnerName = '';
	$Logo		 = 'assets/img/companylogo.png';
}
?>
									<div class="alert alert-info tab3_boxes" style="float:left;width:100%;margin-top:25px;">
										<div class="col-lg-4"><img src="<?php echo $Logo; ?>" alt="" width="200" /></div>
										
										<div class=" profile-user-info-striped col-lg-4">
											<h4 style="color:#4F81BD;"><?php echo $PartnerName; ?></h4>
											<h4 style="color:#4F81BD;"><?php echo $UserData['offer_title']; ?></h4>
											<h4 style="color:#4F81BD;"><?php echo $UserData['offer_type']; ?></h4>
										<hr />
											<div class="profile-info-row">
												<div class="profile-info-name"> BUSINESS&nbsp;NAME </div>
												<div class="profile-info-value">
													<span id="username" class="editable">?????</span>
												</div>
											</div> 
											<div class="profile-info-row">
												<div class="profile-info-name"> YOU ARE </div>
												<div class="profile-info-value">
													<span id="username" class="editable"><span class="label label-success arrowed-in arrowed-in-right"><?php echo $UserData['offer_text']; ?></span></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> UP TO </div>
												<div class="profile-info-value">
													<span id="username" class="editable">$<?php echo number_format($UserData['offer_up_to_amount'],2); ?></span>
												</div>
											</div>
										</div>
										<div class="col-lg-4 pull-right">
											<a href="#modal-table" role="button" data-toggle="modal" onclick="showofferboxpopup(<?php echo $UserData['offer_box_id']; ?>)" class="btn btn-sm btn-primary btn-white btn-round tab3btn" type="button" style="margin-top:107px;float:right;>
												<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
												<span class="bigger-110">CLICK HERE TO LEARN MORE</span>

												<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
<?php
$Tab3_Q2 = 'SELECT ob.*
FROM user_offer_status uos
LEFT JOIN partner_offer pf ON pf.partner_offer_id=uos.partner_offer_id
LEFT JOIN offer_box ob ON ob.offer_box_id = pf.offer_box_id
WHERE uos.user_offer_score = '.$UserID.'';
$Tab3_Q2R = mysqli_query($con_MAIN,$Tab3_Q2) or die(mysqli_error());
if(mysqli_num_rows($Tab3_Q2R)>0){
	while($OfferData = mysqli_fetch_assoc($Tab3_Q2R)){

// Partner Data
$Tab3_Q4 = 'SELECT * FROM `partner` WHERE `partner_id`='.$UserData['partner_id'].'';
$Tab3_Q4R = mysqli_query($con_MAIN,$Tab3_Q4) or die(mysqli_error());	
if(mysqli_num_rows($Tab3_Q4R)>0){
	$PartnerName1 = mysqli_fetch_array($Tab3_Q4R); 
	$Logo		 = $PartnerName1['partner_logo_url'];
	if($Logo == ''){$Logo		 = 'assets/img/companylogo.png';}
}else{ 
	$Logo		 = 'assets/img/companylogo.png';
}	
?>
									<div class="alert alert-danger tab3_boxes" style="float:left;width:100%;">
										<div class="col-lg-4"><img src="<?php echo $Logo; ?>" alt="" width="200" /></div>
										
										<div class="col-lg-4">
											<h3 class="tab3h3" style="margin-top:68px;color:#fff;text-trasnform:capitalize;"><?php echo $OfferData['offer_title']; ?></h3>
										</div>
										<div class="col-lg-4 pull-right">
											<a href="#modal-table" role="button" data-toggle="modal" onclick="showofferboxpopup(<?php echo $OfferData['offer_box_id']; ?>)" class="btn btn-sm btn-primary btn-white btn-round tab3btn" type="button" style="margin-top:107px;float:right;>
												<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
												<span class="bigger-110">CLICK HERE TO LEARN MORE</span>

												<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
<?php
	}
		} ?>									
<?php
}else{
?>
<div class="alert alert-danger tab3_boxes" style="float:left;width:100%;margin-top:25px;"> 
										
										<div class="col-lg-4">
											<h3 style="margin-top:68px;color:#fff;">No Result Found!</h3>
										</div> 
</div>
<?php	
}
?>										
										
</div>
</div>