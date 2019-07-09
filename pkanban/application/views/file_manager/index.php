


  <?php foreach($folderTypes as $folderType): ?>
  <?php
    $sub_folders = $this->file_manager_model->get_folders(0, $folderType->id);
  ?>
  <div class="col-md-12 main-folder-area-title">
    <p><span><?php echo $folderType->name; ?></span></p>
  </div>
  <?php if(count($sub_folders)>0){ ?>
  <?php foreach($sub_folders as $sub){ ?>
  <div class="col-md-12 folder">
    <div class="col-md-2 main-folder-area-icon" onclick="open_folder(<?php echo $sub->id; ?>)"><i class="fa fa-folder"></i></div>
    <div class="col-md-8 main-folder-area-content" onclick="open_folder(<?php echo $sub->id; ?>)">
      <h3 contenteditable="false"><?php echo $sub->name; ?></h3>
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
<?php endforeach; ?>
