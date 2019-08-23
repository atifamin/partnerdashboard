<?php
$chevronsubContractOnlyMore = "";
$counter = 1;
$Tab1_Q1 = 'SELECT *
			FROM prime_contractor pc
			WHERE pc.dbe_firm_id = '.$FirmID.'
			ORDER BY pc.contract_id DESC';
$Tab1_Q1R = mysqli_query($con_MAIN,$Tab1_Q1) or die(mysqli_error()); 
if(mysqli_num_rows($Tab1_Q1R)>0){ 
	while($Tab1_Q1D = mysqli_fetch_array($Tab1_Q1R)){
    $counter++;
?>
<div class="row">
	<div class="col-sm-12" style="padding-top: 25px;">
		<div class="widget-box transparent  collapsed">
			<div class="widget-header widget-header-flat" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
				<h4 class="widget-title lighter">
					<i class="ace-icon fa fa-rss orange"></i>
					Contract Details
					<a href="#contract_details<?php echo $counter ;?>" id="sub-more-cont-anc<?php echo $counter; ?>"  data-toggle="collapse" aria-expanded="true" aria-controls="contract_details<?php echo $counter ;?>">
					<i class="ace-icon fa fa-chevron-down pull-right" id="sub-more-cont-chev<?php echo $counter; ?>" style="color:white;"></i>
					</a>

					<?php
						
						$chevronsubContractOnlyMore .= "
							
						$('#sub-more-cont-anc".$counter."').click(function(){
						if($('#sub-more-cont-chev".$counter."').hasClass('ace-icon fa fa-chevron-down')){
							
							$('#sub-more-cont-chev".$counter."').removeClass('ace-icon fa fa-chevron-down');
							$('#sub-more-cont-chev".$counter."').addClass('ace-icon fa fa-chevron-up');
							
						}
						else{
							
							$('#sub-more-cont-chev".$counter."').removeClass('ace-icon fa fa-chevron-up');
							$('#sub-more-cont-chev".$counter."').addClass('ace-icon fa fa-chevron-down');
						}
					});
						";
					
					?>
				</h4>
			</div>
			<div class="collapse" id="contract_details<?php echo $counter ;?>">
				<div class="widget-main">
					<table class="table table-bordered primetable"> 

						<tbody>
							<tr>
								<td><strong>Contract Number</strong></td>
								<td><b class="dark-blue"><?php echo $Tab1_Q1D['contract_number']; ?></b></td> 
							</tr>
							<tr>
								<td><strong>Description</strong></td>
								<td><b class="dark-blue"><?php echo $Tab1_Q1D['description_of_work']; ?></b></td> 
							</tr>
							<tr>
								<td><strong>Location</strong></td>
								<td><b class="dark-blue"><?php echo $Tab1_Q1D['dist_co_rte_pm']; ?></b></td> 
							</tr>
							<!-- <tr>
								<td><strong>Amount</strong></td>
								<td><b class="dark-blue">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></b></td> 
							</tr> -->
							<tr>
								<td><strong>Bid Win Date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </strong></td>
								<td><b class="dark-blue"><?php echo date('M d, Y',strtotime($Tab1_Q1D['award_date'])); ?></b></td> 
							</tr> 
							<tr>
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Contract <br> Amount</p></td>
							<td style="width:85px;"><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></td>
							<td style="width:37%;"><a type="button" data-toggle="modal" data-target="#modal-default2"><img src="<?php echo base_url;  ?>assets/img/get_financing.PNG" style="cursor: pointer;width: 100%;height: 100%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancing(<?php echo $Tab1_Q1D['contract_id']; ?>)"></a></td>
							</tr>
							<tr>
							<td style="width:85px;"><p style="font-size:40px;font-weight:600;color:grey;text-align:center;">Bonding <br> Requirement</p></td>
							<td style="width:85px;"><p style="color:#12afdae0;font-size:35px;text-align:center;margin-top:10%;">$<?php echo number_format($Tab1_Q1D['award_amount'],0); ?></p></td>
							<td style="width:35%;"><a type="button" data-toggle="modal" data-target="#modal-bonding-services-sub-contractors-only-more"><img src="<?php echo base_url;  ?>assets/img/bonding_services.PNG" style="cursor: pointer;width: 100%;height: 50%;margin-bottom: 5px;" alt="Get Financing" onclick="getFinancing(<?php echo $Tab1_Q1D['contract_id']; ?>);" ></a></td>
							</tr>
						</tbody>
					</table>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col --> 
	<div style="clear:both;height:0px;"></div> 
	
</div><!-- /.row -->
<div style="clear:both;height:0px;"></div> 
<?php  
	} // While Close
	}else{ 
?>
<div class="row">
	<div class="col-sm-12">
		<div class="alert alert-danger">There are no contracts</div>
	</div>
</div>
<?php		
	} ?> 
<div class="modal fade" id="modal-default2">
	<div class="modal-dialog" style="width:80%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 	<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Contract Financing Options</h4>
			</div>
			<div class="modal-body">
				<?php include "./financial_services.php"; ?>

			</div>

			<div class="modal-footer" >
			<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade modal-scroll" id="modal-bonding-services-sub-contractors-only-more">
  	<div class="modal-dialog" style="width:80%;">
        <div class="modal-content">
          <div class="modal-header bg-custom-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-white">CALIFORNIA CERTIFIED BUSINESS SURETY BONDING SERVICES</h3>
          </div>
          <div class="modal-body">
            <?php include "./bonding_services.php"; ?>
          </div>
          <div class="modal-footer" >
          </div>
        </div>
  	</div>
</div>


<script type="text/javascript">
	
</script>
	
	
	
	
	