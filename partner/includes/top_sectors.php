<!-- BEGIN Portlet PORTLET-->

<div class="portlet box green">
  <div class="portlet-title">
    <div class="caption">TOP SECTORS</div>
    <div class="tools"> <a href="javascript:;" class="collapse"> </a> </div>
  </div>
  <div class="portlet-body top_sectors" style="height: 182px;">
    <div class="row">
      <div class="col-lg-1">&nbsp;</div>
            
    
        <?php
                      $TopSectorQ = 'SELECT * FROM `scprs` ORDER BY `Award Total` ASC LIMIT 5';
                      $TopSectorQR = mysqli_query($con_SCPR,$TopSectorQ);
                      if(mysqli_num_rows($TopSectorQR)>0){
                        while($TopSectors = mysqli_fetch_assoc($TopSectorQR)){
                          $DepartmentName = $TopSectors['Business Unit Name'];
                          $DepartmentImg  = $TopSectors['Business Unit'];
                          if($DepartmentImg == ''){
                            $DeptImg = 'white_placeholder.PNG';
                          }else{ $DeptImg = $DepartmentImg; }
                        ?>
      <div class="col-lg-2 topsector"> <img src="assets/img/dept_<?php echo $DeptImg; ?>.PNG" class="img-responsive" alt="" />
        <div class="caption-subject bold font-grey-gallery deptname"><?php echo $DepartmentName; ?></div>
      </div>
      <?php 
   	
												}
											}else{
											?>
      <div class="caption-subject bold font-grey-gallery" style="text-align:center;color:#953735 !important;">No Sectors Available</div>
      <?php
											}
										?>
      <div class="col-lg-1">&nbsp;</div>
    </div>
  </div>
</div>
<!-- END Portlet PORTLET-->