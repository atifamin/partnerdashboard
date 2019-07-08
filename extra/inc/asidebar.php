  <aside class="main-sidebar" style="width:;">
    <section class="sidebar">
      <div class="user-panel" style="height: 68px;">
        <div class="pull-left image">
          <img src="assets/avatars/user.jpg" class="img-circle" alt="User Image" style="margin-top:12px; margin-left: 20px;">
        </div>
        <div class="pull-left info">
          <p style="margin-left: 20px; margin-top: 10px;"><?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success" style="margin-left: 20px;"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        
        <br>
        <li style="border-style:solid;border-color:#d8dbdf80;background-color: #44494D;" class="">
       <!--    <a href="http://localhost/partnerdashboard/dashboard.php">
             <img src="inc/img/partner-dashboard-home-icon.png" style="width:55px;" ><span style="margin-left: 40px; font-size: 15px; color: white;">Home</span>
            <span class="pull-right-container">
              
            </span>
          </a> -->
<!--         </li>
        <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none; background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/dealflow.php">
        <div class="row" style="background-color: ;">
          <div class="col-sm-1 offser-md-10"><img src="inc/img/dealflow_pipeline_icon-trans.png" style="width:55px"></div>
          <div class="col-sm-1"><span style="margin-left: 70px; font-size: 15px; color: white;">DealFlow</span><br>
           <span style="margin-left:76px;color: white;font-size: 15px;"> Pipeline</span></div>
        </div>
      </a>
      </li> -->
  
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li class="margin-top-sidebar" style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
              <!-- <a href="<?php //echo base_url; ?>tabs/financial_services.php"> -->
              <a href="dashboard.php">
              <img src="inc/img/partner-dashboard-home-icon.png" style="width:40px;"> 
                <b class="white">Home</b>
              
              <span class="pull-right-container">
              
              </span>
              </a>
            </li>
            </ul>
            <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
              <a href="dealflow.php">
              <img src="inc/img/dealflow_pipeline_icon-trans.png" style="width:40px;"> 
                <b class="white">DealFlow</b>
              <p style="margin-left:21%;" class="white"> Pipeline</p>
              <span class="pull-right-container">
              
              </span>
              </a>
            </li>
            </ul>
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
              <a href="#">
              <img src="inc/img/client_engagement_icon-trans.png" style="width:40px;"> 
                <b class="white">Client</b>
            <p style="margin-left:21%;" class="white"> Engagements</p>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
          </ul>
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
              <a href="#">
              <img src="inc/img/client_analytics_icon-trans.png" style="width:38px;"> 
                <b class="white">Client</b>
            <p style="margin-left:21%;" class="white"> Analytics</p>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
          </ul>
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
              <a href="#">
              <img src="inc/img/data_export_tool_icon-trans.png" style="width:40px;"> 
                <b class="white">Data</b>
            <p style="margin-left:21%;" class="white"> Export Tool</p>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
          </ul>
   
   <!--      <li style="border-style:solid;border-color:#d8dbdf80;border-top: none;background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/client_engagement.php" >
          <div class="row">
              <div class="col-sm-1"><img src="inc/img/client_engagement_icon-trans.png" style="width:55px;"style="width:80px;" ></div>
              <div class="col-sm-1" style=""><span style="margin-left: 80px; font-size: 15px; color: white;">Client</span><br>
           <span style="margin-left:65px;color: white;"> Engagements</span></div>
          </div>
          </a>
        </li> -->

<!--     <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none; background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/client_analytics.php">
        <div class="row" style="background-color: ;">
          <div class="col-sm-1 offser-md-10"><img src="inc/img/client_analytics_icon-trans.png" style="width:50px;"></div>
          <div class="col-sm-1"><span style="margin-left: 82px; font-size: 15px; color: white;">Client </span><br>
           <span style="margin-left:72px;color: white;font-size: ;"> Analytics</span></div>
        </div>
      </a>
    </li> -->
  <!--      
        <li style="border-style:solid;border-color:#d8dbdf80;border-top: none; background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/data_export_tool.php">
                <div class="row">
              <div class="col-sm-1"><img src="inc/img/data_export_tool_icon-trans.png" style="width:50px;"style="width:80px;" ></div>
              <div class="col-sm-1" style=""><span style="margin-left: 84px; font-size: 15px; color: white;">Data </span><br>
           <span style="margin-left:65px;color: white;font-size: ;"> Export Tool</span></div>
          </div>
          </a>
        </li> -->
  
    
    </section>

  </aside>