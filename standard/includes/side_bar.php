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
        <!-- <li class="sidebar-menu-header">EXAMPLES</li> -->
        <li class="sidebar-li <?php if( $_FILE_NAME == "contract_details.php"){echo "active";} ?>" style="border-style:solid;border-color:#d8dbdf80;"> <a href="<?php echo base_url; ?>tabs/contract_details.php">
            <div class="sidebar-menu-header">HOME - MAIN DASHBOARD</div>
            <div class="sidebar-menu-desc"> <img src="<?php echo base_url; ?>assets/img/a1.png" style="width:40px;" > <b>CONTRACT DETAILS</b> </div>
            </a> </li>
        <li class="sidebar-li <?php if( $_FILE_NAME == "contract_destails.php"){echo "active";} ?>" style="border-style:solid;border-color:#d8dbdf80;"> <a href="javascript:;">
            <div class="sidebar-menu-header">YOUR BUSINESS PROFILE</div>
            <div class="sidebar-menu-desc">
            <div class="row">    
            <div class="col-md-4" style="padding-left: 10px;padding-top: 10px;">
                <img src="<?php echo base_url; ?>assets/img/a2.png" style="width:60px;" >
                </div>
                <div class="col-md-8" style="padding-left:0px;" align="center">
                <button class="btn btn-sm btn-primary" style="background-color: #77933c;border-color: #77933c;"><?php echo $BNShortForm; ?></button>
                <p style="text-align:center;white-space: initial;"><?php echo ucwords(strtolower($BusinessName)); ?></p>
                </div>
                </div>
            </div>
            </a> </li>
            <li class="sidebar-li <?php if( $_FILE_NAME == "bizVault.php"){echo "active";} ?>" style="border-style:solid;border-color:#d8dbdf80;"> <a href="<?php echo base_url; ?>tabs/bizVault.php">
            <div class="sidebar-menu-header">BUSINESS SUCCESS TOOLS</div>
            <div class="sidebar-menu-desc">
            <div class="row">    
                <div class="col-md-4">
                <img src="<?php echo base_url; ?>assets/img/a3.png" style="width:70px;" >
                </div>
                <div class="col-md-6" style="padding-left:0px;">
                <p style="text-align:center;">
                Access your
                <br>bizVault<sup>TM</sup>
                </p>
                </div>
                </div>
            </div>
            </a> </li>
        <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="sidebar-li <?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>"> <a href="<?php echo base_url; ?>tabs/financial_services.php">
            <div class="sidebar-menu-desc"> <img src="<?php echo base_url; ?>assets/img/c1.png" style="width:40px;"> <b>FINANCIAL SERVICES</b>
            <p style="margin-left:21%;"> ACCESS TO CAPITAL</p>
            </div>
            </a> </li>
        <li  style="border-style:solid;border-color:#d8dbdf80;border-top: none;" class="sidebar-li <?php if( $_FILE_NAME == "cash_flow_management.php"){echo "active";} ?>"> <a href="<?php echo base_url; ?>tabs/cash_flow_management.php">
            <div class="sidebar-menu-header">OTHER RESOURCES</div>
            <div class="sidebar-menu-desc"> <img src="<?php echo base_url; ?>assets/img/b1.png" style="width:40px;"> <b>CASH FLOW MANAGEMENT</b> <br>
            <p style="margin-left:21%;">BEST PRACTICES</p>
            <span class="pull-right-container"> </span> </div>
            </a> </li>
        <li style="border-style:solid;border-color:#d8dbdf80;border-top: none;" class="sidebar-li <?php if( $_FILE_NAME == "wining_contracts.php"){echo "active";} ?>"> <a href="<?php echo base_url; ?>tabs/wining_contracts.php">
            <div class="sidebar-menu-desc"> <img src="<?php echo base_url; ?>assets/img/e1.png" style="width:40px;"> <b>WINNING CONTRACTS</b><br>
            <p style="margin-left:21%;">BEST PRACTICES</p>
            <span class="pull-right-container"> </span> </div>
            </a> </li>
        <li style="border-style:solid;border-color:#d8dbdf80;border-top: none;" class="sidebar-li <?php if( $_FILE_NAME == "free_support_services.php"){echo "active";} ?>"> <a href="<?php echo base_url; ?>tabs/free_support_services.php">
            <div class="sidebar-menu-desc"> <img src="<?php echo base_url; ?>assets/img/d1.png" style="width:40px;"> <b>FREE </b><br>
            <p style="margin-left:21%;">SUPPORT SERVICES</p>
            <span class="pull-right-container"> </span> </div>
            </a> </li>
        </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header" style="background-color:#9e9e9e42;">
      <h1 style="line-height: 1.5;">
        2018 Key Performance Indicators for <br> <?php echo $BusinessName; ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href=""><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">