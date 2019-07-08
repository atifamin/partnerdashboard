<?php
$Host	= 'localhost';
$User	= 'root';
$Pass	= '';
$DB		= 'partnerdashboard';

$con_MAIN = mysqli_connect($Host,$User,$Pass);
if(!$con_MAIN){echo 'Server Not Connect!';exit;}

$Db_Con_Main = mysqli_select_db($con_MAIN,$DB);
if(!$Db_Con_Main){echo 'Database Not Connect!';exit;}
?>