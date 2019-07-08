<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>AWT-CEP Corporate Dashboard ..:::.. Login</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/awt-login.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout">
	
		<div class="main-container">
			<div class="main-content">
				<div class="row">
				<div style="clear:both;height:20px;"></div>
				<div class="col-lg-2 pull-left"><img class="img-responsive1" src="assets/img/logo_left.png" alt="California GO BIZ" /></div>
				<div class="col-lg-2 pull-right align-right"><img class="img-responsive pull-right" src="assets/img/logo_right.png" alt="California" /></div>
				<div style="clear:both;height:0px;"></div>
				<div class="center" style="margin-top: -51px;"><h1><span class="white" id="id-text2">WELCOME</span></h1></div>
				<div class="col-lg-4">&nbsp;</div>
				<div class="col-lg-4"><img class="img-responsive" src="assets/img/logo_center.png" alt="California Small Business Success" /></div>
				<div class="col-lg-4">&nbsp;</div>
				<div style="clear:both;height:20px;"></div>
				<div class="col-lg-4">&nbsp;</div>
				<div class="col-lg-4">
				
				<div id="userloginresponse">
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR EMAIL ADDRESS</p>
					</div>  
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="email" class="form-control" type="text">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<div class="widget-main">
						<p class="alert alert-info">ENTER YOUR PASSWORD</p>
					</div>
					<div class="inpbox">
					<span class="block input-icon input-icon-right">
						<input id="password1" class="form-control" type="password">
					</span>
					</div>
					<div style="clear:both;height:20px;"></div>
					<button onclick="logmein()" type="button" class="width-35 btn btn-sm btn-primary">
						<i class="ace-icon fa fa-key"></i>
						<span class="bigger-110">Login</span>
					</button>
					
				</div>
				
				</div>
				<div class="col-lg-4">&nbsp;</div>
				
				
				<div style="clear:both;height:120px;"></div>
				<div class="col-lg-4">&nbsp;</div>
				<div class="col-lg-4"><img class="img-responsive" src="assets/img/logo_bottom.png" alt="California Small Business Success" style="margin-left: 51px" /></div>
				<div class="col-lg-4">&nbsp;</div>
				<div style="clear:both;height:20px;"></div> 
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
<script type="text/javascript">

function logmein(){
	var userid = '';
	var email = $("#email").val();
	var password = $("#password1").val();
	var direct_login = 'Yes';
	$.post( "ajax/logmein.php", {userid:userid,email:email,password:password,direct_login:direct_login}).done(function(data){
		$("#userloginresponse").html(data);
		if(data == '<div class="cong_heading_4">PLEASE WAIT WHILE WE CONFIGURE YOUR DASHBOARD....</div>'){
				//window.location = 'partner-dashboard/dashboard.php#contract_details';
				window.location = "index.php";
		}
	});
}
</script>
	</body>
</html>
