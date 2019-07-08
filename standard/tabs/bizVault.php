<?php
include("../includes/header.php");
include("../includes/top_nav.php");
//include("../includes/side_bar.php");
include("../functions/functions.php");
?>
<link rel="stylesheet" href="../assets/css/bizVault.css">
<div class="row main-area">
<header class="logo-area"><img src="../assets/img/dummy-logo.jpg" alt="" width="150"></header>
    <section class="bizVaultSection">
      <?php include("bizVault/side-bar.php") ?>
      <article class="bizVaultArticle">
        <div class="row">
            <div class="col-md-12">button bar</div>
            <div class="col-md-12">search bar</div>
            <div class="col-md-9">Main Area</div>
            <div class="col-md-3">Preview Area</div>
        </div>
      </article>
    </section>
    <footer class="bizVaultFooter">
      <p>Footer</p>
    </footer>
</div>
<?php
include("../includes/footer.php");
?>
