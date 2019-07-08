<!DOCTYPE html>
<html>
<?php include "inc/head.php"; ?>

<link rel="stylesheet" href="assets/css/style.css">
<style>
@media screen and (min-width: 1400px) {
#indAvg{margin-top:42%!important;}
}
</style>
<?php include "inc/header.php"; ?>
<?php include "inc/asidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color: #D8DBE0; height: 81px;">
      <?php 
        $partner_id = $_SESSION['partner_id'];
        $q = 'select * from partner where `partner_id`= '.$partner_id.' ';
        $row = mysqli_query($con_MAIN,$q);
        $res = mysqli_fetch_object($row);
        //print_r($res->partner_description);exit;
       ?> 
      <h1>
          <?php 
            echo $res->partner_description;
          ?>
      </h1>
      <h4>
          <?php 
            echo $res->partner_name;
          ?>
      </h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
                  
                    <h3 class="page-title"> Your Key Performance Indicators</h3>                    
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <?php include "includes/kpi.php"; ?>
               
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1--> 
                    <div class="row">
                      <div class="col-md-4 col-lg-4 col-sm-12">
                          <?php include "includes/state_spend.php"; ?>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-12">
                          <?php include "includes/top_sectors.php"; ?>
                        </div>
                    </div>    
                    
                    <div class="row">
                      <div class="col-md-8 col-sm-6">
              <?php include "includes/product_statistics.php"; ?>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <!-- BEGIN Portlet PORTLET-->
                  <div class="portlet box green">
                    <div class="portlet-title">
                      <div class="caption"> Loan Volume </div>
                      <div class="tools">
                        <a href="javascript:;" class="collapse"> </a> 
                      </div>
                    </div>
                    <div class="portlet-body">
                      <div id="chart_5" class="chart" style="height: 230px;"> </div>
                    </div>
                  </div>
                  <!-- END Portlet PORTLET-->
                </div>
                <div class="col-md-6 col-sm-6">
                  <!-- BEGIN Portlet PORTLET-->
                  <div class="portlet box green">
                    <div class="portlet-title">
                      <div class="caption"> Total Originated </div>
                      <div class="tools">
                        <a href="javascript:;" class="collapse"> </a> 
                      </div>
                    </div>
                    <div class="portlet-body">
                      <div id="chart_1" class="chart" style="height: 230px;"> </div>
                    </div>
                  </div>
                  <!-- END Portlet PORTLET-->
                </div>  
              </div>
            </div>
                        <div class="col-md-4 col-sm-6">
                          <?php include "includes/product_details.php"; ?>
                        </div>
                    </div>          
               

        <!-- END CONTAINER -->
    <?php include "includes/edit_popup.php"; ?>
    <?php include "includes/add_new_offer.php"; ?>


  
</section>
      </div>
      

    
   
    

 <?php include "inc/footer.php"; ?>
