
<style type="text/css">
.file-header {
  background-color: #1E345D;
  color: #B7DDE8;
  padding: 5px;
  font-size: 24px;
}
.file-cell {
  background-color: #B7DDE8;
  font-size: 24px;
  text-align: center;
  color: #123A5A;
  padding: 1.1% 0;
}
.columnSecond, .columnThird{cursor:pointer;}

.btn-style {
      border-color: #b7dde8;
      background: white;
      border-width: medium;
}
.btn-text {
      color: #4e80c6;
      font-size: 20px;
}

.btn-access {
      background-color: #4e80c6;
      height: 45px;
      width: 201px;
}

.btn-grant-access {
  background-color: #4e80c6; 
  width: 23%;
}
.btn-2 {
  background-color: #93CCDD;
  width: 100%;
  color: #1C5566;
  height: 35px;
}
.btn-ok {
  background-color: #00AF50;
  color: #ffff;
  width: 25%;
  border-radius: 10px
}
.btn-deny {
  background-color: #FF4F4F;
  color: #ffff;
  margin-left: 39px;
  width: 25%;
  border-radius: 10px
}
.btn-cancal {
  background-color: #934A10;
  color: #ffff;
  margin-left: 39px;
  width: 25%;
  border-radius: 10px
}
.access-div {
  display:inline-block; 
  vertical-align: middle; 
  display: none; 
  background-color: #D5E4C3; 
  width: 60%
}
.center {
  position: relative;
  float: left;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.cus-td {
  color: #45717A;
  font-size: 20px;
}

.d-none {
  display: none;
}

.custom-modal {
  height: 60px; 
  background-color: #1F487E; 
  border: none;
}

.custom-modal-2 {
  background-color: #B8DEE6; 
  padding: 10px;
}
.bg-3 {

}

#progress {
  border-radius: 5px;
}

#progress-bar {
  width: 5%; 
  border-radius: 5px;
}

</style>

<?php //echo "<pre>"; print_r($access_request); exit; ?>

<?php
function formatSizeUnits($size, $precision = 2){
  static $units = array('kB','MB','GB','TB','PB','EB','ZB','YB');
    $step = 1024;
    $i = 0;
    while (($size / $step) > 0.9) {
        $size = $size / $step;
        $i++;
    }
    return round($size, $precision).$units[$i];
}
function fileIconExt($extension){
  $ext = strtolower($extension);
  if ($ext == '.pdf') {
    echo base_url(). "images/missing_file_icon.PNG";
  }else if ($ext == '.png'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.doc' || $ext == '.docx'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.jpg'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.xls' || $ext == '.xlsx'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.gif'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.txt'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.ppt' || $ext == '.pptx'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.odp'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.ods'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.odt'){
    echo base_url(). "images/delete.png";
  }else if ($ext == '.rtf'){
    echo base_url(). "images/delete.png";
  }
}
?>
<div class="row">
  <div class="col-md-5" style="padding-right: unset;">
    <button type="button" class="btn btn-sm btn-block btn-style" onclick="show_access()"><strong class="btn-text"><?php echo $folder->bizvault_default_folder_title_text; ?></strong></button>
  </div>
  <div class="col-md-7" style="padding-left: unset;">
    <hr class="new5">
  </div>
</div>
<div class="access-div">
  <div class="row text-center">
    <div class="col-md-12">
      <button type="button" class="btn btn-access mt-20 mb-20" data-toggle="modal" data-target="#view-access-info-modal"><span class="text-white font-20">VIEW ACCESS INFO</span></button>
      <button type="button" class="btn btn-access mt-20 mb-20" data-toggle="modal" data-target="#grant-access-modal"><span class="text-white font-20">GRANT ACCESS</span></button>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="box-group" id="accordion">
      <?php if(count($folder->files)>0): ?>
      <?php foreach($folder->files as $key=>$val): ?>
      <div class="panel box box-primary" id="panel_row_<?php echo $val->bizvault_user_required_filelist_id; ?>">
        
        <div class="box-header with-border">
          <div class="row" style="margin-right: 1%;margin-left: 1%;">

            <?php if($val->uploaded==0 || ($val->uploaded==1 && $val->file->bizvault_user_uploaded_required_file_filename == NULL)){ ?>
              <div class="col-md-1 file-cell" style="padding: unset;">
                <div style="background-color: #4f81bd; padding: 4px 0 0px 0;">
                  <img src="<?php echo base_url(). "images/missing_file_icon.PNG";?>" height="51px;" width="57px;" onclick="choose_file(<?php echo $val->bizvault_user_required_filelist_id; ?>, <?php echo $user_id; ?>, <?php echo $folder->bizvault_default_folder_id ?>)">
                </div>
              </div>
            <?php }else{ ?>
              <div class="col-md-1 file-cell">
                <i class="fa fa-file" style="color: #FBD5B5;"></i>
              </div>
            <?php } ?>
            <?php if($val->uploaded==0){ ?>
              <div class="col-md-6 file-cell columnSecond" style="margin:0 3%;" onclick="choose_file(<?php echo $val->bizvault_user_required_filelist_id; ?>, <?php echo $user_id; ?>, <?php echo $folder->bizvault_default_folder_id ?>)"><?php echo $val->bizvault_user_required_filelist_filename; ?></div>
            <?php }else{ ?>
              <div class="col-md-6 file-cell columnSecond" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" style="margin:0 3%;"><?php echo $val->bizvault_user_required_filelist_filename; ?></div>
            <?php } ?>
            <?php if($val->uploaded==0){ ?>
            <div class="col-md-4 columnThird">
              <div style="background-color:#4AACC9;text-align: center;"> <span style="color: #ffff;font-size: 18px" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">STATUS</span> </div>
              
                <div style="text-align: center;background-color:#FFC000"> <span style="font-size: 22px" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">PLEASE UPLOAD!</span></div>
                <div class="mt-10 text-white text-center" style="background-color: #4f81bd;" data-toggle="collapse" data-target="#file_explanation<?php echo $key; ?>">
                  <span class="font-20">Don't Have This Document?<br>CLICK HERE</span>
                </div>
              </div>
              <?php }elseif ($val->uploaded==1 && $val->file->bizvault_user_uploaded_required_file_filename != NULL) { ?>
              <div class="col-md-3 columnThird">
              <div style="background-color:#4AACC9;text-align: center;"> <span style="color: #ffff;font-size: 18px" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">STATUS</span> </div>
                <div style="text-align: center;background-color:#8dea7b"> <span style="font-size: 22px" data-toggle="collapse" data-parent="#accordion" href="  #collapse<?php echo $key; ?>">UPLOADED</span></div>
              </div>
                <div class="col-md-1 text-center" style="padding: 0;width: 10%">
                  <img src="<?php echo base_url(). "images/lockunlock.gif";?>" height="51px;" width="57px;">
                  <marquee direction="left" scrolldelay="200" style="color: #e74609;">Secure and Ecrypted</marquee>
                  <!-- <span style="color: #e74609;">Secure and Ecrypted</span> -->
                </div>
              <?php }else{ ?>
              <div class="col-md-4 columnThird">
              <div style="background-color:#4AACC9;text-align: center;"> <span style="color: #ffff;font-size: 18px" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">STATUS</span> </div>
                <div style="text-align: center;background-color:#FFC000"> <span style="font-size: 22px" data-toggle="collapse" data-parent="#accordion" href="  #collapse<?php echo $key; ?>">UPLOAD PENDING</span></div>
                <div class="mt-10 text-white text-center" style="background-color: #4f81bd;">
                  <span class="font-20"><?php echo $val->file->bizvault_user_uploaded_required_file_file_explanation; ?></span>
                </div>
                </div>
              <?php } ?>
            
          </div>
        </div>
        <div id="file_explanation<?php echo $key; ?>" class="collapse">
          <div class="row" style=" margin-right: 2%; margin-left: 2%;">
            <div class="col-md-1"></div>
            <div class="col-md-6" style="margin:0 3%;"></div>
            <div class="col-md-4">
              <div style="background-color: #b7dde8; padding: 5px 5px 5px 5px;">
                <form id="file_upload_explanation_<?php echo $val->bizvault_user_required_filelist_id; ?>"  method="post">
                  <input type="hidden" name="file_id" value="<?php echo $val->bizvault_user_required_filelist_id; ?>">
                  <input type="hidden" name="folder_id" value="<?php echo $val->bizvault_user_required_filelist_folder_id; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                  <input type="radio" name="document" value="I dont know what this document is" required=""> I dont know what this document is<br>
                  <input type="radio" name="document" value="I am working on getting this document" required=""> I am working on getting this document<br>
                  <input type="radio" name="document" value="I am waiting for my accountant to get this document" required=""> I am waiting for my accountant to get this document<br>
                  <input type="radio" name="document" onclick="display_other_textbox(<?php echo $val->bizvault_user_required_filelist_id; ?>)" id="other_radio" value="other" required=""> Other<br>
                  <input type="text" class="form-control mt-5" id="other_text_<?php echo $val->bizvault_user_required_filelist_id; ?>" name="other_detail" style="display: none;">
                  <div class="text-center">
                      <button type="button" class="btn mt-5" onclick="file_upload_explanation(<?php echo $val->bizvault_user_required_filelist_id; ?>)">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse">
          <div class="box-body">
          <?php if($val->uploaded == 1 && $val->file->bizvault_user_uploaded_required_file_filename != NULL){ ?>
          <div class="row">
            <div class="col-md-offset-1 col-md-2" align="center">
            <button type="button" class="btn btn-success btn-sm btn-block" onclick="view_file(<?php echo $val->file->bizvault_user_uploaded_required_file_id; ?>)">VIEW</button>
            <button type="button" class="btn btn-danger btn-sm btn-block" onclick="delete_file(<?php echo $val->file->bizvault_user_uploaded_required_file_id; ?>)">DELETE</button>
            <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#grant-access-modal">GRANT ACCESS</button>
            </div>
            <div class="col-md-2" align="center">
            <h2><strong>UPLOADED</strong></h2>
            <h4><strong><?php echo date("m-d-Y", strtotime($val->file->bizvault_user_uploaded_required_file_upload_date)); ?></strong></h4>
            </div>
            <div class="col-md-2" align="center">
            <h2><strong>FILE SIZE</strong></h2>
            <h4><strong><?php echo formatSizeUnits($val->file->bizvault_user_uploaded_required_file_size); ?></strong></h4>
            </div>
            <div class="col-md-2" align="center">
            <h2><strong>FILE TYPE</strong></h2>
            <h4><strong><?php echo $val->file->bizvault_user_uploaded_required_file_extension; ?></strong></h4>
            </div>
            <div class="col-md-2" style="margin-top: 1%">
            <img src="<?php echo fileIconExt($val->file->bizvault_user_uploaded_required_file_extension); ?>" height="60px;" width="57px;">
            </div>
          </div>
          <?php }else{ ?>
            <div class="row text-center" id="row-no-file">
              <div class="col-md-12">
                <p><i>No File Uploaded Yet</i></p>
              </div>
            </div>
            <?php } ?>
            </div>
        </div>

        <div class="row" style="background-color:#d2d0d0; margin-right: 6%; margin-left: 2%; display: none;" id="panel_row_progress_<?php echo $val->bizvault_user_required_filelist_id; ?>">
          <div class="col-md-12 text-center uploading-file" style="background-color: #9bbb59;">
            <h3>UPLOADING</h3>
          </div>
          <div class="col-md-12" style="padding: 10px 10px 0px 10px;">
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</div>
<div class="modal fade" id="view-access-info-modal">
  <div class="modal-dialog">
    <div class="modal-content">
        <table class="table">
          <thead style="background-color: #17375E;">
            <tr class="font-20">
              <th class="text-center text-white" style="border: none;">User</th>
              <th class="text-center text-white" style="border: none;">Access</th>
              <th class="text-center text-white" style="border: none;">File/Folder</th>
              <th class="text-center text-white" style="border: none;">Expires</th>
            </tr>
          </thead>
          <tbody class="table">
            <?php if (count($request_access_info) == 0) { ?>
              <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }elseif (count($request_access_info) > 0) { 
              foreach ($request_access_info as $info) { ?>
              <tr style="background-color: #B8DEE6">
                <td style="border: none; width: 24%;">
                  <div class="row">
                    <div class="col-md-6">
                      <?php if ($info->user_pic != null) {?>
                        <img src="<?php echo "../..".$info->user_pic; ?>" style="width: 130%;border-radius: 30px;" >
                      <?php }else{ ?>
                        <img src="<?php echo base_url(). "images/placeholder.png"; ?>" style="width: 130%" >
                      <?php } ?>
                      
                    </div>
                    <div class="col-md-6">
                      <p class="font-10"><?php echo $info->user_fname." ".$info->user_lname; ?></p>
                      <p class="font-10"><?php echo $info->partner_name; ?></p>
                    </div>
                  </div>
                </td>
                <td class="text-center cus-td" style="border: none;" ><?php echo $info->request_access_type; ?></td>
                <td class="text-center cus-td" style="border: none;" ><?php echo $info->file_folder_name; ?></td>
                <?php 
                    $current_date = time();
                    $expiry_date =  date('l, F d, Y',strtotime($info->request_access_timestamp.' + '.$info->request_access_length.' Days'));
                    $expiry_date1 = strtotime($expiry_date);
                    $datediff =  $expiry_date1 - $current_date;
                    $newDate = round($datediff / (60 * 60 * 24));
                  ?>
                  <?php 
                    if ($newDate <= 0) { ?>
                  <td class="text-center" style="border: none;"><span style="color: red;">EXPIRED ON <br><strong><?php echo date('l, F d, Y',strtotime($expiry_date)); ?></strong></span></td>
                  <?php 
                    }else{ ?>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong><?php echo $expiry_date; ?></strong></span><br><em style=" color: red;">(Expires in <?php echo $newDate; ?> Day)</em></td>
                  <?php 
                    } ?>
              </tr>
            <?php }
                } ?>
          </tbody>
        </table>
    </div>
  </div>
</div>
<div class="modal fade" id="grant-access-modal">
  <div class="modal-dialog">
    <div class="modal-content custom-modal-2">
      <?php if(count($access_request)==0) { ?>
        <div>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <h1>No Access Request Found</h1>
      <?php } ?>
      <?php if(count($access_request)>0){
          foreach ($access_request as $value) { ?>
      <div class="row" id="hover-for-access">
        <div class="col-md-12">
          <div class="col-md-3 text-center">
            <?php if ($value->user_pic != null) { ?>
              <img src="<?php echo "../..".$value->user_pic; ?>" class="mt-20" width="63%" style="border-radius: 35px">
            <?php }else{ ?>
              <img src="<?php echo base_url().'images/placeholder.png'; ?>" class="mt-20" > 
            <?php } ?>
          </div>
          <div class="col-md-9 mb-10 haccess">
            <span><strong class="font-13"><?php echo $value->user_fname." ".$value->user_lname;?><br><?php echo $value->partner_name;?><br>Type: <?php echo $value->request_access_type;?><br>Date: <?php echo date("m/d/Y", strtotime($value->request_access_timestamp));?><br>Length: <?php echo $value->request_access_length;?> Days</strong></span>
          </div>
          <div class="row text-center " id="access-given">
            <div class="col-md-12">
              <a href="javascript:;" class="btn btn-grant-access mt-20 mb-20" id="grant-access-btn" data-toggle="modal" onclick="open_grant_access_modal(<?php echo $value->request_access_id; ?>)"><span class="text-white font-13">GRANT ACCESS</span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Another Model -->
        
        <?php  
            }
          } ?>
    </div>
  </div>
</div>

<form id="file_upload_form" action="" method="post" enctype="multipart/form-data" style="display:none">
  <input type="file" name="file" id="file" size="20">
  <input type="hidden" name="bizvault_user_required_filelist_id">
  <input type="hidden" name="user_id">
  <input type="hidden" name="folder_id">
  <input type="hidden" name="redirect_url">
</form>
<div class="modal fade" id="grant-access-modal_1">
  <div class="modal-dialog">
    <div class="modal-content" id="request_access_div">
      <?php  ?>
    </div>
  </div>
</div>

<script type="text/javascript">
  function file_upload_explanation(id){
    var url = $("#pkanban_url").val();
    var formData = new FormData($('#file_upload_explanation_'+id+'')[0]);
    $.ajax({
        type: "POST",
        processData: false,
        contentType: false,
        cache: false,
        url: ""+url+"file_manager/file_explanation",
        data: formData,
        success: function(data){
          //console.log(data);
          location.reload();
        }
    });
  }

  function display_other_textbox(id){
    //alert(id);
    $('#other_text_'+id+'').show();    
  }
  // $("#file_upload_explanation").on("submit",function(e){
  //   alert(); return false;
  //   e.preventDefault();
    
  // });

  // function progress_bar() {
  //   var elem = document.getElementById("progress-bar");   
  //   var width = 10;
  //   var id = setInterval(frame, 30);
  //   function frame() {
  //     if (width >= 100) {
  //       clearInterval(id);
  //     } else {
  //       width++; 
  //       elem.style.width = width + '%'; 
  //       elem.innerHTML = width * 1  + '%';
  //     }
  //   }
  // }

  load_summary(<?php echo $folder->completedPercentage; ?>, <?php echo $folder->missingFiles; ?>);

  function choose_file(bizvault_user_required_filelist_id, user_id, folder_id){
    var url = $("#pkanban_url").val();
    var redirect_url = ""+$("#base_url").val()+"tabs/bizVault.php?folder="+folder_id+"";
    $("input[name=bizvault_user_required_filelist_id]").val(bizvault_user_required_filelist_id);
    $("input[name=user_id]").val(user_id);
    $("input[name=folder_id]").val(folder_id);
    $("input[name=redirect_url]").val(redirect_url);
    $("#file_upload_form").attr("action", url+'file_manager/upload_predefied_file');
    $("#file").click();
  }

  function upload_file_and_form(formData){
    //var formData = new FormData($("#actionItemForm")[0]);
    $.ajax({
        url: "<?php echo site_url("file_manager/upload_predefied_file"); ?>",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,                         
        type: 'post',
        success: function(e){
          console.log(e);
          return false;
        },
        async: true,
        xhr: function () {
          var id = $("input[name=bizvault_user_required_filelist_id]").val();
          console.log(id);
          var fileName = $("#file")[0].files[0].name;
          var xhr = new window.XMLHttpRequest();
          //Upload Progress
          xhr.upload.addEventListener("progress", function (evt) {
            if (evt.lengthComputable) {
              var percentComplete = (evt.loaded / evt.total) * 100; 
              $('div.progress > div.progress-bar-upload').css({ "width": percentComplete + "%" });
              $('.uploading-file h3').html("Uploading["+fileName+"]");
              $("#panel_row_progress_"+id+"").show().find(".progress-bar").css("width", ""+percentComplete+"%").text(""+percentComplete+"%");
              //$("#panel_row_"+id+"").append('<div id="panel_row_progress_'+id+'" class="row" style="padding:10px;background-color:lightgrey;"><div class="col-md-12" style="padding:10px;background-color:green;text-align:center;">'+fileName+'</div><div class="col-md-12"><div class="progress"><div class="progress-bar" role="progressbar" style="width: '+percentComplete+'%;" aria-valuenow="'+percentComplete+'" aria-valuemin="0" aria-valuemax="100">'+percentComplete+'%</div></div><div></div>');
              if(percentComplete==100){
                setTimeout(function(){
                  $("#panel_row_progress_"+id+"").hide();
                  location.reload()
                }, 2000);
              }
            }
          }, false);
          return xhr;
        },
    });
  }

  $("#file").on("change", function(){
    var formData = new FormData($("#file_upload_form")[0]);
    upload_file_and_form(formData);
  });

  function show_access() {
    $(".access-div").toggle();
  }

  function open_grant_access_modal(id) {
    var url = $("#pkanban_url").val();
    $.post(""+url+"file_manager/open_grant_access_modal",{id:id}).done(function(e){
      $('#request_access_div').html(e);
      $('#grant-access-modal_1').modal('show');
    });
  }

  function grant_deny_request(id,val){
    var url = $("#pkanban_url").val();
    var type = $("#type").val();
    var length = $("#length").val();
    var task_id = $("#task_id").val();
    var folder_id = $("#folder_id").val();
    $.post(""+url+"file_manager/grant_deny_request", {id:id,val:val,type:type,length:length,task_id:task_id,folder_id:folder_id}).done(function(e){
      alert("Request "+val+" Successfully !");
      location.reload();
    });
  }
  function close_model(id){
    $("#grant-access-modal_1").modal('hide');
  }

// function hoverForAccess(id) {

//   $('#access-given').show();
 
// }

// function hoverout(id) {
//   $('#access-given').hide();
// }

// $(".haccess").hover(function(){
//   $('#access-given').show();
// },function(){
//   $('#access-given').hide();
// });

</script>
