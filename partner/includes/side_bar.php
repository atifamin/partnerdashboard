<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="padding:20px!important;">
        <div class="pull-left image">
          <img src="<?php echo base_url; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" >
          <p><?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname']; ?>
          </p> <p style="font-size:9px;"><?php echo $BusinessName; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php $_FILE_NAME = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']); ?>
      <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
        
        <li style="border-style:solid;border-color:#d8dbdf80;" class="<?php if( $_FILE_NAME == "contract_details.php"){echo "active";} ?>">
          <a href="<?php echo base_url; ?>tabs/contract_details.php">
             <img src="<?php echo base_url; ?>assets/img/a1.png" style="width:40px;" > <b>CONTRACT DETAILS</b>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
          <a href="<?php echo base_url; ?>tabs/financial_services.php">
          <img src="<?php echo base_url; ?>assets/img/c1.png" style="width:40px;"> 
            <b>FINANCIAL SERVICES</b>
			  <p style="margin-left:21%;"> ACCESS TO CAPITAL</p>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        
        <li  style="border-style:solid;border-color:#d8dbdf80;border-top: none;" class="<?php if( $_FILE_NAME == "cash_flow_management.php"){echo "active";} ?>">
          <a href="<?php echo base_url; ?>tabs/cash_flow_management.php">
          <img src="<?php echo base_url; ?>assets/img/b1.png" style="width:40px;">  <b>CASH FLOW MANAGEMENT</b> <br>
			<p style="margin-left:21%;">BEST PRACTICES</p>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li style="border-style:solid;border-color:#d8dbdf80;border-top: none;" class="<?php if( $_FILE_NAME == "wining_contracts.php"){echo "active";} ?>">
          <a href="<?php echo base_url; ?>tabs/wining_contracts.php">
          <img src="<?php echo base_url; ?>assets/img/e1.png" style="width:40px;">  
          <b>WINNING CONTRACTS</b><br>
			<p style="margin-left:21%;">BEST PRACTICES</p> 
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       
        <li style="border-style:solid;border-color:#d8dbdf80;border-top: none;" class="<?php if( $_FILE_NAME == "free_support_services.php"){echo "active";} ?>">
          <a href="<?php echo base_url; ?>tabs/free_support_services.php">
          <img src="<?php echo base_url; ?>assets/img/d1.png" style="width:40px;"> 
            <b>FREE </b><br>
            <p style="margin-left:21%;">SUPPORT SERVICES</p>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background-color:#9e9e9e42;">
      <h1 style="line-height: 1.5;">
        2018 Key Performance Indicators for <br> <?php echo $BusinessName; ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url; ?>dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">