<?php
session_start();
include("../config/config_main.php");
require_once("includes/functions.php");
include("../base_path.php");
/* Attempt to connect to MySQL database */
$mysqli =  mysqli_connect("localhost","norcom_cpmDev1","UxIn940OoxiPvt","norcom_cpm-main");
$user_id=$_SESSION['user_id'];
$notifyId=$_POST['notifyId'];
  // $query="SELECT * FROM `execdb_updates` WHERE `update_recipient_user_id`='".$user_id."'";  
   $query="SELECT * FROM `norcom_notifications_replies` as notify_up left join user as u on notify_up.notification_sender_user_id=u.user_id where notify_up.notification_id='".$notifyId."' order by notification_reply_timestamp";
   $result = mysqli_query($mysqli,$query);
  
   while($row = mysqli_fetch_assoc($result))
   {  
    if(!empty($row['user_pic']))
       {
      $pic = $row['user_pic'];
      }
    else
    {
       $pic = "avatar.png"; 
     } 
   echo '<div class="box-comment">
            <img class="img-circle img-sm" src="'.base_url.'/dist/img/'.$pic.'" alt="User Image">
              <div class="comment-text">
                      <span class="username">
                        '.$row['user_fname'].' '.$row['user_lname'].'
                        <span class="text-muted pull-right">'.reply_time($row['notification_reply_timestamp']).'</span>
                      </span>
                  '.$row['notification_reply_text'].'
                </div>
				 </div>';
   
   }

?>