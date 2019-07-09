<div class="col-md-12 main-folder-area-title">
    <p><span><?php echo $folderType->name; ?></span></p>
  </div>
  <?php if(count($sub_folders)>0){ ?>
  <?php foreach($sub_folders as $sub){ ?>
  <div class="col-md-12 folder" onclick="open_folder(<?php echo $sub->id; ?>)">
    <div class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div>
    <div class="col-md-8 main-folder-area-content">
      <h3><?php echo $sub->name; ?></h3>
      <p>Updated 3 days ago by testOne 17.5MB</p>
    </div>
    <div class="col-md-2">
        <a href="javascript:;"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" style="color:red"><i class="fa fa-trash"></i></a>
    </div>
  </div>
  <?php }  ?>
  <?php }else{ ?>
    <div class="col-md-12 folder" align="center" style="color:lightgrey;"><i>No Content Available.</i></div>
  <?php }; ?>

<script>
    $("#parent_id").val(<?php echo $folder->id; ?>);
    $("#business_folder_type_id").val(<?php echo $folder->business_folder_type_id; ?>);
</script>