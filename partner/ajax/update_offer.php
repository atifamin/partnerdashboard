<?php
session_start();
$UserID 			 = $_SESSION['user_id'];
$PartnerID			 = $_SESSION['partner_id']; 
include "../config/config_prmsub.php";
$Query = "
UPDATE `offer_box` SET
`offer_name`='".$_POST['offer_name']."',
`offer_amount_min`='".$_POST['offer_amount_min']."',
`offer_amount_max`='".$_POST['offer_amount_max']."',
`offer_rate_min`='".$_POST['offer_rate_min']."',
`offer_rate_max`='".$_POST['offer_rate_max']."',
`offer_term_min`='".$_POST['offer_term_min']."',
`offer_term_max`='".$_POST['offer_term_max']."',
`offer_apr_min`='".$_POST['offer_apr_min']."',
`offer_apr_max`='".$_POST['offer_apr_max']."',
`offer_origination_min`='".$_POST['offer_origination_min']."',
`offer_origination_max`='".$_POST['offer_origination_max']."',
`offer_other_fees`='".$_POST['offer_other_fees']."',
`offer_prepayment_penalty`='".$_POST['offer_prepayment_penalty']."',
`offer_cta_url`='".$_POST['offer_cta_url']."'
WHERE `offer_box_id`=".$_POST['offer_box_id']."
"; 
$QueryR = mysqli_query($con_PRMSUB,$Query) or die(mysqli_error());
$Query1 = "UPDATE `finserv` SET `finserv_status`='".$_POST['finserv_status']."' WHERE `finserv_id`=".$_POST['finserv_id']."";
$Query1R = mysqli_query($con_PRMSUB,$Query1) or die(mysqli_error());
$Query2 = "UPDATE `partner_offer` SET `offer_title`='".$_POST['offer_title']."', `offer_type`='".$_POST['offer_type']."' WHERE `partner_offer_id`=".$_POST['partner_offer_id']."";
$Query2R = mysqli_query($con_PRMSUB,$Query2) or die(mysqli_error());
?>
<div class="note note-success">
    <p>Offer Updated Successfully!</p>
</div>