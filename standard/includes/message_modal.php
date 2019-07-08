<?php $user_id=$_SESSION['user_id'];
   $result=exec_sqlQuery("SELECT * FROM `norcom_messages` as up left join user as u on up.message_sender_user_id=u.user_id WHERE `message_recipient_user_id`='".$user_id."'");
   
   while($row = mysqli_fetch_assoc($result)){   
    if(!empty($row['user_pic'])){
        $pic = $row['user_pic'];
    }else{
         $pic = "avatar.png"; 
    } ?>
    <div class="modal fade" id="myModal<?php echo $row['message_id'] ?>" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
               
                <img id="pic" src="<?php echo base_url;?>dist/img/<?php echo $pic?>" class="img-circle">
                <span class="username"><span id="text_name"><?php echo $row['user_fname']; ?></span></span>
                <br>
                <h2><b>Subject:</b></h2>
                <h3 id="subject"><?php echo $row['message_subject_text'] ?></h3>
                <br>
                <h3><b>Source:</b></h3>
                <h5 id="source"><?php echo $row['message_source'] ?></h5>
                <span class="description">Shared publicly - <span id="text_time"><?php echo $row['message_timestamp'] ?></span></span>
              </div>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-dismiss="modal"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
			   
              <p><div id="text_p"><?php echo str_replace('?', '', utf8_decode($row['message_text'])) ?></div></p>

              <br>
              
             <a href="<?php echo $row['message_read_more_link']?>"> Read More </a>
            </div> 
            <div class="box-footer box-comments">
            <div id="text_replies"><?php echo reply_list($row['message_id']) ?></div>
            </div>
            </div>
            <div class="box-footer">
              <form>
                <!-- <img class="img-responsive img-circle img-sm" src="<?php echo $_SESSION['user_pic'] ?>" alt="Alt Text"> -->
                <div class="img-push">
                  <input type="text"  name="reply" id="reply_text" style="margin-bottom: 6px;"  class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
				<input type="hidden" name="recipient_user_id" id="recipient_user_id" value="<?php echo $row['message_sender_user_id'] ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="reply_id" id="reply_id" value="<?php echo $row['message_id'] ?>" >
                <input type="hidden" name="title" id="title" value="<?php echo $row['message_title'] ?>" >
				<button type="button" style="float:right;" class="btn btn-info" onclick="send_data()" class="btn btn-info" data-dismiss="modal">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <?php } ?>
  <script>
  function send_data(){
  
  var id=$('#recipient_user_id').val();
  var msg=$('#reply_text').val();
  var title=$('#title').val();
  var reply_id=$('#reply_id').val();
  
  //alert(msg);
  //return false;
  
  $.post( "<?php echo base_url; ?>/reply_recipient.php", {id:id,reply_id:reply_id,title:title,msg:msg}).done(function(data){
       alert(data);
       location.reload();
  });
  
  }
  
  </script>