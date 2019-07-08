<?php
include("../includes/header.php");
include("../includes/top_nav.php");
//include("../includes/side_bar.php");
//include("../functions/functions.php");
?>
<link rel="stylesheet" href="../assets/css/bizVault.css">
<div class="row main-area">
  <header class="logo-area"><img src="../assets/img/dummy-logo.jpg" alt="" width="150"></header>
  <section class="bizVaultSection">
    <?php include("bizVault/side-bar.php") ?>
    <article class="bizVaultArticle">
      <div class="row bizVaultArticle-row">
        <div class="col-md-12 top-button-area" align="right"> <a class="btn btn-primary upload-button"><i class="fa fa-file-upload"></i>&nbsp;&nbsp;Upload</a> <a class="new-folder-button"><i class="fa fa-folder"></i>&nbsp;&nbsp;New Folder</a> </div>
        <div class="col-md-12 top-search-bar-area">
          <div class="col-md-6">
            <p><i class="fa fa-folder top-search-bar-area-folder"></i>&nbsp&nbspHome</p>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control search-input" placeholder="Search">
          </div>
        </div>
        <div class="col-md-9 main-folders-area">
          <?php for($i=1; $i<=4; $i++): ?>
          <div class="col-md-12 main-folder-area-title">
            <p><span>Business Files/Documents</span></p>
          </div>
          <?php for($ii=1; $ii<=4; $ii++): ?>
          <div class="col-md-12 folder">
            <div class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div>
            <div class="col-md-10 main-folder-area-content">
              <h3>Basic Business Financials</h3>
              <p>Updated 3 days ago by testOne 17.5MB</p>
            </div>
          </div>
          <?php endfor; endfor; ?>
        </div>
        <div class="col-md-3 main-preview-area">Preview Area</div>
      </div>
    </article>
  </section>
  <footer class="bizVaultFooter">
    <p>Footer</p>
  </footer>
</div>
<?php include("../includes/footer.php"); ?>
