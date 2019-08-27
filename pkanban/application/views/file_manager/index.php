
<?php foreach($folderTypes as $folderType): ?>
<?php $sub_folders = $this->file_manager_model->get_folders(0, $folderType->bizvault_folder_category_id); ?>
<div class="col-md-12 main-folder-area-title">
  <p><span><?php echo $folderType->bizvault_folder_category_type; ?></span></p>
</div>
<!-- User uploaded files, documents and records -->
<?php foreach($folderType->folders as $key=>$subFolder){ ?>
<?php if($subFolder->bizvault_default_folder_slug != "User uploaded files, documents and records"){ ?>
<div class="col-md-12 folder bizvault_folder" completed="<?php echo $subFolder->completedPercentage; ?>" missing="<?php echo $subFolder->missingFiles; ?>" onclick="open_folder(<?php echo $subFolder->bizvault_default_folder_id; ?>)">
  <div class="col-md-2 main-folder-area-icon" ><i class="fa fa-folder"></i></div>
  <div class="col-md-8 main-folder-area-content">
    <h3 contenteditable="false"><?php echo $subFolder->bizvault_default_folder_title_text; ?></h3>
    <?php if(!empty($subFolder->bizvault_default_folder_desription)){ ?>
    <p style="color:#4484f1;"><?php echo $subFolder->bizvault_default_folder_desription; ?></p>
    <?php } ?>
  </div>
</div>
<?php  } ?>
<?php } ?>
<?php  if($subFolder->bizvault_default_folder_slug=="User uploaded files, documents and records"){ ?>
<div class="col-md-12 folder" onclick="open_other_folder()">
  <div class="col-md-2 main-folder-area-icon" ><i class="fa fa-folder"></i></div>
  <div class="col-md-8 main-folder-area-content">
    <h3 contenteditable="false"><?php echo $subFolder->bizvault_default_folder_title_text; ?></h3>
    <p><?php echo $subFolder->bizvault_default_folder_desription; ?></p>
  </div>
</div>
<?php  } ?>
<?php endforeach; ?>

<script type="text/javascript">
$('.bizvault_folder').hover(function(){
  load_summary($(this).attr("completed"), $(this).attr("missing"));
});
$(".bizvault_folder").on({
  mouseenter: function(){
    $('#summary_preview').show();
  }, 
  mouseleave: function(){
    $('#summary_preview').hide();
  },
});
</script>