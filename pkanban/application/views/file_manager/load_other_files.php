
<div class="col-md-12 folder"  id="file_id_<?php echo $file->bizvault_user_other_uploaded_file_id; ?>">
    <div class="col-md-2 main-folder-area-icon"><img src="<?php echo base_url()."uploads/temp/".$file->bizvault_user_other_uploaded_filename; ?>" style="width: 70px"></div>
    <div class="col-md-8 main-folder-area-content">
      <h3><?php echo substr($file->bizvault_user_other_uploaded_filename, 0 , 50); ?></h3>
    </div>
    <div class="col-md-2">
        <!-- <span onclick="edit_file(<?php //echo $file->id; ?>)" style="color:#488dc9;" ><i class="fa fa-edit"></i></span> -->&nbsp;&nbsp;&nbsp;&nbsp;<span 
        onclick="remove_file(<?php echo $file->bizvault_user_other_uploaded_file_id; ?>)" style="color:red"><i class="fa fa-trash"></i></span>
    </div>
    
</div>
