<?php
include("../../config/config_main.php");
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
    <?php if(isset($_COOKIE["error_image_loading"])) { ?>
      <div class="alert alert-danger text-center" role="alert" style="margin: 0 70px;font-size: 18px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?php echo $_COOKIE["error_image_loading"]; ?>
      </div>
    <?php } ?>
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

<?php 
  $q1 = "SELECT bn.*, u.user_fname,u.user_lname, bdfn.bizvault_default_folder_title_text 
  from bizvault_notification as bn, bizvault_default_folder_names as bdfn, user as u 
        where u.user_id = bn.bizvault_notification_inititiated_user_id AND bdfn.bizvault_default_folder_id = bn.bizvault_notification_filedoc_id";
  $res1 = mysqli_query($con_MAIN,$q1);
?>

<div class="modal fade" id="notification_model">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: 0;background-color: #1F487E">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title text-center" style="color: #ffff;">bizVAULT™ Notifications</h3>
      </div>
      <div class="modal-body" style="padding: 0">
        <table class="table table-striped" id="tblGrid">
          <thead>
            <tr style="background-color: #0a274e">
              <th class="text-center" style="color: #fff;font-size: 18px;">Notification Title</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">Requested By User</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">Notification Type</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">Filename</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res1->num_rows == 0) { ?>
             <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }else { ?>
            <?php while ($data = mysqli_fetch_array($res1)) { ?>
            <tr style="background-color: #31859D;border-bottom: 2px solid #1f487e;">
              <td class="text-center" id="custom_table_style"><?php echo $data['bizvault_notification_title']; ?></td>
              <td class="text-center" id="custom_table_style"> <?php echo $data['user_fname']." ".$data['user_lname']; ?></td>
              <td class="text-center" id="custom_table_style"> <?php echo $data['bizvault_notification_type']; ?></td>
              <td class="text-center" id="custom_table_style"> <?php echo $data['bizvault_default_folder_title_text']; ?></td>
              <td class="text-center" id="custom_table_style"> <?php echo date("F d Y",strtotime($data['bizvault_notification_date'])) ?></td>
            </tr>
            <?php } 
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php 
  $q3 = "SELECT ba.*,u.user_fname,u.user_lname,bdfn.bizvault_default_folder_title_text from 
        bizvault_activity as ba, user as u, bizvault_default_folder_names as bdfn
        where u.user_id = ba.bizvault_activity_user_id AND bdfn.bizvault_default_folder_id = ba.bizvault_activity_user_filedoc_id";
  $res3 = mysqli_query($con_MAIN,$q3);
?>

<div class="modal fade" id="access_activity_model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: 0;background-color: #1F487E">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title text-center" style="color: #ffff;">bizVAULT Activity Status</h3>
      </div>
      
      <div class="modal-body" style="padding: 0">
        <table class="table table-striped">
          <thead>
            <tr style="background-color: #0a274e">
              <th class="text-center" style="color: #fff;font-size: 18px;">Activity</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">Name</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">File Name</th>
              <th class="text-center" style="color: #fff;font-size: 18px;">Activity Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res3->num_rows == 0) { ?>
             <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }else { ?>
            <?php while ($row3 = mysqli_fetch_array($res3)) { ?>
            <tr style="background-color: #31859D;">
              <td class="text-center" id="custom_table_style"><?php echo $row3['bizvault_activity_type']; ?></td>
              <td class="text-center" id="custom_table_style"><?php echo $row3['user_fname']." ".$row3['user_lname']; ?></td>
              <td class="text-center" id="custom_table_style"><?php echo $row3['bizvault_default_folder_title_text']; ?></td>
              <td class="text-center" id="custom_table_style"><?php echo date('F-d-Y',strtotime($row3['bizvault_activity_date'])) ?></td>
            </tr>
            <?php } 
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
    $q2 = "SELECT ga.*, u.user_id,u.user_fname,u.user_lname, u.user_pic, p.partner_name, bdfn.bizvault_default_folder_title_text as file_folder_name  
      FROM
      grant_access as ga, user as u, partner as p, bizvault_default_folder_names as bdfn
      WHERE
      ga.grant_access_user_id = u.user_id AND
      u.partner_id = p.partner_id AND bdfn.bizvault_default_folder_id = ga.grant_access_filedoc_id ";

      $res2 = mysqli_query($con_MAIN,$q2);
      

?>
<div class="modal fade" id="acitivity_model">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white text-center" style="height: 60px; background-color: #1F487E; border: none;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title">bizVAULT ACCESS </h3>
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
            <?php if ($res2->num_rows == 0) { ?>
             <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }else { ?>
            <?php while ($row = mysqli_fetch_array($res2)) { ?>
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <?php if ($row['user_pic'] != null) { ?>
                          <img src="<?php echo "../..".$row['user_pic']; ?>" style="width: 130%;border-radius: 30px" >
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
                  <td class="text-center" style="color: #45717A; border: none; font-size: 20px;"><?php echo $row['grant_access_type']; ?></td>
                  <td class="text-center" style="color: #45717A; border: none; font-size: 20px;"><?php echo $row['file_folder_name']; ?></td>
                  <?php 
                    $current_date = time();
                    $expiry_date1 = strtotime($row['grant_access_expiration_date']);
                    $datediff =  $expiry_date1 - $current_date;
                    $newDate = round($datediff / (60 * 60 * 24));
                  ?>
                  <?php 
                    if ($newDate <= 0) { ?>
                  <td class="text-center" style="border: none;"><span style="color: red;">EXPIRED ON <br><strong><?php echo date('l, F d, Y',strtotime($row['grant_access_expiration_date'])); ?></strong></span><br><em style="color: #5EB2D5; font-size: 10px;">Click here to change Expiration Date</em></td>
                  <?php 
                    }else{ ?>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong><?php echo date('l, F d, Y',strtotime($row['grant_access_expiration_date'])); ?></strong></span><br><em style=" color: red;">(Expires in <?php echo $newDate; ?> Day)</em><br><em style="color: #5EB2D5; font-size: 10px;">Click here to change Expiration Date</em></td>
                  <?php 
                    } ?>
              </tr>
            <?php } 
            } ?>
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
    load_folder($user_id,'<?=$_GET['folder']?>');
    $('#summary_preview').show();
  <?php }else{ ?>
    load_content($user_id);
    $('#summary_preview').hide();
  <?php } ?>
</script>