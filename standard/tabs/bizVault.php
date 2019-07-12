<?php
include("../includes/header.php");
include("../includes/top_nav.php");
$parent_id = 0;
if(isset($_GET['type']) && $_GET['type']=="other_folder"){

  $parent_id = 4;
}

if(isset($_GET['type']) && $_GET['type']=="business_folder"){
 
  $parent_id = 1;
}
?>
<style type="text/css">
  td#custom_table_style{
    font-size: 20px;
    color: #ffff;
    border: #0b24d6
  }
  .text-white{
    color: white;
  }
  .container {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
}
</style>

<input type="hidden" value="<?php echo base_url; ?>" id="base_url">
<input type="hidden" value="<?php echo pkanban_url; ?>" id="pkanban_url">
<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user_id">
<input type="hidden" value="0" id="parent_id">
<input type="hidden" value="<?php echo $parent_id; ?>" id="business_folder_type_id">
<link rel="stylesheet" href="../bower_components/iCheck/all.css">
<link rel="stylesheet" href="../assets/css/bizVault.css">
<div class="row main-area">
  <header class="logo-area" >
    <!-- <img src="../assets/img/dummy-logo.jpg" alt="" width="150"> -->
    <div class="row" id="company_logo_content">
      <!-- <div class="col-md-1" style="width: 6%"> -->
        <!-- <div style="width: 50px;height: 50px;border-radius: 25px;background: #0f7cbb;">
          <span style="color: #ffff;position: relative;margin-left: 13px;top:13px">HCL</span>
        </div> -->
        <!-- <img style="width: 50px;border-radius: 25px" src="<?php //echo pkanban_url."uploads/face1.jpg"; ?>">
      </div>
      <div class="col-md-4" style="padding-left: 0;font-size:13px">
        <span>Anurag Singh</span>
        <br><span style="font-size: 18px">DREAMBUILDER CONSTRUCTION CORP</span>
      </div> -->
    </div>
  </header>
  <section class="bizVaultSection">
    <?php include("bizVault/side-bar.php");?>
    <article class="bizVaultArticle">
      <div class="row bizVaultArticle-row">
        <?php if(isset($_GET['type']) && $_GET['type']=="other_folder"){ ?>
        <div class="col-md-12 top-button-area" align="right">
          <input type="file" id="upload_file" name="file[]" multiple style="display: none;">
          <a onclick="document.getElementById('upload_file').click(); return false" class="btn btn-primary upload-button"><i class="fa fa-file-upload"></i>&nbsp;&nbsp;Upload
          </a> <a href="javascript:create_folder()" class="new-folder-button"><i class="fa fa-folder"></i>&nbsp;&nbsp;New Folder</a>
        </div>
        <?php } ?>
        <div class="col-md-12 top-search-bar-area">
          <div class="col-md-6">
            <p id="bread_crum" style="cursor:pointer;" onclick="open_home_page()"><i class="fa fa-folder top-search-bar-area-folder"></i>&nbsp&nbspHome</p>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control search-input" placeholder="Search">
          </div>
        </div>
        
          <div class="col-md-9 main-folders-area" id="main_content">
          </div>
        
        <div class="col-md-3 main-preview-area" style="">
          <div class="row text-center" style="background-color: #4E80C6;">
            <div class="col-md-12">
              <span class="text-white" style="font-size: 40px;">3</span><span style="font-size: 35px; color: #A9D8F4"> FILES MISSING</span>
            </div>
          </div>
          <div class="row text-center" style="background-color: #C0504E">
            <div class="col-md-12">
              <span class="text-white" style="font-size: 20px;">PLEASE UPLOAD<br> MISSING FILES</span>
            </div>
          </div>
          <div class="row" style="background-color:#F2F2F2">
            <div class="col-md-12">
              <img src="<?php echo pkanban_url.'images/progres.png'; ?>" style="width: 115%" >
            </div>
          </div>
        </div>
      </div>
    </article>
  </section>
  <footer class="bizVaultFooter">
    <p>Footer</p>
  </footer>
</div>

<div class="modal" id="notification_model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: 0;background-color: #1F487E">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title text-center" style="color: #ffff;">CLOUDBOX NOTIFICATIONS</h3>
      </div>
      <div class="modal-body" style="padding: 0">
        <table class="table table-striped" id="tblGrid">
          <tbody>
            <tr style="background-color: #31859D;">
              <td class="text-center" id="custom_table_style">Notification Title</td>
              <td class="text-center" id="custom_table_style"> Notification Date/Time</td>
            </tr>
             <tr style="background-color: #1F5A68;">
              <td class="text-center" id="custom_table_style">Notification Title</td>
              <td class="text-center" id="custom_table_style"> Notification Date/Time</td>
            </tr>
            <tr style="background-color: #31859D;">
              <td class="text-center" id="custom_table_style">Notification Title</td>
              <td class="text-center" id="custom_table_style"> Notification Date/Time</td>
            </tr>
             <tr style="background-color: #1F5A68;">
              <td class="text-center" id="custom_table_style">Notification Title</td>
              <td class="text-center" id="custom_table_style"> Notification Date/Time</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="access_activity_model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: 0;background-color: #1F487E">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title text-center" style="color: #ffff;">CLOUDBOX ACCESS ACTIVITY</h3>
      </div>
      <div class="modal-body" style="padding: 0">
        <table class="table table-striped">
          <tbody>
            <tr style="background-color: #31859D;">
              <td class="text-center" id="custom_table_style">Activity Type</td>
              <td class="text-center" id="custom_table_style">User Name</td>
              <td class="text-center" id="custom_table_style">Date/Time</td>
            </tr>
             <tr style="background-color: #1F5A68;">
              <td class="text-center" id="custom_table_style">Activity Type</td>
              <td class="text-center" id="custom_table_style">User Name</td>
              <td class="text-center" id="custom_table_style">Date/Time</td>
            </tr>
            <tr style="background-color: #31859D;">
              <td class="text-center" id="custom_table_style">Activity Type</td>
              <td class="text-center" id="custom_table_style">User Name</td>
              <td class="text-center" id="custom_table_style">Date/Time</td>
            </tr>
             <tr style="background-color: #1F5A68;">
              <td class="text-center" id="custom_table_style">Activity Type</td>
              <td class="text-center" id="custom_table_style">User Name</td>
              <td class="text-center" id="custom_table_style">Date/Time</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="acitivity_model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="text-align: center; color: white; height: 60px; background-color: #1F487E; border: none;">
        <h3 class="modal-title">CLOUDBOX ACCESS</h3>
      </div>
      
        <table class="table">
          <thead style="background-color: #17375E;">
            <tr>
              <th style="color: white; text-align: center; border: none; font-size: 20px;">User</th>
              <th style="color: white; text-align: center; border: none; font-size: 20px;">Access</th>
              <th style="color: white; text-align: center; border: none; font-size: 20px;">File/Folder</th>
              <th style="color: white; text-align: center; border: none; font-size: 20px;">Expires</th>
            </tr>
          </thead>
          <tbody class="table">
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?php echo pkanban_url.'images/placeholder.png'; ?>" style="width: 130%" >
                      </div>
                      <div class="col-md-6">
                        <span style="font-size: 10px;">First Name<br>Last Name<br>Company/Org</span>
                      </div>
                    </div>
                  </td>
                  <td style="text-align: center; color: #45717A; border: none; font-size: 20px;">VIEW ONLY</td>
                  <td style="text-align: center; color: #45717A; border: none; font-size: 20px;">Basic<br>Business Financials</td>
                  <td style="text-align: center; border: none;"><span style="color: #45717A;"><strong>Monday, August 12, 2019</strong></span><br><span style=" color: red;font-style: italic;">(Expires in 1 Day)</span><br><span style="color: #5EB2D5; font-size: 10px; font-style: italic;">Click here to change Expiration Date</span></td>
              </tr>
              <tr style="background-color:  #92CDDE">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?php echo pkanban_url.'images/placeholder.png'; ?>" style="width: 130%" >
                      </div>
                      <div class="col-md-6">
                        <span style="font-size: 10px;">First Name<br>Last Name<br>Company/Org</span>
                      </div>
                    </div>
                  </td>
                  <td style="text-align: center; color: #45717A; border: none; font-size: 20px;">VIEW ONLY</td>
                  <td style="text-align: center; color: #45717A; border: none; font-size: 20px;">Basic<br>Business Financials</td>
                  <td style="text-align: center; border: none;"><span style="color: #45717A;"><strong>Monday, August 12, 2019</strong></span><br><span style=" color: red;font-style: italic;">(Expires in 1 Day)</span><br><span style="color: #5EB2D5; font-size: 10px; font-style: italic;">Click here to change Expiration Date</span></td>
              </tr>
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?php echo pkanban_url.'images/placeholder.png'; ?>" style="width: 130%" >
                      </div>
                      <div class="col-md-6">
                        <span style="font-size: 10px;">First Name<br>Last Name<br>Company/Org</span>
                      </div>
                    </div>
                  </td>
                  <td style="text-align: center; color: #45717A; border: none; font-size: 20px;">VIEW ONLY</td>
                  <td style="text-align: center; color: #45717A; border: none; font-size: 20px;">Basic<br>Business Financials</td>
                  <td style="text-align: center; border: none;"><span style="color: #45717A;"><strong>Monday, August 12, 2019</strong></span><br><span style=" color: red;font-style: italic;">(Expires in 1 Day)</span><br><span style="color: #5EB2D5; font-size: 10px; font-style: italic;">Click here to change Expiration Date</span></td>
              </tr>
          </tbody>
        </table>
      </div>
    
  </div>
</div>

<script src="../bower_components/iCheck/icheck.min.js"></script> 
<script src="../assets/js/bizVault.js"></script>
<?php include("../includes/footer.php"); ?>
<script>
  <?php if(isset($_GET['type']) && $_GET['type']=="other_folder"){ ?>
    load_other_folder($user_id, $("#parent_id").val());
  <?php }elseif(isset($_GET['type']) && $_GET['type']=="business_folder"){ ?>
    load_business_folder($user_id, $("#business_folder_type_id").val(), '<?=$_GET['files_type']?>');
  <?php }else{ ?>
    load_content($user_id);
  <?php } ?>

  $(document).ready(function(){
    pkanban_url = $("#pkanban_url").val();
    var user_id = $("#user_id").val();
    $.post(""+pkanban_url+"file_manager/load_company_logo", {user_id:user_id}).done(function(e){
        $("#company_logo_content").html(e);
    }); 
  });
  
  function refresh_folder_content(){
    location.reload(); 
  }

  function notification(){
    $('#notification_model').modal('show');
  }

  function access_activity(){
    $('#access_activity_model').modal('show');
  }

  function activity(){
    $('#acitivity_model').modal('show');
  }

  $('#upload_file').on('change',function(e){
    e.preventDefault();
    var names = [];
    for (var i = 0; i < $(this).get(0).files.length; ++i) {
        names.push($(this).get(0).files[i]);
    }
   // var formData = new FormData();
    // console.log(names);
    // return false;
    $.ajax({
      type: "POST",
      url: ""+pkanban_url+"file_manager/upload_file",
      data: {names:names},
      success:function(data){
        console.log(data);
      }
    });
    // $.post(""+pkanban_url+"file_manager/upload_file",{names:names}).done(function(data){
    //   console.log(data);
    // });
  });

</script>