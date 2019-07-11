<?php foreach($folderTypes as $folderType): ?>
<?php $sub_folders = $this->file_manager_model->get_folders(0, $folderType->id); ?>
<div class="col-md-12 main-folder-area-title">
  <p><span><?php echo $folderType->name; ?></span></p>
</div>
<?php if($folderType->slug=="business"){ ?>
<div class="col-md-12 folder" onclick="open_business_folder('Basic')">
  <div class="col-md-2 main-folder-area-icon" ><i class="fa fa-folder"></i></div>
  <div class="col-md-8 main-folder-area-content">
    <h3 contenteditable="false">Basic Business Financials</h3>
    <p style="color:#4484f1;">Basic Business financials typically requested</p>
  </div>
</div>
<div class="col-md-12 folder" onclick="open_business_folder('Detail')">
  <div class="col-md-2 main-folder-area-icon" ><i class="fa fa-folder"></i></div>
  <div class="col-md-8 main-folder-area-content">
    <h3 contenteditable="false">Detailed Business Financials</h3>
    <p style="color:#4484f1;">Detail business financials needed for complex transactions</p>
  </div>
</div>
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