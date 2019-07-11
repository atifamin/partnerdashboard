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
    </div>
  </header>
  <section class="bizVaultSection">
    <?php include("bizVault/side-bar.php");?>
    <article class="bizVaultArticle">
      <div class="row bizVaultArticle-row">
        <?php if(isset($_GET['type']) && $_GET['type']=="other_folder"){ ?>
        <div class="col-md-12 top-button-area" align="right">
        <a class="btn btn-primary upload-button"><i class="fa fa-file-upload"></i>&nbsp;&nbsp;Upload</a> <a href="javascript:create_folder()" class="new-folder-button"><i class="fa fa-folder"></i>&nbsp;&nbsp;New Folder</a>
        </div>
        <?php } ?>
        <div class="col-md-12 top-search-bar-area">
          <div class="col-md-6">
            <p style="cursor:pointer;" onclick="open_home_page()"><i class="fa fa-folder top-search-bar-area-folder"></i>&nbsp&nbspHome</p>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control search-input" placeholder="Search">
          </div>
        </div>
        
          <div class="col-md-9 main-folders-area" id="main_content">
          </div>
        
        <div class="col-md-3 main-preview-area">Preview Area</div>
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
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table>
          <tbody class="table">
              <tr>
                  <td>Content Here</td>
              </tr>
              <tr>
                  <td>Content Here</td>
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
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table>
          <tbody class="table">
              <tr>
                  <td>Content Here</td>
              </tr>
              <tr>
                  <td>Content Here</td>
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
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table>
          <tbody class="table">
              <tr>
                  <td>Content Here</td>
              </tr>
              <tr>
                  <td>Content Here</td>
              </tr>
          </tbody>
        </table>
      </div>
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
</script>