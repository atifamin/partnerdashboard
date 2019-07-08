<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e('pKanban', true); ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.ico">

    <link href="<?php echo base_url(); ?>template/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>template/css/login.css" rel="stylesheet">

    <link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" data-noprefix>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<!-- <body hidden=""> -->
    <body>
<div class="container">
    <div class="card card-container">
        <?php //echo $email."<br>".$password; ?>
        <p class="brand"><?php echo e('pKANBAN', true); ?></p>
        <p class="pay_off"><?php echo e('Registration New User', true); ?></p>
        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"/>

        <form class="form-signin" action="<?php echo base_url(); ?>User_registration" method="post">
            <span id="reauth-email" class="reauth-email"></span>

            <?php if ($this->config->item('demo_mode') == TRUE): ?>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="<?php echo e('Email address', true); ?>"
                       required autofocus value="demo@pkanban.com">

                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo e('Password', true); ?>"
                        value="demo">
            <?php else: ?>

                <input type="email" name="user_email" id="inputEmail"
class="form-control" value="<?php //echo $email; ?>"   placeholder="<?php echo
e('Enter Email address', true); ?>"  required autofocus>
<div class="" style="    color: red;
    margin-left: 4px;
    font-size: 17px;
    margin-bottom: 6px; "><?php if ($this->session->flashdata('error')) {
                echo $this->session->flashdata('error');
          } ?>
</div>
<!-- <input type="text" name="user_name" id="inputEmail"
class="form-control" value=""   placeholder="<?php echo
e('Enter First Name', true); ?>"   autofocus>
<input type="text" name="user_last_name" id="inputEmail"
class="form-control" value=""   placeholder="<?php echo
e('Enter Last Name', true); ?>"   autofocus>
 -->

  <input type="password"
name="user_password" id="inputPassword" class="form-control" value="<?php //echo
$password; ?>"  placeholder="<?php echo e('Password', true); ?>" 
value="admin" required autofocus>
<!-- <input type="text" name="user_daily_reminder" id="inputEmail"
class="form-control" value=""   placeholder="<?php echo
e('Enter user_daily_reminder', true); ?>"   autofocus>
<input type="text" name="user_permissions" id="inputEmail"
class="form-control" value=""   placeholder="<?php echo
e('Enter user_permissions', true); ?>"   autofocus> -->
 <?php endif; ?>


            <p class="error_danger"><?php echo (isset($error)) ? $error : null; ?></p>
            <button class="btn btn-lg btn-primary btn-block btn-signin md-trigger" type="submit">Submit</button>

            <?php if ($this->config->item('demo_mode') == TRUE): ?>
            <p style="text-align:center">Demo access:</p>
            <p>
                Login: demo@pkanban.com<br/>
                Password: demo</p>
            <?php endif; ?>

        </form><!-- /form -->
        <!--<a href="#" class="forgot-password">
            Forgot the password?
        </a>-->
    </div><!-- /card-container -->
</div><!-- /container -->
</body>


<!-- <script>
jQuery(function(){
   jQuery('#modal').click();
});
</script> -->
</html>