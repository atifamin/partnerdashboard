<?php
session_start();
$UserID = $_SESSION['user_id'];
include "../config/config_prmsub.php";
$OfferID = $_POST['offerid'];


$InsQ = "INSERT INTO `offer_box_views`(`offer_box_user_id`,`offer_box_id`) VALUES('".$UserID."','".$OfferID."')";
mysqli_query($con_MAIN,$InsQ) or die(mysqli_error());	



$Query = 'SELECT * FROM `offer_box` WHERE `offer_box_id`='.$OfferID.'';
$QueryR = mysqli_query($con_MAIN,$Query);
if(mysqli_num_rows($QueryR)>0){
	$OfferData = mysqli_fetch_assoc($QueryR); 
?>

<div class="clearfix">
  <div class="grid3">
    <div class="bigger-150 black aligncenter"><strong>Loan Amount</strong></div>
    <div style="clear:both;height:2px;"></div>
    <div class="row">
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 aligncenter"><span class="bigger-125 black">Min</span><br />
        <span class="bigger-175 brownfont"><strong>$<?php echo number_format($OfferData['offer_amount_min'],2); ?></strong></span></div>
      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 aligncenter"><span class="bigger-325 black" style="font-size: 26px;">__</span></div>
      <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 aligncenter"><span class="bigger-125 black">Max</span><br />
        <span class="bigger-175 brownfont"><strong>$<?php echo number_format($OfferData['offer_amount_max'],2); ?></strong></span></div>
    </div>
    <div style="clear:both;height:46px;"></div>
    <center>
      <a href="<?php echo $OfferData['offer_cta_url']; ?>" class="btn btn-primary" target="_blank" style="padding:2px 32px;">APPLY NOW</a>
    </center>
  </div>
  <div class="grid2" style="width:64%;">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
        <table class="tab3_popup_table">
          <tr>
            <td><strong>Loan Product</strong></td>
            <td><span class="bigger-125 black"><?php echo $OfferData['offer_name']; ?></span></td>
          </tr>
          <tr>
            <td><strong>Interest Rate</strong></td>
            <td><?php echo number_format($OfferData['offer_rate_min'],0); ?>% - <?php echo number_format($OfferData['offer_rate_max'],0); ?>%</td>
          </tr>
          <tr>
            <td><strong>Repayment Term</strong></td>
            <td><?php echo number_format($OfferData['offer_term_min'],0); ?> - <?php echo number_format($OfferData['offer_term_max'],0); ?> Months</td>
          </tr>
          <tr>
            <td><strong>Repayment Frequency</strong></td>
            <td><span class="bigger-125 black">Monthly</span></td>
          </tr>
          <tr>
            <td><strong>Origination Fees</strong></td>
            <td><span class="bigger-125 black"><?php echo number_format($OfferData['offer_origination_min'],0); ?>% - <?php echo number_format($OfferData['offer_origination_max'],0); ?>%</span></td>
          </tr>
        </table>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 aligncenter">
        <div style="clear:both;height:44px;"></div>
        <span class="bigger-125 black" style="color:#31859D;">Pre Payment Penalty?</span>
        <div style="clear:both;height:11px;"></div>
        <center>
          <a href="<?php echo $OfferData['offer_cta_url']; ?>" class="btn btn-primary" target="_blank" style="padding:2px 32px;background:#31859D !important;background-color:#31859D !important;"><?php echo $OfferData['offer_prepayment_penalty']; ?></a>
        </center>
      </div>
    </div>
  </div>
</div>
<hr />
<div style="clear:both;height:1px;"></div>
<span class="bigger-150 black"><strong>Loan Details</strong></span><br />
<span class="bigger-125 black" style="color:#31859D;"><strong>The Math</strong></span><br />
<div class="row l_green_bg">
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 aligncenter" style="color:#7E8476;font-size:18px;"><?php echo number_format($OfferData['offer_term_min'],0); ?> Month Loan<br />
    MONTHLY PAYMENT</div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 aligncenter" style="color:#7E8476;font-size:18px;"><?php echo number_format($OfferData['offer_term_max'],0); ?> Month Loan<br />
    MONTHLY PAYMENT</div>
</div>
<div class="row l_green_bg" style="padding-bottom:10px;">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter" style="margin-left:0px;">
    <div class="l_green_bg padding10"> <span class="bigger-125 black" style="color:#7E8476;">MINIMUM<br />
      LOAN<br />
      AMOUNT</span><br />
      <br />
      <span class="bigger-175 brownfont"><strong>$<?php echo number_format($OfferData['offer_amount_min'],2); ?></strong></span> </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 aligncenter">
    <div class="l_green_bg padding10">&nbsp;</div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_green_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
    </div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_green_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
    </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 aligncenter">
    <div class="l_green_bg padding10">&nbsp;</div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_green_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
    </div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_green_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
    </div>
  </div>
</div>
<div style="clear:both;height:20px;"></div>
<div class="row l_blue_bg">
  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 aligncenter" style="color:#7E8476;font-size:18px;"><?php echo number_format($OfferData['offer_term_min'],0); ?> Month Loan<br />
    MONTHLY PAYMENT</div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 aligncenter" style="color:#7E8476;font-size:18px;"><?php echo number_format($OfferData['offer_term_max'],0); ?> Month Loan<br />
    MONTHLY PAYMENT</div>
</div>
<div class="row l_blue_bg" style="padding-bottom:10px;">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter" style="margin-left:0px;">
    <div class="l_blue_bg padding10"> <span class="bigger-125 black" style="color:#7E8476;">MAXIMUM<br />
      LOAN<br />
      AMOUNT</span><br />
      <br />
      <span class="bigger-175 brownfont"><strong>$<?php echo number_format($OfferData['offer_amount_max'],1); ?></strong></span> </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 aligncenter">
    <div class="l_blue_bg padding10">&nbsp;</div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_blue_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
    </div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_blue_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
    </div>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 aligncenter">
    <div class="l_blue_bg padding10">&nbsp;</div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_blue_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
    </div>
  </div>
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter">
    <div class="d_blue_bg padding10"> <span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
      <span class="bigger-125 black">Interest Rate</span><br />
      <span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br />
      <br />
      <span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
      <span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
    </div>
  </div>
</div>
<?php
}else{
	echo '<span class="red">Data not found</span>';exit;
}
?>
