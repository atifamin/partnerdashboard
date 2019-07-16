<?php
include("../base_path.php");
include("../../config/config_main.php");
$id = $_GET['h'];

$query = "SELECT * FROM bizvault_filedoc_list where id = ".$id."";
$query_run = mysqli_query($con_MAIN,$query);
$query_row = (object)mysqli_fetch_assoc($query_run);
?>
<iframe src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $query_row->full_path; ?>" frameborder="0" style="width:100%;height:100%;"></iframe>