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
	function my_simple_crypt( $string, $action = 'e' ) {
    // you may change these values to your own
	      $secret_key = 'my_simple_secret_key';
	      $secret_iv = 'my_simple_secret_iv';
	   
	      $output = false;
	      $encrypt_method = "AES-256-CBC";
	      $key = hash( 'sha256', $secret_key );
	      $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	   
	      if( $action == 'e' ) {
	          $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	      }
	      else if( $action == 'd' ){
	          $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	      }
	   
	      return $output;
	  }
?>
<?php 
	$user_id = $_GET['id'];
	$id = my_simple_crypt($user_id,'d');
	$query = "Select * from user where user_id = ".$id."";
	$res = mysqli_query($con_MAIN,$query);
	$row = mysqli_fetch_object($res);
	//echo $row->user_email;exit;
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

					    <!-- Wrapper for slides -->
					    <div class="carousel-inner">
					      <?php echo make_slides($con_MAIN); ?>
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
		  			<div class="validate-form" id="update_password" style="padding: 10px 55px;">
						<span class="login100-form-title p-b-34">
							ENTER NEW PASSWORD 
						</span>
						<div class="row">
							<div class="col-md-12" style="padding: 0px">
								<div class="wrap-input100 validate-input m-b-20" data-validate="Type email">
									<input class="input100" type="email" id="email" placeholder="Email Address" value="<?php echo $row->user_email; ?>" style="font-size: 17px;padding: 0 22px;" readonly="readonly">
									<span class="focus-input100"></span>
								</div>
							</div>
							<div class="col-md-6" style="padding: 0px">
								<div class="wrap-input100 validate-input m-b-20" data-validate="Type user password">
									<input class="input100" type="password" id="password_new" placeholder="Enter Password" style="font-size: 17px;padding: 0 15px;">
									<span class="focus-input100"></span>
								</div>
							</div>
							<div class="col-md-6" style="padding: 0px">
								<div class="wrap-input100 validate-input m-b-20" data-validate="Type confirm password">
									<input class="input100" type="password" id="cpassword" placeholder="Re Enter Password" style="font-size: 17px;padding: 0 15px;">
									<span class="focus-input100"></span>
								</div>
							</div>
							<div class="container-login100-form-btn">
								<button class="login100-form-btn" onclick="update_password(<?php echo $row->user_id; ?>)">
									SUBMIT
								</button>
							</div>
						</div>
						
					</div>
		  		</div>
		  	</div>
		</div>
		

		<script type="text/javascript">

			function update_password(user_id){
				var password = $('#password_new').val();
				var cpassword = $('#cpassword').val();
				$.post( "ajax/update_password.php", {user_id:user_id,password:password,cpassword:cpassword}).done(function(data){
					$("#update_password").html(data);
					if (data == "<div style='font-size:20px;text-align:center;color:#0c627b;text-transform:uppercase;margin-top:30px;'>Password Recovered Successfuly!</div>") {
						setTimeout(function(){ window.location = "login.php"; }, 2500);
					}
					//setTimeout(function(){ window.location = "index.php"; }, 2500);
				});

			}

			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
	</body>
</html>
