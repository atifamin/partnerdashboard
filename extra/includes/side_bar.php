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
      <ul class="sidebar-menu" data-widget="tree" >
        
        <li >
          <a href="<?php echo base_url; ?>tabs/contract_details.php">
             <i class="fa fa-fw fa-file"></i>  <b>Contract Details</b>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        
        <li>
          <a href="<?php echo base_url; ?>tabs/cash_flow_management.php">
            <i class="fa fa-fw fa-dollar"></i> <b>CASH FLOW MANAGEMENT</b> <br>
			<p style="margin-left:11%;">BEST PRACTICES</p>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url; ?>tabs/financial_services.php">
            <i class="fa fa-fw fa-institution"></i>
            <b>FINANCIAL SERVICES</b>
			  <p style="margin-left:11%;"> ACCESS TO CAPITAL</p>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li >
          <a href="<?php echo base_url; ?>tabs/tab4_free_support_services.php">
            <i class="fa fa-fw fa-male"></i>
            <b>FREE SUPPORT SERVICES</b>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li >
          <a href="<?php echo base_url; ?>tabs/wining_contracts.php">
            <i class="fa fa-fw fa-users"></i> <b>WINNING CONTRACTS</b><br>
			<p style="margin-left:11%;">BEST PRACTICES</p> 
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
    <section class="content-header">
      <h1>
        2018 Key Performance Indicators for <?php echo $BusinessName; ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">