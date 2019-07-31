<?php
include("../config/config_main.php");
?>
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
    <div class="row" style="display:none" id="progress-row">
      <div class="col-md-12">
        <div class="progress progress-sm active">
          <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
            <span class="sr-only">20% Complete</span>
          </div>
        </div>
      </div>
    </div>
      <div class="row bizVaultArticle-row">
        <?php if(isset($_GET['type']) && $_GET['type']=="other_folder"){ ?>
        <div class="col-md-12 top-button-area" >
          <div class="row">
            <div class="col-md-3 col-md-offset-9">
              <form id="file_upload_form" method="post" style="float: left;margin-left: 20%">
                <input type="file" onchange="upload_files()" id="upload_file" name="files[]" multiple style="display: none;">
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

<?php
    $query = "SELECT ra.*, u.user_id,u.user_fname,u.user_lname, u.user_pic, p.partner_name, fff.name as file_folder_name  
      FROM
      request_access as ra, user as u, partner as p, bizvault_files_and_folders as fff
      WHERE
      ra.request_access_user_id = u.user_id AND
      u.partner_id = p.partner_id AND fff.id = ra.request_access_filedoc_id AND ra.request_access_status = 'pending' ";
      $result = mysqli_query($con_MAIN,$query);
      

?>
<div class="modal fade" id="acitivity_model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white text-center" style="height: 60px; background-color: #1F487E; border: none;">
        <h3 class="modal-title">CLOUDBOX ACCESS</h3>
      </div>
      
        <table class="table">
          <thead style="background-color: #17375E;">
            <tr style="font-size: 20px;">
              <th class="text-center text-white b-none" style="">User</th>
              <th class="text-center text-white" style="border: none;">Access</th>
              <th class="text-center text-white" style="border: none;">File/Folder</th>
              <th class="text-center text-white" style="border: none;">Expires</th>
            </tr>
          </thead>
          <tbody class="table">
            <?php while ($row = mysqli_fetch_array($result)) { ?>
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <?php if ($row['user_pic'] != null) { ?>
                          <img src="<?php echo "../..".$row['user_pic']; ?>" style="width: 130%" >
                        <?php }else{ ?>
                          <img src="<?php echo pkanban_url.'images/placeholder.png'; ?>" style="width: 130%" >
                        <?php } ?>
                        
                      </div>
                      <div class="col-md-6">
                        <p style="font-size: 11px;"><?php echo $row['user_fname']." ".$row['user_lname']?></p>
                        <p style="font-size: 11px;"><?php echo $row['partner_name']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td class="text-center" style="color: #45717A; border: none; font-size: 20px;"><?php echo $row['request_access_type']; ?></td>
                  <td class="text-center" style="color: #45717A; border: none; font-size: 20px;"><?php echo $row['file_folder_name']; ?></td>
                  <?php 
                    $expiry_date =  date('l, F d, Y',strtotime(date('Y-m-d').' + '.$row['request_access_length'].' Days'));

                    $current_date = time();
                    $expiry_date1 = strtotime($expiry_date);
                    $datediff =  $expiry_date1 - $current_date;
                    $newDate = round($datediff / (60 * 60 * 24));
                  ?>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong><?php echo $expiry_date; ?></strong></span><br><em style=" color: red;">(Expires in <?php echo $newDate; ?> Day)</em><br><em style="color: #5EB2D5; font-size: 10px;">Click here to change Expiration Date</em></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    
  </div>
</div>
<script type="text/javascript" src="../bower_components/percircle/dist/js/percircle.js"></script>

<script src="../bower_components/iCheck/icheck.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
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