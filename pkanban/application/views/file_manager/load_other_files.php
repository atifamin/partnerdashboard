
<div class="col-md-12 folder"  id="file_id_<?php echo $file->id; ?>">
    <div class="col-md-2 main-folder-area-icon"><img src="<?php echo base_url()."uploads/temp/".$file->name; ?>" style="width: 70px"></div>
    <div class="col-md-8 main-folder-area-content">
      <h3><?php echo substr($file->file_name, 0 , 50); ?></h3>
    </div>
    <div class="col-md-2">
        <!-- <span onclick="edit_file(<?php //echo $file->id; ?>)" style="color:#488dc9;" ><i class="fa fa-edit"></i></span> -->&nbsp;&nbsp;&nbsp;&nbsp;<span 
        onclick="remove_file(<?php echo $file->id; ?>)" style="color:red"><i class="fa fa-trash"></i></span>
    </div>
    
</div>
