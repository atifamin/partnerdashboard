<div class="col-md-12 main-folder-area-title">
    <p><span><?php echo $folderType->bizvault_default_folder_title_text; ?></span></p>
  </div>
  <?php
    //  if(isset($files_breadcrumb)){
    //     if(count($files_breadcrumb)>0){
    //       $breadCount = 0;
    //       foreach($files_breadcrumb as $bread){
    //         $nextIcon = '';
    //         if($breadCount>0){
    //           $nextIcon = '<i class="fa fa-angle-right" style="color:#686b6d;font-size:1.3rem;"></i>';
    //         }
    //         echo '&nbsp; '.$nextIcon.' <a href="javascript:;" onclick="open_other_inner_folder('.$bread->id.', \''.$bread->slug.'\')" style="color:#2239ab;font-size:1.3rem;border-bottom: 1px solid;">'.$bread->name.'</a>';
    //          $breadCount++;
    //       }
    //     }
    //   }
    ?>
  <?php if(isset($files_breadcrumb) && count($files_breadcrumb)>0): ?>
  <div class="row" style="padding-left:6%;padding-right:6%;">
  <div class="col-md-12">
  <ol class="breadcrumb breadcrumb-arrow">
		<li><a href="javascript:home_breadcrumb()">Home</a></li>
    <?php foreach($files_breadcrumb as $key=>$bread): ?>
		<?php if(count($files_breadcrumb)-1==$key){ ?>
      <li class="active"><span><?php echo $bread->bizvault_user_other_sub_folder_title_text; ?></span></li>
    <?php }else{ ?>
    <li><a href="javascript:;" onclick="open_other_inner_folder(<?php echo $bread->bizvault_user_other_sub_folder_id; ?>, '<?php echo $bread->bizvault_user_other_sub_folder_slug; ?>')"><?php echo $bread->bizvault_user_other_sub_folder_title_text; ?></a></li>
    <?php } ?>
    <?php endforeach; ?>
		<!-- <li class="active"><span>Data</span></li> -->
	</ol>
  </div>
  </div>
  <?php endif; ?>
  <div id="folders_area">
    <?php //echo "<pre>"; print_r($sub_folders);exit; ?>
  <?php if(count($sub_folders)>0){ ?>
  <?php foreach($sub_folders as $sub){ ?>
  <div class="col-md-12 folder"  id="folder_id_<?php echo $sub->bizvault_user_other_sub_folder_id; ?>">
    <div onclick="open_other_inner_folder(<?php echo $sub->bizvault_user_other_sub_folder_id; ?>, '<?php echo $sub->bizvault_user_other_sub_folder_slug; ?>')" class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div>
    <div onclick="open_other_inner_folder(<?php echo $sub->bizvault_user_other_sub_folder_id; ?>, '<?php echo $sub->bizvault_user_other_sub_folder_slug; ?>')" class="col-md-8 main-folder-area-content">
      <h3 id="folder_<?php echo $sub->bizvault_user_other_sub_folder_id; ?>" onblur="change_folder_name(<?php echo $sub->bizvault_user_other_sub_folder_id; ?>,$(this).html())" contenteditable="false"><?php echo $sub->bizvault_user_other_sub_folder_title_text; ?></h3>
      <p>Updated 3 days ago by testOne 17.5MB</p>
    </div>
    <div class="col-md-2">
        <span onclick="edit_folder(<?php echo $sub->bizvault_user_other_sub_folder_id; ?>)" style="color:#488dc9;" ><i class="fa fa-edit"></i></span>&nbsp;&nbsp;&nbsp;<span 
        onclick="remove_folder(<?php echo $sub->bizvault_user_other_sub_folder_id; ?>)" style="color:red"><i class="fa fa-trash"></i></span>
    </div>
    
  </div>
  
  <?php }  ?>
  

  <?php } ?>
  <?php if (count($files)>0) {
    foreach($files as $file){ ?>
  <?php include(APPPATH."views/file_manager/load_other_files.php"); ?>
  <?php } ?>
  <?php } ?>

  </div>

<script>
    $("#parent_id").val(<?php if(isset($folder)){echo $folder->id;}else{echo 0;} ?>);
    $("#bizvault_files_and_folders_id").val(<?php if(isset($folder)){echo $folder->bizvault_files_and_folders_id;}else{echo $bizvault_files_and_folders_id;} ?>);

  
 
</script>