<?php 
//include("./config/config_main.php");

function exec_sqlQuery($q){
    $con=mysqli_connect("localhost","root","","partnerdashboard");
// Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,$q);
    return $result;
}
function count_messages(){
    $user_id=$_SESSION['user_id'];
    $result=exec_sqlQuery("SELECT * FROM `norcom_messages` WHERE `message_recipient_user_id` = '".$user_id."' ");
	return $result->num_rows;
}

function  norcom_messages()
    { 
   
   $user_id=$_SESSION['user_id'];
   $result=exec_sqlQuery("SELECT * FROM `norcom_messages` as up left join user as u on up.message_sender_user_id=u.user_id WHERE `message_recipient_user_id`='".$user_id."'");
  
   echo '<ul class="dropdown-menu" style="list-style: none;" >';  
   if(count_messages()>0){ 
   echo '<li class="header">You have '.count_messages().' messages</li>';
   }else{
	  echo '<li class="header">You have no message</li>';
   }  
   echo '<ul class="menu" style="list-style: none;padding-left:10px;">'; 
   while($row = mysqli_fetch_assoc($result)){   
      
    if(!empty($row['user_pic'])){
        $pic = $row['user_pic'];
    }else{
         $pic = "avatar.png";
    }
      
   echo '<li id="exup"><a class="link" style="cursor: pointer;color:black;" type="button"  data-toggle="modal" data-target="#myModal'.$row['message_id'].'" ><div class="pull-left">
   <img src="'.base_url.'dist/img/'.$pic.'" style="width:40px;height:40px;" class="img-circle" alt="User Image">
                      </div><h4 id="title" style="color:gray;">From: '.$row['user_fname'].'</h4> <small class="pull-right" style="color:gray;"><i  class="fa fa-clock-o"></i>'.reply_time($row['message_timestamp']).'</small><hr><b>Subject: '.substr($row['message_subject_text'], 0, 25).'...</b><p style="overflow:hidden;color:gray;">'.substr($row['message_text'], 0, 50).'</p></a></li> ';  
      

               echo  '<a class="link" style="cursor: pointer;" type="button"  data-toggle="modal" data-target="#myModal'.$row['message_id'].'" >
                      Read More</a>';         
    
   }
   echo '<hr><a id="crateupdate" href="#" class="btn btn primary" data-toggle="modal" data-target="#message_recepient" style="font-size:200%;">Create New Message</a>';   

   echo '</ul><li class="footer"><a href="#">Close</a></li></ul>';
   

   }
    function reply_time($tim){

        $now = time(); // or your date as well
        $your_date = strtotime($tim);
        $datediff = $now - $your_date;
        $day=round($datediff / (60 * 60 * 24));
            if($day>1){

            return $day.' days';

            }
            else if($day==1){

                return $day.' day';

            }
            else if($day<1){
                
                $time = date('H:i', strtotime($tim));
                return $time.' Today';
            }
    }
    
    function reply_list($message_id){
 
        //$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
         $user_id=$_SESSION['user_id'];
         //$update_id=$_POST['replyId'];
      // $query="SELECT * FROM `execdb_updates` WHERE `update_recipient_user_id`='".$user_id."'";  
       //$query="SELECT * FROM `execdb_updates_replies` as up left join execdb_users as u on up.update_sender_user_id=u.user_id where up.update_id='".$update_id."' order by update_reply_timestamp";
       //$result = mysqli_query($mysqli,$query);
       $result = exec_sqlQuery("SELECT * FROM `norcom_messages_reply` as up left join user as u on up.message_sender_user_id=u.user_id where up.message_id='".$message_id."' order by message_timestamp");
       while($row = mysqli_fetch_assoc($result)){   
       
       echo '<div class="box-comment">
               
                  <div class="comment-text">
                          <span class="username">
                            '.$row['user_fname'].' '.$row['user_lname'].'
                            <span class="text-muted pull-right">'.reply_time($row['message_timestamp']).'</span>
                          </span>
                      '.$row['message_reply_text'].'
                    </div>
                     </div>';
       
       }
    
     }

     function  norcom_notifications()
   {
    
    $user_id=$_SESSION['user_id'];
    $result=exec_sqlQuery("SELECT * FROM `norcom_notifications` as notify left join user as u on notify.notification_sender_user_id=u.user_id WHERE notify.`notification_recipient_user_id`='".$user_id."'");
    echo '<ul class="dropdown-menu">';  
   if(count_notifications()>0){ 
   echo '<li class="header">You have '.count_notifications().' notifications</li>';
   }else{
	  echo '<li class="header">You have no notifications</li>';
   }
	echo '<ul class="menu" style="list-style: none;padding-left:10px;">';
    while($row = mysqli_fetch_assoc($result)){
        $pic = "";
     /*  echo '<li>
                <h4>
                '.$row['notification_title'].'</h4>
                  <small><i class="fa fa-clock-o"></i>'.$row['notification_timestamp'].'</small>
                </h4>
                <p>'.$row['notification_text'].'</p>
            </li>';*/
			
			 echo '<li id="noup"><a class="link" style="cursor: pointer;" type="button" onclick="notificationreply( \''.$row['user_fname'].'\','.$row['notification_id'].',\''.reply_time($row['notification_timestamp']).'\','.$row['notification_sender_user_id'].','.$row['notification_recipient_user_id'].',\''.$row['notification_title'].'\',\''.trim($row['notification_text']).'\')" data-toggle="modal" data-target="#notification_modal" >
			 <h4> <i class="fa fa-users text-aqua"></i> '.$row['notification_title'].'</h4></a></li>';
    }
    echo '</ul>';
    echo '<hr><a href="#" id="createnotification" style="font-size:180%;" class="btn btn primary" data-toggle="modal" data-target="#create_notification">Create New Notification</a>   
    <li class="footer"><a href="#">Close</a></li>
    </ul>';
 }
 
 function count_notifications(){
    $user_id = $_SESSION['user_id'];
    $result = exec_sqlQuery("SELECT * FROM `norcom_notifications` WHERE notification_recipient_user_id = '".$user_id."' ");
    //print_r($result);
	return $result->num_rows;
}

function  execdb_project_updates(){
    
    $user_id=$_SESSION['user_id'];
    $result=exec_sqlQuery("SELECT * FROM `execdb_project_updates` as project left join user as u on project.project_update_sender_user_id=u.user_id WHERE project.`project_update_recipient_user_id`='".$user_id."'");
    echo '<ul class="dropdown-menu">';  
   if(count_execdb_project_updates()>0){ 
   echo '<li class="header">You have '.count_execdb_project_updates().' updates</li>';
   }else{
	  echo '<li class="header">You have no update</li>';
   }  
   echo '<ul class="menu" style="list-style: none;padding-left:10px;">';
    while($row = mysqli_fetch_assoc($result)){
       $pic = "";
       echo '<li id="epu"><a class="link" style="cursor: pointer;" type="button" onclick="project_update_fn(\''.$row['user_fname'].'\','.$row['project_update_id'].',\''.reply_time($row['project_update_timestamp']).'\','.$row['project_update_sender_user_id'].','.$row['project_update_recipient_user_id'].',\''.$row['project_update_title'].'\',\''.$row['project_update_completion_percentage'].'\',\''.$row['project_update_status'].'\',\''.trim($row['project_update_text']).'\',\''.$pic.'\')" data-toggle="modal" data-target="#projectup_modal" >
                <h4>
                '.$row['project_update_title'].'</h4>
               
                </h4>
                <small class="pull-right">'.$row['project_update_completion_percentage'].'</small>
                <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width:'.$row['project_update_completion_percentage'].'%;background-color:aqua;" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">'.$row['project_update_completion_percentage'].' Complete</span>
                        </div>
                      </div></a></li>';
    }
    echo '</ul>
    <hr><a href="#" id="project-status" class="btn btn primary" style="font-size:180%;" data-toggle="modal" data-target="#create_project_updates">Create Project Update</a>
    <li class="footer"><a href="#">Close</a></li>
    </ul>';
}

function count_execdb_project_updates(){
    $user_id=$_SESSION['user_id'];
    $result=exec_sqlQuery("SELECT * FROM `execdb_project_updates` WHERE `project_update_recipient_user_id`= '".$user_id."' ");
	return $result->num_rows;
}



?>