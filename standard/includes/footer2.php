<script src="<?php echo base_url; ?>assets/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url; ?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url; ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url; ?>assets/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="<?php echo base_url; ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/ace.min.js"></script>
		
		<script src="<?php echo base_url; ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/flot/jquery.flot.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url; ?>assets/js/flot/jquery.flot.resize.min.js"></script>
		
		<!-- Zozo Tabs --> 
		<script src="<?php echo base_url; ?>assets/js/zozo.tabs.min.js"></script>
		<!-- Zozo End -->

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
		
			jQuery(function($) {
			 var $sidebar = $('.sidebar').eq(0);
			 if( !$sidebar.hasClass('h-sidebar') ) return;
			
			 $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
				if( event_name !== 'sidebar_fixed' ) return;
			
				var sidebar = $sidebar.get(0);
				var $window = $(window);
			
				//return if sidebar is not fixed or in mobile view mode
				if( !fixed || ( ace.helper.mobile_view() || ace.helper.collapsible() ) ) {
					$sidebar.removeClass('hide-before');
					//restore original, default marginTop
					ace.helper.removeStyle(sidebar , 'margin-top')
			
					$window.off('scroll.ace.top_menu')
					return;
				}
			
			
				 var done = false;
				 $window.on('scroll.ace.top_menu', function(e) {
			
					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
					if (scroll > 17) scroll = 17;
			
			
					if (scroll > 16) {			
						if(!done) {
							$sidebar.addClass('hide-before');
							done = true;
						}
					}
					else {
						if(done) {
							$sidebar.removeClass('hide-before');
							done = false;
						}
					}
			
					sidebar.style['marginTop'] = (17-scroll)+'px';
				 }).triggerHandler('scroll.ace.top_menu');
			
			 }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			
			 $(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
			 });
			$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
				
			$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
			});
						
			});
		</script>
		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'100%' , 'min-height':'100px'});
			  var data = [
				{ label: "Lost",  data: <?php echo 100-bidWonLost(); ?>, color: "#71B545"},
				{ label: "Won",  data: <?php echo bidWonLost(); ?>, color: "#4B9126"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 0
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				} 
			
			})
		</script>
		<script>
        jQuery(document).ready(function ($) {
            $("#horizontal_tab_for_both_contractors").zozoTabs({
                position: "top-compact",
                multiline: true,
                theme: "white",
                shadows: true,
                orientation: "horizontal",
                size: "medium",
                animation: {
                    easing: "easeInOutExpo",
                    duration: 500,
                    effects: "slideH"
                }
            });
            /* jQuery activation and setting options for second tabs*/
            $("#tabbed-nav2").zozoTabs({
                position: "top-left",
                orientation: "vertical",
                multiline: true,
                style: "pills",
                theme: "flat-turquoise",
                spaced: true,
				deeplinking: true,
                rounded: false,
                bordered: false,
                animation: {
                    easing: "easeInOutExpo",
                    duration: 450,
                    effects: "slideH"
                }
            });
        });
    </script>
<script type="text/javascript">
function show_cfm101(cfmid,cfmtitle){
	$("#tab2-loader").fadeIn();
	$.post( "ajax/load_cfm101.php", {cfmid:cfmid}).done(function(data){
		$("#cfm-panel-detail-id").html(data);
		$("#tab2-loader").fadeOut();
		$("#current-selected").html(cfmtitle);
	});
}
function showofferboxpopup(offerid,partnername){
	// popup file include in dashboard
	$("#popup_partner_name").html(partnername);
	$.post( "ajax/loadofferdata.php", {offerid:offerid}).done(function(data){
		$("#offerdata").html(data); 
	});
}
function showentireconid(contractID){
	$("#contractid_"+contractID).html(contractID);
}
function showentirepurid(purchaseID){
	$("#purchaseid_"+purchaseID).html(purchaseID);
}
// Tab2
function load_basic_practice(pageid){
	var totalCFM = $("#totalCFM").val();
	$.post( "ajax/best_practice.php", {pageid:pageid,totalCFM:totalCFM}).done(function(data){
		$("#bestpractice_response_content").html(data); 
	});
	$.post( "ajax/best_practice_content_code.php", {pageid:pageid,totalCFM:totalCFM}).done(function(data){
		$("#myTab31").html(data); 
	});
	$.post( "ajax/loadpagination_tab2.php", {pageid:pageid,totalCFM:totalCFM}).done(function(data){
		$("#paginationresponse").html(data); 
	});
} 
function loadcfmdata(datatype){
	var current_cfm_id = $("#current_cfm_id").val();
	if(datatype == 'Next'){
		current_cfm_id++;
	}else if(datatype == 'Previous'){
		current_cfm_id--;
	}
	
	if($('#pagination_id_'+current_cfm_id).length === 0){
		return false;
	} 
	$("#current_cfm_id").val(current_cfm_id);
	load_basic_practice(current_cfm_id,'');
}
// Tab5
function load_basic_practice_bidwin(pageid){
	var totalBidWin = $("#totalBidWin").val();
	$.post( "ajax/best_practice_tab5.php", {pageid:pageid,totalBidWin:totalBidWin}).done(function(data){
		$("#bestpractice_response_content_tab5").html(data); 
	});
	$.post( "ajax/best_practice_content_code_tab5.php", {pageid:pageid,totalBidWin:totalBidWin}).done(function(data){
		$("#myTab31_tab5").html(data); 
	});
	$.post( "ajax/loadpagination_tab5.php", {pageid:pageid,totalBidWin:totalBidWin}).done(function(data){
		$("#paginationresponse_bidwin").html(data); 
	});
} 
function loadbidwindata(datatype){
	var current_bidwin_id = $("#current_bidwin_id").val();
	if(datatype == 'Next'){
		current_bidwin_id++;
	}else if(datatype == 'Previous'){
		current_bidwin_id--;
	}
	
	if($('#pagination_id_'+current_bidwin_id).length === 0){
		return false;
	} 
	$("#current_bidwin_id").val(current_bidwin_id);
	load_basic_practice_bidwin(current_bidwin_id,'');
}
function showpartnerdescription(partnerid){
	$.post( "ajax/tab3_moreinfo_popup.php", {partnerid:partnerid}).done(function(data){
		$("#moreinfo_popup_response").html(data); 
	});
}
// Tab4
$(document).ready(function(){
	var  user_zip_code = $("#user_zip_code").val(); 
	$.post( "ajax/tab5_score.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_score_response").html(data); 
	});
	$.post( "ajax/tab5_sbdc.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_sbdc_response").html(data); 
	});
	$.post( "ajax/tab5_vboc.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_vboc_response").html(data); 
	});
	$.post( "ajax/tab5_others.php", {user_zip_code:user_zip_code}).done(function(data){
		$("#tab5_others_response").html(data); 
	});
});
function load_tab5_data(suppserv_id){
	$.post( "ajax/tab5_popup_content.php", {suppserv_id:suppserv_id}).done(function(data){
		$("#tab5_data_response").html(data); 
	});
}
function active_wining_contract_tab(){ 
	document.getElementById("wining_contracts_tab").click();
	scroll(0, 800);
}

</script>