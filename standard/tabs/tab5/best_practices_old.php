
<style>
ul.paging{margin: 0px 0px 3px -13px;padding:24px;}
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
	/* color:white; */
}
#myTab31_tab5>li>a{
	color:white;
}
#myTab31_tab5 li:nth-child(3)>a{
	color:#506228;
}
#myTab31_tab5 li:nth-child(4)>a{
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

</style>

<div class="col-sm-12">
	<div class="widget-box" style="float: left; width: 100%;">
		<div class="widget-header widgetheading" style="background-color:#337ab7;color:white;padding:5px;border-style:solid;border-color:#d2d6de;margin-bottom: 5px;">
			<h4 class="smaller"><i class="ace-icon glyphicon glyphicon-list"></i> BEST PRACTICES: Contract Win Rate Tips</h4>
		</div>
<div class="widget-body">
		<?php
			$Tab2_Q4 = 'SELECT `bidwin_id`,`title`,`content_code` FROM `bidwin` WHERE `type`="Best Practices"';
			$Tab2_Q4R = mysqli_query($con_PRMSUB,$Tab2_Q4) or die(mysqli_error());
			$Count = mysqli_num_rows($Tab2_Q4R);
		?>
			<div class="widget-main no-padding">
				<div class="col-sm-12" style="padding:5px;background:white;">
	<div class="tabbable tabs-left">
	<div class="row">
		   <div class="col-lg-4" style="margin-top:2%;">
		<ul  id="myTab31_tab5" style="list-style-type:none;margin-left: -30px;"> 
			<?php
				$Tab2_Q5 = 'SELECT `bidwin_id`,`content_code` FROM `bidwin` WHERE `type`="Best Practices" LIMIT 1';
				$Tab2_Q5R = mysqli_query($con_PRMSUB,$Tab2_Q5) or die(mysqli_error());
				$Tab2_Index5 = 1;
				$Tab2_Q5D = mysqli_fetch_assoc($Tab2_Q5R);
				$ContentCode = $Tab2_Q5D['content_code'];
			?>
			<li class="tabpane_best_1"> 
				<a><input <?php if(strpos($ContentCode,'BD') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Bid Decisioning</a>
			</li>
			<li class="tabpane_best_2"> 
				<a><input <?php if(strpos($ContentCode,'BAP') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Bid Analysis & Pricing</a>
			</li>
			<li class="tabpane_best_3"> 
				<a><input <?php if(strpos($ContentCode,'PS') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Partnering Strategies</a>
			</li>
			<li class="tabpane_best_4"> 
				<a><input <?php if(strpos($ContentCode,'MKT') !== FALSE){echo 'checked="checked"';} ?> type="checkbox" class="" value="1" /> Marketing and Promotion</a>
			</li>
		</ul>
		<div id="paginationresponse_bidwin" class="buttons_the_basic">
			
			<?php
				$Tab2_Q4 = 'SELECT `bidwin_id` FROM `bidwin` WHERE `type`="Best Practices"';
				$Tab2_Q4R = mysqli_query($con_PRMSUB,$Tab2_Q4) or die(mysqli_error());
				$Count = mysqli_num_rows($Tab2_Q4R); 
				if($Count>0){
				echo paginate_five('', 1, $Count, 1);
				}
			?> 
			</div>
		</div>
		<div class="col-lg-8">
		<input type="hidden" id="totalBidWin" value="<?php echo $Count; ?>" />
		<div class="tab-content" style="background:white;min-height:258px;padding:3%;">  
			<div id="bestpractice_response_content_tab5">
			<?php 
				$Tab2_Q5 = 'SELECT * FROM `bidwin` WHERE `type`="Best Practices" LIMIT 1';
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
				<div class="blog_post_heading" style="text-transform:uppercase;background:#376092;color:#ffcc00;"><span style="text-transform:uppercase;background:#376092;color:#ffcc00;"><?php echo $Tab2_Q5D['title']; ?></span></div>
				<div class="blog_post_heading"><span style="text-transform:uppercase;"><?php echo $Tab2_Q5D['content_type']; ?></span> - <span style="color:#fff;"><i>[Source: <?php echo $Tab2_Q5D['content_source']; ?>]</i></span></div>
				<div class="contentS" style="background:aliceblue;padding:5%;">
				<p style="padding:10px;color:#10253F;background:aliceblue;"><?php echo substr($Tab2_Q5D['text'],0,500); ?></p>
				<a <?php if($Tab2_Q5D['ref_url_target'] == 'BLANK'){echo 'target="_blank"';}?> href="<?php echo $Tab2_Q5D['ref_url']; ?>" class="pull-right moreinfoa">READ MORE</a>
				</div>
			</div>
			<?php $Tab2_Index5++; } ?> 
			 </div>
			 </div>
			</div>
		</div>
	</div>
</div> 
			</div> 
		</div>
	</div>
</div>