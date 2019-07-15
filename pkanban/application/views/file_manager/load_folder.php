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
}
</style>
<div class="row"> 
  <div class="col-md-12 files-table">
    <div class="file-header"><?php echo $folder->name; ?></div>
    <table class="table table-bordered">
      <tbody>
        <?php if(count($folder->files)>0): ?>
        <?php foreach($folder->files as $key=>$val): ?>
        <tr>
          <td class="file-cell" style="text-align: center;font-size: 30px;border: 10px solid #ffff">
          <?php if($val->uploaded==0){ ?>
            <i class="far fa-file" style="color: #FBD5B5;" onclick="choose_file(<?php echo $val->id; ?>, <?php echo $user_id; ?>, <?php echo $folder->id ?>)"></i>
          <?php }else{ ?>
            <i class="fa fa-file" style="color: #FBD5B5;" onclick="choose_file(<?php echo $val->id; ?>, <?php echo $user_id; ?>, <?php echo $folder->id ?>)"></i>
          <?php } ?>
          </td>
          <td class="file-cell" style="border: 10px solid #ffff"><?php echo $val->name; ?></td>
          <td ><div style="background-color:#4AACC9;text-align: center;"> <span style="color: #ffff;font-size: 18px">STATUS</span> </div>
            <?php if($val->uploaded==0){ ?>
            <div style="text-align: center;background-color:#FFC000"> <span style="font-size: 22px">PLEASE UPLOAD!</span></div>
            <?php }else{ ?>
              <div style="text-align: center;background-color:#8dea7b"> <span style="font-size: 22px">UPLOADED</span></div>
            <?php } ?>
            </td>
        </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
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
