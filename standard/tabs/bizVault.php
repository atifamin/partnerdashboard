<?php
include("../includes/header.php");
include("../includes/top_nav.php");
?>

<input type="hidden" value="<?php echo base_url; ?>" id="base_url">
<input type="hidden" value="<?php echo pkanban_url; ?>" id="pkanban_url">
<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" id="user_id">
<input type="text" value="0" id="parent_id">
<input type="text" value="0" id="business_folder_type_id">
<link rel="stylesheet" href="../bower_components/iCheck/all.css">
<link rel="stylesheet" href="../assets/css/bizVault.css">
<div class="row main-area">
  <header class="logo-area"><img src="../assets/img/dummy-logo.jpg" alt="" width="150"></header>
  <section class="bizVaultSection">
    <?php include("bizVault/side-bar.php") ?>
    <article class="bizVaultArticle">
      <div class="row bizVaultArticle-row">
        <div class="col-md-12 top-button-area" align="right"> <a class="btn btn-primary upload-button"><i class="fa fa-file-upload"></i>&nbsp;&nbsp;Upload</a> <a href="javascript:create_folder()" class="new-folder-button"><i class="fa fa-folder"></i>&nbsp;&nbsp;New Folder</a> </div>
        <div class="col-md-12 top-search-bar-area">
          <div class="col-md-6">
            <p><i class="fa fa-folder top-search-bar-area-folder"></i>&nbsp&nbspHome</p>
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
<div class="modal fade" id="create_folder_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" style="padding:5% 10%;">
        <div class="form-group">
          <div class="row" id="load_main_folders_inputs"> </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="checkMainFolder()">Create Folder</button>
      </div>
    </div>
  </div>
</div>
<script src="../bower_components/iCheck/icheck.min.js"></script> 
<script src="../assets/js/bizVault.js"></script>
<?php include("../includes/footer.php"); ?>
































<script type="text/javascript">
  
  $('document').ready(function() {
    $('.bizVaultNav').css({'height': $('.bizVaultArticle').outerHeight()});
});

</script>