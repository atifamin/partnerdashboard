<style type="text/css">
  
</style>

<div class="row">
  <div class="col-md-2 text-center">
    <img src="<?php echo base_url; ?>assets/img/bizVAULT-logo-trans.png" height="50px" class="" style="margin-top: 40px;">
  </div>
  <div class="col-md-2 bg-light-blue-1 text-center">
      <label class="mt-5">Your Private<br>bizVAULT™<br>Cloud Storage is<br>Ready</label><br>
      <button type="button" class="btn btn-primary mb-10" style="height: 33px;"><label class="text-white font-13">CLICK HERE TO ACCESS</label></button>
  </div>
  <div class="col-md-3 text-center">
    <img src="<?php echo base_url; ?>assets/img/bizvault_video_tour-large.png" width="200px" class="btn">
    <div class="v-line-left"></div>
  </div>
  <div class="col-md-2">
    <div class="row text-center" style="background-color: #4E80C6; width: 130px;">
      <div class="col-md-12" style="padding: 1px;">
        <span class="text-white" style="font-size: 12px;">ALL BASIC FILES HAVE<br>BEEN UPLOADED</span>
      </div>
    </div>
    <!-- <img src="<?php echo base_url; ?>assets/img/progress.PNG" width="100px" height="75px"> -->
  </div>
  <div class="col-md-3">
    <div class="v-line-right"></div>
    <a href="" class="light-blue" data-toggle="modal" data-target="#notification_model_top"><i class="fa fa fa-clock-o icon-clock"></i>&nbsp&nbsp&nbspYour bizVAULT™ Notification</a><br><br>
    <a href="" class="light-blue" data-toggle="modal" data-target="#activity_status_top"><i class="fa fa fa-heartbeat icon-hearbeat"></i>&nbsp&nbsp&nbspYour bizVAULT™ Activity Status</a><br><br>
    <a href="" class="light-blue" data-toggle="modal" data-target="#access_top"><i class="fa fa-users icon-user"></i>&nbsp&nbsp&nbspYour bizVAULT™ Access Status</a>
  </div>
</div>
<div class="col-md-12">
    <hr class="h-line">
</div>
<div class="row">
  <?php
	$CurrentYear = date('Y');
	$LastYear	 = $CurrentYear-1;
  ?>
  <div class="col-lg-3 col-xs-6"> 
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;">$<?php echo nice_number(totalContractRevenue($CurrentYear),'format'); ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL REVENUE</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>
      </div>
      <div class="icon"> <i class="fa fa-fw fa-dollar"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6"> 
    <!-- small box -->
    
    <?php
	  $thisYearTotalPrimeContracts1 = thisYearTotalPrimeContracts($CurrentYear);
	  $thisYearTotalSubContracts1 = thisYearTotalSubContracts($CurrentYear);
	  $TotalContractsThisYear1 = $thisYearTotalPrimeContracts1+$thisYearTotalSubContracts1;
	  $Lenght1 = strlen($TotalContractsThisYear1);
	  if($Lenght1>=3){
		$Style1 = 'style="font-size:44px;margin-top:63px;"';
	  }else{$Style1='';}
	?>
    <div class="small-box" id="small-box-tc">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;"><?php echo $TotalContractsThisYear1; ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL CONTRACTS</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>  
      </div>
      <div class="icon"> <i class="fa fa-fw fa-trophy"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <?php
	  $thisYearTotalPrimeContracts = thisYearTotalPrimeContracts($LastYear);
	  $thisYearTotalSubContracts = thisYearTotalSubContracts($LastYear);
	  $TotalContractsThisYear = $thisYearTotalPrimeContracts+$thisYearTotalSubContracts;
	  $Lenght = strlen($TotalContractsThisYear);
	  if($Lenght>=3){
		$Style = 'style="font-size:44px;margin-top:63px;"';
	  }else{$Style='';}
	?>
    <!-- small box -->
    <div class="small-box" id="small-box-sc">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;"><?php echo $TotalContractsThisYear; ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL SUB-CONTRACTS</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>
      </div>
      <div class="icon"> <i class="far fa-thumbs-up"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6"> 
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3 style="margin-bottom:0px!important;"><?php echo newBusinessOpp(); ?></h3>
        <span style="font-weight:600;font-size:20px;">TOTAL BIDS</span><br>
        <span style="font-weight:600;font-size:20px;"><?php echo date('Y'); ?></span>
      </div>
      <div class="icon"> <i class="fa fa-fw fa-group"></i> </div>
      <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
  </div>
  <!-- ./col --> 
</div>
<?php 
  $q1 = "SELECT bn.* from bizvault_notification as bn, bizvault_default_folder_names as bdfn, user as u 
        where u.user_id = bn.bizvault_notification_user_id AND bdfn.bizvault_default_folder_id = bn.bizvault_notification_filedoc_id";
  $res1 = mysqli_query($con_MAIN,$q1);
?>

<?php 
  $q3 = "SELECT ba.*,u.user_fname,u.user_lname,bdfn.bizvault_default_folder_title_text from 
        bizvault_activity as ba, user as u, bizvault_default_folder_names as bdfn
        where u.user_id = ba.bizvault_activity_user_id AND bdfn.bizvault_default_folder_id = ba.bizvault_activity_user_filedoc_id";
  $res3 = mysqli_query($con_MAIN,$q3);
?>

<?php
    $q2 = "SELECT ga.*, u.user_id,u.user_fname,u.user_lname, u.user_pic, p.partner_name, bdfn.bizvault_default_folder_title_text as file_folder_name  
      FROM
      grant_access as ga, user as u, partner as p, bizvault_default_folder_names as bdfn
      WHERE
      ga.grant_access_user_id = u.user_id AND
      u.partner_id = p.partner_id AND bdfn.bizvault_default_folder_id = ga.grant_access_filedoc_id ";
      $res2 = mysqli_query($con_MAIN,$q2);
?>
<div class="modal fade" id="notification_model_top">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: 0;background-color: #1F487E">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title text-center" style="color: #ffff;">bizVAULT™ Notifications</h3>
      </div>
      <div class="modal-body" style="padding: 0">
        <table class="table table-striped" id="tblGrid">
          <thead>
            <tr style="background-color: #0a274e">
              <th class="text-center" style="color: #fff;font-size: 18px; border: none;">Notification Title</th>
              <th class="text-center" style="color: #fff;font-size: 18px; border: none;">Notification Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res1->num_rows == 0) { ?>
             <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }else { ?>
            <?php while ($data = mysqli_fetch_array($res1)) { ?>
            <tr style="background-color: #31859D;">
              <td class="text-center text-white" id="custom_table_style" style="border: none;"><?php echo $data['bizvault_notification_title']; ?></td>
              <td class="text-center text-white" id="custom_table_style" style="border: none;"> <?php echo date("F d Y - g:i a",strtotime($data['bizvault_notification_date'])) ?></td>
            </tr>
            <?php } 
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="activity_status_top">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border: 0;background-color: #1F487E">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #ffff">×</button>
        <h3 class="modal-title text-center" style="color: #ffff;">bizVAULT Activity Status</h3>
      </div>
      
      <div class="modal-body" style="padding: 0">
        <table class="table table-striped">
          <thead>
            <tr style="background-color: #0a274e">
              <th class="text-center" style="color: #fff;font-size: 18px; border: none;">Activity</th>
              <th class="text-center" style="color: #fff;font-size: 18px; border: none;">Name</th>
              <th class="text-center" style="color: #fff;font-size: 18px; border: none;">File Name</th>
              <th class="text-center" style="color: #fff;font-size: 18px; border: none;">Activity Date</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($res3->num_rows == 0) { ?>
             <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }else { ?>
            <?php while ($row3 = mysqli_fetch_array($res3)) { ?>
            <tr style="background-color: #31859D;">
              <td class="text-center text-white " id="custom_table_style" style="border: none;"><?php echo $row3['bizvault_activity_type']; ?></td>
              <td class="text-center text-white " id="custom_table_style" style="border: none;"><?php echo $row3['user_fname']." ".$row3['user_lname']; ?></td>
              <td class="text-center text-white " id="custom_table_style" style="border: none;"><?php echo $row3['bizvault_default_folder_title_text']; ?></td>
              <td class="text-center text-white " id="custom_table_style" style="border: none;"><?php echo date('F-d-Y',strtotime($row3['bizvault_activity_date'])) ?></td>
            </tr>
            <?php } 
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="access_top">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-white text-center" style="height: 60px; background-color: #1F487E; border: none;">
        <h3 class="modal-title">bizVAULT ACCESS </h3>
      </div>
      
        <table class="table">
          <thead style="background-color: #17375E;">
            <tr style="font-size: 20px;">
              <th class="text-center text-white" style="border: none;">User</th>
              <th class="text-center text-white" style="border: none;">Access</th>
              <th class="text-center text-white" style="border: none;">File/Folder</th>
              <th class="text-center text-white" style="border: none;">Expires</th>
            </tr>
          </thead>
          <tbody class="table">
            <?php if ($res2->num_rows == 0) { ?>
             <tr style="background-color: #B8DEE6">
                <td colspan="4">
                  <h3 class="text-center">No Request Found !</h3>
                </td>
              </tr>
            <?php }else { ?>
            <?php while ($row = mysqli_fetch_array($res2)) { ?>
              <tr style="background-color: #B8DEE6">
                  <td style="border: none; width: 24%;">
                    <div class="row">
                      <div class="col-md-6">
                        <?php if ($row['user_pic'] != null) { ?>
                          <img src="<?php echo "../..".$row['user_pic']; ?>" style="width: 130%;border-radius: 30px" >
                        <?php }else{ ?>
                          <img src="<?php echo pkanban_url.'images/placeholder.png'; ?>" style="width: 130%" >
                        <?php } ?>
                        
                      </div>
                      <div class="col-md-6">
                        <p style="font-size: 11px;"><?php echo $row['user_fname']." ".$row['user_lname']?></p>
                        <p style="font-size: 11px;"><?php echo $row['partner_name']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td class="text-center" style="color: #45717A; border: none; font-size: 20px;"><?php echo $row['grant_access_type']; ?></td>
                  <td class="text-center" style="color: #45717A; border: none; font-size: 20px;"><?php echo $row['file_folder_name']; ?></td>
                  <?php 
                    $current_date = time();
                    $expiry_date1 = strtotime($row['grant_access_expiration_date']);
                    $datediff =  $expiry_date1 - $current_date;
                    $newDate = round($datediff / (60 * 60 * 24));
                  ?>
                  <td class="text-center" style="border: none;"><span style="color: #45717A;"><strong><?php echo date('l, F d, Y',strtotime($row['grant_access_expiration_date'])); ?></strong></span><br><em style=" color: red;">(Expires in <?php echo $newDate; ?> Day)</em><br><em style="color: #5EB2D5; font-size: 10px;">Click here to change Expiration Date</em></td>
              </tr>
            <?php } 
            } ?>
          </tbody>
        </table>
      </div>
    
  </div>
</div>