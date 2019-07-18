
<?php if (count($files) > 0) { ?> 
<?php foreach($files as $file){ ?>
<?php include(APPPATH."views/file_manager/load_other_files.php"); ?>
<?php } ?>
<?php } ?>