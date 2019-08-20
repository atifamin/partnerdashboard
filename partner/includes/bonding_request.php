<?php include "../config/config_taskboard.php"; ?>
<?php 

$q = "update tasks set task_status = 'complete'";
$res = mysqli_query($con_TaskBoard, $q); 


?>