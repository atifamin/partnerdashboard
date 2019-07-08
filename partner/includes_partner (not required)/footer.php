<!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> <?php echo date('Y'); ?> &copy; Partner Dashboard</div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="assets/js/respond.min.js"></script>
<script src="assets/js/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS --> 
        <script src="assets/js/morris.min.js" type="text/javascript"></script> 
		<script src="assets/js/jquery.waypoints.min.js" type="text/javascript"></script>
		<script src="assets/js/jquery.counterup.min.js" type="text/javascript"></script>
		<script src="assets/js/amcharts.js" type="text/javascript"></script>
        <script src="assets/js/serial.js" type="text/javascript"></script>
        <script src="assets/js/pie.js" type="text/javascript"></script>
        <script src="assets/js/radar.js" type="text/javascript"></script>
        <script src="assets/js/light.js" type="text/javascript"></script>
        <script src="assets/js/patterns.js" type="text/javascript"></script>
        <script src="assets/js/chalk.js" type="text/javascript"></script>
        <script src="assets/js/ammap.js" type="text/javascript"></script>
        <script src="assets/js/worldLow.js" type="text/javascript"></script>
        <script src="assets/js/amstock.js" type="text/javascript"></script>
		 
		
        <script src="assets/js/jquery.flot.min.js" type="text/javascript"></script> 
        <script src="assets/js/jquery.flot.pie.min.js" type="text/javascript"></script>                
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/js/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS --> 
        <script src="assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="assets/pages/scripts/charts-amcharts.min.js" type="text/javascript"></script>
        <script type="text/javascript">
		var data = [
			{ label: "Female",  data: 78, color: "#71b545"},
			{ label: "Male",  data: 28, color: "#4b9126"}
		];
		 
		$(document).ready(function () {
			$.plot('#placeholder', data, {
				series: {
					pie: {
						show: true
					}
				}
			});
		});
		</script> 
<script type="text/javascript">
function load_product_statistics(range,aid){
	$("#daterangeloader").fadeIn();
	$(".psr").each(function(){
		$(this).removeClass('active');
	});
	$("#"+aid).addClass('active');
	$.post( "ajax/load_product_statistics.php", {range:range}).done(function(data){
		$("#product_statistics_response").html(data); 
		$("#daterangeloader").fadeOut();
	});
}
function deactivateoffer(finserv_id,status){
	var confirmation = confirm("Are you sure?");
	if(confirmation === true){
		$.post( "ajax/deactivate_offer.php", {finserv_id:finserv_id,status:status}).done(function(data){
			$("#deactivate_response_"+finserv_id).html(data);  
		});
	}
}
function edit_offer(offer_box_id,partner_id){ 
	$.post( "ajax/edit_offer.php", {offer_box_id:offer_box_id,partner_id:partner_id}).done(function(data){
		$("#editoffer_response").html(data);  
	}); 
}
function updateoffer(){
	var offer_title = $("#offer_title").val();
	var offer_name = $("#offer_name").val();
	var offer_type = $("#offer_type").val();
	var offer_amount_min = $("#offer_amount_min").val();
	offer_amount_min = parseFloat(offer_amount_min);
	var offer_amount_max = $("#offer_amount_max").val();
	offer_amount_max = parseFloat(offer_amount_max);
	var offer_rate_min = $("#offer_rate_min").val();
	offer_rate_min = parseFloat(offer_rate_min);
	var offer_rate_max = $("#offer_rate_max").val();
	offer_rate_max = parseFloat(offer_rate_max);
	var offer_term_min = $("#offer_term_min").val();
	offer_term_min = parseFloat(offer_term_min);
	var offer_term_max = $("#offer_term_max").val();
	offer_term_max = parseFloat(offer_term_max);
	var offer_apr_min = $("#offer_apr_min").val();
	offer_apr_min = parseFloat(offer_apr_min);
	var offer_apr_max = $("#offer_apr_max").val();
	offer_apr_max = parseFloat(offer_apr_max);
	var offer_origination_min = $("#offer_origination_min").val();
	offer_origination_min = parseFloat(offer_origination_min);
	var offer_origination_max = $("#offer_origination_max").val();
	offer_origination_max = parseFloat(offer_origination_max);
	var offer_cta_url = $("#offer_cta_url").val();  
	if(offer_title == ''){
		$("#warning_offer_title").fadeIn();
	}else if(offer_name == ''){
		$("#warning_offer_name").fadeIn();
	}else if(offer_type == ''){
		$("#warning_offer_type").fadeIn();
	}else if(isNaN(offer_amount_min) === true){
		$("#warning_offer_amount_min").fadeIn(); return false;
	}else if(isNaN(offer_amount_max) === true){
		$("#warning_offer_amount_max").fadeIn(); return false;
	}else if(isNaN(offer_rate_min) === true){
		$("#warning_offer_rate_min").fadeIn(); return false;
	}else if(isNaN(offer_rate_max) === true){
		$("#warning_offer_rate_max").fadeIn(); return false;
	}else if(isNaN(offer_term_min) === true){
		$("#warning_offer_term_min").fadeIn(); return false;
	}else if(isNaN(offer_term_max) === true){
		$("#warning_offer_term_max").fadeIn(); return false;
	}else if(isNaN(offer_apr_min) === true){
		$("#warning_offer_apr_min").fadeIn(); return false;
	}else if(isNaN(offer_apr_max) === true){
		$("#warning_offer_apr_max").fadeIn(); return false;
	}else if(isNaN(offer_origination_min) === true){
		$("#warning_offer_origination_min").fadeIn(); return false;
	}else if(isNaN(offer_origination_max) === true){
		$("#warning_offer_origination_max").fadeIn(); return false;
	}else if(offer_cta_url == ''){
		$("#warning_offer_cta_url").fadeIn();	 return false;
	}
	if(offer_amount_min>=offer_amount_max){
		$("#warning_offer_amounts").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_amounts").fadeOut();  
	}	
	
	if(offer_rate_min>=offer_rate_max){
		$("#warning_offer_rates").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_rates").fadeOut();  
	}
	
	if(offer_term_min>=offer_term_max){
		$("#warning_offer_terms").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_terms").fadeOut();  
	}
	
	if(offer_apr_min>=offer_apr_max){
		$("#warning_offer_aprs").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_aprs").fadeOut();  
	}
	
	if(offer_origination_min>=offer_origination_max){
		$("#warning_offer_originations").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_originations").fadeOut(); 
	}
	$("#editpopuploader").fadeIn();
	var formdata = $("#updateofferform").serialize();
	$.ajax({
	  url: "ajax/update_offer.php",
	  type: "POST",
	  data: formdata,
	  success: function( response ) {
        $("#updateofferform_response").html(response);
		$("#editpopuploader").fadeOut();
      }
	});
}
function addnewoffer(){ 
	var offer_title = $("#offer_title").val();
	var offer_name = $("#offer_name").val();
	var offer_type = $("#offer_type").val();
	var offer_amount_min = $("#offer_amount_min").val();
	offer_amount_min = parseFloat(offer_amount_min);
	var offer_amount_max = $("#offer_amount_max").val();
	offer_amount_max = parseFloat(offer_amount_max);
	var offer_rate_min = $("#offer_rate_min").val();
	offer_rate_min = parseFloat(offer_rate_min);
	var offer_rate_max = $("#offer_rate_max").val();
	offer_rate_max = parseFloat(offer_rate_max);
	var offer_term_min = $("#offer_term_min").val();
	offer_term_min = parseFloat(offer_term_min);
	var offer_term_max = $("#offer_term_max").val();
	offer_term_max = parseFloat(offer_term_max);
	var offer_apr_min = $("#offer_apr_min").val();
	offer_apr_min = parseFloat(offer_apr_min);
	var offer_apr_max = $("#offer_apr_max").val();
	offer_apr_max = parseFloat(offer_apr_max);
	var offer_origination_min = $("#offer_origination_min").val();
	offer_origination_min = parseFloat(offer_origination_min);
	var offer_origination_max = $("#offer_origination_max").val();
	offer_origination_max = parseFloat(offer_origination_max);
	var offer_cta_url = $("#offer_cta_url").val();  
	if(offer_title == ''){
		$("#warning_offer_title").fadeIn();
	}else if(offer_name == ''){
		$("#warning_offer_name").fadeIn();
	}else if(offer_type == ''){
		$("#warning_offer_type").fadeIn();
	}else if(isNaN(offer_amount_min) === true){
		$("#warning_offer_amount_min").fadeIn(); return false;
	}else if(isNaN(offer_amount_max) === true){
		$("#warning_offer_amount_max").fadeIn(); return false;
	}else if(isNaN(offer_rate_min) === true){
		$("#warning_offer_rate_min").fadeIn(); return false;
	}else if(isNaN(offer_rate_max) === true){
		$("#warning_offer_rate_max").fadeIn(); return false;
	}else if(isNaN(offer_term_min) === true){
		$("#warning_offer_term_min").fadeIn(); return false;
	}else if(isNaN(offer_term_max) === true){
		$("#warning_offer_term_max").fadeIn(); return false;
	}else if(isNaN(offer_apr_min) === true){
		$("#warning_offer_apr_min").fadeIn(); return false;
	}else if(isNaN(offer_apr_max) === true){
		$("#warning_offer_apr_max").fadeIn(); return false;
	}else if(isNaN(offer_origination_min) === true){
		$("#warning_offer_origination_min").fadeIn(); return false;
	}else if(isNaN(offer_origination_max) === true){
		$("#warning_offer_origination_max").fadeIn(); return false;
	}else if(offer_cta_url == ''){
		$("#warning_offer_cta_url").fadeIn();	 return false;
	}
	if(offer_amount_min>=offer_amount_max){
		$("#warning_offer_amounts").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_amounts").fadeOut();  
	}	
	
	if(offer_rate_min>=offer_rate_max){
		$("#warning_offer_rates").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_rates").fadeOut();  
	}
	
	if(offer_term_min>=offer_term_max){
		$("#warning_offer_terms").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_terms").fadeOut();  
	}
	
	if(offer_apr_min>=offer_apr_max){
		$("#warning_offer_aprs").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_aprs").fadeOut();  
	}
	
	if(offer_origination_min>=offer_origination_max){
		$("#warning_offer_originations").fadeIn();
		return false;
	}else{ 
		$("#warning_offer_originations").fadeOut(); 
	}
	$("#addpopuploader").fadeIn();
	var formdata = $("#addnewofferform").serialize();
	$.ajax({
	  url: "ajax/insert_offer.php",
	  type: "POST",
	  data: formdata,
	  success: function( response ) {
        $("#addofferform_response").html(response);
		$("#addpopuploader").fadeOut();
      }
	});
}
$(document).ready(function() {
    $(".decimal").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
function removewarnings(warningid){
	$("#"+warningid).fadeOut();
}
</script>		
    </body>
</html>