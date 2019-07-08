<style>
ul.paging{margin: 0px 0px 3px -9px;padding:24px;padding-bottom: 10%;}
ul.paging li{list-style:none;float:left;}
ul.paging li a{background:#fff;color:#000;font-size:16px;border:1px solid #95B3D7;padding:3px 8px;} 
ul.paging li a:hover{background:#95B3D7;text-decoration:none;}
ul.paging li a.active{background:#95B3D7;}
.tabpane_best_1{
	background:#506228;
	color:white;
	width:100%;
	padding:4px;
}
.nav-tabs-custom>.nav-tabs>li>a{
	color:white;
}
#myTab31>li>a{
	color:white;
}
.nav-tabs-custom>ul li:nth-child(3)>a{
	color:#506228;
}
.nav-tabs-custom>ul li:nth-child(4)>a{
	color:#506228;
}
.tabpane_best_2{
	background:#76953D;
	width:100%;
	padding:4px;
}
.tabpane_best_3{
	background:#C3D79C;
	width:100%;
	padding:4px;
}
.tabpane_best_4{
	background:#D6E3C5;
	width:100%;
	padding:4px;
}
.blog_post_heading{
	background:#b3cbe0;padding:2%;font-size: 25px;
}
.blog_post_heading>p{
	background:aliceblue;
}
.contentS{
	background:aliceblue;padding:5%;
}

</style>

<div class="col-sm-12">
		<div class="widget-box" style="float: left; width: 100%;">
			<div class="widget-header widgetheading" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
				<h4 class="smaller"><i class="ace-icon glyphicon glyphicon-list"></i> BEST PRACTICES: Biz Tips</h4>
			</div>
<div class="widget-body">
			<?php
				$Tab2_Q4 = 'SELECT `cfm_id`,`title`,`content_code` FROM `cfm` WHERE `type`="Best Practices"';
				$Tab2_Q4R = mysqli_query($con_PRMSUB,$Tab2_Q4) or die(mysqli_error());
				$Count = mysqli_num_rows($Tab2_Q4R);
			?>
				<div class="widget-main no-padding">
					<div class="col-sm-12" style="padding:0px;">
		<!-- <div class="nav-tabs-custom"> -->
		  <div class="row" style="background: white;margin-left: 1px;margin-right: 1px;">
		   <div class="col-lg-4" style="border-style: solid;border-color: #d8dbdf;border-width:4px;">
			<ul style="list-style-type:none;margin-left: -41px;margin-top:6%;" id="myTab31" > 
		
				<?php
					$Tab2_Q5 = 'SELECT `cfm_id`,`content_code` FROM `cfm` WHERE `type`="Best Practices" LIMIT 1';
					$Tab2_Q5R = mysqli_query($con_PRMSUB,$Tab2_Q5) or die(mysqli_error());
					$Tab2_Index5 = 1;
					$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);
					$ContentCode = $Tab2_Q5D['content_code'];
				?>
				<li style="background:#506228;width:100%;padding:4px;"> 
					<a style="color:white;"><input <?php if(strpos($ContentCode,'GM') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> General Management</a>
				</li>
				<li style="background:#76953D;width:100%;padding:4px;"> 
					<a style="color:white;"><input <?php if(strpos($ContentCode,'CI') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Cash In</a>
				</li>
				<li style="background:#C3D79C;width:100%;padding:4px;"> 
					<a style="color:#506228;"><input <?php if(strpos($ContentCode,'CO') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Cash Out</a>
				</li>
				<li style="background:#D6E3C5;width:100%;padding:4px;"> 
					<a style="color:#506228;"><input <?php if(strpos($ContentCode,'MI') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Miscellaneous</a>
				</li>
			</ul>
			<div id="paginationresponse" class="buttons_the_basic">
				<!--<input type="hidden" value="<?php echo $Tab2_Q5D['cfm_id']; ?>" id="current_cfm_id" />
				<button id="firstbtn" onclick="loadcfmdata('Previous')" type="button" disabled="disabled" class="the_basic_buttons">PREVIOUS</button>
				<button id="lastbtn" onclick="loadcfmdata('Next')" type="button" class="the_basic_buttons the_basic_buttons_next">NEXT</button>
				<!--<ul class="paging">
					<?php
						$Tab2_Q4 = 'SELECT `cfm_id` FROM `cfm` WHERE `type`="Best Practices"';
						$Tab2_Q4R = mysqli_query($con_PRMSUB,$Tab2_Q4) or die(mysqli_error());
						$Count = mysqli_num_rows($Tab2_Q4R); 
						if($Count>0){
							$Pagination = 1; 
							while($Indexes = mysqli_fetch_assoc($Tab2_Q4R)){
							if($Count == $Pagination){
								$Show = 'Last';
							}elseif($Pagination == 1){
								$Show = 'First';
							}else{$Show = '';}
					?>
					<li><a id="pagination_id_<?php echo $Indexes['cfm_id']; ?>" class="paginationli <?php if($Pagination == 1){echo 'active';} ?>" onclick="load_basic_practice(<?php echo $Indexes['cfm_id']; ?>,'<?php echo $Show; ?>')"><?php echo $Pagination; ?></a></li>
					<?php
							$Pagination++; }
						}
					?>
				</ul>-->
				<?php
					$Tab2_Q4 = 'SELECT `cfm_id` FROM `cfm` WHERE `type`="Best Practices"';
					$Tab2_Q4R = mysqli_query($con_PRMSUB,$Tab2_Q4) or die(mysqli_error());
					$Count = mysqli_num_rows($Tab2_Q4R); 
					if($Count>0){
					echo paginate_three('', 1, $Count, 1);
					}
				?> 
			</div>
			</div>
			<div class="col-lg-8">
			<input type="hidden" id="totalCFM" value="<?php echo $Count; ?>" />
			<div class="tab-content" style="background:white;min-height:222px;padding:0%;">  
				<div id="bestpractice_response_content">
				<?php 
					$Tab2_Q5 = 'SELECT * FROM `cfm` WHERE `type`="Best Practices" LIMIT 1';
					$Tab2_Q5R = mysqli_query($con_PRMSUB,$Tab2_Q5) or die(mysqli_error());
					$Tab2_Index5 = 1;
					while($Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R)){
				?>
				<div id="<?php echo replace_string(replace_string($Tab2_Q5D['content_code'],'_',' '),'_',','); ?>" class="tab-pane <?php if($Tab2_Index5 == 1){echo 'in active';} ?>">
						
					<?php if(diff_days_of_dates($Tab2_Q5D['creation_date'])<10){ ?>
						<div class="new_this_week">NEW This Week! </div> 
					<?php
						}elseif(diff_days_of_dates($Tab2_Q5D['creation_date'])<30){
					?>
						<div class="new_this_week">NEW</div> 
					<?php		
						}
					?>
					<div class="blog_post_heading" style="text-transform:uppercase;background:#376092;color:#ffcc00;padding:5px;"><span style="text-transform:uppercase;background:#376092;color:#ffcc00;"><?php echo $Tab2_Q5D['title']; ?></span></div>
					<div class="blog_post_heading" style="background:#b3cbe0;padding:2%;font-size: 25px;">
					
					<span style="text-transform:uppercase;"><?php echo $Tab2_Q5D['content_type']; ?></span> - 
					<span style="color:#fff;"><i>[Source: <?php echo $Tab2_Q5D['content_source']; ?>]</i></span></div>
					<div class="contentS" style="background:aliceblue;padding:4%;">
					<p style="padding:0px;color:#10253F;background:aliceblue;" ><?php echo substr($Tab2_Q5D['text'],0,500); ?></p>
					<a  <?php if($Tab2_Q5D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q5D['ref_url']; ?>" 
					style="color:#1f497d;font-size:19px;font-weight:700;" class="pull-right moreinfoa">READ MORE</a>
					</div>
				</div>
				<?php $Tab2_Index5++; } ?> 
				 </div>
				 </div>
				</div>
			</div>
		<!-- </div> -->
	</div> 
				</div> 
			</div>
		</div>
	</div>