<div class="contract_details_table">
  
</div>

<div class="row mt-10 cus-border">
  <div class="col-md-4 text-center mt-10 mb-10">
    <div class="col-md-12 mb-10 text-white">
      <div class="bg-1"><span class="font-20">YOUR bizVAULT Status</span></div>
    </div>
    <div class="col-md-4"><img src="../assets/img/a13.png" width="80"></div>
    <div class="col-md-8">
      <div class="text-white bg-2 mt-10"><span>Your bizVAULT Contains All <br>
        Needed Documents and <br>
        Files</span></div>
    </div>
    <div class="vl-1"></div>
  </div>
  <div class="col-md-5 text-center">
    <div class="mt-20"> 
      <strong class="font-13 color-3" style="color: #283644;">SURETY SERVICES PROVIDED BY NETWORKS<br>OF SURETY BROKERS AND AGENTS<br></strong>
      <strong class="font-17" style="color: #bd6e56;">SURETY BONDING FOR CALIFORNIA<br>CERTIFIED BUSINESS</strong>
    </div>
    <div class="vl"></div>
  </div>
  <div class="col-md-3 text-center">
    <button type="button" class="btn btn-block btn-lg bg-button mt-10 mb-10" onclick="open_video_modal_bonding_services()">
      <span class="text-white font-13">California Certified Business FastFund</span>
      <br>
      <i class="fab fa-youtube mt-5 font-48"></i>
      <br>
      <span class="text-white font-13">Contact and Invoice Financing</span>
    </button>
  </div>
</div>

<div class="modal fade text-center" id="modal-video-bonding-services">
  <video class="mt-10" width="80%" controls="">
          <source src="<?php echo base_url.$VIDEO_D['video_url_path']; ?>" type="video/mp4">
          Your browser does not support HTML5 video. 
    </video>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  function getFinancingSurety(id){
    var base_url = "<?php echo base_url; ?>";
    $.ajax({
        type: "POST",
        url: ""+base_url+"tabs/tab1/contract_detail_surety.php",
        data: {id:id},
        success:function(data){

          $('.contract_details_table').html(data);
        }
      });
  }

  function open_video_modal_bonding_services() {
    $('#modal-video-bonding-services').modal('show');
    $('#modal-default').scrollTop(0);
  }

</script>