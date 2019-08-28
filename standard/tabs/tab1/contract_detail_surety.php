<?php session_start(); ?>

<?php include("../../../config/config_main.php"); ?> 

<?php 

  $FirmID = $_SESSION['dbe_firm_id'];
  $ContractID = $_POST['id'];

  $Tab1_Q1 = "SELECT *
      FROM prime_contractor pc
      WHERE pc.dbe_firm_id = '".$FirmID."' AND pc.contract_id = '".$ContractID."'
      ORDER BY pc.contract_id DESC";
  // $Tab1_Q1 = "SELECT pc.contract_number, pc.description_of_work, pc.dist_co_rte_pm, pc.award_date
  //   FROM prime_contractor pc
  //   JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
  //   WHERE pc.contract_number = sc.contract_number AND pc.dbe_firm_id = '".$FirmID."' AND pc.contract_id = '".$ContractID."'
  //   GROUP BY pc.contract_id ORDER BY pc.contract_id DESC";

    $Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error()); 
    $Tab1_Q1RA = mysqli_fetch_array($Tab1_Q1R);
?>
<?php //echo "<pre>"; print_r($Tab1_Q1RA); ?>
<div class="row">
  <div class="col-lg-8 col-xs-12">
    <div class="box"> 
      
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover modal-financing-table" id="">
          <tbody>
            <tr>
                <td id="l-height">Contract Number</td>
                <td id="l-height"><strong><?php echo $Tab1_Q1RA['contract_number']; ?></strong></td>
            </tr>
            <tr>
              <td id="l-height">Description</td>
              <td id="l-height"><strong><?php echo $Tab1_Q1RA['description_of_work']; ?></strong></td>
            </tr>
            <tr>
              <td id="l-height">Location</td>
              <td id="l-height"><strong><?php echo $Tab1_Q1RA['dist_co_rte_pm']; ?></strong></td>
            </tr> 
            <tr>
              <td id="l-height">Bid Win Date</td>
              <td id="l-height"><strong><?php echo date('M d, Y',strtotime($Tab1_Q1RA['award_date'])); ?></strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body --> 
    </div>
    <!-- /.box --> 
    
  </div>
  <div class="col-lg-4 col-xs-12" align="center">
    <div class="div-cont-amount">
      <div class="row" style="background-color: #201b11; margin: unset;">
        <div class="col-md-12">
          <span style="color: #868574; font-size: 18px;">CONTRACT AMOUNT</span>
        </div>
      </div>
      <?php $award_amount = (10 / 100) * $Tab1_Q1RA['award_amount']; ?>
      <span class="container">$<?php echo number_format($award_amount,0); ?></span>
    </div>
    
  </div>
</div>
<div class="row cus-border mt-10">
  <div class="col-md-4 text-center">
    <div class="mt-30"><span class="font-30 color-1">SURETY BONDING</span> </div>
  <a href="javascript:;" onclick="showofferboxpopupSurety(2,'Premium Surety Partner',<?php echo $Tab1_Q1RA['contract_id']; ?>)" class="btn mb-10 mt-10" style="background-color: #642524;"><span class="text-white">REQUEST BONDING</span></a>
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
      <a href="javascript:;" onclick="showofferboxpopupSurety(2,'Premium Surety Partner',<?php echo $Tab1_Q1RA['contract_id']; ?>)" type="button" class="btn custom-btn-1 mt-10"><span class="text-white font-25">CLICK HERE<br>TO GET<br>STARTED</span></a>
    </div>
  </div>
</div>