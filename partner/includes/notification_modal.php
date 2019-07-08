<div class="modal fade" id="notification_modal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                 <img class="img-circle" src="<?php echo base_url;?>/dist/img/user1-128x128.jpg" alt="User Image">
                 <!-- <img id="noti_pic" src="" class="img-circle"> -->
                <span class="username"><span id="noti_text_name"></span></span>
                <span class="description">Shared publicly - <span id="noti_text_time"></span></span>
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
			  <strong><span id="notify_text_Title"></span></strong>
              <p><div id="noti_text_par"></div></p>
            </div> 
            <div class="box-footer box-comments">
              <?php //echo execdb_updates_reply(); ?>
			  <div id="notifications_text_replies"></div>
            </div>
            <div class="box-footer">
              <form>
                
                <div class="img-push">
                  <input type="text"  name="notify_reply" id="notify_reply" style="margin-bottom: 6px;"  class="form-control input-sm" placeholder="Press enter to post comment">
                </div>
				<input type="hidden" name="noti_recipient_id" id="noti_recipient_id" >
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="noti_id" id="noti_id" >
                <input type="hidden" name="noti_title" id="noti_title" >
				<button type="button" style="float:right;" class="btn btn-info" onclick="send_notify_data()" class="btn btn-info" data-dismiss="modal">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>