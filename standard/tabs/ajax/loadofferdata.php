<?php
session_start();
include('../../base_path.php');
$UserID = $_SESSION['user_id'];
include "../../config/config_prmsub.php";
$OfferID = $_POST['offerid'];


$InsQ = "INSERT INTO `offer_box_views`(`offer_box_user_id`,`offer_box_id`) VALUES('".$UserID."','".$OfferID."')";
mysqli_query($con_PRMSUB,$InsQ) or die(mysqli_error());	



$Query = 'SELECT * FROM `offer_box` WHERE `offer_box_id`='.$OfferID.'';
$QueryR = mysqli_query($con_PRMSUB,$Query);
if(mysqli_num_rows($QueryR)>0){
	$OfferData = mysqli_fetch_assoc($QueryR); 
?>
										
<div class="row">
	<div class="col-lg-4 col-xs-4" style="border-right:black;border-style: double;border-left: 0px;border-bottom: 0;border-top: 0;">
		<div style="font-size:35px;text-align:center;"><strong>Loan Amount</strong></div>
		<div style="clear:both;height:2px;"></div>
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="text-align:center;"><span style="font-size: 20px;">Min</span><br /><span style="font-size:25px;color:#83532B;"><strong>$<?php echo number_format($OfferData['offer_amount_min'],2); ?></strong></span></div>
			<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center;"><span class="bigger-325 black" style="font-size: 26px;">__</span></div>
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="text-align:center;"><span style="font-size: 20px;">Max</span><br /><span style="font-size:25px;color:#83532B;"><strong>$<?php echo number_format($OfferData['offer_amount_max'],2); ?></strong></span></div>
		</div>
		<div style="clear:both;height:46px;"></div>
		<center>
		<!-- <a href="<?php echo $OfferData['offer_cta_url']; ?>" class="btn btn-primary" target="_blank" style="padding:2px 32px;">APPLY NOW</a> -->
		<a href="javascript:;" onclick="open_load_form()" class="btn btn-primary" target="_blank" style="padding:2px 32px;">APPLY NOW</a>
		</center>
	</div>

		<div class="col-xs-8 col-sm-8 col-lg-8" style="padding:0 3% 0% 3%;" align="center">
			<div class="col-md-12"><div style="background-color:#10253f;color:white;"><h1>YOUR bizVAULT Status</h1></div></div>
			<div class="col-md-4"><img src="../assets/img/a13.png" width="150"></div>
			<div class="col-md-8"><div style="background-color:#31859c;color:white;"><h2 style="padding:3% 10%;">Your bizVAULT Contains All Needed Documents and Files</h2></div></div>
			
		</div>
	</div>
	</div><hr />
	<div class="row">
		<div class="col-lg-4 col-xs-4">
			<div style="clear:both;height:1px;"></div>
			<span style="font-size:30px;"><strong>Loan Details</strong></span><br />
			<span style="font-size:25px;color:#31859D;"><strong>The Math</strong></span>
		</div>
		<div class="col-lg-8 col-xs-8">
		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<table class="tab3_popup_table" style="width:100%;margin-top:5%;">
					<tr>
						<td><span style="font-size:15px;font-weight:600;">Loan Product</span></td>
						<td><span class="bigger-125 black"><?php echo $OfferData['offer_name']; ?></span></td>
					</tr>
					<tr>
						<td><span style="font-size:15px;font-weight:600;">Interest Rate</span></td>
						<td><?php echo number_format($OfferData['offer_rate_min'],0); ?>% - <?php echo number_format($OfferData['offer_rate_max'],0); ?>%</td>
					</tr>
					<tr>
						<td><span style="font-size:15px;font-weight:600;">Repayment Term</span></td>
						<td><?php echo number_format($OfferData['offer_term_min'],0); ?> - <?php echo number_format($OfferData['offer_term_max'],0); ?> Months</td>
					</tr>
					<tr>
						<td><span style="font-size:15px;font-weight:600;">Repayment Frequency</span></td>
						<td><span class="bigger-125 black">Monthly</span></td>
					</tr>
					<tr>
						<td><span style="font-size:15px;font-weight:600;">Origination Fees</span></td>
						<td><span class="bigger-125 black"><?php echo number_format($OfferData['offer_origination_min'],0); ?>% - <?php echo number_format($OfferData['offer_origination_max'],0); ?>%</span></td>
					</tr>
				</table>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 aligncenter">
				<div style="clear:both;height:44px;"></div><span class="bigger-125 black" style="color:#31859D;">Pre Payment Penalty?</span><div style="clear:both;height:11px;"></div>
				<center>
				<a href="<?php echo $OfferData['offer_cta_url']; ?>" class="btn btn-primary" target="_blank" style="padding:2px 32px;background:#31859D !important;background-color:#31859D !important;"><?php echo $OfferData['offer_prepayment_penalty']; ?></a>
				</center>
			</div>
		</div>
	</div>
 	
	<div class="row" style="background:#ECF0DF;background:#ECF0DF;border:white;border-style:solid;border-bottom:0;border-width: 10px;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 aligncenter" style="color:#7E8476;font-size:22px;text-align:center;"><?php echo number_format($OfferData['offer_term_min'],0); ?> Month Loan<br />MONTHLY PAYMENT</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 aligncenter" style="color:#7E8476;font-size:22px;text-align:center;"><?php echo number_format($OfferData['offer_term_max'],0); ?> Month Loan<br />MONTHLY PAYMENT</div>
	</div>
	<div class="row" style="padding-bottom:10px;background:#ECF0DF;border:white;border-style:solid;border-top:0;border-width: 10px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 aligncenter" style="margin-left:0px;">
			<div class="l_green_bg padding10">
				<span style="font-size:20px;text-align:center;color:#7E8476;margin-left:5%;" >MINIMUM</span><br><span style="font-size:20px;text-align:center;color:#7E8476;margin-left:13%;">LOAN</span><br><span style="font-size:20px;text-align:center;color:#7E8476;margin-left:5%;">AMOUNT</span><br />
				<span style="font-size:20px;text-align:center;color:#83532B;"><strong>$<?php echo number_format($OfferData['offer_amount_min'],2); ?></strong></span>
			</div>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="text-align:center;"><div >&nbsp;</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;">
		<div style="background:#D8E4BE;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
		</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div style="background:#D8E4BE;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
		</div></div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="text-align:center;"><div class="l_green_bg padding10">&nbsp;</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div  style="background:#D8E4BE;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
		</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div style="background:#D8E4BE;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_min'],1); ?>%</span><br />
		</div></div>											
	</div>
	<div style="clear:both;height:0px;"></div>
	<div class="row" style="background:#DBEEF4;border:white;border-style:solid;border-bottom:0;border-width: 10px;">
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">&nbsp;</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="color:#7E8476;font-size:22px;text-align:center;"><?php echo number_format($OfferData['offer_term_min'],0); ?> Month Loan<br />MONTHLY PAYMENT</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">&nbsp;</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="color:#7E8476;font-size:22px;text-align:center;"><?php echo number_format($OfferData['offer_term_max'],0); ?> Month Loan<br />MONTHLY PAYMENT</div>
	</div>
	<div class="row" style="padding-bottom:10px;background:#DBEEF4;border:white;border-style:solid;border-top:0;border-width: 10px;">
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="margin-left:0px;">
			<div class="l_blue_bg padding10">
			<span style="font-size:20px;text-align:center;color:#7E8476;margin-left:7%;" >MAXIMUM</span><br><span style="font-size:20px;text-align:center;color:#7E8476;margin-left:16%;">LOAN</span><br><span style="font-size:20px;text-align:center;color:#7E8476;margin-left:8%;">AMOUNT</span><br />
				<span style="font-size:20px;text-align:center;color:#83532B;"><strong>$<?php echo number_format($OfferData['offer_amount_max'],1); ?></strong></span>
			</div>
		</div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="text-align:center;"><div class="l_blue_bg padding10">&nbsp;</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div style="background:#B8DDE6;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
		</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div style="background:#B8DDE6;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
		</div></div>
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="text-align:center;"><div class="l_blue_bg padding10">&nbsp;</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div style="background:#B8DDE6;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$232.71</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_min'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
		</div></div>
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2" style="text-align:center;"><div style="background:#B8DDE6;padding: 10%; ">
			<span class="bigger-125" style="color:#7E8476;"><strong>$384.13</strong></span><br />
			<span class="bigger-125 black">Interest Rate</span><br />
			<span class="bigger-125 black"><?php echo number_format($OfferData['offer_rate_max'],1); ?>%</span><br /><br />
			<span class="bigger-125" style="color:#31859D;">Actual APR</span><br />
			<span class="bigger-125" style="color:#307ECC;"><?php echo number_format($OfferData['offer_apr_max'],1); ?>%</span><br />
		</div></div>											
	</div>
<?php
}else{
	echo '<span class="red">Data not found</span>';exit;
}
?>
<script>
$.post("../tabs/apply_loan_form.php").done(function(e){
	$("#modalArea").html(e);
});
function open_load_form(){
	$("#apply-load-modal").modal("show");
}
</script>
