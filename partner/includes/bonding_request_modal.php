<?php include "../../config/config_main.php"; ?>
<?php 
    $query8 = "SELECT u.business_index_rating,us.task_id,sr.*
    FROM user AS u, user_suretybond_form1 as us, user_suretybonding_request AS sr
    WHERE u.user_id = us.user_id AND u.user_id = sr.bonding_request_user_id AND us.task_id IN ('".$_POST['task_id']."')";
    // $query8 = "SELECT u.business_index_rating,s.`Business Unit Name` as depart_name, s.`Contract Type` as contract_type, s.`PO Total` as po_total, us.type_of_business, us.year_established,us.task_id
    // FROM user as u, scprs_main as s, user_suretybond_form1 as us 
    // WHERE u.user_id = us.user_id AND us.`supplier ID` = s.scprs_record_id AND us.task_id IN ('".$_POST['task_id']."')";
    $res8 = mysqli_query($con_MAIN,$query8);
    $bonding_request_detail = mysqli_fetch_object($res8);
?>
<div class="modal-header" id="bonding-request-modal-header">
  <div class="row">
    <div class="col-md-2">
      <div id="greencircle" data-percent="<?php  echo $bonding_request_detail->business_index_rating; ?>" class="small green percircle animate gt50" style="margin: 7px 0 0 0;">
        <span><?php  echo $bonding_request_detail->business_index_rating; ?>%</span>
        <div class="slice">
          <div class="bar" style="transform: rotate(288deg);">
          </div>
          <div class="fill">
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-2 bg-13">
      <span class="clr-2">BUSINESS<br>RATING<br>INDEX</span>
    </div>
    <div class="col-md-7 col-md-offset-1"> 
      <span class="font-20 clr-1">CONTRACT SPONSOR:<b style="margin-left: 3%;
"><?php  echo $bonding_request_detail->bonding_request_contract_sponosor; ?></b><br>CONTRACT TYPE: <b style="margin-left: 15%;
"><?php  echo $bonding_request_detail->bonding_request_contract_type; ?></b><br>CONTRACT AMOUNT: <b style="margin-left: 4%;
"><?php  echo $bonding_request_detail->bonding_request_contract_amount; ?></b></span>
    </div>
  </div>
</div>
<div class="modal-body bg-bonding-request-modal">
  <div class="row">
    <div class="col-md-12">
      <div class="row bonding-request-modal-margin">
        <div class="col-md-4 bg-11"><strong class="container-1">REQUEST TYPE:</strong></div>
        <div class="col-md-8 bg-12"><strong class="container-1">BID, PERFORMANCE, PAYMENT</strong></div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="row bonding-request-modal-margin">
        <div class="col-md-6">
          <div class="row mb-20">
            <div class="col-md-3 bg-1" style=""><span class="number"><?php  echo $bonding_request_detail->bonding_requestor_years_in_business; ?></span></div>
            <div class="col-md-9 bg-2"><span class="type">YEARS IN BUSINESS</span></div>
          </div>
          <div class="row mb-20">
            <div class="col-md-3 bg-1" style=""><span class="number"><?php echo $bonding_request_detail->bonding_requestor_total_prime_contracts; ?></span></div>
            <div class="col-md-9 bg-2"><span class="type">PRIME CONTRACTS</span></div>
          </div>
          <div class="row mb-20">
            <div class="col-md-3 bg-1" style=""><span class="number"><?php echo $bonding_request_detail->bonding_requestor_total_subcontrats; ?></span></div>
            <div class="col-md-9 bg-2"><span class="type">SUB CONTRACTS</span></div>
          </div>
        </div>
        <div class="col-md-4 col-md-offset-2">
          <div class="row mb-20">
            <div class="col-md-12">
              <div class="row text-center bg-3">
                <div class="col-md-12">
                  <span class="industry">INDUSTRY</span>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-12 bg-4">
                  <span class="industry-type"><?php  echo $bonding_request_detail->bonding_requestor_industry; ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-20">
            <div class="col-md-12">
              <div class="row text-center bg-3">
                <div class="col-md-12">
                  <span class="industry">LICENCES</span>
                </div>
              </div>
              <div class="row text-center">
                <div class="col-md-12 bg-4">
                <?php 
                  $licenses = explode(',', $bonding_request_detail->bonding_requestor_licenses);
                    foreach ($licenses as $license) { ?>
                    <span class="industry-type">
                      <?php echo $license; ?>
                      <br>
                    </span>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-md-12">
      <a href="javascript:;" onclick="confirm_br_modal(<?php  echo $bonding_request_detail->task_id; ?>)" type="button" class="btn bg-btn-pipeline"><span class="text-white font-20">MOVE TO PIPELINE</span></a>
    </div>
  </div>
</div>
<script type="text/javascript">

  function confirm_br_modal(task_id){
    $('#bonding_request_confirm_modal_'+task_id+'').modal('show');
    $('#bonding-request-modal_'+task_id+'').modal('hide');
  }
</script>
