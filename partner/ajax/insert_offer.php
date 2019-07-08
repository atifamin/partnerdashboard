<?php
session_start();
$UserID 			 = $_SESSION['user_id'];
$PartnerID			 = $_SESSION['partner_id']; 
include "../config/config_prmsub.php";
$Query2 = "INSERT INTO `partner_offer`(`offer_title`, `offer_type`,`partner_id`) VALUES('".$_POST['offer_title']."','".$_POST['offer_type']."','".$PartnerID."')";
$Query2R = mysqli_query($con_PRMSUB,$Query2) or die(mysqli_error());
$PartnerOfferID = mysqli_insert_id($con_PRMSUB);
$Query = "
INSERT INTO `offer_box`
(`partner_offer_id`,`offer_name`,`offer_amount_min`,`offer_amount_max`,`offer_rate_min`,`offer_rate_max`,`offer_term_min`,`offer_term_max`,`offer_apr_min`,`offer_apr_max`,`offer_origination_min`,`offer_origination_max`,`offer_other_fees`,`offer_prepayment_penalty`,`offer_cta_url`) 
VALUES
(
'".$PartnerOfferID."',
'".$_POST['offer_name']."',
'".$_POST['offer_amount_min']."',
'".$_POST['offer_amount_max']."',
'".$_POST['offer_rate_min']."',
'".$_POST['offer_rate_max']."',
'".$_POST['offer_term_min']."',
'".$_POST['offer_term_max']."',
'".$_POST['offer_apr_min']."',
'".$_POST['offer_apr_max']."',
'".$_POST['offer_origination_min']."',
'".$_POST['offer_origination_max']."',
'".$_POST['offer_other_fees']."',
'".$_POST['offer_prepayment_penalty']."',
'".$_POST['offer_cta_url']."')
"; 
$QueryR = mysqli_query($con_PRMSUB,$Query) or die(mysqli_error());
$OfferBoxID = mysqli_insert_id($con_PRMSUB);


$Query1 = "INSERT INTO `finserv`(`partner_id`,`finserv_status`,`offer_id`) VALUES('".$PartnerID."','".$_POST['finserv_status']."','".$PartnerOfferID."')";
$Query1R = mysqli_query($con_PRMSUB,$Query1) or die(mysqli_error());

?>
<div class="note note-success">
    <p>Offer Created Successfully!</p>
</div>