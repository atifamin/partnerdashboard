
<?php foreach($folderTypes as $folderType): ?>
<?php $sub_folders = $this->file_manager_model->get_folders(0, $folderType->id); ?>
<div class="col-md-12 main-folder-area-title">
  <p><span><?php echo $folderType->name; ?></span></p>
</div>
<?php foreach($folderType->folders as $key=>$subFolder){ ?>
<?php if($folderType->slug!="other"){ ?>
<div class="col-md-12 folder bizvault_folder" completed="<?php echo $subFolder->completedPercentage; ?>" missing="<?php echo $subFolder->missingFiles; ?>" onclick="open_folder(<?php echo $subFolder->id; ?>)">
  <div class="col-md-2 main-folder-area-icon" ><i class="fa fa-folder"></i></div>
  <div class="col-md-8 main-folder-area-content">
    <h3 contenteditable="false"><?php echo $subFolder->name; ?></h3>
    <?php if(!empty($subFolder->description)){ ?>
    <p style="color:#4484f1;"><?php echo $subFolder->description; ?></p>
    <?php } ?>
  </div>
</div>
<?php } ?>
<?php } ?>
<?php if($folderType->slug=="other"){ ?>
<div class="col-md-12 folder" onclick="open_other_folder()">
  <div class="col-md-2 main-folder-area-icon" ><i class="fa fa-folder"></i></div>
  <div class="col-md-8 main-folder-area-content">
    <h3 contenteditable="false">Other Files</h3>
    <p>Updated 3 days ago by testOne 17.5MB</p>
  </div>
</div>
<?php } ?>
<?php endforeach; ?>

<script type="text/javascript">
// $('.bizvault_folder').hover(function(){
//   //load_summary($(this).attr("completed"), $(this).attr("missing"));
// });
$(".bizvault_folder").on({
	mouseenter: function(){
		$('#summary_preview').show();
	}, 
	mouseleave: function(){
		$('#summary_preview').hide();
	},
});
</script>