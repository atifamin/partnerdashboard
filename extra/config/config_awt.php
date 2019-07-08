<?php
$Host	= 'localhost';
$User	= 'root';
$Pass	= '';
$DB		= 'partnerdashboard';
$con_AWT = mysqli_connect($Host,$User,$Pass);
if(!$con_AWT){echo 'Server Not Connect!';exit;}

$Db_Con_AWT = mysqli_select_db($con_AWT,$DB);
if(!$Db_Con_AWT){echo 'Database Not Connect!';exit;}
?>