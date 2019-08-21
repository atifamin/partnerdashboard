
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>California Small business success Copyright &copy; <?php echo date('Y'); ?></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include "tabs/tab3/popup.php"; ?>
<?php include "tabs/tab3/more_info_popup.php"; ?>
<?php include "tabs/tab4/popup.php"; ?>	
<?php include "message_modal.php"; ?>	
<?php include "message_recipient.php"; ?>	

<?php  include "notification_modal.php"; ?>	
<?php include "create_project_update.php"; ?>	
<?php include "project_update_modal.php"; ?>	
<?php //include "create_notification.php"; ?>	
<!-- jQuery 3 -->
<div id="create_notification" class="modal fade" role="dialog" >
   <div class="modal-dialog">
       <!-- Modal content-->
       <div class="modal-content" style="color:#204d74!important;background-color:#bdd8df!important;border-color:#84c6d6!important;">
           <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <br>
               <div style="text-align:center;background-color:#5397c0!important;padding:1px;">
               <h3>Create New Notification</h3>
               </div>
           </div>
           <div class="modal-body">
           <div class="row">
           <form action="<?php echo base_url; ?>create_notification.php" method="POST">
           <div class="col-md-6">
           <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
           <label class="col-md-2 col-xs-2" for="to">To</label>
           <select name="to" class="select2" style="width:57%;">
           <option >Select Recepient</option>
           <?php $result=exec_sqlQuery("SELECT * FROM user");
           while($row = mysqli_fetch_assoc($result)){?>

           <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_fname'];?></option>
           <?php } ?>
           </select>
           </div>
           </div>
           <div class="row">
           <div class="col-md-6">
           <label class="col-md-2 col-xs-2" for="title">Title</label>
           <input  name="title">
           </div>
           </div>
          
          
           <br>
           <textarea id="editor8"  name="editor8" rows="10" cols="80" ></textarea>
           </div>
           <div class="pull-right" style="margin-top:10px;">
           <p style="background-color: #3c8dbc; color:white;padding:4px;">Total Characters: <span id="letterCountnoti"></span><br>
          Remaining Characters: <span id="remainingnoti"></span></p>
           </div>
          
           <button style="margin-left:1%" type="button" class=" btn btn-primary btn-sm" >Maximum Characters 2048</button><br><br>
             <br>
           
          
           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <input  class="btn btn-primary" type="submit" value="save">
           </div>
           </form>
       </div>
   </div>
  </div>
<div id="modalArea"></div>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?php echo base_url; ?>assets/js/news.js"></script> 
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url; ?>bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url; ?>bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url; ?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url; ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url; ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url; ?>dist/js/demo.js"></script>
<script src="<?php echo base_url; ?>dist/js/demo.js"></script>
<script src="<?php echo base_url; ?>news.js"></script>
<!--<script src="<?php echo base_url; ?>newsDev/js/pages/dashboard.js"></script>-->

<!--<script src="<?php echo base_url; ?>newsDev/asset/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url; ?>newsDev/asset/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->

<script src="<?PHP echo base_url; ?>bower_components/jquery-scrollbox/jquery.scrollbox.js"></script>
<script src="<?PHP echo base_url; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url; ?>bower_components/jquery-validate/jquery.validate.min.js"></script>
<script src="<?PHP echo base_url; ?>bower_components/ckeditor/ckeditor.js"></script>
<!-- jvectormap  -->
<script src="<?PHP echo base_url; ?>bower_components/select2/dist/js/select2.full.min.js"></script>


<script type="text/javascript">
function show_cfm101(cfmid,cfmtitle){
	$("#tab2-loader").fadeIn();
	$.post( "ajax/load_cfm101.php", {cfmid:cfmid}).done(function(data){
		$("#cfm-panel-detail-id").html(data);
		$("#tab2-loader").fadeOut();
		$("#current-selected").html(cfmtitle);
	});
}
// function showofferboxpopup(offerid,partnername){
// 	// popup file include in dashboard
// 	$("#popup_partner_name").html(partnername);
// 	$.post( "ajax/loadofferdata.php", {offerid:offerid}).done(function(data){
// 		$("#offerdata").html(data); 
//     $("#modal-table").modal("show");
// 	});
// }
function showofferboxpopup(offerid,partnername){
  $.post("../tabs/apply_loan_form.php").done(function(e){
    $("#modalArea").html(e);
    $("#apply-load-modal").modal("show");
  });
}

function showofferboxpopupSurety(offerid,partnername){
  $.post("../tabs/apply_loan_form_surety.php").done(function(e){
    $("#modalArea").html(e);
    $("#apply-load-modal").modal("show");
  });
}
function showentireconid(contractID){
	$("#contractid_"+contractID).html(contractID);
}
function showentirepurid(purchaseID){
	$("#purchaseid_"+purchaseID).html(purchaseID);
}
// Tab2
function load_basic_practice(pageid){
	var totalCFM = $("#totalCFM").val();
	$.post( "ajax/best_practice.php", {pageid:pageid,totalCFM:totalCFM}).done(function(data){
		$("#bestpractice_response_content").html(data); 
	});
	$.post( "ajax/best_practice_content_code.php", {pageid:pageid,totalCFM:totalCFM}).done(function(data){
		$("#myTab31").html(data); 
	});
	$.post( "ajax/loadpagination_tab2.php", {pageid:pageid,totalCFM:totalCFM}).done(function(data){
		$("#paginationresponse").html(data); 
	});
} 
function loadcfmdata(datatype){
	var current_cfm_id = $("#current_cfm_id").val();
	if(datatype == 'Next'){
		current_cfm_id++;
	}else if(datatype == 'Previous'){
		current_cfm_id--;
	}
	
	if($('#pagination_id_'+current_cfm_id).length === 0){
		return false;
	} 
	$("#current_cfm_id").val(current_cfm_id);
	load_basic_practice(current_cfm_id,'');
}
// Tab5
function load_basic_practice_bidwin(pageid){
	var totalBidWin = $("#totalBidWin").val();
	$.post( "ajax/best_practice_tab5.php", {pageid:pageid,totalBidWin:totalBidWin}).done(function(data){
		$("#bestpractice_response_content_tab5").html(data); 
	});
	$.post( "ajax/best_practice_content_code_tab5.php", {pageid:pageid,totalBidWin:totalBidWin}).done(function(data){
		$("#myTab31_tab5").html(data); 
	});
	$.post( "ajax/loadpagination_tab5.php", {pageid:pageid,totalBidWin:totalBidWin}).done(function(data){
		$("#paginationresponse_bidwin").html(data); 
	});
} 
function loadbidwindata(datatype){
	var current_bidwin_id = $("#current_bidwin_id").val();
	if(datatype == 'Next'){
		current_bidwin_id++;
	}else if(datatype == 'Previous'){
		current_bidwin_id--;
	}
	
	if($('#pagination_id_'+current_bidwin_id).length === 0){
		return false;
	} 
	$("#current_bidwin_id").val(current_bidwin_id);
	load_basic_practice_bidwin(current_bidwin_id,'');
}
function showpartnerdescription(partnerid){
	$.post( "<?php echo base_url; ?>tabs/ajax/tab3_moreinfo_popup.php", {partnerid:partnerid}).done(function(data){
		$("#moreinfo_popup_response").html(data); 
	});
}
// Tab4
$(document).ready(function(){
	var  user_zip_code = $("#user_zip_code").val(); 
	$.post( "ajax/tab5_score.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_score_response").html(data); 
	});
	$.post( "ajax/tab5_sbdc.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_sbdc_response").html(data); 
	});
	$.post( "ajax/tab5_vboc.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_vboc_response").html(data); 
	});
	$.post( "ajax/tab5_others.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_others_response").html(data); 
	});
});
function load_tab5_data(suppserv_id){
	$.post( "ajax/tab5_popup_content.php", {suppserv_id:suppserv_id}).done(function(data){
		$("#tab5_data_response").html(data); 
	});
}
function active_wining_contract_tab(){ 
	// document.getElementById("wining_contracts_tab").click();
	// scroll(0, 800);
  window.location = "<?php echo base_url; ?>tabs/wining_contracts.php";
}

</script>
<script>

   CKEDITOR.replace('editor4',{
   height: '150',
   maxlength: '2048'
});

$(document).ready(function(){

var editAbstract=CKEDITOR.instances.editor4;

editAbstract.on("key",function(e) {      
                        
   var maxLength=e.editor.config.maxlength;
      
   e.editor.document.on("keyup",function() {KeyUp(e.editor,maxLength,"letterCount");});
   e.editor.document.on("paste",function() {KeyUp(e.editor,maxLength,"letterCount");});
   e.editor.document.on("blur",function() {KeyUp(e.editor,maxLength,"letterCount");});
},editAbstract.element.$);

//function to handle the count check
function KeyUp(editorID,maxLimit,infoID) {
//console.log(editorID+' '+maxLimit+' '+infoID);
   //If you want it to count all html code then just remove everything from and after '.replace...'
   var text=editorID.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/^\s+|\s+$/g, '');
   $("#"+infoID).text(text.length);
   var remaining= 2048 - text.length;
   document.getElementById("remaining").innerHTML = remaining;
   if(text.length>maxLimit) {   
      alert("You cannot have more than "+maxLimit+" characters");         
      editorID.setData(text.substr(0,maxLimit));
      editor.cancel();
   } else if (text.length==maxLimit-1) {
      alert("WARNING:\nYou are one character away from your limit.\nIf you continue you could lose any formatting");
      editor.cancel();
   }
}   
});


CKEDITOR.replace('editor8',{
   height: '150',
   maxlength: '2048'
});

$(document).ready(function(){

var editAbstractfornoti=CKEDITOR.instances.editor8;

editAbstractfornoti.on("key",function(e) {      
                        
   var maxLength=e.editor.config.maxlength;
      
   e.editor.document.on("keyup",function() {KeyUp(e.editor,maxLength,"letterCountnoti");});
   e.editor.document.on("paste",function() {KeyUp(e.editor,maxLength,"letterCountnoti");});
   e.editor.document.on("blur",function() {KeyUp(e.editor,maxLength,"letterCountnoti");});
},editAbstractfornoti.element.$);

//function to handle the count check
function KeyUp(editorID,maxLimit,infoID) {

   //If you want it to count all html code then just remove everything from and after '.replace...'
   var text=editorID.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/^\s+|\s+$/g, '');
   $("#"+infoID).text(text.length);
   var remaining= 2048 - text.length;
   document.getElementById("remainingnoti").innerHTML = remaining;
   if(text.length>maxLimit) {   
      alert("You cannot have more than "+maxLimit+" characters");         
      editorID.setData(text.substr(0,maxLimit));
      editor.cancel();
   } else if (text.length==maxLimit-1) {
      alert("WARNING:\nYou are one character away from your limit.\nIf you continue you could lose any formatting");
      editor.cancel();
   }
}   
});

CKEDITOR.replace('editor12',{
   height: '150',
   maxlength: '2048'
});

$(document).ready(function(){

var editAbstractforprojup=CKEDITOR.instances.editor12;

editAbstractforprojup.on("key",function(e) {      
                        
   var maxLength=e.editor.config.maxlength;
      
   e.editor.document.on("keyup",function() {KeyUp(e.editor,maxLength,"letterCountprojup");});
   e.editor.document.on("paste",function() {KeyUp(e.editor,maxLength,"letterCountprojup");});
   e.editor.document.on("blur",function() {KeyUp(e.editor,maxLength,"letterCountprojup");});
},editAbstractforprojup.element.$);

//function to handle the count check
function KeyUp(editorID,maxLimit,infoID) {

   //If you want it to count all html code then just remove everything from and after '.replace...'
   var text=editorID.getData().replace(/<("[^"]*"|'[^']*'|[^'">])*>/gi, '').replace(/^\s+|\s+$/g, '');
   $("#"+infoID).text(text.length);
   var remaining= 2048 - text.length;
   document.getElementById("remainingprojup").innerHTML = remaining;
   if(text.length>maxLimit) {   
      alert("You cannot have more than "+maxLimit+" characters");         
      editorID.setData(text.substr(0,maxLimit));
      editor.cancel();
   } else if (text.length==maxLimit-1) {
      alert("WARNING:\nYou are one character away from your limit.\nIf you continue you could lose any formatting");
      editor.cancel();
   }
}   
});

function notificationreply(sendername,notifyId,notifyTime,notifySender,notifyRecipient,notifyTitle,notifyText,pic){
   
   $('#noti_pic').attr("src", "<?php echo base_url;?>dist/img/"+pic+"");
    $('#noti_text_name').html(sendername);   
    $('#noti_id').val(notifyId);
    $('#noti_recipient_id').val(notifySender);
    $('#notify_text_Title').html(notifyTitle);
    $('#noti_text_time').html(notifyTime);
    $('#noti_title').val(notifyTitle);
    $('#noti_text_par').html(notifyText);
    
    $.post( "<?php echo base_url; ?>/notification_replies_list.php", {notifyId:notifyId}).done(function(data){
      $('#notifications_text_replies').html(data);
     
    });
   
 }

 function send_notify_data(){

var notify_id = $('#noti_id').val();
var notify_msg   = $('#notify_reply').val();
var notify_title = $('#noti_title').val();
var notify_reply_id = $('#noti_recipient_id').val();
  


$.post( "<?php echo base_url; ?>/reply_notification.php", {notify_id:notify_id,notify_reply_id:notify_reply_id,notify_title:notify_title,notify_msg:notify_msg}).done(function(data){
   alert('Your Notification Reply send successfully!!');
  location.reload();
});

}

function project_update_fn(sender_name,projectUpId,projectUpTime,projectUpSender,projectUpRecipient,projectUpTitle,projectUpProgress,projectUpStatus,projectUpText,pic){
	
  $('#pro_pic').attr("src", "<?php echo base_url;?>dist/img/"+pic+"");
   $('#projectUp_sender').html(sender_name);	
   $('#projectUp_id').val(projectUpId);
   $('#projectUp_recipient_id').val(projectUpSender);
   $('#projectUp_text_Title').html(projectUpTitle);
   $('#projectUp_text_time').html(projectUpTime);
   $('#projectUp_title').val(projectUpTitle);
   $('#projectUp_text_par').html(projectUpText);
   
    var result_project_progress= '<h4>'+projectUpTitle+'</h4><small class="pull-right">'+projectUpProgress+'</small><div class="progress xs"><div class="progress-bar progress-bar-aqua" style="width:'+projectUpProgress+'%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">'+projectUpProgress+' Complete</span></div></div>';
    $("#projectUp_progress").html(result_project_progress);
	
	var result_project_status= '<h4>Project Status : <b>'+projectUpStatus+'</b></h4>';
    $("#projectUp_status").html(result_project_status);
	 
	 $.post( "<?php echo base_url; ?>/project_replies_list.php", {projectUpId:projectUpId}).done(function(data){
     $('#project_text_replies').html(data);
      });
		
}

function send_project_data(){

var project_id = $('#projectUp_id').val();
var projectup_msg   = $('#projectUp_reply').val();
var projectup_title = $('#projectUp_title').val();

  


$.post( "<?php echo base_url; ?>/reply_project.php", {project_id:project_id,projectup_title:projectup_title,projectup_msg:projectup_msg}).done(function(data){
   alert('Your Comment send successfully!!');
  location.reload();
});

}
 $('.select2').select2()
</script>
 <script src="<?php echo base_url; ?>assets/js/news.js"></script> 
</body>
</html>
