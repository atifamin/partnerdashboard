<?php 
  $VIDEO_QUERY = "select * from funding_video";
  $VIDEO_R = mysqli_query($con_MAIN,$VIDEO_QUERY) or die(mysqli_error()); 
  $VIDEO_D =  mysqli_fetch_assoc($VIDEO_R);
?>

<div class="row cus-border">
  <div class="col-md-4 text-center">
    <div class="mt-20">
      <span class="font-35 color-1">Contract Financing<br>$25,000 - $5000,000</span>
    </div>
    <a href="javascript:;" onclick="showofferboxpopup(2,'Basic Partner')" class="btn mb-10 mt-5 bg-button" style="padding: 3px 20px 3px 20px;"><span class="text-white font-25">REQUEST FINANCING</span></a>
    <div class="vl"></div>
  </div>
  <div class="col-md-5 text-center">
    <span class="mt-20" style="color: #905205;font-size: 15px;"><b>(UPON CONTRACT SPONSOR OR PRIME</b><br><b>CONTRACTOR'S PAYMENT OF INVOICE)</b></span>
    <table class="color-2 w-80" align="center">
      <tr class="text-left">
        <td class="custome_style_3"><b>FINANCING TYPE:</b></td>
        <td class="custome_style_3"><b>CONTACT FINANCING</b></td>
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
    <a href="javascript:;" type="button" onclick="showofferboxpopup(2,'Basic Partner')" class="btn custom-btn mt-30"><span class="text-white font-25">CLICK HERE<br>TO GET<br>STARTED</span></a>
  </div>
</div>
<div class="row mt-10 cus-border">
  <div class="col-md-4 text-center mt-10 mb-10">
    <div class="col-md-12 mb-10 text-white">
      <div class="bg-1"><span class="font-20">YOUR bizVAULT Status</span></div>
    </div>
    <div class="col-md-4"><img src="../assets/img/a13.png" width="80"></div>
    <div class="col-md-8">
      <div class="text-white bg-2 mt-10"><span>Your bizVAULT Contains All<br>
        Needed Documents and <br>
        Files</span>
      </div>
    </div>
    <div class="vl-1"></div>
  </div>
  <div class="col-md-5 text-center">
    <div class="mt-10">
      <span class="mt-10 custome_style"><b>FINANCING PROVIDED BY NETWORK</b><br>
      <b>OF PRIVATE AND PUBLIC PARTNERS</b></span><br>
      <span class="custome_style_1"><b>Contract and Invoice Financing</b></span><br>
      <span class="custome_style_2"><i><b>Solution for your california Certified Business</b></i></span>
    </div>
    <div class="vl-1" style="margin-top: 10px;"></div>
  </div>
  <div class="col-md-3 text-center">
    <button type="button" class="btn btn-lg bg-button mt-15" onclick="open_video_modal()">
      <span class="text-white font-13">California Certified Business FastFund</span>
      <br>
      <i class="fab fa-youtube mt-5 font-48"></i>
      <br>
      <span class="text-white font-13">Contact and Invoice Financing</span>
    </button>
  </div>
  <div class="col-md-12">
    <hr class="new5">
  </div>
    <br>
  <div class="row mb-10">
    <div class="col-md-6 text-center">
      <a href="" role="button" data-toggle="modal"><img src="../assets/img/FastFund_Wheel_Final.jpg" width="60%" onclick="open_cycle_modal()"></a></div>
    <div class="col-md-6 text-center">
      <a href="" role="button" data-toggle="modal"><img src="../assets/img/How_it_Works.jpg" width="80%" class="mt-10" onclick="open_works_modal()"></a></div>
  </div>
</div>

<div class="modal fade text-center" id="modal-video">
  <video class="mt-10" width="80%" controls="">
    <source src="<?php echo base_url.$VIDEO_D['video_url_path']; ?>" type="video/mp4">
    Your browser does not support HTML5 video. 
  </video>
</div>

<div class="modal fade text-center" id="modal-img-cycle">
  <img src="../assets/img/FastFund_Wheel_Final.jpg" class="mt-10" width="50%">
</div>

<div class="modal fade text-center" id="modal-img-works">
  <img src="../assets/img/How_it_Works.jpg" class="mt-10" width="70%">
</div>

<script type="text/javascript">
  function open_video_modal() {
    $('#modal-video').modal('show');
    $('#modal-default').scrollTop(0);
  }
  function open_cycle_modal() {
    $('#modal-img-cycle').modal('show');
    $('#modal-default').scrollTop(0);
  }

  function open_works_modal() {
    $('#modal-img-works').modal('show');
    $('#modal-default').scrollTop(0);
  }
</script>