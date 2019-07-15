
<div class="col-md-12 main-folder-area-title">
    <p><span><?php echo $folderType->name; ?></span></p>
  </div>
  <?php
     if(isset($files_breadcrumb)){
        if(count($files_breadcrumb)>0){
          $breadCount = 0;
          foreach($files_breadcrumb as $bread){
            $nextIcon = '';
            if($breadCount>0){
              $nextIcon = '<i class="fa fa-angle-right" style="color:#686b6d;font-size:1.3rem;"></i>';
            }
            echo '&nbsp; '.$nextIcon.' <a href="javascript:;" onclick="open_folder('.$bread->id.', \''.$bread->slug.'\')" style="color:#2239ab;font-size:1.3rem;border-bottom: 1px solid;">'.$bread->name.'</a>';
             $breadCount++;
          }
        }
      }
    ?>
  <div id="folders_area">
    
  <?php if(count($sub_folders)>0){ ?>
  <?php foreach($sub_folders as $sub){ ?>
  <div class="col-md-12 folder"  id="folder_id_<?php echo $sub->id; ?>">
    <div onclick="open_folder(<?php echo $sub->id; ?>, '<?php echo $sub->slug; ?>')" class="col-md-2 main-folder-area-icon"><i class="fa fa-folder"></i></div>
    <div onclick="open_folder(<?php echo $sub->id; ?>, '<?php echo $sub->slug; ?>')" class="col-md-8 main-folder-area-content">
      <h3 id="folder_<?php echo $sub->id; ?>" onblur="change_folder_name(<?php echo $sub->id; ?>,$(this).html())" contenteditable="false"><?php echo $sub->name; ?></h3>
      <p>Updated 3 days ago by testOne 17.5MB</p>
    </div>
    <div class="col-md-2">
        <span onclick="edit_folder(<?php echo $sub->id; ?>)" style="color:#488dc9;" ><i class="fa fa-edit"></i></span>&nbsp;&nbsp;&nbsp;<span 
        onclick="remove_folder(<?php echo $sub->id; ?>)" style="color:red"><i class="fa fa-trash"></i></span>
    </div>
    
  </div>
  
  <?php }  ?>
  <?php }else{ ?>
    <div class="col-md-12" align="center" style="color:lightgrey;" id="no-content"><i>No Content Available.</i></div>
  <?php }; ?>
  </div>

<script>
    $("#parent_id").val(<?php echo $folder->id; ?>);
    $("#business_folder_type_id").val(<?php echo $folder->business_folder_type_id; ?>);

  
 
</script>