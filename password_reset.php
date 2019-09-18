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
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="assets/css/awt-login.css" />
	</head>

	<body style="background: #f2f2f2;">
		<div class="container" style="justify-content: center;align-items: center;padding: 15px;">
		  	<div class="row" style="background: #fff;">
		  		<div class="col-md-6" style="padding: 0px">
		  			<div id="myCarousel" class="carousel slide " data-ride="carousel">
						    <!-- Indicators -->
					    <ol class="carousel-indicators">
					      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					      <li data-target="#myCarousel" data-slide-to="1"></li>
					      <li data-target="#myCarousel" data-slide-to="2"></li>
					    </ol>

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					      <div class="item active">
					        <img src="assets/img/SampleSliderImage-1.jpg" alt="Los Angeles" style="width:100%;">
					      </div>

					      <div class="item">
					        <img src="assets/img/SampleSliderImage-2.jpg" alt="Chicago" style="width:100%;">
					      </div>
					    
					      <div class="item">
					        <img src="assets/img/SampleSliderImage-3.jpg" alt="New york" style="width:100%;">
					      </div>
					    </div>

					    <!-- Left and right controls -->
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
		  			<div class="validate-form" style="padding: 10px 40px;">
						<span class="login100-form-title p-b-34">
							ENTER NEW PASSWORD 
						</span>
						<div class="row">
							
							<div class="col-md-6" style="padding: 0px 0px 0px 15px;">
								<div class="wrap-input100 validate-input m-b-20" data-validate="Type user name">
									<input class="input100" type="password" id="password" placeholder="Enter password" style="font-size: 18px;">
									<span class="focus-input100"></span>
								</div>
							</div>
							<div class="col-md-6" style="padding: 0px 15px 0px 0px;">
								<div class="wrap-input100 validate-input m-b-20" data-validate="Type password">
									<input class="input100" type="password" id="password1" placeholder="Re Enter" style="font-size: 18px;">
									<span class="focus-input100"></span>
								</div>
							</div>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" onclick="">
								SUBMIT
							</button>
						</div>
					</div>
		  		</div>
		  	</div>
		</div>
		
		<script src="assets/js/jquery.min.js"></script>

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	</body>
</html>
