
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
             <img src="inc/img/partner-dashboard-home-icon.png" style="width:55px;" ><span style="margin-left: 40px; font-size: 15px; color: white1;">Home</span>
            <span class="pull-right-container">
              
            </span>
          </a> -->
<!--         </li>
        <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none; background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/dealflow.php">
        <div class="row" style="background-color: ;">
          <div class="col-sm-1 offser-md-10"><img src="inc/img/dealflow_pipeline_icon-trans.png" style="width:55px"></div>
          <div class="col-sm-1"><span style="margin-left: 70px; font-size: 15px; color: white1;">DealFlow</span><br>
           <span style="margin-left:76px;color: white1;font-size: 15px;"> Pipeline</span></div>
        </div>
      </a>
      </li> -->

  <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li class="margin-top-sidebar" style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "dashboard.php"){echo "active";} ?>">
              <!-- <a href="<?php //echo base_url; ?>tabs/financial_services.php"> -->
              <a href="dashboard.php">
                <div class="row"> 
      <div class="col-sm-1">
             <img class="img_res" src="inc/img/partner-dashboard-home-icon.png" style="width:80px;margin-top: -1px;">
            </div>  
      <div class="col-sm-1 white1 text_res" style="margin-left: 70px;margin-top: 13px;font-family: inherit;font-size: 20px;">Home</div>
    </div>
              
              <span class="pull-right-container">
              
              </span>
              </a>
            </li>
            </ul>

    <!--       <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li class="margin-top-sidebar" style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php //if( $_FILE_NAME == "financial_services.php"){echo "active";} ?>">
              <a href="<?php //echo base_url; ?>tabs/financial_services.php">
              <a href="dashboard.php">
              <img src="inc/img/partner-dashboard-home-icon.png" style="width:40px;"> 
                <b class="white1">Home</b>
              
              <span class="pull-right-container">
              
              </span>
              </a>
            </li>
            </ul> -->
            <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "dealflow.php"){echo "active";} ?>">
              <a href="dealflow.php">
              <div class="row"> 
                <div class="col-sm-1">
                       <img class="img_res2" src="inc/img/dealflow_pipeline_icon-trans.png" style="width:80px;margin-top: 2px;">
                      </div>  
                <div class="col-sm-1 white1 text_res2" style="margin-left: 64px; margin-top: 13px;font-family: inherit;font-size: 20px;">DealFlow
                  <div style="margin-left: 5px;">Pipeline</div></div>
              </div>
              <span class="pull-right-container">
              
              </span>
              </a>
            </li>
            </ul>
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "client_engagement.php"){echo "active";} ?>">
              <a href="client_engagement.php">
              <div class="row"> 
                <div class="col-sm-1">
                       <img class="img_res3" src="inc/img/client_engagement_icon-trans.png" style="width:85px;margin-top: 2px;">
                      </div>  
                <div class="col-sm-1 white1 text_res3" style="margin-left: 75px; margin-top:8px;font-family: inherit;font-size: 20px;">Client
                  <div style="margin-left: -13px;"><small style="font-size:15px;">Engagements</small></div></div>  
              </div>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
          </ul>
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "client_analytics.php"){echo "active";} ?>">
              <a href="client_analytics.php">
              <div class="row"> 
                <div class="col-sm-1">
                       <img  class="img_res4" src="inc/img/client_analytics_icon-trans.png" style="width:77px;margin-top: 2px;">
                      </div>  
                <div class="col-sm-1 white1 text_res4" style="margin-left: 75px; margin-top: 5px;font-family: inherit;font-size: 20px;">Client
                  <div style="margin-left: -10px;">Analytics</div></div>
              </div>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
          </ul>
          <ul class="sidebar-menu" data-widget="tree"  style="background:#b9aeae38;">
            <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none;" class="<?php if( $_FILE_NAME == "data_export_tool.php"){echo "active";} ?>">
              <a href="data_export_tool.php">
             <div class="row"> 
                <div class="col-sm-1">
                       <img class="img_res5" src="inc/img/data_export_tool_icon-trans.png" style="width:74px;margin-top: 2px;">
                      </div>  
                <div class="col-sm-1 white1 text_res5" style="margin-left: 80px; margin-top: 16px;font-family: inherit;font-size: 20px;">Data
                  <div style="margin-left: -18px;">Export Tool</div></div>
              </div>
                <span class="pull-right-container">
                  
                </span>
              </a>
            </li>
          </ul>
   
   <!--      <li style="border-style:solid;border-color:#d8dbdf80;border-top: none;background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/client_engagement.php" >
          <div class="row">
              <div class="col-sm-1"><img src="inc/img/client_engagement_icon-trans.png" style="width:55px;"style="width:80px;" ></div>
              <div class="col-sm-1" style=""><span style="margin-left: 80px; font-size: 15px; color: white1;">Client</span><br>
           <span style="margin-left:65px;color: white1;"> Engagements</span></div>
          </div>
          </a>
        </li> -->

<!--     <li  style="border-style:solid;border-color:#d8dbdf80;border-top:none; background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/client_analytics.php">
        <div class="row" style="background-color: ;">
          <div class="col-sm-1 offser-md-10"><img src="inc/img/client_analytics_icon-trans.png" style="width:50px;"></div>
          <div class="col-sm-1"><span style="margin-left: 82px; font-size: 15px; color: white1;">Client </span><br>
           <span style="margin-left:72px;color: white1;font-size: ;"> Analytics</span></div>
        </div>
      </a>
    </li> -->
  <!--      
        <li style="border-style:solid;border-color:#d8dbdf80;border-top: none; background-color: #44494D;" class="">
          <a href="http://localhost/partnerdashboard/inc/data_export_tool.php">
                <div class="row">
              <div class="col-sm-1"><img src="inc/img/data_export_tool_icon-trans.png" style="width:50px;"style="width:80px;" ></div>
              <div class="col-sm-1" style=""><span style="margin-left: 84px; font-size: 15px; color: white1;">Data </span><br>
           <span style="margin-left:65px;color: white1;font-size: ;"> Export Tool</span></div>
          </div>
          </a>
        </li> -->
  
    
    </section>

  </aside>