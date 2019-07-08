<?php
$NoResult = '<div class="alert alert-danger tab3_boxes" style="float:left;width:100%;margin-top:25px;"><div class="col-lg-4"><h3 style="margin-top:68px;color:#fff;">No Result Found!</h3></div></div>';
$UserOfferCodes = $_SESSION['user_offer_codes'];
$UserOfferScore = $_SESSION['user_offer_score']; 
$UserCertificationID = $_SESSION['certification_id'];
if($UserOfferCodes!='' && $UserOfferScore!=0){
$Score = explode(',',$UserOfferCodes);
$OfferCodes='';
$Index3_offer = 1;
foreach($Score as $key=>$val){
	$val = str_replace(' ','',$val);
	if($Index3_offer>1){
		$OfferCodes .=' OR offer_code = "'.$val.'"';
	}else{
		$OfferCodes .=' offer_code = "'.$val.'"';
	}
$Index3_offer++;	
}
$Tab3_Q1 = 'SELECT po.*, uos.offer_text, uos.offer_up_to_amount FROM partner_offer po 
			LEFT JOIN user_offer_status uos ON uos.partner_offer_id = po.partner_offer_id
			WHERE ('.$OfferCodes.') AND offer_score = '.$UserOfferScore.' GROUP BY po.partner_offer_id ';
			
$Tab3_Q1R = mysqli_query($con_PRMSUB,$Tab3_Q1) or die(mysqli_error());
if(mysqli_num_rows($Tab3_Q1R)>0){
	while($OfferData = mysqli_fetch_assoc($Tab3_Q1R)){
		
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
 	
?>									
									
									
									
									
									<div class="alert alert-info tab3_boxes" style="float:left;width:100%;margin-top:25px;">
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: center;">
										<h4 style="color:#B7DEE8;"><?php echo $PartnerName; ?></h4><br />
										<img src="<?php echo $Logo; ?>" alt="" width="200" /><br />
											<a href="#more_info_popup" role="button" data-toggle="modal" onclick="showpartnerdescription(<?php echo $OfferData['partner_id']; ?>)" class="btn btn-sm btn-primary btn-white btn-round tab3btn" type="button" style="background:#EAF2F8 !important;color:#10253F !important;">
												<span class="bigger-110" style="color:#10253F !important;">MORE INFO</span>
												<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
										
										<div class=" profile-user-info-striped col-lg-4 col-md-4 col-sm-4 col-xs-4">
											<h4 style="color:#ffcc00;"><?php echo $OfferData['offer_title']; ?></h4>
											<h4 style="color:#fff;"><?php echo $OfferData['offer_type']; ?></h4>
										<hr />
											<h4 style="color:#fff;text-transform:capitalize;text-align:center;"><?php echo $UserCompany; ?></h4> 
											<div class="profile-info-row">
												<div class="profile-info-name"> YOU ARE </div>
												<div class="profile-info-value">
													<span id="username" class="editable"><span class="label label-success arrowed-in arrowed-in-right"><?php echo $OfferData['offer_text']; ?></span></span>
												</div>
											</div>
											<div class="profile-info-row">
												<div class="profile-info-name"> UP TO </div>
												<div class="profile-info-value">
													<span id="username" class="editable">$ <?php echo number_format($OfferData['offer_up_to_amount'],0); ?></span>
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right">
											<a href="#modal-table" role="button" data-toggle="modal" onclick="showofferboxpopup(<?php echo $OfferData['partner_offer_id']; ?>,'<?php echo $PartnerName; ?>')" class="btn btn-sm btn-primary btn-white btn-round tab3btn" type="button" style="margin-top:107px;float:right;>
												<i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
												<span class="bigger-110" style="font-size:12px !important;">CLICK HERE TO LEARN MORE</span>

												<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div>
<?php
	}// While close
}else{echo $NoResult;}
}else{echo $NoResult;}
?>							