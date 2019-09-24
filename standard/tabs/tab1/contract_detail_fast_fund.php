<?php session_start(); ?>

<?php include("../../../config/config_main.php"); ?> 

<?php 

  $FirmID = $_SESSION['dbe_firm_id'];
  $ContractID = $_POST['id'];

  $Tab1_Q1 = "SELECT *
      FROM cpw_main pc
      WHERE pc.dbe_firm_id = '".$FirmID."' AND pc.contract_id = '".$ContractID."'
      ORDER BY pc.contract_id DESC";
      
    $Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error()); 
    $Tab1_Q1RA = mysqli_fetch_array($Tab1_Q1R);
?>
<?php //echo "<pre>"; print_r($Tab1_Q1RA); ?>
<div class="col-md-4 text-center">
    <div class="mt-20">
      <span class="font-35 color-1">Contract Financing<br>$25,000 - $5,000,000</span>
    </div>
    <a href="javascript:;" onclick="showofferboxpopup(2,'Basic Partner',<?php echo $Tab1_Q1RA['contract_id']; ?>)" class="btn mb-10 mt-5 bg-button" style="padding: 3px 20px 3px 20px;"><span class="text-white font-25">REQUEST FINANCING</span></a>
    <div class="vl"></div>
  </div>
  <div class="col-md-5 text-center">
    <span class="mt-20" style="color: #905205;font-size: 15px;"><b>(UPON CONTRACT SPONSOR OR PRIME</b><br><b>CONTRACTOR'S PAYMENT OF INVOICE)</b></span>
    <table class="color-2 w-80" align="center">
      <tr class="text-left">
        <td class="custome_style_3"><b>FINANCING TYPE:</b></td>
        <td class="custome_style_3"><b>CONTRACT FINANCING</b></td>
      </tr>
      <tr class="text-left">
        <td class="custome_style_3"><b>FINANCING COST:</b></td>
        <td class="custome_style_3"><b>1.5% to 2.5% PER MONTH</b></td>
      </tr>
      <tr class="text-left">
        <td class="custome_style_3"><b>PAYMENT TERM:</b></td>
        <td class="custome_style_3"><b>UP TO 3 MONTHS</b></td>
        <!-- <td class="custome_style_3"><?php // echo number_format($row->offer_rate_min); ?>% - <?php // echo number_format($row->offer_rate_max); ?>%</td> -->
      </tr>
      <tr class="text-left">
        <td class="custome_style_3"><b>PREPAYMENT PENALTY:</b></td>
        <td class="custome_style_3"><b>NONE</b></td>
        <!-- <td><?php //echo number_format($row->offer_term_min); ?> - <?php // echo number_format($row->offer_term_max); ?> Months</td> -->
      </tr>
    </table>
    <span class="custome_style_3"><b>APPLICATION FEE:</b></span>
    <br>
    <span class="custome_style_3 mb-5"><b><i>One Time Fee from $350 to $1,500</i></b><br><b><i>(Depending on Size and Complexity)</i></b></span>
    <div class="vl"></div>
  </div>
  <div class="col-md-3 text-center">
    <a href="javascript:;" type="button" onclick="showofferboxpopup(2,'Basic Partner',<?php echo $Tab1_Q1RA['contract_id']; ?>)" class="btn custom-btn mt-30"><span class="text-white font-25">CLICK HERE<br>TO GET<br>STARTED</span></a>
  </div>