<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<?php require_once ("functions.php"); ?> 

  <header class="main-header">
    <a href="index2.html" class="logo" style="height: 57px;">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg" style="margin-top:5px ;" ><b>AWT</b>-CEP</span>
    </a>
    <nav class="navbar navbar-static-top"> 
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" >
        <span class="sr-only">Toggle navigation</span><span style="font-size: 20px; margin-left: 10px; font-family: Calibri;"><large>Procurement Marketplace Partner Platform</large></span> 
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 58px;">
              <i class="far fa-envelope" style="margin-top: 9px;"></i>
              <span class="label label-success" style="margin-top: 6px;">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url; ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url; ?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url; ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url; ?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url; ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 58px;">
              <i class="fas fa-bell" style="margin-top: 9px;"></i>
              <span class="label label-warning" style="margin-top: 6px;">10</span>
            </a>
              <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                <li class="dropdown-header">
                  <i class="ace-icon fa fa-exclamation-triangle"></i>
                  8 Notifications
                </li>

                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                        KPI#1
                      </span>
                      <span class="pull-right badge badge-info">+12</span>
                    </div>
                  </a>
                </li>

                <li>
                  <a href="#">
                    <i class="btn btn-xs btn-primary fa fa-user"></i>
                    KPI#2
                  </a>
                </li>

                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
                        KPI#3
                      </span>
                      <span class="pull-right badge badge-success">+8</span>
                    </div>
                  </a>
                </li>

                <li>
                  <a href="#">
                    <div class="clearfix">
                      <span class="pull-left">
                        <i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
                        KPI#4
                      </span>
                      <span class="pull-right badge badge-info">+11</span>
                    </div>
                  </a>
                </li>

                <li class="dropdown-footer">
                  <a href="#">
                    See all notifications
                    <i class="ace-icon fa fa-arrow-right"></i>
                  </a>
                </li>
              </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 58px;">
              <i class="far fa-flag" style="margin-top: 9px;"></i>
              <span class="label label-danger" style="margin-top: 6px;">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="height: 58px">
        
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="height: 58px;">
              <img src="<?php echo base_url; ?>assets/avatars/user.jpg" class="img-circle" alt="User Image" style="margin-top: -4px;">
                <span class="user-info">
              <span class="hidden-xs"><?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url; ?>assets/avatars/user.jpg" class="img-circle" alt="User Image">
                <?php echo $_SESSION['user_fname'].' '.$_SESSION['user_lname']; ?>
              </li>

              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo base_url; ?>logout.php" class="btn btn-default btn-flat"> <i class="ace-icon fa fa-power-off"></i> Sign out</a>

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
       
        </ul>
      </div>
    </nav>
  </header>
  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  });
  </script>