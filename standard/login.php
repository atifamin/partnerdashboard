<?php
require_once "base_path.php";
//if(isset($_GET['Logout=Yes'])){session_destroy();}
//if($_SESSION['user_level'] != ''){header("Location: index.php");exit;}
 ?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AWT-CEP Corporate Dashboard ..:::.. Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?PHP echo base_url; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?PHP echo base_url; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?PHP echo base_url; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?PHP echo base_url; ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?PHP echo base_url; ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
@media screen and (min-width: 480px) {
    img {width: 684px; }
   
}
</style>
<body class="hold-transition login-page" style="background-image: url(assets/img/images.jpg);background-size: auto 948px;background-repeat: no-repeat;">
  
<div class="login-box">

  <div style="margin-left: 100px;color:white;"> <h1>WELCOME</h1></div>
    <div><img class="img-responsive" src="<?PHP echo base_url; ?>dist/img/logo_center.png" alt="California Small Business Success" /></div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    
       <div id="userloginresponse"></div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4">
          <button  onclick="logmein()" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
      </div>
   
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.php" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?PHP echo base_url; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?PHP echo base_url; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?PHP echo base_url; ?>plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">

 function logmein(){
	var userid = '';
	var email = $("#email").val();
	var password = $("#password").val();
	var direct_login = 'Yes';
	$.post( "ajax/logmein.php", {userid:userid,email:email,password:password,direct_login:direct_login}).done(function(data){
		$("#userloginresponse").html(data);
		if(data == '<div class="alert alert-success alert-dismissible">PLEASE WAIT WHILE WE CONFIGURE YOUR DASHBOARD....</div>'){
			window.location = 'dashboard.php#contract_details';
		}
	});
}

$(document).ready(function () {

    $('input:text:first').focus();

    $('#email').keypress(function (e) {
        if (e.keyCode == 13) {

            if ($('#email').val() == "") {
                return false;
            }
            else {
                $('#password').focus();

            }
        }
    });

     $('#password').keypress(function (e) {
        if (e.keyCode == 13) {

            if ($('#password').val() == "") {
                return false;
            }
            else {
              logmein();

            }
        }
    });

});

</script>
</body>
</html>
