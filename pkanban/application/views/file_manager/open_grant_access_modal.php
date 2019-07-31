<?php // echo "<pre>"; print_r($request_access_detail);exit; ?>

<div class="modal-body" style="background-color: #DCE6F2">
	<div class="row mt-20">
	  	<div class="col-md-2 col-md-offset-2">
	    <?php if ($request_access_detail->user_pic != null) { ?>
	      	<img src="<?php echo "../..".$request_access_detail->user_pic; ?>" class="mt-30" style="width: 75px;margin-top: 25px;border-radius: 35px">
	    <?php }else{ ?>
	      	<img src="<?php echo base_url()."images/placeholder.png"; ?>" class="mt-30" style="width: 75px;">
	    <?php  } ?>
	  	</div>
		<div class="col-md-6">
		   	<p><?php echo $request_access_detail->user_fname." ".$request_access_detail->user_lname;?></p>
		    <p><?php echo $request_access_detail->partner_name;?></p>
		    <p>Type: <?php echo $request_access_detail->request_access_type;?></p>
		    <p>Date: <?php echo date("m/d/Y", strtotime($request_access_detail->request_access_timestamp));?></p>
		    <p>Length: <?php echo $request_access_detail->request_access_length;?> Days</p>
		</div>
	</div>
	<div class="row mt-10">
	  	<div class="col-md-6 col-md-offset-3">
	    	<h2 class="font-20 btn-2 text-center pt-6"><?php echo $request_access_detail->request_access_type ?></h2>
	    	<h2 class="font-20 mt-10 btn-2 text-center pt-6"><?php echo $request_access_detail->request_access_length;?> Days</h2>
	  	</div>
	</div>
	<input type="hidden" id="type" value="<?php echo $request_access_detail->request_access_type ?>">
	<input type="hidden" id="length" value="<?php echo $request_access_detail->request_access_length ?>">
	<input type="hidden" id="task_id" value="<?php echo $request_access_detail->request_access_task_id ?>">
	<input type="hidden" id="folder_id" value="<?php echo $request_access_detail->request_access_filedoc_id ?>">

	<div class="row">
	  	<div class="col-md-8 col-md-offset-2 mt-15" style="margin-top: 15px">
	    	<a href="javascript:grant_deny_request(<?php echo $request_access_detail->request_access_id; ?>,'grant')" class="btn font-20 btn-ok">OK</a>
	    	<a href="javascript:grant_deny_request(<?php echo $request_access_detail->request_access_id; ?>,'deny')" class="btn font-20 btn-deny">DENY</a>
	    	<a href="javascript:close_model(<?php echo $request_access_detail->request_access_id; ?>)" class="btn font-20 btn-cancal">CANCEL</a>
	  	</div>
	</div>
</div>