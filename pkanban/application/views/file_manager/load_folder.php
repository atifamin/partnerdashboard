
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
?>
<div class="row">
  <div class="col-md-4" style="padding-right: unset;">
    <button type="button" class="btn btn-sm btn-block btn-style" onclick="show_access()"><strong class="btn-text"><?php echo $folder->name; ?></strong></button>
  </div>
  <div class="col-md-8" style="padding-left: unset;">
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
      <div class="panel box box-primary">
        
        <div class="box-header with-border">
          <!-- <h4 class="box-title">  Collapsible Group Item #1  </h4> -->
          <div class="row" style="margin-right: 1%;margin-left: 1%;">
          <div class="col-md-1 file-cell">
          <?php if($val->uploaded==0){ ?>
          <i class="far fa-file" style="color: #FBD5B5;" onclick="choose_file(<?php echo $val->id; ?>, <?php echo $user_id; ?>, <?php echo $folder->id ?>)"></i>
          <?php }else{ ?>
          <i class="fa fa-file" style="color: #FBD5B5;" onclick="choose_file(<?php echo $val->id; ?>, <?php echo $user_id; ?>, <?php echo $folder->id ?>)"></i>
          <?php } ?>
          </div>
          <div class="col-md-6 file-cell columnSecond" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>" style="margin:0 3%;"><?php echo $val->name; ?></div>
          <div class="col-md-4 columnThird" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">
          <div style="background-color:#4AACC9;text-align: center;"> <span style="color: #ffff;font-size: 18px">STATUS</span> </div>
          <?php if($val->uploaded==0){ ?>
          <div style="text-align: center;background-color:#FFC000"> <span style="font-size: 22px">PLEASE UPLOAD!</span></div>
          <?php }else{ ?>
          <div style="text-align: center;background-color:#8dea7b"> <span style="font-size: 22px">UPLOADED</span></div>
          <?php } ?>
          </div>
          </div>
        </div>
        <div id="collapse<?php echo $key; ?>" class="panel-collapse collapse">
          <div class="box-body">
          <?php if($val->uploaded==1){ ?>
          <div class="row">
            <div class="col-md-offset-2 col-md-2" align="center">
            <button type="button" class="btn btn-success btn-sm btn-block" onclick="view_file(<?php echo $val->file->id; ?>)">VIEW</button>
            <button type="button" class="btn btn-danger btn-sm btn-block" onclick="delete_file(<?php echo $val->file->id; ?>)">DELETE</button>
            <button type="button" class="btn btn-primary btn-sm btn-block">GRANT ACCESS</button>
            </div>
            <div class="col-md-2" align="center">
            <h2><strong>UPLOADED</strong></h2>
            <h4><strong><?php echo date("d-m-Y", strtotime($val->file->created_at)); ?></strong></h4>
            </div>
            <div class="col-md-2" align="center">
            <h2><strong>FILE SIZE</strong></h2>
            <h4><strong><?php echo formatSizeUnits($val->file->file_size); ?></strong></h4>
            </div>
            <div class="col-md-2" align="center">
            <h2><strong>FILE TYPE</strong></h2>
            <h4><strong><?php echo $val->file->file_extension; ?></strong></h4>
            </div>
          </div>
          <?php }else{ ?>
          <div class="row"><div class="col-md-12" style="padding:2% 0;text-align:center;"><p><i>No File Uploaded Yet</i></p></div></div>
          <?php } ?>
          </div>
        </div>
      </div>
      <?php endforeach; endif; ?>
      <!-- <div class="panel box box-danger">
        <div class="box-header with-border">
          <h4 class="box-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Collapsible Group Danger </a> </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="box-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
            nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
            labore sustainable VHS. </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> Collapsible Group Success </a> </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
          <div class="box-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
            wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
            assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
            nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
            farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
            labore sustainable VHS. </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
<div class="modal fade" id="view-access-info-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white text-center custom-modal">
        <h3 class="modal-title">CLOUDBOX ACCESS</h3>
      </div>
      
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
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?php echo base_url(). "images/placeholder.png"; ?>" style="width: 130%" >
                      </div>
                      <div class="col-md-6">
                        <span class="font-10">First Name<br>Last Name<br>Company/Org</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-center cus-td" style="border: none;" >VIEW</td>
                  <td class="text-center cus-td" style="border: none;" >Basic<br>Business Financials</td>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong>Monday, August 12, 2019</strong></span><br><em class="text-red" ">(Expires in 1 Day)</em></td>
              </tr>
              <tr style="background-color:  #92CDDE">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?php echo base_url()."images/placeholder.png"; ?>" style="width: 130%" >
                      </div>
                      <div class="col-md-6">
                        <span class="font-10">First Name<br>Last Name<br>Company/Org</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-center cus-td" style="border: none;" >VIEW DOWNLOAD</td>
                  <td class="text-center cus-td" style="border: none;" ><span class="mt-10">VIEW FILES...</span></td>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong>Monday, August 12, 2019</strong></span><br><em class="text-red" ">(Expires in 1 Day)</em></td>
              </tr>
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <img src="<?php echo base_url(). "images/placeholder.png"; ?>" style="width: 130%" >
                      </div>
                      <div class="col-md-6">
                        <span class="font-10">First Name<br>Last Name<br>Company/Org</span>
                      </div>
                    </div>
                  </td>
                  <td class="text-center cus-td" style="border: none;" >VIEW</td>
                  <td class="text-center cus-td" style="border: none;" >Basic<br>Business Financials</td>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong>Monday, August 12, 2019</strong></span><br><em class="text-red" >(Expires in 1 Day)</em></td>
              </tr>
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
              <a href="javascript:;" class="btn btn-grant-access mt-20 mb-20" data-toggle="modal" onclick="open_grant_access_modal(<?php echo $value->request_access_id; ?>)"><span class="text-white font-13">GRANT ACCESS</span></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Another Model -->
        <div class="modal fade" id="grant-access-modal-<?php echo $value->request_access_id;?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body" style="background-color: #DCE6F2">
                  <div class="row mt-20">
                    <div class="col-md-2 col-md-offset-2">
                      <?php if ($value->user_pic != null) { ?>
                        <img src="<?php echo "../..".$value->user_pic; ?>" class="mt-30" style="width: 75px;margin-top: 25px;border-radius: 35px">
                      <?php }else{ ?>
                        <img src="<?php echo base_url()."images/placeholder.png"; ?>" class="mt-30" style="width: 75px;">
                      <?php  } ?>
                    </div>
                    <div class="col-md-6">
                      <p><?php echo $value->user_fname." ".$value->user_lname;?></p>
                      <p><?php echo $value->partner_name;?></p>
                      <p>Type: <?php echo $value->request_access_type;?></p>
                      <p>Date: <?php echo date("m/d/Y", strtotime($value->request_access_timestamp));?></p>
                      <p>Length: <?php echo $value->request_access_length;?> Days</p>
                    </div>
                  </div>
                  <div class="row mt-10">
                    <div class="col-md-6 col-md-offset-3">
                      <h2 class="font-20 btn-2 text-center"><?php echo $value->request_access_type ?></h2>
                      <h2 class="font-20 mt-10 btn-2 text-center"><?php echo $value->request_access_length;?> Days</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 col-md-offset-2 mt-15" style="margin-top: 15px">
                      <a href="javascript:grant_deny_request(<?php echo $value->request_access_id; ?>,'ok')" class="btn font-20 btn-ok">OK</a>
                      <a href="javascript:grant_deny_request(<?php echo $value->request_access_id; ?>,'deny')" class="btn font-20 btn-deny">DENY</a>
                      <a href="javascript:close_model(<?php echo $value->request_access_id; ?>)" class="btn font-20 btn-cancal">CANCEL</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php  
            }
          } ?>
    </div>
  </div>
</div>

<form id="file_upload_form" action="" method="post" enctype="multipart/form-data" style="display:none">
  <input type="file" name="file" id="file" size="20">
  <input type="hidden" name="bizvault_files_and_folders_id">
  <input type="hidden" name="user_id">
  <input type="hidden" name="folder_id">
  <input type="hidden" name="redirect_url">
</form>

<script>
load_summary(<?php echo $folder->completedPercentage; ?>, <?php echo $folder->missingFiles; ?>);
function choose_file(bizvault_files_and_folders_id, user_id, folder_id){
  var url = $("#pkanban_url").val();
  var redirect_url = ""+$("#base_url").val()+"tabs/bizVault.php?folder="+folder_id+"";
  $("input[name=bizvault_files_and_folders_id]").val(bizvault_files_and_folders_id);
  $("input[name=user_id]").val(user_id);
  $("input[name=folder_id]").val(folder_id);
  $("input[name=redirect_url]").val(redirect_url);
  $("#file_upload_form").attr("action", url+'file_manager/upload_predefied_file');
  $("#file").click();
}

$("#file").on("change", function(){
  $("#file_upload_form").submit();
});

function show_access() {
  $(".access-div").toggle();
}

function open_grant_access_modal(id) {
  $('#grant-access-modal-'+id+'').modal('show');
}

function grant_deny_request(id,val){
  var url = $("#pkanban_url").val();
  $.post(""+url+"file_manager/grant_deny_request", {id:id,val:val}).done(function(e){
    location.reload();
  });
}
function close_model(id){
  $("#grant-access-modal-"+id+"").modal('hide');
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
