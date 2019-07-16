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
<link rel="stylesheet" href="../bower_components/iCheck/all.css">
<link rel="stylesheet" href="../bower_components/percircle/dist/css/percircle.css">
<link rel="stylesheet" href="../assets/css/bizVault.css">
<input type="hidden" value="<?php echo base_url; ?>" id="base_url">
<input type="hidden" value="<?php echo pkanban_url; ?>" id="pkanban_url">
<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user_id">
<input type="hidden" value="0" id="parent_id">
<input type="hidden" value="<?php echo $parent_id; ?>" id="bizvault_files_and_folders_id">
<div class="row main-area">
  <header class="logo-area" >
    <div class="row" id="company_logo_content"></div>
  </header>
  <section class="bizVaultSection">
    <?php include("bizVault/side-bar.php");?>
    <article class="bizVaultArticle">
      <div class="row bizVaultArticle-row">
        <?php if(isset($_GET['type']) && $_GET['type']=="other_folder"){ ?>
        <div class="col-md-12 top-button-area" >
          <div class="row">
            <div class="col-md-3 col-md-offset-9">
              <form id="file_upload_form" method="post" style="float: left;margin-left: 20%">
                <input type="file" id="upload_file" name="files[]" multiple style="display: none;">
                <a onclick="document.getElementById('upload_file').click(); return false" class="btn btn-primary upload-button"><i class="fa fa-file-upload"></i>&nbsp;&nbsp;Upload
                </a> 
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="bizvault_files_and_folders_id" value="<?php echo $parent_id; ?>">
              </form>
              <a href="javascript:create_folder()" style="float: right;margin: 2% 5% 0 0;" class="new-folder-button"><i class="fa fa-folder"></i>&nbsp;&nbsp;New Folder</a>
            </div>
          </div>
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
        
        <div class="col-md-3 main-preview-area">
         <div id="summary_preview"></div>
        </div>
      </div>
    </article>
  </section>
  <footer class="bizVaultFooter" style="height: 40px;">
    <p>App Software © 2018 ExaVault ® Inc. | Contents © 2018 Orpha Inc</p>
  </footer>
</div>

<div class="modal fade" id="notification_model">
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
<div class="modal fade" id="access_activity_model">
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
<div class="modal fade" id="acitivity_model">
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
<script type="text/javascript" src="../bower_components/percircle/dist/js/percircle.js"></script>

<script src="../bower_components/iCheck/icheck.min.js"></script> 
<script src="../assets/js/bizVault.js"></script>
<?php include("../includes/footer3.php"); ?>
<script>
  <?php if(isset($_GET['type']) && $_GET['type']=="other_folder"){ ?>
    load_other_folder($user_id, $("#parent_id").val());
  <?php }elseif(isset($_GET['folder'])){ ?>
    load_folder($user_id, $("#bizvault_files_and_folders_id").val(), '<?=$_GET['folder']?>');
    $('#summary_preview').show();
  <?php }else{ ?>
    load_content($user_id);
    $('#summary_preview').hide();
  <?php } ?>
</script>