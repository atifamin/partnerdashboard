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
</style>
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
</script>
