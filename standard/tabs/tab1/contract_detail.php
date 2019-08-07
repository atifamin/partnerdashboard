<?php session_start(); ?>

<?php include("../../config/config_awt.php"); ?> 

<?php 

  $FirmID = $_SESSION['dbe_firm_id'];
  $ContractID = $_POST['id'];

  $Tab1_Q1 = "SELECT pc.contract_number, pc.description_of_work, pc.dist_co_rte_pm, pc.award_date
    FROM prime_contractor pc
    JOIN sub_contractor sc ON pc.contract_number = sc.contract_number
    WHERE pc.contract_number = sc.contract_number AND pc.dbe_firm_id = '".$FirmID."' AND pc.contract_id = '".$ContractID."'
    GROUP BY pc.contract_id ORDER BY pc.contract_id DESC";

    $Tab1_Q1R = mysqli_query($con_AWT,$Tab1_Q1) or die(mysqli_error()); 
    $Tab1_Q1RA = mysqli_fetch_array($Tab1_Q1R);
?>
<?php //echo "<pre>"; print_r($Tab1_Q1RA); ?>
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