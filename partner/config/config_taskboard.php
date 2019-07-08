<?php
$Host	= 'localhost';
$User	= 'root';
$Pass	= '';
$DB		= 'tbpikbfe_taskboard';
$con_TaskBoard = mysqli_connect($Host,$User,$Pass);
// print_r($con_TaskBoard);exit();
if(!$con_TaskBoard){echo 'Server Not Connect!';exit;}

$Db_Con_SCPR = mysqli_select_db($con_TaskBoard,$DB);
if(!$Db_Con_SCPR){echo 'Database Not Connect!';exit;}
?>