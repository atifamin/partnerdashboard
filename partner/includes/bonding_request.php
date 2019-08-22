<?php include "../config/config_taskboard.php"; ?>
<?php 

$q = "update tasks set task_status = 'complete' where task_id = '".$_POST['task_id']."'";
$res = mysqli_query($con_TaskBoard, $q); 


?>