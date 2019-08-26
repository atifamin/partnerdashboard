<?php
session_start();
include("../config/config_main.php");
require_once("includes/functions.php");
include('../config/base_path.php');
/* Attempt to connect to MySQL database */
$mysqli =  mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");
//$user_id=$_SESSION['id'];
$project_id=$_POST['projectUpId'];
  // $query="SELECT * FROM `execdb_updates` WHERE `update_recipient_user_id`='".$user_id."'";  
   $query="SELECT * FROM `execdb_project_update_comment` as project_up left join user as u on project_up.project_update_comment_owner_user_id=u.user_id where project_id='".$project_id."' order by project_update_comment_timestamp";
   $result = mysqli_query($mysqli,$query);
  
   while($row = mysqli_fetch_assoc($result)){ 
    if(!empty($row['user_pic'])){
      $pic = $row['user_pic'];
  }else{
       $pic = "avatar.png"; 
  }  
   echo '<div class="box-comment">
            <img class="img-circle img-sm" src="'.base_url.'./dist/img/'.$pic.'" alt="User Image">
              <div class="comment-text">
                      <span class="username">
                        '.$row['user_fname'].' '.$row['user_lname'].'
                        <span class="text-muted pull-right">'.reply_time($row['project_update_comment_timestamp']).'</span>
                      </span>
                  '.$row['project_update_comment_text'].'
                </div>
				 </div>';
   
   }

?>