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
		<link rel="stylesheet" href="assets/css/custome-login-onboard.css" />
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/awt-login.css" />
	</head>
<?php  	include "config/config_main.php"; 
  		include "config/base_path.php"; 

	function make_query($con_MAIN){
		$query = 'Select * from image_slider';
		$res = mysqli_query($con_MAIN,$query);
		return $res;
	}
	function make_slider_indicator($con_MAIN){
		$output = '';
		$count = 0;
		$res = make_query($con_MAIN);
		while($row = mysqli_fetch_array($res)){
			if ($count == 0) {
				$output .= '<li data-target="#myCarousel" data-slide-to="'.$count.'" class="active"></li>';
			}else{
				$output .= '<li data-target="#myCarousel" data-slide-to="'.$count.'"></li>';
			}
			$count = $count + 1;
		}
		return $output;
	}
	function make_slides($con_MAIN){
		$output = '';
		$count = 0;
		$res = make_query($con_MAIN);
		while($row = mysqli_fetch_array($res)){
			if ($count == 0) {
				$output .= '<div class="item active">';
			}else{
				$output .= '<div class="item">';
			}
			$output .= '<img src="'.$row["slider_image_path"].'" alt="'.$row["slider_image_title"].'" /><div class="carousel-caption"><h3>'.$row["slider_image_title"].'</h3></div></div>';
			  $count = $count + 1;
		}
		return $output;
	}
?>

	<body style="background: #f2f2f2;">
		<div class="container" style="justify-content: center;align-items: center;padding: 15px;">
		  	<div class="row" style="background: #fff;">
		  		<div class="col-md-6" style="padding: 0px">
		  			<div id="myCarousel" class="carousel slide " data-ride="carousel">
						    <!-- Indicators -->
					    <ol class="carousel-indicators">
					    	<?php echo make_slider_indicator($con_MAIN); ?>
					    </ol>

					    <div class="carousel-inner">
					    	<?php echo make_slides($con_MAIN); ?>
					    </div>

					    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					      <span class="glyphicon glyphicon-chevron-left"></span>
					      <span class="sr-only">Previous</span>
					    </a>
					    <a class="right carousel-control" href="#myCarousel" data-slide="next">
					      <span class="glyphicon glyphicon-chevron-right"></span>
					      <span class="sr-only">Next</span>
					    </a>
					</div>
		  		</div>
		  		<div class="col-md-6">
		  			<img src="assets/img/banner_image.jpg" alt="Los Angeles" style="width:100%;">
		  			<div class="validate-form" id="userloginresponse" style="padding: 10px 40px;">
						<span class="login100-form-title p-b-34">
							Account Login
						</span>
						<div class="row">
							<div class="col-md-6" style="padding: 0px 0px 0px 15px;">
								<div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
									<input type="email" class="input100" id="email" placeholder="Email Address" style="font-size: 18px;">
									<span class="focus-input100"></span>
								</div>
							</div>
							<div class="col-md-6" style="padding: 0px 15px 0px 0px;">
								<div class="wrap-input100 validate-input m-b-20" data-validate="user password">
									<input type="password" class="input100" id="password1" placeholder="Password">
									<span class="focus-input100"></span>
								</div>
							</div>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" onclick="logmein()">
								LOGIN
							</button>
						</div>

						<div class="w-full text-center p-t-27 p-b-239">
							<span class="txt1">
								Forgot
							</span>

							<a href="javascript:;" onclick="forgetPassword()" class="txt2">
								User name / password?
							</a>
						</div>
					</div>
		  		</div>
		  	</div>
		</div>
		<!-- <div class="main-container">
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
					<button onclick="logmein()" type="button" class="width-35 btn btn-sm btn-primary" id="login_btn">
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
				</div>
			</div>
		</div> -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>
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

function forgetPassword(){
	var email = $("#email").val();
	var direct_login = 'Yes';
	$.post( "ajax/foget_password.php", {email:email,direct_login:direct_login}).done(function(data){
		$("#userloginresponse").html(data);
		setTimeout(function(){ location.reload(); }, 3000);
	});
}

function logmein(){
	var userid = '';
	var email = $("#email").val();
	var password = $("#password1").val();
	var direct_login = 'Yes';
	$.post( "ajax/logmein.php", {userid:userid,email:email,password:password,direct_login:direct_login}).done(function(data){
		$("#userloginresponse").html(data);
		//window.location = "index.php";
		if(data == "<div style='font-size:20px;text-align:center;color:#0c627b;text-transform:uppercase;margin-top:30px;'>PLEASE WAIT WHILE WE CONFIGURE YOUR DASHBOARD....</div>"){
				//window.location = 'partner-dashboard/dashboard.php#contract_details';
				window.location = "index.php";
		}
	});
}

$(document).bind('keyup', function(e){
	if(e.keyCode==13)
		logmein();
});

</script>
	</body>
</html>
