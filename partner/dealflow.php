<!DOCTYPE html>
<html>
<?php include "inc/head.php"; ?>
<?php include "inc/header.php"; ?>
<?php include "inc/asidebar.php"; ?>
<div class="content-wrapper">
   <section class="content-header" style="background-color: #D8DBE0; height: 81px;">
      <?php 
        $partner_id = $_SESSION['partner_id'];
        $q = 'select * from partner where `partner_id`= '.$partner_id.' ';
        $row = mysqli_query($con_MAIN,$q);
        $res = mysqli_fetch_object($row);
        //rprint_r($partner_id);exit;
       ?> 
      <h1>
          <?php 
            echo $_SESSION['user_fname'].' '.$_SESSION['user_lname'];echo ":  Pipeline Deal Flow Key Performance Indicators";
          ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<section class="content">
  <div class="row" id="dealFlowStatsRow">
                  <?php 
                  
                  $query1= 'SELECT COUNT(*) as total_deals 
                            FROM 
                            tasks,users,containers,boards_users
                            WHERE 
                            tasks.task_container=containers.container_id AND
                            containers.container_board=boards_users.board_id AND
                            boards_users.user_id=users.user_id AND 
                            tasks.task_archived=0 AND  users.dashboard_user_id='.$_SESSION["user_id"];
                  $res1= mysqli_query($con_TaskBoard,$query1);
                  $r = mysqli_fetch_object($res1);
                  //echo"<pre>";print_r($res1);exit();

                  $query2='SELECT SUM(task_funding_approved_amount) AS funding_amount 
                            FROM 
                            tasks,users,containers,boards_users 
                            WHERE 
                            tasks.task_container=containers.container_id AND
                            containers.container_board=boards_users.board_id AND
                            boards_users.user_id=users.user_id AND 
                            tasks.task_archived=0 AND users.dashboard_user_id='.$_SESSION["user_id"];
                  $res2= mysqli_query($con_TaskBoard,$query2);
                  $r2 = mysqli_fetch_object($res2);
                  //echo"<pre>";print_r($r2);exit();
                  $query3='SELECT COUNT(*) AS funding_close 
                  FROM 
                  tasks,users,containers,boards_users 
                  WHERE containers.container_name="Funding Closed" AND tasks.task_container=containers.container_id AND containers.container_board=boards_users.board_id AND
                  boards_users.user_id=users.user_id AND 
                  tasks.task_archived=0 AND users.dashboard_user_id='.$_SESSION["user_id"];
//echo $query3;exit;
                  $res3= mysqli_query($con_TaskBoard,$query3);
                  $r3= mysqli_fetch_object($res3);
                  //echo"<pre>";print_r($r3);exit();

                  $query4='SELECT COUNT(*) AS funding_denied 
                            FROM 
                            tasks,users,containers,boards_users 
                            WHERE 
                            containers.container_name in ("Funding Denied","Funded Denied") 
                            AND tasks.task_container=containers.container_id 
                            AND containers.container_board=boards_users.board_id 
                            AND boards_users.user_id=users.user_id 
                            AND tasks.task_archived=0 
                            AND users.dashboard_user_id='.$_SESSION["user_id"];
                  $res4= mysqli_query($con_TaskBoard,$query4);
                  // echo"<pre>";print_r($query4);exit();

                  $r4= mysqli_fetch_object($res4);
                  if ($r3->funding_close=="" || $r3->funding_close=="0"){
                    $result4 = "TBD";
                  }else if($r4->funding_denied=="" || $r4->funding_denied=="0"){
                    $result4 = "TBD";
                  }else{
                    $result4 = round(intval($r3->funding_close) / intval($r4->funding_denied));
                    $result4 .= "%";
                    
                  }

                  
                  

              ?>
    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#3598DC;">
            <div class="inner">
              <h3 class="white"><?php echo number_format($r->total_deals); ?></h3>

              <p class="white">Total Active Deals</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#E8505C;">
            <div class="inner">
              <h3 class="white">$<?php echo number_format($r2->funding_amount); ?></h3>

              <p class="white">Total Deal Amount</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-dollar"></i>
            </div>
          </div>
        </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#32C6D2;">
            <div class="inner">
              <h3 class="white"><?php echo number_format($r3->funding_close); ?></h3>

              <p class="white">Total Funded Deals</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-clipboard"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background-color:#8A48A9;">
            <div class="inner">
              <?php
              $dealWinRate = 0;
              if($r3->funding_close!="" && $r3->funding_close!=0){
                $dealWinRate = $r3->funding_close/$r->total_deals;
                $dealWinRate = $dealWinRate*100;
              }
              ?>
              <h3 class="white"><?php echo number_format($dealWinRate)."%"; //echo $result4; ?></h3>

              <p class="white">Deal Win Rate</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-trophy"></i>
            </div>
          </div>
        </div>                         
  </div> 
<!--  <?php 
 $insert_id//=$_SESSION['user_id'];
 //$q//="update users set dashboard_user_id = '".$insert_id."' where user_id='1'";
 //$res//= mysqli_query($mynewcon,$q);
 //print_r($res);exit();

 ?> -->
 
  <iframe src = "http://tbpinio.pw/cpmDev1/dashboard/pkanban/access/login_auto?dashboard_user_id=<?php echo $_SESSION['user_id'];?>" width = "100%" height = "900px">
      Sorry your browser does not support inline frames.
    </iframe>
</section>  
</div>
<?php include "inc/footer.php"; ?>
